EN DEBUT DE PAGE toujours mettre pour que la session du profil avec laquel on est co soit ouverte.
<?php
	require 'inc/bootstrap.php';
	App::getAuth()->restrict();
	require 'inc/header.php';
?>

---recup le nom ou prenom en bd 
<?= $_SESSION['auth']->firstname; ?> (si nom lastname etc...)

---------------GRUNT------------

lancer cmd dans le dossier
grunt dev

---------------GITHUB------------
----R�cuperer projet----- toujours recup la derniere version avant de commencer � coder, sinn conflit

git pull origin master

//////////si conflit de version: supp le dossier et le git clone + nom sur guthub\\\\\\\\\\\\\\

----D�poser projet----

git add .
git commit -m "message"
git push origin master


---------------TUTO------------

grafikart