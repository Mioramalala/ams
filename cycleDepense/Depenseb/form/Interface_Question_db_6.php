<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=285 AND CYCLE_ACHAT_ID=22 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_db_6_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_db6").value=="" && document.getElementById("rad_Question_Non_db_6").checked== true) || (document.getElementById("rad_Question_Oui_db_6").checked==false && document.getElementById("rad_Question_NA_db_6").checked==false && document.getElementById("rad_Question_Non_db_6").checked==false)){
			$('#mess_quest_vide_db6').show();
			$('#Question_db_285').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_db").value;
			commentaire=document.getElementById("commentaire_Question_db6").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_db_6").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_db_6").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_db_6").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depenseb/php/detect_objectif_exist_db.php',
				data:{mission_id:mission_id, question_id:285, cycle_achat_id:22},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_db(commentaire, qcm, mission_id, 285);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depenseb/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:285, mission_id:mission_id, cycleId:22},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("db_7","db7");
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

			$('#Question_db_285').fadeOut(500);
			$('#Question_db_286').fadeIn(500);
			$('#lb_veuillez_aff_db').hide();
		}

	});
	$('#int_db_Question_Precedent_6').click(function(){
		$('#Question_db_285').fadeOut(500);
		$('#Question_db_284').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_db_6').click(function(){
		$('#message_fermeture_question_db6').show();
		$('#Question_db_285').hide();
	});
});
</script>
<div id="int_Question_db_6">
	<table width="500" id="t_db_6">
		<tr style="height:10px">
			<td class="label_Question" align="center">
			3.La mise en service des liasses de titres de paiement est-elle (liasses manuelles ou informatiques) :<br/>b)	rapprochées des journaux correspondants ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_db_6" name="rad_Question_db6" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_db_6" name="rad_Question_db6" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_db_6" name="rad_Question_db6" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_db6" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_db_Question_Precedent_6"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_db_6_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_db"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_db_6" /></div>