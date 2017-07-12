<?php

include '../../../connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=28 AND CYCLE_ACHAT_ID=3 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_c_6_Bouton').click(function(){
		// tinay editer
		//if((document.getElementById("commentaire_Question_c6").value=="") || (document.getElementById("rad_Question_Oui_c_6").checked==false && document.getElementById("rad_Question_NA_c_6").checked==false && document.getElementById("rad_Question_Non_c_6").checked==false)){
		if((document.getElementById("commentaire_Question_c6").value=="" && document.getElementById("rad_Question_Non_c_6").checked== true) || (document.getElementById("rad_Question_Oui_c_6").checked==false && document.getElementById("rad_Question_NA_c_6").checked==false && document.getElementById("rad_Question_Non_c_6").checked==false)){
			$('#mess_quest_vide_c6').show();
			$('#Question_c_28').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_c").value;
			commentaire=document.getElementById("commentaire_Question_c6").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_c_6").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_c_6").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_c_6").checked==true){
				qcm="NON";
			}
			objectif_id=0;

			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_c/php/detect_objectif_exist_c.php',
				data:{mission_id:mission_id, question_id:28, cycle_achat_id:3},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_c(commentaire, qcm, mission_id, 28);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achat_c/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:28, mission_id:mission_id, cycleId:3},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split('*');
								afficheReponseQuestacc("c_7","c7");
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_c/load/load_rep_c.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_c').hide();
										$('#frm_tab_res_c').html(e).show();
										$('#dv_table_c').show();
									}
								});
							}
						});
					}
				}
			});

			$('#Question_c_28').fadeOut(500);
			$('#Question_c_29').fadeIn(500);
			$('#lb_veuillez_aff_c').hide();
		}

	});
	$('#int_c_Question_Precedent_6').click(function(){
		$('#Question_c_28').fadeOut(500);
		$('#Question_c_27').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_c_6').click(function(){
		$('#message_fermeture_question_c6').show();
		$('#Question_c_28').hide();
	});
});
</script>
<div id="int_Question_c_6">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">6.Les factures et avoirs sont-ils rapprochés des bons de livraison, de retour ou réclamation et des bons de commande pour éviter les erreurs de facturation ?
</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_c_6" name="rad_Question_c6" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_c_6" name="rad_Question_c6" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_c_6" name="rad_Question_c6" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_c6" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_c_Question_Precedent_6"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_c_6_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_c"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_c_6" /></div>