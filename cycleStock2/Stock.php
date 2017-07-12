<?php
	@session_start(); 
	include 'connexion.php';

	$mission_id=$_SESSION['idMission'];
	$reponse=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();

	$eseId=$donnees['ENTREPRISE_ID'];
?>
<head>
	<title>AMS | Cycle achat</title>

	<link href="cycleStock/Stockb/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleStock/Stockb/css/div_stb.css" rel="stylesheet" type="text/css" />
	<link href="cycleStock/Stockb/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleStock/Stockb/css/div_fermer_quest_objectif_stb.css" rel="stylesheet" type="text/css" />

	<link href="cycleStock/Stocka/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleStock/Stocka/css/div_a.css" rel="stylesheet" type="text/css" />

	<link href="cycleStock/Stockc/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleStock/Stockc/css/div_stc.css" rel="stylesheet" type="text/css" />
	<link href="cycleStock/Stockc/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleStock/Stockc/css/div_fermer_quest_objectif_stc.css" rel="stylesheet" type="text/css" />

	<link href="cycleStock/Stockd/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleStock/Stockd/css/div_std.css" rel="stylesheet" type="text/css" />
	<link href="cycleStock/Stockd/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleStock/Stockd/css/div_fermer_quest_objectif_std.css" rel="stylesheet" type="text/css" /> 
	<script>
		$(function(){
 			$('#SynthStock').click(function(){
				$.ajax({
					type:'GET',
					url:'cycleStock/synthese.php',
					success:function(e){
						$('#ContentSynthAchat').html(e).show();
						$('#contenue_rsci').hide();
						$('#contRsciStock').hide();
					}
				});
 			});
			$('#stocka').click(function(){		
				$('#contenue_rsci').hide();
				mission_id=document.getElementById("txt_mission_id").value;	
				enterpriseId=$('#enterpriseId').val();
				$.ajax({
					type:'POST',
					url:'cycleStock/Stocka/php/countPostCycleId.php',
					data:{mission_id:mission_id},
					success:function(e){	
						if(e==0){
							$.ajax({
								type:'POST',
								url:'cycleStock/Stocka/form/frmPoste.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contPosteSta').html(e).show();
									$('#contRsciStock').hide();
								}
							});
						}
						else{
							$.ajax({
								type:'POST',
								url:'cycleStock/Stocka/php/getEseIdMissId.php',
								data:{mission_id:mission_id},
								success:function(e1){
									$.ajax({							
										type:'POST',
										url:'cycleStock/Stocka/form/Interface_sta_Secondaire.php',
										data:{mission_id:mission_id, entrepiseId:e1},
										success:function(e2){
											$('#contsta').html(e2).show();
											$('#contRsciStock').hide();
										}
									});
								}					
							});
						}
					}
				});	
			});
			$('#validate_sta').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleStock/Stocka/php/detect_synthese_existant_sta.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==0){
							$('#mess_vide').show();
							document.getElementById("validate_sta").disabled=true;
							document.getElementById("validate_stb").disabled=true;
							document.getElementById("validate_stc").disabled=true;
							document.getElementById("validate_std").disabled=true;
						}
						else{
							$.ajax({
								type:'POST',
								url:'cycleStock/stocka/form/Interface_sta_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupSta').html(e).show();
									$('#contRsciStock').hide();
								}
							});	
							}
						}
					});		
			});
			//Evenement de l'objectif b superviseur	

			$('#validate_stb').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleStock/stockb/php/cpt_stb.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==18){
							$.ajax({
								type:'POST',
								url:'cycleStock/Stockb/form/Interface_stb_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupstb').html(e).show();
									$('#contRsciStock').hide();
								}
							});
						}
						else{
							$('#mess_vide').show();
							document.getElementById("validate_sta").disabled=true;
							document.getElementById("validate_stb").disabled=true;
							document.getElementById("validate_stc").disabled=true;
							document.getElementById("validate_std").disabled=true;
						}
					}
				
				});

			});
			
			$('#validate_stc').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleStock/stockc/php/cpt_stc.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==17){
							$.ajax({
								type:'POST',
								url:'cycleStock/stockc/form/Interface_stc_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupstc').html(e).show();
									$('#contRsciStock').hide();
								}
							});
						}
						else{
							$('#mess_vide').show();
							document.getElementById("validate_sta").disabled=true;
							document.getElementById("validate_stb").disabled=true;
							document.getElementById("validate_stc").disabled=true;
							document.getElementById("validate_std").disabled=true;
						}
					}
				
				});

			});

			$('#validate_std').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleStock/stockd/php/cpt_std.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==29){
							$.ajax({
								type:'POST',
								url:'cycleStock/stockd/form/Interface_std_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupstd').html(e).show();
									$('#contRsciStock').hide();
								}
							});
						}
						else{
							$('#mess_vide').show();
							document.getElementById("validate_sta").disabled=true;
							document.getElementById("validate_stb").disabled=true;
							document.getElementById("validate_stc").disabled=true;
							document.getElementById("validate_std").disabled=true;
						}
					}
				
				});

			});
			//Retour au menu poste clé
			$('#RetourRsci').click(function(){
				$('#dv_cont_menu_rsci').show();
				$('#contRsciStock').hide();
				// $('#contPoststocka').hide();
			});
			//evenement de l'objectif c dans le menu auditeur
			$('#stockb').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleStock/stockb/php/cpt_stb.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleStock/stockb/load/load_rep_stb.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_stb').html(e).show();
									$('#contstb').show();
									$('#contRsciStock').hide();
									$('#Interface_Question_stb').hide();
									$('#dv_table_stb').show();
								}
							});					
						}
						else{
							$('#contstb').show();
							$('#contRsciStock').hide();
							$('#Interface_Question_stb').show();
						}
					}
				});
			});

			$('#stockc').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleStock/stockc/php/cpt_stc.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleStock/stockc/load/load_rep_stc.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_stc').html(e).show();
									$('#contstc').show();
									$('#contRsciStock').hide();
									$('#Interface_Question_stc').hide();
									$('#dv_table_stc').show();
								}
							});					
						}
						else{
							$('#contstc').show();
							$('#contRsciStock').hide();
							$('#Interface_Question_stc').show();
						}
					}
				});		
			});

			$('#stockd').click(function(){
			mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleStock/stockd/php/cpt_std.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleStock/stockd/load/load_rep_std.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_std').html(e).show();
									$('#contstd').show();
									$('#contRsciStock').hide();
									$('#Interface_Question_std').hide();
									$('#dv_table_std').show();
								}
							});					
						}
						else{
							$('#contstd').show();
							$('#contRsciStock').hide();
							$('#Interface_Question_std').show();
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
		<label class="marge_Titre">Evaluation du contrôle des stocks</label> <label class="margin_Code">Code : FC2 </label>
	</div>-->
<div id="fond_Index" align="center">
	<table  width="100%">
		<tr>
			<td class="label_Titre_Evaluation" align="center">
				<div class="img_cycle"><img src="img/iconswidgets/stock.png"></div>
				<div class="titre_cycle"><label>Cycle Stock</label></div>
				<input type="text" id="mission_id_index" value="<?php echo $mission_id; ?>" style="display:none;"/>
			</td>
		</tr>
	</table>
	<table width="90%">
		<tr  class="label_Evaluation" height="110" align="center" >
			<td  width="50%" id="stocka" <?php if($fonct_id_a>0) echo 'bgcolor=#fff'; else echo' bgcolor="#f5f5f5"';?>  class="td_Image">
				<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id"  style="display:none;"/>
				<img class="label_img a" src="img/alphabet/A.png"></img>
				<label >Séparation de fonction</label>
			</td>
			<td class="tdb_button" id="validate_sta">
				<div id="validate_sta" class="label_valid"><label id="font_label">Validation</label></div>
				<!--<input type="button" value="Validation" id="validate_sta" class="bouton" />-->
			</td>
			<td  id="stockb" width="50%" <?php if($b>0) echo 'bgcolor=#fff'; else echo' bgcolor="#f5f5f5"'; ?> class="td_Image">
				<img class="label_img b" src="img/alphabet/B.png"></img>
				<label>Exhaustivité</label>
			</td>
			<td class="tdb_button" id="validate_stb">
				<div id="validate_stb" class="label_valid"><label id="font_label">Validation</label></div>
				<!--<input type="button" value="Validation" id="validate_stb" class="bouton" />-->
			</td>
		</tr>
		<tr class="label_Evaluation" height="110" align="center">
			<td  id="stockc" width="50%" <?php if($c>0) echo 'bgcolor=#fff'; else echo' bgcolor="#f5f5f5"';?> class="td_Image">
				<img class="label_img c" src="img/alphabet/C.png"></img>
				<label>Réalité</label>
			</td>
			<td class="tdb_button" id="validate_stc">
				<div id="validate_stc" class="label_valid"><label id="font_label">Validation</label></div>
				<!--<input type="button" value="Validation" id="validate_stc" class="bouton" />-->
			</td>
			<td  id="stockd" width="50%" <?php if($d>0) echo 'bgcolor=#fff'; else echo' bgcolor="#f5f5f5"'; ?> class="td_Image">
				<img class="label_img d" src="img/alphabet/D.png"></img>
				<label>Evaluation</label>
			</td>
			<td class="tdb_button" id="validate_std">
				<div id="validate_std" class="label_valid"><label id="font_label">Validation</label></div>
				<!--<input type="button" value="Validation" id="validate_std" class="bouton" />-->
			</td>
		</tr>
	</table>
	<br />
	<input type="button" class="bouton" value="Synthèse du cycle Stocks" id="SynthStock" style="width: 250px;"/>
	<input type="button" value="Retour" class="bouton" id="RetourRsci"/>
	<input type="text" id="enterpriseId" value="<?php echo $eseId; ?>" style="display:none;" />
	
	<div id="mess_vide"><?php include 'cycleStock/Stockb/sms/mess_non_stb.php'; ?></div>
</div>
</body>