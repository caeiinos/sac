<?php

    if (isset($_POST['submitbinder'])) {
        if (empty($_POST['bindername'])) {
            $errorbinder = true;
        } else {
           $bindername = htmlspecialchars($_POST['bindername']);
           $binderdescription = $_POST['binderdescription'];
           $binderowner = $_SESSION['id'];
           $bindercreation = date('Y-m-d H:i:s');
           $binderopened = date('Y-m-d H:i:s');

           $stmt = $db->prepare("INSERT INTO chelv__binders (binder__name, binder__description, binder__owner, binder__creation, binder__opened) VALUES (:bindername, :binderdescription, :binderowner, :bindercreation, :binderopened)");
           $stmt->bindParam(':bindername', $bindername);
           $stmt->bindParam(':binderdescription', $binderdescription);
           $stmt->bindParam(':binderowner', $binderowner);
           $stmt->bindParam(':bindercreation', $bindercreation);
           $stmt->bindParam(':binderopened', $binderopened);

           $stmt->execute();
        }

    }

    if (isset($_POST['updatebinder'])) {
        $binderdescription = $_POST['binderdescriptionupdate'];
        $binderid = $_POST['binderidtoupdate'];
    
        $stmt = $db->prepare("UPDATE chelv__binders SET binder__description = :binderdescription WHERE binder__id = :binderid");
        $stmt->bindParam(':binderdescription', $binderdescription);
        $stmt->bindParam(':binderid', $binderid);
    
        $stmt->execute();
    }

    if (isset($_POST['binderchange'])) {
        $binderId = $_POST['binderidtoupdate'];; // The ID of the chapter you want to update
        
        // Prepare the update query
        $stmt = $db->prepare("UPDATE chelv__binders SET binder__name = :name WHERE binder__id = :id");
        
        // Set the new values for the chapter from the $_POST array
        $name = $_POST['bindername'];
        
        // Bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $binderId);
        
        // Execute the query
        $stmt->execute();    
    }

    //del avce méthode get
    if (isset($_POST['del_binder'])) {
        $id = $_POST['idtodelete'];

        $stmt = $db->prepare("DELETE FROM chelv__binders WHERE binder__id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();   

        $stmt = $db->prepare("DELETE FROM chelv__layers WHERE layer__binder=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();    

        $stmt = $db->prepare("DELETE FROM chelv__chapters WHERE chapter__binder=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute(); 

        $stmt = $db->prepare("SELECT * FROM chelv__documents WHERE document__binder=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        foreach ($stmt as $row) {
            $noteDocId = $row['document__id'];

            // Delete corresponding entries from chelv__links
            $delLinks = $db->prepare("DELETE FROM chelv__links WHERE link__document=:noteDocId");
            $delLinks->bindParam(':noteDocId', $noteDocId);
            $delLinks->execute();
        }
        
        $stmt = $db->prepare("DELETE FROM chelv__documents WHERE document__binder=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

?>