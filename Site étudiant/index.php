<!DOCTYPE html>
<html>
<head>
	<title>Inscription</title>
	<link rel="shortcut icon" href="ucp2.jpg" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="tb.css" >
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

</head> 
<body>

	<div id="menu">
            <ul>
            	<li><img src="ucp.png" id="logo"></li>
                <li><a href="cleAPI.php"><img src="cle.jpg" id="icon" title="Documentation Cle API"></a></li>
                <li><a href="connexion.php"><img src="login.jpg" id="icon" title="Accès au compte etudiant"></a></li>
            </ul>
    </div>

 <hr>

	<h1>Compte étudiant : Inscription</h1>

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
			<option name="filiere">L1-MIPI</option>
			<option name="filiere">L2-MIPI</option>
			<option name="filiere">L3-I</option>
			<option name="filiere">LP-RS</option>
			<option name="filiere">LPI-RIWS</option>
		</select>

		<select name="groupe" id="groupe">
			<option>Groupe</option>
			<option name="groupe">A</option>
			<option name="groupe">B</option>
			<option name="groupe">C</option>
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
		fwrite($Fecriture, $_GET['nom'].";".$_GET['prenom'].";".$_GET['email'].";".md5($_GET['email'].$_GET['password']).";".$_GET['filiere'].";".$_GET['groupe'].";"."\n");
		fclose($Fecriture);
		echo "Vous etes bien inscrit !";	  
	     
	} 
	}
	}
	souscription();

	?>

	<br><br>

	</div>
	</div>

	<br><br>

	<hr>

	<div id="footer">
        <p>Projet Avril | Tout droit réservé | 2020</p>
    </div>

	<br><br><br>
</body>
</html>