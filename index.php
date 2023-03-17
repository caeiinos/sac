<?php 
    date_default_timezone_set("Europe/Brussels");

    //connect the db
    include 'utils/DbConnect.php';

    //fonctions pour les projets
    include 'utils/Myprojects.php';

    //fonctions pour les chapitres
    include 'utils/MyChapters.php';


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

    <?php while ($row = mysqli_fetch_array($MyProjects)) { ?> 

        <div>
            <h2>
                <?php echo $row['title']; ?>
            </h2>
            <p>
                <?php echo $row['description']; ?> 
            </p>

            <form method="POST" action="index.php">

                <input type="text" name="chaptertitle">
                <input type="text" name="chapterparent" value="<?php echo $row['title']; ?>" readonly="readonly">

                <button type="submit" name="submitchapter">add task</button>
            </form>

            <ul>
                <?php while ($list = mysqli_fetch_array($ProjectChild)) { ?> 
                    <li>
                        <?php echo $list['title']; ?>
                    </li>
                <?php } ?>
            </ul>
        </div>

    <?php } ?>
    
</body>
</html>