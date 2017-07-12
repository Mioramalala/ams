<?php

/*session_start();
include "connex.php";
//REQUETE STRING


$mail_utilisateur = $_SESSION["user"]; 
get($mail_utilisateur);

function get($mail_utilisateur){
$get_ID_util=db_connect("SELECT UTIL_ID  FROM tab_utilisateur WHERE UTIL_LOGIN ='".$mail_utilisateur ."' ");
foreach ($get_ID_util as $val){
$ID_utilisateur =$val['UTIL_ID'];
}
$get_ID_mission=db_connect("SELECT nom_tache,MISSION_ID FROM tab_utilisateur u,tab_distribution_tache d
 WHERE u.UTIL_ID=d.UTIL_ID AND u.UTIL_ID ='".$ID_utilisateur."' ");

foreach ($get_ID_mission as $val_mission){
$nom_tache=$val_mission['nom_tache'];
$MISSION_ID=$val_mission['MISSION_ID'];
 if(empty($nom_tache) AND empty($MISSION_ID) ){
   echo '<option value="0">Pas de mission en cours.</option>';
	}else{
	echo '<option value="'.$MISSION_ID.'">'.$nom_tache.'</option><br>';
		}
}
return array($ID_utilisateur,$MISSION_ID);
}
*/
print 'tutu';
//$nom_fichier=$_FILES['monfichier']['name'];
//	echo "tutu";





?>