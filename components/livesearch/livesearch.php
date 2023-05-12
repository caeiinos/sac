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

            <a href="binder.php?binderid=<?php echo $row["binder__id"]; ?>">
                <h4><?php echo $row["binder__name"]; ?></h4>  
                <p>farde</p>          
            </a>

        <?php }

        $LayerQuery->execute();
        foreach ($LayerQuery as $row) { ?>

            <a href="layer.php?layerid=<?php echo $row["layer__id"]; ?>">
                <h4><?php echo $row["layer__name"]; ?></h4>  
                <p>intercalaire</p>          
            </a>

        <?php }

        $ChapQuery->execute();
        foreach ($ChapQuery as $row ) { ?>

            <a href="chapter.php?chapterid=<?php echo $row["chapter__id"]; ?>">
                <h4><?php echo $row["chapter__name"]; ?></h4>  
                <p>chapitre</p>          
            </a>

        <?php }

        $DocQuery->execute();
        foreach ($DocQuery as $row) { ?>

            <a href="document.php?documentid=<?php echo $row["document__id"]; ?>">
                <h4><?php echo $row["document__name"]; ?></h4>  
                <p>document</p>          
            </a>

        <?php }
     }
?>