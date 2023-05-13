<?php 

include '../../utils/config.php';

    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $chapterlayerQuery = $db->prepare("SELECT * FROM chelv__chapters where chapter__name LIKE '$q%' AND chapter__layer=? AND chapter__owner=?"); 
        $chapterlayerQuery->execute([$_GET['layerid'], $_SESSION['id']]);
        $chapterlayerData = $chapterlayerQuery->fetchAll();
            
        if ($chapterlayerData) {
            foreach ($chapterlayerData as $row) { ?>

                <a href="chapter.php?chapterid=<?php echo $row["chapter__id"]; ?>">
                <h4><?php echo $row["chapter__name"]; ?></h4>  
                </a>
                
            <?php }
        }else {
            echo "<h6>no data found</h6>";
        }
    }
?>