<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/DbConnect.php';

    //fonctions pour les projets
    include 'utils/Myprojects.php';

    //fonctions pour les intercalaires
    include 'utils/Mylayers.php';

    //fonctions pour les chapitres
    include 'utils/MyChapters.php';

    //fonctions pour les documents
    include 'utils/MyDocuments.php';

    //fonctions pour les notes
    include 'utils/MyNotes.php';

    //fonctions pour les examens
    include 'utils/MyExams.php';


    // trouver l'intercalaire
    $activeid = $_GET['examid'];

    $activeproject = mysqli_query($db, "SELECT * FROM myexams WHERE id='$activeid';");

    $activedata = mysqli_fetch_array($activeproject);

    $pagetitle = $activedata['title'];

    // trouver les chapitres
    $activetitle = $activedata['fullname'];;

    $ProjectChild = mysqli_query($db, "SELECT * FROM mynotes WHERE parent='$activetitle';");

    // inclure la balise head
    include 'components/head.php';

?>

<body class="page page--document">
    
    <!-- navbar -->
    <?php include 'components/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer.php'; ?>

    <main class="content content--document">

        <!-- nav pour le content filtre, add, ect... -->
        <aside class="aside aside--accueil">      
            <h1 class="aside__title">
                Document >>
                <span><?php echo $pagetitle ?></span>
            </h1>
            
            <div class="aside__content">
                <div class="aside__filtre aside__item">
                    <button class="aside__filtrebutton">
                        <?php include 'components/svg/filter.php'; ?>
                    </button>
                </div>
            </div>

        </aside>

        <h2 class="filter__title">2023</h2>
        <!-- show content -->
        <h3 class="pre-tease">Les notes</h3>

        <div class="note">
            <!-- show note  -->
            <?php while ($row = mysqli_fetch_array($ProjectChild)) { ?> 

                <section class="note__content">
                    <h4 class="note__title">
                        <?php echo $row['title']; ?>
                    </h4>
                    <p class="note__description">
                        <?php echo $row['content']; ?>  
                    </p>
            </section>
            <?php } ?>
        </div>
        
        <!-- add note  -->
        <div class="writer">  
            <form class="writer__form" method="POST">

                <label class="writer__label writer__label--title" for="notetitle">Titre</label>
                <input class="writer__input" type="text" name="notetitle">
                <label class="writer__label writer__label--description" for="notecontent">Description</label>
                <input class="writer__input writer__input--description" type="text" name="notecontent">
                <input class="hidden" type="text" name="noteparent" value="<?php echo $activedata['fullname']; ?>" readonly="readonly">

                <button class="writer__submit" type="submit" name="submitnote">valider</button>
            </form>
        </div>
    </main>
    
</body>
</html>