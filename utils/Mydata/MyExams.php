<?php

    if (isset($_POST['submitexam'])) {
        $examtitle = $_POST['examtitle'];
        $examparent = $_POST['examparent'];
        $examfullname = $_POST['examparent'].'__'.$_POST['examtitle'];
        $exammodification = date('Y-m-d H:i:s');
        $exambase = $_POST['exambase'];
        mysqli_query($db, "INSERT INTO myexams (title, parent, fullname, modified, base) VALUES ('$examtitle', '$examparent', '$examfullname', '$exammodification', '$exambase') ");   
    };

    //del avce méthode get
    if (isset($_GET['del_exam'])) {
        $id = $_GET['del_exam'];
        mysqli_query($db, "DELETE FROM Myexams WHERE id=$id");
    }

    //recupére tout les chapitres
    $Myexams = mysqli_query($db, "SELECT * FROM Myexams");

?>