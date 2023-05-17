<?php 

include '../../utils/config.php';

$activeuser = $_SESSION['id'];

    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $BinderQuery =  $db->prepare("SELECT * FROM chelv__binders where binder__name LIKE '$q%' AND binder__owner='$activeuser'"); 

        $LayerQuery =  $db->prepare("SELECT * FROM chelv__layers where layer__name LIKE '$q%' AND layer__owner='$activeuser'"); 

        $ChapQuery = $db->prepare("SELECT * FROM chelv__chapters where chapter__name LIKE '$q%' AND chapter__owner='$activeuser'"); 

        $DocQuery =  $db->prepare("SELECT * FROM chelv__documents where document__name LIKE '$q%' AND document__owner='$activeuser'"); 

        $BinderQuery->execute();
        foreach ($BinderQuery as $row) { ?>

            <a class="livesearch__link" href="binder.php?binderid=<?php echo $row["binder__id"]; ?>">
                <h4 class="livesearch__title"><?php echo $row["binder__name"]; ?></h4>  
                <p class="livesearch__type">farde</p>          
            </a>

        <?php }

        $LayerQuery->execute();
        foreach ($LayerQuery as $row) { ?>

            <a class="livesearch__link" href="layer.php?layerid=<?php echo $row["layer__id"]; ?>">
                <h4 class="livesearch__title"><?php echo $row["layer__name"]; ?></h4>  
                <p class="livesearch__type">intercalaire</p>          
            </a>

        <?php }

        $ChapQuery->execute();
        foreach ($ChapQuery as $row ) { ?>

            <a class="livesearch__link" href="chapter.php?chapterid=<?php echo $row["chapter__id"]; ?>">
                <h4 class="livesearch__title"><?php echo $row["chapter__name"]; ?></h4>  
                <p class="livesearch__type">chapitre</p>          
            </a>

        <?php }

        $DocQuery->execute();
        foreach ($DocQuery as $row) { ?>

            <a class="livesearch__link" href="document.php?documentid=<?php echo $row["document__id"]; ?>">
                <h4 class="livesearch__title"><?php echo $row["document__name"]; ?></h4>  
                <p class="livesearch__type">document</p>          
            </a>

        <?php }
     }
?>