<!DOCTYPE html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="ucp2.jpg" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="tb.css" >

</head> 
<body> 
		<br><br>
		<h1>Compte étudiant : Se connecter</h1>

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

		<form  method="get" action="verification.php">
			<table>

			<td><br><label>Courriel :</label></td>
			<tr>
				<td><input placeholder="Votre email" type="text" name="email" required /></td>
			</tr>

			<td><br><label>Mot de passe :</label></td>
			<tr>
				<td><input placeholder="Votre mot de passe" type="password" name="password" required/></td>
				<br>
			</tr>

			</table>

			<br><br>

			<input type="submit" name="valider" value="Se connecter" id="button"/>					   
		</form>

		<br><br>
		<a href="index.php">S'inscrire</a>
		<br><br><br>

		</div>

	</body>
</html>