<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=109 AND CYCLE_ACHAT_ID=9 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_imd_4_Bouton').click(function(){
		//tinay editer
		//if((document.getElementById("commentaire_Question_imd4").value=="") || (document.getElementById("rad_Question_Oui_imd_4").checked==false && document.getElementById("rad_Question_NA_imd_4").checked==false && document.getElementById("rad_Question_Non_imd_4").checked==false)){
		if((document.getElementById("commentaire_Question_imd4").value=="" && document.getElementById("rad_Question_Non_imd_4").checked== true) || (document.getElementById("rad_Question_Oui_imd_4").checked==false && document.getElementById("rad_Question_NA_imd_4").checked==false && document.getElementById("rad_Question_Non_imd_4").checked==false)){
			$('#mess_quest_vide_imd4').show();
			$('#Question_imd_109').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imd").value;
			commentaire=document.getElementById("commentaire_Question_imd4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_imd_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_imd_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_imd_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immod/php/detect_objectif_exist_imd.php',
				data:{mission_id:mission_id, question_id:109, cycle_achat_id:9},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_imd(commentaire, qcm, mission_id, 109);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immod/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:109, mission_id:mission_id, cycleId:9},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("imd_5","imd5");
								$.ajax({
									type:'POST',
									url:'cycleImmo/Immod/load/load_rep_imd.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_imd').hide();
										$('#frm_tab_res_imd').html(e).show();
										$('#dv_table_imd').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_imd_109').fadeOut(500);
			$('#Question_imd_110').fadeIn(500);
			$('#lb_veuillez_aff_imd').hide();
		}

	});
	$('#int_imd_Question_Precedent_4').click(function(){
		$('#Question_imd_109').fadeOut(500);
		$('#Question_imd_108').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_imd_4').click(function(){
		$('#message_fermeture_question_imd4').show();
		$('#Question_imd_109').hide();
	});
});
</script>
<div id="int_Question_imd_4">
	<table width="500" id="td_imd_4">
		<tr style="height:10px">
			<td class="label_Question" align="center">3.Les immobilisations acquises en crédit-bail, font-elles l'objet d'un suivi suffisant pour permettre l'évaluation des engagements hors bilan ?
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_imd_4" name="rad_Question_imd4" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_imd_4" name="rad_Question_imd4" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_imd_4" name="rad_Question_imd4" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_imd4" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_imd_Question_Precedent_4"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_imd_4_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_imd"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_imd_4" /></div>