<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Mes informations</title>
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

	<h1>Mes informations</h1>

	<br>

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
		<br>

		<?php 
		/*RECUPERATION DES DONNEES*/
		
			$informations=file("tb.csv");
			$tab=array();
			for ($i=0; $i < sizeof($informations) ; $i++) { 
				$csv=explode(";", $informations[$i]);
				if ($_SESSION['email']== $csv[2]){
					$info=$csv;
				}
			}
		?>

		<form method="get" action="modification.php">
		<table>
			<tr>
				<td><label id="labelinfo">Nom :</label></td>
				<td><input value="<?php echo $info[0]; ?>" type="text" name="nom" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Prénom :</label></td>
				<td><br><br><input value="<?php echo $info[1]; ?>" type="text" name="prenom" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">E-mail :</label></td>
				<td><br><br><input value="<?php echo $info[2]; ?>"  type="email" name="email" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Mot de passe : *</label></td>
				<td><br><br><input placeholder="Votre mot de passe"  type="password" name="password" id="inputinfo" title="Pour plus de sécurité le mot de passe sera chiffré !" required /></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Filière :</label></td>
				<td><br><br><input value="<?php echo $info[4]; ?>"  type="text" name="filiere" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Groupe :</label></td>
				<td><br><br><input value="<?php echo $info[5]; ?>"  type="text" name="groupe" id="inputinfo"/></td>
			</tr>	
		</table>

		<br><br><br><br>

		<input type="submit" name="enregistrer" value="Enregistrer" id="button"/><br>

		</form>



		<form method="post" action="deconnexion.php">
			<input type="submit" value="Déconnexion" id="button"/>
		</form>


		<form method="post" enctype="multipart/form-data" action="photo.php">

		<table>
		<tr>
			<td><label id="afficher">Photo :</label></td>
			<td><br><input type="file" name="images" id="afficher"></td>
			<td><input type="submit" value="Afficher" id="buttonphoto"></td>
		</tr>	
		</table>

		<img id="photo" src="<?php echo "./images/".$_FILES['images']['name'].".jpg.jpg" ?>">
		
		</form>

	</div>
	
</body>
</html>