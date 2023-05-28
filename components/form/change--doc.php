<div class="form form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une DOCUMENT
        </h2>
    </section>

    <form class="form__add form--document" method="POST">
        <label class="form__label form__label--document" for="documentname">Titre</label>
        <input class="form__input form__input--document form__input--tofocus" value="<?php echo $DocActiveData['document__name'] ?>" type="text" name="documentname" autofocus>
        <label class="form__label" for="documentcolor">Couleur</label>
        <select class="form__input" name="documentcolor" value="<?php echo $DocActiveData['document__color'] ?>" id="">
        <option value="<?php echo $DocActiveData['document__color'] ?>" selected hidden><?php echo $DocActiveData['document__color'] ?></option>
            <option value="red">rouge</option>
            <option value="purple">mauve</option>
            <option value="blue">bleu</option>
            <option value="green">vert</option>
            <option value="yellow">jaune</option>
            <option value="orange">orange</option>
        </select>
        <label class="form__label" for="documentshape">Forme</label>
        <select class="form__input" name="documentshape" value="<?php echo $DocActiveData['document__shape'] ?>" id="">
            <option value="<?php echo $DocActiveData['document__shape'] ?>" selected hidden><?php echo $DocActiveData['document__shape'] ?></option>
            <option value="circle">cercle</option>
            <option value="square">carré</option>
            <option value="triangle">triangle</option>
            <option value="pent">pentagone</option>
            <option value="hexa">hexagone</option>
            <option value="star">étoile</option>
        </select>
        <input class="hidden" type="hidden" name="docidtoupdate" value="<?php echo $DocActiveData['document__id']; ?>" readonly="readonly">

        <div class="form__button">
            <button class="form__submit" type="submit" name="changedocument">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>    
    </form>
</div>