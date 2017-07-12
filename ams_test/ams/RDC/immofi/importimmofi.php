<?php 
$mission_id=@$_GET['mission_id'];
$importid=@$_GET['importid'];


if (is_uploaded_file($_FILES['file_Import_immofi']['tmp_name']))
{ 
	$NameFileko=$_FILES['file_Import_immofi']['name'];
	echo $NameFileko;
?>	
	
<?php	
	$loader=$_SERVER['DOCUMENT_ROOT']."/RA/immofi/".$NameFileko;
	$sourceDoc="/RA/immofi/".$NameFileko;
	$result= move_uploaded_file($_FILES['file_Import_immofi']['tmp_name'],$loader);
	if ($result != 1)
   { 
     die("Error uploading file.  Please try again");
   }
}

include '../../connexion.php';

$reponse=$bdd->exec('insert into tab_renvoie (RENVOIE_LIEN, MISSION_ID, RENVOIE_OBJECTIF, IMPORT_ID) VALUE ("'.$sourceDoc.'",'.$mission_id.',"immofi",'.$importid.')');

if(!$reponse) echo 'insert into tab_renvoie (RENVOIE_LIEN, MISSION_ID, RENVOIE_OBJECTIF, IMPORT_ID) VALUE ("'.$sourceDoc.'",'.$mission_id.',"immofi",'.$importid.')';
?>
