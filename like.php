<?php
    require 'inc/bootstrap.php';
    App::getAuth()->restrict();
    $db = App::getDatabase();

    if($_SERVER['REQUEST_METHOD']!='POST'){
        http_response_code(403);
        die();
    }


    $vote = new Vote();
    if($_GET['vote']==1){
        $vote->like($db, 'projets', $_GET['ref_id'], $_SESSION['auth']->id);
    }

    header('Location:projet.php?projet='.$_GET['ref_id']);

?>