<?php 
    date_default_timezone_set("Europe/Brussels");


    //connect the db
    include 'utils/config.php';

    //if not log
    include 'utils/notlog/notlog.php';

    // trouver le binder
    $activeid = $_GET['binderid'];

    $activebinder = mysqli_query($db, "SELECT * FROM chelv__binders WHERE binder__id='$activeid';");

    $activedata = mysqli_fetch_array($activebinder);

    $pagetitle = $activedata['binder__name'];

    // trouver les chapitres
    $activetitle = $activedata['binder__name'];

    //recupére les projets de l'utilisateur
    $activeuser = $_SESSION['id'];
    $binderLayers = mysqli_query($db, "SELECT * FROM chelv__layers WHERE layer__binder='$activeid' AND layer__owner='$activeuser';");

    $NewModified = date('Y-m-d H:i:s');

    mysqli_query($db, "UPDATE chelv__binders SET binder__opened = '$NewModified' WHERE binder__id='$activeid';");   

    // inclure la balise head
    include 'components/head.php';
?>

<body class="page page--binders">
    
    <!-- navbar -->
    <?php include 'components/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer/explorer.php'; ?>

    <!-- binder content -->
    <main class="content content--binder">
        <span class="binder__type">Farde</span>
        <h1 class="binder__title">
        <?php echo $pagetitle ?>
        </h1> 
        <ul class="family">
            <li class="family__item">
                <a href="" class="family__link">
                <?php echo $pagetitle ?> 
                </a>
            </li>
        </ul> 
        <div class="binder__description">
            <p class="binder__text">

            </p>
        </div>
    </main>      

    <!-- layer -->
    <aside class="aside aside--layer">

        <h2 class="aside__title aside__title--layer">Les intercalaires</h2>

        <!-- add layer  -->
        <div class="aside__add aside__add--layer aside__item aside__item--layer">
            <button class="aside__trigger aside__trigger--add">
                <p>Nouvelle Intercalaire</p>
            </button>

            <form class="aside__addform aside__addform--layer" method="POST">
                <label class="aside__addlabel aside__addlabel--title" for="layername">Titre</label>
                <input class="aside__addinput aside__addinput--title" type="text" name="layername">
                <input class="hidden" type="text" name="layerbinder" value="<?php echo $activedata['binder__id']; ?>" readonly="readonly">

                <button  class="aside__addsubmit"  type="submit" name="submitlayer">valider</button>
            </form>
        </div>
        
        <div class="tease">
            <!-- show layer  -->
            <?php while ($row = mysqli_fetch_array($binderLayers)) { ?> 
                    <a class="tease__link" href="<?php echo 'layer.php?layerid='.$row['layer__id']; ?>">
                        <h4 class="tease__title tease__title--layer">
                            <?php echo $row['layer__name']; ?>
                        </h4>
                    </a>
            <?php } ?>
        </div>
    </aside>


        <!-- show content -->

        


    
</body>
</html>