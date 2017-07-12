<?php
		include '../connexion.php';
		$iduser=$_POST['a'];
		$sqlCycleD="SELECT nom_tache FROM  tab_distribution_tache  WHERE UTIL_ID=".$iduser;
			
			
			$rep=$bdd->query($sqlCycleD);
			while($donnCycl=$rep->fetch()){
				$list=$donnCycl["nom_tache"];
				echo $list.' , ' ;
			}

?>