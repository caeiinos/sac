<?php

    if (isset($_POST['submitchapter'])) {
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
    //del avce méthode get
    if (isset($_GET['del_chapter'])) {
        $id = $_GET['del_chapter'];
        mysqli_query($db, "DELETE FROM Mychapters WHERE id=$id");
    }

?>