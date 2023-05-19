<?php

if (isset($pagetitle)) {
    $primarytitle = $pagetitle.' - CHELV';
} else {
    $primarytitle = 'Accueil - CHELV';
}

$sitedescription = 'Optimisez votre gestion de projet avec CHELV, le gestionnaire de projet intuitif et puissant. Suivez l\'avancement des tâches et organisez vos ressources efficacement. Essayez dès maintenant !'

?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>
			<?php echo $primarytitle ?>
		</title>

		<meta name="description" content="<?php echo $sitedescription ?>">
		<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
		<link rel="stylesheet" href="dist/styles/app.css" type="text/css" media="screen"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">		
		
		<meta name="twitter:card" content="avatar de caeiinos">
		<meta name="twitter:site" content="@JeanDeRoy1">
		<meta name="twitter:creator" content="@JeanDeRoy1">
		<meta name="twitter:title" content="Jean De Roy">
		<meta name="twitter:description" content="<?php echo $sitedescription ?>">

		<meta name="twitter:image" content="https://jean-deroy.be/projets/tfe/app/dist/assets/favicon.png">

		<meta property="og:site__name" content="jean-deroy"/>
		<meta property="og:title" content="Jean De Roy"/>
		<meta property="og:description" content="<?php echo $sitedescription ?>"/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content=""/>
		<meta property="og:image" content="https://jean-deroy.be/projets/tfe/app/dist/assets/favicon.png"/>
		<meta property="og:image:width" content="1200">
		<meta property="og:image:height" content="630">


		<link rel="icon" type="image/png" href="dist/assets/favicon.png">

        <script src="dist/scripts/app.js" defer></script> 
	</head>
