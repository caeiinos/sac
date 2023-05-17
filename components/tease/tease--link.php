<section id="<?php echo $row['link__id']; ?>" class="link__content">
    <a target="_blank" href="<?php echo $row['link__url']; ?>"class="link__link">
        <?php include 'components/svg/link.php' ?>
        <p>
          <?php echo $row['link__name']; ?>    
        </p>
    </a>
    <form method="POST" name="del_link">
        <input type="hidden" name="idtodelete" value="<?php echo $row['link__id'] ?>">
        <button class="link__del" type="submit" name="del_link">
            <?php include 'components/svg/trash.php' ?>
        </button>  
    </form>
</section>