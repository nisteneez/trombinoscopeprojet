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

		<?php 
	
			if(isset($_POST['afficher']))
			{
				$upload = 'image/';
			}

			if (isset($_FILES['photo']) AND !empty($_FILES['photo']['nom']))
			{
				$extensionsValides = array('jpg');
			}

		?>

		<form method="get" action="modification.php">
		<table>
			<tr>
				<td><label id="labelinfo">Nom :</label></td>
				<td><input placeholder="<?php echo $info[0]; ?>" type="text" name="nom" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Prénom :</label></td>
				<td><br><br><input placeholder="<?php echo $info[1]; ?>" type="text" name="prenom" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">E-mail :</label></td>
				<td><br><br><input placeholder="<?php echo $info[2]; ?>"  type="email" name="email" id="inputinfo"/></td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Filière :</label></td>
				<td><br><br>
					<select name="filiere" id="filiere">
						<option><?php echo $info[4]; ?></option>
						<option>-------------------------------------------</option>
						<option>L1-MIPI</option>
						<option>L2-MIPI</option>
						<option>L3-I</option>
						<option>LP RS</option>
						<option>LPI-RIWS</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><br><br><label id="labelinfo">Groupe :</label></td>
				<td><br><br>
					<select name="groupe" id="groupe">
						<option><?php echo $info[5]; ?></option>
						<option>-------------------------------------------</option>
						<option>Groupe A</option>
						<option>Groupe B</option>
						<option>Groupe C</option>
					</select>
				</td>
			</tr>	
		</table>

		<br><br><br>

		<input type="submit" name="enregistrer" value="Enregistrer" id="button"/>

		</form>

		<form method="post" action="information.php">
		<table>
		<tr>
			<td><label id="afficher">Photo :</label></td>
			<td><br><input type="file" name="photo" id="afficher"></td>
			<td><input type="submit" name="afficher" value="Afficher" id="buttonphoto"></td>
		</tr>	
		</table>
		</form>

		<img id="photo" src="<?php echo 'image/' . basename($info[2].".jpg");?>">

	<br><br>

	</div>
</body>
</html>