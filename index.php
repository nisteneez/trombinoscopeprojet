<!DOCTYPE html>
<head>
	<title>Inscription</title>
	<link rel="shortcut icon" href="ucp2.jpg" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="tb.css" >
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

</head> 
<body> 
	<h1>Compte étudiant : Inscription</h1>

	<img src="ucp.png">

	<br><br>

	<div id="bloc_page">
		<br>
		<nav>
			<ul>
				<li><a href="connexion.php">Connexion</a></li>
				<li><a href="index.php">Inscription</a></li>
			</ul>
		</nav>
		<br>
		<hr>

	<div align="center">
		<br> 
			
	<form  method="get" action="index.php">

		<table>
			<td><label>Nom :</label></td>
			<tr>
				<td><label><input placeholder="Nom" type="text" name="nom" required /></label></td>
			</tr>
			<td><br><label>Prénom :  </label></td>
			<tr>
				<td><input placeholder="Prénom" type="text" name="prenom" required /></td>
			</tr>
			<td><br><label>Adresse email :</label></td>
			<tr>
				<td><input placeholder=" Votre email"  type="email" name="email" required /></td>
			</tr>
			<td><br><label>Mot de passe :</label></td>
			<tr>
				<td><input placeholder="Votre mot de passe" type="password" name="password" required /></td>
			</tr>
			<br>	
		</table>
		<br>

		<select name="filiere" id="filiere">
			<option>Filière</option>
			<option>L1-MIPI</option>
			<option>L2-MIPI</option>
			<option>L3-I</option>
			<option>LP RS</option>
			<option>LPI-RIWS</option>
		</select>

		<select name="groupe" id="groupe">
			<option>Groupe</option>
			<option>Groupe A</option>
			<option>Groupe B</option>
			<option>Groupe C</option>
		</select>

		<br><br><br>
		<input type="submit" value="Je m'inscris" id="button"/>
	</form>

	<br>

		<?php
	function souscription(){
	if (isset($_GET['email'])){
	$contenu=file('tb.csv');
	$found= FALSE;
	for ($i=0; $i < sizeof($contenu) ; $i++) { 
		$Clignes= explode(";", $contenu[$i]);
		$Clignes[1]=str_replace("\n","",$Clignes[1]);
		if ($_GET['email']==$Clignes[2] && md5($_GET['email'].$_GET['password'])==$Clignes[3]) {
	        $found=TRUE;
	    }
	    
	}
	if ($found==TRUE){
	    echo "Utilisateur déjà enregistré";
	    
	}
	else{

        $Fecriture= fopen("tb.csv", "a");
		fwrite($Fecriture, $_GET['nom'].";".$_GET['prenom'].";".$_GET['email'].";".md5($_GET['email'].$_GET['password']).";".$_GET['filiere'].";".$_GET['groupe']."\n");
		fclose($Fecriture);
		echo "Vous etes bien inscrit !";	  
	     
	} 
	}
	}
	souscription();

	?>

			<br><br>
			<a href="connexion.php">Retour à la page de connexion</a>
			<br><br><br>

	</div>
	</div>
	<br><br><br>
</body>
</html>