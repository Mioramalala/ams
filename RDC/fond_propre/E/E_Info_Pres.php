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
					$("#CohGauche").load("RDC/fond_propre/E/Feuill_E.php");
					
				});
				
				
				
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			INFORMATION ET PRESENTATION
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
								<li>Vérifier l'existence d'évènements post clôture</li>
								
							</ul>
							<b>Documents et infos à obtenir:</b>	
							<p>
								<ul>
									<li>PV AGE décidant une augmentation de capital</li>
								</ul>
							</p>
							<p>
								<b>Question / test:</b>
								<ul>
									<li>Toutes les informations devant être portées dans les annexes sont-elles bien recensées ? </li>
								</ul>
								
							</p>
							<p><label id="titrRev">Feuille de travail: </label>  <label id="renvoiRevAn">Element en annexes</label> </p>
						
					</div>
					
				</td>
				<td>
					
				</td>
			</tr>
		</table>
	</div>

	</body>
</html>



