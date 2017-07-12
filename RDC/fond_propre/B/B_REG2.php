<?php @session_start();
	
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<!--<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script> -->
		<script>
			$(function()
			{
			
							$("#retour").click(function(){
							
								$("#contenue").load("RDC/fond_propre/B/B_Reg_Eng.php");
							});
							
						$("#renvoiRevAn").click(function(){
						//	alert("TAFA RENVOIE?");
							$("#CohGauche").load("RDC/fond_propre/B/Feuill_B2.php");

							});;
					
			});
				
				
				
			
		
		</script>
	</head>
	<body>
				<div id="GranTitre">
			REGULARITE DES ENREGISTREMENTS PARTIE II
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
								<li>Vérifier la régularité de la procédure de distribution des dividendes et/ou d'octroi d'acompte</li>
								
							</ul>
							<b>Documents et infos à obtenir:</b>	
							<p>
								<ul>
									<li>Statuts mis à jour</li> 
									<li>PV AGE le cas échéant</li>
									<li>Etats financiers intermédiaires certifiés par un CAC + PV AGO</li>
								</ul>
							</p>
							<p>
								<b>Questions / tests:</b>
								<ul>
									<li>Les conditions requises pour pouvoir distribuer des dividendes sont-elles remplies? </li>
									<li>Les formalités relatives à l'octroi d'acompte sur dividendes sont-elles bien ? </li>
								</ul>
								
							</p>
							<p><label id="titrRev">Feuille de travail: </label>  <label id="renvoiRevAn">Respect des conditions de distribution et des avances sur dividendes</label> </p>
						
					</div>
					
				</td>
				<td>
					
				</td>
			</tr>
		</table>
	</div>

	</body>
</html>



