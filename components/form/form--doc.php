<div class="form <?php if (isset($errordoc)) { echo "form--active"; } ?> form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une DOCUMENT
        </h2>
    </section>

    <form class="form__add form--document" method="POST">
        <?php if (isset($errordoc)) { ?>
            <p class="form__invalid">Veuillez remplir ce champ</p>
        <?php } ?>
        <label class="form__label form__label--document" for="documentname">Titre</label>
        <input class="form__input form__input--document form__input--tofocus" type="text" name="documentname" autofocus>
        <label for="documentcolor">Couleur</label>
        <select name="documentcolor" id="">
            <option value="red">rouge</option>
            <option value="purple">purple</option>
            <option value="blue">blue</option>
            <option value="vert">vert</option>
            <option value="jaune">jaune</option>
            <option value="orange">orange</option>
        </select>
        <label for="documentshape">form</label>
        <select name="documentshape" id="">
            <option value="circle">circle</option>
            <option value="square">square</option>
            <option value="triangle">triangle</option>
            <option value="pent">pentagone</option>
            <option value="hexa">hexagone</option>
            <option value="star">star</option>
        </select>
        <input class="hidden" type="hidden" name="documentbinder" value="<?php echo $LayerActiveData['layer__binder']; ?>" readonly="readonly">
        <input class="hidden" id="documentlayer" type="hidden" name="documentlayer" value="<?php echo $LayerActiveData['layer__id']; ?>" readonly="readonly">
        <input class="hidden" type="hidden" name="documentversion" value="default" readonly="readonly">
        <input class="hidden" type="hidden" name="documenthaschapter" value="0" readonly="readonly">
        <input class="hidden" type="hidden" name="documentchapter" value="" readonly="readonly">

        <div class="form__button">
            <button class="form__submit" type="submit" name="submitdocument">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>    
    </form>
</div>