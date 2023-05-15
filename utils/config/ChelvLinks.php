<?php

    if (isset($_POST['submitlink'])) {
        $linkname = $_POST['linkname'];
        $linkurl = $_POST['linkurl'];
        $linkdocument = $_POST['linkdocument'];
        $linkowner = $_SESSION['id'];
        $linkcreation = date('Y-m-d H:i:s');
        $linkopened = date('Y-m-d H:i:s');

        $stmt = $db->prepare("INSERT INTO chelv__links (link__name, link__url, link__document, link__owner, link__creation, link__opened) VALUES (:linkname, :linkurl, :linkdocument, :linkowner, :linkcreation, :linkopened)");
        $stmt->bindParam(':linkname', $linkname);
        $stmt->bindParam(':linkurl', $linkurl);
        $stmt->bindParam(':linkdocument', $linkdocument);
        $stmt->bindParam(':linkowner', $linkowner);
        $stmt->bindParam(':linkcreation', $linkcreation);
        $stmt->bindParam(':linkopened', $linkopened);

        $stmt->execute();
    }

    //del avce méthode get
    if (isset($_GET['del_link'])) {
        $id = $_GET['del_link'];
        mysqli_query($db, "DELETE FROM Mylinks WHERE id=$id");
    }

?>