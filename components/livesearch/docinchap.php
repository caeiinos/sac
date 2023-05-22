<?php 

include '../../utils/config.php';

// trouver l'intercalaire
$activeid = $_GET['chapterid'];

$activeuser = $_SESSION['id'];

    if (isset($_GET["y"])) {
        $y = $_GET["y"];

        $documentchapterQuery = $db->prepare("SELECT * FROM chelv__documents where document__name LIKE '$y%' AND document__chapter=? AND document__owner=?"); 
        $documentchapterQuery->execute([$_GET['chapterid'], $_SESSION['id']]);
        $documentchapterData = $documentchapterQuery->fetchAll();
            
        if ($documentchapterData) {
            foreach ($documentchapterData as $ChapterDocRow) { ?>

                <section class="tease__content">
                    <a class="tease__link" href="<?php echo 'document.php?documentid='.$ChapterDocRow['document__id']; ?>">
                        <?php include '../svg/document.php' ?>
                        <h4 class="tease__title tease__title--document">
                            <?php echo $ChapterDocRow['document__name']; ?>
                        </h4>
                    </a>
                    <form method="POST" name="del_doc">
                        <input type="hidden" name="idtodelete" value="<?php echo $ChapterDocRow['document__id'] ?>">
                        <button class="doc__del" type="submit" name="del_doc">
                            <?php include '../svg/trash.php' ?>
                        </button>  
                    </form>    
                </section>
                
            <?php }
        }else { ?>
            <p class="explorer__no">
                Aucun résultat trouvé. Réessayez avec un autre recherche
            </p>
        <?php }

    }
?>