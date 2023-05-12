<?php 

include '../../utils/config.php';

    $activenote = $_GET['q'];
    $query = mysqli_query($db, "SELECT * FROM chelv__notes WHERE note__id = '$activenote' ;");

    while ($row = mysqli_fetch_array($query)) {
        echo $row['note__description'];
    };
?>