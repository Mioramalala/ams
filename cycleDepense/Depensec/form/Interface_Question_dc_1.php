<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=295 AND CYCLE_ACHAT_ID=23 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>

<script>
function enregistrer_commentaire_dc(commentaire, qcm, mission_id, question_id){
	$.ajax({
		type:'POST',
		url:'cycleDepense/Depensec/php/enregistrer_achat_object_dc.php',
		data:{commentaire:commentaire, qcm:qcm, mission_id:mission_id, question_id:question_id},
		success:function(){
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensec/load/load_rep_dc.php',
				data:{mission_id:mission_id},
				success:function(e){
					$('#Interface_Question_dc').hide();
					$('#frm_tab_res_dc').html(e).show();
				}
			 });
		}
	});
}
$(function(){
	$('#Question_dc_1_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_dc1").value=="" && document.getElementById("rad_Question_Non_dc_1").checked== true) || (document.getElementById("rad_Question_Oui_dc_1").checked==false && document.getElementById("rad_Question_NA_dc_1").checked==false && document.getElementById("rad_Question_Non_dc_1").checked==false)){
			$('#mess_quest_vide_dc1').show();
			$('#Question_dc_295').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_dc").value;
			commentaire=document.getElementById("commentaire_Question_dc1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_dc_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_dc_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_dc_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensec/php/detect_objectif_exist_dc.php',
				data:{mission_id:mission_id, question_id:295, cycle_achat_id:23},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_dc(commentaire, qcm, mission_id, 295);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensec/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:295, mission_id:mission_id, cycleId:23},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("dc_2","dc2");
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depensec/load/load_rep_dc.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_dc').hide();
										$('#frm_tab_res_dc').html(e).show();
										$('#dv_table_dc').show();
									}
								});	
							}
						});

					}
				}
			});

			$('#Question_dc_295').fadeOut(500);
			$('#Question_dc_296').fadeIn(500);
			$('#lb_veuillez_aff_dc').hide();
		}

	});
	//Fermeture du question num 11
	$('#fermer_Question_dc_1').click(function(){
		$('#message_fermeture_question_dc').show();
		$('#Question_dc_295').hide();
	});

});

</script>

<div id="int_Question_dc_1">
	<table width="500" id="t_dc_1">
		<tr style="height:10px">
			<td class="label_Question" align="center">1.Les duplicatas de titres de paiement sont-ils systématiquement annulés pour éviter les doubles comptabilisations.</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_dc_1" name="rad_Question_dc1" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_dc_1" name="rad_Question_dc1" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_dc_1" name="rad_Question_dc1" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_dc1" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="Suivant" class="bouton" id="Question_dc_1_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_dc"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_dc_1" /></div>