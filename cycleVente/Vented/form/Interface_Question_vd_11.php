
<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=361 AND CYCLE_ACHAT_ID=28 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_vd_11_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_vd11").value=="" && document.getElementById("rad_Question_Non_vd_11").checked== true) || (document.getElementById("rad_Question_Oui_vd_11").checked==false && document.getElementById("rad_Question_NA_vd_11").checked==false && document.getElementById("rad_Question_Non_vd_11").checked==false)){
			$('#mess_quest_vide_vd11').show();
			$('#Question_vd_361').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_vd").value;
			commentaire=document.getElementById("commentaire_Question_vd11").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_vd_11").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_vd_11").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_vd_11").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Vented/php/detect_objectif_exist_vd.php',
				data:{mission_id:mission_id, question_id:361, cycle_achat_id:28},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_vd(commentaire, qcm, mission_id, 361);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Vented/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:361, mission_id:mission_id, cycleId:28},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("vd_12","vd12");
								$.ajax({
									type:'POST',
									url:'cycleVente/Vented/load/load_rep_vd.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_vd').hide();
										$('#frm_tab_res_vd').html(e).show();
										$('#dv_table_vd').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_vd_361').fadeOut(500);
			$('#Question_vd_362').fadeIn(500);
			$('#lb_veuillez_aff_vd').hide();
		}

	});
	$('#int_vd_Question_Precedent_11').click(function(){
		$('#Question_vd_361').fadeOut(500);
		$('#Question_vd_360').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_vd_11').click(function(){
		$('#message_fermeture_question_vd11').show();
		$('#Question_vd_361').hide();
	});
});
</script>
<div id="int_Question_vd_11">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">4.Les calculs des factures et avoirs sont-ils vérifiés (ou le logiciel régulièrement testé) ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_vd_11" name="rad_Question_vd11" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_vd_11" name="rad_Question_vd11" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_vd_11" name="rad_Question_vd11" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_vd11" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_vd_Question_Precedent_11"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_vd_11_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_vd"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_vd_11" /></div>