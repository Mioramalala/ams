<!DOCTYPE html>
<?php
@session_start();
$mission_id=$_SESSION['idMission'];
?>

<html>
</html>
<body>
	<form method = "post" enctype="multipart/form-data" action = "uploader_fichier.php">
		<label style="color:blue;"><strong>Pièce justificative :</strong></label><br/>
		<input type = "file" id = "file_upload" name = "file_upload"/>
		<input type="submit" name="import" value="Upload" id = "id_impotdoc"/>
		<br/><br/>
	</form>
</body>