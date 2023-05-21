<div class="delete">
    <form class="delete__form delete__form--doc" method="POST" name="del_link">
        <h3>
            Attention : Suppression irréversible
        </h3>
        <p class="delete__text">
            Êtes-vous sûr(e) de vouloir supprimer cet élément et toutes les données qui lui sont associées ? Cette action est définitive et ne peut pas être annulée.
        </p>
        <input type="hidden" name="idtodelete" value="<?php echo $row['link__id'] ?>">
        <div class="delete__button">
            <button class="delete__cancel">
                Annuler
            </button>
            <button class="link__del delete__submit" type="submit" name="del_link">
                Supprimer
            </button>  
        </div>
    </form> 
</div>
