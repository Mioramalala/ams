<?php @session_start();
	
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<script>
			$(function(){
			
			$("#retour").click(function(){
			
				$("#contenue").load("RDC/fond_propre/accFP.php");
			});
			
				$("#renvoiRevAn").click(function(){
					$("#CohGauche").load("RDC/fond_propre/C/Feuill_C1.php");
					
				});
				
				
				
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			EXISTENCE DES SOLDES PARTIE I
		</div>
		
		
		<!--div id="btn"><label id="enregistre">Enregistrer</label></div-->
	<div id="CohGauche">
	
	<div class="btn"  id="retour"> < </div>
		<table style="float:left;">
			
			<tr>
				<td>
					<div id="ContenueCoh">
					
							<label><b>Travaux à faire:</b></label>
							<ul>
								<li>Contrôler la justification des différents soldes constituant le capital</li>
								
							</ul>
							<b>Documents et infos à obtenir:</b>	
							<p>
								<ul>
									<li>Grand livre des comptes classe 1 (toutes les écritures)</li>
								</ul>
							</p>
							<p>
								<b>Question / test:</b>
								<ul>
									<li>Les soldes des comptes de la classe 1 (hors emprunts) sont-ils justifiés ? </li>
								</ul>
								
							</p>
							<p><label id="titrRev">Feuille de travail: </label>  <label id="renvoiRevAn">Justification des soldes de la "Classe 1"</label> </p>
						
					</div>
					
				</td>
				<td>
					
				</td>
			</tr>
		</table>
	</div>

	</body>
</html>



