<?php

    if (isset($_POST['submitbinder'])) {
        if (empty($_POST['bindername'])) {
            $errorbinder = true;
        } else {
           $bindername = $_POST['bindername'];
           $binderdescription = $_POST['binderdescription'];
           $binderowner = $_SESSION['id'];
           $bindercreation = date('Y-m-d H:i:s');
           $binderopened = date('Y-m-d H:i:s');

           $stmt = $db->prepare("INSERT INTO chelv__binders (binder__name, binder__description, binder__owner, binder__creation, binder__opened) VALUES (:bindername, :binderdescription, :binderowner, :bindercreation, :binderopened)");
           $stmt->bindParam(':bindername', $bindername);
           $stmt->bindParam(':binderdescription', $binderdescription);
           $stmt->bindParam(':binderowner', $binderowner);
           $stmt->bindParam(':bindercreation', $bindercreation);
           $stmt->bindParam(':binderopened', $binderopened);

           $stmt->execute();
        }

    }

    if (isset($_POST['updatebinder'])) {
        $binderdescription = $_POST['binderdescriptionupdate'];
        $binderid = $_POST['binderidtoupdate'];
    
        $stmt = $db->prepare("UPDATE chelv__binders SET binder__description = :binderdescription WHERE binder__id = :binderid");
        $stmt->bindParam(':binderdescription', $binderdescription);
        $stmt->bindParam(':binderid', $binderid);
    
        $stmt->execute();
    }

    //del avce méthode get
    if (isset($_GET['del_binder'])) {
        $id = $_GET['del_binder'];
        mysqli_query($db, "DELETE FROM chelv__binders WHERE id=$id");
    }

?>