<?php @session_start();
	
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
	</head>
	<body>
		<div id="GranTitre">
			COHERENCES ET PRINCIPES COMPTABLES PARTIE II
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
									<li>Prendre connaissance d'éventuelle augmentation ou réduction du capital</li>
								</ul>
								<b>Documents et infos à obtenir:</b>	
								<p>
									<ul>
										<li>Journal</li>
										<li>Grand livre </li>
										<li>Détails justifiant les IDA </li>
									</ul>
								</p>
								<p>
									<b>Questions / tests:</b>
									<ul>
										<li>Les registres sont-ils à jour et bien tenus ? </li>
										<li>Le principe de permanence des méthodes est-il régulièrement respecté?</li>
									
									</ul>
									
								</p>
								<p><label id="titrRev">Feuille de travail: </label>  <label id="renvoiRevAn">Revue analytique</label> </p>
							
						</div>
						
					</td>
					<td></td>
				</tr>
			</table>
		</div>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<script>
			$(function(){
				$("#retour").click(function(){
					$("#contenue").load("RDC/fond_propre/CohPriCo/cohProCom.php");
				});
				$("#renvoiRevAn").click(function(){
					$("#CohGauche").load("RDC/fond_propre/CohPriCo/TabRA2.php");
				});
			});
		
		</script>
	</body>
</html>



