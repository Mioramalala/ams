<?php 
$mission_id=@$_GET['mission_id'];

if (is_uploaded_file($_FILES['file_upload']['tmp_name']))
{ 
	$NameFileko=$_FILES['file_upload']['name'];
	
	echo $NameFileko;
?>	

<?php	
	$loader=$_SERVER['DOCUMENT_ROOT']."/RDC/prod_client/archive/".$NameFileko;
	$sourceDoc="/RDC/prod_client/archive/".$NameFileko;
	$result= move_uploaded_file($_FILES['file_upload']['tmp_name'],$loader);
	if ($result != 1)
   { 
     die("Error uploading file.  Please try again");
   }
}
?>