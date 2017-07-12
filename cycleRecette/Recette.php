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
	
<head>
	<title>AMS | Cycle achat</title>

	<link href="cycleRecette/Recetteb/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recetteb/css/div_rb.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recetteb/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recetteb/css/div_fermer_quest_objectif_rb.css" rel="stylesheet" type="text/css" />

	<link href="cycleRecette/Recettea/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recettea/css/div_a.css" rel="stylesheet" type="text/css" />

	<link href="cycleRecette/Recettec/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recettec/css/div_rc.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recettec/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recettec/css/div_fermer_quest_objectif_rc.css" rel="stylesheet" type="text/css" />

	<link href="cycleRecette/Recetted/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recetted/css/div_rd.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recetted/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recetted/css/div_fermer_quest_objectif_rd.css" rel="stylesheet" type="text/css" /> 

	<link href="cycleRecette/Recettee/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recettee/css/div_re.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recettee/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleRecette/Recettee/css/div_fermer_quest_objectif_re.css" rel="stylesheet" type="text/css" /> 

	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<link href="RSCI/assets/css/popup_upload.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="RSCI/assets/js/popup_upload.js"></script>
	

	<script>
		$(function(){
			$.ajax({ //Debut verificaton validation // ANDO
				type:'GET',
				url:'cycleRecette/verification.php',
				data:{},
				success:function(e){
					//alert (e);
					if(e){
						//alert(e);
						var cycl= e.split(",");
						//alert(cycl);
						var longuer= cycl.length;
						for(var i=0;i<longuer;i++){
							var res= cycl[i];
							//A
							if(res==100){
								$('div#validate_ra').find('#font_label').empty();
								$('div#validate_ra').css({"width":"55px"});
								$('td#validate_ra').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								}
							if(res==18){
								$('div#validate_rb').find('#font_label').empty();
								$('td#validate_rb').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								$('div#validate_rb').css({"width":"55px"});

							}
							if(res==19){
								$('div#validate_rc').find('#font_label').empty();
								$('td#validate_rc').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								$('div#validate_rc').css({"width":"55px"});
							}
							if(res==20){
								$('div#validate_rd').find('#font_label').empty();
								$('div#validate_rd').css({"width":"55px"});
								$('td#validate_rd').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
							
							}
							if(res==21){
								$('div#validate_re').find('#font_label').empty();
								$('div#validate_re').css({"width":"55px"});
								$('td#validate_re').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
							
							}
						}				
					}
				}
			});//fn verif 
			$('#SynthTresorR').click(function(){
				$.ajax({
					type:'GET',
					url:'cycleRecette/synthese.php',
					success:function(e){
						$('#ContentSynthAchat').html(e).show();
						$('#contenue_rsci').hide();
						$('#contRsciRecette').hide();
					}
				});
 			});
 			
 			$('#Recettea').click(function(){		
				$('#contenue_rsci').hide();
				mission_id=document.getElementById("txt_mission_id").value;	
				enterpriseId=$('#enterpriseId').val();
				$.ajax({
					type:'POST',
					url:'cycleRecette/Recettea/php/countPostCycleId.php',
					data:{mission_id:mission_id},
					success:function(e){	
						if(e==0){
							$.ajax({
								type:'POST',
								url:'cycleRecette/Recettea/form/frmPoste.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contPosteRa').html(e).show();
									$('#contRsciRecette').hide();
								}
							});
						}
						else{
							$.ajax({
								type:'POST',
								url:'cycleRecette/Recettea/php/getEseIdMissId.php',
								data:{mission_id:mission_id},
								success:function(e1){
									$.ajax({							
										type:'POST',
										url:'cycleRecette/Recettea/form/Interface_ra_Secondaire.php',
										data:{mission_id:mission_id, entrepiseId:e1},
										success:function(e2){
											$('#contra').html(e2).show();
											$('#contRsciRecette').hide();
										}
									});
								}					
							});
						}
					}
				});	
			});

			$('#validate_ra').click(function(){
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
									url:'cycleRecette/Recettea/php/detect_synthese_existant_ra.php',
									data:{mission_id:mission_id},
									success:function(e){
										if(e==0){
											$('#mess_vide_recette').show();
											document.getElementById("validate_ra").disabled=true;
											document.getElementById("validate_rb").disabled=true;
											document.getElementById("validate_rc").disabled=true;
											document.getElementById("validate_rd").disabled=true;
											document.getElementById("validate_re").disabled=true;
										}
										else{
											$.ajax({
												type:'POST',
												url:'cycleRecette/Recettea/form/Interface_ra_Superviseur.php',
												data:{mission_id:mission_id},
												success:function(e){
													$('#contSupRa').html(e).show();
													$('#contRsciRecette').hide();
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
			//Evenement de l'objectif b Superviseur	

			$('#validate_rb').click(function(){
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
								url:'cycleRecette/Recetteb/php/cpt_rb.php',
								data:{mission_id:mission_id},
								success:function(e){
									if(e==20){
										$.ajax({
											type:'POST',
											url:'cycleRecette/Recetteb/form/Interface_rb_Superviseur.php',
											data:{mission_id:mission_id},
											success:function(e){
												$('#contSupRb').html(e).show();
												$('#contRsciRecette').hide();
											}
										});
									}
									else{
										$('#mess_vide_recette').show();
										document.getElementById("validate_ra").disabled=true;
										document.getElementById("validate_rb").disabled=true;
										document.getElementById("validate_rc").disabled=true;
										document.getElementById("validate_rd").disabled=true;
										document.getElementById("validate_re").disabled=true;
									}
								}
							
							});
						}else{
							alert('Vous n\'êtes pas autorisés à valider!');
						}
					}
				});
			});
			
			$('#validate_rc').click(function(){
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
								url:'cycleRecette/Recettec/php/cpt_rc.php',
								data:{mission_id:mission_id},
								success:function(e){
									if(e==9){
										$.ajax({
											type:'POST',
											url:'cycleRecette/Recettec/form/Interface_rc_Superviseur.php',
											data:{mission_id:mission_id},
											success:function(e){
												$('#contSupRc').html(e).show();
												$('#contRsciRecette').hide();
											}
										});
									}
									else{
										$('#mess_vide_recette').show();
										document.getElementById("validate_ra").disabled=true;
										document.getElementById("validate_rb").disabled=true;
										document.getElementById("validate_rc").disabled=true;
										document.getElementById("validate_rd").disabled=true;
										document.getElementById("validate_re").disabled=true;
									}
								}
							
							});
						}else{
							alert('Vous n\'êtes pas autorisés à valider!');
						}	
					}
				});
			});

			$('#validate_rd').click(function(){
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
								url:'cycleRecette/Recetted/php/cpt_rd.php',
								data:{mission_id:mission_id},
								success:function(e){
									if(e==9){
										$.ajax({
											type:'POST',
											url:'cycleRecette/Recetted/form/Interface_rd_Superviseur.php',
											data:{mission_id:mission_id},
											success:function(e){
												$('#contSupRd').html(e).show();
												$('#contRsciRecette').hide();
											}
										});
									}
									else{
										$('#mess_vide_recette').show();
										document.getElementById("validate_ra").disabled=true;
										document.getElementById("validate_rb").disabled=true;
										document.getElementById("validate_rc").disabled=true;
										document.getElementById("validate_rd").disabled=true;
										document.getElementById("validate_re").disabled=true;
									}
								}
							
							});
						}else{
							alert('Vous n\'êtes pas autorisés à valider!');
						}
					
					}
				});

			});

			$('#validate_re').click(function(){
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
								url:'cycleRecette/Recettee/php/cpt_re.php',
								data:{mission_id:mission_id},
								success:function(e){
									if(e==7){
										$.ajax({
											type:'POST',
											url:'cycleRecette/Recettee/form/Interface_re_Superviseur.php',
											data:{mission_id:mission_id},
											success:function(e){
												$('#contSupRe').html(e).show();
												$('#contRsciRecette').hide();
											}
										});
									}
									else{
										$('#mess_vide_recette').show();
										document.getElementById("validate_ra").disabled=true;
										document.getElementById("validate_rb").disabled=true;
										document.getElementById("validate_rc").disabled=true;
										document.getElementById("validate_rd").disabled=true;
										document.getElementById("validate_re").disabled=true;
									}
								}
							
							});
						}else{
							alert('Vous n\'êtes pas autorisés à valider!');
						}
					}
				});
			});

			//Retour au menu poste clé
			$('#RetourRsciRecette').click(function(){
				$('#dv_cont_menu_rsci').show();
				$('#contRsciRecette').hide();
				$('#transparent').remove();
				$('#ongulet').fadeTo('slow',1);
			});
			//evenement de l'objectif c dans le menu auditeur
			$('#Recetteb').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleRecette/Recetteb/php/cpt_rb.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleRecette/Recetteb/load/load_rep_rb.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_rb').html(e).show();
									$('#contrb').show();
									$('#contRsciRecette').hide();
									$('#Interface_Question_rb').hide();
									$('#dv_table_rb').show();
								}
							});					
						}
						else{
							$('#contrb').show();
							$('#contRsciRecette').hide();
							$('#Interface_Question_rb').show();
						}
					}
				});
			});

			$('#Recettec').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleRecette/Recettec/php/cpt_rc.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleRecette/Recettec/load/load_rep_rc.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_rc').html(e).show();
									$('#contrc').show();
									$('#contRsciRecette').hide();
									$('#Interface_Question_rc').hide();
									$('#dv_table_rc').show();
								}
							});					
						}
						else{
							$('#contrc').show();
							$('#contRsciRecette').hide();
							$('#Interface_Question_rc').show();
						}
					}
				});		
			});

			$('#Recetted').click(function(){
			mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleRecette/Recetted/php/cpt_rd.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleRecette/Recetted/load/load_rep_rd.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_rd').html(e).show();
									$('#contrd').show();
									$('#contRsciRecette').hide();
									$('#Interface_Question_rd').hide();
									$('#dv_table_rd').show();
								}
							});					
						}
						else{
							$('#contrd').show();
							$('#contRsciRecette').hide();
							$('#Interface_Question_rd').show();
						}
					}
				});		
			});

			$('#Recettee').click(function(){
			mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleRecette/Recettee/php/cpt_re.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleRecette/Recettee/load/load_rep_re.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_re').html(e).show();
									$('#contre').show();
									$('#contRsciRecette').hide();
									$('#Interface_Question_re').hide();
									$('#dv_table_re').show();
								}
							});					
						}
						else{
							$('#contre').show();
							$('#contRsciRecette').hide();
							$('#Interface_Question_re').show();
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
		<label class="marge_Titre">Evaluation du contrôle des Recettes</label> <label class="margin_Code">Code : FC5 </label>
	</div>-->
	<div id="fond_Index" align="center">
		<table  width="100%">
			<tr>
				<td class="label_Titre_Evaluation" align="center">
					<div class="img_cycle"><img src="img/iconswidgets/tresorerie.png"></div>
				<div class="titre_cycle"><label>Cycle Tr&eacute;sorerie - Recette</label></div>
					<input type="text" id="mission_id_index" value="<?php echo $mission_id; ?>" style="display:none;"/>
				</td>
			</tr>
		</table>
		<table width="90%">
			<tr  class="label_Evaluation" height="110" align="center" >
				<td  width="50%" id="Recettea" <?php if($fonct_id_a>0) echo 'bgcolor=#fff'; else echo'bgcolor="#f5f5f5"';?> class="td_Image">
					<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id"  style="display:none;"/>
					<img class="label_img a" src="img/alphabet/A.png"></img>
					<label >Séparation de fonction</label>
				</td>
				<td td class="tdb_button" id="validate_ra">
					<div id="validate_ra" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_ra" class="bouton" />-->
				</td>
				<td  id="Recetteb" width="50%" <?php if($b>0) echo 'bgcolor=#fff'; else echo'bgcolor="#f5f5f5"';?> class="td_Image">
					<img class="label_img b" src="img/alphabet/B.png"></img>
					<label>Exhaustivité</label>
				</td>
				<td td class="tdb_button" id="validate_rb">
					<div id="validate_rb" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_rb" class="bouton" />-->
				</td>
			</tr>
			<tr class="label_Evaluation" height="110" align="center">
				<td  id="Recettec" width="50%" <?php if($c>0) echo 'bgcolor=#fff'; else echo'bgcolor="#f5f5f5"';?> class="td_Image">
					<img class="label_img c" src="img/alphabet/D.png"></img>
					<label>Réalité</label>
				</td>
				<td td class="tdb_button" id="validate_rc">
					<div id="validate_rc" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_rc" class="bouton" />-->
				</td>
				<td  id="Recetted" width="50%" <?php if($d>0) echo 'bgcolor=#fff'; else echo'bgcolor="#f5f5f5"';?> class="td_Image">
					<img class="label_img d" src="img/alphabet/E.png"></img>
					<label>Bonne période</label>
				</td>
				<td td class="tdb_button" id="validate_rd">
					<div id="validate_rd" class="label_valid"><label id="font_label">Validation</label></div>

				</td>
			</tr>
			<tr class="label_Evaluation" height="110" align="center">
				<td  id="Recettee" width="50%" <?php if($c>0) echo 'bgcolor=#fff'; else echo'bgcolor="#f5f5f5"';?> class="td_Image">
					<img class="label_img e" src="img/alphabet/F.png"></img>
					<label>Evaluation</label>
				</td>
				<td td class="tdb_button" id="validate_re">
					<div id="validate_re" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_re" class="bouton" />-->
				</td>
			</tr>
		</table>
		<br />
		<iframe style="display:none;" name="uploadFrame"></iframe>		
		<?php 
			include $_SERVER["DOCUMENT_ROOT"]."/RSCI/layout/modal/modal-flowchart-upload-recette.php";
		?>
		<input type="button"  class="bouton-md poplight" value="flowchart" data-w="500" target="popup_recette"  style="width: 250px;"/>
		<input type="button" class="bouton" value="Synthèse du cycle Trésorerie" id="SynthTresorR" style="width: 250px;"/>
		<input type="button" value="Retour" class="bouton" id="RetourRsciRecette"/>
		<input type="text" id="enterpriseId" value="<?php echo $enterpriseId; ?>" style="display:none;" />
		
		<div id="mess_vide_recette"><?php include $_SERVER["DOCUMENT_ROOT"].'/cycleRecette/Recetteb/sms/mess_non_rb.php'; ?></div>
	</div>
</body>