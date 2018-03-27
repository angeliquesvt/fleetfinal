<?php
    require_once 'inc/bootstrap.php';
    	App::getAuth()->restrict();
    $db = App::getDatabase();
    $revu = $db->query("SELECT * FROM revu WHERE id= ?", [$_GET['id']])->fetch();
    if(!$revu){
      header("Location: main.php");
    }
    
      // VERIFIE ID DU PROJET
    if(empty($_GET['id'])){
      header('Location:main.php');
      exit();
    }else if(isset($_GET['id'])){
    
    $image = new Image();
    //$image->getImage($projets->background, "projets");

    require 'inc/header.php';
}
?>
<header class="header" style="background-color: black;">
<div style="margin-right:42%;"><a href="main.php"><img src="img/fleet2.png" alt="logoFleet" style="width:90px;"/></a></div>
  <?php if(isset($_SESSION['auth'])): ?>
    <div class="nav">
			<div class="nav-items"><a href="allprojets.php">Projets</a></div>
			<div class="nav-items"><a href="allrevu.php">Revue du jour</a></div>
			<div class="nav-items"><a href="allparcours.php">Le parcours de</a></div>
			<div class="nav-items"><a href="profil.php">Profil</a></div>
			<div class="nav-items"><a href="logout.php">Déconnexion</a></div>
	</div>
  <?php endif; ?>
</header>
<br>
<br>
    <section class="projet-description">
      <div class="bandeau-profil" style="background-image: url('<?php $image->getImage($revu->background, 'revu'); ?>')">
        <center><h1 class="title-art"><?= $revu->title; ?></h1></center>
      </div>
	  <br>
        <div>
            <p><?= $revu->description; ?></p>
            <p><?= $revu->content; ?></p>
        </div>
		<br>
		<center><h1>Voir d'autres revue</h1></center>
		<div class="h--posts" >
		<?php $articles = $db->query('SELECT * FROM revu ORDER BY RAND() LIMIT 4'); ?>
		<?php while($a = $articles->fetch()) { ?>
			<div class="h--posts-item revu_lifestyle revu">
					<a class="h--post-link" href="revu.php?id=<?php echo $revu->id; ?>"></a>
					<div class="h--post-item-img">
							<img src="<?php $image->getImage($revu->background, "revu"); ?>" alt="project_image">
					</div>
					<div class="h--post-desc">
							<center><h2 class="titre"><?php echo $revu->title; ?></h2></center>
					</div>
			</div>
		<?php } ?>
	</div>
	<br>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

</script>
</body>
</html>
