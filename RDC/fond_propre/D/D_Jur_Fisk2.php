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
			
						$("#contenue").load("RDC/fond_propre/D/D_Jur_Fisk.php");
			});
			
				$("#renvoiRevAn").click(function(){
					$("#CohGauche").load("RDC/fond_propre/D/Feuill_D2.php");
					
				});
				
				
				
			});
		
		</script>
	</head>
	<body>
			<div id="GranTitre">
			JURIDIQUE,FISCAL ET DIVERS PARTIE II
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
								<li>Perte cumulée </li>
								<li>Distribution de dividendes </li>
								<li>Augmentation de capital en numéraires par apport en nature et consolidation des dettes </li>
								<li>Mise à jour des statuts </li>
								<li>Mise en harmonie des statuts avec la nouvelle loi </li>
								
							</ul>
							<b>Documents et infos à obtenir:</b>	
							<p>
								<ul>
									<li>PV CA</li>
									<li>AG statuant la décision de la continuité d'exploitation  </li>
									<li>Certificat de liquidité des créances </li>
									<li>Grand livre</li>
									<li>Statuts mis à jour</li>
									<li>PV AGE le cas échéant </li>
									
								</ul>
							</p>
							<p>
								<b>Question / test:</b>
								<ul>
									<li>Les procédures consécutives à la perte de la moitié du capital social sont-elles réalisées ? </li>
									<li>Les procédures consécutives à la perte de la moitié du capital social sont-elles réalisées ? </li>
									<li>Les dettes sont-elles liquides et exigibles? </li>
									<li>Les statuts sont-ils mis à jour consécutivement aux modifications survenues ? </li>
									<li>Les statuts sont-ils mis en harmonie avec la nouvelle loi sur les sociétés commerciales ? </li>
								</ul>
								
							</p>
							<p><label id="titrRev">Feuille de travail: </label>  <label id="renvoiRevAn">Suivi des procédures rélative à la perte de la moitié du capital social</label> </p>
						
					</div>
					
				</td>
				<td>
					
				</td>
			</tr>
		</table>
	</div>

	</body>
</html>



