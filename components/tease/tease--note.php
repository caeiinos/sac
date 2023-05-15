
<section id="<?php echo $row['note__id']; ?>" class="note__content">
    <button class="note__modifie" id="<?php echo $row['note__id'] ?>">
    modifier
    </button>
    <p class="note__description">
        <?php echo $row['note__description']; ?>  
    </p>
</section>