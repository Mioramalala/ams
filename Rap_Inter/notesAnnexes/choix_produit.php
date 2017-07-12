
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../css/RDC.css">
	<!-- <link rel="stylesheet" href="../../RA/css_RA.css"> -->
	<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
	<script>
		$(function(){

			$("#pdxfi").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p=pdxfi");	
			
			});
			$("#autrespdx").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p=autrespdx");	
			
			});
			$("#chiffreaf").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p=chiffreaf");				
			});
			$("#statefi").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/statefiscale.php");				
			});
			//=====================RETOUR======================//
			$("#ferme_retour").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_etat_fi.php");			
			});
		});	
	</script>
</head>
<body>
		<div id="GranTitre">Produits</div>
	<div id="titreIndex">
		<div id="fermeture_rsci">
			<a href="#"><img src="img/exit-retour.png" id="ferme_retour"></a>
		</div>
		<table>
			<tr class="label_Evaluation"  height="110">
				<td id="chiffreaf" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />CHIFFRE D’AFFAIRES</td> 
				<td id="pdxfi" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />PRODUITS FINANCIERS</td> 
			</tr>
			<tr class="label_Evaluation"  height="110">
				<td id="autrespdx" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />AUTRES PRODUITS OPERATIONNELS</td> 
				<td id="statefi" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />SITUATION FISCALE</td>
			</tr>
		</table>
	</div>
</body>