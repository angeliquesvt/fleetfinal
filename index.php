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
 <div class="glob" id="global">

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

        <div class="top">
            <div class="form-field">
                <div class="field-caption">
                    <h1 class="titre-acc"><span class="redspan">Fleet </span></h1>
                    <h2 class="soustitre-acc">Vos idées aux yeux du monde entier.</h2>
                </div>
                <div class="btns-acc">
					<div class="inscription"><a data-toggle="modal" data-target="#inscription">S'inscrire</a></div>
				</div>
				<div class="btns-acc">
					<div class="connexion"><a data-toggle="modal" data-target="#connexion">Se Connecter</a></div>
				</div>
            </div>
		</div>
		<div class="presentation">
            <section class="questce">
				<div class="top">
					<div class="form-field">
						<div class="field-caption">
							<h1 class="titre-acc"><span class="redspan">Qu'est-ce que c'est ?</span></h1>
							<br>
							<br>
							<p class="text-presentation">
								Bienvenue sur le site Internet de Fleet, là où le partage d’idées et l’entraide autour de<br/>
								celles-ci n’ont plus de frontière.<br/>
								<br>
								Notre but est de vous mettre en relation afin de réaliser vos projets, quel qu’il soit.<br/>
								Programmeur, designer, photographe, cuisinier, maçon, etc…<br/>
								<br>
								Peu importe votre domaine d’activité, vous avez votre place ici, et votre aide permettra de<br/>
								réaliser de grandes choses. Ici, vous pourrez proposer vos idées, votre projet, qu’importe le<br/>
								domaine, l’aide voulue ou la taille de celui-ci et partager avec les autres membres.<br/>
								<br>
								La communauté Fleet sera là pour vous aider. Vous pourrez évaluer “(jauger)” votre projet<br/>
								grâce aux conseils, commentaires et réactions de la communauté. Nous assurerons<br/>
								aussi une protection quant au vol d’idées.
								<br>
								Pas question que le plagiat prenne place au sein de notre site!<br/>
								<br>
								L’inscription est faite pour s’entraider si on veut aider un projet, et / ou recevoir de l’aide si on en a un, voilà le but!<br/>
								<br>
								Des formations seront aussi disponibles pour aller encore plus loin dans la construction de votre projet.<br/>
								<br>
								Aide marketing, entrepreneuriat, vous serez accompagné par nos partenaires à travers toutes ces<br/>
								notions importantes.<br/>
							</p>
						</div>
					</div>
				</div>
            </section>
			<section class="CreaEntraide">
				<div class="top">
					<div class="form-field">
						<div class="field-caption">
						<div class="marge">
							<h1 class="titre-acc"><span class="redspan">Entraide et Créativité</span></h1>
							<br>
							<br>
							<p>
							Nous pensons sincèrement que tout le monde a quelque chose à apporter à ce monde mais<br/>
							tout le monde n’en a pas conscience.<br/>
							<br>
							C’est pourquoi ici nous allons vous accompagner pour vous aider à penser le monde de<br/>
							demain, avec des rubriques, des inspirations et des conseils créatifs.<br/>
							<br>
							Vous ne savez pas ce que vous pouvez apporter au monde ?<br/>
							Prenez la question autrement, qu’est ce qui vous dérange aujourd’hui autour de vous ou à travers la planète ?<br/>
							Quelle idée aussi farfelue soit elle pouvez vous proposer ici pour améliorer les choses ?<br/>
							Ici tout est possible, si votre idée ne plait pas aux gens, tant pis vous en aurez d’autres et cela restera<br/>
							juste du texte autrement vous risquez, au pire des cas, de concrétiser cette idée et peut être<br/>
							d’améliorer la vie de centaine, voire de milliers de gens.<br/>
							<br>
							Tentez, soyez créatifs, trompez vous. Nous serons là pour vous soutenir.<br/>
							<br>
							L’Équipe Fleet.
							</p>
						</div>
						</div>
					</div>
				</div>
			</section>
        </div>

    <!-- MODAL -->
    <!-- Modal INSCIPTION -->
    <div class="modal fade" id="inscription" tabindex="-1" role="dialog" aria-labelledby="inscription" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
		  <div class="modal-header">
            <h5 class="modal-title">Inscritpion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
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
				            <input type="radio" name="sexe" value="F" checked/> FEMME
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
                  <td><label>Mot de passe
                    <!-- <a href="remember.php"><br/>(Mot de passe oublié)</a> -->
                  </label></td>
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
  <footer class="footeracc">
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
    <!-- SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>

</body>
</html>
