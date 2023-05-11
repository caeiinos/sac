<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    //connect the db
    include 'utils/notlog/notlog.php';

    // find the chapter
    $activeid = $_GET['chapterid'];
    $ChapterActiveQuery = mysqli_query($db, "SELECT * FROM chelv__chapters WHERE chapter__id='$activeid';");
    $ChapterActiveData = mysqli_fetch_array($ChapterActiveQuery);
   // find pagetitle
    $pagetitle = $ChapterActiveData['chapter__name'];
    //find base for explorer
    $ExplorerBase = $ChapterActiveData['explorer__base'];

    // trouver les chapitres
    $activeuser = $_SESSION['id']; 
    $ChapterDocQuery = mysqli_query($db, "SELECT * FROM chelv__documents WHERE document__chapter='$activeid' AND document__owner='$activeuser' AND document__version='default';");

    // update the date
    $NewModified = date('Y-m-d H:i:s');
    mysqli_query($db, "UPDATE chelv__chapters SET chapter__opened = '$NewModified' WHERE chapter__id='$activeid';");   

    // inclure la balise head
    include 'components/head/head.php';

?>

<body class="page page--chapitre">

    <!-- navbar -->
    <?php include 'components/nav/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer/explorer.php'; ?>

    <!-- layer content -->
    <main class="content content--layer">
        <span class="layer__type">Intercalaire</span>
        <h1 class="layer__title">
        <?php echo $pagetitle ?>
        </h1> 
        <!-- get family -->
        <?php include 'components/family/family--chapter.php'; ?> 
    </main>   

    <!-- document -->
    <aside class="aside aside--document">

        <h2 class="aside__title aside__title--document">Les intercalaires</h2>
        <!-- add document  -->
        <div class="aside__add aside__add--document aside__item aside__item--document">
            <button class="aside__trigger aside__trigger--add">
                <p>Nouveau document</p>
            </button>

            <!-- form to add document -->
            <?php include 'components/form/form--docinchap.php'; ?>
        </div>

        <form class="chapterdocuments__form" action="search.php" method="get">
            <input class="chapterdocuments__search"  type="text" name="search" placeholder="Search...">
            <div id="chapterdocuments" class="tease">
                <!-- show document  -->
                <?php while ($ChapterDocRow = mysqli_fetch_array($ChapterDocQuery)) { 
                    include 'components/tease/tease--docinchap.php'; 
                } ?>
            </div>
        </form>
    </aside>


</body>
</html>