<?php 


?>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="../css/RDC.css">
	<script src="../js/jquery-1.7.2.js"></script>
	<script>
		$(function(){
			$("#fontRDC").click(function(){
				$("#contenue").load("RDC/fond_propre/accFP.php");			
			});
			
			$("#prodCliRRDC").click(function(){
				$("#contenue").load("RDC/prod_client/index.php");
			});
			$("#imoFiRDC").click(function(){
				$("#contenue").load("RDC/immofi/index.php");
			});
			
			$("#tresoRDC").click(function(){
				$("#contenue").load("RDC/tresorerie/index.php");			
			});
			$("#stockdRDC").click(function(){
				$("#contenue").load("RDC/stock/index.php");
			
			});
			$("#PaiPersRDC").click(function(){
				$("#contenue").load("RDC/paie/accPP.php");
			
			});
			$("#ChargeFourRDC").click(function(){
				$("#contenue").load("RDC/charge_fournisseur/index.php");
			});
			$("#imoCorpRDC").click(function(){
				$("#contenue").load("RDC/immobilisationCorpIncorp/index.php");
			});
			$("#DebCreRDC").click(function(){				
				$("#contenue").load("RDC/DCD/index.php");
			});
			$("#PaiPersRDC").click(function(){
			$("#contenue").load("RDC/paie/accPP.php");
		   });
		   $("#ImpoTaxRDC").click(function(){
			$("#contenue").load("RDC/impot/accIT.php");
		   });
		   $("#EmprunDetRDC").click(function(){
			$("#contenue").load("RDC/emprunt/accED.php");
		   });
		});	
	</script>
</head>
<body>
	<div id="titreIndex">
		<div id="fermeture_rsci">
			<a href="accueil.php"><img src="img/exit-retour.png" id="ferme_retour_acceuil"></a>
		</div>
		<table>
			<tr>
				<td id="fontRDC" class="choix_menu_rsci" onClick="CycleProcess(this.id)"><img src="img/RDC/fonds-propre.png" width="80px" />Fonds propres</td>
				<td id="imoCorpRDC" class="choix_menu_rsci" onClick="CycleProcess(this.id)"><img src="img/RDC/imobolisation.png" width="80px" />Immobilisations corporelles et incorporelles </td>
				<td id="prodCliRRDC" class="choix_menu_rsci" onClick="CycleProcess(this.id)"><img src="img/RDC/produit-client.png" width="80px" />Produits clients</td>
			</tr>
			<tr>
				<td id="tresoRDC" class="choix_menu_rsci" onClick="CycleProcess(this.id)"><img src="img/RDC/tresorerie.png" width="80px" />Trésorerie</td>
				<td id="stockdRDC" class="choix_menu_rsci" onClick="CycleProcess(this.id)"><img src="img/RDC/stock.png" width="80px" />Stocks</td>
				<td id="ChargeFourRDC" class="choix_menu_rsci" onClick="CycleProcess(this.id)"><img src="img/RDC/charges-fournisseurs.png" width="80px" />Charges fournisseurs</td>
			</tr>
			<tr>
				<td id="imoFiRDC" class="choix_menu_rsci" onClick="CycleProcess(this.id)"><img src="img/RDC/imobolisation.png" width="80px" />Immobilisations financières</td>
				<td id="PaiPersRDC" class="choix_menu_rsci" onClick="CycleProcess(this.id)"><img src="img/RDC/paie-et-personnel.png" width="80px" />Paie et personnel</td>
				<td id="ImpoTaxRDC" class="choix_menu_rsci" onClick="CycleProcess(this.id)"><img src="img/RDC/impots-taxe.png" width="80px" >Impôts et taxes</td>
			</tr>
			<tr>
				<td id="EmprunDetRDC" class="choix_menu_rsci" onClick="CycleProcess(this.id)"><img src="img/RDC/dette-emprunt.png" width="80px" />Emprunts et dettes financières</td>
				<td id="DebCreRDC" class="choix_menu_rsci" onClick="CycleProcess(this.id)"><img src="img/RDC/debiteur-crediteur.png" width="80px" />Débiteurs et créditeurs divers</td>
			</tr>
		</table>
	</div>
	<!----------------------------------------deconnexion--------------------------------------------------------------->    
      <div id="fermer" style="display:none;">
       <center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
</body>