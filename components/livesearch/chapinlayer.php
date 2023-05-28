<?php 

include '../../utils/config.php';

    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $chapterlayerQuery = $db->prepare("SELECT * FROM chelv__chapters where chapter__name LIKE '$q%' AND chapter__layer=? AND chapter__owner=?"); 
        $chapterlayerQuery->execute([$_GET['layerid'], $_SESSION['id']]);
        $chapterlayerData = $chapterlayerQuery->fetchAll();
            
        if ($chapterlayerData) {
            foreach ($chapterlayerData as $LayerChapterRow) { ?>

                <section class="tease__content">
                    <a class="tease__link <?php echo $LayerChapterRow['chapter__color']; ?>" href="<?php echo 'chapter.php?chapterid='.$LayerChapterRow['chapter__id']; ?>">
                        <?php 
                            $chaptersvg = '../svg/chapter--' . $LayerChapterRow['chapter__shape'] .'.php';
                            include $chaptersvg; 
                        ?>   
                        <h4 class="tease__title tease__title--chapter">
                            <?php echo $LayerChapterRow['chapter__name']; ?>
                        </h4>
                    </a>
                    <button class="delete__trigger">
                        <?php include '../svg/trash.php' ?>
                    </button>
                        <?php include '../delete/delete--chapter.php' ?>
                </section>

                
            <?php }
        }else { ?>
            <p class="explorer__no">
                Aucun résultat trouvé. Réessayez avec un autre recherche
            </p>
        <?php }
    }
?>