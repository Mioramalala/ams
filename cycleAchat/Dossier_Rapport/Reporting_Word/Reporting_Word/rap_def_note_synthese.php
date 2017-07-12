<?php
session_start();
include "../connex.php";
//INITIALISATION =================================
$DATE_achat = date("d-m-Y");
//$heure_ajout = date("H:i");
	if(isset($_SESSION["user"])){
			$session_utiliser=$_SESSION["user"];
			$ID_mission =$_SESSION['idMission'];
			$ID_Entreprise =get_Entreprise ($ID_mission);
			$ID_Utilisateur =get_ID_utilisateur($session_utiliser);
			
			}else{
			$session_utiliser= $_SESSION['idMission'];
			$ID_mission =$_SESSION['idMission'];
			$ID_Entreprise= get_Entreprise ($ID_mission);
			$ID_Utilisateur =get_ID_utilisateur($session_utiliser);
			}
//VERIFIER LE MISSION EN COURS MISSION_ID "Tab_objectif"	
//======================================================================================================
//						CONTENU DES DONNEES A AFFICHER DANS LE FICHIER WORD
//======================================================================================================
$Auditeur="AUDITEUR";
$Superviseur="Superviseur";        



require_once 'class_word/PHPWord.php';
$PHPWord = new PHPWord();
$document = $PHPWord->loadTemplate('Template_word/Recap_rsci.docx');

/*$document->setValue('Auditeur',$Auditeur); //Auditeur
$document->setValue('Value1', $Superviseur); //Superviseur
$d='X';
$d1='X';
//=========================================================================
//A - S'assurer que les séparations de fonctions sont suffisantes.

$get_coche_A =db_connect("select DISTINCT(o.QUESTION_ID) from tab_objectif o,tab_suivi_export_fichier f 
							where o.MISSION_ID=f.MISSION_ID and o.MISSION_ID=3 and CYCLE_ACHAT_ID=2 LIMIT 22");
foreach ($get_coche_A  as $val){
$ligne = $val ['QUESTION_ID'];

if ($ligne==1){ $document->setValue('V2', 'X');	 	}else{} //L1 - C 1
if ($ligne==2){ $document->setValue('Value2', 'X');	}else{} //L2 - C 1
if ($ligne==3){ $document->setValue('Value3', 'X');	 	}else{} //L3 - C 1
if ($ligne==4){ $document->setValue('Value4', 'X');	 	}else{} //L4 - C 1
if ($ligne==5){ $document->setValue('Value5', 'X');	 	}else{} //L5 - C 1
if ($ligne==6){ $document->setValue('Value6', 'X');	 	}else{} //L6 - C 1
if ($ligne==7){ $document->setValue('Value7', 'X');	 	} else{}//L7 - C 1
if ($ligne=8){ $document->setValue('Value8', 'X');	 	}else{} //L8 - C 1
if ($ligne=9){ $document->setValue('Value9', 'X');	 	}else{} //L9 - C 1
if ($ligne=10){ $document->setValue('Value10', 'X');	 }else{} //L10 - C 1
if ($ligne=11){ $document->setValue('Value11', 'X');	 }else{} //L11 - C 1
if ($ligne=12){ $document->setValue('Value12', 'X');	 }else{} //L12- C 1
if ($ligne=13){ $document->setValue('Value13', 'X');	 }else{} //L13 - C 1
if ($ligne=14){ $document->setValue('Value14', 'X');	 }else{} //L14 - C 1
if ($ligne=15){ $document->setValue('Value15', 'X');	 }else{} //L15 - C 1
if ($ligne=16){ $document->setValue('Value16', 'X');	 }else{} //L16- C 1
if ($ligne=17){ $document->setValue('Value17', 'X');	 }else{} //L17- C 1
if ($ligne=18){ $document->setValue('Value18', 'X');	 }else{} //L18- C 1
if ($ligne=19){ $document->setValue('Value19', 'X');	 }else{} //L19- C 1
if ($ligne=20){ $document->setValue('Value20', 'X');	 }else{} //L20- C 1
if ($ligne==21){ $document->setValue('Value21','X');	 } else{}//L21- C 1
if ($ligne=22){ $document->setValue('Value22', 'X');	 } else{ $document->setValue('Value22', '');} //L22- C 1



} //fin foreach
//=========================================================================


//L14 - C 1
//L15 - C 1
//L16 - C 1
//L17 - C 1
//L18 - C 1
//L19 - C 1
//L20 - C 1
//L21 - C 1
//L22 - C 1



$document->setValue('date', 'Sun');
$document->setValue('myReplacedValue', 'dmldksklknlkn');
//======================================================================================================
//======================================================================================================

$document->setValue('weekday', date('l'));
$document->setValue('time', date('H:i'));

*/
$fichier ='Recap_rsci('.$DATE_achat.').docx';
   if( file_exists ($fichier)){
		unlink($fichier);
		$document->save('../Sauvegarde_sortie/Word/Recap_rsci('.$DATE_achat.').docx');
			//===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			$fichier ='Recap_rsci('.$DATE_achat.').docx';
			    Ajout_base ($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur); 
		    //=====================================================================================================
		}else{
		$document->save('../Sauvegarde_sortie/Word/Recap_rsci('.$DATE_achat.').docx');
		   //===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			   Ajout_base ($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur); 
		    //=====================================================================================================
		}



echo '<a href="Dossier_Rapport/Sauvegarde_sortie/Word/Recap_rsci('.$DATE_achat.').docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';

function Ajout_base ($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur) {
include "../connexionPDO.php";
		//===================================================================================================
			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
			//===================================================================================================
			$Date_sortie=date("Y-m-d");
			try{
					$res=$conx->prepare('INSERT INTO tab_suivi_export_fichier(Date_sortie,nom_fichier,session_utiliser,MISSION_ID,ENTREPRISE_ID,UTIL_ID)
					VALUES (:Date_sortie,:nom_fichier,:session_utiliser,:MISSION_ID,:ENTREPRISE_ID,:UTIL_ID )');
					$res->execute(array('Date_sortie'=>$Date_sortie,'nom_fichier'=>$fichier,'session_utiliser'=>$session_utiliser,'MISSION_ID'=>$ID_mission,'ENTREPRISE_ID'=>$ID_Entreprise,'UTIL_ID'=>$ID_Utilisateur ));
		       }catch(exception $e){}          
				//=====================================================================================================
}
//PRENDRE ENTREPRISE
function get_Entreprise ($ID_mission){
//include "../connex.php";

$sqlNbrPo=db_connect("SELECT ENTREPRISE_ID  FROM  tab_mission WHERE MISSION_ID='".$ID_mission."' " );
	foreach ($sqlNbrPo as $val){
	 $ID_entreprise = $val["ENTREPRISE_ID"];	
	}
return $ID_entreprise;
	}
	
	//PRENDRE L'UTILISATEUR
	function get_ID_utilisateur($mail_utilisateur){
$get_ID_util=db_connect("SELECT UTIL_ID  FROM tab_utilisateur WHERE UTIL_LOGIN ='".$mail_utilisateur ."' ");
foreach ($get_ID_util as $val){
$ID_utilisateur =$val['UTIL_ID'];
}
return $ID_utilisateur;
}
?>