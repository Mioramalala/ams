<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=266 AND CYCLE_ACHAT_ID=20 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_rd_3_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_rd3").value=="" && document.getElementById("rad_Question_Non_rd_3").checked== true) || (document.getElementById("rad_Question_Oui_rd_3").checked==false && document.getElementById("rad_Question_NA_rd_3").checked==false && document.getElementById("rad_Question_Non_rd_3").checked==false)){
			$('#mess_quest_vide_rd3').show();
			$('#Question_rd_266').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rd").value;
			commentaire=document.getElementById("commentaire_Question_rd3").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_rd_3").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_rd_3").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_rd_3").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetted/php/detect_objectif_exist_rd.php',
				data:{mission_id:mission_id, question_id:266, cycle_achat_id:20},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_rd(commentaire, qcm, mission_id, 266);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetted/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:266, mission_id:mission_id, cycleId:20},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("rd_4","rd4");
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recetted/load/load_rep_rd.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_rd').hide();
										$('#frm_tab_res_rd').html(e).show();
										$('#dv_table_rd').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_rd_266').fadeOut(500);
			$('#Question_rd_267').fadeIn(500);
			$('#lb_veuillez_aff_rd').hide();
		}

	});
	$('#int_rd_Question_Precedent_3').click(function(){
		$('#Question_rd_266').fadeOut(500);
		$('#Question_rd_265').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_rd_3').click(function(){
		$('#message_fermeture_question_rd3').show();
		$('#Question_rd_266').hide();
	});
});
</script>
<div id="int_Question_rd_3">
	<table width="500" id="t_rd_3">
		<tr style="height:10px">
			<td class="label_Question" align="center">3.Les recettes sont-elles comptabilisées au jour le jour ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_rd_3" name="rad_Question_rd3" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_rd_3" name="rad_Question_rd3" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_rd_3" name="rad_Question_rd3" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_rd3" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_rd_Question_Precedent_3"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_rd_3_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_rd"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_rd_3" /></div>