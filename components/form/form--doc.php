<div class="form form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une DOCUMENT
        </h2>
    </section>

    <form class="form__add form--document" method="POST">
        <label class="form__label form__label--document" for="documentname">Titre</label>
        <input class="form__input form__input--document" type="text" name="documentname">
        <input class="hidden" type="hidden" name="documentbinder" value="<?php echo $LayerActiveData['layer__binder']; ?>" readonly="readonly">
        <input class="hidden" id="documentlayer" type="hidden" name="documentlayer" value="<?php echo $LayerActiveData['layer__id']; ?>" readonly="readonly">
        <input class="hidden" type="hidden" name="documentversion" value="default" readonly="readonly">
        <input class="hidden" type="hidden" name="documenthaschapter" value="0" readonly="readonly">
        <input class="hidden" type="hidden" name="documentchapter" value="" readonly="readonly">

        <div class="form__button">
            <button class="form__cancel">Annuler</button>
            <button class="form__submit" type="submit" name="submitbinder">Valider</button>
        </div>    
    </form>
</div>