<?php

    if (isset($_POST['submitchapter'])) {
        $chaptertitle = $_POST['chaptertitle'];
        $chapterparent = $_POST['chapterparent'];
        $chapterfullname = $_POST['chapterparent'].'__'.$_POST['chaptertitle'];
        $chaptermodification = date('Y-m-d H:i:s');
        $chapterbase = $_POST['chapterbase'];
        mysqli_query($db, "INSERT INTO mychapters (title, parent, fullname, modified, base) VALUES ('$chaptertitle', '$chapterparent', '$chapterfullname', '$chaptermodification', '$chapterbase') ");   
    };

    //del avce méthode get
    if (isset($_GET['del_chapter'])) {
        $id = $_GET['del_chapter'];
        mysqli_query($db, "DELETE FROM MyChapters WHERE id=$id");
    }

    //recupére tout les chapitres
    $MyChapters = mysqli_query($db, "SELECT * FROM MyChapters");

?>