<?php
	@session_start();
	$mission_id=$_SESSION['idMission'];
	include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';

	$reponse0=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);
	$donnees0=$reponse0->fetch();
	$enterpriseId=$donnees0['ENTREPRISE_ID'];


	$reponse=$bdd->query('SELECT COUNT(FONCT_ACHAT_A_ID) AS COMPTE FROM tab_fonction_achat_a WHERE MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();
	$fonct_id_a=$donnees['COMPTE'];

	$reponse_b=$bdd->query('SELECT COUNT(OBJECTIF_ID) AS COMPTEB FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=2');
	$donnees_b=$reponse_b->fetch();
	$b=$donnees_b['COMPTEB'];

	$reponse_c=$bdd->query('SELECT COUNT(OBJECTIF_ID) AS COMPTEC FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=3');
	$donnees_c=$reponse_c->fetch();
	$c=$donnees_c['COMPTEC'];

	$reponse_d=$bdd->query('SELECT COUNT(OBJECTIF_ID) AS COMPTED FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=4');
	$donnees_d=$reponse_d->fetch();
	$d=$donnees_d['COMPTED'];

	$reponse_e=$bdd->query('SELECT COUNT(OBJECTIF_ID) AS COMPTEE FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=5');
	$donnees_e=$reponse_e->fetch();
	$e=$donnees_e['COMPTEE'];

	$reponse_f=$bdd->query('SELECT COUNT(OBJECTIF_ID) AS COMPTEF FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=6');
	$donnees_f=$reponse_f->fetch();
	$f=$donnees_f['COMPTEF'];

?>

<head>
	<title>AMS | Cycle achat</title>

	<link href="cycleImmo/Immob/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleImmo/Immob/css/div_imb.css" rel="stylesheet" type="text/css" />
	<link href="cycleImmo/Immob/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleImmo/Immob/css/div_fermer_quest_objectif_imb.css" rel="stylesheet" type="text/css" />

	<link href="cycleImmo/Immoa/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleImmo/Immoa/css/div_a.css" rel="stylesheet" type="text/css" />

	<link href="cycleImmo/Immoc/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleImmo/Immoc/css/div_imc.css" rel="stylesheet" type="text/css" />
	<link href="cycleImmo/Immoc/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleImmo/Immoc/css/div_fermer_quest_objectif_imc.css" rel="stylesheet" type="text/css" />

	<link href="cycleImmo/Immod/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleImmo/Immod/css/div_imd.css" rel="stylesheet" type="text/css" />
	<link href="cycleImmo/Immod/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleImmo/Immod/css/div_fermer_quest_objectif_imd.css" rel="stylesheet" type="text/css" />
	<link href="RSCI/assets/css/popup_upload.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="RSCI/assets/js/popup_upload.js"></script>
	
	<script>
	
		$(function(){

			$.ajax({ //Debut verificaton validation // ANDO
				type:'GET',
				url:'cycleImmo/verification.php',
				data:{},
				success:function(e){
					//alert (e);
					if(e){
						//alert(e);
						var cycl= e.split(",");
						var longuer= cycl.length;
						for(var i=0;i<longuer;i++){
							var res= cycl[i];
							if(res==1000){
								$('div#validate_ima').find('#font_label').empty();
								$('div#validate_imd').css({"width":"55px"});
								$('td#validate_ima').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								}
							if(res==7){
								$('div#validate_imb').find('#font_label').empty();
								$('td#validate_imb').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								$('div#validate_imd').css({"width":"55px"});

							}
							if(res==8){
								$('div#validate_imc').find('#font_label').empty();
								$('td#validate_imc').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								$('div#validate_imd').css({"width":"55px"});
							}
							if(res==9){
								$('div#validate_imd').find('#font_label').empty();
								$('td#validate_imd').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								$('div#validate_imd').css({"width":"55px"});
							}
						}				
					}
				}
			});

			//fn verif : synthèse pple.
 			$('#SynthImmo').click(function(){
				$.ajax({
					type:'GET',
					url:'cycleImmo/synthese.php',
					success:function(e){
						$('#ContentSynthAchat').html(e).show();
						$('#contenue_rsci').hide();
						$('#contRsciImmo').hide();
					}
				});
 			});

 			// tinay editer: 
			$('#immoa').click(function(){
				
				$('#contenue_rsci').hide();
				
				mission_id=document.getElementById("txt_mission_id").value;	
				enterpriseId=$('#enterpriseId').val();
				
				$.ajax({
					type:'POST',
					url:'cycleImmo/Immoa/php/countPostCycleId.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==0){					
							$.ajax({
								type:'POST',
								url:'cycleImmo/Immoa/form/frmPoste.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contPosteIma').html(e).show();
									$('#contRsciImmo').hide();
								}
							});
						}
						else{					
							$.ajax({
								type:'POST',
								url:'cycleImmo/Immoa/form/Interface_ima_Secondaire.php',
								data:{mission_id:mission_id, entrepiseId:enterpriseId},
								success:function(e){
									$('#contima').html(e).show();
									$('#contRsciImmo').hide();
								}	
							});	
						}
					}
				});			
			});

			//tinay editer: droit utlisateur qui va valider le cycle
			// le code par defaut.
			// $('#validate_ima').click(function(){

			// 	mission_id=document.getElementById("mission_id_index").value;

			// 	$.ajax({
			// 		type:'POST',
			// 		url:'cycleImmo/Immoa/php/detect_synthese_existant_ima.php',
			// 		data:{mission_id:mission_id},
			// 		success:function(e){
			// 			if(e==0){
			// 				$('#mess_non_vide').show();
			// 				document.getElementById("validate_ima").disabled=true;
			// 				document.getElementById("validate_imb").disabled=true;
			// 				document.getElementById("validate_imc").disabled=true;
			// 				document.getElementById("validate_imd").disabled=true;
			// 			}else{
			// 				$.ajax({
			// 					type:'POST',
			// 					url:'cycleImmo/Immoa/form/Interface_ima_Superviseur.php',
			// 					data:{mission_id:mission_id},
			// 					success:function(e){
			// 						$('#contSupIma').html(e).show();
			// 						$('#contRsciImmo').hide();
			// 					}
			// 				});
			// 			}

			// 		}
			// 	});			
			// });
	
			//tinay editer: ajout de check de droit de validation
			// valider objectif A
			$('#validate_ima').click(function(){

				// tinay editer: id="makaNom" est dans le template pple /accueil.php
				var nom= $("#makaNom").val();
				mission_id= document.getElementById("mission_id_index").value;

				$.ajax({
					type:"POST",
					url:"droitAccUtil.php", // appel du fichier de gestion de droit selon le même principe dans le cycle achat.
					data:{nom:nom,mission_id:mission_id},
					success:function(e){
						if(e!=0){
							
							$.ajax({
								type:'POST',
								url:'cycleImmo/Immoa/php/detect_synthese_existant_ima.php',
								data:{mission_id:mission_id},
								success:function(e){
									if(e==0){
										$('#mess_non_vide').show();
										document.getElementById("validate_ima").disabled=true;
										document.getElementById("validate_imb").disabled=true;
										document.getElementById("validate_imc").disabled=true;
										document.getElementById("validate_imd").disabled=true;
									}else{
										$.ajax({
											type:'POST',
											url:'cycleImmo/Immoa/form/Interface_ima_Superviseur.php',
											data:{mission_id:mission_id},
											success:function(e){
												$('#contSupIma').html(e).show();
												$('#contRsciImmo').hide();
											}
										});
									}

								}
							});	
						}else{
							alert('Vous n\'êtes pas autorisés à valider!');
						}
					}

				});			
			});


			//Evenement de l'objectif b superviseur		
			// $('#validate_imb').click(function(){
			// 	mission_id=document.getElementById("mission_id_index").value;
			// 	$.ajax({
			// 		type:'POST',
			// 		url:'cycleImmo/Immob/php/cpt_imb.php',
			// 		data:{mission_id:mission_id},
			// 		success:function(e){
			// 			if(e==23){
			// 				$.ajax({
			// 					type:'POST',
			// 					url:'cycleImmo/Immob/form/Interface_imb_Superviseur.php',
			// 					data:{mission_id:mission_id},
			// 					success:function(e){
			// 						$('#contSupimb').html(e).show();
			// 						$('#contRsciImmo').hide();
			// 					}
			// 				});
			// 			}
			// 			else{
			// 				$('#mess_non_vide').show();
			// 				document.getElementById("validate_ima").disabled=true;
			// 				document.getElementById("validate_imb").disabled=true;
			// 				document.getElementById("validate_imc").disabled=true;
			// 				document.getElementById("validate_imd").disabled=true;
			// 			}
			// 		}
				
			// 	});
			// });
			
			//tinay editer: ajout de check de droit de validation
			// valider objectif B
			$('#validate_imb').click(function(){
				var nom= $("#makaNom").val();
				mission_id= document.getElementById("mission_id_index").value;
				$.ajax({
					type:"POST",
					url:"droitAccUtil.php", // apppel du fichier de gestion de droit.
					data:{nom:nom,mission_id:mission_id},
					success:function(e){
						if(e!=0){

							 $.ajax({
								type:'POST',
								url:'cycleImmo/Immob/php/cpt_imb.php',
								data:{mission_id:mission_id},
								success:function(e){
									if(e==23){
										$.ajax({
											type:'POST',
											url:'cycleImmo/Immob/form/Interface_imb_Superviseur.php',
											data:{mission_id:mission_id},
											success:function(e){
												$('#contSupimb').html(e).show();
												$('#contRsciImmo').hide();
											}
										});
									}
									else{
										$('#mess_non_vide').show();

										document.getElementById("validate_ima").disabled=true;
										document.getElementById("validate_imb").disabled=true;
										document.getElementById("validate_imc").disabled=true;
										document.getElementById("validate_imd").disabled=true;
									}
								}
							
							});
						}else{
							alert('Vous n\'êtes pas autorisé à valider!');
						}
					}
				});
			});
			
			// $('#validate_imc').click(function(){
			// 	mission_id=document.getElementById("mission_id_index").value;
			// 	$.ajax({
			// 		type:'POST',
			// 		url:'cycleImmo/Immoc/php/cpt_imc.php',
			// 		data:{mission_id:mission_id},
			// 		success:function(e){
			// 			if(e==13){
			// 				$.ajax({
			// 					type:'POST',
			// 					url:'cycleImmo/Immoc/form/Interface_imc_Superviseur.php',
			// 					data:{mission_id:mission_id},
			// 					success:function(e){
			// 						$('#contSupimc').html(e).show();
			// 						$('#contRsciImmo').hide();
			// 					}
			// 				});
			// 			}
			// 			else{
			// 				$('#mess_non_vide').show();
			// 				document.getElementById("validate_ima").disabled=true;
			// 				document.getElementById("validate_imb").disabled=true;
			// 				document.getElementById("validate_imc").disabled=true;
			// 				document.getElementById("validate_imd").disabled=true;
			// 			}
			// 		}
				
			// 	});
			// });
			
			// valider objectif C
			// tinay editer: ajout de droit de validation
			$('#validate_imc').click(function(){
				var nom= $("#makaNom").val();
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:"POST",
					url:"droitAccUtil.php", // apppel du fichier de gestion de droit.
					data:{nom:nom,mission_id:mission_id},
					success:function(e){
						if(e!=0){
							$.ajax({
								type:'POST',
								url:'cycleImmo/Immoc/php/cpt_imc.php',
								data:{mission_id:mission_id},
								success:function(e){
									if(e==13){
										$.ajax({
											type:'POST',
											url:'cycleImmo/Immoc/form/Interface_imc_Superviseur.php',
											data:{mission_id:mission_id},
											success:function(e){
												$('#contSupimc').html(e).show();
												$('#contRsciImmo').hide();
											}
										});
									}
									else{
										$('#mess_non_vide').show();
										document.getElementById("validate_ima").disabled=true;
										document.getElementById("validate_imb").disabled=true;
										document.getElementById("validate_imc").disabled=true;
										document.getElementById("validate_imd").disabled=true;
									}
								}
							
							});
			
						}else{
							alert("Vous n'êtes pas autorisé!");
						}
					}
				});

			});

			// $('#validate_imd').click(function(){
			// 	mission_id=document.getElementById("mission_id_index").value;
			// 	$.ajax({
			// 		type:'POST',
			// 		url:'cycleImmo/Immod/php/cpt_imd.php',
			// 		data:{mission_id:mission_id},
			// 		success:function(e){
			// 			if(e==11){
			// 				$.ajax({
			// 					type:'POST',
			// 					url:'cycleImmo/Immod/form/Interface_imd_Superviseur.php',
			// 					data:{mission_id:mission_id},
			// 					success:function(e){
			// 						$('#contSupimd').html(e).show();
			// 						$('#contRsciImmo').hide();
			// 					}
			// 				});
			// 			}
			// 			else{
			// 				$('#mess_non_vide').show();
			// 				document.getElementById("validate_ima").disabled=true;
			// 				document.getElementById("validate_imb").disabled=true;
			// 				document.getElementById("validate_imc").disabled=true;
			// 				document.getElementById("validate_imd").disabled=true;
			// 			}
			// 		}
				
			// 	});
			// });

			//tinay editer: ajout de check validation
			// valider objectif D
			$('#validate_imd').click(function(){
				var nom= $("#makaNom").val();
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:"POST",
					url:"droitAccUtil.php", // apppel du fichier de gestion de droit.
					data:{nom:nom,mission_id:mission_id},
					success:function(e){
						if(e!=0){
							$.ajax({
								type:'POST',
								url:'cycleImmo/Immod/php/cpt_imd.php',
								data:{mission_id:mission_id},
								success:function(e){
									if(e==11){
										$.ajax({
											type:'POST',
											url:'cycleImmo/Immod/form/Interface_imd_Superviseur.php',
											data:{mission_id:mission_id},
											success:function(e){
												$('#contSupimd').html(e).show();
												$('#contRsciImmo').hide();
											}
										});
									}
									else{
										$('#mess_non_vide').show();
										document.getElementById("validate_ima").disabled=true;
										document.getElementById("validate_imb").disabled=true;
										document.getElementById("validate_imc").disabled=true;
										document.getElementById("validate_imd").disabled=true;
									}
								}
							
							});
						}else{
							alert("Vous n'êtes pas autorisé!");
						}
					}
				});
			});

			//Retour au menu poste clé
			$('#RetRsci').click(function(){
				$('#dv_cont_menu_rsci').show();
				$('#contRsciImmo').hide();
				$('#transparent').remove();
				$('#ongulet').fadeTo('slow',1);
			});
			
			// tinay editer:
			//evenement de l'objectif b dans le menu auditeur
			$('#Immob').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleImmo/Immob/php/cpt_imb.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								// tinay editer
								url:'cycleImmo/Immob/load/load_rep_imb.php',
								//url:'cycleImmo/Immob/form/Interface_imb_Secondaire.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_imb').html(e).show();
									$('#contimb').show();
									$('#contRsciImmo').hide();
									$('#Interface_Question_imb').hide();
									$('#dv_table_imb').show();
								}
							});					
						}else{
							$('#contimb').show();
							$('#contRsciImmo').hide();
							$('#Interface_Question_imb').show();
						}
					}
				});
			});


			//eto izao
			$('#immoc').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleImmo/Immoc/php/cpt_imc.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleImmo/Immoc/load/load_rep_imc.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_imc').html(e).show();
									$('#contimc').show();
									$('#contRsciImmo').hide();
									$('#Interface_Question_imc').hide();
									$('#dv_table_imc').show();
								}
							});					
						}
						else{
							$('#contimc').show();
							$('#contRsciImmo').hide();
							$('#Interface_Question_imc').show();
						}
					}
				});		
			});

			$('#immod').click(function(){
			mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleImmo/Immod/php/cpt_imd.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleImmo/Immod/load/load_rep_imd.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_imd').html(e).show();
									$('#contimd').show();
									$('#contRsciImmo').hide();
									$('#Interface_Question_imd').hide();
									$('#dv_table_imd').show();
								}
							});					
						}
						else{
							$('#contimd').show();
							$('#contRsciImmo').hide();
							$('#Interface_Question_imd').show();
						}
					}
				});		
			});
		});
	</script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<!--<div id="fond_Sous_Titre" class="menu_Titre">
		<label class="marge_Titre">Evaluation du contrôle des Immobilisations</label> <label class="margin_Code">Code : FC2 </label>
	</div>-->

	<!-- Tinay editer -->
	<!--<p>/cycleImmo/Immo.php</p>-->

	<div id="fond_Index" align="center">

		<table width="100%">
			<tr>
				<td class="label_Titre_Evaluation" align="center">
					<div class="img_cycle"><img src="img/iconswidgets/imobolisation.png"></div>
					<div class="titre_cycle"><label>Cycle Immobilisation</label></div>
					<input type="text" id="mission_id_index" value="<?php echo $mission_id; ?>" style="display:none;"/>
				</td>
			</tr>
		</table>

		<table width="90%">
			<tr  class="label_Evaluation" height="110" align="center" >

										<!-- Séparation de fonction -->

				<td  width="50%" id="immoa" <?php if($fonct_id_a>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#f5f5f5"'; ?>  class="td_Image">
					<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id"  style="display:none;"/>
					<img class="label_img a" src="img/alphabet/A.png"></img>
					<label >Séparation de fonction</label>
				</td>
				<td class="tdb_button" id="validate_ima">
					<div id="validate_ima" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_ima" class="bouton" />-->
				</td>


										<!-- Exhaustivité -->
				<td  id="Immob" width="50%" <?php if($b>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#f5f5f5"'; ?> class="td_Image" bgcolor="#f5f5f5">
					<img class="label_img ba" src="img/alphabet/B.png"></img>
					<label>Exhaustivité</label>
				</td>
				<td class="tdb_button" id="validate_imb">
					<div id="validate_imb" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_imb" class="bouton" />-->
				</td>
			</tr>
			<tr class="label_Evaluation" height="110" align="center">
				<td  id="immoc" width="50%" <?php if($c>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#f5f5f5"'; ?>   class="td_Image" bgcolor="#f5f5f5">
					<img class="label_img c" src="img/alphabet/C.png"></img>
					<label>Correspondance</label>
				</td>
				<td class="tdb_button" id="validate_imc">
					<div id="validate_imc" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_imc" class="bouton" />-->
				</td>
				<td  id="immod" width="50%" <?php if($d>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#f5f5f5"'; ?>    class="td_Image" bgcolor="#f5f5f5">
					<img class="label_img da" src="img/alphabet/D.png"></img>
					<label>Evaluation</label>
				</td>
				<td class="tdb_button" id="validate_imd">
					<div id="validate_imd" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_imd" class="bouton" />-->
				</td>
			</tr>
		</table>
		<br />

		<iframe style="display:none;" name="uploadFrame"></iframe>	
		<?php 
			include $_SERVER["DOCUMENT_ROOT"]."/RSCI/layout/modal/modal-flowchart-upload-immobilisation.php";
		?>
		<input type="button"  class="bouton-md poplight" value="flowchart" data-w="500" target="popup_immobilisation"  style="width: 250px;"/>
		<input type="button" class="bouton" value="Synthèse du cycle Immobilisation" id="SynthImmo" style="width: 250px;"/>
		<input type="button" value="Retour" class="bouton" id="RetRsci"/>
		<input type="text" id="enterpriseId" value="<?php echo $enterpriseId; ?>" style="display:none;" />
		
		<div id="mess_non_vide"><?php include $_SERVER["DOCUMENT_ROOT"]."/cycleImmo/Immob/sms/mess_non_imb.php"; ?></div>
	</div>
</body>