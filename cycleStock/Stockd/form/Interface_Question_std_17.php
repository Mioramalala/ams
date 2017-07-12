
<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=168 AND CYCLE_ACHAT_ID=13 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_std_17_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_std17").value=="" && document.getElementById("rad_Question_Non_std_17").checked== true) || (document.getElementById("rad_Question_Oui_std_17").checked==false && document.getElementById("rad_Question_NA_std_17").checked==false && document.getElementById("rad_Question_Non_std_17").checked==false)){
			$('#mess_quest_vide_std17').show();
			$('#Question_std_168').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_std").value;
			commentaire=document.getElementById("commentaire_Question_std16").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_std_17").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_std_17").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_std_17").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockd/php/detect_objectif_exist_std.php',
				data:{mission_id:mission_id, question_id:168, cycle_achat_id:13},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_std(commentaire, qcm, mission_id, 168);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockd/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:168, mission_id:mission_id, cycleId:13},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("std_18","std18");
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

			$('#Question_std_168').fadeOut(500);
			$('#Question_std_169').fadeIn(500);
			$('#lb_veuillez_aff_std').hide();
		}

	});
	$('#int_std_Question_Precedent_17').click(function(){
		$('#Question_std_168').fadeOut(500);
		$('#Question_std_167').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_std_17').click(function(){
		$('#message_fermeture_question_std17').show();
		$('#Question_std_168').hide();
	});
});
</script>
<div id="int_Question_std_17">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">
				8.<b>Toutes méthodes</b><br/>
				Des contrôles de cohérence sont-ils régulièrement effectués sur les données suivantes :<br/>
				a)	marge brute par produit ou famille de produits ?

		</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_std_17" name="rad_Question_std16" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_std_17" name="rad_Question_std16" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_std_17" name="rad_Question_std16" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_std17" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_std_Question_Precedent_17"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_std_17_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_std"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_std_17" /></div>