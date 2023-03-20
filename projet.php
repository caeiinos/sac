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

    // trouver le projet
    $activeid = $_GET['projetid'];

    $activeproject = mysqli_query($db, "SELECT * FROM myprojects WHERE id='$activeid';");

    $activedata = mysqli_fetch_array($activeproject);

    $pagetitle = $activedata['title'];

    // trouver les chapitres
    $activetitle = $activedata['title'];

    $ProjectChild = mysqli_query($db, "SELECT * FROM mylayers WHERE parent='$activetitle';");

    // inclure la balise head
    include 'components/head.php';
?>
    
    <!-- navbar -->
    <?php include 'components/nav.php'; ?>

    <h2>
        <?php echo $activedata['title']; ?>
    </h2>

    <!-- add layer  -->
    <form method="POST">

        <input type="text" name="layertitle">
        <input type="text" name="layerparent" value="<?php echo $activedata['title']; ?>" readonly="readonly">

        <button type="submit" name="submitlayer">add task</button>
    </form>

    <!-- show layer  -->
    <?php while ($row = mysqli_fetch_array($ProjectChild)) { ?> 

        <div>
            <h2>
                <a href="<?php echo 'layer.php?layerid='.$row['id']; ?>">
                    <?php echo $row['title']; ?>
                </a>
            </h2>
            <ul>
                <li>
                    <?php 
                        $layerpapa = $row['fullname'];

                        $ChildChapter= mysqli_query($db, "SELECT COUNT(title) AS chapternumber FROM mychapters WHERE parent='$layerpapa';");

                        $chaptersnumber = mysqli_fetch_array($ChildChapter);
                     ?> 
                    <p>chapitres</p>
                    <p><?php echo $chaptersnumber['chapternumber']; ?></p>
                </li>

                
                <li>
                    <?php 

                        // nbr de chapitres
                        $ChildDocument = mysqli_query($db, "SELECT COUNT(title) AS documentnumber FROM mydocuments where parent LIKE '$layerpapa%';");
                    
                        $ChildExam = mysqli_query($db, "SELECT COUNT(title) AS examnumber FROM myexams where parent LIKE '$layerpapa%';");

                        $documentsnumber = mysqli_fetch_array($ChildDocument);

                        $examsnumber = mysqli_fetch_array($ChildExam);
                    
                     ?> 
                    <p>
                        documents
                    </p>
                    <p>
                        <?php echo $documentsnumber['documentnumber'] + $examsnumber['examnumber']; ?>
                    </p>
            </ul>
        </div>
    <?php } ?>

    
</body>
</html>