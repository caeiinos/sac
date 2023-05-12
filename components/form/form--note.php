<form class="note__editor" method="POST">
    <input id="noteid" name="noteid" type="hidden">
    <input name="notedocument" value="<?php echo $DocActiveData['document__id']; ?>" type="hidden">
    <input name="notedescription" value="" type="hidden">
    <div id="editor-container" class="oui">
        <p>Hello World!</p>
        <p>Some initial <strong>bold</strong> text</p>
        <p><br></p>
    </div>
    <button name="submitnote">let's go</button>    
    <button class="note__cancel">Annuler</button>    
</form>