<?php 
session_start();
$mission_id=@$_GET['mission_id'];
$importid=@$_GET['importid'];


if (is_uploaded_file($_FILES['file_Import_fond']['tmp_name']))
{ 
	$NameFileko=$_SESSION['nom_entreprise'].$mission_id.$_FILES['file_Import_fond']['name'];
	echo $NameFileko;
?>	
	
<?php	
	$loader=$_SERVER['DOCUMENT_ROOT']."/RA/fond/uploads/".$NameFileko;
	$sourceDoc="/RA/fond/uploads/".$NameFileko;
	$result= move_uploaded_file($_FILES['file_Import_fond']['tmp_name'],$loader);
	if ($result != 1)
   { 
     die("Error uploading file.  Please try again");
   }
}

include '../../connexion.php';

$reponse=$bdd->exec('insert into tab_renvoie (RENVOIE_LIEN, MISSION_ID, RENVOIE_OBJECTIF, IMPORT_ID) VALUE ("'.$sourceDoc.'",'.$mission_id.',"emprunt",'.$importid.')');

if(!$reponse) echo 'insert into tab_renvoie (RENVOIE_LIEN, MISSION_ID, RENVOIE_OBJECTIF, IMPORT_ID) VALUE ("'.$sourceDoc.'",'.$mission_id.',"emprunt",'.$importid.')';
?>
<?php 
$mission_id=@$_GET['mission_id'];
$importid=@$_GET['importid'];


if (is_uploaded_file($_FILES['file_Import_fond']['tmp_name']))
{ 
	$NameFileko=$_FILES['file_Import_fond']['name'];
	echo $NameFileko;
?>	
	
<?php	
	$loader=$_SERVER['DOCUMENT_ROOT']."/RA/fond/".$NameFileko;
	$sourceDoc="/RA/fond/".$NameFileko;
	$result= move_uploaded_file($_FILES['file_Import_fond']['tmp_name'],$loader);
	if ($result != 1)
   { 
     die("Error uploading file.  Please try again");
   }
}

include '../../connexion.php';

$reponse=$bdd->exec('insert into tab_renvoie (RENVOIE_LIEN, MISSION_ID, RENVOIE_OBJECTIF, IMPORT_ID) VALUES ("'.$sourceDoc.'",'.$mission_id.',"fond",'.$importid.')');

if(!$reponse) echo 'insert into tab_renvoie (RENVOIE_LIEN, MISSION_ID, RENVOIE_OBJECTIF, IMPORT_ID) VALUES ("'.$sourceDoc.'",'.$mission_id.',"fond",'.$importid.')';
 																								
?>