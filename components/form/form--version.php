<form class="aside__addform aside__addform--document" method="POST">
    <label class="aside__addlabel aside__addlabel--title" for="documentversion">nouvelle version</label>
    <input class="aside__addinput aside__addinput--title" type="text" name="documentversion">
    <input class="hidden" type="text" name="documentname" value="<?php echo $DocActiveData['document__name']; ?>" readonly="readonly">
    <input class="hidden" type="text" name="documentbinder" value="<?php echo $DocActiveData['document__binder']; ?>" readonly="readonly">
    <input class="hidden" type="text" name="documentlayer" value="<?php echo $DocActiveData['document__layer']; ?>" readonly="readonly">
    <input class="hidden" type="number" name="documenthaschapter" value="1" readonly="readonly">
    <input class="hidden" id="documentchapter" type="text" name="documentchapter" value="<?php echo $DocActiveData['document__chapter']; ?>" readonly="readonly">

    <button  class="aside__addsubmit"  type="submit" name="submitdocument">valider</button>
</form>