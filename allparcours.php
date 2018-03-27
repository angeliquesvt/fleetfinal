<?php
	require 'inc/bootstrap.php';
	App::getAuth()->restrict();
	$db = App::getDatabase();
	$profilusers = $db->query("SELECT * FROM projets WHERE id_user =? ORDER BY `projets`.`created_at` DESC", [$_SESSION['auth']->id])->fetchAll();
	$revus = $db->query("SELECT * FROM revu ORDER BY `revu`.`created_at` DESC")->fetchAll();
	$parcours = $db->query("SELECT * FROM parcours ORDER BY `parcours`.`created_at` DESC")->fetchAll();
	$image = new Image();
	require 'inc/header.php';
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
							<h2><?= $_SESSION['auth']->firstname; ?><span class="redspan"><?php echo $_SESSION['auth']->lastname; ?></span></h2>
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
				<?php if($profilusers): ?>
				<h4 style="margin-left: 30px;">Mes revus</h4>
				<?php foreach ($profilusers as $profiluser): ?>
					<div id="web" class="menu-btn"><a  href="revu.php?revu=<?= $profiluser->id; ?>"><?= $profiluser->title; ?></a></div>
				<?php endforeach; ?>
			<?php else: ?>
				<h4> Vous n'avez pas encore poster de revu</h4>
			<?php endif; ?>
			</div>
	</div>
	<br>
	<!-- LATEST POSTS -->
		<center>
			<h1 class="title-articles">Le <span style="color:red">parcours</span> de </h1><hr width="50%"/>
		</center>
		
		<?php if($_SESSION['auth']->id_role == '2'){ ?>
		<div class="link-redac">
			<center><a href="postparcours.php">Rédiger un article</a></center>
		</div>
		<?php } ?>
		
	<div class="h--posts" >

		<?php foreach ($parcours as $parcour): ?>
			<div class="h--posts-item revu_lifestyle revu">
					<a class="h--post-link" href="parcours.php?id=<?php echo $parcour->id; ?>"></a>
					<div class="h--post-item-img">
							<img src="<?php $image->getImage($parcour->background, "parcours"); ?>" alt="project_image">
					</div>
					<div class="h--post-desc">
							<center><h2 class="titre"><?php echo $parcour->title; ?></h2></center>
					</div>
			</div>
		<?php endforeach; ?>
	</div>
	</div>
	</div>
    <br><br><br><br><br>
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