<?php
	@session_start();
	$UTIL_ID=$_SESSION['id'];
	include '../connexion.php';

	$tabSelecter = $_POST['tabSelecter'];
	$risqueSysteme = $_POST['risqueSysteme'];
	$domaines = array('IMMOBILISATIONS Corporelles, incorporelles, financières','STOCK','VENTES - CLIENTS','TRESORERIE','ACHATS - FOURNISSEURS','PAIE - PERSONNEL','SOUS TRAITANCE');
	
	$req0=$bdd->query('SELECT MISSION_ANNEE FROM tab_mission WHERE MISSION_ID ='.$_SESSION['idMission']);
	$res=$req0->fetch();
	$res2=$res["MISSION_ANNEE"]-1;
							
	$requete='SELECT * tab_synthese_rsci_ra a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND MISSION_ANNEE='.$res2;
	
	$req = $bdd->query($requete);
	
	$ligne = $req->fetch();
	
	
	if($ligne!=0){
		for($i=0; $i<7; $i++){
			$update = $bdd->exec('UPDATE tab_synthese_rsci_ra SET UTIL_ID="'.$UTIL_ID.'",CARACTERE="'.$tabSelecter[($i*10)].'",EXHAUSTIVITE="'.$tabSelecter[($i*10)+1].'",REALITE="'.$tabSelecter[($i*10)+2].'",PROPRIETE="'.$tabSelecter[($i*10)+3].'",EVALUATION_CORRECTE="'.$tabSelecter[($i*10)+4].'",ENREGISTREMENT_BP="'.$tabSelecter[($i*10)+5].'",IMPUTATION_CORRECTE="'.$tabSelecter[($i*10)+6].'",TOTALISATION="'.$tabSelecter[($i*10)+7].'",BONNE_INFORMATION="'.$tabSelecter[($i*10)+8].'",RISQUE_GF="'.$tabSelecter[($i*10)+9].'" WHERE DOMAINE="'.$domaines[$i].'" AND MISSION_ID='.$_SESSION['idMission']);
		}
	}
	else{
		for($i=0; $i<7; $i++){
			$insert = $bdd->exec('INSERT INTO tab_synthese_rsci_ra (DOMAINE, CARACTERE, EXHAUSTIVITE, REALITE, PROPRIETE, EVALUATION_CORRECTE, ENREGISTREMENT_BP, IMPUTATION_CORRECTE, TOTALISATION, BONNE_INFORMATION, RISQUE_GF, MISSION_ID,UTIL_ID) VALUES ("'.$domaines[$i].'","'.$tabSelecter[($i*10)].'","'.$tabSelecter[($i*10)+1].'","'.$tabSelecter[($i*10)+2].'","'.$tabSelecter[($i*10)+3].'","'.$tabSelecter[($i*10)+4].'","'.$tabSelecter[($i*10)+5].'","'.$tabSelecter[($i*10)+6].'","'.$tabSelecter[($i*10)+7].'","'.$tabSelecter[($i*10)+8].'","'.$tabSelecter[($i*10)+9].'","'.$_SESSION['idMission'].'","'.$UTIL_ID.'")');
		}
	}
	//Pour le risque global
	$req0=$bdd->query('SELECT MISSION_ANNEE FROM tab_mission WHERE MISSION_ID ='.$_SESSION['idMission']);
	$res=$req0->fetch();
	$res2=$res["MISSION_ANNEE"]-1;
							
	$requete='SELECT * tab_risque_lie_systeme a,tab_mission b,tab_entreprise c WHERE b.ENTREPRISE_ID= c.ENTREPRISE_ID AND MISSION_ANNEE='.$res2;
	
	$reqRisque = $bdd->query($requete);
	
	$ligne = $reqRisque->fetch();

	if($ligne!=0){
		$update = $bdd->exec('UPDATE tab_risque_lie_systeme SET SET UTIL_ID="'.$UTIL_ID.'",RISQUE = "'.$risqueSysteme.'" WHERE MISSION_ID='.$_SESSION['idMission']);
	}
	else{
		$insert = $bdd->exec('INSERT INTO tab_risque_lie_systeme (RISQUE, MISSION_ID,UTIL_ID) VALUES ("'.$risqueSysteme.'","'.$_SESSION['idMission'].'","'.$UTIL_ID.'")');
	}
	
	$req='INSERT INTO tab_synthese_rsci_ra (DOMAINE, CARACTERE, EXHAUSTIVITE, REALITE, PROPRIETE, EVALUATION_CORRECTE, ENREGISTREMENT_BP, IMPUTATION_CORRECTE, TOTALISATION, BONNE_INFORMATION, RISQUE_GF, MISSION_ID,UTIL_ID) VALUES ("'.$domaines[$i].'","'.$tabSelecter[($i*10)].'","'.$tabSelecter[($i*10)+1].'","'.$tabSelecter[($i*10)+2].'","'.$tabSelecter[($i*10)+3].'","'.$tabSelecter[($i*10)+4].'","'.$tabSelecter[($i*10)+5].'","'.$tabSelecter[($i*10)+6].'","'.$tabSelecter[($i*10)+7].'","'.$tabSelecter[($i*10)+8].'","'.$tabSelecter[($i*10)+9].'","'.$_SESSION['idMission'].'","'.$UTIL_ID.'")';

$file = '../fichier/save_mission/mission.sql';
file_put_contents($file, $req.";", FILE_APPEND | LOCK_EX);
	
$req2='UPDATE tab_synthese_rsci_ra SET UTIL_ID="'.$UTIL_ID.'",CARACTERE="'.$tabSelecter[($i*10)].'",EXHAUSTIVITE="'.$tabSelecter[($i*10)+1].'",REALITE="'.$tabSelecter[($i*10)+2].'",PROPRIETE="'.$tabSelecter[($i*10)+3].'",EVALUATION_CORRECTE="'.$tabSelecter[($i*10)+4].'",ENREGISTREMENT_BP="'.$tabSelecter[($i*10)+5].'",IMPUTATION_CORRECTE="'.$tabSelecter[($i*10)+6].'",TOTALISATION="'.$tabSelecter[($i*10)+7].'",BONNE_INFORMATION="'.$tabSelecter[($i*10)+8].'",RISQUE_GF="'.$tabSelecter[($i*10)+9].'" WHERE DOMAINE="'.$domaines[$i].'" AND MISSION_ID='.$_SESSION['idMission'];
		
$file = '../fichier/save_mission/mission.sql';
file_put_contents($file, $req2.";", FILE_APPEND | LOCK_EX);	

$req3='UPDATE tab_risque_lie_systeme SET SET UTIL_ID="'.$UTIL_ID.'",RISQUE = "'.$risqueSysteme.'" WHERE MISSION_ID='.$_SESSION['idMission'];

$file = '../fichier/save_mission/mission.sql';
file_put_contents($file, $req3.";", FILE_APPEND | LOCK_EX);
	
$req4='INSERT INTO tab_risque_lie_systeme (RISQUE, MISSION_ID,UTIL_ID) VALUES ("'.$risqueSysteme.'","'.$_SESSION['idMission'].'","'.$UTIL_ID.'")';
		
$file = '../fichier/save_mission/mission.sql';
file_put_contents($file, $req4.";", FILE_APPEND | LOCK_EX);	
	
?>