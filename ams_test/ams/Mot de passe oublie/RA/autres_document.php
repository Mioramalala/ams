<!DOCTYPE html>
<?php
$mission_id=@$_GET['mission_id'];

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<script type="text/javascript" src="js_menue.js"></script>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">
			$(function(){
				$('#dv_retour1').click(function(){
					$('#contenue').load('RA/index.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			
				// $(function(){
				$('#dv_autres').click(function(){
				//alert('autres');
					$('#contenue').load('./RA/autre.php?mission_id='+<?php echo $mission_id;?>);			
				});
			});
		
		</script>
	</head>
	
	<body>
	<br/><br/><br/><br/>
		<table>
		<tr>
			<td>
				<label>Balance âgée :</label>
			</td>
			<td>
				<form method = "post" enctype="multipart/form-data" action = "RA/import_Excel.php">
					<input type = "file"  accept="application/vnd.ms-excel" id = "file_Import" name = "file_Import"/>
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc"/>
					<br/><br/>
				</form>
			</td>
		</tr>
		<tr>
			<td>
				<label>Bilan :</label>
			</td>
								
			<td>
				<form method = "post" enctype="multipart/form-data" action = "RA/import_Excel.php">
					<input type = "file" accept="application/vnd.ms-excel" id = "file_Import" name = "file_Import"/>
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc" onclick=" uploader()"/>
					<br/><br/>
				</form>
			</td>
		</tr>
		
		<tr>
			<td>
				<label>Compte de résultats :</label>
			</td>
			<td>
				<form method = "post" enctype="multipart/form-data" action = "RA/import_Excel.php">
					<input type = "file" accept="application/vnd.ms-excel" id = "file_Import" name = "file_Import"/>
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc"/>
					<br/><br/>
				</form>
			</td>
		</tr>
		
		<tr>
			<td>
				<label>Tableau d’amortissement :</label>
			</td>
			<td>
				<form method = "post" enctype="multipart/form-data" action = "RA/import_Excel.php">
					<input type = "file" accept="application/vnd.ms-excel" id = "file_Import" name = "file_Import"/>
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc"/>
					<br/><br/>
				</form>
			</td>
		</tr>
		
		<tr>
			<td>
				<input type = "button" id = "dv_autres" value = "Autres" />
				<input type = "button" id = "dv_retour1" value = "Retour"/>							
			</td>
		</tr>
		</table>
	</body>
</html>