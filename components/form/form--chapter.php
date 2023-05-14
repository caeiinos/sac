<div class="form form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une CHAPITRE
        </h2>
    </section>

    <form class="form__add form--chapter" method="POST">
        <label class="form__label form__label--chapter" for="chaptername">Titre</label>
        <input class="form__input form__input--chapter" type="text" name="chaptername">
        <input class="hidden" type="hidden" name="chapterbinder" value="<?php echo $LayerActiveData['layer__binder']; ?>" readonly="readonly">
        <input class="hidden" id="chapterlayer" type="hidden" name="chapterlayer" value="<?php echo $LayerActiveData['layer__id']; ?>" readonly="readonly">

        <div class="form__button">
            <button class="form__cancel">Annuler</button>
            <button class="form__submit" type="submit" name="submitbinder">Valider</button>
        </div>    
    </form>
</div>