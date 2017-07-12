<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=258 AND CYCLE_ACHAT_ID=19 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_rc_4_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_rc4").value=="" && document.getElementById("rad_Question_Non_rc_4").checked== true) || (document.getElementById("rad_Question_Oui_rc_4").checked==false && document.getElementById("rad_Question_NA_rc_4").checked==false && document.getElementById("rad_Question_Non_rc_4").checked==false)){
			$('#mess_quest_vide_rc4').show();
			$('#Question_rc_258').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rc").value;
			commentaire=document.getElementById("commentaire_Question_rc4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_rc_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_rc_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_rc_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettec/php/detect_objectif_exist_rc.php',
				data:{mission_id:mission_id, question_id:258, cycle_achat_id:19},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_rc(commentaire, qcm, mission_id, 258);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettec/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:258, mission_id:mission_id, cycleId:19},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("rc_5","rc5");
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recettec/load/load_rep_rc.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_rc').hide();
										$('#frm_tab_res_rc').html(e).show();
										$('#dv_table_rc').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_rc_258').fadeOut(500);
			$('#Question_rc_259').fadeIn(500);
			$('#lb_veuillez_aff_rc').hide();
		}

	});
	$('#int_rc_Question_Precedent_4').click(function(){
		$('#Question_rc_258').fadeOut(500);
		$('#Question_rc_257').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_rc_4').click(function(){
		$('#message_fermeture_question_rc4').show();
		$('#Question_rc_258').hide();
	});
});
</script>
<div id="int_Question_rc_4">
	<table width="500" id="t_rc_4">
		<tr style="height:10px">
			<td class="label_Question" align="center">3.Les règlements enregistrés au crédit des comptes clients sont-ils rapprochés des montants effectivement encaissés par la banque ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_rc_4" name="rad_Question_rc4" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_rc_4" name="rad_Question_rc4" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_rc_4" name="rad_Question_rc4" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_rc4" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_rc_Question_Precedent_4"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_rc_4_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_rc"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_rc_4" /></div>