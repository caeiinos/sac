<form class="aside__addform aside__addform--document" method="POST">
    <label class="aside__addlabel aside__addlabel--title" for="documentname">Titre</label>
    <input class="aside__addinput aside__addinput--title" type="text" name="documentname">
    <input class="hidden" type="hidden" name="documentbinder" value="<?php echo $LayerActiveData['layer__binder']; ?>" readonly="readonly">
    <input class="hidden" id="documentlayer" type="hidden" name="documentlayer" value="<?php echo $LayerActiveData['layer__id']; ?>" readonly="readonly">
    <input class="hidden" type="hidden" name="documentversion" value="default" readonly="readonly">
    <input class="hidden" type="hidden" name="documenthaschapter" value="0" readonly="readonly">
    <input class="hidden" type="hidden" name="documentchapter" value="" readonly="readonly">

    <button  class="aside__addsubmit"  type="submit" name="submitdocument">valider</button>
</form>