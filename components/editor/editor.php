<?php 

include '../../utils/config.php';

    $query = $db->prepare("SELECT * FROM chelv__notes WHERE note__id = ? ;");
    $query->execute([$_GET['q']]);
    $data = $query->fetchAll();

    foreach ($data as $row) {
        echo $row['note__description'];
    };
?>