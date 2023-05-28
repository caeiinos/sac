<div class="form <?php if (isset($errorchap)) { echo "form--active"; } ?> form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une CHAPITRE
        </h2>
    </section>

    <form class="form__add form--chapter" method="POST">
        <?php if (isset($errorchap)) { ?>
            <p class="form__invalid">Veuillez remplir ce champ</p>
        <?php } ?>
        <label class="form__label form__label--chapter" for="chaptername">Titre</label>
        <input class="form__input form__input--chapter form__input--tofocus" type="text" name="chaptername" autofocus>
        <label class="form__label" for="chaptercolor">Couleur</label>
        <select class="form__input" name="chaptercolor" id="">
            <option value="red">rouge</option>
            <option value="purple">mauve</option>
            <option value="blue">bleu</option>
            <option value="green">vert</option>
            <option value="yellow">jaune</option>
            <option value="orange">orange</option>
        </select>
        <label class="form__label" for="chaptershape">Forme</label>
        <select class="form__input" name="chaptershape" id="">
            <option value="circle">cercle</option>
            <option value="square">carré</option>
            <option value="triangle">triangle</option>
            <option value="pent">pentagone</option>
            <option value="hexa">hexagone</option>
            <option value="star">étoile</option>
        </select>
        <input class="hidden" type="hidden" name="chapterbinder" value="<?php echo $LayerActiveData['layer__binder']; ?>" readonly="readonly">
        <input class="hidden" id="chapterlayer" type="hidden" name="chapterlayer" value="<?php echo $LayerActiveData['layer__id']; ?>" readonly="readonly">

        <div class="form__button">
            <button class="form__submit" type="submit" name="submitchapter">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>    
    </form>
</div>