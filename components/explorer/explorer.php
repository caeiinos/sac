<?php   

    // get user id
    $activeuser = $_SESSION['id'];

?>

<section class="explorer">

    <div class="explorer__list">

            <h2 class="explorer__title">explorer</h2>

            <ul class="explorer__projet">

                <!-- get layer from binder -->
                <?php 
                
                $explorerlayer = $db->prepare("SELECT * FROM chelv__layers WHERE layer__binder='$ExplorerBase' AND layer__owner='$activeuser';");
                $explorerlayer->execute();
                foreach ($explorerlayer as $rowlayer) { ?> 
                    <li>
                        <a class="explorer__link explorer__link--layer" href="<?php echo 'layer.php?layerid='.$rowlayer['layer__id']; ?>">
                            <?php include 'components/svg/layer.php' ?>
                            <h4 class=" explorer__title--layer">
                                <?php echo $rowlayer['layer__name']; ?>
                            </h4>
                        </a>                    
                    </li>

                    <ul>
                        <!-- get chapter from layer from binder -->
                        <?php 
                        $explorerchapter = $db->prepare("SELECT * FROM chelv__chapters WHERE chapter__layer=? ");
                        $explorerchapter->execute([$rowlayer['layer__id']]);

                        foreach ($explorerchapter as $rowchapter) { ?>
                            <li>
                                <a class="explorer__link explorer__link--chapter" href="<?php echo 'chapter.php?chapterid='.$rowchapter['chapter__id']; ?>">
                                    <?php include 'components/svg/chapter.php' ?>
                                    <h4 class=" explorer__title--Chapter">
                                        <?php echo $rowchapter['chapter__name']; ?>
                                    </h4>
                                </a>   
                            </li>

                            <ul>
                            <!-- get document from chapter from layer from binder -->
                            <?php 
                                $explorerchapdoc = $db->prepare("SELECT * FROM chelv__documents WHERE document__layer=? AND document__chapter= ? AND document__version='default';");
                                $explorerchapdoc->execute([$rowlayer['layer__id'], $rowchapter['chapter__id']]);
                                foreach ($explorerchapdoc as $chapdoc) { ?>
                                    <li>
                                        <a class="explorer__link explorer__link--docinchap" href="<?php echo 'document.php?documentid='.$chapdoc['document__id']; ?>">
                                            <?php include 'components/svg/document.php' ?>
                                            <h4 class=" explorer__title--docinchap">
                                                <?php echo $chapdoc['document__name']; ?>
                                            </h4>
                                        </a>   
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>

                        <!-- get document from layer from binder -->
                        <?php 

                        $explorerdoc = $db->prepare( "SELECT * FROM chelv__documents WHERE document__layer=? AND document__haschapter=0 AND document__version='default';");
                        $explorerdoc->execute([$rowlayer['layer__id']]);
                        foreach ($explorerdoc as $doc ) { ?>
                            <li>
                                <a class="explorer__link explorer__link--doc" href="<?php echo 'document.php?documentid='.$doc['document__id']; ?>">
                                    <?php include 'components/svg/document.php' ?>
                                    <h4 class=" explorer__title--doc">
                                        <?php echo $doc['document__name']; ?>
                                    </h4>
                                </a>   
                            </li>
                        <?php } ?>                    
                    </ul>
                <?php } ?>
            </ul>
                    
        </div>

</section>