<?php
	require 'inc/bootstrap.php';
	App::getAuth()->restrict();
	$db = App::getDatabase();
	require 'inc/header.php';
?>
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
<div class="global" id="global">
	<div class="blocAP">
		<center><h1 class="titr">A propos</h1></center>
		<div class="ali">
			<p class="def">
			Nous avons cherché pour trouver un moyen pour unifier le potentiel de chacun et le mettre au service de tous.
			Ici d”un groupe d’étudiant ce réunissant sous la banniéere de l’agence Ancre, nous avons décidé de mettre en place un site internet de partage pour aider les jeunes artistes, 
			les étudiants, et les entrepreneurs à développer leurs projets.
			Fleet est une plateforme collaborative, entièrement gratuite qu’on pourrait définir par le terme de «communauté».
			Ce site est destiné à toute personne ayant un projet intéressant qu’il souhaite concrétiser. 
			Notre site vous permettra de vous  créer un réseau professionnel efficace pour obtenir des conseils, et des contacts afin d’aboutir au terme d’un projet.
			</p>
			<p class="deff">
			L’équipe fleet vous souhaite une bonne navigation sur le site <span style="color:#FF5260">FLEET</span>
			</p>
		</div>
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