<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/DbConnect.php';

    //fonctions pour les projets
    include 'utils/Myprojects.php';

    //fonctions pour les intercalaires
    include 'utils/Mylayers.php';

    //fonctions pour les chapitres
    include 'utils/MyChapters.php';

    //fonctions pour les documents
    include 'utils/MyDocuments.php';

    //fonctions pour les examens
    include 'utils/MyExams.php';

    // trouver l'intercalaire
    $activeid = $_GET['layerid'];

    $activeproject = mysqli_query($db, "SELECT * FROM mylayers WHERE id='$activeid';");

    $activedata = mysqli_fetch_array($activeproject);

    $pagetitle = $activedata['title'];

    // trouver les chapitres
    $activetitle = $activedata['fullname'];

    $ProjectChild = mysqli_query($db, "SELECT * FROM mychapters WHERE parent='$activetitle';");

    $ChapterExams = mysqli_query($db, "SELECT * FROM myexams WHERE parent='$activetitle';");

    // inclure la balise head
    include 'components/head.php';

?>

    <!-- navbar -->
    <?php include 'components/nav.php'; ?>

    <h2>
        <?php echo $activedata['title']; ?>
    </h2>

    <h2>
        Intercalaire >>
        <span><?php echo $pagetitle ?></span>
    </h2>

    <!-- add chapter  -->
    <form method="POST">

        <input type="text" name="chaptertitle">
        <input type="text" name="chapterparent" value="<?php echo $activedata['fullname']; ?>" readonly="readonly">

        <button type="submit" name="submitchapter">add Chapter</button>
    </form>

    <!-- add exams  -->
    <form method="POST">

        <input type="text" name="examtitle">
        <input type="text" name="examparent" value="<?php echo $activedata['fullname']; ?>" readonly="readonly">

        <button type="submit" name="submitexam">add Exam</button>
    </form>

    <!-- show chapter  -->
    <?php while ($row = mysqli_fetch_array($ProjectChild)) { ?> 

        <div>
            <h2>
                <a href="<?php echo 'chapter.php?chapterid='.$row['id']; ?>">
                    <?php echo $row['title']; ?>
                </a>
            </h2>
            <ul>
                <li>
                    <?php 

                        $chapterpapa = $row['fullname'];

                        // nbr de chapitres
                        $ChildDocument = mysqli_query($db, "SELECT COUNT(title) AS documentnumber FROM mydocuments where parent LIKE '$chapterpapa%';");

                        $ChildExam = mysqli_query($db, "SELECT COUNT(title) AS examnumber FROM myexams where parent LIKE '$chapterpapa%';");

                        $documentsnumber = mysqli_fetch_array($ChildDocument);

                        $examsnumber = mysqli_fetch_array($ChildExam);

                    ?> 
                    <p>
                        documents
                    </p>
                    <p>
                        <?php echo $documentsnumber['documentnumber'] + $examsnumber['examnumber']; ?>
                    </p>
                </li>
            </ul>
        </div>
    <?php } ?>

        <!-- show chapter  -->
    <?php while ($e = mysqli_fetch_array($ChapterExams)) { ?> 

        <div>
            <h2>
                <a href="<?php echo 'chapter.php?chapterid='.$e['id']; ?>">
                    <?php echo $e['title']; ?>
                </a>
            </h2>
            <ul>
                <li>
                    <?php 
                        // projet parent
                        $projetpapa = $e['fullname'];

                        // nbr d'intercalaires
                        $noteChild = mysqli_query($db, "SELECT COUNT(title) AS notenumber FROM mynotes WHERE parent='$projetpapa';");
                    
                        $notesnumber = mysqli_fetch_array($noteChild);
                    
                     ?> 
                    <p>Notes</p>
                    <p> <?php echo $notesnumber['notenumber']; ?></p>
                </li>
            </ul>
        </div>
        <?php } ?>

    
</body>
</html>