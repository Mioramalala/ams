<?php
	session_start();
	include '../../../connexion.php';

	if(isset($_FILES['fichier'])){
		
		$fichier = mysql_real_escape_string(htmlentities($_FILES['fichier']['name']));
		move_uploaded_file($_FILES['fichier']['tmp_name'], "fichier/".$fichier);
	}
?>
<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			textarea{width: 100%;height: 100%;font-size: 8pt;}
			input{width:100%;font-size: 8pt;}
		</style>
		<script>
			$(function(){
				$('#boutonAjout').click(function(){
					var compteur = parseInt($("#ajout").attr('alt'));
					var i = compteur + 1;
					$("#ajout").attr('alt',i);///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////Eto
					$('#ajout').append('<tr id="ligne'+ i +'"><td width="200px"><input type="text" placeholder="jj-mm-aaaa" id="date'+ i +'"/></td><td width="200px"><textarea id="police'+ i +'"></textarea></td><td width="200px"><textarea id="nature'+ i +'"></textarea></td><td width="200px"><input type="text" id="montant'+ i +'" /></td><td width="200px"><iframe style="display:none;" name="uploadFrame'+i+'"></iframe><form enctype="multipart/form-data" action="RDC/paie/paieC/TabDC1PP.php" method="POST" id="form'+i+'" target="uploadFrame'+i+'"><input type="hidden" name="MAX_FILE_SIZE" value="10485760" /><input type="file" id="fichier'+ i +'" name="fichier"/><input id="submit'+i+'" type="submit" value="Upload" /></form></td><td width="200px"><textarea id="comment'+ i +'"></textarea></td></tr>');
				});
				$('#boutonSupr').click(function(){
					var compteur = parseInt($("#ajout").attr('alt'));
					if (compteur != 0){
						var i = compteur - 1;

						$("#ajout").attr('alt',i);
						$('table#ajout tr:last-child').remove();
					}
				});
			});
		
		</script>
	</head>
	<body>

		<center>
			<p class="titreRenvoie">Etat récapitulatif des assurancences allouées aux membres du personnel</p>
		</center>
		<div class="cadre">
			<table class="h4">
				<tr class="sous-titre">
					<td width="200px">Date</td>
					<td width="200px">Police</td>
					<td width="200px">Nature assurance</td>
					<td width="200px">Montant</td>
					<td width="200px">Référence/Renvoi</td>
					<td width="200px">Commentaires</td>
				</tr>
			</table>
			<table class="h4" id="ajout" alt="0">
			</table>
			<input type="button" value="+" id="boutonAjout" class="bouton-pj" title="Ajout d'une ligne" />
			<input type="button" value="-" id="boutonSupr" class="bouton-pj"  title="Suppression de la dernière ligne"/>
		</div>
		
		
		
	<div id="fermer" style="display:none;"><center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>