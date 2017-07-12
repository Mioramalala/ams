<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../../../css/RDC.css"/>
	<link rel="stylesheet" href="../../../css/css.css"/>
	<link rel="stylesheet" href="../RDC/paie/paie.css"/>
	<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
	<script>
		$(function(){
			$("#fileUpload").click(function(){
				$("#file").click();
			});
		
		});
	
	</script>
</head>
<body>

<!--<input type="button" id="btn_retD1PP" value="Miverina"/>-->
	<center>
	<p class="titreRenvoie">
		Pièce justificative		
	</p>
	</center>

	<div class="cadre">
		<center><form action="" method="POST" enctype="multipart/form-data">
			<label>Pièce justificative : </label><span id="loading"></span>
			<input type="file" class="fileUpload" id="file" name="upload" title="Fichier justificatif" /><br /><br />
			<input type="button" class="bouton-pj" value="Confirmer" id="fileUpload"/>
		</form></center>
	</div>
		
		
<div id="fermer" style="display:none;"><center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>