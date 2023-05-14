<section class="explorer--front">
<!-- 
    <h3 class="explorer__title">explorer</h3> -->

    <ul class="explorer__list--front">

        <div class="explorer__binder">
            
        <div class=" explorer__add  explorer__item">
            <button class="form__trigger explorer__trigger explorer__trigger--add">
                    <p>Nouveau classeur</p>
                </button>

                <?php
                    include 'components/form/form.php'; 
                ?>
            </div>

            <form class="explorer__livesearch" action="search.php" method="get">
                <input class="explorer__search"  type="text" name="search" placeholder="Search...">
                <div id="explorersearch">
                    <ul class="explorer__binderlist">
                        <?php foreach ($IndexBinderData as $NavBinderRow) { ?>
                        <li class="explorer__binderitem">
                            <a class="explorer__binderlink" href="<?php echo 'binder.php?binderid='.$NavBinderRow['binder__id']; ?>">
                                <?php echo $NavBinderRow['binder__name']; ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>                
                </div>
            </form>
            

        </div>  
        
    </ul>

</section>