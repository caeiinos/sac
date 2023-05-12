<?php 

include '../../utils/config.php';

    if (isset($_GET["k"])) {
        $k = $_GET["k"];

        $query =  $db->prepare("SELECT * FROM chelv__binders WHERE binder__owner=? ORDER BY $k"); 
        $query->execute([$_SESSION['id']]);
        foreach ($query as $row) { ?>

            <!-- fardes -->
            <a class="tease__link" href="<?php echo 'binder.php?binderid='.$row['binder__id']; ?>">
                    <span class="tease__type">farde</span>
                    <h4 class="tease__title">
                        <?php echo $row['binder__name']; ?>
                    </h4>
                    <p class="tease__description">
                        <?php echo $row['binder__description']; ?> 
                    </p>

            </a> 

        <?php }
    }
?>