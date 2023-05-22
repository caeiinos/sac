<section class="tease__content">
    <a class="tease__link" href="<?php echo 'document.php?documentid='.$LayerDocRow['document__id']; ?>">
        <?php include 'components/svg/document.php' ?>
        <h4 class="tease__title tease__title--document">
            <?php echo $LayerDocRow['document__name']; ?>
        </h4>
    </a>
    <button class="delete__trigger">
        <?php include 'components/svg/trash.php' ?>
    </button>
        <?php include 'components/delete/delete--document.php' ?>
</section>
