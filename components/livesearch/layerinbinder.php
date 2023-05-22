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
                    <a class="tease__link tease__link--layer" href="<?php echo 'layer.php?layerid='.$row['layer__id']; ?>">
                        <?php include '../svg/layer.php' ?>
                        <h4 class="tease__title tease__title--layer">
                            <?php echo $row['layer__name']; ?>
                        </h4>
                    </a>
                    <form method="POST" name="del_layer">
                        <input type="hidden" name="idtodelete" value="<?php echo $row['layer__id'] ?>">
                        <button class="layer__del" type="submit" name="del_layer">
                            <?php include '../svg/trash.php' ?>
                        </button>  
                    </form>    
                </section>
                
            <?php }
        }else { ?>
            <p class="explorer__no">
                Aucun résultat trouvé. Réessayez avec un autre recherche
            </p>
        <?php }

    }
?>