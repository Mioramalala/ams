<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=175 AND CYCLE_ACHAT_ID=13 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_std_24_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_std24").value=="" && document.getElementById("rad_Question_Non_std_24").checked== true) || (document.getElementById("rad_Question_Oui_std_24").checked==false && document.getElementById("rad_Question_NA_std_24").checked==false && document.getElementById("rad_Question_Non_std_24").checked==false)){
			$('#mess_quest_vide_std24').show();
			$('#Question_std_175').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_std").value;
			commentaire=document.getElementById("commentaire_Question_std24").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_std_24").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_std_24").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_std_24").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockd/php/detect_objectif_exist_std.php',
				data:{mission_id:mission_id, question_id:175, cycle_achat_id:13},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_std(commentaire, qcm, mission_id, 175);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockd/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:175, mission_id:mission_id, cycleId:13},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("std_25","std25");
								$.ajax({
									type:'POST',
									url:'cycleStock/Stockd/load/load_rep_std.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_std').hide();
										$('#frm_tab_res_std').html(e).show();
										$('#dv_table_std').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_std_175').fadeOut(500);
			$('#Question_std_176').fadeIn(500);
			$('#lb_veuillez_aff_std').hide();
		}

	});
	$('#int_std_Question_Precedent_24').click(function(){
		$('#Question_std_175').fadeOut(500);
		$('#Question_std_174').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_std_24').click(function(){
		$('#message_fermeture_question_std24').show();
		$('#Question_std_175').hide();
	});
});
</script>
<div id="int_Question_std_24">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">11.Cette politique couvre-t-elle :<br/>b)	les stocks à rotation lente ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_std_24" name="rad_Question_std24" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_std_24" name="rad_Question_std24" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_std_24" name="rad_Question_std24" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_std24" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_std_Question_Precedent_24"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_std_24_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_std"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_std_24" /></div>