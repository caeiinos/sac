<?php 

include '../../utils/config.php';

$activeuser = $_SESSION['id'];

    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $ProjectQuery = "SELECT * FROM chelv__binders where binder__name LIKE '$q%' AND binder__owner='$activeuser';"; 

        $ProjectResult = mysqli_query($db, $ProjectQuery);
            
        if (mysqli_num_rows($ProjectResult) > 0) {
            while ($row = mysqli_fetch_assoc($ProjectResult)) { ?>

                <a href="binder.php?binderid=<?php echo $row["binder__id"]; ?>">
                <h4><?php echo $row["binder__name"]; ?></h4>  
                </a>
                
            <?php }
        }else {
            echo "<h6>no data found</h6>";
        }

    }
?>