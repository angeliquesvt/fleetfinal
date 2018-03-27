<?php
	require 'inc/bootstrap.php';
	App::getAuth()->restrict();
	$db = App::getDatabase();
	$projetusers = $db->query("SELECT * FROM projets WHERE id_user =? ORDER BY `projets`.`created_at` DESC LIMIT 10", [$_SESSION['auth']->id])->fetchAll();
	$projets = $db->query("SELECT * FROM projets ORDER BY `projets`.`like_count` DESC LIMIT 5")->fetchAll();
	$parcours = $db->query("SELECT * FROM parcours ORDER BY `parcours`.`created_at` DESC LIMIT 1")->fetch();
	$revu = $db->query("SELECT * FROM revu ORDER BY `revu`.`created_at` DESC LIMIT 1")->fetch();

	$image = new Image();
	require 'inc/header.php';
	
	function raccourcirChaine($chaine, $tailleMax)
	{
    // Variable locale
    $positionDernierEspace = 0;
    if( strlen($chaine) >= $tailleMax )
    {
      $chaine = substr($chaine,0,$tailleMax);
      $positionDernierEspace = strrpos($chaine,' ');
      $chaine = substr($chaine,0,$positionDernierEspace).'...';
    }
    return $chaine;
  }
	?>
	<header class="header">
		<?php if(isset($_SESSION['auth'])): ?>
			<div class="nav">
			<div class="nav-items"><a href="main.php">Accueil</a></div>
			<div class="nav-items"><a href="allprojets.php">Projets</a></div>
			<div class="nav-items"><a href="allrevu.php">Revue du jour</a></div>
			<div class="nav-items"><a href="allparcours.php">Le parcours de</a></div>
			<div class="nav-items"><a href="profil.php">Profil</a></div>
			<div class="nav-items"><a href="logout.php">Déconnexion</a></div>
			</div>
		<?php endif; ?>
	</header>
	<div class="menu-toggler" id="menu-toggler"></div>
	<!-- SIDEBAR -->
	<div class="menu" id="menu">
			<div class="menu-header">
					<div class="profile-pic">
						<img src="<?php $image->getImage($_SESSION['auth']->avatar, "avatar"); ?>" alt="">
					</div>
					<div class="profile-name">
							<p><?= $_SESSION['auth']->firstname; ?><span class="redspan"><?php echo $_SESSION['auth']->lastname; ?></span></p>
					</div>
			</div>

			<div class="menu-items">

					<div class="menu-item">
							<i class="menu-item-logo-profile"></i> <a href="profil.php">Voir mon profil</a>
					</div>
					<!-- <div class="menu-item">
							<i class="menu-item-logo-help"></i> <a href="#">Voir mon profil</a>
					</div> -->
			</div>

			<div class="menu-btns">
				<?php if($projetusers): ?>
				<p style="margin-left: 30px;">Mes projets</p>
				<?php foreach ($projetusers as $projetuser): ?>
					<div id="web" class="menu-btn"><a  href="projet.php?projet=<?= $projetuser->id; ?>"><?= $projetuser->title; ?></a></div>
				<?php endforeach; ?>
			<?php else: ?>
				<h4> Vous n'avez pas encore poster de projet</h4>
			<?php endif; ?>
			</div>
	</div>
	<!-- SEARCHBAR -->

	<div class="main-caption">
			<div class="form-field">
					<div class="field-caption">
							<h1><span class="redspan">Fleet</</h1>
							<h2>Vos idées aux yeux du monde entier.</h2>
					</div>
					<div class="field">
						<form>
							<input id="search" type="text" class="field-input" placeholder="Rechercher un projet" name="input" autocomplete="off">
							<input type="hidden" value="Chercher" class="field-search">
						</form>
						<div id="result"></div>
				</div>
			</div>
	</div>
	<div class="menu-btns">
			<div class="menu--proposition"><a href="postprojet.php">Poster mon projet</a></div>
	</div>
	<div class="title">
		<p>Today's best<span class="redspan"> ideas</span> </p>
	</div>
	<!-- LATEST POSTS -->
	<div class="h--posts-best" >

		<?php foreach ($projets as $projet): ?>
			<div class="h--posts-item-best projet_lifestyle projet">
					<a class="h--post-link-best" href="projet.php?projet=<?php echo $projet->id; ?>"></a>
					<div class="h--post-item-img-best">
							<img src="<?php $image->getImage($projet->background, "projets"); ?>" alt="project_image">
					</div>
					<div class="h--post-desc-best">
							<h1 class="titre"><?php echo $projet->title; ?></h1>
							<p><?php echo $projet->baseline; ?></p>
							<span class="h--post-subdesc-best">
									 Decouvrez et apportez vos idées.
							</span>
					</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="title">
		<p>La <span class="redspan">revue</span> du jour</p>
	</div>
	<div class="post-revu"> 
		<div class="post-revu-img">
		<img src="<?php $image->getImage($revu->background, "revu"); ?>" alt="">
		</div>
		<div class="post-revu-text">
		<p><?= $revu->description ?></p>
		<p style="text-overflow: ellipsis;"><?= raccourcirChaine($revu->content, 200); ?></p>
			<div class="suite">
				<a href="revu.php?id=<?= $revu->id; ?>">Lire la suite...</a>
			</div>
		</div>
	</div>
	<div class="title">
		<p><span class="redspan">Le parcours</span> de...</p>
	</div>
	<div class="post-revu"> 
		<div class="post-revu-img">
			<img src="<?php $image->getImage($parcours->background, "parcours"); ?>" alt="">
		</div>
		<div class="post-revu-text">
			<p><?= $parcours->description ?></p>
			<p style="text-overflow: ellipsis;"><?= raccourcirChaine($parcours->content, 200); ?></p>
			<div class="suite">
				<a href="parcours.php?id=<?= $parcours->id; ?>">Lire la suite...</a>
			</div>
		</div>
	</div>
