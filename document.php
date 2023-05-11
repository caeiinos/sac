<?php   
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/config.php';

    //connect the db
    include 'utils/notlog/notlog.php';

    // trouver l'intercalaire
    $activeid = $_GET['documentid'];
    $DocActiveQuery = mysqli_query($db, "SELECT * FROM chelv__documents WHERE document__id='$activeid';");
    $DocActiveData = mysqli_fetch_array($DocActiveQuery);
   // find pagetitle
    $pagetitle = $DocActiveData['document__name'];
    //find base for explorer
    $ExplorerBase = $DocActiveData['explorer__base'];
    
    // trouver les notes   
    $activeuser = $_SESSION['id'];
    $DocNoteQuery = mysqli_query($db, "SELECT * FROM chelv__notes WHERE note__document='$activeid';");
    $DocNoteData = $DocNoteQuery->fetch_all(MYSQLI_ASSOC);

    // inclure la balise head
    include 'components/head/head.php';

?>

<body class="page page--document">

    <!-- navbar -->
    <?php include 'components/nav/nav.php'; ?>

    <!-- explorer -->
    <?php include 'components/explorer/explorer.php'; ?>

    <!-- note editor and creator -->
    <?php include 'components/form/form--note.php'; ?>

    <!-- layer content -->
    <main class="content content--layer">
        <span class="layer__type">Intercalaire</span>
        <h1 class="layer__title">
        <?php echo $pagetitle ?>
        </h1> 
        <!-- get family -->
        <?php include 'components/family/family--doc.php'; ?> 

        <div>
            <button>
                <?php echo $DocActiveData['document__version']; ?>
            </button>
            <ul>
                <?php 
                
                $binderversion = mysqli_query($db, "SELECT * FROM chelv__documents WHERE document__name='$pagetitle' AND document__owner='$activeuser';");

                while ($rowversion = mysqli_fetch_array($binderversion)) { 

                ?>
                <li>
                    <p>
                        <?php echo $rowversion['document__version']; ?>
                    </p>
                </li>
                <?php } ?>
            </ul>
        </div>
    
        <div>
            <button>
                +
            </button>
            <!-- form to add version -->
            <?php include 'components/form/form--version.php'; ?>
        </div>    
    </main>   
    
    <aside>
        <ul>
            <?php foreach ($DocNoteData as $row) { ?> 

                <section class="note__content">
                    <li>
                        <a href="<?php echo "#" . $row['note__id']; ?>">
                            <?php echo $row['note__name']; ?>
                        </a>
                    </li>
            </section>
            <?php } ?>
        </ul>
    </aside>

    <!-- document -->
    <aside class="aside aside--document">

        <h2 class="aside__title aside__title--document">Les notes</h2>

        <form class="documentnotes__form" method="get">
            <input class="documentnotes__search"  type="text" name="search" placeholder="Search...">
            <div id="documentnotes" class="note">
                <!-- show note  -->
                <?php foreach ($DocNoteData as $row) {
                    include 'components/tease/tease--note.php';                    
                } ?>
            </div>
        </form>

        <!-- add note  -->
        <button class="note__add">nouvelle note</button>
    </aside>
    
</body>
</html>