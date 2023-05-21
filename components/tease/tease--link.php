<section id="<?php echo $row['link__id']; ?>" class="link__content">
    <a target="_blank" href="<?php echo $row['link__url']; ?>"class="link__link">
        <?php include 'components/svg/link.php' ?>
        <p>
          <?php echo $row['link__name']; ?>    
        </p>
    </a>
    <button class="delete__trigger">
        <?php include 'components/svg/trash.php' ?>
    </button>
        <?php include 'components/delete/delete--link.php' ?>
</section>