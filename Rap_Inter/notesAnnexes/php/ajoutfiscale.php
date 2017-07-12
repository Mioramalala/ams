<?php 
session_start();
extract($_POST);
$val = false;
	if (isset($fiscal)) {
		$id_mission = $_SESSION['idMission'];


		//start connexion
		require_once("../../../connexion.php");
		$sql = "SELECT `id_mission`as id
				FROM `tab_rubrique_fisc`
				WHERE `id_mission` =".$id_mission ;
		$req = $bdd->query($sql) or die($sql);
		// $i=1;
		//UPDATE `tmsconsuams`.`tab_rubrique_fisc` SET `resultat` = 'bénéficière',`id_devise` = '1',`montant` = '10000',`impots` = '2000',`res_impots` = '1' WHERE `tab_rubrique_fisc`.`id` =1;	
		$d   = $req->fetch();
		// echo $id=$d['id'];
		$res = $req->rowCount();

		    if($res>0)
		    {
		    	$sql = "UPDATE tab_rubrique_fisc SET resultat =:fiscal,id_devise =:monnaie,montant =:montant,impots=:impots,res_impots =:minimum WHERE id_mission =:id";
				$r = $bdd->prepare($sql);
				$val = $r->execute(array(
					'fiscal'=>$fiscal,
					'monnaie'=>$monnaie,
					'montant'=>$montant,
					'impots'=>$impots,
					'minimum'=>$minimum,
					'id'=>$d['id'])) or die($sql);
				// $val = true;
		    }else
		    {
				$sql = "INSERT INTO tab_rubrique_fisc(resultat,id_devise,montant,impots,res_impots,id_mission) 
				VALUES ('".$fiscal."',".$monnaie.",'".$montant."','".$impots."','".$minimum."',".$id_mission.")";

				$val = $bdd->exec($sql) or die($sql);

		    }
	
	}
	
	if($val) echo "Enregistrement réussi.";
	else echo "Echec de l'enregistrement.";
 ?>