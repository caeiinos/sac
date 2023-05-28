<div class="form form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une Classeur
        </h2>
    </section>

    <form class="form__add form explorer__form" method="POST">

        <label class="form__label" for="bindername">Titre</label>
        <input class="form__input form__input--tofocus" value="<?php echo $BinderActiveData['binder__name'] ?>" type="text" id="bindername" name="bindername" autofocus>
        <input type="hidden" value="<?php echo $BinderActiveData['binder__id'] ?>" name="binderidtoupdate">      
 
        <div class="form__button">
            <button class="form__submit" type="submit" name="binderchange">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>   
    </form>
</div>