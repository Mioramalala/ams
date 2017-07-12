<?php

include_once "../../../connexion.php";

	$idsup=@$_POST['ide'];
	$idtyp=@$_POST['rubtyp'];

    if($idtyp == 1){
			$sql = "DELETE FROM `tab_rubrique_notes_annexes` WHERE `rubrique_id` =".$idsup;
			
			$req = $bdd->exec($sql);
			if($req)
		    	echo 0;
		    else
		    	echo 1;
    }
    elseif($idtyp == 2){
			$sql = "DELETE FROM `tab_rubrique_sous` WHERE `sous_id` =".$idsup;
			
			$req = $bdd->exec($sql);
			if($req)
	    		echo 0;
	    	else
	    		echo 1;

    } 

?>