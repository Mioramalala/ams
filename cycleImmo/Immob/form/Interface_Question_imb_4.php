<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=73 AND CYCLE_ACHAT_ID=7 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_imb_4_Bouton').click(function(){
		if((document.getElementById("rad_Question_Non_imb_4").checked==true && document.getElementById("commentaire_Question_imb4").value=="") || (document.getElementById("rad_Question_Oui_imb_4").checked==false && document.getElementById("rad_Question_NA_imb_4").checked==false && document.getElementById("rad_Question_Non_imb_4").checked==false)){
			$('#mess_quest_vide_imb4').show();
			$('#Question_imb_73').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_imb").value;
			commentaire=document.getElementById("commentaire_Question_imb4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_imb_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_imb_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_imb_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleImmo/Immob/php/detect_objectif_exist_imb.php',
				data:{mission_id:mission_id, question_id:73, cycle_achat_id:7},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_imb(commentaire, qcm, mission_id, 73);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleImmo/Immob/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:73, mission_id:mission_id, cycleId:7},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("imb_5","imb5");
								$.ajax({
									type:'POST',
									url:'cycleImmo/Immob/load/load_rep_imb.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_imb').hide();
										$('#frm_tab_res_imb').html(e).show();
										$('#dv_table_imb').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_imb_73').fadeOut(500);
			$('#Question_imb_74').fadeIn(500);
			$('#lb_veuillez_aff_imb').hide();
		}

	});
	$('#int_imb_Question_Precedent_4').click(function(){
		$('#Question_imb_73').fadeOut(500);
		$('#Question_imb_72').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_imb_4').click(function(){
		$('#message_fermeture_question_imb4').show();
		$('#Question_imb_73').hide();
		///alert("Vous devez répondre à toutes les questions") ;
	});
});
</script>
<div id="int_Question_imb_4">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">3.Les cessions et destructions :<br />
a)	font-elles l'objet d'autorisation ?
</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_imb_4" name="rad_Question_imb4" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_imb_4" name="rad_Question_imb4" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_imb_4" name="rad_Question_imb4" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_imb4" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_imb_Question_Precedent_4"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_imb_4_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_imb"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_imb_4" /></div>