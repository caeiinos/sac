<?php 

include '../../utils/config.php';

    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $ProjectQuery = $db->prepare("SELECT * FROM chelv__binders where binder__name LIKE '$q%' AND binder__owner=?"); 
        $ProjectQuery->execute([$_SESSION['id']]);
        $ProjectData = $ProjectQuery->fetchAll();
            
        if ($ProjectData ) {
            foreach ($ProjectData as $row) { ?>

                <a href="binder.php?binderid=<?php echo $row["binder__id"]; ?>">
                <h4><?php echo $row["binder__name"]; ?></h4>  
                </a>
                
            <?php }
        }else {
            echo "<h6>no data found</h6>";
        }

    }
?>