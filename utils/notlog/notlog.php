<?php 

    if (isset($_SESSION['id']) == false) {
        header("Location: sign-in.php");
    }

?>