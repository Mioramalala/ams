
<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=191 AND CYCLE_ACHAT_ID=14 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_pb_11_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_pb11").value=="" && document.getElementById("rad_Question_Non_pb_11").checked== true) || (document.getElementById("rad_Question_Oui_pb_11").checked==false && document.getElementById("rad_Question_NA_pb_11").checked==false && document.getElementById("rad_Question_Non_pb_11").checked==false)){
			$('#mess_quest_vide_pb11').show();
			$('#Question_pb_191').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pb").value;
			commentaire=document.getElementById("commentaire_Question_pb11").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pb_11").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pb_11").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pb_11").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/php/detect_objectif_exist_pb.php',
				data:{mission_id:mission_id, question_id:191, cycle_achat_id:14},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pb(commentaire, qcm, mission_id, 191);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:191, mission_id:mission_id, cycleId:14},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("pb_12","pb12");
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paieb/load/load_rep_pb.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_pb').hide();
										$('#frm_tab_res_pb').html(e).show();
										$('#dv_table_pb').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_pb_191').fadeOut(500);
			$('#Question_pb_192').fadeIn(500);
			$('#lb_veuillez_aff_pb').hide();
		}

	});
	$('#int_pb_Question_Precedent_11').click(function(){
		$('#Question_pb_191').fadeOut(500);
		$('#Question_pb_190').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_pb_11').click(function(){
		$('#message_fermeture_question_pb11').show();
		$('#Question_pb_191').hide();
	});
});
</script>
<div id="int_Question_pb_11">
	<table width="500" id="t_pb_11">
		<tr style="height:10px">
			<td class="label_Question" align="center">10.S'assure-t-on que toutes les modifications aux données permanentes de la paie sont saisies</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_pb_11" name="rad_Question_pb11" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_pb_11" name="rad_Question_pb11" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_pb_11" name="rad_Question_pb11" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_pb11" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_pb_Question_Precedent_11"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_pb_11_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_pb"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_pb_11" /></div>