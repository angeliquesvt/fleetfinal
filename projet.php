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
<header class="header">
  <?php if(isset($_SESSION['auth'])): ?>
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
    <section class="projet-description">
      <div class="bandeau-profil" style="background-image: url('<?php $image->getImage($projets->background, 'projets'); ?>')">
        <center><h1 class="title-art"><?= $projets->title; ?></h1></center>
      </div>
	  <br>
	  <div style="margin-left:20px;">
      <div class="projet-profiluser">
        <div class="profiluser">
          <img width="100" src="<?= $image->getImage($profiluser->avatar, "avatar"); ?>" alt="">
          <p><strong>Un projet de </strong><a href="profiluser.php?user=<?= $profiluser->id_user ;?>"><span class="redspan"><?= $profiluser->firstname;?></span> <?= $profiluser->lastname;?></a></p>
        </div>
        <div class="vote <?php Vote::getClass($vote)?>">
          <div class="vote-btn">
            <form action="like.php?ref=projets&ref_id=74&vote=1" method="post">
            <button type="submit" id="like" class="vote-btn vote-like"><i class="fa fa-thumbs-up fa-2x"></i><?= $projets->like_count ?></button>
            </form>
          </div>
        </div>
      </div>
        <div>
		<br>
            <h1>Le projet</h1>
            <p><?= $projets->title; ?></p>
            <p><?= $projets->baseline; ?></p>
            <p><?= $projets->description; ?></p>
        </div>
        <div>
            <h1>Support</h1>
            <p><?= $projets->support; ?></p>
        </div>

        <div>
            <h1>Objectif</h1>
            <p><?= $projets->objectif; ?></p>
        </div>

        <div>
            <h1>Cibles</h1>
            <p><?= $projets->cibles; ?></p>
        </div>
		</div>
    </section>
	<div style="margin-left:20px;">
    <?php if($needs): ?>
    <section>
        <h1>Ce dont j'ai besoin</h1>
            <?php foreach($needs as $need): ?>
            <?= $need->libelle ?> <br />
          <?php endforeach; ?>
        </section>
       <?php endif; ?>

    <?php if($questions): ?>
    <section>
        <h1>Remarques et améliorations</h1>
        <?php foreach($questions as $question): ?>
              <?= $question->libelle ?> <br />
          <?php endforeach; ?>
    </section>
    <?php endif; ?>
    <section>

      <h2><?= count($comments) ?> Commentaires</h2>
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
          <label for="commentaire">Postez votre commentaire</label> <br/>
          <textarea name="content" rows="8" cols="80" required></textarea>
          <button class="" type="submit">Envoyer</button>
          <input type="hidden" name="parent_id" value="0" id="parent_id">
          <input type="hidden" name="action" value="comment">
      </form>

      <?php foreach ($comments as $comment): ?>
        <div class="comments-row">
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
          <div class="comments-row">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<script>

</script>
</body>
</html>
