<?php 
	if ($fichiercsv = fopen('tb.csv', 'r'))
	{
		$modification = '';
		$mofif = $_GET['nom'].";".$_GET['prenom'].";".$_GET['email'].";".md5($_GET['email'].$_GET['password']).";".$_GET['filiere'].";".$_GET['groupe']."\n";

		while (($ligne = fgets($fichiercsv)) !== FALSE)
	}

?>