<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=309 AND CYCLE_ACHAT_ID=24 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_dd_6_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_dd6").value=="" && document.getElementById("rad_Question_Non_dd_6").checked== true) || (document.getElementById("rad_Question_Oui_dd_6").checked==false && document.getElementById("rad_Question_NA_dd_6").checked==false && document.getElementById("rad_Question_Non_dd_6").checked==false)){
			$('#mess_quest_vide_dd6').show();
			$('#Question_dd_309').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_dd").value;
			commentaire=document.getElementById("commentaire_Question_dd6").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_dd_6").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_dd_6").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_dd_6").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensed/php/detect_objectif_exist_dd.php',
				data:{mission_id:mission_id, question_id:309, cycle_achat_id:24},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_dd(commentaire, qcm, mission_id, 309);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensed/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:309, mission_id:mission_id, cycleId:24},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("dd_7","dd7");
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depensed/load/load_rep_dd.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_dd').hide();
										$('#frm_tab_res_dd').html(e).show();
										$('#dv_table_dd').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_dd_309').fadeOut(500);
			$('#Question_dd_310').fadeIn(500);
			$('#lb_veuillez_aff_dd').hide();
		}

	});
	$('#int_dd_Question_Precedent_6').click(function(){
		$('#Question_dd_309').fadeOut(500);
		$('#Question_dd_308').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_dd_6').click(function(){
		$('#message_fermeture_question_dd6').show();
		$('#Question_dd_309').hide();
	});
});
</script>
<div id="int_Question_dd_6">
	<table width="500" id="t_dd_6">
		<tr style="height:10px">
			<td class="label_Question" align="center">
			6.Les espèces en caisse sont-elles physiquement contrôlées et rapprochées du livre de caisse en fin de période ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_dd_6" name="rad_Question_dd6" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_dd_6" name="rad_Question_dd6" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_dd_6" name="rad_Question_dd6" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_dd6" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_dd_Question_Precedent_6"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_dd_6_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_dd"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_dd_6" /></div>