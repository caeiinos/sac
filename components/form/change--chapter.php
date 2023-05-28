<div class="form form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une CHAPITRE
        </h2>
    </section>

    <form class="form__add form--chapter" method="POST">
        <label class="form__label form__label--chapter" for="chaptername">Titre</label>
        <input class="form__input form__input--chapter form__input--tofocus" type="text" name="chaptername" value="<?php echo $ChapterActiveData['chapter__name'] ?>" autofocus>
        <label class="form__label" for="chaptercolor">Couleur</label>
        <select class="form__input" name="chaptercolor" value="<?php echo $ChapterActiveData['chapter__color'] ?>" id="">
            <option value="<?php echo $ChapterActiveData['chapter__color'] ?>" selected hidden><?php echo $ChapterActiveData['chapter__color'] ?></option>
            <option value="red">rouge</option>
            <option value="purple">purple</option>
            <option value="blue">blue</option>
            <option value="green">vert</option>
            <option value="yellow">jaune</option>
            <option value="orange">orange</option>
        </select>
        <label class="form__label" for="chaptershape">Forme</label>
        <select class="form__input" name="chaptershape" value="<?php echo $ChapterActiveData['chapter__shape'] ?>" id="">
            <option value="<?php echo $ChapterActiveData['chapter__shape'] ?>" selected hidden><?php echo $ChapterActiveData['chapter__shape'] ?></option>
            <option value="circle">dercle</option>
            <option value="square">carré</option>
            <option value="triangle">triangle</option>
            <option value="pent">pentagone</option>
            <option value="hexa">hexagone</option>
            <option value="star">étoile</option>
        </select>
        <input class="hidden" type="hidden" name="chaptoupdate" value="<?php echo $ChapterActiveData['chapter__id']; ?>" readonly="readonly">

        <div class="form__button">
            <button class="form__submit" type="submit" name="change_chap">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>    
    </form>
</div>