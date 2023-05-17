
<section id="<?php echo $row['note__id']; ?>" class="note__content">
    <div class="note__option">   
        <button class="note__trigger" id="<?php echo $row['note__id'] ?>">
            option
        </button>
        <div class="note__overlay">
            <button class="note__modifie" id="<?php echo $row['note__id'] ?>">
                modifier
            </button>
            <form method="POST" name="del_note">
                <input type="hidden" name="idtodelete" value="<?php echo $row['note__id'] ?>">
                <button class="note__del" type="submit" name="del_note">
                    supprimer
                </button>  
            </form>
          
        </div>
    </div>

    <p class="note__description">
        <?php echo $row['note__description']; ?>  
    </p>
</section>