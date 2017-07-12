
<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=190 AND CYCLE_ACHAT_ID=14 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_pb_10_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_pb10").value=="" && document.getElementById("rad_Question_Non_pb_10").checked== true) || (document.getElementById("rad_Question_Oui_pb_10").checked==false && document.getElementById("rad_Question_NA_pb_10").checked==false && document.getElementById("rad_Question_Non_pb_10").checked==false)){
			$('#mess_quest_vide_pb10').show();
			$('#Question_pb_190').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pb").value;
			commentaire=document.getElementById("commentaire_Question_pb10").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pb_10").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pb_10").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pb_10").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paieb/php/detect_objectif_exist_pb.php',
				data:{mission_id:mission_id, question_id:190, cycle_achat_id:14},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pb(commentaire, qcm, mission_id, 190);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paieb/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:190, mission_id:mission_id, cycleId:14},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("pb_11","pb11");
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

			$('#Question_pb_190').fadeOut(500);
			$('#Question_pb_191').fadeIn(500);
			$('#lb_veuillez_aff_pb').hide();
		}

	});
	$('#int_pb_Question_Precedent_10').click(function(){
		$('#Question_pb_190').fadeOut(500);
		$('#Question_pb_189').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_pb_10').click(function(){
		$('#message_fermeture_question_pb10').show();
		$('#Question_pb_190').hide();
	});
});
</script>
<div id="int_Question_pb_10">
	<table width="500" id="t_pb_10">
		<tr style="height:10px">
			<td class="label_Question" align="center">9.Lorsque l'entreprise se substitue aux régimes sociaux pour le paiement de prepations, celles-ci sont-elles identifiées afin de permettre le suivi de leur récupération ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_pb_10" name="rad_Question_pb10" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_pb_10" name="rad_Question_pb10" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_pb_10" name="rad_Question_pb10" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_pb10" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_pb_Question_Precedent_10"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_pb_10_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_pb"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_pb_10" /></div>