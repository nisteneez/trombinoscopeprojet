<?php

	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$email = $_POST["email"];
	$login = $_POST["login"];
	$password = $_POST["password"];
	

	$doesUserExist = FALSE;
	$fichier = "utilisateurs.csv";
	$lines = file($fichier);

	for($i=0;$i<sizeof($lines);$i++){	
		$line = $lines[$i];
		echo $line.'\n';
		$tab= explode(",",$line);

		if ($tab[2] == $email && $tab[3] == $login){
			
			$doesUserExist = TRUE;
			break; //Sortir de la boucle
		}
	}

	if( $doesUserExist == TRUE )
	{
		header('inscription.php?erreur=erreurInscription');  
		exit();  
	}

	else {
		$fichier= fopen($fichier,"a") or die("Le fichier ne s'ouvre pas!");
		fwrite($fichier, "\n");
		fwrite($fichier, $nom .",".$prenom .",".$email .",". $login."," .$password);
		
		fclose($fichier);
		header('index.html?login='.$login);  
		exit();
	}

?>