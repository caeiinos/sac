<section class="tease__content">
    <a class="tease__link tease__link--layer" href="<?php echo 'layer.php?layerid='.$row['layer__id']; ?>">
        <?php include 'components/svg/layer.php' ?>
        <h4 class="tease__title tease__title--layer">
            <?php echo $row['layer__name']; ?>
        </h4>
    </a>
    <form method="POST" name="del_layer">
        <input type="hidden" name="idtodelete" value="<?php echo $row['layer__id'] ?>">
        <button class="layer__del" type="submit" name="del_layer">
            <?php include 'components/svg/trash.php' ?>
        </button>  
    </form>    
</section>