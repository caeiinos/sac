<div class="form--active form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une intercalaire
        </h2>
    </section>

    <form class="form__add form--layer" method="POST">
        <label class="form__label form__label--layer" for="layername">Titre</label>
        <p class="form__invalid">Veuillez remplir ce champ</p>
        <input class="form__input form__input--layer" type="text" name="layername">
        <input class="hidden" id="layerbinder" type="hidden" name="layerbinder" value="<?php echo $BinderActiveData['binder__id']; ?>" readonly="readonly">

        <div class="form__button">
            <button class="form__submit" type="submit" name="submitbinder">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>       
    </form>
</div>