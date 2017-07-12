
<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=148 AND CYCLE_ACHAT_ID=12 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_stc_14_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_stc14").value=="") || (document.getElementById("rad_Question_Oui_stc_14").checked==false && document.getElementById("rad_Question_NA_stc_14").checked==false && document.getElementById("rad_Question_Non_stc_14").checked==false)){
			$('#mess_quest_vide_stc14').show();
			$('#Question_stc_148').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stc").value;
			commentaire=document.getElementById("commentaire_Question_stc14").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_stc_14").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_stc_14").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_stc_14").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockc/php/detect_objectif_exist_stc.php',
				data:{mission_id:mission_id, question_id:148, cycle_achat_id:12},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_stc(commentaire, qcm, mission_id, 148);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockc/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:148, mission_id:mission_id, cycleId:12},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("stc_15","stc15");
								$.ajax({
									type:'POST',
									url:'cycleStock/Stockc/load/load_rep_stc.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_stc').hide();
										$('#frm_tab_res_stc').html(e).show();
										$('#dv_table_stc').show();
									}
								});	
							}
						});
					}
				}
			});
			$('#Question_stc_148').fadeOut(500);
			$('#Question_stc_149').fadeIn(500);
			$('#lb_veuillez_aff_stc').hide();
		}
	});
	$('#int_stc_Question_Precedent_14').click(function(){
		$('#Question_stc_148').fadeOut(500);
		$('#Question_stc_147').fadeIn(500);
	});
	//Fermeture du question num 14
	$('#fermer_Question_stc_14').click(function(){
		$('#message_fermeture_question_stc14').show();
		$('#Question_stc_148').hide();
	});
});
</script>
<div id="int_Question_stc_14">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">14.Les stocks détenus par des tiers sont-ils :<br/>a)	suivis sur des fiches de stocks distinctes ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_stc_14" name="rad_Question_stc14" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_stc_14" name="rad_Question_stc14" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_stc_14" name="rad_Question_stc14" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_stc14" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_stc_Question_Precedent_14"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_stc_14_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_stc"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_stc_14" /></div>