<!DOCTYPE html>
<html>
<head></head>
<body>
<form method="post" enctype="multipart/form-data" action="insertDoc.php">
		<p><input type="file" id="docNom" name="docNom"/></p>
		<input type="text" value="<?php echo $_GET['denomination'];?>" name="txt1_identreprise"/>
		<input type="submit" value="Sauvegarder" id="btnInsererDoc" name="btnInsererDoc"/>
	</form>
</body>
</html>