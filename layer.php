<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    //connect the db
    include 'utils/notlog/notlog.php';

    //recupére l'utilisateur
    $activeuser = $_SESSION['id'];

    // find the layer
    $LayerActiveQuery = $db->prepare("SELECT * FROM chelv__layers WHERE layer__id=?");
    $LayerActiveQuery->execute([$_GET['layerid']]);
    $LayerActiveData = $LayerActiveQuery->fetch();
    // find pagetitle
    $pagetitle = $LayerActiveData['layer__name'];
    //find base for explorer
    $ExplorerBase = $LayerActiveData['layer__binder'];

    // trouver les chapitres
    $LayerChapterQuery = $db->prepare("SELECT * FROM chelv__chapters WHERE chapter__layer=? AND chapter__owner='$activeuser';");
    $LayerChapterQuery->execute([$_GET['layerid']]);
    $LayerChapterData = $LayerChapterQuery->fetchAll();
    // trouver les documents
    $LayerDocQuery = $db->prepare("SELECT * FROM chelv__documents WHERE document__layer=? AND document__owner='$activeuser' AND document__haschapter=0  AND document__version='default';");
    $LayerDocQuery->execute([$_GET['layerid']]);
    $LayerDocData = $LayerDocQuery->fetchAll();

    // update the date
    $NewModified = date('Y-m-d H:i:s');
    $LayerActiveUpdate = $db->prepare("UPDATE chelv__layers SET layer__opened = ? WHERE layer__id=?;");  
    $LayerActiveUpdate->execute([$NewModified, $_GET['layerid']]);
    //403 and 404
    if (!$LayerActiveData) {
        header("Location: 404.php");
    } else if ($activeuser != $LayerActiveData['layer__owner']) {
        header("Location: 403.php");
    }

    // inclure la balise head
    include 'components/head/head.php';

?>

<body class="page page--layer <?php echo $LayerActiveData['layer__shape'] ?>"  data-theme="<?php echo $LayerActiveData['layer__color'] ?>">

    <!-- navbar -->
    <?php include 'components/nav/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer/explorer.php'; ?>

    <!-- layer content -->
    <main class="content content--layer <?php echo 'content--' . $LayerActiveData['layer__color'] ?>">

        <span class="layer__type">Intercalaire</span>
        <h1 class="layer__title">
        <?php echo $pagetitle ?>
        </h1> 

        <!-- get family -->
        <?php include 'components/family/family--layer.php'; ?>
        <button class="form__trigger change__trigger">
            <p>Modifier</p>
        </button>
    </main>   

    <!-- chapter -->
    <aside class="aside aside--chapter">

        <h2 class="aside__title aside__title--chapter">Les chapitres</h2>

        <form class="layerchapters__form" method="get">
            <input class="layerchapters__search"  type="text" name="search" placeholder="rechercher...">
        </form>

        <div id="layerchapters" class="tease tease--short">
            <!-- show chapter  -->
            <?php 
            foreach ($LayerChapterData as $LayerChapterRow) {  
                include 'components/tease/tease--chapter.php';
            } ?>
        </div>

        <button class="form__trigger aside__trigger aside__trigger--add">
            <p>Nouveau chapitre</p>
        </button>

    </aside>

    
    <!-- document -->
    <aside class="aside aside--document">

        <h2 class="aside__title aside__title--document">Les documents</h2>
        <!-- add document  -->

        <form class="layerdocuments__form" method="get">
            <input class="layerdocuments__search"  type="text" name="search" placeholder="rechercher...">
        </form>

        <div id="layerdocuments" class="tease tease--short">
            <!-- show document  -->
            <?php 
            foreach ($LayerDocData as $LayerDocRow) {
                include 'components/tease/tease--doc.php';
            } ?>
        </div>

        <button class="form__trigger aside__trigger aside__trigger--add">
            <p>Nouveau document</p>
        </button>
    </aside>

    
    <?php include 'components/form/change--layer.php'; ?>

    <?php include 'components/form/form--chapter.php'; ?>

    <?php include 'components/form/form--doc.php'; ?>

    <!-- no phone -->
    <?php include 'components/nophone/nophone.php'; ?>  

</body>
</html>