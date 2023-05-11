<?php 

include '../../utils/config.php';

$activeid = $_GET['documentid'];

$activeuser = $_SESSION['id'];

    if (isset($_GET["y"])) {
        $y = $_GET["y"];

        $documentlayerQuery = "SELECT * FROM chelv__documents where document__name LIKE '$y%' AND document__layer='$activeid' AND document__owner='$activeuser';"; 

        $documentlayerResult = mysqli_query($db, $documentlayerQuery);
            
        if (mysqli_num_rows($documentlayerResult) > 0) {
            while ($row = mysqli_fetch_assoc($documentlayerResult)) { ?>

                <a href="document.php?documentid=<?php echo $row["document__id"]; ?>">
                <h4><?php echo $row["document__name"]; ?></h4>  
                </a>
                
            <?php }
        }else {
            echo "<h6>no data found</h6>";
        }

    }
?>