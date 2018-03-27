<?php
// SE SOUVENIR DU MOT DE PASSE
require 'inc/bootstrap.php';
if(isset($_GET['id']) && isset($_GET['token'])){
  $auth = App::getAuth();
  $db = App::getDatabase();
  $user = $auth->checkResetToken($db, $_GET['id'], $_GET['token']);
  if($user){
    if(!empty($_POST)){
      $validator = new Validator($_POST);
      $validator->isConfirmed('password');
      if($validator->isValid()){
        $password = $auth->hashPassword($_POST['password']);
        $db->query('UPDATE users SET password = ?, reset_at = NULL, reset_token = NULL WHERE id = ?', [$password, $_GET['id']]);
        $auth->connect($user); //user recup de la fonction checkresettolen
        Session::getInstance()->setFlash('success', "Votre mot de passe à bien été modifié");

        App::redirect("main.php");
      }
    }
  }else{
    Session::getInstance()->setFlash('danger', "Ce token n'est pas valide");
    App::redirect("index.php");
  }
}else{
  App::redirect("index.php");
}

?>
<form method="POST">
  <table cellpadding="5">
    <tr>
      <td><label for="">Nouveau mot de passe</label></td>
      <td><input type="password" name="password"  /></td>
    </tr>
    <tr>
      <td><label for="">Confirmation du mot de passe</label></td>
      <td><input type="password" name="password_confirm"/></td>
    </tr>
  </table>
</div>
<div class="modal-footer">
<button type="submit" class="form-button">Réinitialiser mon mot de passe</button>
</form>

</div>
</body>
</html>
