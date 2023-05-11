<ul class="family">
    <?php 
        $activebinder = $LayerActiveData['layer__binder'];
        $layerbinder = mysqli_query($db, "SELECT * FROM chelv__binders WHERE binder__id='$activebinder' AND binder__owner='$activeuser';");
        $binderparent = mysqli_fetch_array($layerbinder);

    ?>
    <li class="family__item">
        <a href="<?php echo 'binder.php?binderid='.$binderparent['binder__id']; ?>" class="family__link">
            <?php echo $binderparent['binder__name']; ?> 
        </a>
    </li>

    <li class="family__item">
        <a href="" class="family__link">
        <?php echo $pagetitle ?> 
        </a>
    </li>
</ul> 