<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="fleet est un site de partage de projet dans le cadre d'un projet étudiant de seconde année MMI" />
    <meta name="author" content="Angelique Souvant" />
    <title>Fleet</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    		    <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="css/styleMax.css">

	<link rel="stylesheet" href="css/fonts/fontawesome-all.css">
	<link rel="icon" type="image/png" href="img/accueil/fleet2.png" />
    <script src="js/jquery-3.3.1.min.js" charset="utf-8"></script>
</head>
<body>
	<!-- NAVBAR -->
  	<?php if(!isset($_SESSION['auth'])): ?>
			<header class="headeracc">
					<div class="nav">
						<img class="img" src="img/accueil/fleet2.png" alt="logo fleet"/>
					</div>
			</header>
      <?php endif; ?>

<?php if(Session::getInstance()->hasFlashes()):?>
	<?php foreach (Session::getInstance()->getFlashes() as $type => $message):?>
		<div class="alert alert-<?= $type; ?>">
			<?= $message; ?>
		</div>

	<?php endforeach; ?>
<?php endif; ?>
