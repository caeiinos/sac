
<form class="aside__addform" method="POST" action="index.php">
    <label class="aside__addlabel aside__addlabel--title" for="<?php echo $addtype ?>title">Titre</label>
    <input class="aside__addinput aside__addinput--title" type="text" id="p<?php echo $addtype ?>title" name="<?php echo $addtype ?>title">
    
    <?php if ($addtype = "project") { ?>
        <label class="aside__addlabel aside__addlabel--desc" for="<?php echo $addtype ?>description">Description</label>
        <input class="aside__addinput aside__addinput--desc" type="text" id="<?php echo $addtype ?>description" name="<?php echo $addtype ?>description">        
    <?php } ?>

    <button class="aside__addsubmit" type="submit" name="submit<?php echo $addtype ?>">valider</button>
</form>