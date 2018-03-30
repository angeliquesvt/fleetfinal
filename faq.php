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
	<div class="bloc">
		<center><h1 class="titr">F.A.Q</h1></center>
		<center><h2>Questions sur l’utilisation du fleet</h2></center>
		<br>
		<div class="ali">
				<b><h2 class="mod">Qu’est ce que Fleet ? </h2></b>
				<p class="faq">
					Fleet est une plate-forme collaborative qui permet de mettre en relation des individus autour d’idées et/ou de projets. nous situons notre plate-forme comme étant un mélange de réseau social et de site de crowd-funding<br/>
				</p>
				<br>
				<b><h2 class="mod">Quel est l’utilité de Fleet ? </h2></b>
				<p class="faq">
					Fleet permet de donner la liberté à tous de s’exprimer, de proposer des idées à fin d’améliorer notre environnement et le monde qui nous entoure.<br/>
				</p>
				<br>
				<b><h2 class="mod">Comment trouver des idées à proposer ? </h2></b>
				<p class="faq">
					Inspirez vous de votre quotidien. Il y’a sûrement des choses futiles qui vous dérangent dans votre quotidien, proposez des idées pour économiser de l’eau dans les foyers, soutenir les causes des femmes, améliorer l'éducation à l’école...  
					Inspirez vous de votre histoire, le but est que chacun commence à changer ce qu’il trouve inacceptable autour de lui.<br/>
					<br>
					Autorisez vous à rêver, on a tous des passions, des rêves, des valeurs à défendre. Cherchez ce qui vous dérange aujourd’hui dans le monde, proposez une idée pour améliorer ce problème sans trop vous poser de questions et ajouter au fur et à mesure du temps du réalisme et du pragmatisme à votre projet.
					La communauté sera là pour vous soutenir.<br/>
				</p>
				<br>
				<b><h2 class="mod">Je n’ai pas d’idées à proposer que puis je faire ? </h2></b>
				<p class="faq">
					Aucun problème, si votre inspiration est actuellement en vacances vous pouvez investir votre temps en conseillant<br/>
					<br>
					Mon projet n’est pas solide, que puis je faire ?<br/>
					Vous êtes exactement au bon endroit, votre projet n’est pas solide et vous avez besoin de conseils, de soutiens et d’améliorations pour continuer à le faire grandir. Le but de la plateforme n’est pas d’arriver avec un projet abouti mais en cours de création justement. <br/>
				</p>
				<br>
				<b><h2 class="mod">Pourquoi quand j’essaye d'accéder à un projet je n’arrive pas ? </h2></b>
				<p class="faq">
					Pour entrer dans le monde de fleet vous devez d’abord vous connecter<br/>
				</p>
				<br>
				<b><h2 class="mod">J’ai une idée mais qui n’a pas vaient de rapport avec le site, puis-je quand même la poster ? </h2></b>
				<p class="faq">
					Bien Sûr Fleet est ouverte à n’importe quelle idée du moment qu'elle respecte nos conditions d’utilisation et qu'elles ne nuisent pas à autrui .<br/>
				</p>
				<br>
				<b><h2 class="mod">J’ai peur de me faire voler mon idée, existe-il des moyens pour empêcher cela ? </h2></b>
				<p class="faq">
					Malheureusement on ne peut empêcher le vol d’idée, nous considérant qu'une idée non communiquer peut n'être jamais réalisée et nous préférons prendre le risque de la voir volée que perdu.<br/>
				</p>
				<br>
				<b><h2 class="mod">Ques faites vous de mes données personnelles ? </h2></b>
				<p class="faq">
					Nous les enregistrons dans le seul but d’améliorer votre expérience utilisateur et surtout de pouvoir vous mettre en collaborations avec d’autre personnes.<br/>
					Vos données sont protégées par la CNIL<br/>
				</p>
				<br>
				<b><h2 class="mod">Comment puis-je intégrer l’équipe fleet ? </h2></b>
				<p class="faq">
					Envoyer nous un mail à cette adresse <i>Canditature@fleet.ovh</i>
				</p>
				<br>
				<p class="defff">
				Vous avez d'autres questions ? Envoyez-nous un message au mail suivant : Contact @fleet.Ovh 
				</p>
				<br>
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
				<li class="foot-item"><a href="https://www.facebook.com/Fleet-change-your-world-177344952913438/?hc_ref=ARS6ZUejbmzCW9VHWZKC062UwGJEfvBM9DbdQtFk7oLbycEvxORS708jI82fldh2alo&fref=nf" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a></li>
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