<section class="tease__content">
    <a class="tease__link" href="<?php echo 'chapter.php?chapterid='.$LayerChapterRow['chapter__id']; ?>">
        <?php include 'components/svg/chapter.php' ?>    
        <h4 class="tease__title tease__title--layer">
            <?php echo $LayerChapterRow['chapter__name']; ?>
        </h4>
    </a>
    <form method="POST" name="del_chap">
        <input type="hidden" name="idtodelete" value="<?php echo $LayerChapterRow['chapter__id'] ?>">
        <button class="chap__del" type="submit" name="del_chap">
            <?php include 'components/svg/trash.php' ?>
        </button>  
    </form>  
</section>
