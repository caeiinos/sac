<?php 

include '../../utils/mydata.php';
    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $ProjectQuery = "SELECT * FROM MyProjects where title LIKE '$q%'"; 

        $ProjectResult = mysqli_query($db, $ProjectQuery);

        $LayerQuery = "SELECT * FROM MyLayers where title LIKE '$q%'"; 

        $LayerResult = mysqli_query($db, $LayerQuery);

        $ChapQuery = "SELECT * FROM MyChapters where title LIKE '$q%'"; 

        $ChapResult = mysqli_query($db, $ChapQuery);

        $DocQuery = "SELECT * FROM MyDocuments where title LIKE '$q%'"; 

        $DocResult = mysqli_query($db, $DocQuery);

        while ($row = mysqli_fetch_assoc($ProjectResult)) { ?>

            <a href="projet.php?projetid=<?php echo $row["id"]; ?>">
                <h4><?php echo $row["title"]; ?></h4>  
                <p>farde</p>          
            </a>

        <?php }

        while ($row = mysqli_fetch_assoc($LayerResult)) { ?>

            <a href="layer.php?layerid=<?php echo $row["id"]; ?>">
                <h4><?php echo $row["title"]; ?></h4>  
                <p>farde</p>          
            </a>

        <?php }

        while ($row = mysqli_fetch_assoc($ChapResult)) { ?>

            <a href="chapter.php?chapterid=<?php echo $row["id"]; ?>">
                <h4><?php echo $row["title"]; ?></h4>  
                <p>farde</p>          
            </a>

        <?php }

        while ($row = mysqli_fetch_assoc($DocResult)) { ?>

            <a href="document.php?documentid=<?php echo $row["id"]; ?>">
                <h4><?php echo $row["title"]; ?></h4>  
                <p>farde</p>          
            </a>

        <?php }
     }
?>