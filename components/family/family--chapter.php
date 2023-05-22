<ul class="family">

<?php 
    $chapterbinderQuery = $db->prepare("SELECT * FROM chelv__binders WHERE binder__id=? AND binder__owner='$activeuser';");
    $chapterbinderQuery->execute([$ChapterActiveData['chapter__binder']]);
    $chapterbinderData = $chapterbinderQuery->fetch();

    $chapterlayerQuery = $db->prepare("SELECT * FROM chelv__layers WHERE layer__id=? AND layer__owner='$activeuser';");
    $chapterlayerQuery->execute([$ChapterActiveData['chapter__layer']]);
    $chapterlayerData = $chapterlayerQuery->fetch();
?>
    <li class="family__item">
        <a href="<?php echo 'binder.php?binderid='.$chapterbinderData['binder__id']; ?>" class="family__link">
            <?php echo $chapterbinderData['binder__name']; ?> 
        </a>
    </li>

    <li class="family__item">
        <p class="family__separator">>></p>
    </li>

    <li class="family__item">
        <a href="<?php echo 'layer.php?layerid='.$chapterlayerData['layer__id']; ?>" class="family__link">
        <?php echo $chapterlayerData['layer__name']; ?> 
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