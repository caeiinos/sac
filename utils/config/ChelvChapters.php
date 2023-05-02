<?php

    if (isset($_POST['submitchapter'])) {
        $chaptername = mysqli_real_escape_string($db, $_POST['chaptername']);
        $chapterbinder = mysqli_real_escape_string($db, $_POST['chapterbinder']);
        $chapterlayer = mysqli_real_escape_string($db, $_POST['chapterlayer']);
        $chapterowner = $_SESSION['id'];
        $chaptercreation = date('Y-m-d H:i:s');
        $chapteropened = date('Y-m-d H:i:s');
        mysqli_query($db, "INSERT INTO chelv__chapters (chapter__name, chapter__binder, chapter__layer, chapter__owner, chapter__creation, chapter__opened) VALUES ('$chaptername', '$chapterbinder', '$chapterlayer', '$chapterowner', '$chaptercreation', '$chapteropened') ");   
    };

    //del avce méthode get
    if (isset($_GET['del_chapter'])) {
        $id = $_GET['del_chapter'];
        mysqli_query($db, "DELETE FROM Mychapters WHERE id=$id");
    }

?>