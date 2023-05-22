<section class="tease__content">
    <a class="tease__link" href="<?php echo 'document.php?documentid='.$ChapterDocRow['document__id']; ?>">
        <?php include 'components/svg/document.php' ?>
        <h4 class="tease__title tease__title--document">
            <?php echo $ChapterDocRow['document__name']; ?>
        </h4>
    </a>
    <form method="POST" name="del_doc">
        <input type="hidden" name="idtodelete" value="<?php echo $ChapterDocRow['document__id'] ?>">
        <button class="doc__del" type="submit" name="del_doc">
            <?php include 'components/svg/trash.php' ?>
        </button>  
    </form>    
</section>
