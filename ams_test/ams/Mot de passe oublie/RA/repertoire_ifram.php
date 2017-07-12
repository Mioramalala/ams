<!DOCTYPE html>
<?php
$mission_id=$_GET['mission_id'];
?>
<html>	
	<head>
	<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="js_menue.js"></script>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">
			$(function(){
				$('#dv_retourko').click(function(){
				 //alert('coco');
				parent.window.$('#contenue').load('./RA/index.php');			
				});
			});
			
			function Ajout(){
			alert('Document bien enregistré');
			var documents_autres=document.getElementById('txt_document').value;
			$.ajax({
				type:'POST',
				url:'RA/_fenetre_uploadifram.php',
				data:{documents_autres:documents_autres},
					success:function(e){
						parent.window.$('#contenue').load('./RA/index.php');	
					}
			});
			}
		</script>
	</head>
	<body>
		<form method = "GET" enctype="multipart/form-data" action = "repertoire.php">
		<br/>
			<label>Nom du document:</label>
			<input type = "text" id="txt_document"/>
			<input type = "file" accept="application/vnd.ms-excel" id = "file_Import_autre" name = "file_Import_autre"/>
			<input type="submit" name="Importer_autre" value="Upload" id = "id_impotdoc1"/>
			<input class = "cl_btAjouter" id="id_ajout" type = "button" name = "btAjouter" value ="+" onclick= "Ajout();"/>
			<input class = "cl_btAnnuler" type = "reset" name = "btAnnuler" value ="-" ></br>
			<center><input type = "button" id = "dv_retourko" value = "Retour"/></center>							
			<br/><br/>
		</form>
	</body>
</html>