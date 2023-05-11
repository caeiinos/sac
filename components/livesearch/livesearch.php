<?php 

include '../../utils/config.php';

$activeuser = $_SESSION['id'];

    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $BinderQuery = "SELECT * FROM chelv__binders where binder__name LIKE '$q%' AND binder__owner='$activeuser';"; 

        $BinderResult = mysqli_query($db, $BinderQuery);

        $LayerQuery = "SELECT * FROM chelv__layers where layer__name LIKE '$q%' AND layer__owner='$activeuser';"; 

        $LayerResult = mysqli_query($db, $LayerQuery);

        $ChapQuery = "SELECT * FROM chelv__chapters where chapter__name LIKE '$q%' AND chapter__owner='$activeuser';"; 

        $ChapResult = mysqli_query($db, $ChapQuery);

        $DocQuery = "SELECT * FROM chelv__documents where document__name LIKE '$q%' AND document__owner='$activeuser';"; 

        $DocResult = mysqli_query($db, $DocQuery);

        while ($row = mysqli_fetch_assoc($BinderResult)) { ?>

            <a href="binder.php?binderid=<?php echo $row["binder__id"]; ?>">
                <h4><?php echo $row["binder__name"]; ?></h4>  
                <p>farde</p>          
            </a>

        <?php }

        while ($row = mysqli_fetch_assoc($LayerResult)) { ?>

            <a href="layer.php?layerid=<?php echo $row["layer__id"]; ?>">
                <h4><?php echo $row["layer__name"]; ?></h4>  
                <p>intercalaire</p>          
            </a>

        <?php }

        while ($row = mysqli_fetch_assoc($ChapResult)) { ?>

            <a href="chapter.php?chapterid=<?php echo $row["chapter__id"]; ?>">
                <h4><?php echo $row["chapter__name"]; ?></h4>  
                <p>chapitre</p>          
            </a>

        <?php }

        while ($row = mysqli_fetch_assoc($DocResult)) { ?>

            <a href="document.php?documentid=<?php echo $row["document__id"]; ?>">
                <h4><?php echo $row["document__name"]; ?></h4>  
                <p>document</p>          
            </a>

        <?php }
     }
?>