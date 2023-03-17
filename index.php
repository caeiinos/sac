<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/DbConnect.php';
    
    // $errors = "";   

    // $stmt = $db->prepare("INSERT INTO MyProjects (firstname, lastname, email) VALUES (?, ?, ?)")
    // $stmt = $db->prepare("INSERT INTO MyLayers (firstname, lastname, email) VALUES (?, ?, ?)")
    // $stmt = $db->prepare("INSERT INTO MyChapters (firstname, lastname, email) VALUES (?, ?, ?)")
    // $stmt = $db->prepare("INSERT INTO MyDocuments (firstname, lastname, email) VALUES (?, ?, ?)")
    // $myexam = $db->prepare("INSERT INTO MyExams (firstname, lastname, email) VALUES (?, ?, ?)")


    // $mynote = $db->prepare("INSERT INTO MyNotes (Title, Date, content, parent) VALUES (?, ?, ?, ?)")

    //fonctions pour les projets
    include 'utils/Myprojects.php';


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAC</title>
</head>
<body>
    <header></header>

    <form method="POST" action="index.php">

        <input type="text" name="projecttitle">
        <input type="text" name="projectdescription">

        <button type="submit" name="submitproject">add task</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Titre</th>
                <th>Description</th>
                <th>favoris</th>
                <th>Création</th>
                <th>modification</th>

            </tr>
        </thead>

        <tbody>
            <?php $i = 1; while ($row = mysqli_fetch_array($MyProjects)) { ?> 

                <tr>
                    <td>
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                        <a href="index.php">
                            <?php echo $row['title']; ?>
                        </a>
                    </td>
                    <td>
                        <p>
                            <?php echo $row['description']; ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php echo $row['favorite']; ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php echo $row['creation']; ?>
                        </p>
                    </td>
                    <td>
                        <p>
                            <?php echo $row['modified']; ?>
                        </p>
                    </td>
                    <td>
                        <a href="index.php?del_project=<?php echo $row['id']; ?>">X</a>
                    </td>
                </tr>

            <?php $i++; } ?>

        </tbody>
    
</body>
</html>