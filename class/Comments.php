<?php
  class Comments{

    private $options = array(
      'content_error' => "Vous n'avez pas mis de message",
      'parent_error' => "Vous essayez de répondre à un commentaire qui n'existe pas"
    );
    public $errors = array();
    public function __construct($options = []){
      $this->options = array_merge($this->options, $options);
    }

    // PERMET DE RECUP LES COMMENTAIRES ASSOCIE AU CONTENU
    public function findAll($db, $id_projet, $ref){
      $req = $db->query("SELECT * FROM comments WHERE id_projet= ? AND ref=? ORDER BY created_at DESC",
      [
        $id_projet,
        $ref
      ]);

      $comments = $req->fetchAll();
      $replies = [];
      foreach ($comments as $k => $comment) {
        if($comment->parent_id){
          $replies[$comment->parent_id][] = $comment;
          unset($comments[$k]);
        }
      }
      foreach ($comments as $k => $comment) {
        if(isset($replies[$comment->id])){
          $r = $replies[$comment->id];
          usort($r, [$this, 'sortReplies']);
          $comments[$k]->replies = $r;
        }else{
          $comments[$k]->replies = [];
        }
      }
      return $comments;
    }

    public function sortReplies($a, $b){
      $atime = strtotime($a->created_at);
      $btime = strtotime($b->created_at);
      return $btime > $atime ? -1 : 1;

    }


    // SAUVEGARDE LES COMMENTAIRES
    public function save($db, $ref, $id_projet){
      $errors = [];
      if (empty($_POST['content'])) {
        $errors['content'] = $this->options['content_error'];

      }
      if(count($errors)>0){
        $this->errors = $errors;
        return false;
      }
      if(!empty($_POST['parent_id'])){
        $req = $db->query("SELECT id FROM comments WHERE ref= ? AND id_projet= ? AND id= ? AND parent_id=0", [
          $ref,
          $id_projet,
          $_POST['parent_id']
        ]);
        if($req ->rowCount() <= 0){
          $this->errors['parent'] = $this->options['parent_error'];
          return false;
        }
      }
     $req =  $db->query("INSERT INTO comments SET id_user= ?, firstname=?, lastname=?, id_projet =?, content = ?, created_at= NOW(), ref= ?, parent_id= ?", [
        $_SESSION['auth']->id,
        $_SESSION['auth']->firstname,
        $_SESSION['auth']->lastname,
        $id_projet,
        $_POST['content'],
        $ref,
        $_POST['parent_id']
      ]);
      return $req;
    }
  }



 ?>
