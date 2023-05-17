<div class="form note__editor form__back">
    <section class="form__head">
        <h2 class="form__title">
            Éditeur de NOTES
        </h2>
    </section>

    <form class="form__add" method="POST">
        <input id="noteid" name="noteid" type="hidden">
        <input name="notedocument" value="<?php echo $DocActiveData['document__id']; ?>" type="hidden">
        <input name="notedescription" value="" type="hidden">

        <label class="form__label form__label--document" for="documentname">contenu</label>
        <div class="form__editor">
            <div id="editor-container" class="oui">
                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br></p>
            </div>
        </div>  

        <div class="form__button">
            <button class="form__submit" type="submit" name="submitnote">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>   
    </form>
</div>