<?php
	session_start();
	include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];


	if(array_key_exists('periode',$_POST) && array_key_exists('snp',$_POST) 
  && array_key_exists('pe1',$_POST) && array_key_exists('pe1',$_POST) && array_key_exists('pe13',$_POST)){
//data:{periode:periode,snp:snp,sp:sp,pe1:pe1,pe13:pe13},
	$periode = $_POST['periode'];
	$snp = $_POST['snp'];
	$sp = $_POST['sp'];
	$pe1 = $_POST['pe1'];
	$pe13 = $_POST['pe13'];

	$req=$bdd->query("SELECT * FROM tab_cad_salaire_cnaps WHERE PERIODE = '".$periode."' AND MISSION_ID=".$_SESSION['idMission']);
	$rowCount = $req->rowCount();

	if($rowCount == 0){
		$reqSyn=$bdd->exec("INSERT INTO  tab_cad_salaire_cnaps ( PERIODE, SNP, SP, PE1, PE13, MISSION_ID,UTIL_ID) VALUES ('".$periode."',".$snp.",".$sp.",".$pe1.",".$pe13.",".$_SESSION['idMission'].",".$UTIL_ID.")");
		
		$reqSyn00="INSERT INTO  tab_cad_salaire_cnaps ( PERIODE, SNP, SP, PE1, PE13, MISSION_ID,UTIL_ID) VALUES ('".$periode."',".$snp.",".$sp.",".$pe1.",".$pe13.",".$_SESSION['idMission'].",".$UTIL_ID.")";
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $reqSyn00.";", FILE_APPEND | LOCK_EX);
	}
	else{
		$reqSyn1=$bdd->exec(' UPDATE tab_cad_salaire_cnaps SET UTIL_ID = '.$UTIL_ID.',SNP ='.$snp.', SP='.$sp.', PE1='.$pe1.', PE13='.$pe13.' WHERE PERIODE = "'.$periode.'" AND MISSION_ID='.$_SESSION['idMission']);
		
		$reqSyn11=' UPDATE tab_cad_salaire_cnaps SET UTIL_ID = '.$UTIL_ID.',SNP ='.$snp.', SP='.$sp.', PE1='.$pe1.', PE13='.$pe13.' WHERE PERIODE = "'.$periode.'" AND MISSION_ID='.$_SESSION['idMission'];
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $reqSyn11.";", FILE_APPEND | LOCK_EX);

	}

}






 if(array_key_exists('comptNPCNAPS',$_POST) && array_key_exists('comptPCNAPS',$_POST) 
		&& array_key_exists('comptPECNAPS1',$_POST) && array_key_exists('comptPECNAPS13',$_POST) 
		&& array_key_exists('totalNPCNAPS',$_POST) && array_key_exists('totalPECNAPS1',$_POST) 
		&& array_key_exists('totalPECNAPS13',$_POST) && array_key_exists('totalPCNAPS',$_POST)
		&& array_key_exists('ecartNPCNAPS',$_POST) && array_key_exists('ecartPECNAPS1',$_POST)
		&& array_key_exists('ecartPECNAPS13',$_POST) && array_key_exists('ecartPCNAPS',$_POST) 
  ){

        $comptNPCNAPS=$_POST['comptNPCNAPS'];
        $comptPCNAPS=$_POST['comptPCNAPS'];
        $comptPECNAPS1=$_POST['comptPECNAPS1'];
        $comptPECNAPS13=$_POST['comptPECNAPS13']; 

         $totalNPCNAPS=$_POST['totalNPCNAPS'];
         $totalPECNAPS1=$_POST['totalPECNAPS1'];
         $totalPECNAPS13=$_POST['totalPECNAPS13'];
         $totalPCNAPS=$_POST['totalPCNAPS'];

        $ecartNPCNAPS=$_POST['ecartNPCNAPS'];
		$ecartPECNAPS1=$_POST['ecartPECNAPS1'];
		$ecartPECNAPS13=$_POST['ecartPECNAPS13'];
		$ecartPCNAPS=$_POST['ecartPCNAPS'];




       $requete1=$bdd->query("SELECT * from tab_cadrage_salaire WHERE IDENTIFIANT = 'cnaps_salaire_non_plafonees' AND MISSION_ID=".$_SESSION['idMission']);
       $nbLigne1=$requete1->rowCount();
       echo "nbLigne1 : ".$nbLigne1."<br>";

       if($nbLigne1==0){
       		$insertion=$bdd->exec("INSERT into tab_cadrage_salaire(TOTAL, COMPTA, ECART, IDENTIFIANT, MISSION_ID, UTIL_ID) VALUES (".$totalNPCNAPS.",". $comptNPCNAPS.",".$ecartNPCNAPS.",'cnaps_salaire_non_plafonees',".$_SESSION['idMission'].",".$UTIL_ID.")");
         
       }
       else{

       	     $insertion=$bdd->exec("UPDATE tab_cadrage_salaire SET TOTAL=".$totalNPCNAPS.", COMPTA=".$comptNPCNAPS.", ECART=".$ecartNPCNAPS." WHERE IDENTIFIANT='cnaps_salaire_non_plafonees' AND MISSION_ID=".$_SESSION['idMission']);
           }
    

//----------------------------------------


     $requete2=$bdd->query("SELECT * from tab_cadrage_salaire WHERE IDENTIFIANT = 'cnaps_salaire_plafonees' AND MISSION_ID=".$_SESSION['idMission']);
       $nbLigne2=$requete2->rowCount();
       echo "nbLigne2 : ".$nbLigne2."<br>";
       if($nbLigne2==0){
       		$insertion=$bdd->exec("INSERT into tab_cadrage_salaire(TOTAL, COMPTA, ECART, IDENTIFIANT, MISSION_ID, UTIL_ID) VALUES (".$totalPCNAPS.",". $comptPCNAPS.",".$ecartPCNAPS.",'cnaps_salaire_plafonees',".$_SESSION['idMission'].",".$UTIL_ID.")");

       }
       else{

       	     $insertion=$bdd->exec("UPDATE tab_cadrage_salaire SET TOTAL=".$totalPCNAPS.", COMPTA=".$comptPCNAPS.", ECART=".$ecartPCNAPS." WHERE IDENTIFIANT='cnaps_salaire_plafonees' AND MISSION_ID=".$_SESSION['idMission']);
           }



//------------------------------------------------------------------------------------
       $requete3=$bdd->query("SELECT * from tab_cadrage_salaire WHERE IDENTIFIANT = 'cnaps_pe1' AND MISSION_ID=".$_SESSION['idMission']);
       $nbLigne3=$requete3->rowCount();
      echo "nbLigne3 : ".$nbLigne3."<br>";

       if($nbLigne3==0){
       		$insertion=$bdd->exec("INSERT into tab_cadrage_salaire(TOTAL, COMPTA, ECART, IDENTIFIANT, MISSION_ID, UTIL_ID) VALUES (".$totalPECNAPS1.",". $comptPECNAPS1.",".$ecartPECNAPS1.",'cnaps_pe1',".$_SESSION['idMission'].",".$UTIL_ID.")");

       }
       else{

       	     $insertion=$bdd->exec("UPDATE tab_cadrage_salaire SET TOTAL=".$totalPECNAPS1.", COMPTA=".$comptPECNAPS1.", ECART=".$ecartPECNAPS1." WHERE IDENTIFIANT='cnaps_pe1' AND MISSION_ID=".$_SESSION['idMission']);
           }

//-----------------------------------------------------------------------


	   $requete4=$bdd->query("SELECT * from tab_cadrage_salaire WHERE IDENTIFIANT = 'cnaps_pe13' AND MISSION_ID=".$_SESSION['idMission']);
       $nbLigne4=$requete4->rowCount();
      echo "nbLigne4 : ".$nbLigne4."<br>";

       if($nbLigne4==0){
       		$insertion=$bdd->exec("INSERT into tab_cadrage_salaire(TOTAL, COMPTA, ECART, IDENTIFIANT, MISSION_ID, UTIL_ID) VALUES (".$totalPECNAPS13.",". $comptPECNAPS13.",".$ecartPECNAPS13.",'cnaps_pe13',".$_SESSION['idMission'].",".$UTIL_ID.")");

       }
       else{

       	     $insertion=$bdd->exec("UPDATE tab_cadrage_salaire SET TOTAL=".$totalPECNAPS13.", COMPTA=".$comptPECNAPS13.", ECART=".$ecartPECNAPS13." WHERE IDENTIFIANT='cnaps_pe13' AND MISSION_ID=".$_SESSION['idMission']);
           }

//------------------------------------------------------------------------------------------



}





	
?>