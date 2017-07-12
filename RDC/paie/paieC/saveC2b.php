<?php 
	session_start();
	include '../../../connexion.php';

	
		$UTIL_ID=$_SESSION['id'];
// if(isset($_POST['compte']) &&  
// 	isset($_POST['soldeBL']) && 
// 	isset($_POST['soldeCP']) &&  $ecart = $_POST['ecart'&& isset($_POST['obs'])] && isset($_POST['name']) ){
// 	$compte = $_POST['compte'];             
// 	$soldeBL = $_POST['soldeBL'];
// 	$soldeCP = $_POST['soldeCP'];
// 	$ecart = $_POST['ecart'];
// 	$obs = $_POST['obs'];
// 	$fichier = $_POST['name'];

// 	$req=$bdd->query("SELECT * FROM tab_rap_cpbl WHERE CPBL_COMPTE = ".$compte." AND MISSION_ID=".$_SESSION['idMission']);
// 	$rowCount = $req->rowCount();
	
// 	if( $rowCount == 0 ){
// 		/*$reqSyn=$bdd->exec("INSERT INTO tab_rap_cpbl ( CPBL_COMPTE, CPBL_SOLDE, CPBL_CP, CPBL_ECART, CPBL_OBS,CPBL_FILE, MISSION_ID,UTIL_ID) VALUES ('".$compte."',".$soldeBL.",".$soldeCP.",".$ecart.",'".$obs."',.'".$fichier."',".$_SESSION['idMission'].",".$UTIL_ID.")");*/

// 		$reqSyn=$bdd->exec("INSERT INTO tab_rap_cpbl
// 		(CPBL_COMPTE, CPBL_SOLDE, CPBL_CP, CPBL_ECART, CPBL_OBS, CPBL_FILE,MISSION_ID,UTIL_ID) VALUES('".$compte."',".$soldeBL.",".$soldeCP.",".$ecart.",'".$obs."','".$fichier."',".$_SESSION['idMission'].",".$UTIL_ID.")");
// 		$reqSyn=$bdd->exec("INSERT INTO tab_rap_cpbl
// 		(CPBL_COMPTE, CPBL_SOLDE, CPBL_CP, CPBL_ECART, CPBL_OBS, CPBL_FILE,MISSION_ID,UTIL_ID) VALUES('22',34343434,44,2,'".$obs."','text',47,1)");
        

		
// 		$reqSyn00="INSERT INTO tab_rap_cpbl( CPBL_COMPTE, CPBL_SOLDE, CPBL_CP, CPBL_ECART, CPBL_OBS, CPBL_FILE, MISSION_ID, UTIL_ID )
// VALUES ('".$compte."' , ".$soldeBL. ",".$soldeCP.",".$ecart.",'".$obs."', '".$fichier."',".$_SESSION['idMission'].",".$UTIL_ID.")";
			
// 		$file = '../../../fichier/save_mission/mission.sql';
// 		file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);

// 	}
// 	else{
// 		$reqSyn1=$bdd->exec('UPDATE tab_rap_cpbl SET UTIL_ID = '.$UTIL_ID.',CPBL_SOLDE='.$soldeBL.', CPBL_CP='.$soldeCP.', CPBL_ECART='.$ecart.', CPBL_OBS="'.$obs.'", CPBL_FILE="'.$fichier.'" WHERE CPBL_COMPTE = "'.$compte.'" AND MISSION_ID='.$_SESSION['idMission']);
		
// 		$reqSyn11='UPDATE tab_rap_cpbl SET UTIL_ID = '.$UTIL_ID.',CPBL_SOLDE='.$soldeBL.', CPBL_CP='.$soldeCP.', CPBL_ECART='.$ecart.', CPBL_OBS="'.$obs.'", CPBL_FILE="'.$fichier.'" WHERE CPBL_COMPTE = "'.$compte.'" AND MISSION_ID='.$_SESSION['idMission'];
			
// 		$file = '../../../fichier/save_mission/mission.sql';
// 		file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);
// 	}
// 	echo $reqSyn;
// }


//observation:observation,ecart:ecart,soldeCP:soldeCP,id:id,compte:compte,soldeBL:soldeBL



//if(isset($_POST['observation']) && isset($_POST['ecart']) && isset($_POST['soldeCP'])){

	$observation=$_POST['observation'];
	$ecart=$_POST['ecart'];
	$soldeCP=$_POST['soldeCP'];
	$compte = $_POST['compte'];  
	$soldeBL=$_POST['soldeBL']; 


	//$query="INSERT into tab_rap_cpbl(ID, CPBL_COMPTE, CPBL_SOLDE, CPBL_CP,CPBL_ECART,CPBL_OBS,CPBL_FILE,MISSION_ID,UTIL_ID) VALUES (null,'".$compte."',".$soldeBL.", ".$soldeCP.",".$ecart.",'".$observation."','fichier.txt',".$_SESSION['idMission'].",".$UTIL_ID.")";
 

 $req1=$bdd->query("SELECT * FROM tab_rap_cpbl WHERE  CPBL_COMPTE='".$compte."' AND MISSION_ID=".$_SESSION['idMission']);
 $num=$req1->rowCount();


if($num==false){
	$query=$bdd->exec("INSERT INTO tab_rap_cpbl( ID, CPBL_COMPTE, CPBL_SOLDE, CPBL_CP, CPBL_ECART, CPBL_OBS, CPBL_FILE, MISSION_ID, UTIL_ID )
	VALUES ( NULL , '".$compte."', ".$soldeBL.",".$soldeCP.", ".$ecart.", '".$observation."', 'fichier.txt', ".$_SESSION['idMission'].",".$UTIL_ID.")");
}
else{

	
	$query=$bdd->exec('UPDATE tab_rap_cpbl SET UTIL_ID = '.$UTIL_ID.',CPBL_SOLDE='.$soldeBL.', CPBL_CP='.$soldeCP.', CPBL_ECART='.$ecart.', CPBL_OBS="'.$observation.'", CPBL_FILE="fichier" WHERE CPBL_COMPTE = "'.$compte.'" AND MISSION_ID='.$_SESSION['idMission']);
}		





	?>


