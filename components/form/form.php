<div class="form form__back">
    <section class="form__head">
        <h2 class="form__title">
            Créer une FARDE
        </h2>
    </section>

    <form class="form__add form explorer__form" method="POST" action="index.php">
        <label class="form__label" for="bindername">Titre</label>
        <input class="form__input" type="text" id="bindername" name="bindername">
        
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
            <button class="form__cancel">Annuler</button>
            <button class="form__submit" type="submit" name="submitbinder">Valider</button>
        </div>   
    </form>
</div>