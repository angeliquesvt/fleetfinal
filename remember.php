<?php
require "inc/bootstrap.php";
  if(!empty($_POST) && !empty($_POST['email'])){
    $db = App::getDatabase();
    $auth= App::getAuth();
    $session = Session::getInstance();
    if($auth->resetPassword($db, $_POST['email'])){
      $session->setFlash('success', "Les instructions du rappel de mot de passe vous ont été envoyées par email");
      App::redirect('index.php');

  }else{
    $session->setFlash('danger', "Aucun compte ne correspond à cet adresse");
  }
}
	require 'inc/header.php';
?>
<h1>Mot de passe oublié</h1>
<form method="post">
<label for="">Email</label>
<input type="email" name="email">
<input type="submit" value="Envoyer">
</form>

</div>
</body>
</html>
