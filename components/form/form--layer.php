<div class="aside__add aside__add--layer aside__item aside__item--layer">
    <button class="aside__trigger aside__trigger--add">
        <p>Nouvelle Intercalaire</p>
    </button>

    <form class="aside__addform aside__addform--layer" method="POST">
        <label class="aside__addlabel aside__addlabel--title" for="layername">Titre</label>
        <input class="aside__addinput aside__addinput--title" type="text" name="layername">
        <input class="hidden" id="layerbinder" type="text" name="layerbinder" value="<?php   $BinderActiveData->execute([$_GET['binderid']]); echo $BinderActiveData->fetchColumn(0); ?>" readonly="readonly">

        <button  class="aside__addsubmit"  type="submit" name="submitlayer">valider</button>
    </form>
</div>