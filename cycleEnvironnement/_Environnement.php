<?php
	@session_start();
	include 'connexion.php';

	$mission_id=$_SESSION['idMission'];
	$reponse=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);
	$donnees=$reponse->fetch();

	$eseId=$donnees['ENTREPRISE_ID'];
?>
<html>
<head>
	<title>AMS | Cycle achat</title>

	<link href="cycleEnvironnement/EnvQuest/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleEnvironnement/EnvQuest/css/div_ev.css" rel="stylesheet" type="text/css" />
	<link href="cycleEnvironnement/EnvQuest/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleEnvironnement/EnvQuest/css/div_fermer_quest_objectif_ev.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#synthEnviron').click(function(){
				$.ajax({
					type:'GET',
					url:'cycleEnvironnement/synthese.php',
					success:function(e){
						$('#ContentSynthAchat').html(e).show();
						$('#contenue_rsci').hide();
						$('#contRsciEnvironnement').hide();
					}
				});
			});
			$('#validate_ev').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleEnvironnement/EnvQuest/php/cpt_ev.php',
					data:{mission_id:mission_id},
					success:function(e){
						if(e==26){
							$.ajax({
								type:'POST',
								url:'cycleEnvironnement/EnvQuest/form/Interface_ev_Superviseur.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#contSupEv').html(e).show();
									$('#contRsciEnvironnement').hide();
								}
							});
						}
						else{
							$('#mess_vide_env').show();
							document.getElementById("validate_ev").disabled=true;
						}
					}
				});
			});

			//Retour au menu poste clé
			$('#RetourRsciEnv').click(function(){
				$('#dv_cont_menu_rsci').show();
				$('#contRsciEnvironnement').hide();
				$('#transparent').remove();
				$('#ongulet').fadeTo('slow',1);
			});

			$('#envquest').click(function(){
				mission_id=document.getElementById("mission_id_index").value;		
				$.ajax({
					type:'POST',
					url:'cycleEnvironnement/EnvQuest/php/cpt_ev.php',
					data:{mission_id:mission_id},
					success:function(e1){
						if(e1>0){
							$.ajax({
								type:'POST',
								url:'cycleEnvironnement/EnvQuest/load/load_rep_ev.php',
								data:{mission_id:mission_id},
								success:function(e){
									$('#frm_tab_res_ev').html(e).show();
									$('#contev').show();
									$('#contRsciEnvironnement').hide();
									$('#Interface_Question_ev').hide();
									$('#dv_table_ev').show();
								}
							});					
						}
						else{
							$('#contev').show();
							$('#contRsciEnvironnement').hide();
							$('#Interface_Question_ev').show();
						}
					}
				});
			});
		});
	</script>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<div id="fond_Sous_Titre" class="menu_Titre">
		<label class="marge_Titre">Environnement de Contrôle</label> <label class="margin_Code">Code : FC8 </label>
	</div>
<div id="fond_Index" align="center">
	<table width="100%">
		<tr>
			<td class="label_Titre_Evaluation" align="center">
				Objectif de contrôle :<input type="text" id="mission_id_index" value="<?php echo $mission_id; ?>" style="display:none;"/>
			</td>
		</tr>
	</table>
<table width="90%">
	<tr  class="label_Evaluation" height="50" align="center">
		<td  id="envquest" <?php if($b>0) echo 'bgcolor=#fff'; else echo'bgcolor="#7da0f8"';?> class="td_Image">
			<label>QUESTIONNAIRE PME D’ANALYSE DU CONTRÔLE INTERNE</label>
		</td>
		<td>
			<input type="button" value="Validation" id="validate_ev" class="bouton"/>
		</td>
	</tr>
</table>
	<br />
	<input type="button" class="bouton" value="Synthèse du cycle Environnement de contrôles" id="synthEnviron" style="width: 250px;"/>
	<br /><br />
	<input type="button" value="Retour" class="bouton" id="RetourRsciEnv"/>
	<input type="text" id="enterpriseId" value="<?php echo $eseId; ?>" style="display:none;" />
	
	<div id="mess_vide_env"><?php include 'cycleEnvironnement/EnvQuest/sms/mess_non_ev.php'; ?></div>
</div>
</body>