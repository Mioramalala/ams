
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../css/RDC.css">
	<!-- <link rel="stylesheet" href="../../RA/css_RA.css"> -->
	<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
	<script>
		$(function(){

			$("#provision").click(function(){
				text=$(this).text();
				alert("La page "+text+" est en cours d'élaboration.");
			
			});
			$("#chrgpers").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p=chrgpers");	
			
			});
			$("#impottax").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p=impottax");	
			
			});

			$("#achatsco").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p=achatsco");	
			
			});
			$("#srvext").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p=srvext");	
			
			});
			$("#autreschrgope").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p=autreschrgope");
			
			});
			$("#chrgfi").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/gen_tableau/rub_cappropre.php?p=chrgfi");
			
			});

			//=====================RETOUR======================//
			$("#ferme_retour").click(function(){
				$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_etat_fi.php");			
			});
		});	
	</script>
</head>
<body>
		<div id="GranTitre">Charges</div>
	<div id="titreIndex">
		<div id="fermeture_rsci">
			<a href="#"><img src="img/exit-retour.png" id="ferme_retour"></a>
		</div>
		<table>
			<tr class="label_Evaluation"  height="110">
				<td id="achatsco" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />ACHATS CONSOMMES </td>
				<td id="srvext" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />SERVICES EXTERIEURS ET AUTRES CONSOMMATIONS</td>
				<td id="chrgpers" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />CHARGES DE PERSONNEL</td>
			</tr>
			<tr class="label_Evaluation"  height="110">
				<td id="impottax" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />IMPOTS ET TAXES</td>
				<td id="autreschrgope" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />AUTRES CHARGES OPERATIONNELLES</td>
				<td id="chrgfi" class="choix_menu_rsci" ><img src="img/RDC/imobolisation.png" width="80px" />CHARGES FINANCIERES</td>

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