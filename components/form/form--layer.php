<div class="form <?php if (isset($errorlayer)) { echo "form--active"; } ?>  form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer un intercalaire
        </h2>
    </section>

    <form class="form__add form--layer" method="POST">
        <?php if (isset($errorlayer)) { ?>
            <p class="form__invalid">Veuillez remplir ce champ</p>
        <?php } ?>
        <label class="form__label form__label--layer" for="layername">Titre</label>
        <input class="form__input form__input--layer form__input--tofocus" type="text" name="layername" autofocus>
        <label for="layercolor">Couleur</label>
        <select name="layercolor" id="">
            <option value="red">rouge</option>
            <option value="purple">purple</option>
            <option value="blue">blue</option>
            <option value="vert">vert</option>
            <option value="jaune">jaune</option>
            <option value="orange">orange</option>
        </select>
        <label for="layershape">form</label>
        <select name="layershape" id="">
            <option value="circle">circle</option>
            <option value="square">square</option>
            <option value="triangle">triangle</option>
            <option value="pent">pentagone</option>
            <option value="hexa">hexagone</option>
            <option value="star">star</option>
        </select>
        <input class="hidden" id="layerbinder" type="hidden" name="layerbinder" value="<?php echo $BinderActiveData['binder__id']; ?>" readonly="readonly">

        <div class="form__button">
            <button class="form__submit" type="submit" name="submitlayer">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>       
    </form>
</div>