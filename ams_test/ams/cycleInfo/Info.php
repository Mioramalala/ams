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

	<link href="cycleInfo/Infob/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleInfo/Infob/css/div_a.css" rel="stylesheet" type="text/css" />
	<link href="cycleInfo/Infob/css/class.css" rel="stylesheet" type="text/css" />

	<link href="cycleInfo/Infoa/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleInfo/Infoa/css/div_a.css" rel="stylesheet" type="text/css" />
	<link href="cycleInfo/Infoa/css/class.css" rel="stylesheet" type="text/css" />

	<link href="cycleInfo/Infoc/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleInfo/Infoc/css/div_a.css" rel="stylesheet" type="text/css" />
	<link href="cycleInfo/Infoc/css/class.css" rel="stylesheet" type="text/css" />

	<link href="cycleInfo/Infod/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleInfo/Infod/css/div_a.css" rel="stylesheet" type="text/css" />
	<link href="cycleInfo/Infod/css/class.css" rel="stylesheet" type="text/css" />

	<link href="cycleInfo/InfoConclusion/css/div.css" rel="stylesheet" type="text/css" />
	<link href="cycleInfo/InfoConclusion/css/div_a.css" rel="stylesheet" type="text/css" />
	<link href="cycleInfo/InfoConclusion/css/class.css" rel="stylesheet" type="text/css" />

	<link href="RSCI/assets/css/popup_upload.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="RSCI/assets/js/popup_upload.js"></script>
	
	<style type="text/css">
			#synthInfo{
				border-radius: 12px;
				position: absolute;
				right: 20%;
				height: 45px;
				color: #fff;
				font-size: 1em;
				border: 0px;
				background-color: #2da4f3;
				width:auto;
				cursor: pointer;
			}

			#synthInfo:hover{
				background-color:#ccc;
			}

			#RetourRsciInfo{
				border-radius: 12px;
				position: absolute;
				right:8%;
				height: 45px;
				color: #fff;
				font-size: 1em;
				border: 0px;
				cursor: pointer;
				
				}

			#RetourRsciInfo:hover{
				color: #000000;
			}
		</style>
	<script>
		$(document).ready(function(){
			$.ajax({ //Debut verificaton validation // ANDO
				type:'GET',
				url:'cycleInfo/verification.php',

				success:function(res_)
				{

					if(res_=="existe")
					{

						$('div#conclusionRsciInfo').find('#font_label').empty();
						$('div#conclusionRsciInfo').css("width","55px");
						//$('td#conclusionRsciInfo').css("background-color","red!important");*/
						$('td#conclusionRsciInfo').css({"background":"#65c122","background-image":"url(img/CHECK.png)","background-repeat":"no-repeat","background-position":"center"});
							
					}
				}
			});//fin

			$('#synthInfo').click(function(){
				$.ajax({
					type:'GET',
					url:'cycleInfo/synthese.php',
					success:function(e){
						$('#ContentSynthAchat').html(e).show();
						$('#contenue_rsci').hide();
						$('#contRsciInfo').hide();
					}
					
				});
				
			});
			
			$('#Infoa').click(function()
			{
				$('#contenue_rsci').hide();
				mission_id=document.getElementById("txt_mission_id").value;	
				enterpriseId=$('#enterpriseId').val();
				$.ajax({
					type:'POST',
					url:'cycleInfo/Infoa/php/getEseIdMissId.php',
					data:{mission_id:mission_id},
					success:function(e1){
						$.ajax({							
							type:'POST',
							url:'cycleInfo/Infoa/form/interface_ia.php',
							data:{mission_id:mission_id, entrepiseId:e1},
							success:function(e2){
								$('#contia').html(e2).show();
								$('#contRsciInfo').hide();
							}
						});
					}				
				});
			});

			$('#conclusionRsciInfo').click(function(){
				mission_id=document.getElementById("mission_id_index").value;
				$.ajax({
					type:'POST',
					url:'cycleInfo/InfoConclusion/form/interface_concl.php',
					data:{mission_id:mission_id},
					success:function(e){
						$('#contRsciInfo').hide();
						$('#contenue').show();
						$('#contenue').html(e);
					}
				});
			});

			//Retour au menu poste clé
			$('#RetourRsciInfo').click(function(){
				$('#dv_cont_menu_rsci').show();
				$('#contRsciInfo').hide();
				$('#transparent').remove();
				$('#ongulet').fadeTo('slow',1);
			});


			//evenement de l'objectif c dans le menu auditeur
			$('#Infob').click(function(){		
				$('#contenue_rsci').hide();
				mission_id=document.getElementById("txt_mission_id").value;	
				enterpriseId=$('#enterpriseId').val();
				$.ajax({
					type:'POST',
					url:'cycleInfo/Infob/php/getEseIdMissId.php',
					data:{mission_id:mission_id},
					success:function(e1){
						// tinay editer
						alert(e1 +'_mission_' +mission_id +'_entreprise_' );
						$.ajax({							
							type:'POST',
							url:'cycleInfo/Infob/form/interface_ib.php',
							data:{mission_id:mission_id, entrepiseId:e1},
							success:function(e2){
								$('#contib').html(e2).show();
								$('#contRsciInfo').hide();
							}
						});
					}					
				});
			});

			$('#Infoc').click(function(){		
			// alert("info c eto");
				$('#contenue_rsci').hide();
				mission_id=document.getElementById("txt_mission_id").value;	
				enterpriseId=$('#enterpriseId').val();
				$.ajax({
					type:'POST',
					url:'cycleInfo/Infoc/php/getEseIdMissId.php',
					data:{mission_id:mission_id},
					success:function(e1){
						$.ajax({							
							type:'POST',
							url:'cycleInfo/Infoc/form/interface_ic.php',
							data:{mission_id:mission_id, entrepiseId:e1},
							success:function(e2){
								// $('#contenue').html(e2);
								// $('#contenue').show();
								// $('#contRsciInfo').hide();

								$('#contic').html(e2).show();
								$('#contRsciInfo').hide();
							}
						});
					}					
				});
			});
			$('#Infod').click(function()
			{
				//alert("info d eto");
				$('#contenue_rsci').hide();
				mission_id=document.getElementById("txt_mission_id").value;	
				enterpriseId=$('#enterpriseId').val();
				$.ajax({
					type:'POST',
					url:'cycleInfo/Infod/php/getEseIdMissId.php',
					data:{mission_id:mission_id},
					success:function(e1){
						$.ajax({							
							type:'POST',
							url:'cycleInfo/Infod/form/Interface_id.php',
							data:{mission_id:mission_id, entrepiseId:e1},
							success:function(e2){
								// $('#contenue').html(e2);
								// $('#contenue').show();
								// $('#contRsciInfo').hide();
								$('#contid').html(e2).show();
								$('#contRsciInfo').hide();
							}
						});
					}					
				});
			});
		});
	</script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
	<div id="fond_Sous_Titre" class="menu_Titre">
		<label class="marge_Titre">Evaluation du contrôle des Infos</label> <label class="margin_Code">Code : FC9 </label>
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
		<tr class="label_Evaluation" height="110" align="center" >
			<!--<td width="20%" rowspan="2">
			<h5 class="mode_emploi">MODE D’EMPLOI</h5>
			<p class="mode_emploi" width="60%">
				Ce questionnaire est destiné à aider le commissaire aux comptes à la fois à prendre connaissance des spécificités du système informatique de l’entreprise et à évaluer les risques qui lui sont attachés.
				Il est adapté aux systèmes simples, mais peut être, si certains points le justifient, complété grâce au questionnaire « système complexe ».
				Le choix entre ces deux questionnaires dépend de la connaissance préalable du commissaire aux comptes de l’organisation informatique de l’entreprise.
				Des feuilles de travail ont été également développées pour aider à la description de l’organisation informatique des PME.
				L’évaluation des risques sera reportée sur le tableau récapitulatif des risques.
				Ce questionnaire comporte 5 parties :
			</p>
			</td>-->
			<td  align="left" width="50%" id="Infoa" <?php if($fonct_id_a>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#ffffff"';?>  class="td_Image">
				<input type="text" value="<?php echo $mission_id; ?>" id="txt_mission_id"  style="display:none;"/>
				<label >I. TRAITEMENTS AUTOMATISES DES CYCLES</label>
			</td>
			<td rowspan="2" class="tdb_button" id="conclusionRsciInfo">
				<div id="conclusionRsciInfo" class="label_valid"><label id="font_label">Validation</label></div>
				<!--<input type="button" value="Validation" id="conclusionRsciInfo" class="bouton" />--> 
			</td>
			<td align="left"  id="Infob" width="50%" <?php if($b>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#ffffff"';?> class="td_Image">
				<label>II. FONCTION INFORMATIQUE</label>
			</td>
			
		</tr>
		<tr class="label_Evaluation" height="110" align="center">
			<td  align="left" id="Infoc" width="50%" <?php if($c>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#ffffff"';?> class="td_Image">
				<label>III. MATERIEL</label>
			</td>
			<td  align="left" id="Infod" width="50%" <?php if($d>0) echo 'bgcolor=#fff'; else echo 'bgcolor="#ffffff"';?> class="td_Image">
				<label>IV. LOGICIELS</label><br />
			</td>
		</tr>
	</table>
	<br />
	<iframe style="display:none;" name="uploadFrame"></iframe>	
<?php 
	include $_SERVER["DOCUMENT_ROOT"]."/RSCI/layout/modal/modal-flowchart-upload-si.php" ;
?>
	<input type="button"  class="bouton-md poplight" value="flowchart" data-w="500" target="popup_si"  style="width: 250px;"/>
	<input type="button" class="bouton" value="Synthèse du cycle Système d'Infomations" id="synthInfo"/>
	<!--<input type="button" value="Validation" class="bouton" id="conclusionRsciInfo"/>-->
	<input type="button" value="Retour" class="bouton" id="RetourRsciInfo"/>
	<input type="text" id="enterpriseId" value="<?php echo $enterpriseId; ?>" style="display:none;" />
	
	<!-- <div id="mess_vide_Info"><?php //include 'cycleInfo/Infob/sms/mess_non_ib.php'; ?></div> -->
</div>
</body>