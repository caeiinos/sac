<?php 

include '../../utils/config.php';

// trouver l'intercalaire
$activeid = $_GET['documentid'];

$activeuser = $_SESSION['id'];

    if (isset($_GET["y"])) {
        $y = $_GET["y"];

        $documentnoteQuery = "SELECT * FROM chelv__notes where note__name LIKE '$y%' AND note__document='$activeid' AND note__owner='$activeuser';"; 

        $documentnoteResult = mysqli_query($db, $documentnoteQuery);
            
        if (mysqli_num_rows($documentnoteResult) > 0) {
            while ($row = mysqli_fetch_assoc($documentnoteResult)) { ?>

                <section class="note__content">
                    <h4 class="note__title">
                        <?php echo $row['note__name']; ?>
                    </h4>
                    <p class="note__description">
                        <?php echo $row['note__description']; ?>  
                    </p>
                </section>
                
            <?php }
        }else {
            echo "<h6>no data found</h6>";
        }

    }
?>