<?php
require 'inc/bootstrap.php';
App::getAuth()->restrict();
$db = App::getDatabase();


if(isset($_POST) && !empty($_POST)){
  if($_FILES['avatarToUpload']["error"]==0){
    $image = new Image();
    $image = $image->uploadimg($_FILES['avatarToUpload'], "avatar");
    if($image){
    $db->query("UPDATE users SET avatar = ? WHERE id= ?",[$image,$_SESSION['auth']->id]);
    }
  }
  if($_FILES['backgroundToUpload']["error"]==0){
    $imageb = new Image();
    $imageb = $imageb->uploadimg($_FILES['backgroundToUpload'], "background");
    if($image){
      $db->query("UPDATE users SET background = ? WHERE id= ?",[$imageb,$_SESSION['auth']->id]);
    }
  }
  if (isset($_POST['description'])) {
    $db->query('UPDATE users SET description = ? WHERE id= ?', [$_POST['description'], $_SESSION['auth']->id]);
  }
  if (isset($_POST['poste'])) {
    $db->query('UPDATE users SET poste = ? WHERE id= ?', [$_POST['poste'], $_SESSION['auth']->id]);
  }
  if (isset($_POST['hobbies'])) {
    $db->query("DELETE FROM hobbies WHERE id_user =?", [$_SESSION['auth']->id]);
    $hobbies = $_POST["hobbies"];
    foreach ($hobbies as $hobbie) {
        $db->query("INSERT INTO hobbies SET libelle = ?, id_user= ?", [$hobbie,$_SESSION['auth']->id]);
    }
  }

}

$description = $db->query("SELECT * FROM users where id=?", [$_SESSION['auth']->id])->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="fleet est un site de partage de projet dans le cadre d'un projet étudiant de seconde année MMI" />
  <title>Fleet</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="css/styleMax.css">
  <link rel="stylesheet" href="css/fonts/fontawesome-all.css">
  <link rel="icon" type="image/png" href="img/fleet2.png" />
</head>
<body>
  <div id="profil-background">
    <div class="global" id="global">
      <!-- NAVBAR -->
      <header class="header">
        <?php if (isset($_SESSION['auth'])): ?>
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

      <!-- ERREURS -->
      <?php if (Session::getInstance()->hasFlashes()): ?>
        <?php foreach (Session::getInstance()->getFlashes() as $type => $message): ?>
          <div class="alert alert-<?= $type; ?>">
            <?= $message; ?>
          </div>

        <?php endforeach; ?>
      <?php endif; ?>


      <!-- MAIN PAGE -->

      <div class="bandeau-profil">
        <h2><span class="redspan">EDITER</span><span class="whitespan">PROFIL</span></h2>
      </div>
      <div class="flex">
      <form action="" method="post" enctype="multipart/form-data">
        <center><button type="submit" class="form-button">Editer mon profil</button></center>
        <h1>Photo de profil</h1>
          <div class="">
            <div>
              <input class="inputfile" type="file" name="avatarToUpload" id="avatar" />
              <label for="avatar"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg><span>Selectionner une photo de profil</span></label>

            </div>
			<br>
            <div class="">
                <input class="inputfile" type="file" name="backgroundToUpload" id="background"/>
                <label for="background"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg><span>Selectionner une photo de couverture</span></label>
            </div>

          </div>
		<br>
        <h1>Description</h1>
        <label for="description">Décrivez-vous</label><br/><br/>
        <textarea class="field-global" name="description" rows="15" cols="180"><?= $description->description; ?></textarea>
		<br/><br/>
        <h1>Autre</h1>

        <table cellspacing="20">
          <tr>
            <td><label for="poste">Votre poste (ex: etudiant, entreprise...)</label></td>
            <td><input class="field-global" name="poste" value="<?= $description->poste; ?>"></td>
          </tr>
		  <br/><br/>
          <tr>
            <td><label for="hobbies">Vos centres d'interets</label></td>
            <td><input class="field-global" type="text" name="hobbies[]" rows="1" cols="50" ></td>
            <td><input class="field-global" type="text" name="hobbies[]" rows="1" cols="50"></td>
          </tr>
        </table>
		<br>
		<br>		
      </form>
    </div>
	<div class="flex">
	<form action="profil.php">
			<center><button type="submit" class="form-button">Retour</button></center>
	</form>
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
</div>
<script>
  var inputs = document.querySelectorAll( '.inputfile' );
  Array.prototype.forEach.call( inputs, function( input )
  {
  var label	 = input.nextElementSibling,
    labelVal = label.innerHTML;

  input.addEventListener( 'change', function( e )
  {
    var fileName = '';
      fileName = e.target.value.split( '\\' ).pop();

    if( fileName )
      label.querySelector( 'span' ).innerHTML = fileName;
    else
      label.innerHTML = labelVal;
  });
  });
</script>
</body>
</html>
