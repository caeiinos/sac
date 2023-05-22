<ul class="family">
    <?php 
        $layerbinderQuery = $db->prepare("SELECT * FROM chelv__binders WHERE binder__id=? AND binder__owner='$activeuser';");
        $layerbinderQuery->execute([$LayerActiveData['layer__binder']]);
        $layerbinderData = $layerbinderQuery->fetch();

    ?>
    <li class="family__item">
        <a href="<?php echo 'binder.php?binderid='.$layerbinderData['binder__id']; ?>" class="family__link">
            <?php echo $layerbinderData['binder__name']; ?> 
        </a>
    </li>

    <li class="family__item">
        <p class="family__separator">>></p>
    </li>

    <li class="family__item">
        <a href="" class="family__link">
        <?php echo $pagetitle ?> 
        </a>
    </li>
</ul> 