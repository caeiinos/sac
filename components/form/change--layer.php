<div class="form form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer un intercalaire
        </h2>
    </section>

    <form class="form__add form--layer" method="POST">
        <label class="form__label form__label--layer" for="layername">Titre</label>
        <input class="form__input form__input--layer form__input--tofocus" value="<?php echo $LayerActiveData['layer__name'] ?>" type="text" name="layername" autofocus>
        <label class="form__label" for="layercolor">Couleur</label>
        <select class="form__input" name="layercolor" value="<?php echo $LayerActiveData['layer__color'] ?>" id="">
            <option value="<?php echo $LayerActiveData['layer__color'] ?>" selected hidden><?php echo $LayerActiveData['layer__color'] ?></option>
            <option value="red">rouge</option>
            <option value="purple">mauve</option>
            <option value="blue">bleu</option>
            <option value="green">vert</option>
            <option value="yellow">jaune</option>
            <option value="orange">orange</option>
        </select>
        <label class="form__label" for="layershape">Forme</label>
        <select class="form__input" name="layershape" value="<?php echo $LayerActiveData['layer__shape'] ?>" id="">
            <option value="<?php echo $LayerActiveData['layer__shape'] ?>" selected hidden><?php echo $LayerActiveData['layer__shape'] ?></option>
            <option value="circle">cercle</option>
            <option value="square">carré</option>
            <option value="triangle">triangle</option>
            <option value="pent">pentagone</option>
            <option value="hexa">hexagone</option>
            <option value="star">étoile</option>
        </select>
        <input class="hidden" type="hidden" name="layeridtoupdate" value="<?php echo $LayerActiveData['layer__id']; ?>" readonly="readonly">

        <div class="form__button">
            <button class="form__submit" type="submit" name="changelayer">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>       
    </form>
</div>