<?php

    if (isset($_POST['submitnote'])) {
        $notetitle = $_POST['notetitle'];
        $notedescription = $_POST['notedescription'];
        $notefavorites = false;
        $notecreation = date('Y-m-d H:i:s');
        $notemodification = date('Y-m-d H:i:s');
        mysqli_query($db, "INSERT INTO mynotes (title, description, creation, modified) VALUES ('$notetitle', '$notedescription', '$notecreation', '$notemodification') ");   
    };

    //del avce méthode get
    if (isset($_GET['del_note'])) {
        $id = $_GET['del_note'];
        mysqli_query($db, "DELETE FROM Mynotes WHERE id=$id");
    }

    //recupére tout les projets
    $Mynotes = mysqli_query($db, "SELECT * FROM Mynotes");
?>