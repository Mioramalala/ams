<?php
 @session_start();
 $mission_id=@$_SESSION['idMission'];
 $CYCLE=$_GET["CYCLE"];
 $PLANIF_CYCLE=$_GET["PLANIF_CYCLE"];

 $TITRE_PLAN="";
 switch ($PLANIF_CYCLE) {
 	case 'fond':
 		$TITRE_PLAN="FONDS PROPRES";
 		break;
 	case 'immo':
 		$TITRE_PLAN="Immobilisations corporelles et incorporelles";
 		break;
 	case 'immofi':
 		$TITRE_PLAN="Immobilisation Financieres";
 		break;	


 	case 'stock':
 		$TITRE_PLAN="Stocks";
 		break;
 	case 'tresorerie':
 		$TITRE_PLAN="Tresorerie";
 		break;
 	case 'charge':
 		$TITRE_PLAN="Charges fournisseurs";
 		break;	
 		


 		case 'vente':
 		$TITRE_PLAN="Ventes-Clients";
 		break;
	 	case 'paie':
	 	$TITRE_PLAN="Paie-Personnel";
	 	break;
	 	case 'impot':
	 	$TITRE_PLAN="IMPÔTS ET TAXES";
	 	break;	



	 	case 'emprunt':
 		$TITRE_PLAN="EMPRUNTS ET DETTES FINANCIERES";
 		break;
	 	case 'dcd':
	 	$TITRE_PLAN="DEBITEURS ET CREDITEURS DIVERS";
	 	break;
	 		
 	
 	default:
 		# code...
 		break;
 }
  $TITRE_PLAN=strtoupper($TITRE_PLAN);

 include './../../connexion.php';
 //include 'fonctions_planif.php';






?>
<html>
	<head>
		<link rel = "stylesheet" href = "../RA/planification/fond/css_planif.css"/>
		<script>
			// Droit cycle by Tolotra
	        // Page : RA -> Planification fond
	        // Tâche : Planification fond, 48
	        $.ajax(
	            {
	                type: 'POST',
	                url: 'droitCycle.php',
	                data: {task_id: 48},
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

			$(function() 
			{




					$.ajax({
						type:'POST',
						url:'RA/planification/checkValidation.php',
						data:{cycle:'<?php print ($PLANIF_CYCLE); ?>'},
						success:function(e){
							if(e==="disable"){
								$("#dv_fond textarea,#Btn_enregplanifObject").attr("disabled", true);

							}
						}
					});

					//BTN ENREGISTREMENT OBJECTIF PAR PLANIFICATION
					$("#Btn_enregplanifObject").click(function (e)
					{


									datatransfert=$("#frmobjectplanif").serialize();
									var fonction=$('#fonct').val();
									var compte=$('#cpt').val();	
									var planif_gen=$('#planif_gen').val();	
									var seuil_sign=$('#seuil_sign').val();	
									var taux_sondage=$('#taux_sondage').val();	
									
									var mission_id=<?php echo $mission_id;?>;

									///Check role
									$.post("checkRole.php",
								    {
								        data:datatransfert,
								    },
								    function(data, status){
								        alert("Data: " + data + "\nStatus: " + status);
								    });
									$.get("droitAccUtil.php",function (e)
									{
												// alert(e);
												//DEBUT GET
												if(e!=0)
												{
													
														$.ajax({
														type:'POST',
														url:'RA/planification/enregistrer_planifObjectif.php',
														data:datatransfert,
														success:function(e)
														{
															//alert(e);
															alert('Bien enregistr\351s');	
															$('#contenue').load('/RA/planification/planification.php?mission_id='+<?php echo $mission_id;?>);
															}
														 
														 });
														 
											   }//FIN IF
											   else
											   {
												   alert("Vous n'êtes pas autorisé!");
												   return false;
											   }//FIN else
										
									});//FIN GET

					});
					//FIN BTN ENREGISTREMENT OBJECTIF PAR PLANIFICATION


			});
			
			
			
			function retour_fond()
			{
				$('#contenue').load('/RA/planification/planification.php?mission_id='+<?php echo $mission_id;?>);
			}
			
		</script>
		
	</head>
<body >

	<?php 

		//REQUETTE tab_incidence_ra
		$reponse=$bdd->query("select    FONCTIONNEMENT,COMPTE from tab_incidence_ra where CYCLE='$CYCLE' AND MISSION_ID='$mission_id'");
		$donnees=$reponse->fetch();
		$fonct=$donnees['FONCTIONNEMENT'];
		$cpt=$donnees['COMPTE'];


		//REQUETTE tab_planification_ra
		$req = "SELECT PLANIF_GEN,SEUIL_SIGN,TAUX_SONDAGE FROM tab_planification_ra 
				WHERE MISSION_ID='$mission_id' AND PLANIF_CYCLE='$PLANIF_CYCLE' ORDER BY PLANIF_ID DESC";
		$rep = $bdd->query($req);
		$don_=$rep->fetch();

		$planif = $don_['PLANIF_GEN'];
		$SEUIL_SIGN=$don_['SEUIL_SIGN'];	
		$TAUX_SONDAGE=$don_['TAUX_SONDAGE'];
	
	?>

	<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
		<tr>
			<td style="color:white"><center><?php print ($TITRE_PLAN); ?></center></td>
		</tr>
	</table>

	

	<form id="frmobjectplanif" method="POST" >
				<input name="PLANIF_CYCLE" type="hidden"  value="<?php print ($PLANIF_CYCLE); ?>">
				<div id="dv_fond">
							
							<div id="dv_fond_planif1">
								<table class="fond1">
										<tr>
											<td class="td_fond"><p class="titre" style="color:blue;">INCIDENCES</p>
												<p id="ligne"></p>
												<p class="td_fond2">Fonctions:</p>
												<textarea rows="5px" cols="70px" id="fonct" name="fonction"><?php echo $fonct;?></textarea>
											</td>
										</tr>
										<tr>
											<td ><p class="td_fond2">Comptes:</p>
												<textarea rows="5px" cols="70px" id="cpt" name="compte"><?php echo $cpt;?></textarea>
											</td>
										</tr>
									</table>
							</div>




							<div id="dv_fond_planif2">
								<table class="fond2">
									<tr>
										<td class="td_fond"><p class="titre" style="color:blue;">PLANIFICATION <?php print ($TITRE_PLAN); ?></p>
											<p id="ligne"></p>
											<p class="td_fond2">Planification par cycle :
												<textarea rows="2px" cols="70px" id="planif_gen" name="planif_gen" placeholder="Rédiger ici votre planification des fonds propres"><?php echo $planif ?></textarea>
											</p>
									</tr>
									<tr>
										<td ><p class="td_fond2">Seuil de signification:
											<textarea rows="2px" cols="70px" id="seuil_sign" name="seuil_sign"  placeholder="Rédiger ici votre seuil de signification"><?php echo $SEUIL_SIGN; ?></textarea>
										</p></td>
									</tr>
									<tr>
										<td ><p class="td_fond2">Taux de sondage:
											<textarea rows="2px" cols="70px" id="taux_sondage"  name="taux_sondage"  placeholder="Rédiger ici votre taux de sondage"><?php echo $TAUX_SONDAGE; ?></textarea>
										</p></td>
									</tr>
								</table>
							</div>
				</div>
				<div id="id_btn">
						<table>
							<tr>
								<td>
									<input class="btn_planif" type="button" value="Enregistrer" id="Btn_enregplanifObject" >
									<input class="btn_planif" type="button" value="Retour" onClick="retour_fond();">
								</td>
							</tr>
						</table>
				</div>


		</form>


	</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		
	})
</script>