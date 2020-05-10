	<?php
    print_r($_FILES);
    if(isset($_FILES['images']) && !empty($_FILES['images']['name'])) {
    $tailleMax = 2097152;
    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['images']['size'] <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['images']['name'], '.'), 1));
        if(in_array($extensionUpload, $extensionsValides)) {
            $chemin = "./images/".$_FILES['images']['name'].".".$extensionUpload;
        $resultat = move_uploaded_file($_FILES['images']['tmp_name'], $chemin);
   
    	} 
    	} 
        exit(header("Location: ./information.php"));

    	}


    	?>