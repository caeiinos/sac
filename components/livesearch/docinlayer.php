<?php 

include '../../utils/config.php';

    if (isset($_GET["y"])) {
        $y = $_GET["y"];

        $documentlayerQuery = $db->prepare("SELECT * FROM chelv__documents where document__name LIKE '$y%' AND document__layer=? AND document__owner=?"); 
        $documentlayerQuery->execute([$_GET['layerid'], $_SESSION['id']]);
        $documentlayerData = $documentlayerQuery->fetchAll();
            
        if ($documentlayerData) {
            foreach ($documentlayerData as $row) { ?>

                <a href="document.php?documentid=<?php echo $row["document__id"]; ?>">
                <h4><?php echo $row["document__name"]; ?></h4>  
                </a>
                
            <?php }
        }else {
            echo "<h6>no data found</h6>";
        }

    }
?>