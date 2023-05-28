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
                <h4 class="livesearch__title livesearch__title--binder"><?php echo $row["binder__name"]; ?></h4>  
                <p class="livesearch__type">Classeur</p>          
            </a>

        <?php }

        $LayerQuery->execute();
        foreach ($LayerQuery as $row) { 

            $layerbinderQuery = $db->prepare("SELECT * FROM chelv__binders WHERE binder__id=? AND binder__owner='$activeuser';");
            $layerbinderQuery->execute([$row['layer__binder']]);
            $layerbinderData = $layerbinderQuery->fetch();
            
            ?>

            <a class="livesearch__link <?php echo $row["layer__color"]; ?>" href="layer.php?layerid=<?php echo $row["layer__id"]; ?>">
                <div class="livesearch__content">
                    <?php 
                        $layersvg = '../svg/layer--' . $row['layer__shape'] .'.php';
                        include $layersvg; 
                    ?>
                    <h4 class="livesearch__title livesearch__title--layer"><?php echo $row["layer__name"]; ?></h4>                      
                </div>
                <p class="livesearch__type">intercalaire issue de : <?php echo $layerbinderData["binder__name"]; ?></p>          
            </a>

        <?php }

        $ChapQuery->execute();
        foreach ($ChapQuery as $row ) { 

            $chapterbinderQuery = $db->prepare("SELECT * FROM chelv__binders WHERE binder__id=? AND binder__owner='$activeuser';");
            $chapterbinderQuery->execute([$row['chapter__binder']]);
            $chapterbinderData = $chapterbinderQuery->fetch();

            $chapterlayerQuery = $db->prepare("SELECT * FROM chelv__layers WHERE layer__id=? AND layer__owner='$activeuser';");
            $chapterlayerQuery->execute([$row['chapter__layer']]);
            $chapterlayerData = $chapterlayerQuery->fetch();
            
        ?>

            <a class="livesearch__link <?php echo $row["chapter__color"]; ?>" href="chapter.php?chapterid=<?php echo $row["chapter__id"]; ?>">
                <div class="livesearch__content">
                    <?php 
                        $layersvg = '../svg/chapter--' . $row['chapter__shape'] .'.php';
                        include $layersvg; 
                    ?>
                    <h4 class="livesearch__title livesearch__title--chapter"><?php echo $row["chapter__name"]; ?></h4>                
                </div>
  
                <p class="livesearch__type">chapitre issue de : <?php echo $chapterbinderData["binder__name"]; ?>/<?php echo $chapterlayerData["layer__name"]; ?></p>          
            </a>

        <?php }

        $DocQuery->execute();
        foreach ($DocQuery as $row) { 

            $documentbinderQuery = $db->prepare("SELECT * FROM chelv__binders WHERE binder__id=? AND binder__owner='$activeuser';");
            $documentbinderQuery->execute([$row['document__binder']]);
            $documentbinderData = $documentbinderQuery->fetch();

            $documentlayerQuery = $db->prepare("SELECT * FROM chelv__layers WHERE layer__id=? AND layer__owner='$activeuser';");
            $documentlayerQuery->execute([$row['document__layer']]);
            $documentlayerData = $documentlayerQuery->fetch(); 
            
            if ($row['document__haschapter'] == 1) {
                $documentchapterQuery = $db->prepare("SELECT * FROM chelv__chapters WHERE chapter__id=? AND chapter__owner='$activeuser';");
                $documentchapterQuery->execute([$row['document__chapter']]);
                $documentchapterData = $documentchapterQuery->fetch(); 
            }
            
        ?>

        <a class="livesearch__link <?php echo $row["document__color"]; ?>" href="document.php?documentid=<?php echo $row["document__id"]; ?>">
            <div class="livesearch__content">
                <?php 
                        $layersvg = '../svg/document--' . $row['document__shape'] .'.php';
                        include $layersvg; 
                    ?>
                <h4 class="livesearch__title livesearch__title--document"><?php echo $row["document__name"]; ?></h4>              
            </div>

            <p class="livesearch__type">           
                <?php
                    if ($row['document__haschapter'] = 0) {
                        echo "Document";
                    } else {
                        echo "Page";
                    }
                ?> issue de : <?php echo $documentbinderData["binder__name"]; ?>/<?php echo $documentlayerData["layer__name"]; ?><?php if($row['document__haschapter'] == 1){echo '/' . $documentchapterData["chapter__name"];} ?></p>          
        </a>

        <?php }
     }
?>