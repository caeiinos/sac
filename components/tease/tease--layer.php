<section class="tease__content <?php echo $row['layer__color']; ?>">
    <a class="tease__link tease__link--layer" href="<?php echo 'layer.php?layerid='.$row['layer__id']; ?>">
        <?php 
            $layersvg = 'components/svg/layer--' . $row['layer__shape'] .'.php';
            include $layersvg; 
        ?>
        <h4 class="tease__title tease__title--layer">
            <?php echo $row['layer__name']; ?>
        </h4>
    </a>
    <button class="delete__trigger">
        <?php include 'components/svg/trash.php' ?>
    </button>
        <?php include 'components/delete/delete--layer.php' ?>

</section>