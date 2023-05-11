<?php

    if (isset($_POST['submitdocument'])) {
        $documentname = mysqli_real_escape_string($db, $_POST['documentname']);
        $documentversion = mysqli_real_escape_string($db, $_POST['documentversion']);
        $documentbinder = mysqli_real_escape_string($db, $_POST['documentbinder']);
        $documentlayer = mysqli_real_escape_string($db, $_POST['documentlayer']);
        $documenthaschapter = $_POST['documenthaschapter'];
        $documentchapter = mysqli_real_escape_string($db, $_POST['documentchapter']);
        $documentowner = $_SESSION['id'];
        $documentcreation = date('Y-m-d H:i:s');
        $documentopened = date('Y-m-d H:i:s');
        mysqli_query($db, "INSERT INTO chelv__documents (document__name, document__version, document__binder, document__layer, document__haschapter, document__chapter, document__owner, document__creation, document__opened) VALUES ('$documentname', '$documentversion', '$documentbinder', '$documentlayer', '$documenthaschapter', '$documentchapter','$documentowner', '$documentcreation', '$documentopened') ");   
    };

    //del avce méthode get
    if (isset($_GET['del_document'])) {
        $id = $_GET['del_document'];
        mysqli_query($db, "DELETE FROM Mydocuments WHERE id=$id");
    }

?>