<?php

    if (isset($_POST['submitlayer'])) {
        if (empty($_POST['layername'])) {
            $errorlayer = true;
        } else {
            $layername = $_POST['layername'];
            $layerbinder = $_POST['layerbinder'];
            $layerowner = $_SESSION['id'];
            $layercreation = date('Y-m-d H:i:s');
            $layeropened = date('Y-m-d H:i:s');

            $stmt = $db->prepare("INSERT INTO chelv__layers (layer__name, layer__binder, layer__owner, layer__creation, layer__opened) VALUES (:layername, :layerbinder, :layerowner, :layercreation, :layeropened)");
            $stmt->bindParam(':layername', $layername);
            $stmt->bindParam(':layerbinder', $layerbinder);
            $stmt->bindParam(':layerowner', $layerowner);
            $stmt->bindParam(':layercreation', $layercreation);
            $stmt->bindParam(':layeropened', $layeropened);

            $stmt->execute();
        }
    }

    //del avce méthode get
    if (isset($_POST['del_layer'])) {
        $id = $_POST['idtodelete'];
        $stmt = $db->prepare("DELETE FROM chelv__layers WHERE layer__id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();    
    }

?>