<?php
    require_once 'inc/bootstrap.php';
    	App::getAuth()->restrict();
    $db = App::getDatabase();
    $projets = $db->query("SELECT * FROM projets WHERE id= ?", [$_GET['projet']])->fetch();
    if(!$projets){
      header("Location: main.php");
    }

    // COMMENTAIRES
    $comments_cls = new Comments();
    $error = false;
    $success = false;
    if(isset($_POST['action']) && $_POST['action'] == 'comment'){
    $save = $comments_cls->save($db, 'projets', $_GET['projet']);
      if($save){
        $success = true;
      }else{
        $error = $comments_cls->errors;
      }
    }
    $comments = $comments_cls->findAll($db, $_GET['projet'], 'projets');

// LIKES
if(isset($_SESSION['auth'])){
  $vote = $db->query("SELECT vote FROM votes WHERE ref= ? AND ref_id=? AND user_id=?",['projets', $_GET['projet'], $_SESSION['auth']->id])->fetch();
}

$voteCount = new Vote();
$voteCount->updateCount($db, 'projets', $_GET['projet']);
      // VERIFIE ID DU PROJET
    if(empty($_GET['projet'])){
      header('Location:main.php');
      exit();
    }else if(isset($_GET['projet'])){

    $needs =  $db->query("SELECT libelle FROM needs WHERE id_projet= ?", [$projets->id])->fetchAll();
    $questions =  $db->query("SELECT libelle FROM questions WHERE id_projet= ?", [$projets->id])->fetchAll();
    $profiluser = $db->query("SELECT * FROM users INNER JOIN projets ON users.id = projets.id_user WHERE projets.id = ? ",[$_GET['projet']])->fetch();
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
<div class="glob" id="global">
    <section class="projet-description">
      <div class="bandeau-projet" style="background-image: url('<?php $image->getImage($projets->background, 'projets'); ?>')">
        <center><h1 class="title-art"><?= $projets->title; ?></h1></center>
      </div>
	  <br>
</div>

<div class="global" id="global">
	  <div style="margin-left:20px;">
      <div class="vote <?php Vote::getClass($vote)?>">
        <div class="vote-btn">
          <form action="like.php?ref=projets&ref_id=<?= $_GET['projet'] ?>&vote=1" method="post">
          <button type="submit" id="like" class="vote-btn vote-like"><i class="fa fa-star fa-2x"></i> Soutenir ce projet</button>
        </form>
        <?php $message="";
         if($projets->like_count==1){
              $message= $projets->like_count." personne soutient ce projet";
            } else if($projets->like_count>1){
                    $message =$projets->like_count. " personnes soutiennent ce projet";
                  }

        ?>
         <span> <?= $message ?></span>
        </div>
      </div>
      <div class="projet-profiluser">
        <div class="profiluser">
          <a class="profil-ref" href="profiluser.php?user=<?= $profiluser->id_user ;?>">
          <div class="mini-pic" style="background-image:url('<?= $image->getImage($profiluser->avatar, "avatar"); ?>')" alt=""></div>
          <p><strong>Un projet de </strong><span class="redspan"><?= $profiluser->firstname;?></span> <?= $profiluser->lastname;?></a></p><br/>

        </div>

      </div>
        <div>
		<br>
            <h1><b>Le projet</b></h1>
            <p><?= $projets->title; ?></p>
            <p><?= $projets->baseline; ?></p>
            <p><?= $projets->description; ?></p>
        </div>
        <div>
            <h1><b>Supports</b></h1>
            <p><?= $projets->support; ?></p>
        </div>

        <div>
            <h1><b>Objectifs</b></h1>
            <p><?= $projets->objectif; ?></p>
        </div>

        <div>
            <h1><b>Cibles</b></h1>
            <p><?= $projets->cibles; ?></p>
        </div>
		</div>
    </section>
	<div style="margin-left:20px;">
    <?php if($needs): ?>
    <section class="sec-p">
        <h1><b>Ce dont j'ai besoin</b></h1>
            <?php foreach($needs as $k=>$need): ?>
            <div class="capsule" data-toggle="modal" data-target="#need<?= $k ?>">
              <?= $need->libelle ?> <br />
            </div>
          <?php endforeach; ?>
        </section>
       <?php endif; ?>

    <?php if($questions): ?>
    <section class="sec-p">
        <h1><b>Remarques et améliorations</b></h1>
        <?php foreach($questions as $question): ?>
              <?= $question->libelle ?> <br />

          <?php endforeach; ?>
    </section>
    <?php endif; ?>
    <section style="margin-top:50px;">

      <?php if(count($comments)>1): ?>
      <h2><?= count($comments) ?> Commentaires</h2>
    <?php else: ?>
      <h2><?= count($comments) ?> Commentaire</h2>
      <?php endif; ?>
      <?php if ($error): ?>
        <div class="alert.alert-danger">
          <?php foreach ($error as $err): ?>
            <?= $err; ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <?php if ($success): ?>
        <div class="alert.alert-danger">
          <strong>Bravo</strong>Votre commentaire à bien été posté
        </div>
      <?php endif; ?>
      <form method="post" id="comment">
          <textarea placeholder="Poster un commentaire"class="field-global" name="content" rows="12" cols="50" required></textarea>
          <button style="float:right;" class="form-button" type="submit">Envoyer</button>
          <input type="hidden" name="parent_id" value="0" id="parent_id">
          <input type="hidden" name="action" value="comment">
      </form>

      <?php foreach ($comments as $comment): ?>
        <div class="field-global comment row">
          <div class="comments-useravatar">
          </div>
          <div>
            <p>
              <strong> <?= $comment->firstname; ?> <?= $comment->lastname; ?></strong>
              <em><?= date('d/m/Y', strtotime($comment->created_at)); ?></em>
              <a href="#" class="reply" data-id="<?= $comment->parent_id ? $comment->parent_id: $comment->id; ?>">Répondre</a>
            </p>
            <p><?= $comment->content; ?></p>
          </div>
        </div>
        <?php foreach ($comment->replies as $comment):?>
          <div class="replies">
          <div class="field-global comment row">
            <div class="comments-useravatar">
            </div>
            <div>
              <p>
                <strong> <?= $comment->firstname; ?> <?= $comment->lastname; ?></strong>
                <em><?= date('d/m/Y', strtotime($comment->created_at)); ?></em>
                <a href="#" class="reply" data-id="<?= $comment->parent_id ? $comment->parent_id: $comment->id; ?>">Répondre</a>
              </p>
              <p><?= $comment->content; ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </section>
</div>
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
<!-- Modal BESOIN -->
<?php if($needs): ?>
  <?php foreach($needs as $k=>$need): ?>
  <div class="modal fade" id="need<?= $k ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Me proposer en tant que: <?= $need->libelle ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="besoin" method="post">
              <input name="prenom" id="first_name" type="hidden" value="<?= $_SESSION['auth']->firstname ?>">
              <input name="nom" id="last_name" type="hidden" value="<?= $_SESSION['auth']->lastname ?>">
              <input name="email" id="email" type="hidden" value="<?= $_SESSION['auth']->email ?>">
              <input name="poste" id="poste" type="hidden" value="<?= $need->libelle ?>">
              <input name="usermail" id="usermail" type="hidden" value="<?= $profiluser->email ?>">
              <textarea class="field-global" rows="5" placeholder="Message" name="message" id="textarea1"></textarea>
              <button class="form-button propos" type="submit"> Me proposer</button>
        </form>
    </div>
  </div>

</div>
<?php endforeach; ?>
<?php endif; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
<script src="js/sender.js"></script>
<script>
  (function($){
    $('.reply').click(function(e){
      e.preventDefault();
      var $this = $(this);
      var $comment = $(this).parents('.comment');
      var $form = $('#comment');
      var id = $this.data('id');
      $form.hide();
      $comment.after($form);
      $form.show();
      $('#parent_id').val(id);
    })
  })(jQuery);
</script>
</body>
</html>
