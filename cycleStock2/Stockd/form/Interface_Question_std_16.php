<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=167 AND CYCLE_ACHAT_ID=13 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_std_16_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_std16").value=="") || (document.getElementById("rad_Question_Oui_std_16").checked==false && document.getElementById("rad_Question_NA_std_16").checked==false && document.getElementById("rad_Question_Non_std_16").checked==false)){
			$('#mess_quest_vide_std16').show();
			$('#Question_std_167').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_std").value;
			commentaire=document.getElementById("commentaire_Question_std16").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_std_16").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_std_16").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_std_16").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockd/php/detect_objectif_exist_std.php',
				data:{mission_id:mission_id, question_id:167, cycle_achat_id:13},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_std(commentaire, qcm, mission_id, 167);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockd/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:167, mission_id:mission_id, cycleId:13},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("std_17","std17");
								$.ajax({
									type:'POST',
									url:'cycleStock/Stockd/load/load_rep_std.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_std').hide();
										$('#frm_tab_res_std').html(e).show();
										$('#dv_table_std').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_std_167').fadeOut(500);
			$('#Question_std_168').fadeIn(500);
			$('#lb_veuillez_aff_std').hide();
		}

	});
	$('#int_std_Question_Precedent_16').click(function(){
		$('#Question_std_167').fadeOut(500);
		$('#Question_std_166').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_std_16').click(function(){
		$('#message_fermeture_question_std16').show();
		$('#Question_std_167').hide();
	});
});
</script>
<div id="int_Question_std_16">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">
				16.<b>Autres méthodes</b><br/>
				Les coûts de production et d'acquisition utilisés sont-ils :<br/>
				b)	vérifiés régulièrement par une personne indépendante ?
		</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_std_16" name="rad_Question_std16" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_std_16" name="rad_Question_std16" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_std_16" name="rad_Question_std16" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_std16" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_std_Question_Precedent_16"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_std_16_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_std"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_std_16" /></div>