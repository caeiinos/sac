<?php 

include '../../utils/config.php';

// trouver l'intercalaire
$activeid = $_GET['chapterid'];

$activeuser = $_SESSION['id'];

    if (isset($_GET["y"])) {
        $y = $_GET["y"];

        $documentchapterQuery = "SELECT * FROM chelv__documents where document__name LIKE '$y%' AND document__chapter='$activeid' AND document__owner='$activeuser';"; 

        $documentchapterResult = mysqli_query($db, $documentchapterQuery);
            
        if (mysqli_num_rows($documentchapterResult) > 0) {
            while ($row = mysqli_fetch_assoc($documentchapterResult)) { ?>

                <a href="document.php?documentid=<?php echo $row["document__id"]; ?>">
                <h4><?php echo $row["document__name"]; ?></h4>  
                </a>
                
            <?php }
        }else {
            echo "<h6>no data found</h6>";
        }

    }
?>