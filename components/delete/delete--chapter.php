<div class="delete">
    <form class="delete__form delete__form--doc" method="POST" name="del_chap">
        <h3>
            Attention : Suppression irréversible
        </h3>
        <p class="delete__text">
            Êtes-vous sûr(e) de vouloir supprimer cet élément et toutes les données qui lui sont associées ? Cette action est définitive et ne peut pas être annulée.
        </p>
        <input type="hidden" name="idtodelete" value="<?php echo $LayerChapterRow['chapter__id'] ?>">
        <div class="delete__button">
            <button class="delete__cancel">
                Annuler
            </button>
            <button class="chap__del delete__submit" type="submit" name="del_chap">
                Supprimer
            </button>  
        </div>
    </form> 
</div>
