<?php

    if (isset($_POST['submitnote'])) {
        $notetitle = $_POST['notetitle'];
        $notecontent = $_POST['notecontent'];
        $noteparent = $_POST['noteparent'];
        $notecreation = date('Y-m-d H:i:s');
        $notemodification = date('Y-m-d H:i:s');
        mysqli_query($db, "INSERT INTO mynotes (title, content, parent, creation, modified) VALUES ('$notetitle', '$notecontent', '$noteparent', '$notecreation', '$notemodification') ");   
    };

    //del avce méthode get
    if (isset($_GET['del_note'])) {
        $id = $_GET['del_note'];
        mysqli_query($db, "DELETE FROM Mynotes WHERE id=$id");
    }

    //recupére tout les projets
    $Mynotes = mysqli_query($db, "SELECT * FROM mynotes");
?>