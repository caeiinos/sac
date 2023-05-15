<ul class="family">

    <?php 
        $documentbinder = $db->prepare("SELECT * FROM chelv__binders WHERE binder__id=? AND binder__owner='$activeuser';");
        $documentbinder->execute([$DocActiveData['document__binder']]);
        $binderparent = $documentbinder->fetch();

        $documentlayer = $db->prepare("SELECT * FROM chelv__layers WHERE layer__id=? AND layer__owner='$activeuser';");
        $documentlayer->execute([$DocActiveData['document__layer']]);
        $layerparent = $documentlayer->fetch();

        if ($DocActiveData['document__haschapter']) {
            $activechapter = $DocActiveData['document__chapter'];
            $documentchapter = $db->prepare("SELECT * FROM chelv__chapters WHERE chapter__id=? AND chapter__owner='$activeuser';");
            $documentchapter->execute([$DocActiveData['document__chapter']]);
            $chapterparent = $documentchapter->fetch();                    
        }
    
    ?>
    <li class="family__item">
        <a href="<?php echo 'binder.php?binderid='.$binderparent['binder__id']; ?>" class="family__link">
            <?php echo $binderparent['binder__name']; ?> 
        </a>
    </li>

    <li class="family__item">
        <p class="family__separator">>></p>
    </li>

    <li class="family__item">
        <a href="<?php echo 'layer.php?layerid='.$layerparent['layer__id']; ?>" class="family__link">
        <?php echo $layerparent['layer__name']; ?> 
        </a>
    </li>

    <li class="family__item">
        <p class="family__separator">>></p>
    </li>

    <?php if ($DocActiveData['document__haschapter']) { ?>
        <li class="family__item">
            <a href="<?php echo 'chapter.php?chapterid='.$chapterparent['chapter__id']; ?>" class="family__link">
            <?php echo $chapterparent['chapter__name']; ?> 
            </a>
        </li>

        <li class="family__item">
            <p class="family__separator">>></p>
        </li>
    <?php } ?>

    <li class="family__item">
        <a href="" class="family__link">
        <?php echo $pagetitle ?> 
        </a>
    </li>
</ul> 