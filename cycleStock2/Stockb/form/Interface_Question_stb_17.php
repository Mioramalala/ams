<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=133 AND CYCLE_ACHAT_ID=11 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_stb_17_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_stb17").value=="") || (document.getElementById("rad_Question_Oui_stb_17").checked==false && document.getElementById("rad_Question_NA_stb_17").checked==false && document.getElementById("rad_Question_Non_stb_17").checked==false)){
			$('#mess_quest_vide_stb17').show();
			$('#Question_stb_133').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stb").value;
			commentaire=document.getElementById("commentaire_Question_stb17").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_stb_17").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_stb_17").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_stb_17").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockb/php/detect_objectif_exist_stb.php',
				data:{mission_id:mission_id, question_id:133, cycle_achat_id:11},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_stb(commentaire, qcm, mission_id, 133);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockb/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:133, mission_id:mission_id, cycleId:11},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("stb_17","stb17");
								$.ajax({
									type:'POST',
									url:'cycleStock/Stockb/load/load_rep_stb.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_stb').hide();
										$('#frm_tab_res_stb').html(e).show();
										$('#dv_table_stb').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_stb_133').fadeOut(500);
			$('#Question_stb_134').fadeIn(500);
			$('#lb_veuillez_aff_stb').hide();
		}

	});
	$('#int_stb_Question_Precedent_17').click(function(){
		$('#Question_stb_133').fadeOut(500);
		$('#Question_stb_132').fadeIn(500);
	});

	//Fermeture du question num 11
	$('#fermer_Question_stb_17').click(function(){
		$('#message_fermeture_question_stb17').show();
		$('#Question_stb_133').hide();
	});
});
</script>
<div id="int_Question_stb_17">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">17.Si oui, les informations correspondantes sont-elles saisies immédiatement :<br/>b)	dans le stock théorique ?
</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_stb_17" name="rad_Question_stb17" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_stb_17" name="rad_Question_stb17" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_stb_17" name="rad_Question_stb17" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_stb17" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_stb_Question_Precedent_17"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_stb_17_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_stb"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_stb_17" /></div>