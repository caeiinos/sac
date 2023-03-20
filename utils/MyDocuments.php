<?php

    if (isset($_POST['submitdocument'])) {
        $documenttitle = $_POST['documenttitle'];
        $documentparent = $_POST['documentparent'];
        $documentfullname = $_POST['documentparent'].'__'.$_POST['documenttitle'];
        $documentmodification = date('Y-m-d H:i:s');
        mysqli_query($db, "INSERT INTO mydocuments (title, parent, fullname, modified) VALUES ('$documenttitle', '$documentparent', '$documentfullname', '$documentmodification') ");   
    };

    //del avce méthode get
    if (isset($_GET['del_document'])) {
        $id = $_GET['del_document'];
        mysqli_query($db, "DELETE FROM Mydocuments WHERE id=$id");
    }

    //recupére tout les chapitres
    $Mydocuments = mysqli_query($db, "SELECT * FROM Mydocuments");

?>