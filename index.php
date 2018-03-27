<?php
require_once 'inc/bootstrap.php';

  if(isset($_SESSION['auth'])){
    header('Location: main.php');
    exit();
  }
 // VERIFIE QUE LES CHAMPS SONT BIEN REMPLI
  if(!empty($_POST) && !empty($_POST['firstname'])){

    $errors=array();


    $db = App::getDatabase();
    $validator = new Validator($_POST);
    $validator->isAlpha('firstname', "Votre prénom n'est pas valide");
    $validator->isAlpha('lastname', "Votre nom n'est pas valide");
    $validator->isEmpty('birthdate', "Vous n'avez pas entrer votre date de naissance");
    $validator->isEmpty('sexe', "Vous n'avez selectionné de genre");
    $validator->isEmail('email',"Cet email est déjà utilisé pour un autre compte");
    if($validator->isValid()){
      $validator->isUniq('email',$db, 'users', 'Cet email est déjà utilisé pour un autre compte');
    }
    $validator->isConfirmed('email','Vous devez rentrer un email valide');
    $validator->isConfirmed('password','Vous devez rentrer un mot de passe valide');

    // REQUETE INSCRIPTION EN BASE DE DONNEE
    if($validator->isValid()){

      App::getAuth()->register($db, $_POST['firstname'], $_POST['lastname'], $_POST['birthdate'], $_POST['sexe'], $_POST['email'], $_POST['password']);
      Session::getInstance()->setFlash('success', "Votre compte à bien été créer, vous pouvez maintenant vous connecter.");
      App::redirect('index.php'); //Un email de confirmation vous a été envoyé pour valider votre compte

    }else{
      $errors = $validator->getErrors();
    }
  }

  // CONNEXION
  $auth = App::getAuth();
  $db = App::getDatabase();
  $auth->connectfromcookie($db);
  if($auth->user()){
    App::redirect("main.php");
  }
  if(!empty($_POST) && !empty($_POST['usermail']) && !empty($_POST['connexion_password'])){
  $auth = App::getAuth();
    $user = $auth->login($db, $_POST['usermail'], $_POST['connexion_password'], isset($_POST['remember']));
    $session = Session::getInstance();
    if($user){
      App::redirect('main.php');
      }
      else{
        $session->setFlash("danger", "Identifiant ou mot de passe incorrect");
      }
  }

  $projets = $db->query("SELECT * FROM projets ORDER BY `projets`.`created_at` DESC LIMIT 3")->fetchAll();
	$image = new Image();
 ?>

 <?php require_once 'inc/header.php' ?>

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

    <!-- SEARCHBAR -->

        <div class="main-caption">
            <div class="form-field">
                <div class="field-caption">
                    <h1><span class="redspan>"Fleet </span></h1>
                    <h2>Vos idées aux yeux du monde entier.</h2>
                </div>
                <div class="field">
                    <input type="text" class="field-input" placeholder="Explorer les projets">
                    <input type="submit" value="Chercher" class="field-search">
                </div>
            </div>
        </div>
    <!-- LATEST POSTS -->
    <div class="h--posts" >

  		<?php foreach ($projets as $projet): ?>
  			<div class="h--posts-item projet_lifestyle projet">
  					<a class="h--post-link" href="projet.php?projet=<?php echo $projet->id; ?>"></a>
  					<div class="h--post-item-img">
  							<img src="<?php $image->getImage($projet->background, "projets"); ?>" alt="project_image">
  					</div>
  					<div class="h--post-desc">
  							<h1 class="titre"><?php echo $projet->title; ?></h1>
  							<p><?php echo $projet->baseline; ?></p>
  							<span class="h--post-subdesc">
  									 Decouvrez et apportez vos idées.
  							</span>
  					</div>
  			</div>
  		<?php endforeach; ?>
  	</div>
    <!-- MODAL -->
    <!-- Modal INSCIPTION -->
    <div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="inscription" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Inscription</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
			<center>
              <table>
                <tr>
                  <td><label >NOM</label></td>
                  <td><input type="text" name="firstname"  class="field-CoIn"/></td>
                </tr>
                <tr>
                  <td><label >PRENOM</label></td>
                  <td><input type="text" name="lastname"  class="field-CoIn"/></td>
                </tr>
                <tr>
                  <td><label >DATE DE NAISSANCE</label></td>
                  <td><input type="date" name="birthdate" class="field-CoIn"/></td>
                </tr>
                <tr>
                  <td><label >SEXE</label></td>
                  <td>
				    <input type="radio" name="sexe" value="F" /> FEMME
                    <input type="radio" name="sexe" value="H" /> HOMME
                  </td>
                </tr>
                <tr>
                  <td><label >ADRESSE MAIL</label></td>
                  <td><input type="text" name="email"  class="field-CoIn"/></td>
                </tr>
                <tr>
                  <td><label >Confirmer adresse mail</label></td>
                  <td><input type="text" name="email_confirm"  class="field-CoIn"/></td>
                </tr>
                <tr>
                  <td><label >MOT DE PASSE</label></td>
                  <td><input type="password" name="password"  class="field-CoIn"/></td>
                </tr>
                <tr>
                  <td><label >Confirmer mot de passe</label></td>
                  <td><input type="password" name="password_confirm" class="field-CoIn"/></td>
                </tr>
              </table>
			  </center>
          <div class="modal-footer">
            <button type="submit" class="form-button" name="inscription">Je m'inscris</button>
          </div>
          </form>
        </div>

        </div>
      </div>
    </div>
    <!-- Modal CONNEXION -->
    <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Connexion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST">
          <div class="modal-body">
              <table>
                <tr>
                  <td><label>Email</label></td>
                  <td><input type="text" name="usermail" class="field-CoIn" /></td>
                </tr>
                <tr>
                  <td><label>Mot de passe <a href="remember.php"><br/>(Mot de passe oublié)</a></label></td>
                  <td><input type="password" name="connexion_password"  class="field-CoIn"/></td>
                </tr>
                <tr>
                  <td></td>
                  <td><label><input type="checkbox" name="remember" value="1"/>Se souvenir de moi</label></td>
                </tr>
              </table>
          </div>
          <div class="modal-footer">
            <button type="submit" class="form-button">Se connecter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
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
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>

</body>
</html>
