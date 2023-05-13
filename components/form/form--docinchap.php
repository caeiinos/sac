<form class="aside__addform aside__addform--document" method="POST">
    <label class="aside__addlabel aside__addlabel--title" for="documentname">Titre</label>
    <input class="aside__addinput aside__addinput--title" type="text" name="documentname">
    <input class="hidden" type="hidden" name="documentbinder" value="<?php echo $ChapterActiveData['chapter__binder']; ?>" readonly="readonly">
    <input class="hidden" type="hidden" name="documentlayer" value="<?php echo $ChapterActiveData['chapter__layer']; ?>" readonly="readonly">
    <input class="hidden" type="hidden" name="documentversion" value="def" readonly="readonly">
    <input class="hidden" type="hidden" name="documenthaschapter" value="1" readonly="readonly">
    <input class="hidden" id="documentchapter" type="hidden" name="documentchapter" value="<?php echo $ChapterActiveData['chapter__id']; ?>" readonly="readonly">

    <button  class="aside__addsubmit"  type="submit" name="submitdocument">valider</button>
</form>