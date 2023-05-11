<ul class="family">

    <?php 
        $activebinder = $DocActiveData['document__binder'];
        $documentbinder = mysqli_query($db, "SELECT * FROM chelv__binders WHERE binder__id='$activebinder' AND binder__owner='$activeuser';");
        $binderparent = mysqli_fetch_array($documentbinder);

        $activelayer = $DocActiveData['document__layer'];
        $documentlayer = mysqli_query($db, "SELECT * FROM chelv__layers WHERE layer__id='$activelayer' AND layer__owner='$activeuser';");
        $layerparent = mysqli_fetch_array($documentlayer);

        if ($DocActiveData['document__haschapter']) {
            $activechapter = $DocActiveData['document__chapter'];
            $documentchapter = mysqli_query($db, "SELECT * FROM chelv__chapters WHERE chapter__id='$activelayer' AND chapter__owner='$activeuser';");
            $chapterparent = mysqli_fetch_array($documentchapter);                    
        }
    
    ?>
    <li class="family__item">
        <a href="<?php echo 'binder.php?binderid='.$binderparent['binder__id']; ?>" class="family__link">
            <?php echo $binderparent['binder__name']; ?> 
        </a>
    </li>

    <li class="family__item">
        <a href="<?php echo 'layer.php?layerid='.$layerparent['layer__id']; ?>" class="family__link">
        <?php echo $layerparent['layer__name']; ?> 
        </a>
    </li>

    <?php if ($DocActiveData['document__haschapter']) { ?>
        <li class="family__item">
            <a href="<?php echo 'chapter.php?chapterid='.$chapterparent['chapter__id']; ?>" class="family__link">
            <?php echo $chapterparent['chapter__name']; ?> 
            </a>
        </li>
    <?php } ?>

    <li class="family__item">
        <a href="" class="family__link">
        <?php echo $pagetitle ?> 
        </a>
    </li>
</ul> 