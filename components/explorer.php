<section class="explorer">
<!-- 
    <h3 class="explorer__title">explorer</h3> -->

    <ul class="explorer__list">

        <div class="explorer__projet">
            
        <div class="aside__add  aside__item">
            <button class="aside__trigger aside__trigger--add">
                    <p>Nouveau Projet</p>
                </button>

                <?php
                    include 'components/form/form.php'; 
                ?>
            </div>

            <form class="explorer__form" action="search.php" method="get">
                <input class="explorer__search"  type="text" name="search" placeholder="Search...">
                <div id="explorersearch">
                    <ul class="explorer__projetlist">
                        <?php foreach ($bindersData as $row) { ?>
                        <li class="explorer__projetitem">
                            <a class="explorer__projetlink" href="<?php echo 'projet.php?projetid='.$row['id']; ?>">
                                <?php echo $row['binder__name']; ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>                
                </div>
            </form>
            

        </div>  
        
    </ul>

</section>