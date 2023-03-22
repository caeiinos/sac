<?php

    if (isset($_POST['submitlayer'])) {
        $layertitle = $_POST['layertitle'];
        $layerparent = $_POST['layerparent'];
        $layerfullname = $_POST['layerparent'].'_'.$_POST['layertitle'];
        $layermodification = date('Y-m-d H:i:s');
        $layerbase = $_POST['layerbase'];
        mysqli_query($db, "INSERT INTO mylayers (title, parent, fullname, modified, base) VALUES ('$layertitle', '$layerparent', '$layerfullname', '$layermodification', '$layerbase') ");   
    };

    //del avce méthode get
    if (isset($_GET['del_layer'])) {
        $id = $_GET['del_layer'];
        mysqli_query($db, "DELETE FROM Mylayers WHERE id=$id");
    }

    //recupére tout les intercalaires
    $Mylayers = mysqli_query($db, "SELECT * FROM Mylayers");

    //recupére les projets d'un 
    // $ProjectChild = mysqli_query($db, "SELECT * FROM mylayers INNER JOIN myprojects ON mylayers.parent=myprojects.title;")
?>