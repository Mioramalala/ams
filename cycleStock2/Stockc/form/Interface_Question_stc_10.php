
<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=144 AND CYCLE_ACHAT_ID=12 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_stc_10_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_stc10").value=="") || (document.getElementById("rad_Question_Oui_stc_10").checked==false && document.getElementById("rad_Question_NA_stc_10").checked==false && document.getElementById("rad_Question_Non_stc_10").checked==false)){
			$('#mess_quest_vide_stc10').show();
			$('#Question_stc_144').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_stc").value;
			commentaire=document.getElementById("commentaire_Question_stc10").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_stc_10").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_stc_10").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_stc_10").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleStock/Stockc/php/detect_objectif_exist_stc.php',
				data:{mission_id:mission_id, question_id:144, cycle_achat_id:12},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_stc(commentaire, qcm, mission_id, 144);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleStock/Stockc/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:144, mission_id:mission_id, cycleId:12},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("stc_11","stc11");
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

			$('#Question_stc_144').fadeOut(500);
			$('#Question_stc_145').fadeIn(500);
			$('#lb_veuillez_aff_stc').hide();
		}

	});
	$('#int_stc_Question_Precedent_10').click(function(){
		$('#Question_stc_144').fadeOut(500);
		$('#Question_stc_143').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_stc_10').click(function(){
		$('#message_fermeture_question_stc10').show();
		$('#Question_stc_144').hide();
	});
});
</script>
<div id="int_Question_stc_10">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">10.Si des inventaires tournants sont effectués :<br/>c)	les mouvements physiques et comptables sont-ils arrêtés simultanément pour chaque produit compté ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_stc_10" name="rad_Question_stc10" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_stc_10" name="rad_Question_stc10" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_stc_10" name="rad_Question_stc10" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_stc10" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_stc_Question_Precedent_10"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_stc_10_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_stc"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_stc_10" /></div>