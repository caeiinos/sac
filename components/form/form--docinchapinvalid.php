<div class="form--active form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une DOCUMENT
        </h2>
    </section>

    <form class="form__add form--document" method="POST">
        <label class="form__label form__label--title" for="documentname">titre</label>
        <p class="form__invalid">Veuillez remplir ce champ</p>
        <input class="form__input form__input--title" type="text" name="documentname">
        <input class="hidden" type="hidden" name="documentbinder" value="<?php echo $ChapterActiveData['chapter__binder']; ?>" readonly="readonly">
        <input class="hidden" type="hidden" name="documentlayer" value="<?php echo $ChapterActiveData['chapter__layer']; ?>" readonly="readonly">
        <input class="hidden" type="hidden" name="documentversion" value="default" readonly="readonly">
        <input class="hidden" type="hidden" name="documenthaschapter" value="1" readonly="readonly">
        <input class="hidden" id="documentchapter" type="hidden" name="documentchapter" value="<?php echo $ChapterActiveData['chapter__id']; ?>" readonly="readonly">

        <div class="form__button">
            <button class="form__submit" type="submit" name="submitdocument">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>     
    </form>
</div>