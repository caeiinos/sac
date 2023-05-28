<?php 

include '../../utils/config.php';

    if (isset($_GET["y"])) {
        $y = $_GET["y"];

        $documentlayerQuery = $db->prepare("SELECT * FROM chelv__documents where document__name LIKE '$y%' AND document__layer=? AND document__owner=? AND document__haschapter=0"); 
        $documentlayerQuery->execute([$_GET['layerid'], $_SESSION['id']]);
        $documentlayerData = $documentlayerQuery->fetchAll();
            
        if ($documentlayerData) {
            foreach ($documentlayerData as $LayerDocRow) { ?>

                <section class="tease__content">
                    <a class="tease__link <?php echo $LayerDocRow['document__color']; ?>" href="<?php echo 'document.php?documentid='.$LayerDocRow['document__id']; ?>">
                        <?php 
                            $docsvg = '../svg/document--' . $LayerDocRow['document__shape'] .'.php';
                            include $docsvg; 
                        ?>
                        <h4 class="tease__title tease__title--document">
                            <?php echo $LayerDocRow['document__name']; ?>
                        </h4>
                    </a>
                    <button class="delete__trigger">
                        <?php include '../svg/trash.php' ?>
                    </button>
                        <?php include '../delete/delete--document.php' ?>
                </section>
                
            <?php }
        }else { ?>
            <p class="explorer__no">
                Aucun résultat trouvé. Réessayez avec un autre recherche
            </p>
        <?php }

    }
?>