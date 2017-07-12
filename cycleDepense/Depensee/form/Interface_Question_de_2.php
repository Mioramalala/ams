<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=313 AND CYCLE_ACHAT_ID=25 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_de_2_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_de2").value=="" && document.getElementById("rad_Question_Non_de_2").checked== true) || (document.getElementById("rad_Question_Oui_de_2").checked==false && document.getElementById("rad_Question_NA_de_2").checked==false && document.getElementById("rad_Question_Non_de_2").checked==false)){
			$('#mess_quest_vide_de2').show();
			$('#Question_de_313').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_de").value;
			commentaire=document.getElementById("commentaire_Question_de2").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_de_2").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_de_2").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_de_2").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensee/php/detect_objectif_exist_de.php',
				data:{mission_id:mission_id, question_id:313, cycle_achat_id:25},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_de(commentaire, qcm, mission_id, 313);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleDepense/Depensee/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:313, mission_id:mission_id, cycleId:25},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("de_3","de3");
								$.ajax({
									type:'POST',
									url:'cycleDepense/Depensee/load/load_rep_de.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_de').hide();
										$('#frm_tab_res_de').html(e).show();
										$('#dv_table_de').show();
									}
								});	
							}
						});

					}
				}
			});

			$('#Question_de_313').fadeOut(500);
			$('#Question_de_314').fadeIn(500);
			$('#lb_veuillez_aff_de').hide();
		}

	});
	
	$('#int_de_Question_Precedent_2').click(function(){
		$('#Question_de_313').fadeOut(500);
		$('#Question_de_312').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_de_2').click(function(){
		$('#message_fermeture_question_de2').show();
		$('#Question_de_313').hide();
	});
});


</script>

<div id="int_Question_de_2">
	<table width="500" id="t_de_2">
		<tr style="height:10px">
			<td class="label_Question" align="center">1.Les souches des titres de paiement sont-elles rapprochées par une personne indépendante de celle qui les a émis :<br/>b)	de l'original ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_de_2" name="rad_Question_de2" <?php if($qcm=="OUI") echo 'checked'; ?>  />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_de_2" name="rad_Question_de2" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_de_2" name="rad_Question_de2" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_de2" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_de_Question_Precedent_2"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_de_2_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_de"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_de_2" /></div>