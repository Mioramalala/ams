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
				
				$('#id_impotdoc1').click(function(){
					$('#progressbarDFin').show();
				});
				$('#id_impotdoc2').click(function(){
					$('#progressbarDFin').show();
				});
				$('#id_impotdoc3').click(function(){
					$('#progressbarDFin').show();
				});
				$('#id_impotdoc4').click(function(){
					$('#progressbarDFin').show();
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
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc1"/>
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
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc2" onclick=" uploader()"/>
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
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc3"/>
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
					<input type="submit" name="Importer2" value="Upload" id = "id_impotdoc4"/>
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
		<div id="progressbarDFin" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
	</div>
	</body>
</html>