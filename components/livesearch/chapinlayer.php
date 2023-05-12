<?php 

include '../../utils/config.php';

    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $chapterlayerQuery = "SELECT * FROM chelv__chapters where chapter__name LIKE '$q%'"; 

        $chapterlayerResult = mysqli_query($db, $chapterlayerQuery);
            
        if (mysqli_num_rows($chapterlayerResult) > 0) {
            while ($row = mysqli_fetch_assoc($chapterlayerResult)) { ?>

                <a href="chapter.php?chapterid=<?php echo $row["chapter__id"]; ?>">
                <h4><?php echo $row["chapter__name"]; ?></h4>  
                </a>
                
            <?php }
        }else {
            echo "<h6>no data found</h6>";
        }

    }
?>