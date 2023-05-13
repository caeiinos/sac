<?php

    if (isset($_POST['submitnote']) && $_POST['noteid'] == "") {
        $notedescription = $_POST['notedescription'];
        $notedocument = $_POST['notedocument'];
        $noteowner = $_SESSION['id'];
        $notecreation = date('Y-m-d H:i:s');
        $noteopened = date('Y-m-d H:i:s');

        $stmt = $db->prepare("INSERT INTO chelv__notes (note__description, note__document, note__owner, note__creation, note__opened) VALUES (:notedescription, :notedocument, :noteowner, :notecreation, :noteopened)");
        $stmt->bindParam(':notedescription', $notedescription);
        $stmt->bindParam(':notedocument', $notedocument);
        $stmt->bindParam(':noteowner', $noteowner);
        $stmt->bindParam(':notecreation', $notecreation);
        $stmt->bindParam(':noteopened', $noteopened);

        $stmt->execute();
    } elseif (isset($_POST['submitnote']) && $_POST['noteid'] != "") {
        $notedescription = $_POST['notedescription'];
        $activeideditor = $_POST['noteid'];

        $stmt = $db->prepare("UPDATE chelv__notes SET note__description = :notedescription WHERE note__id = :activeideditor");
        $stmt->bindParam(':notedescription', $notedescription);
        $stmt->bindParam(':activeideditor', $activeideditor);

        $stmt->execute();
    }

    //del avce méthode get
    if (isset($_GET['del_note'])) {
        $id = $_GET['del_note'];
        mysqli_query($db, "DELETE FROM Mynotes WHERE id=$id");
    }

?>