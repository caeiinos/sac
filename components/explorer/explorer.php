<?php   

    // get user id
    $activeuser = $_SESSION['id'];

?>

<section class="explorer">

    <div class="explorer__list">

            <h2>explorer</h2>

            <!-- <?php include '../livesearch/livesearch--explorer' ?> -->

            <ul class="explorer__projet">

                <!-- get layer from binder -->
                <?php 

                $activebase = $activedata['explorer__base'];
                
                $explorerlayer = mysqli_query($db, "SELECT * FROM chelv__layers WHERE explorer__base='$activebase' AND layer__owner='$activeuser';");
                
                while ($rowlayer = mysqli_fetch_array($explorerlayer)) { ?> 
                    <li>
                        <a class="tease__link" href="<?php echo 'layer.php?layerid='.$rowlayer['layer__id']; ?>">
                            <h4 class="tease__title tease__title--layer">
                                <?php echo $rowlayer['layer__name']; ?>
                            </h4>
                        </a>                    
                    </li>

                    <ul>
                        <!-- get chapter from layer from binder -->
                        <?php 

                        $parentlayer = $rowlayer['layer__id'];

                        $explorerchapter = mysqli_query($db, "SELECT * FROM chelv__chapters WHERE chapter__layer='$parentlayer';");

                        while ($rowchapter = mysqli_fetch_array($explorerchapter)) { ?>
                            <li>
                                <a class="tease__link" href="<?php echo 'chapter.php?chapterid='.$rowchapter['chapter__id']; ?>">
                                    <h4 class="tease__title tease__title--layer">
                                        <?php echo $rowchapter['chapter__name']; ?>
                                    </h4>
                                </a>   
                            </li>

                            <ul>
                            <!-- get document from chapter from layer from binder -->
                            <?php 

                                $parentchapter = $rowchapter['chapter__id'];

                                $explorerchapdoc = mysqli_query($db, "SELECT * FROM chelv__documents WHERE document__layer='$parentlayer' AND document__chapter='$parentchapter';");

                                while ($chapdoc = mysqli_fetch_array($explorerchapdoc)) { ?>
                                    <li>
                                        <a class="tease__link" href="<?php echo 'document.php?documentid='.$chapdoc['document__id']; ?>">
                                            <h4 class="tease__title tease__title--layer">
                                                <?php echo $chapdoc['document__name']; ?>
                                            </h4>
                                        </a>   
                                    </li>
                                <?php } ?>
                            </ul>
                        <?php } ?>

                        <!-- get document from layer from binder -->
                        <?php 

                        $explorerdoc = mysqli_query($db, "SELECT * FROM chelv__documents WHERE document__layer='$parentlayer' AND document__haschapter=0;");

                        while ($doc = mysqli_fetch_array($explorerdoc)) { ?>
                            <li>
                                <a class="tease__link" href="<?php echo 'document.php?documentid='.$doc['document__id']; ?>">
                                    <h4 class="tease__title tease__title--layer">
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