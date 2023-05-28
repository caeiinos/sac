<?php

    if (isset($_POST['submitlayer'])) {
        if (empty($_POST['layername'])) {
            $errorlayer = true;
        } else {
            $layername =  htmlspecialchars($_POST['layername']);            
            $layercolor = $_POST['layercolor'];
            $layershape = $_POST['layershape'];
            $layerbinder = $_POST['layerbinder'];
            $layerowner = $_SESSION['id'];
            $layercreation = date('Y-m-d H:i:s');
            $layeropened = date('Y-m-d H:i:s');

            $stmt = $db->prepare("INSERT INTO chelv__layers (layer__name, layer__color, layer__shape, layer__binder, layer__owner, layer__creation, layer__opened) VALUES (:layername, :layercolor, :layershape, :layerbinder, :layerowner, :layercreation, :layeropened)");
            $stmt->bindParam(':layercolor', $layercolor);
            $stmt->bindParam(':layershape', $layershape);
            $stmt->bindParam(':layername', $layername);
            $stmt->bindParam(':layerbinder', $layerbinder);
            $stmt->bindParam(':layerowner', $layerowner);
            $stmt->bindParam(':layercreation', $layercreation);
            $stmt->bindParam(':layeropened', $layeropened);

            $stmt->execute();
        }
    }

    if (isset($_POST['changelayer'])) {
        $layerId = $_POST['layeridtoupdate'];; // The ID of the chapter you want to update
        
        // Prepare the update query
        $stmt = $db->prepare("UPDATE chelv__layers SET layer__name = :name, layer__color = :color, layer__shape = :shape WHERE layer__id = :id");
        
        // Set the new values for the chapter from the $_POST array
        $name =  htmlspecialchars($_POST['layername']);
        $color = $_POST['layercolor'];
        $shape = $_POST['layershape'];
        
        // Bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':shape', $shape);
        $stmt->bindParam(':id', $layerId);
        
        // Execute the query
        $stmt->execute();  
    }

    //del avce méthode get
    if (isset($_POST['del_layer'])) {
        $id = $_POST['idtodelete'];
        $stmt = $db->prepare("DELETE FROM chelv__layers WHERE layer__id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();    

        $stmt = $db->prepare("DELETE FROM chelv__chapters WHERE chapter__layer=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute(); 

        $stmt = $db->prepare("SELECT * FROM chelv__documents WHERE document__layer=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        foreach ($stmt as $row) {
            $noteDocId = $row['document__id'];

            // Delete corresponding entries from chelv__links
            $delLinks = $db->prepare("DELETE FROM chelv__links WHERE link__document=:noteDocId");
            $delLinks->bindParam(':noteDocId', $noteDocId);
            $delLinks->execute();
        }
        
        $stmt = $db->prepare("DELETE FROM chelv__documents WHERE document__layer=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

?>