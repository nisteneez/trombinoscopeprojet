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
<br>

<div id="bloc_page2">
	<h1>Trombinoscope</h1>
	<br>

	<nav id="menutb">
		<ul>
			<div class="dropdown">
				<a>L1-MIPI</a>
				<div class="slide">
					<div class="dropcontent">
					<a href="trombinoscope.php?filiere=L1-MIPI&groupe=A&key=MKzzXqHuhY">Groupe A</a>
					<a href="trombinoscope.php?filiere=L1-MIPI&groupe=B&key=MKzzXqHuhY">Groupe B</a>
					<a href="trombinoscope.php?filiere=L1-MIPI&groupe=C&key=MKzzXqHuhY">Groupe C</a>
					</div>
				</div>
			</div>
			<div class="dropdown">
				<a>L2-MIPI</a>
				<div class="slide">
					<div class="dropcontent">
					<a href="trombinoscope.php?filiere=L2-MIPI&groupe=A&key=MKzzXqHuhY">Groupe A</a>
					<a href="trombinoscope.php?filiere=L2-MIPI&groupe=B&key=MKzzXqHuhY">Groupe B</a>
					<a href="trombinoscope.php?filiere=L2-MIPI&groupe=C&key=MKzzXqHuhY">Groupe C</a>
					</div>
				</div>
			</div>
			<div class="dropdown">
				<a>L3-I</a>
				<div class="slide">
					<div class="dropcontent">
					<a href="trombinoscope.php?filiere=L3-I&groupe=A&key=MKzzXqHuhY">Groupe A</a>
					<a href="trombinoscope.php?filiere=L3-I&groupe=B&key=MKzzXqHuhY">Groupe B</a>
					<a href="trombinoscope.php?filiere=L3-I&groupe=C&key=MKzzXqHuhY">Groupe C</a>
					</div>
				</div>
			</div>
			<div class="dropdown">
				<a>LP-RS</a>
				<div class="slide">
					<div class="dropcontent">
					<a href="trombinoscope.php?filiere=LP-RS&groupe=A&key=MKzzXqHuhY">Groupe A</a>
					<a href="trombinoscope.php?filiere=LP-RS&groupe=B&key=MKzzXqHuhY">Groupe B</a>
					<a href="trombinoscope.php?filiere=LP-RS&groupe=C&key=MKzzXqHuhY">Groupe C</a>
					</div>
				</div>
			</div>
			<div class="dropdown">
				<a>LPI-RIWS</a>
				<div class="slide">
					<div class="dropcontent">
					<a href="trombinoscope.php?filiere=LPI-RIWS&groupe=A&key=MKzzXqHuhY">Groupe A</a>
					<a href="trombinoscope.php?filiere=LPI-RIWS&groupe=B&key=MKzzXqHuhY">Groupe B</a>
					<a href="trombinoscope.php?filiere=LPI-RIWS&groupe=C&key=MKzzXqHuhY">Groupe C</a>
					</div>
				</div>
			</div>

		</ul>
	</nav>

    <hr>

	<h2 align="center">Elèves de <?php echo $_GET['filiere']. " / Groupe  " . $_GET['groupe']?></h2>
	<br>
		
	<?php

	if(isset($_GET['filiere'])){
		$recup_data = file_get_contents('https://etudiantcergypontoise.yj.fr/API.php?filiere='.$_GET['filiere'].'&groupe='.$_GET['groupe'].'&key=MKzzXqHuhY');
		$donnees = json_decode($recup_data,true);
		//var_dump($data);
		$number = count($donnees["etudiant"]);
		for ($i=0; $i <$number ; $i++) {
				echo 
				"<div id='tb'>
				<p> Nom : ".$donnees["etudiant"][$i]['nom']."  </p>
				<p> Prénom : ".$donnees["etudiant"][$i]['prenom']." </p>
				<p> Email : ".$donnees["etudiant"][$i]['email']."</p>
				</div>
				";
		}
		
	}
?>
<br><br><br>
<input type="button" value="Imprimer" onClick="window.print()" id="buttonimp">
<br><br><br>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<hr>

	<div id="footer">
        <p>Projet Avril | Tout droit réservé | 2020</p>
    </div>
			
</body>
</html>
