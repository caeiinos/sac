<?php

    if (isset($_POST['submitdocument'])) {
        $documentname = $_POST['documentname'];
        $documentversion = $_POST['documentversion'];
        $documentbinder = $_POST['documentbinder'];
        $documentlayer = $_POST['documentlayer'];
        $documenthaschapter = $_POST['documenthaschapter'];
        $documentchapter = $_POST['documentchapter'];
        $documentowner = $_SESSION['id'];
        $documentcreation = date('Y-m-d H:i:s');
        $documentopened = date('Y-m-d H:i:s');

        $stmt = $db->prepare("INSERT INTO chelv__documents (document__name, document__version, document__binder, document__layer, document__haschapter, document__chapter, document__owner, document__creation, document__opened) VALUES (:documentname, :documentversion, :documentbinder, :documentlayer, :documenthaschapter, :documentchapter, :documentowner, :documentcreation, :documentopened)");
        $stmt->bindParam(':documentname', $documentname);
        $stmt->bindParam(':documentversion', $documentversion);
        $stmt->bindParam(':documentbinder', $documentbinder);
        $stmt->bindParam(':documentlayer', $documentlayer);
        $stmt->bindParam(':documenthaschapter', $documenthaschapter);
        $stmt->bindParam(':documentchapter', $documentchapter);
        $stmt->bindParam(':documentowner', $documentowner);
        $stmt->bindParam(':documentcreation', $documentcreation);
        $stmt->bindParam(':documentopened', $documentopened);

        $stmt->execute();
    }

    //del avce méthode get
    if (isset($_GET['del_document'])) {
        $id = $_GET['del_document'];
        mysqli_query($db, "DELETE FROM Mydocuments WHERE id=$id");
    }

?>