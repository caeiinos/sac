<?php   
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    //connect the db
    include 'utils/notlog/notlog.php';

    //recupére l'utilisateur
    $activeuser = $_SESSION['id'];

    // trouver l'intercalaire
    $DocActiveQuery = $db->prepare("SELECT * FROM chelv__documents WHERE document__id=?");
    $DocActiveQuery->execute([$_GET['documentid']]);
    $DocActiveData = $DocActiveQuery->fetch();
   // find pagetitle
    $pagetitle = $DocActiveData['document__name'];
    //find base for explorer
    $ExplorerBase = $DocActiveData['document__binder'];
    
    // trouver les notes   
    $DocNoteQuery = $db->prepare("SELECT * FROM chelv__notes WHERE note__document=? AND note__owner = '$activeuser'");
    $DocNoteQuery->execute([$_GET['documentid']]);
    $DocNoteData = $DocNoteQuery->fetchAll();

    // trouver les notes   
    $DocLinkQuery = $db->prepare("SELECT * FROM chelv__links WHERE link__document=? AND link__owner = '$activeuser'");
    $DocLinkQuery->execute([$_GET['documentid']]);
    $DocLinkData = $DocLinkQuery->fetchAll();

    //403 and 404
    if (!$DocActiveData) {
        header("Location: 404.php");
    } else if ($activeuser != $DocActiveData['document__owner']) {
        header("Location: 403.php");
    }

    // inclure la balise head
    include 'components/head/head.php';

?>

<body class="page page--document">

    <!-- navbar -->
    <?php include 'components/nav/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer/explorer.php'; ?>

    <!-- layer content -->
    <main class="content content--document">
        <span class="layer__type">Document</span>
        <h1 class="layer__title">
        <?php echo $pagetitle ?>
        </h1> 
        <!-- get family -->
        <?php include 'components/family/family--doc.php'; ?> 
        
        <div class="version">
            <div class="version__choice">
                <button class="version__trigger">
                    <?php echo $DocActiveData['document__version']; ?>
                </button>
                <ul class="version__list">
                    <?php 
                    
                    $versionname = $DocActiveData['document__name'];
                    $versionbinder = $DocActiveData['document__binder'];
                    $versionlayer = $DocActiveData['document__layer'];
                    $versionchapter = $DocActiveData['document__chapter'];
                    
                    $binderversion = $db->prepare("SELECT * FROM chelv__documents WHERE document__name=:versionname AND document__owner=:activeuser AND document__binder=:versionbinder AND document__layer=:versionlayer AND document__chapter=:versionchapter");
                    $binderversion->bindParam(':versionname', $versionname);
                    $binderversion->bindParam(':activeuser', $activeuser);
                    $binderversion->bindParam(':versionbinder', $versionbinder);
                    $binderversion->bindParam(':versionlayer', $versionlayer);
                    $binderversion->bindParam(':versionchapter', $versionchapter);
                    $binderversion->execute();
                    $binderversionData = $binderversion->fetchAll();
                    foreach ($binderversionData as $rowversion) { 

                    ?>
                    <li class="version__item">
                        <a href="document.php?documentid=<?php echo $rowversion['document__id']; ?>" class="version__link">
                            <?php echo $rowversion['document__version']; ?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        
            <div class="versionadd__trigger">
                <button class="form__trigger version__add">
                    +
                </button>
            </div>  
        </div>
  
    </main>   

    <aside class="aside aside--link">
        <h2 class="aside__title">
            Liens utiles
        </h2>

        <div class="tease tease--link">
            <!-- show note  -->
            <?php foreach ($DocLinkData as $row) {
                include 'components/tease/tease--link.php';                    
            } ?>
        </div>

        <!-- add note  -->
        <button class="form__trigger note__add">nouveau lien</button>
    </aside>

    <!-- document -->
    <aside class="aside aside--note">

        <h2 class="aside__title aside__title--document">Les notes</h2>

        <div id="documentnotes" class="note">
            <!-- show note  -->
            <?php foreach ($DocNoteData as $row) {
                include 'components/tease/tease--note.php';                    
            } ?>
        </div>

        <!-- add note  -->
        <button class="form__trigger note__add">nouvelle note</button>
    </aside>


    <!-- form to add version -->
    <?php include 'components/form/form--version.php'; ?>

    <!-- note editor and creator -->
    <?php include 'components/form/form--link.php'; ?>

    <!-- note editor and creator -->
    <?php include 'components/form/form--note.php'; ?>

    <!-- no phone -->
    <?php include 'components/nophone/nophone.php'; ?>  
    
</body>
</html>