<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=179 AND CYCLE_ACHAT_ID=13 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_std_28_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_std28").value=="") || (document.getElementById("rad_Question_Oui_std_28").checked==false && document.getElementById("rad_Question_NA_std_28").checked==false && document.getElementById("rad_Question_Non_std_28").checked==false)){
			$('#mess_quest_vide_std28').show();
			$('#Question_std_179').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_std").value;
			commentaire=document.getElementById("commentaire_Question_std28").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_std_28").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_std_28").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_std_28").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockd/php/detect_objectif_exist_std.php',
				data:{mission_id:mission_id, question_id:179, cycle_achat_id:13},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_std(commentaire, qcm, mission_id, 179);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockd/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:179, mission_id:mission_id, cycleId:13},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("std_29","std29");
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

			$('#Question_std_179').fadeOut(500);
			$('#Question_std_180').fadeIn(500);
			$('#lb_veuillez_aff_std').hide();
		}

	});
	$('#int_std_Question_Precedent_28').click(function(){
		$('#Question_std_179').fadeOut(500);
		$('#Question_std_178').fadeIn(500);
	});
	//Fermeture du question num 15
	$('#fermer_Question_std_28').click(function(){
		$('#message_fermeture_question_std28').show();
		$('#Question_std_179').hide();
	});
});
</script>
<div id="int_Question_std_28">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">
				15.Le système de suivi des stocks permet-il d'identifier régulièrement :<br/>c)	les stocks à marge insuffisante ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_std_28" name="rad_Question_std28" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_std_28" name="rad_Question_std28" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_std_28" name="rad_Question_std28" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_std28" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_std_Question_Precedent_28"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_std_28_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_std"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_std_28" /></div>