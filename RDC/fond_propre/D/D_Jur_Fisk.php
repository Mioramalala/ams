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
					$("#CohGauche").load("RDC/fond_propre/D/Feuill_D1.php");
					
				});
				
				
				
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			JURIDIQUE,FISCAL ET DIVERS PARTIE I
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
								<li>S'assurer du respect des dispositions légales et statutaires </li>
								
							</ul>
							<b>Documents et infos à obtenir:</b>	
							<p>
								<ul>
									<li>PV AGO </li>
									<li>statuts Mis à Jours</li>
								</ul>
							</p>
							<p>
								<b>Question / test:</b>
								<ul>
									<li>Les dispositions légales et statutaires relatives à des affaires sociales (droit des sociétés)</br>
									qui ont survenus au cours de l'exercice sont-elles respectées?  </li>
								</ul>
								
							</p>
							<p><label id="titrRev">Feuille de travail: </label>  <label id="renvoiRevAn">Formalité légales et statutaires</label> </p>
						
					</div>
					
				</td>
				<td>
					
				</td>
			</tr>
		</table>
	</div>

	</body>
</html>



