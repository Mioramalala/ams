<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=294 AND CYCLE_ACHAT_ID=22 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_db_15_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_db15").value=="" && document.getElementById("rad_Question_Non_db_15").checked== true) || (document.getElementById("rad_Question_Oui_db_15").checked==false && document.getElementById("rad_Question_NA_db_15").checked==false && document.getElementById("rad_Question_Non_db_15").checked==false)){
			$('#mess_quest_vide_db15').show();
			$('#Question_db_220').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_db").value;
			commentaire=document.getElementById("commentaire_Question_db15").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_db_15").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_db_15").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_db_15").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depenseb/php/detect_objectif_exist_db.php',
				data:{mission_id:mission_id, question_id:294, cycle_achat_id:22},
				success:function(e){
					objectif_id=e;

					// se rediriger vers calcul score
					$.ajax({
						type:'POST',
						url:'cycleDepense/Depenseb/php/select_score_db.php',
						data:{mission_id:mission_id},
						success:function(e){
						    $("#echo_score_db").html(e);
						}			
					});

					if(objectif_id==0){					
						enregistrer_commentaire_db(commentaire, qcm, mission_id, 294);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depenseb/php/update_object_db.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:294},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depenseb/load/load_rep_db.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_db').hide();
										$('#frm_tab_res_db').html(e).show();
										$('#dv_table_db').show();										
									}
								});
							}
						});
					}
				}
			});

			$('#Question_db_294').fadeOut(500);
			$('#message_Terminer_question_db').show();
			$('#lb_veuillez_aff_db').hide();
		}

	});
	$('#int_db_Question_Precedent_15').click(function(){
		$('#Question_db_294').fadeOut(500);
		$('#Question_db_293').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_db_15').click(function(){
		$('#message_fermeture_question_db15').show();
		$('#Question_db_294').hide();
	});
});
</script>
<div id="int_Question_db_15">
	<table width="500" id="t_db_15">
		<tr style="height:10px">
			<td class="label_Question" align="center">10.Si des états d’anomalies sont produits par l’informatique, sont-ils régulièrement analysés par une personne indépendante ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_db_15" name="rad_Question_db15" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_db_15" name="rad_Question_db15" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_db_15" name="rad_Question_db15" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_db15" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_db_Question_Precedent_15"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Terminer" class="bouton" id="Question_db_15_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_db"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_db_15" /></div>