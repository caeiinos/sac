
<form class="aside__addform" method="POST" action="index.php">
    <label class="aside__addlabel aside__addlabel--title" for="bindername">Titre</label>
    <input class="aside__addinput aside__addinput--title" type="text" id="bindername" name="bindername">
    
    <input class="aside__addinput aside__addinput--desc" type="hidden" id="binderdescription" name="binderdescription">        
    <div id="binder-quill" class="oui">
        <p>Hello World!</p>
        <p>Some initial <strong>bold</strong> text</p>
        <p><br></p>
    </div>    

    <button class="aside__addsubmit" type="submit" name="submitbinder">valider</button>
</form>