</div>
<footer class="footer">
	<div class="reseaux" style="position:relative; left:auto;">
		<table cellpadding=10> 
		<tr>
			<td><li class="foot-item"><a href="https://www.facebook.com/Fleet-change-your-world-177344952913438/?hc_ref=ARS6ZUejbmzCW9VHWZKC062UwGJEfvBM9DbdQtFk7oLbycEvxORS708jI82fldH3alo&fref=nf" target="_blank"><i class="fab fa-facebook-square fa-2x"></i></a></li></td>
			<td>|</td>
			<td><li class="foot-item"><a href="" target="_blank"><i class="fab fa-linkedin fa-2x"></i></a></li></td>
			<td>|</td>
			<td><li class="foot-item"><a href="https://twitter.com/fleetcyw" target="_blank"><i class="fab fa-twitter fa-2x"></i></a></li></td>
		</tr>
		</table>
	</div>
	<div style="float:right;">
		<table cellpadding=10>
		<tr>
			<td><li class="foot-item"><a href="apropos.php">A propos </a></li></td>
			<td>|</td>
			<td><li class="foot-item"><a href="faq.php">FAQ</a></li></td>
			<td>|</td>
			<td><li class="foot-item"><a href="mention.php">Mentions légales</a></li></td>
		</tr>
		</table>
	</div>
</footer>
	<!-- SCRIPTS -->
	<script src="js/app.js"></script>
	<script>
$(document).ready(function(){
load_data();
function load_data(query)
{
	$.ajax({

		url:"fetch.php",
		method:"post",
		data:{query:query},
		success:function(data)
		{

			$('#result').html(data);
		}
	});
}

$('#search').keyup(function(){
	var search = $(this).val();
	if(search != '')
	{
		load_data(search);
	}
	else
	{
		load_data();
	}
});
});
</script>
</body>
</html>
