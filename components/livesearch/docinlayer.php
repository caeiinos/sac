<?php 

include '../../utils/config.php';

    if (isset($_GET["y"])) {
        $y = $_GET["y"];

        $documentlayerQuery = $db->prepare("SELECT * FROM chelv__documents where document__name LIKE '$y%' AND document__layer=? AND document__owner=?"); 
        $documentlayerQuery->execute([$_GET['layerid'], $_SESSION['id']]);
        $documentlayerData = $documentlayerQuery->fetchAll();
            
        if ($documentlayerData) {
            foreach ($documentlayerData as $LayerDocRow) { ?>

                <a class="tease__link" href="<?php echo 'document.php?documentid='.$LayerDocRow['document__id']; ?>">
                    <h4 class="tease__title tease__title--document">
                        <?php echo $LayerDocRow['document__name']; ?>
                    </h4>
                </a>
                
            <?php }
        }else { ?>
            <p class="explorer__no">
                Aucun résultat trouvé. Réessayez avec un autre recherche
            </p>
        <?php }

    }
?>