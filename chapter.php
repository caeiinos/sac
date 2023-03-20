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
    $activeid = $_GET['chapterid'];

    $activeproject = mysqli_query($db, "SELECT * FROM mychapters WHERE id='$activeid';");

    $activedata = mysqli_fetch_array($activeproject);

    $pagetitle = $activedata['title'];

    // trouver les chapitres
    $activetitle = $activedata['fullname'];;

    $ProjectChild = mysqli_query($db, "SELECT * FROM mydocuments WHERE parent='$activetitle';");

    // inclure la balise head
    include 'components/head.php';

?>

    <!-- navbar -->
    <?php include 'components/nav.php'; ?>

    <h2>
        <?php echo $activedata['title']; ?>
    </h2>

    <!-- add document  -->
    <form method="POST">

        <input type="text" name="documenttitle">
        <input type="text" name="documentparent" value="<?php echo $activedata['fullname']; ?>" readonly="readonly">

        <button type="submit" name="submitdocument">add task</button>
    </form>


    <!-- show document  -->
    <h2>Document</h2>

    <?php while ($row = mysqli_fetch_array($ProjectChild)) { ?> 

        <div>
            <h2>
                <a href="<?php echo 'document.php?documentid='.$row['id']; ?>">
                    <?php echo $row['title']; ?>
                </a>
            </h2>
            <ul>
                <li>
                    <?php 
                        // projet parent
                        $projetpapa = $row['fullname'];

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