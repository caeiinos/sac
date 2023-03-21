<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/DbConnect.php';

    //fonctions pour les projets
    include 'utils/Myprojects.php';

    //fonctions pour les intercalaires
    include 'utils/MyLayers.php';

    //fonctions pour les chapitres
    include 'utils/MyChapters.php';

    //fonctions pour les documents
    include 'utils/MyDocuments.php';

    //fonctions pour les examens
    include 'utils/MyExams.php';

    // inclure la balise head
    include 'components/head.php';

?>
    
    <!-- navbar -->
    <?php include 'components/nav.php'; ?>

    <div>
        <ul>
            <?php foreach ($ProjectsData as $row) { ?>
            <li>
                <a href="<?php echo 'projet.php?projetid='.$row['id']; ?>">
                    <?php echo $row['title']; ?>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>


    <h2>
        Accueil
    </h2>

    <form method="POST" action="index.php">

        <input type="text" name="projecttitle">
        <input type="text" name="projectdescription">

        <button type="submit" name="submitproject">add task</button>
    </form>

    <?php foreach ($ProjectsData as $row) { ?>

        <!-- projets -->
        <div>
            <h2>
                <a href="<?php echo 'projet.php?projetid='.$row['id']; ?>">
                    <?php echo $row['title']; ?>
                </a>            
            </h2>
            <p>
                <?php echo $row['description']; ?> 
            </p>

            <ul>            
                <!-- intercalaires -->
                <li>
                    <?php 
                        // projet parent
                        $projetpapa = $row['title'];

                        // nbr d'intercalaires
                        $ChildLayers = mysqli_query($db, "SELECT COUNT(title) AS layernumber FROM mylayers WHERE parent='$projetpapa';");
                    
                        $layersnumber = mysqli_fetch_array($ChildLayers);
                    
                     ?> 
                    <p>
                        Intercalaires
                    </p>
                    <p>
                        <?php echo $layersnumber['layernumber']; ?>
                    </p>
                </li>
                <!-- chapitres -->
                <li>
                    <?php 

                        // nbr de chapitres
                        $ChildChapter = mysqli_query($db, "SELECT COUNT(title) AS chapternumber FROM mychapters where parent LIKE '$projetpapa%';");
                    
                        $chaptersnumber = mysqli_fetch_array($ChildChapter);
                    
                     ?> 
                    <p>
                        Chapitres
                    </p>
                    <p>
                        <?php echo $chaptersnumber['chapternumber']; ?>
                    </p>
                </li>

                <li>
                    <?php 

                        // nbr de chapitres
                        $ChildDocument = mysqli_query($db, "SELECT COUNT(title) AS documentnumber FROM mydocuments where parent LIKE '$projetpapa%';");
                    
                        $ChildExam = mysqli_query($db, "SELECT COUNT(title) AS examnumber FROM myexams where parent LIKE '$projetpapa%';");

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

                <li>
                    <p>Création</p>
                    <p><?php echo $row['creation']; ?></p>
                </li>
            </ul>
        </div>

    <?php } ?>
    
</body>
</html>