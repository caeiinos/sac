<?php 

include '../../utils/config.php';

// trouver l'intercalaire
$activeid = $_GET['chapterid'];

$activeuser = $_SESSION['id'];

    if (isset($_GET["y"])) {
        $y = $_GET["y"];

        $documentchapterQuery = $db->prepare("SELECT * FROM chelv__documents where document__name LIKE '$y%' AND document__chapter=? AND document__owner=?"); 
        $documentchapterQuery->execute([$_GET['chapterid'], $_SESSION['id']]);
        $documentchapterData = $documentchapterQuery->fetchAll();
            
        if ($documentchapterData) {
            foreach ($documentchapterData as $row) { ?>

                <a href="document.php?documentid=<?php echo $row["document__id"]; ?>">
                <h4><?php echo $row["document__name"]; ?></h4>  
                </a>
                
            <?php }
        }else {
            echo "<h6>no data found</h6>";
        }

    }
?>