<?php 
session_start();
$mission_id=@$_GET['mission_id'];
$importid=@$_GET['importid'];


if (is_uploaded_file($_FILES['file_Import_stock']['tmp_name']))
{ 
	$NameFileko=$_SESSION['nom_entreprise'].$mission_id.$_FILES['file_Import_stock']['name'];
	echo $NameFileko;

	$loader=$_SERVER['DOCUMENT_ROOT']."/RA/stock/uploads/".$NameFileko;
	$sourceDoc="/RA/stock/uploads/".$NameFileko;
	$result= move_uploaded_file($_FILES['file_Import_stock']['tmp_name'],$loader);
	if ($result != 1)
   { 
     die("Error uploading file.  Please try again");
   }

   	include '../../connexion.php';

	$reponse=$bdd->exec('insert into tab_renvoie (RENVOIE_LIEN, MISSION_ID, RENVOIE_OBJECTIF, IMPORT_ID) VALUE ("'.$sourceDoc.'",'.$mission_id.',"stock",'.$importid.')');

	if(!$reponse) echo 'insert into tab_renvoie (RENVOIE_LIEN, MISSION_ID, RENVOIE_OBJECTIF, IMPORT_ID) VALUE ("'.$sourceDoc.'",'.$mission_id.',"stoock",'.$importid.')';

}
else{
	echo "Fichier non uploade";
}

?>
