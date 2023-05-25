<section class="tease__content <?php echo $LayerDocRow['document__color']; ?>">
    <a class="tease__link" href="<?php echo 'document.php?documentid='.$LayerDocRow['document__id']; ?>">
        <?php 
            $docsvg = 'components/svg/document--' . $LayerDocRow['document__shape'] .'.php';
            include $docsvg; 
        ?>
        <h4 class="tease__title tease__title--document">
            <?php echo $LayerDocRow['document__name']; ?>
        </h4>
    </a>
    <button class="delete__trigger">
        <?php include 'components/svg/trash.php' ?>
    </button>
        <?php include 'components/delete/delete--document.php' ?>
</section>
