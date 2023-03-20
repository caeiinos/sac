<?php

    if (isset($_POST['submitproject'])) {
        $projecttitle = $_POST['projecttitle'];
        $projectdescription = $_POST['projectdescription'];
        $projectfavorites = false;
        $projectcreation = date('Y-m-d H:i:s');
        $projectmodification = date('Y-m-d H:i:s');
        mysqli_query($db, "INSERT INTO myprojects (title, description, favorite, creation, modified) VALUES ('$projecttitle', '$projectdescription', '$projectfavorites', '$projectcreation', '$projectmodification') ");   
    };

    //del avce méthode get
    if (isset($_GET['del_project'])) {
        $id = $_GET['del_project'];
        mysqli_query($db, "DELETE FROM MyProjects WHERE id=$id");
    }

    //recupére tout les projets
    $MyProjects = mysqli_query($db, "SELECT * FROM MyProjects");

    $ProjectsData  = $MyProjects->fetch_all(MYSQLI_ASSOC);
?>