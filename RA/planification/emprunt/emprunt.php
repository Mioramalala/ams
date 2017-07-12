<?php
    include './../../../connexion.php';
   	include '../fonctions_planif.php';
 @session_start();
 $mission_id=@$_SESSION['idMission'];
?>
<html>
	<head>
		<link rel = "stylesheet" href = "../RA/planification/fond/css_planif.css"/>
		<script>
			// Droit cycle by Tolotra
	        // Page : RDC -> EMPRUNTS ET DETTES FINANCIERES
	        // Tâche : EMPRUNTS ET DETTES FINANCIERES, 54
	        $.ajax(
	            {
	                type: 'POST',
	                url: 'droitCycle.php',
	                data: {task_id: 54},
	                success: function (e) {
	                    var result = 0 === Number(e);
	                    $("#save_modif").attr('disabled', result);
	                    $("#save_modif").css({
	                        "color": "#FFF",
	                        "background-color": "#BBB",
	                    });
	                }
	            }
	        );
			$(function() {
					$.ajax({
						type:'POST',
						url:'RA/planification/checkValidation.php',
						data:{cycle:'emprunt'},
						success:function(e){
							if(e==="disable"){
								$("#dv_fond textarea").attr("disabled", true);
							}
						}
					});
			});
			
			function enregistrer_emprunt(){
				//alert("eto");
				var fonction=$('#fonct').val();
				var compte=$('#cpt').val();	
				var planif_gen=$('#planif_gen').val();	
				var seuil_sign=$('#seuil_sign').val();	
				var taux_sondage=$('#taux_sondage').val();	
				
				var mission_id=<?php echo $mission_id;?>;
				/*$.get("droitAccUtil.php",function (e)
				{
					//DEBUT GET
					if(e!=0)
					{*/
				
						$.ajax({
									type:'POST',
									url:'RA/planification/emprunt/enregistreremprunt.php',
									data:{fonction:fonction,compte:compte,planif_gen:planif_gen,seuil_sign:seuil_sign,taux_sondage:taux_sondage,mission_id:mission_id},
										success:function(e){
											 alert('EMPRUNTS et DETTES bien enregistr\351s');
									$('#contenue').load('/RA/planification/planification.php?mission_id='+<?php echo $mission_id;?>);	
										}
							 });
							 
					/*}	
					else
					{
							   alert("Vous n'êtes pas autorisé!");
							   return false;
					}//FIN else
					
				});//FIN GET
				*/			 
							 
							 
							 
			 
			}
			function retour_emprunt(){
				$('#contenue').load('/RA/planification/planification.php?mission_id='+<?php echo $mission_id;?>);
			}
			
		</script>
	</head>
	<body>
		<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
				<tr>
					<td style="color:white"><center>EMPRUNTS ET DETTES</center></td>
				</tr>
		</table>
		<div id="dv_fond">
			<div id="dv_fond_planif1">
				<table class="fond1">
					<tr>
						<td class="td_fond"><p class="titre" style="color:blue;">INCIDENCES</p>
							<p id="ligne"></p>
							<p class="td_fond2">Fonctions:</p>
							<?php 
								$reponse=$bdd->query("select FONCTIONNEMENT,CYCLE from tab_incidence_ra where CYCLE='J' AND MISSION_ID=".$mission_id);
									while($donnees=$reponse->fetch()){
									$fonct=$donnees['FONCTIONNEMENT'];
								?>
								<textarea rows="5px" cols="70px" id="fonct"><?php echo $fonct;?>
								</textarea>
						  <?php } ?>
					</tr>
					<tr>
						<td ><p class="td_fond2">Comptes:</p>
						<?php 
							$reponse=$bdd->query("select COMPTE,CYCLE from tab_incidence_ra where CYCLE='J' AND MISSION_ID=".$mission_id);
								while($donnees=$reponse->fetch()){
								$cpt=$donnees['COMPTE'];
							?>
							<textarea rows="5px" cols="70px" id="cpt"><?php echo $cpt;?>
							 </textarea>
						 <?php } ?>
						</td>
						
					</tr>
				</table>
			</div>
			<div id="dv_fond_planif2">
				<table class="fond2">
					<tr>
						<td class="td_fond"><p class="titre" style="color:blue;">PLANIFICATION EMPRUNT ET DETTE</p>
							<p id="ligne"></p>
							<p class="td_fond2">Planification par cycle :
							<textarea rows="2px" cols="70px" id="planif_gen" placeholder="Rédiger ici votre planification des emprunts et dettes">
								<?php echo getPlanif("emprunt", $mission_id); ?>
							</textarea>
							</p>
					</tr>
					<tr>
						<td ><p class="td_fond2">Seuil de signification:
						<textarea rows="2px" cols="70px" id="seuil_sign" placeholder="Rédiger ici votre seuil de signification">
							<?php echo getSeuil("emprunt", $mission_id); ?>
						</textarea>
						</p></td>
					</tr>
					<tr>
						<td ><p class="td_fond2">Taux de sondage:
						<textarea rows="2px" cols="70px" id="taux_sondage" placeholder="Rédiger ici votre taux de sondage">
							<?php echo getSondage("emprunt", $mission_id); ?>
						</textarea>
						</p></td>
					</tr>
				</table>
			</div>
		</div>
		<div id="id_btn">
			<table>
				<tr>
					<td>
						<input class="btn_planif" type="button" value="Enregistrer" onClick="enregistrer_emprunt();">
						<input class="btn_planif" type="button" value="Retour" onClick="retour_emprunt();">
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>