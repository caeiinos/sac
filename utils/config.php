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
    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // sdbet the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
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

    //fonctions pour les documents
    include 'config/ChelvNotes.php';
?>
