<section id="<?php echo $row['note__id']; ?>" class="note__content">
    <div class="note__option">   
        <div class="note__overlay">
            <button class="note__modifie" id="<?php echo $row['note__id'] ?>">
                modifier
            </button>
            <button class="note__del delete__trigger">
                supprimer
            </button>  
        </div>
    </div>

    <p class="note__description">
        <?php echo $row['note__description']; ?>  
    </p>

    <?php include 'components/delete/delete--note.php' ?>
</section>