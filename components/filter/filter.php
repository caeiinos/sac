<?php 

include '../../utils/mydata.php';

    if (isset($_GET["k"])) {
        $k = $_GET["k"];

        $query = "SELECT * FROM MyProjects ORDER BY '$k%'"; 

        $result = mysqli_query($db, $query);

        while ($row = mysqli_fetch_assoc($result)) { ?>

            <!-- projets -->
            <section class="tease__content">
                <a class="tease__link" href="<?php echo 'projet.php?projetid='.$row['id']; ?>">
                    <span class="tease__type">farde</span>
                    <h4 class="tease__title">
                            <?php echo $row['title']; ?>

                    </h4>
                    <p class="tease__description">
                        <?php echo $row['description']; ?> 
                    </p>

                </a> 
            </section>
            <h4><?php echo $k ?></h4>

        <?php }
    }
?>