<?php

    if (isset($_POST['submitchapter'])) {
        if (empty($_POST['chaptername'])) {
            $errorchap = true;
        } else {
            $chaptername =  htmlspecialchars($_POST['chaptername']);
            $chaptercolor = $_POST['chaptercolor'];
            $chaptershape = $_POST['chaptershape'];
            $chapterbinder = $_POST['chapterbinder'];
            $chapterlayer = $_POST['chapterlayer'];
            $chapterowner = $_SESSION['id'];
            $chaptercreation = date('Y-m-d H:i:s');
            $chapteropened = date('Y-m-d H:i:s');
    
            $stmt = $db->prepare("INSERT INTO chelv__chapters (chapter__name, chapter__color, chapter__shape, chapter__binder, chapter__layer, chapter__owner, chapter__creation, chapter__opened) VALUES (:chaptername, :chaptercolor, :chaptershape, :chapterbinder, :chapterlayer, :chapterowner, :chaptercreation, :chapteropened)");
            $stmt->bindParam(':chaptername', $chaptername);
            $stmt->bindParam(':chaptercolor', $chaptercolor);
            $stmt->bindParam(':chaptershape', $chaptershape);
            $stmt->bindParam(':chapterbinder', $chapterbinder);
            $stmt->bindParam(':chapterlayer', $chapterlayer);
            $stmt->bindParam(':chapterowner', $chapterowner);
            $stmt->bindParam(':chaptercreation', $chaptercreation);
            $stmt->bindParam(':chapteropened', $chapteropened);
    
            $stmt->execute();
        }
    }

    if (isset($_POST['change_chap'])) {
        $chapterId = $_POST['chaptoupdate'];; // The ID of the chapter you want to update
        
        // Prepare the update query
        $stmt = $db->prepare("UPDATE chelv__chapters SET chapter__name = :name, chapter__color = :color, chapter__shape = :shape WHERE chapter__id = :id");
        
        // Set the new values for the chapter from the $_POST array
        $name =  htmlspecialchars($_POST['chaptername']);
        $color = $_POST['chaptercolor'];
        $shape = $_POST['chaptershape'];
        
        // Bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':shape', $shape);
        $stmt->bindParam(':id', $chapterId);
        
        // Execute the query
        $stmt->execute();
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