<?php

require 'inc/bootstrap.php';
$db = App::getDatabase();
$output ='';

if(isset($_POST["query"]))
{
	$search = $_POST["query"];
	$req = $db->query("
	SELECT * FROM projets
	WHERE title LIKE '%".$search."%'
	");
}
else
{
	$req = $db->query("
	SELECT * FROM projets ORDER BY title LIMIT 0");
}

	while($ligne = $req->fetch()){

		$output .= '<div class="table-responsive">
						<table class="table table bordered">
							<tr>
								<td> <a href="projet.php?projet='. $ligne->id .'"> '. $ligne->title .'</a></td>
							</tr>';
		echo $output;
	}
?>
