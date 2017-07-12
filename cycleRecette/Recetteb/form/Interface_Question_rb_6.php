<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=240 AND CYCLE_ACHAT_ID=18 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_rb_6_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_rb6").value=="" && document.getElementById("rad_Question_Non_rb_6").checked== true) || (document.getElementById("rad_Question_Oui_rb_6").checked==false && document.getElementById("rad_Question_NA_rb_6").checked==false && document.getElementById("rad_Question_Non_rb_6").checked==false)){
			$('#mess_quest_vide_rb6').show();
			$('#Question_rb_240').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_rb").value;
			commentaire=document.getElementById("commentaire_Question_rb6").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_rb_6").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_rb_6").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_rb_6").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetteb/php/detect_objectif_exist_rb.php',
				data:{mission_id:mission_id, question_id:240, cycle_achat_id:18},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_rb(commentaire, qcm, mission_id, 240);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recetteb/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:240, mission_id:mission_id, cycleId:18},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("rb_7","rb7");
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recetteb/load/load_rep_rb.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_rb').hide();
										$('#frm_tab_res_rb').html(e).show();
										$('#dv_table_rb').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_rb_240').fadeOut(500);
			$('#Question_rb_241').fadeIn(500);
			$('#lb_veuillez_aff_rb').hide();
		}

	});
	$('#int_rb_Question_Precedent_6').click(function(){
		$('#Question_rb_240').fadeOut(500);
		$('#Question_rb_239').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_rb_6').click(function(){
		$('#message_fermeture_question_rb6').show();
		$('#Question_rb_240').hide();
	});
});
</script>
<div id="int_Question_rb_6">
	<table width="500" id="t_rb_6">
		<tr style="height:10px">
			<td class="label_Question" align="center">
			4.Le montant des titres de paiement remis à la banque est-il régulièrement rapproché ?<br/>a)	du total enregistré en 1 ?
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_rb_6" name="rad_Question_rb6" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_rb_6" name="rad_Question_rb6" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_rb_6" name="rad_Question_rb6" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_rb6" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_rb_Question_Precedent_6"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_rb_6_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_rb"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_rb_6" /></div>