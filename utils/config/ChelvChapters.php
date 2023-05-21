<?php

    if (isset($_POST['submitchapter'])) {
        if (empty($_POST['chaptername'])) {
            $errorchap = true;
        } else {
            $chaptername = $_POST['chaptername'];
            $chapterbinder = $_POST['chapterbinder'];
            $chapterlayer = $_POST['chapterlayer'];
            $chapterowner = $_SESSION['id'];
            $chaptercreation = date('Y-m-d H:i:s');
            $chapteropened = date('Y-m-d H:i:s');
    
            $stmt = $db->prepare("INSERT INTO chelv__chapters (chapter__name, chapter__binder, chapter__layer, chapter__owner, chapter__creation, chapter__opened) VALUES (:chaptername, :chapterbinder, :chapterlayer, :chapterowner, :chaptercreation, :chapteropened)");
            $stmt->bindParam(':chaptername', $chaptername);
            $stmt->bindParam(':chapterbinder', $chapterbinder);
            $stmt->bindParam(':chapterlayer', $chapterlayer);
            $stmt->bindParam(':chapterowner', $chapterowner);
            $stmt->bindParam(':chaptercreation', $chaptercreation);
            $stmt->bindParam(':chapteropened', $chapteropened);
    
            $stmt->execute();
        }
    }
    //del avce méthode get
    if (isset($_POST['del_chap'])) {
        $id = $_POST['idtodelete'];
        $stmt = $db->prepare("DELETE FROM chelv__chapters WHERE chapter__id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $stmt = $db->prepare("SELECT * FROM chelv__documents WHERE document__chapter=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        foreach ($stmt as $row) {
            $noteDocId = $row['document__id'];
            // Delete corresponding entries from chelv__notes
            $delNotes = $db->prepare("DELETE FROM chelv__notes WHERE note__document=:noteDocId");
            $delNotes->bindParam(':noteDocId', $noteDocId);
            $delNotes->execute();

            // Delete corresponding entries from chelv__links
            $delLinks = $db->prepare("DELETE FROM chelv__links WHERE link__document=:noteDocId");
            $delLinks->bindParam(':noteDocId', $noteDocId);
            $delLinks->execute();
        }

        $stmt = $db->prepare("DELETE FROM chelv__documents WHERE document__chapter=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

?>