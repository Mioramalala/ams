<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=391 AND CYCLE_ACHAT_ID=29 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_ve_6_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_ve6").value=="") || (document.getElementById("rad_Question_Oui_ve_6").checked==false && document.getElementById("rad_Question_NA_ve_6").checked==false && document.getElementById("rad_Question_Non_ve_6").checked==false)){
			$('#mess_quest_vide_ve6').show();
			$('#Question_ve_391').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_ve").value;
			commentaire=document.getElementById("commentaire_Question_ve6").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_ve_6").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_ve_6").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_ve_6").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventee/php/detect_objectif_exist_ve.php',
				data:{mission_id:mission_id, question_id:391, cycle_achat_id:29},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_ve(commentaire, qcm, mission_id, 391);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleVente/Ventee/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:391, mission_id:mission_id, cycleId:29},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("ve_7","ve7");
								$.ajax({
									type:'POST',
									url:'cycleVente/Ventee/load/load_rep_ve.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_ve').hide();
										$('#frm_tab_res_ve').html(e).show();
										$('#dv_table_ve').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_ve_391').fadeOut(500);
			$('#Question_ve_392').fadeIn(500);
			$('#lb_veuillez_aff_ve').hide();
		}

	});
	$('#int_ve_Question_Precedent_6').click(function(){
		$('#Question_ve_391').fadeOut(500);
		$('#Question_ve_390').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_ve_6').click(function(){
		$('#message_fermeture_question_ve6').show();
		$('#Question_ve_391').hide();
	});
});
</script>
<div id="int_Question_ve_6">
	<table width="500" id="t_ve_6">
		<tr style="height:10px">
			<td class="label_Question" align="center">6.Les contrôles réalisés en 2 et 3 ci-dessus permettent-ils de s'assurer, en fin de période, que les expéditions, les facturations et le journal des ventes sont arrêtés à la même date ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_ve_6" name="rad_Question_ve6" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_ve_6" name="rad_Question_ve6" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_ve_6" name="rad_Question_ve6" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_ve6" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_ve_Question_Precedent_6"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_ve_6_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_ve"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_ve_6" /></div>