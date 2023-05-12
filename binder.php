<?php 
    date_default_timezone_set("Europe/Brussels");


    //connect the db
    include 'utils/config.php';

    //if not log
    include 'utils/notlog/notlog.php';

    // trouver le binder
    $activeid = $_GET['binderid'];
    $BinderActiveQuery = mysqli_query($db, "SELECT * FROM chelv__binders WHERE binder__id='$activeid';");
    $BinderActiveData = mysqli_fetch_array($BinderActiveQuery);
    // find pagetitle
    $pagetitle = $BinderActiveData['binder__name'];
    //find base for explorer
    $ExplorerBase = $BinderActiveData['explorer__base'];

    //recupére les projets de l'utilisateur
    $activeuser = $_SESSION['id'];
    $BinderLayerQuery = mysqli_query($db, "SELECT * FROM chelv__layers WHERE layer__binder='$activeid' AND layer__owner='$activeuser';");

    // update the date
    $NewModified = date('Y-m-d H:i:s');
    mysqli_query($db, "UPDATE chelv__binders SET binder__opened = '$NewModified' WHERE binder__id='$activeid';");   

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
        <span class="binder__type">Farde</span>
        <h1 class="binder__title">
        <?php echo $BinderActiveData['binder__name'] ?>
        </h1> 
        <ul class="family">
            <li class="family__item">
                <a href="" class="family__link">
                <?php echo $BinderActiveData['binder__name'] ?> 
                </a>
            </li>
        </ul> 
        <form class="binder__modifie" method="POST">
            <input name="binderidtoupdate" value="<?php echo $activeid ?>" type="hidden">
            <input name="binderdescriptionupdate" value="" type="hidden">
            <div id="binder-update" class="oui">
                <?php echo $BinderActiveData['binder__description']; ?> 
            </div>
            <button type="submit" name="updatebinder">let's go</button> 
        </form>
    </main>      

    <!-- layer -->
    <aside class="aside aside--layer">

        <h2 class="aside__title aside__title--layer">Les intercalaires</h2>

        <!-- add layer /components -->
        <?php include 'components/form/form--layer.php'; ?>

        <!-- every layer -->
        <form class="BinderLayerQuery__form" action="search.php" method="get">
            <!-- layer search -->
            <input class="BinderLayerQuery__search"  type="text" name="search" placeholder="Search...">
            <div id="BinderLayerQuery" class="tease">
                <!-- show layer components -->
                <?php 
                    while ($row = mysqli_fetch_array($BinderLayerQuery)) {
                        include 'components/tease/tease--layer.php';
                    }
                ?>
            </div>
        </form>
        

    </aside>


        <!-- show content -->

        


    
</body>
</html>