<?php
require 'inc/bootstrap.php';
App::getAuth()->restrict();
$db = App::getDatabase();
$session = Session::getInstance();
if (isset($_POST) && !empty($_POST)){
  $db = App::getDatabase();
  $validator = new Validator($_POST);
  $validator->isEmpty('title', "Vous n'avez selectionné de titre");
  $validator->isEmpty('baseline', "Vous n'avez selectionné de d'informations complémentaires");
  $validator->isEmpty('description', "Vous n'avez selectionné de description");
  $validator->isEmpty('support', "Vous n'avez selectionné de support");
  $validator->isEmpty('objectif', "Vous n'avez selectionné d'objectif");
  $validator->isEmpty('cible', "Vous n'avez selectionné de cible");


  if($validator->isValid()){
    /**
    * Projet
    */
    $title = $_POST['title'];
    $description = $_POST['description'];
    $baseline = $_POST['baseline'];
    $support = $_POST['support'];
    $objectif = $_POST['objectif'];
    $cible = $_POST['cible'];
    $needs = $_POST['need'];
    $questions = $_POST['question'];



    $db->query("INSERT INTO projets SET title = ?, description= ?, baseline = ?, support= ?, objectif = ?, cibles= ?, id_user= ?",[
      $title,
      $description,
      $baseline,
      $support,
      $objectif,
      $cible,
      $_SESSION["auth"]->id
    ]);

    $id_projet = $db->lastInsertId();
    var_dump($_FILES['fileToUpload']);
    if($_FILES['fileToUpload']["error"]==0 || $_FILES['fileToUpload']["error"]==1 ){
      $image = new Image();
      $image = $image->uploadimg($_FILES['fileToUpload'], "projets");
      if($image){
        $db->query("UPDATE projets SET background = ? WHERE id= ?",[$image,$id_projet]);
      }

    }

    if(isset($needs) && !empty($needs)){
      foreach ($needs as $need) {
        if($need!=""){
          $db->query("INSERT INTO needs SET id_projet = ?, libelle = ?", [$id_projet,$need]);
        }
      }
    }
    if(isset($questions) && !empty($questions)){
      foreach ($questions as $question) {
        if($question!=""){
          $db->query("INSERT INTO questions SET id_projet = ?, libelle = ?", [$id_projet,$question]);
        }
      }
    }
  }else{
    $errors = $validator->getErrors();
  }
}

require 'inc/header.php';
?>
<header class="header">
<div class="divimg"><a href="main.php"><img class="imggen" src="img/accueil/fleet2.png" alt="logoFleet"/></a></div>
  <div class="nav">
    <div class="nav-items"><a href="main.php">Accueil</a></div>
    <div class="nav-items"><a href="allprojets.php">Projets</a></div>
    <div class="nav-items"><a href="allrevu.php">Revues</a></div>
    <div class="nav-items"><a href="allparcours.php">Parcours</a></div>
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
          <input class="inputfile" type="file" name="fileToUpload" id="fileToUpload">
          <label for="fileToUpload"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg><span>Selectionner une photo qui représente votre projet</span></label>
        </center>
      </div>
      <br>
      <table cellpadding="5">
        <tr>



          <td><h1>Votre projet</h1></td>
        </tr>
        <tr>
          <td><label for="baseline">Titre du projet<span class="redspan ">*<span></label></td>
            <tr>
              <td><input class="field-global" type="text" name="title"></td>
            </tr>
          </tr>
          <tr>
            <td><label for="baseline">Description en une phrase<span class="redspan font-size">*<span></label></td>
            </tr>
            <tr>
              <td><input class="field-global" type="text" name="baseline"></td>
            </tr>
            <tr>
              <td><label for="description">Description détaillée du projet<span class="redspan font-size">*<span></label></td>
              </tr>
              <tr>
                <td><textarea class="field-global" name="description" rows="6" cols="80"></textarea></td>
              </tr>
              <tr>
                <td><h1>SUPPORT</h1></td>
              </tr>
              <tr>
                <td><label for="support">Le support en un mot<span class="redspan font-size">*<span></label></td>
                </tr>
                <tr>
                  <td><textarea class="field-global" name="support" rows="6" cols="80"></textarea></td>
                </tr>
                <tr>
                  <td><h1>OBJECTIFS</h1></td>
                </tr>
                <tr>
                  <td><label for="objectif">Les objectifs en trois mots<span class="redspan font-size">*<span></label></td>
                  </tr>
                  <tr>
                    <td><textarea  class="field-global" name="objectif" rows="6" cols="80" ></textarea></td>
                  </tr>
                  <td><h1>CIBLES</h1>
                  </td>
                </tr>
                <tr>
                  <td><label for="cible">Les cibles en une phrase<span class="redspan font-size">*<span></label></td>
                  </tr>
                  <tr>
                    <td><textarea class="field-global" name="cible" rows="6" cols="80"></textarea></td>
                  </tr>
                  <tr>
                    <td><h1>CE DONT J'AI BESOIN</h1></td>
                  </tr>
                  <tr>
                    <td><label for="need">Ressources humaines</label></td>
                  </tr>
                  <tr>
                    <td width=30%><input class="field-need" type="text" name="need[]"></td>
                    <td width=30%><input class="field-need" type="text" name="need[]"></td>
                    <td width=30%><input class="field-need" type="text" name="need[]"></td>
                  </tr>
                  <tr>
                    <td><label for="need">Entrez des sujets sur lesquels vous désirez recevoir des conseils et des améliorations</label></td>
                  </tr>
                  <tr>
                    <td width=30%><input class="field-need" type="text" name="question[]"></td>
                    <td width=30%><input class="field-need" type="text" name="question[]"></td>
                    <td width=30%><input class="field-need" type="text" name="question[]"></td>
                  </tr>
                </table>
                <br>
                <br>
                <div class="center-footer">
                  <button type="submit" class="form-button">Soumettre </button>
                </div>
              </form>
            </section>
          </div>
        </div>
        <br>
        <br>
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
