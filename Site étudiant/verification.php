<?php

/*VERIF DE CONNEXION*/

session_start();
$_SESSION['email']=$_GET['email'];
function verification(){
	$lecture=file('tb.csv');
	$found= FALSE;
	for ($i=0; $i < sizeof($lecture) ; $i++) { 
		$Rlignes= explode(";", $lecture[$i]);
		$Rlignes[1]=str_replace("\n","",$Rlignes[1]);
		if ($_GET['email']==$Rlignes[2] && md5($_GET['email'].$_GET['password'])==$Rlignes[3]) {
	        $found=TRUE;
	    }
	    	    
	}
	if ($found==TRUE){
	    header("Location: ./information.php");
	    exit();
	}
	else{
	    header("Location: ./connexion.php");
	    exit();
	}
}
verification()
?>