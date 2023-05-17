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
                    <a class="tease__link" href="<?php echo 'chapter.php?chapterid='.$LayerChapterRow['chapter__id']; ?>">
                        <?php include '../svg/chapter.php' ?>    
                        <h4 class="tease__title tease__title--layer">
                            <?php echo $LayerChapterRow['chapter__name']; ?>
                        </h4>
                    </a>
                    <form method="POST" name="del_chap">
                        <input type="hidden" name="idtodelete" value="<?php echo $LayerChapterRow['chapter__id'] ?>">
                        <button class="chap__del" type="submit" name="del_chap">
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