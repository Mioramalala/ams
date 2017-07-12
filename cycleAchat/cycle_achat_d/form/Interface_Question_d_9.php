<?php

include '../../../connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=42 AND CYCLE_ACHAT_ID=4 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_d_9_Bouton').click(function(){
		//tinay editer
		//if((document.getElementById("commentaire_Question_d9").value=="") || (document.getElementById("rad_Question_Oui_d_9").checked==false && document.getElementById("rad_Question_NA_d_9").checked==false && document.getElementById("rad_Question_Non_d_9").checked==false)){
		if((document.getElementById("commentaire_Question_d9").value=="" && document.getElementById("rad_Question_Non_d_9").checked== true) || (document.getElementById("rad_Question_Oui_d_9").checked==false && document.getElementById("rad_Question_NA_d_9").checked==false && document.getElementById("rad_Question_Non_d_9").checked==false)){
			$('#mess_quest_vide_d9').show();
			$('#Question_d_42').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_d").value;
			commentaire=document.getElementById("commentaire_Question_d9").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_d_9").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_d_9").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_d_9").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_d/php/detect_objectif_exist_d.php',
				data:{mission_id:mission_id, question_id:42, cycle_achat_id:4},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_d(commentaire, qcm, mission_id, 42);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_d/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:42, mission_id:mission_id, cycleId:4},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split('*');
								afficheReponseQuestacd("d_10","d10");
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_d/load/load_rep_d.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_d').hide();
										$('#frm_tab_res_d').html(e).show();
										$('#dv_table_d').show();
									}
								});
							}
						});
					}
				}
			});

			$('#Question_d_42').fadeOut(500);
			$('#Question_d_43').fadeIn(500);
			$('#lb_veuillez_aff_d').hide();
		}

	});
	$('#int_d_Question_Precedent_9').click(function(){
		$('#Question_d_42').fadeOut(500);
		$('#Question_d_41').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_d_9').click(function(){
		$('#message_fermeture_question_d9').show();
		$('#Question_d_42').hide();
	});
});
</script>
<div id="int_Question_d_9">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">4.Lorsque des achats sont effectués en devises étrangères :<br />
a)	les personnes chargées de la comptabilisation sont-elles régulièrement informées des taux à utiliser ?
</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_d_9" name="rad_Question_d9" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_d_9" name="rad_Question_d9" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_d_9" name="rad_Question_d9" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_d9" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_d_Question_Precedent_9"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_d_9_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_d"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_d_9" /></div>