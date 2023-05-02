<?php

    if (isset($_POST['submitlayer'])) {
        $layername = mysqli_real_escape_string($db, $_POST['layername']);
        $layerbinder = mysqli_real_escape_string($db, $_POST['layerbinder']);
        $layerowner = $_SESSION['id'];
        $layercreation = date('Y-m-d H:i:s');
        $layeropened = date('Y-m-d H:i:s');
        mysqli_query($db, "INSERT INTO chelv__layers (layer__name, layer__binder, layer__owner, layer__creation, layer__opened) VALUES ('$layername', '$layerbinder', '$layerowner', '$layercreation', '$layeropened') ");   
    };

    //del avce méthode get
    if (isset($_GET['del_layer'])) {
        $id = $_GET['del_layer'];
        mysqli_query($db, "DELETE FROM Mylayers WHERE id=$id");
    }

?>