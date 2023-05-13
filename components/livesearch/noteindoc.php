<?php 

include '../../utils/config.php';

// trouver l'intercalaire
    if (isset($_GET["y"])) {
        $y = $_GET["y"];

        $documentnoteQuery = $db->prepare("SELECT * FROM chelv__notes where note__description LIKE '%$y%' AND note__document=? AND note__owner=?"); 
        $documentnoteQuery->execute([$_GET['documentid'], $_SESSION['id']]);
        $documentnoteData = $documentnoteQuery->fetchAll();
            
        if ($documentnoteData) {
            foreach ($documentnoteData as $row) { ?>

                <section class="note__content">
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