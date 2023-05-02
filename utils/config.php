<?php 
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "chelv";

    // $servername = "jeandeqjeandeq.mysql.db";
    // $username = "jeandeqjeandeq";
    // $password = "Dinosaure2001";
    // $dbname = "jeandeqjeandeq";

    // Create connection
    $db = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //fonctions pour les projets
    include 'config/ChelvBinders.php';

    //fonctions pour les intercalaires
    include 'config/ChelvLayers.php';

    //fonctions pour les chapitres
    include 'config/ChelvChapters.php';

    //fonctions pour les documents
    include 'config/ChelvDocuments.php';
?>
