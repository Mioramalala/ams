<?php



include '../../../connexion.php';



$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=6 AND CYCLE_ACHAT_ID=2 AND MISSION_ID='.$mission_id);



$donnees=$reponse->fetch();



$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];

$qcm=$donnees['OBJECTIF_QCM'];



?>

<script>

$(function(){

	$('#Question_acb_6_Bouton').click(function(){

		//tinay editer
		//if((document.getElementById("commentaire_Question_acb6").value=="") || (document.getElementById("rad_Question_Oui_acb_6").checked==false && document.getElementById("rad_Question_NA_acb_6").checked==false && document.getElementById("rad_Question_Non_acb_6").checked==false)){
			if((document.getElementById("commentaire_Question_acb6").value=="" && document.getElementById("rad_Question_Non_acb_6").checked==true) || (document.getElementById("rad_Question_Oui_acb_6").checked==false && document.getElementById("rad_Question_NA_acb_6").checked==false && document.getElementById("rad_Question_Non_acb_6").checked==false)){

			$('#mess_quest_vide_acb6').show();

			$('#Question_acb_6').hide();

		}

		else{

			mission_id=document.getElementById("txt_mission_id_acb").value;

			commentaire=document.getElementById("commentaire_Question_acb6").value;

			qcm="OUI";

			if(document.getElementById("rad_Question_Oui_acb_6").checked==true){

				qcm="OUI";

			}

			else if(document.getElementById("rad_Question_NA_acb_6").checked==true){

				qcm="N/A";

			}

			else if(document.getElementById("rad_Question_Non_acb_6").checked==true){

				qcm="NON";

			}

			objectif_id=0;

			$.ajax({

				type:'POST',

				url:'cycleAchat/cycle_achat_b/php/detect_objectif_exist_acb.php',

				data:{mission_id:mission_id, question_id:6, cycle_achat_id:2},

				success:function(e){

					objectif_id=e;

					if(objectif_id==0){					

						enregistrer_commentaire_acb(commentaire, qcm, mission_id, 6);

					}

					else{

						$.ajax({

							type:'POST',

							url:'cycleAchat/cycle_achat_b/php/updateGetQuest.php',

							data:{commentaire:commentaire, qcm:qcm, question_id:6, mission_id:mission_id, cycleId:2},

							success:function(e1){

								eo=""+e1+"";

								doc=eo.split(',');

								afficheReponseQuest("acb_7","acb7");

								$.ajax({

									type:'POST',

									url:'cycleAchat/cycle_achat_b/load/load_rep_acb.php',

									data:{mission_id:mission_id},

									success:function(e){	

										$('#Interface_Question_acb').hide();

										$('#frm_tab_res_b').html(e).show();

										$('#dv_table_acb').show();

									}

								});	

							}

						});

					}

				}

			});



			$('#Question_acb_6').fadeOut(500);

			$('#Question_acb_7').fadeIn(500);

			$('#lb_veuillez_aff_acb').hide();

		}



	});

	$('#int_acb_Question_Precedent_6').click(function(){

		$('#Question_acb_6').fadeOut(500);

		$('#Question_acb_5').fadeIn(500);

	});

	//Fermeture du question num 11

	$('#fermer_Question_acb_6').click(function(){

		$('#message_fermeture_question_acb6').show();

		$('#Question_acb_6').hide();

	});

});

</script>

<div id="int_Question_acb_6">

	<table width="500">

		<tr>

			<td class="label_Question" align="center">3.Toutes les marchandises retournées et les réclamations effectuées sont-elles enregistrées sur des documents :<br />

b)	prénumérotés ?



</td>

		</tr>

		<tr>

			<td class="label_Oui_Non" align="center">

			Oui<input type="radio" id="rad_Question_Oui_acb_6" name="rad_Question_acb6" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;

			N/A<input type="radio" id="rad_Question_NA_acb_6" name="rad_Question_acb6" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;

			Non <input type="radio" id="rad_Question_Non_acb_6" name="rad_Question_acb6" <?php if($qcm=="NON") echo 'checked'; ?> />

			</td>

		</tr>

		<tr>

			<td class="label_Question" align="center">Commentaires</td>

		</tr>

		<tr>

			<td align="center"><textarea id="commentaire_Question_acb6" rows="15" cols="50"><?php echo $commentaire; ?></textarea>

			</td>

		</tr>

		<tr>

			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_acb_Question_Precedent_6"/>&nbsp;&nbsp;&nbsp;

				<input type="button" value="Suivant" class="bouton" id="Question_acb_6_Bouton" />

			</td>

		</tr>

	</table>

</div>

<div id="fermeture_Icone_Question_acb"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_acb_6" /></div>