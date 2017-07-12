
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../css/RDC.css">
	<!-- <link rel="stylesheet" href="../../RA/css_RA.css"> -->
	<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
	<script>
		$(function(){
			$("#immofi").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_immo.php?p=immofi");
			});
			$("#imoinCorp").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_immo.php?p=immoinco");
			});
			$("#imoCorp").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/immoco.php?p=immoco");
			});
			
			$("#immocours").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_immocours.php?p=immocours");		
			});
			$("#stockdRDC").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_stock.php?p=stock");
			
			});
			
			$("#creance").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_creance.php?p=charge");
			});
			$("#impots").click(function(){
				alert("Cette cycle est en cours d'élaboration.");
			
			});

			$("#tresoRDC").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_tresorerie.php?p=tresorerie");
			
			});
			//=====================RETOUR======================//
			$("#ferme_retour").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_etat_fi.php");			
			});
		});	
	</script>
</head>
<body>
		<div id="GranTitre">Bilan Actifs</div>
	<div id="titreIndex">
		<div id="fermeture_rsci">
			<a href="#"><img src="img/exit-retour.png" id="ferme_retour"></a>
		</div>
		<table>
			<tr class="label_Evaluation"  height="110">
				<td id="imoinCorp" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />IMMOBILISATIONS INCORPORELLES</td>
				<td id="imoCorp" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />IMMOBILISATIONS CORPORELLES </td>
				<td id="immocours" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />IMMOBILISATIONS EN COURS </td>
			</tr>
			<tr class="label_Evaluation"  height="110">
				<td id="immofi" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />IMMOBILISATIONS FINANCIERES</td>
				<td id="impots" class="choix_menu_rsci" ><img src="img/RDC/fonds-propre.png" width="80px" />IMPOTS DIFFERES ACTIF</td>
				<td id="stockdRDC" class="choix_menu_rsci" ><img src="img/RDC/stock.png" width="80px" />STOCKS</td>

			</tr>
			<tr class="label_Evaluation"  height="110">
				<td id="creance" class="choix_menu_rsci" ><img src="img/RDC/charges-fournisseurs.png" width="80px" />CREANCES ET EMPLOIS ASSIMILES</td>
				<td id="tresoRDC" class="choix_menu_rsci" ><img src="img/RDC/tresorerie.png" width="80px" />TRESORERIE</td>
				<td id="" class="" onClick="">&nbsp;</td>
			</tr>
		</table>
	</div>
	<!-- --------------------------------------deconnexion------------------------------------------------------------- -->    
      <div id="fermer" style="display:none;">
       <center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
</body>