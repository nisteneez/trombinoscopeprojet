<!DOCTYPE html>
<html lang="fr">
<head>
    <title>clé api</title>
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

    <h1>  clé API et sa documentation </h1>

    <div id="bloc_page2">
    <hr>
    <br>
    <form method="get" action="cleAPI.php">
        Veuillez entrer votre adresse email:<input type="mail" placeholder="Email" name="Mail_Api"><br>
        <input type="submit" name="sub" value="valider">
    </form>

<?php
function randomCle($longueur){
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longueurMax = strlen($caracteres);
    $chaineAlea = '';
    for($i = 0; $i <$longueur; $i++){
$chaineAlea .= $caracteres[rand(0, $longueurMax - 1)];

}
return $chaineAlea;
}


function apiMail($email){
    $RecupFich=file('api.csv');
    $api="";
    for($i=0; $i < sizeof($RecupFich); $i++){
        $ligne=explode(";" , $RecupFich[$i]);
        if($email==$ligne[0]){
            $api=$ligne[1];
        }
    }
    return $api;
}
$apiCle=randomCle(10);
$mail='';
if(isset($_GET['Mail_Api'])){
    $mail=$_GET['Mail_Api'];
    if(apiMail($mail)){
        echo "<p> voila votre Clé: " .apiMail($mail)."</p>";
    }
    else{
        $write_ligne="$mail;$apiCle;\n";
        $fichier=fopen('api.csv' , 'a');
        fwrite($fichier, $write_ligne);

        echo"<p> voila votre clé: ".$apiCle."</p>";
    }
}

?>
<br>
<hr>

    </div>

</body>
</html>