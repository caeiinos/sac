<?php

    if (isset($_POST['submitdocument'])) {
        if (empty($_POST['documentname'])) {
            $errordoc = true;
        } else {
            $documentname =  htmlspecialchars($_POST['documentname']);
            $documentcolor = $_POST['documentcolor'];
            $documentshape = $_POST['documentshape'];
            $documentversion =  htmlspecialchars($_POST['documentversion']);
            $documentbinder = $_POST['documentbinder'];
            $documentlayer = $_POST['documentlayer'];
            $documenthaschapter = $_POST['documenthaschapter'];
            $documentchapter = $_POST['documentchapter'];
            $documentowner = $_SESSION['id'];
            $documentcreation = date('Y-m-d H:i:s');
            $documentopened = date('Y-m-d H:i:s');

            $stmt = $db->prepare("INSERT INTO chelv__documents (document__name, document__color, document__shape, document__version, document__binder, document__layer, document__haschapter, document__chapter, document__owner, document__creation, document__opened) VALUES (:documentname, :documentcolor, :documentshape, :documentversion, :documentbinder, :documentlayer, :documenthaschapter, :documentchapter, :documentowner, :documentcreation, :documentopened)");
            $stmt->bindParam(':documentname', $documentname);
            $stmt->bindParam(':documentcolor', $documentcolor);
            $stmt->bindParam(':documentshape', $documentshape);
            $stmt->bindParam(':documentversion', $documentversion);
            $stmt->bindParam(':documentbinder', $documentbinder);
            $stmt->bindParam(':documentlayer', $documentlayer);
            $stmt->bindParam(':documenthaschapter', $documenthaschapter);
            $stmt->bindParam(':documentchapter', $documentchapter);
            $stmt->bindParam(':documentowner', $documentowner);
            $stmt->bindParam(':documentcreation', $documentcreation);
            $stmt->bindParam(':documentopened', $documentopened);

            $stmt->execute(); 
        }
    }

    if (isset($_POST['updatenote'])) {
        $documentcontent = $_POST['doccontentonupdate'];
        $documentid = $_POST['docidtoupdate'];
    
        $stmt = $db->prepare("UPDATE chelv__documents SET document__content = :documentcontent WHERE document__id = :documentid");
        $stmt->bindParam(':documentcontent', $documentcontent);
        $stmt->bindParam(':documentid', $documentid);
    
        $stmt->execute();
    }

    if (isset($_POST['changedocument'])) {
        $documentId = $_POST['docidtoupdate'];; // The ID of the chapter you want to update
        
        // Prepare the update query
        $stmt = $db->prepare("UPDATE chelv__documents SET document__name = :name, document__color = :color, document__shape = :shape WHERE document__id = :id");
        
        // Set the new values for the chapter from the $_POST array
        $name =  htmlspecialchars($_POST['documentname']);
        $color = $_POST['documentcolor'];
        $shape = $_POST['documentshape'];
        
        // Bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':shape', $shape);
        $stmt->bindParam(':id', $documentId);
        
        // Execute the query
        $stmt->execute();  
    }


    //del avce méthode get
    if (isset($_POST['del_doc'])) {
        $id = $_POST['idtodelete'];
        $stmt = $db->prepare("SELECT * FROM chelv__documents WHERE document__id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $docbasedel = $stmt->fetch();

        $documentname = $docbasedel['document__name'];
        $documentbinder = $docbasedel['document__binder'];
        $documentlayer = $docbasedel['document__layer'];
        $documenthaschapter = $docbasedel['document__haschapter'];
        $documentchapter = $docbasedel['document__chapter'];
        $documentowner = $docbasedel['document__owner'];

        $seldoc = $db->prepare("SELECT * FROM chelv__documents WHERE document__name=:documentname AND document__binder=:documentbinder AND document__layer=:documentlayer AND document__haschapter=:documenthaschapter AND document__chapter=:documentchapter AND document__owner=:documentowner");
        
        $seldoc->bindParam(':documentname', $documentname);
        $seldoc->bindParam(':documentbinder', $documentbinder);
        $seldoc->bindParam(':documentlayer', $documentlayer);
        $seldoc->bindParam(':documenthaschapter', $documenthaschapter);
        $seldoc->bindParam(':documentchapter', $documentchapter);
        $seldoc->bindParam(':documentowner', $documentowner);

        $seldoc->execute();

        foreach ($seldoc as $row) {
            $noteDocId = $row['document__id'];

            // Delete corresponding entries from chelv__links
            $delLinks = $db->prepare("DELETE FROM chelv__links WHERE link__document=:noteDocId");
            $delLinks->bindParam(':noteDocId', $noteDocId);
            $delLinks->execute();
        }

        $deldoc = $db->prepare("DELETE FROM chelv__documents WHERE document__name=:documentname AND document__binder=:documentbinder AND document__layer=:documentlayer AND document__haschapter=:documenthaschapter AND document__chapter=:documentchapter AND document__owner=:documentowner");
        
        $deldoc->bindParam(':documentname', $documentname);
        $deldoc->bindParam(':documentbinder', $documentbinder);
        $deldoc->bindParam(':documentlayer', $documentlayer);
        $deldoc->bindParam(':documenthaschapter', $documenthaschapter);
        $deldoc->bindParam(':documentchapter', $documentchapter);
        $deldoc->bindParam(':documentowner', $documentowner);

        $deldoc->execute();

    }

?>