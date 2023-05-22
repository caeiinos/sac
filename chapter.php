<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    //connect the db
    include 'utils/notlog/notlog.php';

    //recupére l'utilisateur
    $activeuser = $_SESSION['id'];

    // find the chapter
    $ChapterActiveQuery = $db->prepare("SELECT * FROM chelv__chapters WHERE chapter__id=?");
    $ChapterActiveQuery->execute([$_GET['chapterid']]);
    $ChapterActiveData = $ChapterActiveQuery->fetch();
    // find pagetitle
    $pagetitle = $ChapterActiveData['chapter__name'];
    //find base for explorer
    $ExplorerBase = $ChapterActiveData['chapter__binder'];

    // trouver les chapitres
    $ChapterDocQuery = $db->prepare("SELECT * FROM chelv__documents WHERE document__chapter=? AND document__owner='$activeuser' AND document__version='default';");
    $ChapterDocQuery->execute([$_GET['chapterid']]);
    $ChapterDocData = $ChapterDocQuery->fetchAll();
    // update the date
    $NewModified = date('Y-m-d H:i:s');
    $ChapterActiveUpdate = $db->prepare("UPDATE chelv__chapters SET chapter__opened = ? WHERE chapter__id=?");   
    $ChapterActiveUpdate->execute([$NewModified, $_GET['chapterid']]);
    //403 and 404
    if (!$ChapterActiveData) {
        header("Location: 404.php");
    } else if ($activeuser != $ChapterActiveData['chapter__owner']) {
        header("Location: 403.php");
    }

    // inclure la balise head
    include 'components/head/head.php';

?>

<body class="page page--chapitre">

    <!-- navbar -->
    <?php include 'components/nav/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer/explorer.php'; ?>

    <!-- layer content -->
    <main class="content content--chapter">
        <span class="layer__type">Chapitre</span>
        <h1 class="layer__title">
        <?php echo $pagetitle ?>
        </h1> 
        <!-- get family -->
        <?php include 'components/family/family--chapter.php'; ?> 
    </main>   

    <!-- document -->
    <aside class="aside aside--document">

        <h2 class="aside__title aside__title--document">Les documents</h2>

        <form class="chapterdocuments__form" method="get">
            <input class="chapterdocuments__search"  type="text" name="search" placeholder="rechercher...">
        </form>

        <div id="chapterdocuments" class="tease">
            <!-- show document  -->
            <?php foreach ($ChapterDocData as $ChapterDocRow) { 
                include 'components/tease/tease--docinchap.php'; 
            } ?>
        </div>

        <!-- add document  -->
        <button class="form__trigger aside__trigger aside__trigger--add">
            <p>Nouveau document</p>
        </button>
    </aside>

    <!-- form to add document -->
    <?php include 'components/form/form--docinchap.php'; ?>

    <!-- no phone -->
    <?php include 'components/nophone/nophone.php'; ?>  

</body>
</html>