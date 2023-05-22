<?php 

include '../../utils/config.php';

    if (isset($_GET["q"])) {
        $q = $_GET["q"];

        $ProjectQuery = $db->prepare("SELECT * FROM chelv__binders where binder__name LIKE '$q%' AND binder__owner=?"); 
        $ProjectQuery->execute([$_SESSION['id']]);
        $ProjectData = $ProjectQuery->fetchAll();
            
        if ($ProjectData ) {
            foreach ($ProjectData as $NavBinderRow) { ?>
            
                <ul class="explorer__binderlist">
                    <li class="explorer__binderitem">
                        <a class="explorer__binderlink" href="<?php echo 'binder.php?binderid='.$NavBinderRow['binder__id']; ?>">
                            <?php echo $NavBinderRow['binder__name']; ?>
                        </a>
                    </li>
                </ul>                
            
            <?php }
        }else { ?>
            <p class="explorer__no">
                Aucun résultat trouvé. Réessayez avec un autre recherche
            </p>
        <?php }

    }
?>