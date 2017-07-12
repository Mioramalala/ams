<?php
	@session_start();
	$_SESSION['processus'] = 'Revue Analytique';
	$mission_id            = $_GET['mission_id'];
?>

<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<style type="text/css">
			a {
				text-decoration: none;color: #919191;
			};
		</style>
		<script type="text/javascript">
			$(function(){
				$('#raparcycle').click(function(){
					$('#progressbarRA').show();
				});
			});
		</script>
	</head>
	
	<body>
		<div id="dv_donnees_financiers_RA">
			<input type="text" id="missId" value="<?php echo $mission_id;?>" style="display:none;" />
			<div id="fermeture_rsci">
				<a href="accueil.php"><img src="img/exit-retour.png" id="ferme_retour_acceuil"></a>
			</div>
			<table >

				<!-- <tr>
					<td class="choix_menu_rsci" id="DOF" onClick="CycleProcess(this.id)"><input type="text" id="missId" value="<?php echo $mission_id;?>" style="display:none;" />
						<a href = "javascript:click_sousMenueREvue('/RA/donnees_financiers.php',$('#missId').val())">
							<img src="img/RA/donneefinancieres.png" />
							Données Financières
						</a>	
					</td>
					<td class="choix_menu_rsci" id="RPC" onClick="CycleProcess(this.id)">
						<a href = "javascript:click_sousMenueREvue('/RA/revue.php',$('#missId').val())">
							<img src="img/RA/revues-par-cycle.png" />
							Revue par cycle
						</a>
					</td>
					
				</tr>
				<tr>
					<td class="choix_menu_rsci" id="SI" onClick="CycleProcess(this.id)">
						<a href = "javascript:click_sousMenueREvue('/RA/structure.php',$('#missId').val())">
							<img src="img/RA/synthese.png" />
							Synthèse RSCI
						</a>
					</td>
					<td class="choix_menu_rsci" id="PLA" onClick="CycleProcess(this.id)">
						<a href = "javascript:click_sousMenueREvue('/RA/planification/planification.php',$('#missId').val())">
							<img src="img/RA/planification.png" />
							Planification
						</a>
					</td>
					
				</tr>
				<tr >
					<td class="choix_menu_rsci" id="CIR" onClick="CycleProcess(this.id)">
						<a href = "javascript:click_sousMenueREvue('/RA/circularisation/circularisation.php',$('#missId').val())">
							<img src="img/RA/circularisation.png" />
							Circularisation
						</a>
					</td>
					<td>
					</td>					
				</tr> -->



<!-- ******************************************************************************************************************************************************************************************* -->



				<tr>
					<td class="choix_menu_rsci" id="DOF" onClick="CycleProcess(this.id)"><input type="text" id="missId" value="<?php echo $mission_id;?>" style="display:none;" />
						<a href = "javascript:click_sousMenueREvue('/RA/donnees_financiers.php',$('#missId').val())">
							<img src="img/RA/donneefinancieres.png" />
							Données Financières
						</a>	
					</td>

					<!-- <td class="choix_menu_rsci" id="RPC" onClick="CycleProcess(this.id)">
						<a href = "javascript:click_sousMenueREvue('/RA/revue.php',$('#missId').val())">
							<img src="img/RA/revues-par-cycle.png" />
							Revue par cycle
						</a>
					</td> -->
					
					<td class="choix_menu_rsci" id="SI" onClick="CycleProcess(this.id)">
						<a href = "javascript:click_sousMenueREvue('/RA/structure.php',$('#missId').val())">
							<img src="img/RA/synthese.png" />
							Synthèse RSCI
						</a>
					</td>
					
				</tr>
				<tr>
					<!-- <td class="choix_menu_rsci" id="SI" onClick="CycleProcess(this.id)">
						<a href = "javascript:click_sousMenueREvue('/RA/structure.php',$('#missId').val())">
							<img src="img/RA/synthese.png" />
							Synthèse RSCI
						</a>
					</td> -->

					<td class="choix_menu_rsci" id="RPC" onClick="CycleProcess(this.id)">
						<a href = "javascript:click_sousMenueREvue('/RA/revue.php',$('#missId').val())">
							<img src="img/RA/revues-par-cycle.png" />
							Revue par cycle
						</a>
					</td>


					<td class="choix_menu_rsci" id="PLA" onClick="CycleProcess(this.id)">
						<a href = "javascript:click_sousMenueREvue('/RA/planification/planification.php',$('#missId').val())">
							<img src="img/RA/planification.png" />
							Planification
						</a>
					</td>
					
				</tr>
				<tr>
					<td class="choix_menu_rsci" id="CIR" onClick="CycleProcess(this.id)">
						<a href = "javascript:click_sousMenueREvue('/RA/circularisation/circularisation.php',$('#missId').val())">
							<img src="img/RA/circularisation.png" />
							Circularisation
						</a>
					</td>
					<td>
					</td>					
				</tr>

			
			</table>
		</div>
			<div id="progressbarRA" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
			<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
		</div>
		<!---------------------------------------- deconnexion --------------------------------------------------------------->    
			<div id="fermer" style="display:none;">
			<center>
				<p> Voulez vous vraiment fermer l'application ?</p>
				<p>
					<input type="button" value="Valider" id="okferme"/>
				</p>
			</center>
		</div>
		<!------------------------------------------------------------------------------------------------------->
	</body>
</html>