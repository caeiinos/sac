<?php

if (isset($pagetitle)) {
    $primarytitle = $pagetitle.' - SAC';
} else {
    $primarytitle = 'Accueil - SAC';
}

$sitedescription = ' '

?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>
			<?php echo $primarytitle ?>
		</title>

		<meta name="description" content="<?php echo $sitedescription ?>">
		<link rel="stylesheet" href="dist/styles/app.css" type="text/css" media="screen"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400&display=swap" rel="stylesheet">

		<meta name="twitter:card" content="avatar de caeiinos">
		<meta name="twitter:site" content="@JeanDeRoy1">
		<meta name="twitter:creator" content="@JeanDeRoy1">
		<meta name="twitter:title" content="Jean De Roy">
		<meta name="twitter:description" content="<?php echo $sitedescription ?>">

		<meta name="twitter:image" content="dist/assets/logo.png">

		<meta property="og:site__name" content="jean-deroy"/>
		<meta property="og:title" content="Jean De Roy"/>
		<meta property="og:description" content="<?php echo $sitedescription ?>"/>
		<meta property="og:type" content="website"/>
		<meta property="og:url" content=""/>
		<meta property="og:image" content="dist/assets/logo.png"/>
		<meta property="og:image:width" content="1200">
		<meta property="og:image:height" content="630">


		<link rel="icon" type="image/png" href="dist/assets/favicon.png">

        <script src="dist/scripts/app.js" defer></script> 
	</head>
</html>
