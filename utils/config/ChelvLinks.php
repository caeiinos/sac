<?php

    if (isset($_POST['submitlink'])) {
        if (empty($_POST['linkname'])) {
            $errorlink = true;
        } else {
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
    }

    //del avce méthode get
    if (isset($_POST['del_link'])) {
        $id = $_POST['idtodelete'];
        $stmt = $db->prepare("DELETE FROM chelv__links WHERE link__id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

?>