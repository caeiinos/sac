<ul class="family">

<?php 
    $activebinder = $ChapterActiveData['chapter__binder'];
    $chapterbinder = mysqli_query($db, "SELECT * FROM chelv__binders WHERE binder__id='$activebinder' AND binder__owner='$activeuser';");
    $binderparent = mysqli_fetch_array($chapterbinder);

    $activelayer = $ChapterActiveData['chapter__layer'];
    $chapterlayer = mysqli_query($db, "SELECT * FROM chelv__layers WHERE layer__id='$activelayer' AND layer__owner='$activeuser';");
    $layerparent = mysqli_fetch_array($chapterlayer);

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

<li class="family__item">
    <a href="" class="family__link">
    <?php echo $pagetitle ?> 
    </a>
</li>
</ul>