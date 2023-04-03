<section class="explorer">

    <h3 class="explorer__title">explorer</h3>

    <ul class="explorer__list">

        <div class="explorer__projet">
            
        <div class="aside__add  aside__item">
            <button class="aside__trigger aside__trigger--add">
                    <p>Nouveau Projet</p>
                </button>

                <?php
                    $addtype = "project";
                    include 'components/form.php'; 
                ?>
            </div>
            <ul class="explorer__projetlist">
                <?php foreach ($ProjectsData as $row) { ?>
                <li class="explorer__projetitem">
                    <a class="explorer__projetlink" href="<?php echo 'projet.php?projetid='.$row['id']; ?>">
                        <?php echo $row['title']; ?>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>  
        
    </ul>

</section>