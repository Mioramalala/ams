<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=276 AND CYCLE_ACHAT_ID=21 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>
<script>
$(function(){
	$('#Question_re_4_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_re4").value=="" && document.getElementById("rad_Question_Non_re_4").checked== true) || (document.getElementById("rad_Question_Oui_re_4").checked==false && document.getElementById("rad_Question_NA_re_4").checked==false && document.getElementById("rad_Question_Non_re_4").checked==false)){
			$('#mess_quest_vide_re4').show();
			$('#Question_re_276').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_re").value;
			commentaire=document.getElementById("commentaire_Question_re4").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_re_4").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_re_4").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_re_4").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettee/php/detect_objectif_exist_re.php',
				data:{mission_id:mission_id, question_id:276, cycle_achat_id:21},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_re(commentaire, qcm, mission_id, 276);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettee/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:276, mission_id:mission_id, cycle_achat_id:21},
							success:function(e1){
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("re_5","re5");
								$.ajax({
									type:'POST',
									url:'cycleRecette/Recettee/load/load_rep_re.php',
									data:{mission_id:mission_id},
									success:function(e){	
										$('#Interface_Question_re').hide();
										$('#frm_tab_res_re').html(e).show();
										$('#dv_table_re').show();
									}
								});	
							}
						});
					}
				}
			});

			$('#Question_re_276').fadeOut(500);
			$('#Question_re_277').fadeIn(500);
			$('#lb_veuillez_aff_re').hide();
		}

	});
	$('#int_re_Question_Precedent_4').click(function(){
		$('#Question_re_276').fadeOut(500);
		$('#Question_re_275').fadeIn(500);
	});
	//Fermeture du question num 11
	$('#fermer_Question_re_4').click(function(){
		$('#message_fermeture_question_re4').show();
		$('#Question_re_276').hide();
	});
});
</script>
<div id="int_Question_re_4">
	<table width="500" id="t_re_4">
		<tr style="height:10px">
			<td class="label_Question" align="center">2.Les effets en portefeuille sont-ils régulièrement totalisés et rapprochés :<br/>a)	de l'échéancier ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_re_4" name="rad_Question_re4" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_re_4" name="rad_Question_re4" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_re_4" name="rad_Question_re4" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_re4" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_re_Question_Precedent_4"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Suivant" class="bouton" id="Question_re_4_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_re"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_re_4" /></div>