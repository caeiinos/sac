<?php

    if (isset($_POST['submitbinder'])) {
        $bindername = mysqli_real_escape_string($db, $_POST['bindername']);
        $binderdescription = mysqli_real_escape_string($db, $_POST['binderdescription']);
        $binderowner = $_SESSION['id'];
        $bindercreation = date('Y-m-d H:i:s');
        $binderopened = date('Y-m-d H:i:s');
        mysqli_query($db, "INSERT INTO chelv__binders (binder__name, binder__description, binder__owner, binder__creation, binder__opened) VALUES ('$bindername', '$binderdescription', '$binderowner', '$bindercreation', '$binderopened') ");   
    };

    //del avce méthode get
    if (isset($_GET['del_binder'])) {
        $id = $_GET['del_binder'];
        mysqli_query($db, "DELETE FROM chelv__binders WHERE id=$id");
    }

?>