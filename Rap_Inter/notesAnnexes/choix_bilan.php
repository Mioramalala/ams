
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../css/RDC.css">
	<!-- <link rel="stylesheet" href="../../RA/css_RA.css"> -->
	<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
	<script>
		$(function(){

			// $("#creance").click(function(){
			// 	$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_creance.php?p=charge");
			// });
			$("#cappropre").click(function(){
				// text=$(this).text();
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p=fond");
			
			});
			$("#passifco").click(function(){
				// text=$(this).text();
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_passifco.php?p=passifco");
			
			});
			$("#provisionchrg").click(function(){
				// text=$(this).text();
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_provision.php?p=provision");
			
			});
			//=====================RETOUR======================//
			$("#ferme_retour").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_etat_fi.php");			
			});
		});	
	</script>
</head>
<body>
		<div id="GranTitre">Bilan passifs</div>
	<div id="titreIndex">
		<div id="fermeture_rsci">
			<a href="#"><img src="img/exit-retour.png" id="ferme_retour"></a>
		</div>
		<table>
			<tr class="label_Evaluation"  height="110">
				<td id="cappropre" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />CAPITAUX PROPRES</td>
				<td id="passifco" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />PASSIFS COURANTS</td>
				<td id="provisionchrg" class="choix_menu_rsci" ><img src="img/RDC/charges-fournisseurs.png" width="80px" />PROVISIONS POUR CHARGES</td>
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