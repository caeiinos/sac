<div class="form form__back">
    <section class="form__head">
        <h2 class="form__title">
            Nouveau lien
        </h2>
    </section>

    <form class="form__add link__editor" method="POST">
        <label class="form__label form__label--link" for="linkname">Titre</label>
        <input class="form__input form__input--link" type="text" name="linkname">

        <label class="form__label form__label--link" for="linkurl">URL</label>
        <input class="form__input form__input--link" type="text" name="linkurl">

        <input name="linkdocument" value="<?php echo $DocActiveData['document__id']; ?>" type="hidden">


        <div class="form__button">
            <button class="form__cancel">Annuler</button>
            <button class="form__submit" type="submit" name="submitlink">Valider</button>
        </div>   
    </form>
</div>