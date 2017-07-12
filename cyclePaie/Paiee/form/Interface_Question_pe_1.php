<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=227 AND CYCLE_ACHAT_ID=17 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>

<script>
function enregistrer_commentaire_pe(commentaire, qcm, mission_id, question_id){
	$.ajax({
		type:'POST',
		url:'cyclePaie/Paiee/php/enregistrer_achat_object_pe.php',
		data:{commentaire:commentaire, qcm:qcm, mission_id:mission_id, question_id:question_id},
		success:function(){
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiee/load/load_rep_pe.php',
				data:{mission_id:mission_id},
				success:function(e){
					$('#Interface_Question_pe').hide();
					$('#frm_tab_res_pe').html(e).show();
				}
			 });
		}
	});
}
$(function(){
	$('#Question_pe_1_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_pe1").value=="" && document.getElementById("rad_Question_Non_pe_1").checked== true) || (document.getElementById("rad_Question_Oui_pe_1").checked==false && document.getElementById("rad_Question_NA_pe_1").checked==false && document.getElementById("rad_Question_Non_pe_1").checked==false)){
			$('#mess_quest_vide_pe1').show();
			$('#Question_pe_70').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_pe").value;
			commentaire=document.getElementById("commentaire_Question_pe1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_pe_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_pe_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_pe_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paiee/php/detect_objectif_exist_pe.php',
				data:{mission_id:mission_id, question_id:227, cycle_achat_id:17},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_pe(commentaire, qcm, mission_id, 227);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cyclePaie/Paiee/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:227, mission_id:mission_id, cycleId:17},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("pe_2","pe2");
								$.ajax({
									type:'POST',
									url:'cyclePaie/Paiee/load/load_rep_pe.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_pe').hide();
										$('#frm_tab_res_pe').html(e).show();
										$('#dv_table_pe').show();
									}
								});	
							}
						});

					}
				}
			});

			$('#Question_pe_227').fadeOut(500);
			$('#Question_pe_228').fadeIn(500);
			$('#lb_veuillez_aff_pe').hide();
		}

	});
	//Fermeture du question num 11
	$('#fermer_Question_pe_1').click(function(){
		$('#message_fermeture_question_pe').show();
		$('#Question_pe_227').hide();
	});

});

</script>

<div id="int_Question_pe_1">
	<table width="500" id="t_pe_1">
		<tr style="height:10px">
			<td class="label_Question" align="center">1.L'imputation des écritures de charges et produits relatifs à la paie fait-elle l'objet d'un contrôle indépendant ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_pe_1" name="rad_Question_pe1" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_pe_1" name="rad_Question_pe1" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_pe_1" name="rad_Question_pe1" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_pe1" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="Suivant" class="bouton" id="Question_pe_1_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_pe"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_pe_1" /></div>