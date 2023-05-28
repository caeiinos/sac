<?php 

include '../../utils/config.php';

$activeid = $_GET['binderid'];

$activeuser = $_SESSION['id'];
    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $layerbinderQuery = $db->prepare("SELECT * FROM chelv__layers where layer__name LIKE '$q%' AND layer__binder='$activeid' AND layer__owner='$activeuser'"); 
        $layerbinderQuery->execute();
            
        if ($layerbinderQuery->fetchcolumn() > 0) {
            $layerbinderQuery->execute();
            foreach ($layerbinderQuery as $row) { ?>

                <section class="tease__content">
                    <a class="tease__link tease__link--layer <?php echo $row['layer__color']; ?>" href="<?php echo 'layer.php?layerid='.$row['layer__id']; ?>">
                        <?php 
                            $layersvg = '../svg/layer--' . $row['layer__shape'] .'.php';
                            include $layersvg; 
                        ?>
                        <h4 class="tease__title tease__title--layer">
                            <?php echo $row['layer__name']; ?>
                        </h4>
                    </a>
                    <button class="delete__trigger">
                        <?php include '../svg/trash.php' ?>
                    </button>
                        <?php include '../delete/delete--layer.php' ?>

                </section>
                
            <?php }
        }else { ?>
            <p class="explorer__no">
                Aucun résultat trouvé. Réessayez avec un autre recherche
            </p>
        <?php }

    }
?>