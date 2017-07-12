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
					$("#CohGauche").load("RDC/fond_propre/CohPriCo/TabRA.php");
					
				});
				
				
				
			});
		
		</script>
	</head>
	<body>
	
		<div id="GranTitre">
			OBJECTIF COHERENCES ET PRINCIPES COMPTABLES PARTIE I
		</div>
		
		
		<!--div id="btn"><label id="enregistre">Enregistrer</label></div-->
	<div id="CohGauche">
	<div class="btn"  id="retour">|<</div>
		<table style="float:left;">
			
			<tr>
				<td>
					<div id="ContenueCoh">
					
							<label><b>Travaux à faire:</b></label>
							<ul>
								<li>Analyser la variation des postes par rapport aux exercices précédents</li>
								<li>Prendre connaissance d'éventuelle augmentation ou réduction du capital</li>
							</ul>
							<b>Documents et infos à obtenir:</b>	
							<p>
								<ul>
									<li>Etats financiers</li>
									<li>balance générale des exercices précédents</li>
								</ul>
							</p>
							<p>
								<b>Questions / tests:</b>
								<ul>
									<li>Avez-vous réalisé une revue analytique ?  </li>
									<li>Cette revue a-t-elle fait l'objet d'une analyse?</li>
								</ul>
								
							</p>
							<p><label id="titrRev">Feuille de travail: </label>  <label id="renvoiRevAn">Revue Analytique</label> </p>
						
					</div>
					
				</td>
				<td>
					
				</td>
			</tr>
		</table>
	</div>

	</body>
</html>



