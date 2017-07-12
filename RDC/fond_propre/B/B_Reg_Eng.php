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
					$("#CohGauche").load("RDC/fond_propre/B/Feuill_B1.php");
					
				});
				
				
				
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			REGULARITE DES ENREGISTREMENTS PARTIE I
		</div>
		
		
		<!--div id="btn"><label id="enregistre">Enregistrer</label></div-->
	<div id="CohGauche">
	
	<div class="btn"  id="retour"> |< </div>
		<table style="float:left;">
			
			<tr>
				<td>
					<div id="ContenueCoh">
					
							<label><b>Travaux à faire:</b></label>
							<ul>
								<li>Contrôler le mode et la régulaité de l'affectation du résultat de l'exercice précédent</li>
								
							</ul>
							<b>Documents et infos à obtenir:</b>	
							<p>
								<ul>
									<li>PV du CA et de l'AGO approuvant les comptes et de l'affectaton du résultat</li>
								</ul>
							</p>
							<p>
								<b>Questions / tests:</b>
								<ul>
									<li>Les formalités légales et statutaires d'approbation des comptes sont-elles bien respectées? </li>
								</ul>
								
							</p>
							<p><label id="titrRev">Feuille de travail: </label>  <label id="renvoiRevAn">Formalités légales et statutaires</label> </p>
						
					</div>
					
				</td>
				<td>
					
				</td>
			</tr>
		</table>
	</div>

	</body>
</html>



