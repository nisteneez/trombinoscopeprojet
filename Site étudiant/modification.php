<?php 
	if ($fichiercsv = fopen('tb.csv', 'r'))
	{
		$newcontenu = '';
		$nouvelle_ligne = $_GET['nom'].";".$_GET['prenom'].";".$_GET['email'].";".md5($_GET['email'].$_GET['password']).";".$_GET['filiere'].";".$_GET['groupe']."\n";

		while (($ligne = fgets($fichiercsv)) !== FALSE)
		{
			$DonLine=explode(";", $ligne);
			if ($_GET['email'] == $DonLine[2])
			{
				$newcontenu = $newcontenu . $nouvelle_ligne;
			}
			else 
			{
				$newcontenu = $newcontenu . $ligne;
			}
		}
		fclose($fichiercsv);
		$Fecriture = fopen('tb.csv', 'w');
		fputs($Fecriture, $newcontenu);
		fclose($Fecriture);
		exit(header("Location: ./information.php"));
	}

?>