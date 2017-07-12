<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=225 AND CYCLE_ACHAT_ID=16 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_pd_4_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_pd4").value=="" && document.getElementById("rad_Question_Non_pd_4").checked== true) || (document.getElementById("rad_Question_Oui_pd_4").checked==false && document.getElementById("rad_Question_NA_pd_4").checked==false && document.getElementById("rad_Question_Non_pd_4").checked==false)){
			$('#mess_quest_vide_pd4').show();
			$('#Question_pd_225').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pd").value;
			commentaire=document.getElementById("commentaire_Question_pd4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pd_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pd_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pd_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paied/php/detect_objectif_exist_pd.php',
				data:{mission_id:mission_id, question_id:225, cycle_achat_id:16},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pd(commentaire, qcm, mission_id, 225);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paied/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:225, mission_id:mission_id, cycleId:16},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("pd_5","pd5");
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paied/load/load_rep_pd.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_pd').hide();
										$('#frm_tab_res_pd').html(e).show();
										$('#dv_table_pd').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_pd_225').fadeOut(500);
			$('#Question_pd_226').fadeIn(500);
			$('#lb_veuillez_aff_pd').hide();
		}

	});
	$('#int_pd_Question_Precedent_4').click(function(){
		$('#Question_pd_225').fadeOut(500);
		$('#Question_pd_224').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_pd_4').click(function(){
		$('#message_fermeture_question_pd4').show();
		$('#Question_pd_225').hide();
	});
});
</script>
<div id="int_Question_pd_4">
	<table width="500" id="t_pd_4">
		<tr style="height:10px">
			<td class="label_Question" align="center">4.Les provisions pour charges à payer sur salaires sont-elles rapprochées des charges réelles ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_pd_4" name="rad_Question_pd4" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_pd_4" name="rad_Question_pd4" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_pd_4" name="rad_Question_pd4" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_pd4" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_pd_Question_Precedent_4"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_pd_4_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_pd"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_pd_4" /></div>