<?php 

include '../../utils/config.php';

    if (isset($_GET["k"])) {
        $k = $_GET["k"];

        $query = "SELECT * FROM chelv__binders ORDER BY $k"; 

        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_array($result)) { ?>

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