<?php 

include '../../utils/mydata.php';

    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $ProjectQuery = "SELECT * FROM MyProjects where title LIKE '$q%'"; 

        $ProjectResult = mysqli_query($db, $ProjectQuery);
            
        if (mysqli_num_rows($ProjectResult) > 0) {
            while ($row = mysqli_fetch_assoc($ProjectResult)) { ?>

                <a href="projet.php?projetid=<?php echo $row["id"]; ?>">
                <h4><?php echo $row["title"]; ?></h4>  
                </a>
                
            <?php }
        }else {
            echo "<h6>no data found</h6>";
        }

    }
?>