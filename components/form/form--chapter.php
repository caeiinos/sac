<form class="aside__addform aside__addform--chapter" method="POST">
    <label class="aside__addlabel aside__addlabel--title" for="chaptername">Titre</label>
    <input class="aside__addinput aside__addinput--title" type="text" name="chaptername">
    <input class="hidden" type="text" name="chapterbinder" value="<?php echo $LayerActiveData['layer__binder']; ?>" readonly="readonly">
    <input class="hidden" id="chapterlayer" type="text" name="chapterlayer" value="<?php echo $LayerActiveData['layer__id']; ?>" readonly="readonly">

    <button  class="aside__addsubmit"  type="submit" name="submitchapter">valider</button>
</form>