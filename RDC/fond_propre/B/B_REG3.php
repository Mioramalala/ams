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
			
				$("#contenue").load("RDC/fond_propre/B/B_REG2.php");
			});
			
				$("#renvoiRevAn").click(function(){
					$("#CohGauche").load("RDC/fond_propre/B/Feuill_B3.php");
					
				});
				
				
				
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			REGULARITE DES ENREGISTREMENTS PARTIE III
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
								<li>Justifier les autres mouvements ayant affecté les FP depuis la clôture de l'exercice précédent</li>
								
							</ul>
							<b>Documents et infos à obtenir:</b>	
							<p>
								<ul>
									<li>Journal </li> 
									<li>Grand Livre </li> 
									
								</ul>
							</p>
							<p>
								<b>Questions / tests:</b>
								<ul>
									<li>Les opérations enregistrées concernant la classe 1 sont-elles justifiées ? </li>
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



