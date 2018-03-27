<?php
require 'inc/bootstrap.php';
App::getAuth()->restrict();
if($_SESSION['auth']->id_role == 1){
    header('Location: main.php');
}
$db = App::getDatabase();
$session = Session::getInstance();
if (isset($_POST) && !empty($_POST)){
  $db = App::getDatabase();
  $validator = new Validator($_POST);
  $validator->isEmpty('title', "Vous n'avez selectionné de titre");
  $validator->isEmpty('content', "Vous n'avez pas mit de contenu");
  $validator->isEmpty('description', "Vous n'avez selectionné de description");


  if($validator->isValid()){
      /**
       * Projet
       */
      $title = $_POST['title'];
      $description = $_POST['description'];
      $content = $_POST['content'];



      $db->query("INSERT INTO revu SET title = ?, description= ?, content = ?, created_at= NOW()",[
        $title,
        $description,
        $content
      ]);

      $id_projet = $db->lastInsertId();
      if($_FILES['fileToUpload']["error"]==0 || $_FILES['fileToUpload']["error"]==1 ){
        $image = new Image();
        $image = $image->uploadimg($_FILES['fileToUpload'], "revu");
        if($image){
          $db->query("UPDATE revu SET background = ? WHERE id= ?",[$image,$id_projet]);
        }

      }
    }else{
        $errors = $validator->getErrors();
    }
  }

require 'inc/header.php';
?>
<header class="header">
        <div class="nav">
            <div class="nav-items"><a href="main.php">Accueil</a></div>
            <div class="nav-items"><a href="allprojets.php">Projets</a></div>
            <div class="nav-items"><a href="allrevu.php">Revue du jour</a></div>
		<div class="nav-items"><a href="allparcours.php">Le parcours de</a></div>
			<div class="nav-items"><a href="profil.php">Profil</a></div>
			<div class="nav-items"><a href="logout.php">Déconnexion</a></div>
        </div>
</header>
<br>
  <?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
      <p>Vous n'avez pas rempli le formulaire correctement</p>
      <ul>
          <?php foreach($errors as $error): ?>
            <li><?=$error; ?></li>
          <?php endforeach; ?>
        </ul>
    </div>
  <?php endif; ?>
  <section>
    <div>

    <form method="post" enctype="multipart/form-data" class="content-articles">
	<div class="field-proj">
		<center>
        <label>Choisissez une photo présentant l'article:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
		</center>
	</div>
	<br>
        <table cellpadding="5">
            <tr>
                <td><h1>Votre article</h1></td>
                            </tr>
                            <tr>
                                <td><label for="titre">Titre de la revue<span class="redspan ">*<span></label></td>
                              <tr>
                                <td><input class="field-global" type="text" name="title"></td>
                              </tr>
                            </tr>
                            <tr>
                                <td><label for="description">Description<span class="redspan font-size">*<span></label></td>
                            </tr>
                            <tr>
                                <td><input class="field-global" type="text" name="description"></td>
                            </tr>
                            <tr>
                                <td><label for="content">Contenu de l'article<span class="redspan font-size">*<span></label></td>
                            </tr>
                            <tr>
                                <td><textarea class="field-global" name="content" rows="6" cols="80"></textarea></td>
                            </tr>                 
                                                            </table>
															<br>
															<div class="center-footer">
                                                                <button type="submit" class="form-button">Soumettre </button>
                                                            </div>
                                                            </form>

                                                            </section>
															
                                                            </div>
                                                          <br>
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
                                                            </body>
                                     </html>
