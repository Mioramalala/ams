<?php

include '../../../connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=52 AND CYCLE_ACHAT_ID=5 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_e_7_Bouton').click(function(){
		//tinay editer
		//if((document.getElementById("commentaire_Question_e7").value=="") || (document.getElementById("rad_Question_Oui_e_7").checked==false && document.getElementById("rad_Question_NA_e_7").checked==false && document.getElementById("rad_Question_Non_e_7").checked==false)){
		if((document.getElementById("commentaire_Question_e7").value=="" && document.getElementById("rad_Question_Non_e_7").checked== true) || (document.getElementById("rad_Question_Oui_e_7").checked==false && document.getElementById("rad_Question_NA_e_7").checked==false && document.getElementById("rad_Question_Non_e_7").checked==false)){
			$('#mess_quest_vide_e7').show();
			$('#Question_e_52').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_e").value;
			commentaire=document.getElementById("commentaire_Question_e7").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_e_7").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_e_7").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_e_7").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_e/php/detect_objectif_exist_e.php',
				data:{mission_id:mission_id, question_id:52, cycle_achat_id:5},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_e(commentaire, qcm, mission_id, 52);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_e/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:52, mission_id:mission_id, cycleId:5},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split('*');
								afficheReponseQuestace("e_8","e8");
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

			$('#Question_e_52').fadeOut(500);
			$('#Question_e_53').fadeIn(500);
			$('#lb_veuillez_aff_e').hide();
		}

	});
	$('#int_e_Question_Precedent_7').click(function(){
		$('#Question_e_52').fadeOut(500);
		$('#Question_e_51').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_e_7').click(function(){
		$('#message_fermeture_question_e7').show();
		$('#Question_e_52').hide();
	});
});
</script>
<div id="int_Question_e_7">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">7.Pour les charges récurrentes (loyers, assurances...) s’assure-t-on que le montant passé en charge correspond à la période ?
</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_e_7" name="rad_Question_e7" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_e_7" name="rad_Question_e7" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_e_7" name="rad_Question_e7" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_e7" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_e_Question_Precedent_7"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_e_7_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_e"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_e_7" /></div>