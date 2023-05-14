<div class="form form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une intercalaire
        </h2>
    </section>

    <form class="form__add form--layer" method="POST">
        <label class="form__label form__label--layer" for="layername">Titre</label>
        <input class="form__input form__input--layer" type="text" name="layername">
        <input class="hidden" id="layerbinder" type="hidden" name="layerbinder" value="<?php echo $BinderActiveData['binder__id']; ?>" readonly="readonly">

        <div class="form__button">
            <button class="form__cancel">Annuler</button>
            <button class="form__submit" type="submit" name="submitbinder">Valider</button>
        </div>       
    </form>
</div>