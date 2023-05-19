<div class="form <?php if (isset($errorlink)) { echo "form--active"; } ?> form__back">
    <section class="form__head">
        <h2 class="form__title">
            Nouveau lien
        </h2>
    </section>

    <form class="form__add link__editor" method="POST">
        <?php if (isset($errorlink)) { ?>
            <p class="form__invalid">Veuillez remplir ce champ</p>
        <?php } ?>
        <label class="form__label form__label--link" for="linkname">Titre</label>
        <input class="form__input form__input--link form__input--tofocus" type="text" name="linkname" autofocus>

        <label class="form__label form__label--link" for="linkurl">URL</label>
        <input class="form__input form__input--link" type="text" name="linkurl">

        <input name="linkdocument" value="<?php echo $DocActiveData['document__id']; ?>" type="hidden">


        <div class="form__button">
            <button class="form__submit" type="submit" name="submitlink">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>   
    </form>
</div>