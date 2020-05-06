<?php
header('Content-Type: application/json');
function api($filiere,$groupe){
    $RecupFich=file('tb.csv');
    $etu['name']=$filiere."/".$groupe;
    $etu['etudiant']=array();

    for($i=0;$i <sizeof($RecupFich);$i++){
        $ligne=explode(";", $RecupFich[$i]);
        $tab=array();
        if($filiere == $ligne[4] && $groupe == $ligne[5]){
            $tab[$i]['nom']=$ligne[0];
            $tab[$i]['prenom']=$ligne[1];
            $tab[$i]['email']=$ligne[2];
            $tab[$i]['filiere']=$ligne[4];
            $tab[$i]['groupe']=$ligne[5];
        }
        else{
            continue;
        }
        array_push($etu['etudiant'],$tab[$i]);
    }
    return($etu);
}

function jason($tab){
    return json_encode($tab);
}

function ApiCle($verif){
    $RecupCle=file('api.csv');
    $found=FALSE;
    for($i=0;$i <sizeof($RecupCle);$i++){
        $ligne=explode(";", $RecupCle[$i]);
        if($verif==$ligne[1]){
            $found= TRUE;
        }
    }
        return $found;
}

$apiCle=$_GET['key'];
if(ApiCle($apiCle)){
    $data=api($_GET['filiere'], $_GET['groupe']);
    $json= jason($data);
}

else{
    $erreur="Mauvaise cle !";
    $json=jason($erreur);
}

echo $json;

//Pour voir l'api sous forme json
//https://etudiantcergypontoise.yj.fr/API.php?filiere=.......&groupe=...&key=.......

?>

