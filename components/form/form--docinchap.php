<div class="form <?php if (isset($errordoc)) { echo "form--active"; } ?> form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une PAGE
        </h2>
    </section>

    <form class="form__add form--document" method="POST">
        <?php if (isset($errordoc)) { ?>
            <p class="form__invalid">Veuillez remplir ce champ</p>
        <?php } ?>        
        <label class="form__label form__label--title" for="documentname">Titre</label>
        <input class="form__input form__input--title form__input--tofocus" type="text" name="documentname" autofocus>
        <label class="form__label" for="documentcolor">Couleur</label>
        <select class="form__input" name="documentcolor" id="">
            <option value="red">rouge</option>
            <option value="purple">mauve</option>
            <option value="blue">bleu</option>
            <option value="green">vert</option>
            <option value="yellow">jaune</option>
            <option value="orange">orange</option>
        </select>
        <label class="form__label" for="documentshape">Forme</label>
        <select class="form__input" name="documentshape" id="">
            <option value="circle">cercle</option>
            <option value="square">carré</option>
            <option value="triangle">triangle</option>
            <option value="pent">pentagone</option>
            <option value="hexa">hexagone</option>
            <option value="star">étoile</option>
        </select>
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