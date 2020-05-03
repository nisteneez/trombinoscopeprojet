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
	exit(header("Location: ./index.php"));	  
	     
} 
}
}
souscription();
?>