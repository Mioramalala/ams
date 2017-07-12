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

	<link href="cycleEnvironnement/EnvQuest/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleEnvironnement/EnvQuest/css/div_ev.css" rel="stylesheet" type="text/css" />
	<link href="cycleEnvironnement/EnvQuest/css/class.css" rel="stylesheet" type="text/css" />
	<link href="cycleEnvironnement/EnvQuest/css/div_fermer_quest_objectif_ev.css" rel="stylesheet" type="text/css" />
	<link href="RSCI/assets/css/popup_upload.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="RSCI/assets/js/popup_upload.js"></script>
	<style type="text/css">
		#synthEnviron{
			border-radius: 12px;
			position: absolute;
			right: 20%;
			height: 45px;
			color: #fff;
			font-size: 1em;
			border: 0px;
			background-color: #2da4f3;
			width:auto;
		}

		#synthEnviron:hover{
			background-color:#ccc;
		}

		#RetourRsciEnv{
			border-radius: 12px;
			position: absolute;
			right:8%;
			height: 45px;
			color: #fff;
			font-size: 1em;
			border: 0px;
			}

		#RetourRsciEnv:hover{
			color: #000000;
		}
	</style>
	<script type="text/javascript">
		$(document).ready(function(){
			
			$.ajax({ //Debut verificaton validation // ANDO
				type:'GET',
				url:'cycleEnvironnement/verification.php',
				data:{},
				success:function(resverif)
				{
					if(resverif==1)
					{
								$('div#validate_ev').find('#font_label').empty();
								$('div#validate_ev').css({"width":"55px"});
								$('td#validate_ev').css({"background-color":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
					}
					
				}
			});//fin
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
								url:'cycleEnvironnement/EnvQuest/php/cpt_ev.php',
								data:{mission_id:mission_id},
								success:function(e){
									if(e==27){
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
						}else{
							alert('Vous n\'êtes pas autorisés à valider!');
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
<table width="70%">
	<tr height="110" class="label_Evaluation" align="center">
		<td  align="left" id="envquest" <?php if($b>0) echo 'bgcolor=#fff'; else echo'bgcolor="#7da0f8"';?> class="td_Image">
			<label>QUESTIONNAIRE PME D’ANALYSE DU CONTRÔLE INTERNE</label>
		</td>
		<td class="tdb_button" id="validate_ev" style="width:55px;">
					<div id="validate_ev" class="label_valid"><label id="font_label">Validation</label></div>
					<!--<input type="button" value="Validation" id="validate_ev" class="bouton"/>
					<!--<input type="button" value="Validation" id="validate_aca" class="bouton" />-->
		</td>
	</tr>
</table>
	<br />
	<iframe style="display:none;" name="uploadFrame"></iframe>	
	<?php 
		require_once($_SERVER["DOCUMENT_ROOT"]."/RSCI/layout/modal/modal-flowchart-upload-control.php") ;
	?>
	<input type="button"  class="bouton-md poplight" value="flowchart" data-w="500" target="popup_control"  style="width: 250px;"/>
	<input type="button" class="bouton" value="Synthèse du cycle Environnement de contrôles" id="synthEnviron"/>
	<input type="button" value="Retour" class="bouton" id="RetourRsciEnv"/>
<!--		<input type="button" value="Retour" class="bouton" id="RetourRsciEnv" id="bt_ret_menu_index"/>-->

	<input type="text" id="enterpriseId" value="<?php echo $enterpriseId; ?>" style="display:none;" />
	
	<div id="mess_vide_env"><?php include $_SERVER["DOCUMENT_ROOT"].'/cycleEnvironnement/EnvQuest/sms/mess_non_ev.php'; ?></div>
</div>
</body>