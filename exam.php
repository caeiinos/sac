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

    //fonctions pour les notes
    include 'utils/MyNotes.php';

    // trouver l'intercalaire
    $activeid = $_GET['documentid'];

    $activeproject = mysqli_query($db, "SELECT * FROM mydocuments WHERE id='$activeid';");

    $activedata = mysqli_fetch_array($activeproject);

    $pagetitle = $activedata['title'];

    // trouver les chapitres
    $activetitle = $activedata['fullname'];;

    $ProjectChild = mysqli_query($db, "SELECT * FROM mynotes WHERE parent='$activetitle';");

    // inclure la balise head
    include 'components/head.php';

?>
    
    <!-- navbar -->
    <?php include 'components/nav.php'; ?>

    <h2>
        <?php echo $activedata['title']; ?>
    </h2>

    <!-- add note  -->
    <form method="POST">

        <input type="text" name="notetitle">
        <input type="text" name="notecontent">
        <input type="text" name="noteparent" value="<?php echo $activedata['fullname']; ?>" readonly="readonly">

        <button type="submit" name="submitnote">add task</button>
    </form>

    <!-- show note  -->
    <?php while ($row = mysqli_fetch_array($ProjectChild)) { ?> 

        <div>
            <h2>
                <?php echo $row['title']; ?>
            </h2>
            <p>
                <?php echo $row['content']; ?>  
            </p>
        </div>
    <?php } ?>

    
</body>
</html>