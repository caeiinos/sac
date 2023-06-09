<div class="form form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une DOCUMENT
        </h2>
    </section>

    <form class="form__add form--version" method="POST">
        <label class="form__label form__label--title" for="documentversion">nouvelle version</label>
        <input class="form__input form__input--title form__input--tofocus" type="text" name="documentversion">
        <input class="hidden" type="hidden" name="documentname" value="<?php echo $DocActiveData['document__name']; ?>" readonly="readonly">
        <input class="hidden" type="hidden" name="documentcolor" value="<?php echo $DocActiveData['document__color']; ?>" readonly="readonly">
        <input class="hidden" type="hidden" name="documentshape" value="<?php echo $DocActiveData['document__shape']; ?>" readonly="readonly">
        <input class="hidden" type="hidden" name="documentbinder" value="<?php echo $DocActiveData['document__binder']; ?>" readonly="readonly">
        <input class="hidden" type="hidden" name="documentlayer" value="<?php echo $DocActiveData['document__layer']; ?>" readonly="readonly">
        <input class="hidden" type="hidden" name="documenthaschapter" value="<?php echo $DocActiveData['document__haschapter']; ?>" readonly="readonly">
        <input class="hidden" id="documentchapter" type="hidden" name="documentchapter" value="<?php echo $DocActiveData['document__chapter']; ?>" readonly="readonly">

        <div class="form__button">
            <button class="form__submit" type="submit" name="submitdocument">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>    
    </form>
</div>