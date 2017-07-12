<?php
	@session_start();
	$mission_id=$_SESSION['idMission'];
	include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';



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

	$reponse_e=$bdd->query('SELECT COUNT(OBJECTIF_ID) AS COMPTEE FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=5');
	$donnees_e=$reponse_e->fetch();
	$e=$donnees_e['COMPTEE'];

	$reponse_f=$bdd->query('SELECT COUNT(OBJECTIF_ID) AS COMPTEF FROM tab_objectif WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=6');
	$donnees_f=$reponse_f->fetch();
	$f=$donnees_f['COMPTEF'];
?>

<html>
<head>
	<title>AMS | Cycle achat</title>

	<link href="cyclePaie/Paieb/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paieb/css/div_pb.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paieb/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paieb/css/div_fermer_quest_objectif_pb.css" rel="stylesheet" type="text/css" />

	<link href="cyclePaie/Paiea/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paiea/css/div_a.css" rel="stylesheet" type="text/css" />

	<link href="cyclePaie/Paiec/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paiec/css/div_pc.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paiec/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paiec/css/div_fermer_quest_objectif_pc.css" rel="stylesheet" type="text/css" />

	<link href="cyclePaie/Paied/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paied/css/div_pd.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paied/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paied/css/div_fermer_quest_objectif_pd.css" rel="stylesheet" type="text/css" /> 

	<link href="cyclePaie/Paiee/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paiee/css/div_pe.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paiee/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cyclePaie/Paiee/css/div_fermer_quest_objectif_pe.css" rel="stylesheet" type="text/css" /> 

	<link href="RSCI/assets/css/popup_upload.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="RSCI/assets/js/popup_upload.js"></script>

	<script>
		$(function(){
			$.ajax({ //Debut verificaton validation // ANDO
				type:'GET',
				url:'cyclePaie/verification.php',
				data:{},
				success:function(e){
					//alert (e);
					if(e){
						//alert(e);
						var cycl= e.split(",");
						var longuer= cycl.length;
						for(var i=0;i<longuer;i++){
							var res= cycl[i];
							if(res==10000){
								$('div#validate_pa').find('#font_label').empty();
								$('div#validate_pa').css({"width":"55px"});
								$('td#validate_pa').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								}
							if(res==14){
								$('div#validate_pb').find('#font_label').empty();
								$('div#validate_pb').css({"width":"55px"});
								$('td#validate_pb').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								//$('td#B_Validation_').css({});

							}
							if(res==15){
								$('div#validate_pc').find('#font_label').empty();
								$('div#validate_pc').css({"width":"55px"});
								$('td#validate_pc').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								//$('td#C_Validation_').css({});
							}
							//	if(res==16)
							if(res==16){
								$('div#validate_pd').find('#font_label').empty();
								$('div#validate_pd').css({"width":"55px"});
								$('td#validate_pd').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
							
							}if(res==17){
								$('div#validate_pe').find('#font_label').empty();
								$('div#validate_pe').css({"width":"55px"});
								$('td#validate_pe').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								//$('td#E_Validation_').css({});
							}
						}				
					}

					// tinay editer: ce message apparait direct dans la ,page paie.
					$('#mess_non_vide_pb').hide();
				}
			});//fn verif 
 			$('#SynthPaie').click(function(){
				$.ajax({
					type:'GET',
					url:'cyclePaie/synthese.php',
					success:function(e){
						$('#ContentSynthAchat').html(e).show();
						$('#contenue_rsci').hide();
						$('#contRsciPaie').hide();
					}
				});
 			});
			$('#paiea').click(function(){		
				$('#contenue_rsci').hide();
				mission_id=document.getElementById("txt_mission_id").value;	
				enterpriseId=$('#enterpriseId').val();
				$.ajax({
					type:'POST',
					url:'cyclePaie/Paiea/php/countPostCycleId.php',
					data:{mission_id:mission_id},
					success:function(e){	
						if(e==0){
							$.ajax({
								type:'POST',
								url:'cyclePaie/Paiea/form/frmPoste.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contPostePa').html(e).show();
									$('#contRsciPaie').hide();
								}
							});
						}
						else{
							$.ajax({
								type:'POST',
								url:'cyclePaie/Paiea/php/getEseIdMissId.php',
								data:{mission_id:mission_id},
								success:function(e1){
									$.ajax({							
										type:'POST',
										url:'cyclePaie/Paiea/form/Interface_pa_Secondaire.php',
										data:{mission_id:mission_id, entrepiseId:e1},
										success:function(e2){
											$('#contpa').html(e2).show();
											$('#contRsciPaie').hide();
										}
									});
								}					
							});
						}
					}
				});	
			});
			$('#validate_pa').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cyclePaie/Paiea/php/detect_synthese_existant_pa.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==0){
							$('#mess_non_vide_pb').show();
							document.getElementById("validate_pa").disabled=true;
							document.getElementById("validate_pb").disabled=true;
							document.getElementById("validate_pc").disabled=true;
							document.getElementById("validate_pd").disabled=true;
							document.getElementById("validate_pe").disabled=true;
						}
						else{
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paiea/form/Interface_pa_Superviseur.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#contSupPa').html(e).show();
										$('#contRsciPaie').hide();
									}
								});	
							}
						}
					});	
				});
			//Evenement de l'objectif b superviseur	

			$('#validate_pb').click(function()
			{

				mission_id=document.getElementById("mission_id_index").value;
				//alert("TAFA PB"+mission_id);;
				$.ajax({
					type:'POST',
					url:'cyclePaie/Paieb/php/cpt_pb.php',
					data:{mission_id:mission_id},
					success:function(e){
						//alert(e);;
						if(e==15)
						{
							$.ajax({
								type:'POST',
								url:'cyclePaie/Paieb/form/Interface_pb_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									//alert(e);
									 $('#contSupPb').html(e).show();
									$('#contRsciPaie').hide();
								}
							});
						}
						else{
							$('#mess_vide_pa').show();
							document.getElementById("validate_pa").disabled=true;
							document.getElementById("validate_pb").disabled=true;
							document.getElementById("validate_pc").disabled=true;
							document.getElementById("validate_pd").disabled=true;
							document.getElementById("validate_pe").disabled=true;
						}
					}
				
				});

			});
			
			$('#validate_pc').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cyclePaie/Paiec/php/cpt_pc.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==26){
							$.ajax({
								type:'POST',
								url:'cyclePaie/Paiec/form/Interface_pc_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupPc').html(e).show();
									$('#contRsciPaie').hide();
								}
							});
						}
						else{
							$('#mess_vide_pa').show();
							document.getElementById("validate_pa").disabled=true;
							document.getElementById("validate_pb").disabled=true;
							document.getElementById("validate_pc").disabled=true;
							document.getElementById("validate_pd").disabled=true;
							document.getElementById("validate_pe").disabled=true;
						}
					}
				
				});

			});

			$('#validate_pd').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cyclePaie/Paied/php/cpt_pd.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==5){
							$.ajax({
								type:'POST',
								url:'cyclePaie/Paied/form/Interface_pd_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupPd').html(e).show();
									$('#contRsciPaie').hide();
								}
							});
						}
						else{
							$('#mess_vide_pa').show();
							document.getElementById("validate_pa").disabled=true;
							document.getElementById("validate_pb").disabled=true;
							document.getElementById("validate_pc").disabled=true;
							document.getElementById("validate_pd").disabled=true;
							document.getElementById("validate_pe").disabled=true;
						}
					}
				
				});

			});

			$('#validate_pe').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cyclePaie/Paiee/php/cpt_pe.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==8){
							$.ajax({
								type:'POST',
								url:'cyclePaie/Paiee/form/Interface_pe_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupPe').html(e).show();
									$('#contRsciPaie').hide();
								}
							});
						}
						else{
							$('#mess_vide_pa').show();
							document.getElementById("validate_pa").disabled=true;
							document.getElementById("validate_pb").disabled=true;
							document.getElementById("validate_pc").disabled=true;
							document.getElementById("validate_pd").disabled=true;
							document.getElementById("validate_pe").disabled=true;
						}
					}
				
				});

			});


			//Retour au menu poste clé
			$('#RetourRsciPaie').click(function(){
				$('#dv_cont_menu_rsci').show();
				$('#contRsciPaie').hide();
				$('#transparent').remove();
				$('#ongulet').fadeTo('slow',1);
			});
			//evenement de l'objectif c dans le menu auditeur
			$('#paieb').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cyclePaie/Paieb/php/cpt_pb.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cyclePaie/Paieb/load/load_rep_pb.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_pb').html(e).show();
									$('#contpb').show();
									$('#contRsciPaie').hide();
									$('#Interface_Question_pb').hide();
									$('#dv_table_pb').show();
								}
							});					
						}
						else{
							$('#contpb').show();
							$('#contRsciPaie').hide();
							$('#Interface_Question_pb').show();
						}
					}
				});
			});

			$('#paiec').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cyclePaie/Paiec/php/cpt_pc.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cyclePaie/Paiec/load/load_rep_pc.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_pc').html(e).show();
									$('#contpc').show();
									$('#contRsciPaie').hide();
									$('#Interface_Question_pc').hide();
									$('#dv_table_pc').show();
								}
							});					
						}
						else{
							$('#contpc').show();
							$('#contRsciPaie').hide();
							$('#Interface_Question_pc').show();
						}
					}
				});		
			});

			$('#paied').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cyclePaie/Paied/php/cpt_pd.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cyclePaie/Paied/load/load_rep_pd.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_pd').html(e).show();
									$('#contpd').show();
									$('#contRsciPaie').hide();
									$('#Interface_Question_pd').hide();
									$('#dv_table_pd').show();
								}
							});					
						}
						else{
							$('#contpd').show();
							$('#contRsciPaie').hide();
							$('#Interface_Question_pd').show();
						}
					}
				});		
			});

			$('#paiee').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cyclePaie/Paiee/php/cpt_pe.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cyclePaie/Paiee/load/load_rep_pe.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_pe').html(e).show();
									$('#contpe').show();
									$('#contRsciPaie').hide();
									$('#Interface_Question_pe').hide();
									$('#dv_table_pe').show();
								}
							});					
						}
						else{
							$('#contpe').show();
							$('#contRsciPaie').hide();
							$('#Interface_Question_pe').show();
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
		<label class="marge_Titre">Evaluation du contrôle des paies</label> <label class="margin_Code">Code : FC4 </label>
	</div>-->
	<div id="fond_Index" align="center">
		<table  width="100%">
			<tr>
				<td class="label_Titre_Evaluation" align="center">
					<div class="img_cycle"><img src="img/iconswidgets/paie.png"></div>
					<div class="titre_cycle"><label>Cycle Paie</label></div>
					<input type="text" id="mission_id_index" value="<?php echo $mission_id; ?>" style="display:none;"/>
				</td>
			</tr>
		</table>
		<table width="90%">
			<tr  class="label_Evaluation" height="110" align="center" >
				<td  width="50%" id="paiea" <?php if($fonct_id_a>0) echo 'bgcolor=#fff'; else echo'bgcolor="#f5f5f5"';?> class="td_Image" >
					<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id"  style="display:none;"/>
					<img class="label_img a" src="img/alphabet/A.png"></img>
					<label >Séparation de fonction</label>
				</td>
				<td class="tdb_button" id="validate_pa">
					<div id="validate_pa" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_pa" class="bouton" />-->
				</td>
				<td  id="paieb" width="50%" <?php if($b>0) echo 'bgcolor=#fff'; else echo'bgcolor="#f5f5f5"';?> class="td_Image">
					<img class="label_img b" src="img/alphabet/B.png"></img>
					<label>Exhaustivité</label>
				</td>
				<td class="tdb_button" id="validate_pb">
					<div id="validate_pb" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_pb" class="bouton" />-->
				</td>
			</tr>
			<tr class="label_Evaluation" height="110" align="center">
				<td  id="paiec" width="50%" <?php if($c>0) echo 'bgcolor=#fff'; else echo'bgcolor="#f5f5f5"'; ?> class="td_Image">
					<img class="label_img c" src="img/alphabet/C.png"></img>
					<label>Réalité</label>
				</td>
				<td class="tdb_button" id="validate_pc">
					<div id="validate_pc" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_pc" class="bouton" />-->
				</td>
				<td  id="paied" width="50%" <?php if($d>0) echo 'bgcolor=#fff'; else echo'bgcolor="#f5f5f5"'; ?> class="td_Image">
					<img class="label_img d" src="img/alphabet/D.png"></img>
					<label>Evaluation</label>
				</td>
				<td class="tdb_button" id="validate_pd">
					<div id="validate_pd" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_pd" class="bouton" />-->
				</td>
			</tr>
			<tr class="label_Evaluation" height="110" align="center">
				<td  id="paiee" width="50%" <?php if($e>0) echo 'bgcolor=#fff'; else echo'bgcolor="#f5f5f5"';?> class="td_Image">
					<img class="label_img e" src="img/alphabet/F.png"></img>
					<label>Imputation</label>
				</td>
				<td class="tdb_button" id="validate_pe">
					<div id="validate_pe" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_pe" class="bouton" />-->
				</td>
			</tr>
		</table>
		<br />
		<iframe style="display:none;" name="uploadFrame"></iframe>		
		<?php 
			include $_SERVER["DOCUMENT_ROOT"]."/RSCI/layout/modal/modal-flowchart-upload-paie.php";
		?>	
		<input type="button"  class="bouton-md poplight" value="flowchart" data-w="500" target="popup_paie"  style="width: 250px;"/>
		<input type="button" class="bouton" value="Synthèse du cycle Paie et Personnel" id="SynthPaie" style="width: 250px;"/>
		<input type="button" value="Retour" class="bouton" id="RetourRsciPaie"/>
		<input type="text" id="enterpriseId" value="<?php echo $enterpriseId; ?>" style="display:none;" />
		
		<div id="mess_non_vide_pb"><?php include $_SERVER["DOCUMENT_ROOT"].'/cyclePaie/Paieb/sms/mess_non_pb.php'; ?></div>
	</div>
</body>
