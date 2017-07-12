<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=192 AND CYCLE_ACHAT_ID=14 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_pb_12_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_pb12").value=="" && document.getElementById("rad_Question_Non_pb_12").checked== true) || (document.getElementById("rad_Question_Oui_pb_12").checked==false && document.getElementById("rad_Question_NA_pb_12").checked==false && document.getElementById("rad_Question_Non_pb_12").checked==false)){
			$('#mess_quest_vide_pb12').show();
			$('#Question_pb_192').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pb").value;
			commentaire=document.getElementById("commentaire_Question_pb12").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pb_12").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pb_12").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pb_12").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/php/detect_objectif_exist_pb.php',
				data:{mission_id:mission_id, question_id:192, cycle_achat_id:14},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pb(commentaire, qcm, mission_id, 192);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:192, mission_id:mission_id, cycleId:14},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("pb_13","pb13");
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paieb/load/load_rep_pb.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_pb').hide();
										$('#frm_tab_res_pb').html(e).show();
										$('#dv_table_pb').show();
									}
								});	
							}
						});					}
				}
			});
			$('#Question_pb_192').fadeOut(500);
			$('#Question_pb_193').fadeIn(500);
			$('#lb_veuillez_aff_pb').hide();
		}

	});
	$('#int_pb_Question_Precedent_12').click(function(){
		$('#Question_pb_192').fadeOut(500);
		$('#Question_pb_191').fadeIn(500);
	});
	//Fermeture du question num 12
	$('#fermer_Question_pb_12').click(function(){
		$('#message_fermeture_question_pb12').show();
		$('#Question_pb_192').hide();
	});
});
</script>
<div id="int_Question_pb_12">
	<table width="500" id="t_pb_12">
		<tr style="height:10px">
			<td class="label_Question" align="center">11.Les informations nécessaires pour le calcul des congés payés repant :<br/>a)	sur la période antérieure sont-elles tenues par le service paie ?
</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_pb_12" name="rad_Question_pb12" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_pb_12" name="rad_Question_pb12" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_pb_12" name="rad_Question_pb12" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_pb12" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_pb_Question_Precedent_12"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_pb_12_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_pb"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_pb_12" /></div>