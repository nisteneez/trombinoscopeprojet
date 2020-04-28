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
	<h1>Mes informations</h1>

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
		<br>

		<?php 
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
				<td><br><br><input value="<?php echo $info[3]; ?>"  type="password" name="password" id="inputinfo" title="Pour plus de sécurité le mot de passe et chiffré !" /></td>
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

		<form method="post" enctype="multipart/form-data" action="information.php">
		<table>
		<tr>
			<td><label id="afficher">Photo :</label></td>
			<td><br><input type="file" name="fichier" id="afficher"></td>
			<td><input type="submit" name="upload" value="Afficher" id="buttonphoto"></td>
		</tr>	
		</table>
		</form>

		<img id="photo" src="<?php echo 'images/' . basename($info[2]."jpg");?>">

		<?php 
			if(isset($_POST['apload']))
				{
					$upload = 'images/';
				}

			if (isset($_FILES['fichier']))
				{
					$extensionsValides = array('jpg');
				}

		?>


	</div>
</body>
</html>