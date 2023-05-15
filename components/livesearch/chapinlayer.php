<?php 

include '../../utils/config.php';

    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $chapterlayerQuery = $db->prepare("SELECT * FROM chelv__chapters where chapter__name LIKE '$q%' AND chapter__layer=? AND chapter__owner=?"); 
        $chapterlayerQuery->execute([$_GET['layerid'], $_SESSION['id']]);
        $chapterlayerData = $chapterlayerQuery->fetchAll();
            
        if ($chapterlayerData) {
            foreach ($chapterlayerData as $LayerChapterRow) { ?>

                <a class="tease__link" href="<?php echo 'chapter.php?chapterid='.$LayerChapterRow['chapter__id']; ?>">
                    <h4 class="tease__title tease__title--layer">
                        <?php echo $LayerChapterRow['chapter__name']; ?>
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