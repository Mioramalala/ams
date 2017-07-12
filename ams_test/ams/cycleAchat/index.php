 <?php
	 @session_start();
 	$mission_id=$_SESSION['idMission'];
	include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';

	$reponse0=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);
	$donnees0=$reponse0->fetch();
	$enterpriseId=$donnees0['ENTREPRISE_ID'];

	// tinay: Cette table ne contient rien.
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
	<meta charset="utf-8">
	<link href="cycleAchat/cycle_achat_a/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleAchat/cycle_achat_a/css/div_aca.css" rel="stylesheet" type="text/css" />
	<link href="cycleAchat/cycle_achat_a/css/class.css" rel="stylesheet" type="text/css" />

	<link href="cycleAchat/cycle_achat_b/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleAchat/cycle_achat_b/css/div_acb.css" rel="stylesheet" type="text/css" />
	<link href="cycleAchat/cycle_achat_b/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleAchat/cycle_achat_b/css/div_fermer_quest_objectif_acb.css" rel="stylesheet" type="text/css" />
	<!--  -->
	<link href="RSCI/assets/css/popup_upload.css" rel="stylesheet" type="text/css" />

<!--	<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script> -->
   <script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/bpopup.min.js"></script> 
	<script type="text/javascript" src="cycleAchat/cycle_achat_js/js_a.js"></script>
	<script type="text/javascript" src="cycleAchat/cycle_achat_js/js_b_.js"></script>

	<script type="text/javascript" src="cycleAchat/plugins/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="RSCI/assets/js/popup_upload.js"></script>

	<script>

		// Droit cycle by Tolotra
        // Page : RSCI -> Cycle achat
        // Tâche : Revue Contrôles Achats, numéro 1
        $.ajax(
            {
                type: 'POST',
                url: 'droitCycle.php',
                data: {task_id: 1},
                success: function (e) {
                    var result = 0 === Number(e);

                    $("#btn-flowchart").attr('disabled', result).css({
                        "color": "#FFF",
                        "background-color": "#BBB"
                    });
                }
            }
        );


									/******************          
									*******************/

		// tinay : Le seul script appelé automatiquement paar le système dans ce fichier lors qu'on entre dans l'onglet RSCI
		$(function(){
				$.ajax({ //Debut verificaton validation // ANDO
				type:'GET',
				url:'cycleAchat/verification.php', // tinay verifie si une conclusion est déjà enregistrée pour chaque fonction du cycle Achat.
				data:{},
				success:function(e){
					//alert (e);
					if(e){

						//tinay editer: 
						// alert('ID de conclusion associé au cycle achat: ' +e);

						var cycl= e.split(",");
						var longuer= cycl.length;
						for(var i=0;i<longuer;i++){
							var res= cycl[i];

							// Pour fonction separation de fonction
							if(res==1){
								$('div#validate_aca').find('#font_label').empty();
								$('div#validate_aca').css({"width":"60px"});

								//mettre un check vers en cas de conclusion enregistrée.
								$('td#validate_aca').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								}
							if(res==2){
								$('td#B_Validation_').find('#font_label').empty();
								$('div#B_Validation_').css({"width":"60px"});
								$('td#B_Validation_').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								//$('td#B_Validation_').css({});

							}
							if(res==3){
								$('div#C_Validation_').find('#font_label').empty();
								$('div#C_Validation_').css({"width":"60px"});
								$('td#C_Validation_').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								//$('td#C_Validation_').css({});
							}
							if(res==4){
								$('div#D_Validation_ > #font_label').empty();
								$('div#D_Validation_').css({"width":"60px"});
								$('td#D_Validation_').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
							
							}if(res==5){
								$('div#E_Validation_').find('#font_label').empty();
								$('div#E_Validation_').css({"width":"60px"});
								$('td#E_Validation_').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
								//$('td#E_Validation_').css({});
							}if(res==6){
								$('td#F_Validation_').find('#font_label').empty();
								$('div#F_Validation_').css({"width":"60px"});
								$('td#F_Validation_').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
							}


						}				
					}else {
						// tinay editer:
						// alert('Aucune conclusion enregistrée pour le Cycle achat');
					}
				}
			});//fn verif


 			$('#SynthAchat').click(function(){
				$.ajax({
					type:'GET',
					url:'cycleAchat/synthese.php',
					success:function(e){
						$('#ContentSynthAchat').html(e).show();
						$('#contenue_rsci').hide();
					}
				});
 			});
			$('#cycle_achat_A').click(function(){
				$('#contenue_rsci').hide();
				mission_id=document.getElementById("txt_mission_id").value;	
				enterpriseId=$('#enterpriseId').val();
				$.ajax({
					type:'POST',
					url:'cycleAchat/cycle_achat_a/php/countPostCycleId.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==0){
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_a/form/frmPoste.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contPosteaca').html(e).show();
									$('#contenue_rsci').hide();
								}
							});
						}
						else{
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_a/php/getEseIdMissId.php',
								data:{mission_id:mission_id},
								success:function(e1){
									$.ajax({							
										type:'POST',
										url:'cycleAchat/cycle_achat_a/form/Interface_aca_Secondaire.php',
										data:{mission_id:mission_id, entrepiseId:e1},
										success:function(e2){
											$('#contaca').html(e2).show();
											$('#contenue_rsci').hide();
										}
									});
								}					
							});
						}
					}
				});			
			});

 			// Tinay: Valider separation de fonction
			$('#validate_aca').click(function(){

				var nom= $("#makaNom").val();
				var mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
						type:"POST",
						url:"droitAccUtil.php", // apppel du fichier de gestion de droit.
						data:{nom:nom,mission_id:mission_id},
						success:function(e){

							if(e!=0){
										
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_a/form/Interface_aca_Superviseur.php', // tinay: template valider separation de fonction
									data:{mission_id:mission_id},
									success:function(e){
										$('#contSupaca').html(e).show();
										$('#contenue_rsci').hide();
									}
								});	
										
				
							}else{
								alert("Vous n'êtes pas autorisé!");
							}
						}
					});	
			});

			//Evenement de l'objectif b superviseur		
			$('#B_Validation_').click(function(){
				var nom= $("#makaNom").val();
				var	mission_id=document.getElementById("mission_id_index").value;
				
				$.ajax({
					type:"POST",
					url:"droitAccUtil.php",

					data:{nom:nom,mission_id:mission_id},
					success:function(e){
						if(e!=0){
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_b/form/Interface_acb_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#dv_cont_obj_sup_b').html(e).show();
									$('#contenue_rsci').hide();
								}
							});
							
							
						}else{
							alert("Vous n'êtes pas autorisé!");
						}
					}
				});
			});
			//Evenement de l'objectif c superviseur		
			$('#C_Validation_').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				var nom= $("#makaNom").val();
					// alert(nom);
					$.ajax({
						type:"POST",
						url:"droitAccUtil.php",
						data:{nom:nom,mission_id:mission_id},
						success:function(e){
							// alert(e);
							if(e!=0){
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_c/form/Interface_c_Superviseur.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#dv_cont_obj_c_sup').html(e).show();
										$('#contenue_rsci').hide();
									}
								});
								}
								else{
									alert("Vous n'êtes pas autorisé!");
								}
							}
						});
			});
			//Evenement de l'objectif c superviseur		
			$('#D_Validation_').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				var nom= $("#makaNom").val();
					// alert(nom);
							$.ajax({
								type:"POST",
								url:"droitAccUtil.php",
								data:{nom:nom,mission_id:mission_id},
								success:function(e){
									// alert(e);
									if(e!=0){
											$.ajax({
												type:'POST',
												url:'cycleAchat/cycle_achat_d/form/Interface_d_Superviseur.php',
												data:{mission_id:mission_id},
												success:function(e){
													$('#dv_cont_obj_d_sup').html(e).show();
													$('#contenue_rsci').hide();
												}
											});
											}
								else{
									alert("Vous n'êtes pas autorisé!");
								}
							}
						});	
			});
			//Evenement de l'objectif c superviseur		
			$('#E_Validation_').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				var nom= $("#makaNom").val();
					// alert(nom);
							$.ajax({
								type:"POST",
								url:"droitAccUtil.php",
								data:{nom:nom,mission_id:mission_id},
								success:function(e){
									// alert(e);
							if(e!=0)
							{
				
									$.ajax({
										type:'POST',
										url:'cycleAchat/cycle_achat_e/form/Interface_e_Superviseur.php',
										data:{mission_id:mission_id},
										success:function(e){
											$('#dv_cont_obj_e_sup').html(e).show();
											$('#contenue_rsci').hide();
										}
									});
							}
						else{
							alert("Vous n'êtes pas autorisé!");
						}
					}
				});	
			});
			//Evenement de l'objectif c superviseur		
			$('#F_Validation_').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
					var nom= $("#makaNom").val();
					// alert(nom);
							$.ajax({
								type:"POST",
								url:"droitAccUtil.php",
								data:{nom:nom,mission_id:mission_id},
								success:function(e){
									// alert(e);
									if(e!=0){
											$.ajax({
												type:'POST',
												url:'cycleAchat/cycle_achat_f/form/Interface_f_Superviseur.php',
												data:{mission_id:mission_id},
												success:function(e){
													$('#dv_cont_obj_f_sup').html(e).show();
													$('#contenue_rsci').hide();
												}
											});
				
						}
					else{
						alert("Vous n'êtes pas autorisé!");
					}
				}
				});
			});
			
			//Retour au menu poste clé
			$('#bt_ret_menu_index').click(function(){
				$('#dv_cont_menu_rsci').show();
				$('#contenue_rsci').hide();
				$('#contenue_poste_a').hide();
				$('#transparent').remove();
				$('#ongulet').fadeTo('slow',1);
			});
			
			// tinay : Achat Exhaustivité.
	        $('#cycle_achat_B').click(function(){
	            $('#progressbarrsci').show();
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',

					// on compte les objectifs enregistrés dans 'tab_objectif' selon la mission et le cycle.

					url:'cycleAchat/cycle_achat_b/php/cpt_acb.php',
					data:{mission_id:mission_id},
					/*
					 * Activation de l'interface des questionnaires;
					 * Contrainte : Si une commentaire est activée ou non;
					 * 1) - Soit affichage des questionnaires;
					 * 2) - Soit non affichage des questionnaire;
					 * @param mission_id;
					 * @class;
					 * @function;
					 * return interface_acb_Secondaire;
					 */
					success:function(e1){

						// Tinay
						//alert(mission_id); // mission 56


						if(e1>0){

							// existe questionnaire (Oui/non) enregistré.

							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_b/form/Interface_acb_Secondaire.php',
								data:{mission_id:mission_id},
								/*
								 * Les variables de l'interface_acb_secondaire;
								 * @param mission_id;
								 * @class;
								 * @function;
								 * return 1) - interface_acb_secondaire , 2) - Interface_acb;
								 */
								success:function(e){
									//alert(e);
									$('#dv_cont_obj_b').html(e).show();
									$('#contenue_rsci').hide();
									$('#Interface_Question_acb').hide();
									$('#dv_table_acb').show();
		                            $('#progressbarrsci').hide();
								}
							});					
						
						}else{

							// pas de questionnaire oui/non enregistrés !
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_b/form/Interface_acb_Secondaire.php',
								data:{mission_id:mission_id},
								success:function(e){
									// alert("e2"+e);
									$('#dv_cont_obj_b').html(e).show();
									$('#contenue_rsci').hide();
									$('#Interface_Question_acb').show();
		                            $('#progressbarrsci').hide();
									//alert("e=01");
								}
							});
						}
					}
				});
			});

			//evenement de l'objectif c dans le menu auditeur
			$('#cycle_achat_C').click(function(){
				
				mission_id=document.getElementById("mission_id_index").value;
				
				$.ajax({
					
					type:'POST',
					url:'cycleAchat/cycle_achat_c/php/cpt_c.php',
					data:{mission_id:mission_id},
					
					success:function(e1){

						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_c/form/Interface_c_Secondaire.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#dv_cont_obj_c').html(e).show();
									$('#contenue_rsci').hide();
									$('#Interface_Question_c').hide();
									$('#dv_table_c').show();
								}
							});					
						
						} else {
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_c/form/Interface_c_Secondaire.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#dv_cont_obj_c').html(e).show();
									$('#contenue_rsci').hide();
									$('#Interface_Question_c').show();
								}
							});
						}
					}
				});
			});

			$('#cycle_achat_d').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleAchat/cycle_achat_d/php/cpt_d.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_d/form/Interface_d_Secondaire.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#dv_cont_obj_d').html(e).show();
									// $('#dv_cont_obj_d').show();
									$('#contenue_rsci').hide();
									$('#Interface_Question_d').hide();
									$('#dv_table_d').show();
								}
							});					
						}
						else{
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_d/form/Interface_d_Secondaire.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#dv_cont_obj_d').html(e).show();
									$('#contenue_rsci').hide();
									$('#Interface_Question_d').show();
								}
							});
						}
					}
				});
			});
			$('#cycle_achat_e').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleAchat/cycle_achat_e/php/cpt_e.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_e/form/Interface_e_Secondaire.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#dv_cont_obj_e').html(e).show();
									// $('#dv_cont_obj_e').show();
									$('#contenue_rsci').hide();
									$('#Interface_Question_e').hide();
									$('#dv_table_e').show();
								}
							});					
						}
						else{
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_e/form/Interface_e_Secondaire.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#dv_cont_obj_e').html(e).show();
									$('#contenue_rsci').hide();
									$('#Interface_Question_e').show();
								}
							});
						}
					}
				});
			});
			$('#cycle_achat_f').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleAchat/cycle_achat_f/php/cpt_f.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_f/form/Interface_f_Secondaire.php',
								data:{mission_id:mission_id},
								success:function(e){
									// $('#frm_tab_res_f').html(e).show();
									$('#dv_cont_obj_f').html(e).show();
									$('#contenue_rsci').hide();
									$('#Interface_Question_f').hide();
									$('#dv_table_f').show();
								}
							});					
						}
						else{
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_f/form/Interface_f_Secondaire.php',
								data:{mission_id:mission_id},
								success:function(e){				
									$('#dv_cont_obj_f').html(e).show();
									$('#contenue_rsci').hide();
									$('#Interface_Question_f').show();
								}
							});
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
		<label class="marge_Titre">Evaluation du contrôle des fournisseurs</label> <label class="margin_Code">Code : FC1 </label>
	</div>-->

	<div id="fond_Index" align="center">
		<table  width="90%">
			<tr>
				<td class="label_Titre_Evaluation" align="center">
					<div class="img_cycle"><img src="img/iconswidgets/achat.png"></div>
					<div class="titre_cycle"><label> Cycle Achat</label></div>
					<input type="text" id="mission_id_index" value="<?php echo $mission_id; ?>" style="display:none;"/>
				</td>
			</tr>
		</table>
		
		<p>tinay /cycleAchat/index achat.php</p>

		<!-- tinay -->
		<?php echo @$_SESSION["nom"] .'_mission: ' .$mission_id; ?>

		<table width="90%">
			<tr class="label_Evaluation" height="110" align="center" >

				<!-- Tinay: Separation de fonction -->
				<td width="50%"  id="cycle_achat_A" <?php if($fonct_id_a>0) {echo 'bgcolor="#fff"';} else{echo 'bgcolor="#f5f5f5"';} ?>  class="td_Image">
					<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id"  style="display:none;"/>
					<img class="label_img" src="img/alphabet/A.png"></img>
					<label>Séparation de fonction.</label>
				</td>
				<td class="tdb_button" id="validate_aca">
					<div id="validate_aca" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_aca" class="bouton" />-->
				</td>
				<td  width="50%" id="cycle_achat_B" <?php if($b>0){echo 'bgcolor="#fff"';} else{echo 'bgcolor="#f5f5f5"';} ?> class="td_Image">
					<img class="label_img ba" src="img/alphabet/B.png"></img>
					<label>Exhaustivité.</label>
				</td>
				<td class="tdb_button" id="B_Validation_">
					<div id="B_Validation_" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="B_Validation_" class="bouton" />-->
				</td>
			</tr>
			<tr class="label_Evaluation" height="110" align="center">
				<td  width="50%" id="cycle_achat_C" <?php if($c>0) {echo 'bgcolor="#fff"';} else{echo 'bgcolor="#f5f5f5"';} ?> class="td_Image">
					<img class="label_img c" src="img/alphabet/C.png"></img>
					<label>Correspondance</label><br />
				</td>
				<td class="tdb_button" id="C_Validation_">
					<div id="C_Validation_" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="C_Validation_" class="bouton" />-->
				</td>
				<td  width="50%" id="cycle_achat_d" <?php if($d>0){echo 'bgcolor="#fff"';} else{echo 'bgcolor="#f5f5f5"';} ?> class="td_Image">
					<img class="label_img da" src="img/alphabet/D.png"></img>
					<label>Evaluation.</label>
				</td>
				<td class="tdb_button" id="D_Validation_">
					<div id="D_Validation_" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="D_Validation_" class="bouton" />-->
				</td>
			</tr>
			<tr class="label_Evaluation" height="110" align="center">
				<td  width="50%" id="cycle_achat_e" class="td_Image" <?php if($e>0) {echo 'bgcolor="#fff"';} else{echo 'bgcolor="#f5f5f5"';} ?> >
					<img class="label_img e" src="img/alphabet/E.png"></img>
					<label>Bonne période</label>
				</td>
				<td class="tdb_button" id="E_Validation_">
					<div id="E_Validation_" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="E_Validation_" class="bouton" />-->
				</td>
				<td  width="50%" id="cycle_achat_f" class="td_Image" <?php if($f>0) {echo 'bgcolor="#fff"';}else{echo 'bgcolor="#f5f5f5"';} ?>  bgcolor="#7da0f8">
					<img class="label_img fa" src="img/alphabet/F.png"></img>
					<label >Imputation</label><br /></td>
				<td class="tdb_button" id="F_Validation_">
					<div id="F_Validation_" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="F_Validation" class="bouton" />-->
				</td>
			</tr>
		</table>
		<br />
		<iframe style="display:none;" name="uploadFrame"></iframe> 
		<?php 
			include $_SERVER["DOCUMENT_ROOT"]."/RSCI/layout/modal/modal-flowchart-upload-achat.php" ;
		?>
		<input type="button"  class="bouton-md poplight" value="flowchart" data-w="500" target="popup_achat"  style="width: 250px;"/>
		<input type="button" class="bouton" value="Synthèse du cycle Achat" id="SynthAchat" style="width: 250px;"/>
		<input type="button" value="retour" class="bouton" id="bt_ret_menu_index"/>
		<input type="text" id="enterpriseId" value="<?php echo $enterpriseId; ?>" style="display:none;" />
	</div>

</body>
