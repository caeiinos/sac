<?php

    if (isset($_POST['submitnote']) && $_POST['noteid'] == "") {
        $notedescription = mysqli_real_escape_string($db, $_POST['notedescription']);
        $notedocument = mysqli_real_escape_string($db, $_POST['notedocument']);
        $noteowner = $_SESSION['id'];
        $notecreation = date('Y-m-d H:i:s');
        $noteopened = date('Y-m-d H:i:s');
        mysqli_query($db, "INSERT INTO chelv__notes ( note__description, note__document, note__owner, note__creation, note__opened) VALUES ( '$notedescription', '$notedocument', '$noteowner', '$notecreation', '$noteopened') ");   
    } elseif (isset($_POST['submitnote']) && $_POST['noteid'] != "") {
        $notedescription = mysqli_real_escape_string($db, $_POST['notedescription']);
        $activeideditor = $_POST['noteid'];
        mysqli_query($db, "UPDATE chelv__notes SET note__description = '$notedescription' WHERE note__id = '$activeideditor' ");  
    };

    //del avce méthode get
    if (isset($_GET['del_note'])) {
        $id = $_GET['del_note'];
        mysqli_query($db, "DELETE FROM Mynotes WHERE id=$id");
    }

?>