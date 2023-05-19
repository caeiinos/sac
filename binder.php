<?php 
    date_default_timezone_set("Europe/Brussels");


    //connect the db
    include 'utils/config.php';

    //if not log
    include 'utils/notlog/notlog.php';

    //recupére l'utilisateur
    $activeuser = $_SESSION['id'];

    $BinderActiveQuery = $db->prepare("SELECT * FROM chelv__binders WHERE binder__id = ?");
    $BinderActiveQuery->execute([$_GET['binderid']]);
    $BinderActiveData = $BinderActiveQuery->fetch();
    // find pagetitle
    $pagetitle = $BinderActiveData['binder__name'];
    //find base for explorer
    $ExplorerBase = $BinderActiveData['binder__id'];

    //recupére les projets de l'utilisateur
    $BinderLayerQuery = $db->prepare("SELECT * FROM chelv__layers WHERE layer__binder = ? AND layer__owner='$activeuser';");
    $BinderLayerQuery->execute([$_GET['binderid']]);
    $BinderLayerData = $BinderLayerQuery->fetchAll();
    // update the date
    $NewModified = date('Y-m-d H:i:s');
    $BinderActiveUpdate = $db->prepare("UPDATE chelv__binders SET binder__opened = ? WHERE binder__id = ?");
    $BinderActiveUpdate->execute([$NewModified, $_GET['binderid']]);
    //403 and 404
    if (!$BinderActiveData) {
        header("Location: 404.php");
    } else if ($activeuser != $BinderActiveData['binder__owner']) {
        header("Location: 403.php");
    }

    // inclure la balise head
    include 'components/head/head.php';
?>

<body class="page page--binders">
    
    <!-- navbar -->
    <?php include 'components/nav/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer/explorer.php'; ?>

    <!-- binder content -->
    <main class="content content--binder">
        <div class="binder__head">
            <span class="binder__type">Farde</span>
            <h1 class="binder__title">
            <?php echo $BinderActiveData['binder__name']; ?>
            </h1> 
            <ul class="family">
                <li class="family__item">
                    <a href="" class="family__link">
                    <?php echo $BinderActiveData['binder__name']; ?> 
                    </a>
                </li>
            </ul> 
        </div>

        <form class="binder__modifie" method="POST">
            <input name="binderidtoupdate" value="<?php echo $BinderActiveData['binder__id'] ?>" type="hidden">
            <input name="binderdescriptionupdate" value="" type="hidden">
            <div id="binder-update" class="oui">
                <?php echo $BinderActiveData['binder__description']; ?> 
            </div>
            <button class="modifie__submit--binder" type="submit" name="updatebinder">Sauvegarder</button> 
        </form>

    </main>      

    <!-- layer -->
    <aside class="aside aside--layer">

        <h2 class="aside__title aside__title--layer">Les intercalaires</h2>

        <!-- every layer -->
        <form class="BinderLayer__form" action="search.php" method="get">
            <!-- layer search -->
            <input class="BinderLayer__search"  type="text" name="search" placeholder="rechercher...">

        </form>

        <div id="binderlayers" class="tease">
            <!-- show layer components -->
            <?php 
                foreach ($BinderLayerData as $row) {
                    include 'components/tease/tease--layer.php';
                }
            ?>
        </div>       
        
        <button class="form__trigger aside__trigger aside__trigger--add">
            <p>Nouvelle Intercalaire</p>
        </button>
    </aside>

    <!-- add layer /components -->
    <?php include 'components/form/form--layer.php'; ?>    

    <!-- no phone -->
    <?php include 'components/nophone/nophone.php'; ?>    

    
</body>
</html>