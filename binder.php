<?php 
    date_default_timezone_set("Europe/Brussels");


    //connect the db
    include 'utils/config.php';

    //if not log
    include 'utils/notlog/notlog.php';

    //recupére l'utilisateur
    $activeuser = $_SESSION['id'];

    // trouver le binder
    // $activeid = $_GET['binderid'];
    // $BinderActiveQuery = mysqli_query($db, "SELECT * FROM chelv__binders WHERE binder__id='$activeid';");
    // $BinderActiveData = mysqli_fetch_array($BinderActiveQuery);

    $BinderActiveData = $db->prepare("SELECT * FROM chelv__binders WHERE binder__id = ? AND binder__owner = '$activeuser'");
    $BinderActiveData->execute([$_GET['binderid']]);
    // find pagetitle
    $pagetitle = $BinderActiveData->fetchColumn(1);
    //find base for explorer
    $BinderActiveData->execute([$_GET['binderid']]);
    $ExplorerBase = $BinderActiveData->fetchColumn(6);

    //recupére les projets de l'utilisateur
    $BinderLayerData = $db->prepare("SELECT * FROM chelv__layers WHERE layer__binder = ? AND layer__owner='$activeuser';");
    $BinderLayerData->execute([$_GET['binderid']]);
    // update the date
    $NewModified = date('Y-m-d H:i:s');
    $BinderActiveUpdate = $db->prepare("UPDATE chelv__binders SET binder__opened = ? WHERE binder__id = ?");
    $BinderActiveUpdate->execute([$NewModified, $_GET['binderid']]);
    //403 and 404
    // if (mysqli_num_rows($BinderActiveQuery)== 0) {
    //     header("Location: 404.php");
    // } else if ($activeuser != $BinderActiveData['binder__owner']) {
    //     header("Location: 403.php");
    // }

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
        <?php 
        $BinderActiveData->execute([$_GET['binderid']]);
        foreach ($BinderActiveData as $BinderContent) { ?>
            <span class="binder__type">Farde</span>
            <h1 class="binder__title">
            <?php echo $BinderContent['binder__name']; ?>
            </h1> 
            <ul class="family">
                <li class="family__item">
                    <a href="" class="family__link">
                    <?php echo $BinderContent['binder__name']; ?> 
                    </a>
                </li>
            </ul> 
            <form class="binder__modifie" method="POST">
                <input name="binderidtoupdate" value="<?php echo $activeid ?>" type="hidden">
                <input name="binderdescriptionupdate" value="" type="hidden">
                <div id="binder-update" class="oui">
                    <?php echo $BinderContent['binder__description']; ?> 
                </div>
                <button type="submit" name="updatebinder">let's go</button> 
            </form>
        <?php } ?>

    </main>      

    <!-- layer -->
    <aside class="aside aside--layer">

        <h2 class="aside__title aside__title--layer">Les intercalaires</h2>

        <!-- add layer /components -->
        <?php include 'components/form/form--layer.php'; ?>
        <!-- every layer -->
        <form class="BinderLayer__form" action="search.php" method="get">
            <!-- layer search -->
            <input class="BinderLayer__search"  type="text" name="search" placeholder="Search...">
            <div id="binderlayers" class="tease">
                <!-- show layer components -->
                <?php 
                    $BinderLayerData->execute([$_GET['binderid']]);
                    foreach ($BinderLayerData as $row) {
                        include 'components/tease/tease--layer.php';
                    }
                ?>
            </div>
        </form>
        

    </aside>


        <!-- show content -->

        


    
</body>
</html>