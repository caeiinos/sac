<?php 

include '../../utils/config.php';

$activeid = $_GET['binderid'];

$activeuser = $_SESSION['id'];
    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $layerbinderQuery = $db->prepare("SELECT * FROM chelv__layers where layer__name LIKE '$q%' AND layer__binder='$activeid' AND layer__owner='$activeuser'"); 
        $layerbinderQuery->execute();
            
        if ($layerbinderQuery->fetchcolumn() > 0) {
            $layerbinderQuery->execute();
            foreach ($layerbinderQuery as $row) { ?>

                <a href="layer.php?layerid=<?php echo $row["layer__id"]; ?>">
                <h4><?php echo $row["layer__name"]; ?></h4>  
                </a>
                
            <?php }
        }else {
            echo "<h6>no data found</h6>";
        }

    }
?>