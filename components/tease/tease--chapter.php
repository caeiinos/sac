<section class="tease__content">
    <a class="tease__link" href="<?php echo 'chapter.php?chapterid='.$LayerChapterRow['chapter__id']; ?>">
        <?php include 'components/svg/chapter.php' ?>    
        <h4 class="tease__title tease__title--chapter">
            <?php echo $LayerChapterRow['chapter__name']; ?>
        </h4>
    </a>
    <button class="delete__trigger">
        <?php include 'components/svg/trash.php' ?>
    </button>
        <?php include 'components/delete/delete--chapter.php' ?>
</section>
