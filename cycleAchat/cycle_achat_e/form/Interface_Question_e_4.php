<?php

include '../../../connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=49 AND CYCLE_ACHAT_ID=5 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_e_4_Bouton').click(function(){
		//tinay editer
		//if((document.getElementById("commentaire_Question_e4").value=="") || (document.getElementById("rad_Question_Oui_e_4").checked==false && document.getElementById("rad_Question_NA_e_4").checked==false && document.getElementById("rad_Question_Non_e_4").checked==false)){
		if((document.getElementById("commentaire_Question_e4").value=="" && document.getElementById("rad_Question_Non_e_4").checked== true) || (document.getElementById("rad_Question_Oui_e_4").checked==false && document.getElementById("rad_Question_NA_e_4").checked==false && document.getElementById("rad_Question_Non_e_4").checked==false)){
			$('#mess_quest_vide_e4').show();
			$('#Question_e_49').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_e").value;
			commentaire=document.getElementById("commentaire_Question_e4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_e_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_e_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_e_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_e/php/detect_objectif_exist_e.php',
				data:{mission_id:mission_id, question_id:49, cycle_achat_id:5},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_e(commentaire, qcm, mission_id, 49);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_e/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:49, mission_id:mission_id, cycleId:5},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split('*');
								afficheReponseQuestace("e_5","e5");
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_e/load/load_rep_e.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_e').hide();
										$('#frm_tab_res_e').html(e).show();
										$('#dv_table_e').show();
									}
								});
							}
						});
					}
				}
			});

			$('#Question_e_49').fadeOut(500);
			$('#Question_e_50').fadeIn(500);
			$('#lb_veuillez_aff_e').hide();
		}

	});
	$('#int_e_Question_Precedent_4').click(function(){
		$('#Question_e_49').fadeOut(500);
		$('#Question_e_48').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_e_4').click(function(){
		$('#message_fermeture_question_e4').show();
		$('#Question_e_49').hide();
	});
});
</script>
<div id="int_Question_e_4">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">1.En fin de période, la comptabilité utilise-t-elle pour évaluer les provisions pour factures et avoirs à recevoir :<br />d)	la liste des produits afférents aux achats (voir B8) ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_e_4" name="rad_Question_e4" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_e_4" name="rad_Question_e4" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_e_4" name="rad_Question_e4" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_e4" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_e_Question_Precedent_4"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_e_4_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_e"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_e_4" /></div>