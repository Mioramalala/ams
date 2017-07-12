<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=181 AND CYCLE_ACHAT_ID=14 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>

<script>
function enregistrer_commentaire_pb(commentaire, qcm, mission_id, question_id){
	$.ajax({
		type:'POST',
		url:'cyclePaie/Paieb/php/enregistrer_achat_object_pb.php',
		data:{commentaire:commentaire, qcm:qcm, mission_id:mission_id, question_id:question_id},
		success:function(){
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/load/load_rep_pb.php',
				data:{mission_id:mission_id},
				success:function(e){
					$('#Interface_Question_pb').hide();
					$('#frm_tab_res_pb').html(e).show();
				}
			 });
		}
	});
}
$(function(){
	$('#Question_pb_1_Bouton').click(function(){
		
		if((document.getElementById("commentaire_Question_pb1").value=="" && document.getElementById("rad_Question_Non_pb_1").checked== true) || (document.getElementById("rad_Question_Oui_pb_1").checked==false && document.getElementById("rad_Question_NA_pb_1").checked==false && document.getElementById("rad_Question_Non_pb_1").checked==false)){
			$('#mess_quest_vide_pb1').show();
			$('#Question_pb_70').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pb").value;
			commentaire=document.getElementById("commentaire_Question_pb1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pb_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pb_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pb_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/php/detect_objectif_exist_pb.php',
				data:{mission_id:mission_id, question_id:181, cycle_achat_id:14},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pb(commentaire, qcm, mission_id, 181);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:181, mission_id:mission_id, cycleId:14},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("pb_2","pb2");
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
						});

					}
				}
			});

			$('#Question_pb_181').fadeOut(500);
			$('#Question_pb_182').fadeIn(500);
			$('#lb_veuillez_aff_pb').hide();
		}

	});
	//Fermeture du question num 11
	$('#fermer_Question_pb_1').click(function(){
		$('#message_fermeture_question_pb').show();
		$('#Question_pb_181').hide();
	});
});

</script>

<div id="int_Question_pb_1">
	<table width="500" id="t_pb_1">
		<tr style="height:10px">
			<td class="label_Question" align="center">1.Les salaires sont-ils réglés sur un compte bancaire distinct ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_pb_1" name="rad_Question_pb1" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_pb_1" name="rad_Question_pb1" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_pb_1" name="rad_Question_pb1" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_pb1" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="Suivant" class="bouton" id="Question_pb_1_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_pb"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_pb_1" /></div>