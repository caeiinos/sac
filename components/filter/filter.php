<?php 

include '../../utils/config.php';

    if (isset($_GET["k"])) {
        $k = $_GET["k"];

        $query =  $db->prepare("SELECT * FROM chelv__binders WHERE binder__owner=? ORDER BY $k"); 
        $query->execute([$_SESSION['id']]);
        foreach ($query as $row) { ?>

            <!-- Classeurs -->
            <a class=" tease__link--binder" href="<?php echo 'binder.php?binderid='.$row['binder__id']; ?>">
                <span class=" tease__type--binder">Classeur</span>
                <h4 class=" tease__title--binder">
                    <?php echo $row['binder__name']; ?>
                </h4>
                <p>
                    dernière ouverture : <?php echo $row['binder__opened']; ?> 
                </p>
            </a> 

        <?php }
    }
?>