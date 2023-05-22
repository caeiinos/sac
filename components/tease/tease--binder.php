<section class=" tease__link--binder" href="<?php echo 'binder.php?binderid='.$IndexBinderRow['binder__id']; ?>">
    <a href="<?php echo 'binder.php?binderid='.$IndexBinderRow['binder__id']; ?>">
    <span class=" tease__type--binder">Classeur</span>
    <h4 class=" tease__title--binder">
        <?php echo $IndexBinderRow['binder__name']; ?>
    </h4>
    <p>
        dernière ouverture : <?php echo $IndexBinderRow['binder__opened']; ?> 
    </p>

    </a>
    <button class=" del__button--binder delete__trigger">
        supprimer    
    </button>
    <?php include 'components/delete/delete--binder.php' ?>
</section> 