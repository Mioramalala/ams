<?php

include 'connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=273 AND CYCLE_ACHAT_ID=21 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>

<script>
function enregistrer_commentaire_re(commentaire, qcm, mission_id, question_id){
	$.ajax({
		type:'POST',
		url:'cycleRecette/Recettee/php/enregistrer_achat_object_re.php',
		data:{commentaire:commentaire, qcm:qcm, mission_id:mission_id, question_id:question_id},
		success:function(){
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettee/load/load_rep_re.php',
				data:{mission_id:mission_id},
				success:function(e){
					$('#Interface_Question_re').hide();
					$('#frm_tab_res_re').html(e).show();
				}
			 });
		}
	});
}
$(function(){
	$('#Question_re_1_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_re1").value=="" && document.getElementById("rad_Question_Non_re_1").checked== true) || (document.getElementById("rad_Question_Oui_re_1").checked==false && document.getElementById("rad_Question_NA_re_1").checked==false && document.getElementById("rad_Question_Non_re_1").checked==false)){
			$('#mess_quest_vide_re1').show();
			$('#Question_re_273').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id_re").value;
			commentaire=document.getElementById("commentaire_Question_re1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_re_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_re_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_re_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettee/php/detect_objectif_exist_re.php',
				data:{mission_id:mission_id, question_id:273, cycle_achat_id:21},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_re(commentaire, qcm, mission_id, 273);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleRecette/Recettee/php/updateGetQuest.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:273, mission_id:mission_id, cycle_achat_id:21},
							success:function(e1){
								//alert('tinay' +qcm);
								eo=""+e1+"";
								doc=eo.split(',');
								afficheReponseQuest("re_2","re2");
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

			$('#Question_re_273').fadeOut(500);
			$('#Question_re_274').fadeIn(500);
			$('#lb_veuillez_aff_re').hide();
		}

	});
	//Fermeture du question num 11
	$('#fermer_Question_re_1').click(function(){
		$('#message_fermeture_question_re').show();
		$('#Question_re_273').hide();
	});
});

</script>

<div id="int_Question_re_1">
	<table width="500" id="t_re_1">
		<tr style="height:10px">
			<td class="label_Question" align="center">1.Les écarts constatés entre les règlements reçus et les factures sont-ils :<br/>a)	analysés ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_re_1" name="rad_Question_re1" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_re_1" name="rad_Question_re1" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_re_1" name="rad_Question_re1" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_re1" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="Suivant" class="bouton" id="Question_re_1_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_re"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_re_1" /></div>