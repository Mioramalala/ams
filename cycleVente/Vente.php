<?php
	include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';

	@session_start();
	$mission_id=$_SESSION['idMission'];

	$reponse=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();

	$enterpriseId=$donnees['ENTREPRISE_ID'];

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

	$reponse_e=$bdd->query('SELECT COUNT(OBJECTIF_ID) AS COMPTEE FROM tab_objectif WHERE MISSION_ID= "'.$mission_id.'" AND CYCLE_ACHAT_ID=5');
	$donnees_e=$reponse_e->fetch();
	$e=$donnees_e['COMPTEE'];

	$reponse_f=$bdd->query('SELECT COUNT(OBJECTIF_ID) AS COMPTEF FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=6');
	$donnees_f=$reponse_f->fetch();
	$f=$donnees_f['COMPTEF'];
?>
	<iframe style="display:none;" name="uploadFrame"></iframe>	
	<?php 
		include $_SERVER["DOCUMENT_ROOT"]."/RSCI/layout/modal/modal-flowchart-upload-vente.php";
	?>
<head>
	<title>AMS | Cycle achat</title>

	<link href="cycleVente/Venteb/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Venteb/css/div_vb.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Venteb/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Venteb/css/div_fermer_quest_objectif_vb.css" rel="stylesheet" type="text/css" />

	<link href="cycleVente/Ventea/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Ventea/css/div_a.css" rel="stylesheet" type="text/css" />

	<link href="cycleVente/Ventec/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Ventec/css/div_vc.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Ventec/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Ventec/css/div_fermer_quest_objectif_vc.css" rel="stylesheet" type="text/css" />

	<link href="cycleVente/Vented/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Vented/css/div_vd.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Vented/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Vented/css/div_fermer_quest_objectif_vd.css" rel="stylesheet" type="text/css" /> 

	<link href="cycleVente/Ventee/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Ventee/css/div_ve.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Ventee/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Ventee/css/div_fermer_quest_objectif_ve.css" rel="stylesheet" type="text/css" /> 

	<link href="cycleVente/Ventef/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Ventef/css/div_vf.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Ventef/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleVente/Ventef/css/div_fermer_quest_objectif_vf.css" rel="stylesheet" type="text/css" /> 
	
	<link href="RSCI/assets/css/popup_upload.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="RSCI/assets/js/popup_upload.js"></script>

	<script>
		$(function(){
			$.ajax({ //Debut verificaton validation // ANDO
				type:'GET',
				url:'cycleVente/verification.php',
				data:{},
				success:function(e){
					var cycl= e.split(",");
					var longuer= cycl.length;
					for(var i=0; i<longuer; i++){
						var res= cycl[i];
						if(res==10){
							//alert('10');
							$('div#validate_va').find('#font_label').empty();
							$('div#validate_va').css({"width":"55px"});
							$('td#validate_va').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
						}

						if(res==26){
							//alert('26');
							$('div#validate_vb').find('#font_label').empty();
							$('td#validate_vb').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
							$('div#validate_vb').css({"width":"55px"});

						}

						if(res==27){
							//alert('27');
							$('div#validate_vc').find('#font_label').empty();
							$('td#validate_vc').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
							$('div#validate_vc').css({"width":"55px"});
						}
						if(res==28){
							//alert('28');
							$('div#validate_vd').find('#font_label').empty();
							$('div#validate_vd').css({"width":"55px"});
							$('td#validate_vd').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
						
						}if(res==29){
							//alert('29');
							$('div#validate_ve').find('#font_label').empty();
							$('td#validate_ve').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
							$('div#validate_ve').css({"width":"55px"});
						
						}if(res==30){
							//alert('30');
							$('div#validate_vf').find('#font_label').empty();
							$('td#validate_vf').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
							$('div#validate_vf').css({"width":"55px"});
						}
					}				
				}
			});//fn verif 

 			
			$('#synthVente').click(function(){
				$.ajax({
					type:'GET',
					url:'cycleVente/synthese.php',
					success:function(e){
						$('#ContentSynthAchat').html(e).show();
						$('#contenue_rsci').hide();
						$('#contRsciVente').hide();
					}
				});
			});
			$('#ventea').click(function(){		
				$('#contenue_rsci').hide();
				mission_id=document.getElementById("txt_mission_id").value;	
				enterpriseId=$('#enterpriseId').val();
				$.ajax({
					type:'POST',
					url:'cycleVente/Ventea/php/countPostCycleId.php',
					data:{mission_id:mission_id},
					success:function(e){	
						if(e==0){
							$.ajax({
								type:'POST',
								url:'cycleVente/Ventea/form/frmPoste.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contPosteVa').html(e).show();
									$('#contRsciVente').hide();
								}
							});
						}
						else{
							$.ajax({
								type:'POST',
								url:'cycleVente/Ventea/php/getEseIdMissId.php',
								data:{mission_id:mission_id},
								success:function(e1){
									$.ajax({							
										type:'POST',
										url:'cycleVente/Ventea/form/Interface_va_Secondaire.php',
										data:{mission_id:mission_id, entrepiseId:e1},
										success:function(e2){
											$('#contva').html(e2).show();
											$('#contRsciVente').hide();
										}
									});
								}					
							});
						}
					}
				});	
			});
			$('#validate_va').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleVente/Ventea/php/detect_synthese_existant_va.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==0){
							$('#mess_vide_vente').show();
							document.getElementById("validate_va").disabled=true;
							document.getElementById("validate_vb").disabled=true;
							document.getElementById("validate_vc").disabled=true;
							document.getElementById("validate_vd").disabled=true;
							document.getElementById("validate_ve").disabled=true;
							document.getElementById("validate_vf").disabled=true;
						}
						else{
							$.ajax({
								type:'POST',
								url:'cycleVente/Ventea/form/Interface_va_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupVa').html(e).show();
									$('#contRsciVente').hide();
								}
							});	
							}
						}
				});		
			});
			//Evenement de l'objectif b superviseur	

			$('#validate_vb').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleVente/Venteb/php/cpt_vb.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==17){
							$.ajax({
								type:'POST',
								url:'cycleVente/Venteb/form/Interface_vb_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupVb').html(e).show();
									$('#contRsciVente').hide();
								}
							});
						}
						else{
							$('#mess_vide_vente').show();
							document.getElementById("validate_va").disabled=true;
							document.getElementById("validate_vb").disabled=true;
							document.getElementById("validate_vc").disabled=true;
							document.getElementById("validate_vd").disabled=true;
							document.getElementById("validate_ve").disabled=true;
							document.getElementById("validate_vf").disabled=true;
						}
					}
				
				});

			});
			
			$('#validate_vc').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleVente/Ventec/php/cpt_vc.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==16){
							$.ajax({
								type:'POST',
								url:'cycleVente/Ventec/form/Interface_vc_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupVc').html(e).show();
									$('#contRsciVente').hide();
								}
							});
						}
						else{
							$('#mess_vide_vente').show();
							document.getElementById("validate_va").disabled=true;
							document.getElementById("validate_vb").disabled=true;
							document.getElementById("validate_vc").disabled=true;
							document.getElementById("validate_vd").disabled=true;
							document.getElementById("validate_ve").disabled=true;
							document.getElementById("validate_vf").disabled=true;
						}
					}
				
				});

			});

			$('#validate_vd').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleVente/Vented/php/cpt_vd.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==35){
							$.ajax({
								type:'POST',
								url:'cycleVente/Vented/form/Interface_vd_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupVd').html(e).show();
									$('#contRsciVente').hide();
								}
							});
						}
						else{
							$('#mess_vide_vente').show();
							document.getElementById("validate_va").disabled=true;
							document.getElementById("validate_vb").disabled=true;
							document.getElementById("validate_vc").disabled=true;
							document.getElementById("validate_vd").disabled=true;
							document.getElementById("validate_ve").disabled=true;
							document.getElementById("validate_vf").disabled=true;
						}
					}
				
				});

			});

			$('#validate_ve').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleVente/Ventee/php/cpt_ve.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==7){
							$.ajax({
								type:'POST',
								url:'cycleVente/Ventee/form/Interface_ve_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupVe').html(e).show();
									$('#contRsciVente').hide();
								}
							});
						}
						else{
							$('#mess_vide_vente').show();
							document.getElementById("validate_va").disabled=true;
							document.getElementById("validate_vb").disabled=true;
							document.getElementById("validate_vc").disabled=true;
							document.getElementById("validate_vd").disabled=true;
							document.getElementById("validate_ve").disabled=true;
							document.getElementById("validate_vf").disabled=true;
						}
					}
				
				});

			});

			$('#validate_vf').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleVente/Ventef/php/cpt_vf.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==12){
							$.ajax({
								type:'POST',
								url:'cycleVente/Ventef/form/Interface_vf_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupVf').html(e).show();
									$('#contRsciVente').hide();
								}
							});
						}
						else{
							$('#mess_vide_vente').show();
							document.getElementById("validate_va").disabled=true;
							document.getElementById("validate_vb").disabled=true;
							document.getElementById("validate_vc").disabled=true;
							document.getElementById("validate_vd").disabled=true;
							document.getElementById("validate_ve").disabled=true;
							document.getElementById("validate_vf").disabled=true;
						}
					}
				
				});
			});
			
			//Retour au menu poste clé
			$('#RetourRsciVente').click(function(){
				$('#dv_cont_menu_rsci').show();
				$('#contRsciVente').hide();
				$('#transparent').remove();
				$('#ongulet').fadeTo('slow',1);
			});

			//evenement de l'objectif c dans le menu auditeur
			$('#venteb').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				//alert(mission_id);
				$.ajax({
					type:'POST',
					url:'cycleVente/Venteb/php/cpt_vb.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleVente/Venteb/load/load_rep_vb.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_vb').html(e).show();
									$('#contvb').show();
									$('#contRsciVente').hide();
									$('#Interface_Question_vb').hide();
									$('#dv_table_vb').show();
								
								}
							});					
						}
						else{
							$('#contvb').show();
							$('#contRsciVente').hide();
							$('#Interface_Question_vb').show();
						}
					}
				});
			});

			$('#ventec').click(function(){


				mission_id=document.getElementById("mission_id_index").value;		
				//alert("tonga??"+mission_id);
				$.ajax({
					type:'POST',
					url:'cycleVente/Ventec/php/cpt_vc.php',
					data:{mission_id:mission_id},
					success:function(e1){
						

						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleVente/Ventec/load/load_rep_vc.php',
								data:{mission_id:mission_id},
								success:function(e){

									$('#frm_tab_res_vc').html(e).show();
									$('#contvc').show();
									$('#contRsciVente').hide();
									$('#Interface_Question_vc').hide();
									$('#dv_table_vc').show();
								}
							});					
						}
						else{
							$('#contvc').show();
							$('#contRsciVente').hide();
							$('#Interface_Question_vc').show();
						}
					}
				});		
			});

			$('#vented').click(function(){
			mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleVente/Vented/php/cpt_vd.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleVente/Vented/load/load_rep_vd.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_vd').html(e).show();
									$('#contvd').show();
									$('#contRsciVente').hide();
									$('#Interface_Question_vd').hide();
									$('#dv_table_vd').show();
								}
							});					
						}
						else{
							$('#contvd').show();
							$('#contRsciVente').hide();
							$('#Interface_Question_vd').show();
						}
					}
				});		
			});

			$('#ventee').click(function(){
			mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleVente/Ventee/php/cpt_ve.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleVente/Ventee/load/load_rep_ve.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_ve').html(e).show();
									$('#contve').show();
									$('#contRsciVente').hide();
									$('#Interface_Question_ve').hide();
									$('#dv_table_ve').show();
								}
							});					
						}
						else{
							$('#contve').show();
							$('#contRsciVente').hide();
							$('#Interface_Question_ve').show();
						}
					}
				});		
			});

			$('#ventef').click(function(){
			mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleVente/Ventef/php/cpt_vf.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleVente/Ventef/load/load_rep_vf.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_vf').html(e).show();
									$('#contvf').show();
									$('#contRsciVente').hide();
									$('#Interface_Question_vf').hide();
									$('#dv_table_vf').show();
								}
							});					
						}
						else{
							$('#contvf').show();
							$('#contRsciVente').hide();
							$('#Interface_Question_vf').show();
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
		<label class="marge_Titre">Evaluation du contrôle des ventes</label> <label class="margin_Code">Code : FC7 </label>
	</div>-->
<div id="fond_Index" align="center">
	<table width="100%">
		<tr>
			<td class="label_Titre_Evaluation" align="center">
				<div class="img_cycle"><img src="img/iconswidgets/vente.png"></div>
				<div class="titre_cycle"><label>Cycle Vente</label></div>
				<input type="text" id="mission_id_index" value="<?php echo $mission_id; ?>" style="display:none;"/>
			</td>
		</tr>
	</table>
	<table width="90%">
		<tr  class="label_Evaluation" height="110" align="center" >
			<td  width="50%" id="ventea" <?php if($fonct_id_a>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#f5f5f5"';?> class="td_Image">
				<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id"  style="display:none;"/>
				<img class="label_img" src="img/alphabet/A.png"></img>
				<label >Séparation de fonction</label>
			</td>
			<td class="tdb_button" id="validate_va">
				<div id="validate_va" class="label_valid"><label id="font_label">Validation</label></div>
				<!--<input type="button" value="Validation" id="validate_va" class="bouton" />-->
			</td >
			<td  id="venteb" width="50%" <?php if($b>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#f5f5f5"';?> class="td_Image">
				<img class="label_img b" src="img/alphabet/B.png"></img>
				<label>Exhaustivité</label>
			</td>
			<td class="tdb_button" id="validate_vb">
				<div id="validate_vb" class="label_valid"><label id="font_label">Validation</label></div>
				<!--<input type="button" value="Validation" id="validate_vb" class="bouton" />-->
			</td>
		</tr>
		<tr class="label_Evaluation" height="110" align="center">
			<td  id="ventec" width="50%" <?php if($c>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#f5f5f5"';?> class="td_Image">
				<img class="label_img c" src="img/alphabet/c.png"></img>
				<label>Existence</label>
			</td>
			<td class="tdb_button" id="validate_vc">
				<div id="validate_vc" class="label_valid"><label id="font_label">Validation</label></div>
				<!--<input type="button" value="Validation" id="validate_vc" class="bouton" />-->
			</td>
			<td  id="vented" width="50%" <?php if($d>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#f5f5f5"';?> class="td_Image">
				<img class="label_img d" src="img/alphabet/D.png"></img>
				<label>Evaluation</label>
			</td>
			<td class="tdb_button" id="validate_vd">
				<div id="validate_vd" class="label_valid"><label id="font_label">Validation</label></div>
				<!--<input type="button" value="Validation" id="validate_vd" class="bouton" />-->
			</td>
		</tr>
		<tr class="label_Evaluation" height="110" align="center">
			<td  id="ventee" width="50%" <?php if($c>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#f5f5f5"';?> class="td_Image">
				<img class="label_img e" src="img/alphabet/E.png"></img>
				<label>Bonne période</label>
			</td>
			<td class="tdb_button" id="validate_ve">
				<div id="validate_ve" class="label_valid"><label id="font_label">Validation</label></div>
				<!--<input type="button" value="Validation" id="validate_ve" class="bouton" />-->
			</td>
			<td  id="ventef" width="50%" <?php if($d>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#f5f5f5"';?> class="td_Image">
				<img class="label_img f" src="img/alphabet/F.png"></img>
				<label>Imputation</label>
			</td>
			<td class="tdb_button" id="validate_vf">
				<div id="validate_vf" class="label_valid"><label id="font_label">Validation</label></div>
				<!--<input type="button" value="Validation" id="validate_vf" class="bouton" />-->
			</td>
		</tr>
	</table>
	<br />
	<input type="button"  class="bouton-md poplight" value="flowchart" data-w="500" target="popup_vente"  style="width: 250px;"/>
	<input type="button" class="bouton" value="Synthèse du cycle Vente" id="synthVente" style="width: 250px;"/>
	<input type="button" value="Retour" class="bouton" id="RetourRsciVente"/>
	<input type="text" id="enterpriseId" value="<?php echo $enterpriseId; ?>" style="display:none;" />
	
	<div id="mess_vide_vente"><?php include $_SERVER["DOCUMENT_ROOT"].'/cycleVente/Venteb/sms/mess_non_vb.php'; ?></div>
</div>
</body>