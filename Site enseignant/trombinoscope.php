<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Trombinoscope</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="ucp2.jpg" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="tb2.css" >
</head>

<body>

<div id="menu">
    <ul>
       	<li><img src="ucp.png" id="logo"></li>
        <li><a href="deconnexion.php"><img src="croix.png" id="icon" title="Déconnexion"></a></li>
    </ul>
</div>

    <hr>

<h1>Trombinoscope</h1>

<div id="bloc_page2">
	<br>
	<nav id="menutb">
		<ul>
			<div class="dropdown">
				<a>L1-MIPI</a>
				<div class="slide">
					<div class="dropcontent">
					<a href="trombinoscope.php?filiere=L1-MIPI&groupe=A&key=QkqKI9uTFw">Groupe A</a>
					<a href="trombinoscope.php?filiere=L1-MIPI&groupe=B&key=QkqKI9uTFw">Groupe B</a>
					<a href="trombinoscope.php?filiere=L1-MIPI&groupe=C&key=QkqKI9uTFw">Groupe C</a>
					</div>
				</div>
			</div>
			<div class="dropdown">
				<a>L2-MIPI</a>
				<div class="slide">
					<div class="dropcontent">
					<a href="trombinoscope.php?filiere=L2-MIPI&groupe=A&key=QkqKI9uTFw">Groupe A</a>
					<a href="trombinoscope.php?filiere=L2-MIPI&groupe=B&key=QkqKI9uTFw">Groupe B</a>
					<a href="trombinoscope.php?filiere=L2-MIPI&groupe=C&key=QkqKI9uTFw">Groupe C</a>
					</div>
				</div>
			</div>
			<div class="dropdown">
				<a>L3-I</a>
				<div class="slide">
					<div class="dropcontent">
					<a href="trombinoscope.php?filiere=L3-I&groupe=A&key=QkqKI9uTFw">Groupe A</a>
					<a href="trombinoscope.php?filiere=L3-I&groupe=B&key=QkqKI9uTFw">Groupe B</a>
					<a href="trombinoscope.php?filiere=L3-I&groupe=C&key=QkqKI9uTFw">Groupe C</a>
					</div>
				</div>
			</div>
			<div class="dropdown">
				<a>LP RS</a>
				<div class="slide">
					<div class="dropcontent">
					<a href="trombinoscope.php?filiere=LP RS&groupe=A&key=QkqKI9uTFw">Groupe A</a>
					<a href="trombinoscope.php?filiere=LP RS&groupe=B&key=QkqKI9uTFw">Groupe B</a>
					<a href="trombinoscope.php?filiere=LP RS&groupe=C&key=QkqKI9uTFw">Groupe C</a>
					</div>
				</div>
			</div>
			<div class="dropdown">
				<a>LPI-RIWS</a>
				<div class="slide">
					<div class="dropcontent">
					<a href="trombinoscope.php?filiere=LPI-RIWS&groupe=A&key=QkqKI9uTFw">Groupe A</a>
					<a href="trombinoscope.php?filiere=LPI-RIWS&groupe=B&key=QkqKI9uTFw">Groupe B</a>
					<a href="trombinoscope.php?filiere=LPI-RIWS&groupe=C&key=QkqKI9uTFw">Groupe C</a>
					</div>
				</div>
			</div>

		</ul>
	</nav>

    <hr>

	<h2>Eleves de <?php echo $_GET['filiere']. " / Groupe  " . $_GET['groupe']?></h2>
<table align="center">
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
		</tr>
	<?php

	if(isset($_GET['filiere'])){
		$recup_data = file_get_contents('https://etudiantcergypontoise.yj.fr/API.php?filiere='.$_GET['filiere'].'&groupe='.$_GET['groupe'].'&key=yGUQcJiVss');
		$donnees = json_decode($recup_data,true);
		//var_dump($data);
		$number = count($donnees["etudiant"]);
		for ($i=0; $i <$number ; $i++) {
				echo 
				"<tr>
				<td> ".$donnees["etudiant"][$i]['nom']."  </td>
				<td> ".$donnees["etudiant"][$i]['prenom']." </td>
				<td> ".$donnees["etudiant"][$i]['email']."</td>
				</tr>
				";
		}
		
	}
?>

</table>
</div>
			
</body>
</html>
