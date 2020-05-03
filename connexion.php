<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="ucp2.jpg" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="tb.css" >

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

		<h1>Compte étudiant : Se connecter</h1>

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

		</div>
		</div>
		<br><br><br><br><br><br><br><br><br>

		<hr>

		<div id="footer">
        <p>Projet Avril | Tout droit réservé | 2020</p>
    	</div>

	</body>
</html>