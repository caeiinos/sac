<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auth";

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
?>