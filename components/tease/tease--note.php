
<section id="<?php echo $row['note__id']; ?>" class="note__content">
    <h4 class="note__title">
        <?php echo $row['note__name']; ?>
    </h4>
    <button class="note__editor" id="<?php echo $row['note__id'] ?>">
        modifié
    </button>
    <p class="note__description">
        <?php echo $row['note__description']; ?>  
    </p>
</section>