<?php
	require 'inc/bootstrap.php';
	App::getAuth()->restrict();
	$db = App::getDatabase();
	$user = $db->query("SELECT * FROM users WHERE id= ?", [$_GET['user']])->fetch();
    if(!$user){
      header("Location: main.php");
    }
	$image = new Image();
	$avatar = $db->query("SELECT avatar FROM users WHERE id = ?", [$_GET['user']])->fetch();
	$background = $db->query("SELECT background FROM users WHERE id = ?", [$_GET['user']])->fetch();
	$description = $db->query('SELECT description FROM users WHERE id=?',[$_GET['user']])->fetch();
	$projets = $db->query('SELECT * FROM projets WHERE id_user= ?', [$_GET['user']])->fetchAll();
	$hobbies = $db->query('SELECT libelle FROM hobbies WHERE id_user= ?', [$_GET['user']])->fetchAll();
	?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fleet</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleMax.css">
		<link rel="stylesheet" href="css/fonts/fontawesome-all.css">

		<style>
		.footer{
			margin-top: 0px;
		}
		</style>
</head>
<body>
<div id="profil-background">
	<div class="global" id="global">
		<!-- NAVBAR -->

	<?php if(Session::getInstance()->hasFlashes()):?>
		<?php foreach (Session::getInstance()->getFlashes() as $type => $message):?>
			<div class="alert alert-<?= $type; ?>">
				<?= $message; ?>
			</div>

		<?php endforeach; ?>
	<?php endif; ?>

		<header class="header">

			<?php if(isset($_SESSION['auth'])): ?>
			<div class="divimg"><a href="main.php"><img class="imggen" src="img/accueil/fleet2.png" alt="logoFleet"/></a></div>
				<div class="nav">
					<div class="nav-items"><a href="main.php">Accueil</a></div>
					<div class="nav-items"><a href="allprojets.php">Projets</a></div>
					<div class="nav-items"><a href="allrevu.php">Revues</a></div>
					<div class="nav-items"><a href="allparcours.php">Parcours</a></div>
					<div class="nav-items"><a href="profil.php">Profil</a></div>
					<div class="nav-items"><a href="logout.php">Déconnexion</a></div>
				</div>
			<?php endif; ?>
		</header>

		<div class="bandeau-profil" style="background-image: url('<?php $image->getImage($background->background, "background"); ?>')">
			<h2><span class="redspan"><?= $user->firstname; ?></span> <span class="whitespan"><?= $user->lastname; ?></span></h2>
			<div class="profil-avatar" style="background-image: url('<?php $image->getImage($avatar->avatar, "avatar"); ?>')">
			</div>
		</div>
		<section class=" main-caption profil-section">
			<?php if($description->description!=null): ?>
			<h3>Qui suis-je</h3>
			<p>	<?= $description->description; ?></p>

		<?php else: ?>
			<h2>L'utilisateur n'a pas encore saisi de description</h2>
		<?php endif; ?>

			<?php if($projets): ?>
			<h3>PROJETS PROPOSES</h3>
			<?php foreach ($projets as $projet): ?>
				<a class="noline" href="projet.php?projet=<?= $projet->id; ?>">
				<div class="menu--projets">
				<p><?= $projet->title; ?></p>
			</div>
		</a>
			<?php endforeach; ?>
		<?php else: ?>
			<h2>L'utilisateur n'a pas encore proposé de projet</h2>
		<?php endif; ?>

		<?php if($hobbies): ?>
			<h3>INTERETS</h3>
			<div class="profil-hobbie">
			<?php foreach ($hobbies as $hobbie): ?>
				<?= $hobbie->libelle; ?>
			</div>

			<?php endforeach; ?>
		<?php else: ?>
			<h2>L'utilisateur n'a pas encore saisi ses centres d'interêt</h2>
		<?php endif; ?>

		</section>
		</div>
	</div>
	<footer class="footer">
	  <div class="footer-content">
	    <div class="footer-socials">
	      <ul>
	        <li class="foot-item"><a href="https://www.facebook.com/Fleet-change-your-world-177344952913438/?hc_ref=ARS6ZUejbmzCW9VHWZKC062UwGJEfvBM9DbdQtFk7oLbycEvxORS708jI82fldH3alo&fref=nf" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a></li>
	        <li class="foot-item"><a href="" target="_blank"><i class="fab fa-linkedin fa-2x"></i></a></li>
	        <li class="foot-item"><a href="https://twitter.com/fleetcyw" target="_blank"><i class="fab fa-twitter fa-2x"></i></a></li>
	      </ul>
	    </div>
	    <div class="footer-links">
	      <ul>
	        <li class="foot-item"><a href="apropos.php">A propos </a></li>
	        <li class="foot-item"><a href="faq.php">FAQ</a></li>
	        <li class="foot-item"><a href="mention.php">Mentions légales</a></li>
	      </ul>
	    </div>
	  </div>
	</footer>
</body>
</html>
