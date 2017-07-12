<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=229 AND CYCLE_ACHAT_ID=17 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_pe_3_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_pe3").value=="" && document.getElementById("rad_Question_Non_pe_3").checked== true) || (document.getElementById("rad_Question_Oui_pe_3").checked==false && document.getElementById("rad_Question_NA_pe_3").checked==false && document.getElementById("rad_Question_Non_pe_3").checked==false)){
			$('#mess_quest_vide_pe3').show();
			$('#Question_pe_229').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pe").value;
			commentaire=document.getElementById("commentaire_Question_pe3").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pe_3").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pe_3").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pe_3").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiee/php/detect_objectif_exist_pe.php',
				data:{mission_id:mission_id, question_id:229, cycle_achat_id:17},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pe(commentaire, qcm, mission_id, 229);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiee/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:229, mission_id:mission_id, cycleId:17},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("pe_4","pe4");
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paiee/load/load_rep_pe.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_pe').hide();
										$('#frm_tab_res_pe').html(e).show();
										$('#dv_table_pe').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_pe_229').fadeOut(500);
			$('#Question_pe_230').fadeIn(500);
			$('#lb_veuillez_aff_pe').hide();
		}

	});
	$('#int_pe_Question_Precedent_3').click(function(){
		$('#Question_pe_229').fadeOut(500);
		$('#Question_pe_228').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_pe_3').click(function(){
		$('#message_fermeture_question_pe3').show();
		$('#Question_pe_229').hide();
	});
});
</script>
<div id="int_Question_pe_3">
	<table width="500" id="t_pe_3">
		<tr style="height:10px">
			<td class="label_Question" align="center">2.Ce contrôle porte-t-il sur les imputations en :<br/>b)	comptabilité analytique ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_pe_3" name="rad_Question_pe3" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_pe_3" name="rad_Question_pe3" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_pe_3" name="rad_Question_pe3" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_pe3" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_pe_Question_Precedent_3"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_pe_3_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_pe"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_pe_3" /></div>