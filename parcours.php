<?php
    require_once 'inc/bootstrap.php';
    	App::getAuth()->restrict();
    $db = App::getDatabase();
    $parcours = $db->query("SELECT * FROM parcours WHERE id= ?", [$_GET['id']])->fetch();
    if(!$parcours){
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
<header class="head">
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
    <section class="projet-description">
      <div class="bandeau-projet" style="background-image: url('<?php $image->getImage($parcours->background, 'parcours'); ?>')">
        <center><h1 class="title-art"><?= $parcours->title; ?></h1></center>
      </div>
	  <br>
        <div class="top">
            <p><?= $parcours->description; ?></p>
            <p><?= $parcours->content; ?></p>
        </div>
		<br>
		<center><h1>Voir d'autres parcours</h1></center>
		<div class="h--posts" >
      <?php $articles = $db->query('SELECT * FROM parcours LIMIT 4')->fetchAll(); ?>
      <?php shuffle($articles); ?>
      <?php foreach ($articles as $article): ?>
        <div class="h--posts-item revu_lifestyle revu">
  					<a class="h--post-link" href="revu.php?id=<?php echo $article->id; ?>"></a>
  					<div class="h--post-item-img">
  							<img src="<?php $image->getImage($article->background, "parcours"); ?>" alt="project_image">
  					</div>
  					<div class="h--post-desc">
  							<center><h2 class="titre"><?php echo $article->title; ?></h2></center>
  					</div>
  			</div>

      <?php endforeach; ?>

	</div>
	<br>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

</script>
</body>
</html>
