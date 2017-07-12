<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=339 AND CYCLE_ACHAT_ID=27 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_vc_5_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_vc5").value=="" && document.getElementById("rad_Question_Non_vc_5").checked== true) || (document.getElementById("rad_Question_Oui_vc_5").checked==false && document.getElementById("rad_Question_NA_vc_5").checked==false && document.getElementById("rad_Question_Non_vc_5").checked==false)){
			$('#mess_quest_vide_vc5').show();
			$('#Question_vc_339').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vc").value;
			commentaire=document.getElementById("commentaire_Question_vc5").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vc_5").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vc_5").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vc_5").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventec/php/detect_objectif_exist_vc.php',
				data:{mission_id:mission_id, question_id:339, cycle_achat_id:27},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_vc(commentaire, qcm, mission_id, 339);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventec/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:339, mission_id:mission_id, cycleId:27},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("vc_6","vc6");
								$.ajax({
									type:'POST',
									url:'cycleVente/Ventec/load/load_rep_vc.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_vc').hide();
										$('#frm_tab_res_vc').html(e).show();
										$('#dv_table_vc').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_vc_339').fadeOut(500);
			$('#Question_vc_340').fadeIn(500);
			$('#lb_veuillez_aff_vc').hide();
		}

	});
	$('#int_vc_Question_Precedent_5').click(function(){
		$('#Question_vc_339').fadeOut(500);
		$('#Question_vc_338').fadeIn(500);
	});
		//Fermeture du question num 11
	$('#fermer_Question_vc_5').click(function(){
		$('#message_fermeture_question_vc5').show();
		$('#Question_vc_339').hide();
	});
});
</script>
<div id="int_Question_vc_5">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">4.Tout avoir, pour être émis, doit-il<br/>a)	être précédé par un bon de retour ou un bon de réclamation ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_vc_5" name="rad_Question_vc5" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_vc_5" name="rad_Question_vc5" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_vc_5" name="rad_Question_vc5" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_vc5" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="Precedent" class="bouton" id="int_vc_Question_Precedent_5"/>&nbsp;&nbsp;&nbsp;
					<input type="button" value="Suivant" class="bouton" id="Question_vc_5_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_vc"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_vc_5" /></div>