<div class="form <?php if (isset($errorbinder)) { echo "form--active"; } ?> form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une FARDE
        </h2>
    </section>

    <form class="form__add form explorer__form" method="POST">
        <?php if (isset($errorbinder)) { ?>
            <p class="form__invalid">Veuillez remplir ce champ</p>
        <?php } ?>
        <label class="form__label" for="bindername">Titre</label>
        <input class="form__input form__input--tofocus" type="text" id="bindername" name="bindername" autofocus>
        
        <label class="form__label" for="bindername">Description</label>
        <input type="hidden" id="binderdescription" name="binderdescription">      
        <div class="form__editor">
            <div id="binder-quill" class="binderform__quill">
                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br></p>
            </div>
        </div>  
 
        <div class="form__button">
            <button class="form__submit" type="submit" name="submitbinder">Valider</button>
            <button class="form__cancel">Annuler</button>
        </div>   
    </form>
</div>