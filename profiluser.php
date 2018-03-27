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
	$projets = $db->query('SELECT title FROM projets WHERE id_user= ?', [$_GET['user']])->fetchAll();
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
				<div class="nav">
						<div class="nav-items"><a href="main.php">Accueil</a></div>
						<div class="nav-items"><a href="allprojets.php">Projets</a></div>
						      <div class="nav-items"><a href="allrevu.php">Revus et parcours</a></div>
						<div class="nav-items"><a href="profil.php">Profil</a></div>
						<div class="nav-items"><a href="logout.php">Déconnexion</a></div>
				</div>
			<?php endif; ?>
		</header>

		<div class="bandeau-profil" style="background-image: url('<?php $image->getImage($background->background, "background"); ?>')">
			<h2><span class="redspan"><?= $user->firstname; ?></span> <span class="whitespan"><?= $user->lastname; ?></span></h2>
			<center>
				<div class="profile-pic">
					<img width="300px" src="<?php $image->getImage($avatar->avatar, "avatar"); ?>" alt="">
			</div>
		</center>
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
				<?= $projet->title; ?>
			<?php endforeach; ?>
		<?php else: ?>
			<h2>L'utilisateur n'a pas encore proposé de projet</h2>
		<?php endif; ?>

		<?php if($hobbies): ?>
			<h3>INTERETS</h3>
			<?php foreach ($hobbies as $hobbie): ?>
				<?= $hobbie->libelle; ?>
			<?php endforeach; ?>
		<?php else: ?>
			<h2>L'utilisateur n'a pas encore saisi ses centres d'interêt</h2>
		<?php endif; ?>

			<h3>INTERVENU SUR LES PROJETS SUIVANTS</h3>


		</section>
		</div>
			<footer class="footer-profil">
			</footer>

	</div>

	<footer class="footer">
	<div class="reseaux">
		<p>Réseaux Sociaux</p>
		<ul>
			<li class="foot-item"><a href=""><i class="fab fa-facebook-square fa-2x"></i></a></li>
			<li class="foot-item"><a href=""><i class="fab fa-linkedin fa-2x"></i></a></li>
		</ul>
	</div>

	<div>
	<p>Liens</p>
		<ul>
			<li class="foot-item"><a href="apropos.php">A propos </a></li>
			<li class="foot-item"><a href="faq.php">FAQ</a></li>
			<li class="foot-item"><a href="mention.php">Mentions légales</a></li>
		</ul>
	</div>
</footer>
</body>
</html>
