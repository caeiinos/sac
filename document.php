<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    //connect the db
    include 'utils/notlog/notlog.php';

    // trouver l'intercalaire
    $activeid = $_GET['documentid'];

    $activeuser = $_SESSION['id'];

    $activeproject = mysqli_query($db, "SELECT * FROM chelv__documents WHERE document__id='$activeid' AND document__owner='$activeuser';");

    $activedata = mysqli_fetch_array($activeproject);

    $pagetitle = $activedata['document__name'];

    // trouver les chapitres
    $activetitle = $activedata['document__id'];;

    $ProjectChild = mysqli_query($db, "SELECT * FROM chelv__notes WHERE note__document='$activeid';");

    // inclure la balise head
    include 'components/head.php';

?>

<body class="page page--document">

    <!-- navbar -->
    <?php include 'components/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer/explorer.php'; ?>

    <!-- layer content -->
    <main class="content content--layer">
        <span class="layer__type">Intercalaire</span>
        <h1 class="layer__title">
        <?php echo $pagetitle ?>
        </h1> 
        <ul class="family">

            <?php 
                $activebinder = $activedata['document__binder'];
                $documentbinder = mysqli_query($db, "SELECT * FROM chelv__binders WHERE binder__id='$activebinder' AND binder__owner='$activeuser';");
                $binderparent = mysqli_fetch_array($documentbinder);

                $activelayer = $activedata['document__layer'];
                $documentlayer = mysqli_query($db, "SELECT * FROM chelv__layers WHERE layer__id='$activelayer' AND layer__owner='$activeuser';");
                $layerparent = mysqli_fetch_array($documentlayer);

                if ($activedata['document__haschapter']) {
                    $activechapter = $activedata['document__chapter'];
                    $documentchapter = mysqli_query($db, "SELECT * FROM chelv__chapters WHERE chapter__id='$activelayer' AND chapter__owner='$activeuser';");
                    $chapterparent = mysqli_fetch_array($documentchapter);                    
                }
            
            ?>
            <li class="family__item">
                <a href="<?php echo 'binder.php?binderid='.$binderparent['binder__id']; ?>" class="family__link">
                    <?php echo $binderparent['binder__name']; ?> 
                </a>
            </li>

            <li class="family__item">
                <a href="<?php echo 'layer.php?layerid='.$layerparent['layer__id']; ?>" class="family__link">
                <?php echo $layerparent['layer__name']; ?> 
                </a>
            </li>

            <?php if ($activedata['document__haschapter']) { ?>
                <li class="family__item">
                    <a href="<?php echo 'chapter.php?chapterid='.$chapterparent['chapter__id']; ?>" class="family__link">
                    <?php echo $chapterparent['chapter__name']; ?> 
                    </a>
                </li>
            <?php } ?>

            <li class="family__item">
                <a href="" class="family__link">
                <?php echo $pagetitle ?> 
                </a>
            </li>
        </ul> 

        <div class="layer__description">
            <p class="layer__text">

            </p>
        </div>
    </main>   

        <!-- document -->
        <aside class="aside aside--document">

            <h2 class="aside__title aside__title--document">Les notes</h2>


            <div class="note">
                <!-- show note  -->
                <?php while ($row = mysqli_fetch_array($ProjectChild)) { ?> 

                    <section class="note__content">
                        <h4 class="note__title">
                            <?php echo $row['note__name']; ?>
                        </h4>
                        <p class="note__description">
                            <?php echo $row['note__description']; ?>  
                        </p>
                </section>
                <?php } ?>
            </div>

            <!-- add note  -->
            <div class="writer">  
                <form class="writer__form" method="POST">

                    <label class="writer__label writer__label--title" for="notename">Titre</label>
                    <input class="writer__input" type="text" name="notename">
                    <label class="writer__label writer__label--description" for="notedescription">Description</label>
                    <input class="writer__input writer__input--description" type="text" name="notedescription">
                    <input class="hidden" type="text" name="notedocument" value="<?php echo $activedata['document__id']; ?>" readonly="readonly">

                    <button class="writer__submit" type="submit" name="submitnote">valider</button>
                </form>
            </div>
        </aside>
    
</body>
</html>