<?php
@session_start();
include '../../../connexion.php';

//PARTIE I
$reponse1 = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID=100000000');
$donnees1=$reponse1->fetch();

$commentaire1=$donnees1['SYNTHESE_COMMENTAIRE'];
$risque1=$donnees1['SYNTHESE_RISQUE'];

//PARTIE II
$reponse2 = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID=32');
$donnees2=$reponse2->fetch();

$commentaire2=$donnees2['SYNTHESE_COMMENTAIRE'];
$risque2=$donnees2['SYNTHESE_RISQUE'];

//PARTIE III
$reponse3 = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID=33');
$donnees3=$reponse3->fetch();

$commentaire3=$donnees3['SYNTHESE_COMMENTAIRE'];
$risque3=$donnees3['SYNTHESE_RISQUE'];

//PARTIE IV
$reponse4 = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID=34');
$donnees4=$reponse4->fetch();

$commentaire4=$donnees4['SYNTHESE_COMMENTAIRE'];
$risque4=$donnees4['SYNTHESE_RISQUE'];
?>

<!--script type="text/javascript" src="cycleAchat/Plugins/jquery.easyui.min.js"></script-->

<script>
 $(document).ready(function(){


 }
	//$('#message_Synthese_concl').draggable();

	$('#Int_concl_Retour').click(function(){
		$('#int_concl').hide();
		$('#message_Fermeture_concl').show();
		closedButconcl();
	});
	
	//SUIVANT
	// $('#Int_concl_Suivant').click(function(){
	// 	else{
	// 	save_prise_contact();
	// 	mission_id=document.getElementById("txt_mission_id").value;	
	// 	//alert(mission_id);		
	// 			$.ajax({
	// 			type:'POST',
	// 				url:'cycleInfo/InfoConclusion/php/getSynth.php',
	// 				data:{mission_id:mission_id, cycleId:34},
	// 				success:function(e){
	// 						eo=""+e+"";
	// 						doc=eo.split('*');
	// 						document.getElementById("txt_Synthese_concl").value=doc[0];
	// 						document.getElementById("rd_Synthese_concl_Moyen").checked=false;
	// 						document.getElementById("rd_Synthese_concl_faible").checked=false;
	// 						document.getElementById("rd_Synthese_concl_Eleve").checked=false;
	// 							if(doc[1]=='faible'){
	// 								document.getElementById("rd_Synthese_concl_faible").checked=true;
	// 							}
	// 							else if(doc[1]=='moyen'){
	// 								document.getElementById("rd_Synthese_concl_Moyen").checked=true;
	// 							}
	// 							else if(doc[1]=='eleve'){
	// 								document.getElementById("rd_Synthese_concl_Eleve").checked=true;
	// 							}
	// 					$('#message_Synthese_concl').show();
	// 					$('#message_concl_Synthese_Terminer').hide();
	// 					$('#message_Slide').hide();
	// 					$('#fancybox_concl').show();
	// 				}										
										
	// 			});
	// 		}
	// });
	// //SUIVANT

// });
// function getSynthese(mission_id, cycleId){
// 	$.ajax({
// 		type:'POST',
// 		url:'cycleInfo/InfoConclusion/php/getSynth.php',
// 		data:{mission_id:mission_id, cycleId:cycleId},
// 		success:function(e){
// 			eo=""+e+"";
// 			doc=eo.split('*');
// 			document.getElementById("txt_Synthese_concl").value=doc[0];
// 			document.getElementById("rd_Synthese_concl_faible").checked=false;
// 			document.getElementById("rd_Synthese_concl_Moyen").checked=false;
// 			document.getElementById("rd_Synthese_concl_Eleve").checked=false;
			
// 			if(doc[1]=="faible"){
// 				document.getElementById("rd_Synthese_concl_faible").checked=true;
// 			}
// 			else if(doc[1]=="moyen"){
// 				document.getElementById("rd_Synthese_concl_Moyen").checked=true;
// 			}
// 			else if(doc[1]=="eleve"){
// 				document.getElementById("rd_Synthese_concl_Eleve").checked=true;
// 			}
// 		}
// 	});
// }
// function save_prise_contact(){
// 		$.ajax({
// 			type:'POST',
// 			url:'cycleInfo/InfoConclusion/php/detectContactExistant.php',
// 			data:{mission_id:mission_id},
// 			success:function(e){
// 				if(e==0){
// 					$.ajax({
// 						type:'POST',
// 						url:'cycleInfo/InfoConclusion/php/enregContact.php',
// 						data:{val1:document.getElementById('effectif').value,val2:document.getElementById('formation').value,val3:document.getElementById('cout').value},
// 						success:function(){
// 						}
// 					});
// 				}
// 				else{
// 					$.ajax({
// 						type:'POST',
// 						url:'cycleInfo/InfoConclusion/php/updateContact.php',
// 						data:{val1:document.getElementById('effectif').value,val2:document.getElementById('formation').value,val3:document.getElementById('cout').value},
// 						success:function(){
// 						}
// 					});
// 				}
// 			}
		
// 		});
// }
function closedButconcl(){
	document.getElementById("Int_concl_Retour").disabled=true;
	document.getElementById("Int_concl_Suivant").disabled=true;
}
function openButconcl(){
	document.getElementById("Int_concl_Retour").disabled=false;
	document.getElementById("Int_concl_Suivant").disabled=false;
}
// function select_risque(question_id, id_risque){
// 		risque=document.getElementById(id_risque).value;
// 		$.ajax({
// 			type:'POST',
// 			url:'cycleInfo/InfoConclusion/php/detect_risque_id_existant_concl.php',
// 			data:{question_id:question_id},
// 			success:function(e){
// 				if(e==0){
// 					$.ajax({
// 						type:'POST',
// 						url:'cycleInfo/InfoConclusion/php/enregistrer_risque_concl.php',
// 						data:{risque:risque, question_id:question_id},
// 						success:function(){
// 						}
// 					});
// 				}
// 				else{
// 					$.ajax({
// 						type:'POST',
// 						url:'cycleInfo/InfoConclusion/php/update_risque_concl.php',
// 						data:{question_id:question_id, risque:risque},
// 						success:function(){
// 						}
// 					});
// 				}
// 			}
		
// 		});
// }
// function select_reponse(question_id, id_reponse){
// 		reponse=document.getElementById(id_reponse).value;
// 		$.ajax({
// 			type:'POST',
// 			url:'cycleInfo/InfoConclusion/php/detect_risque_id_existant_concl.php',
// 			data:{question_id:question_id},
// 			success:function(e){
// 				if(e==0){
// 					$.ajax({
// 						type:'POST',
// 						url:'cycleInfo/InfoConclusion/php/enregistrer_reponse_concl.php',
// 						data:{reponse:reponse, question_id:question_id},
// 						success:function(){
// 						}
// 					});
// 				}
// 				else{
// 					$.ajax({
// 						type:'POST',
// 						url:'cycleInfo/InfoConclusion/php/update_reponse_concl.php',
// 						data:{question_id:question_id, reponse:reponse},
// 						success:function(){
// 						}
// 					});
// 				}
// 			}
		
// 		});
// }
// function ecrire_risque(question_id, id_risque){
// 		$.ajax({
// 			type:'POST',
// 			url:'cycleInfo/InfoConclusion/php/detect_risque_id_existant_concl.php',
// 			data:{question_id:question_id},
// 			success:function(e){
// 				if(e==0){

// 				}
// 				else{
// 					$.ajax({
// 						type:'POST',
// 						url:'cycleInfo/InfoConclusion/php/update_risque_concl.php',
// 						data:{question_id:question_id, risque:"faible"},
// 						success:function(){
// 						}
// 					});
// 				}
// 			}
		
// 		});
// }
// function ecrire_reponse(question_id, id_reponse){
// 		$.ajax({
// 			type:'POST',
// 			url:'cycleInfo/InfoConclusion/php/detect_risque_id_existant_concl.php',
// 			data:{question_id:question_id},
// 			success:function(e){
// 				if(e==0){
// 					$.ajax({
// 						type:'POST',
// 						url:'cycleInfo/InfoConclusion/php/enregistrer_reponse_concl.php',
// 						data:{reponse:"OUI", question_id:question_id},
// 						success:function(){
// 						}
// 					});
// 				}
// 			}
		
// 		});
// }
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<input type="text" value="<?php echo $_SESSION['idMission'];?>" id="tx_miss_da" style="display:none;"/>
<div id="int_concl">

<div id="fond_Superviseur_Affiche">
<table width="100%">
	<tr align="center">
		<td>
<div id="interface_ia_Superviseur_Droite">
	<table>
				<tr>
					<td class="sous_Titre" height="30" bgcolor="#ccc" width="410" align="center">SYNTHESE DES TRAITEMENTS AUTOMATISES DES CYCLES</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="100">
									<textarea id="Synthese_ia_Superviseur" cols="34" rows="15" readonly ><?php echo $commentaire1;?></textarea>
								</td>
								<td>
									<table height="180">
										<tr>
											<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
												<span>
													<input type="radio" id="Synthese_ia_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque1=="faible") echo 'checked'; ?> disabled />Faible<br />
													<input type="radio" id="Synthese_ia_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque1=="moyen") echo 'checked'; ?> disabled />Moyen<br />
													<input type="radio" id="Synthese_ia_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque1=="eleve") echo 'checked'; ?> disabled />Elevé
												</span>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div><br />		</td>

		<td>
<div id="interface_ia_Superviseur_Droite">
	<table>
				<tr align="center">
					<td class="sous_Titre" height="30" bgcolor="#ccc" width="410" align="center">SYNTHESE DE LA FONCTION INFORMATIQUE</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="100">
									<textarea id="Synthese_ia_Superviseur" cols="34" rows="15" readonly ><?php echo $commentaire2;?></textarea>
								</td>
								<td>
									<table height="180">
										<tr>
											<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
												<span>
													<input type="radio" id="Synthese_ia_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque2=="faible") echo 'checked'; ?> disabled />Faible<br />
													<input type="radio" id="Synthese_ia_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque2=="moyen") echo 'checked'; ?> disabled />Moyen<br />
													<input type="radio" id="Synthese_ia_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque2=="eleve") echo 'checked'; ?> disabled />Elevé
												</span>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div><br />		</td>
	</tr>
	<tr>
				<td>
<div id="interface_ia_Superviseur_Droite">
	<table>
				<tr align="center">
					<td class="sous_Titre" height="30" bgcolor="#ccc" width="410" align="center">SYNTHESE DU MATERIEL</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="100">
									<textarea id="Synthese_ia_Superviseur" cols="34" rows="15" readonly ><?php echo $commentaire3;?></textarea>
								</td>
								<td>
									<table height="180">
										<tr>
											<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
												<span>
													<input type="radio" id="Synthese_ia_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque3=="faible") echo 'checked'; ?> disabled />Faible<br />
													<input type="radio" id="Synthese_ia_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque3=="moyen") echo 'checked'; ?> disabled />Moyen<br />
													<input type="radio" id="Synthese_ia_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque3=="eleve") echo 'checked'; ?> disabled />Elevé
												</span>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div><br />		</td>

		<td>
<div id="interface_ia_Superviseur_Droite">
	<table>
				<tr align="center">
					<td class="sous_Titre" height="30" bgcolor="#ccc" width="410" align="center">SYNTHESE DU LOGICIEL</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="100">
									<textarea id="Synthese_ia_Superviseur" cols="34" rows="15" readonly ><?php echo $commentaire4;?></textarea>
								</td>
								<td>
									<table height="180">
										<tr>
											<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
												<span>
													<input type="radio" id="Synthese_ia_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque4=="faible") echo 'checked'; ?> disabled />Faible<br />
													<input type="radio" id="Synthese_ia_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque4=="moyen") echo 'checked'; ?> disabled />Moyen<br />
													<input type="radio" id="Synthese_ia_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque4=="eleve") echo 'checked'; ?> disabled />Elevé
												</span>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div><br />		</td>
	</tr>

</table>
<table>
		<tr>
			<td class="sous_Titre" height="30" align="center"></td>
					<td>
			<input type="button" class="bouton" value="Retour"id="Int_concl_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Suivant" id="Int_concl_Suivant" />
		</td>
		</tr>
	</table>
</div>

	</tr>


</div>
</div>
<div id="fancybox_concl"></div>
<div id="message_Synthese_concl" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleInfo/InfoConclusion/form/Interface_concl_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_concl_Synthese_Terminer" align="center"><?php include '../../../cycleInfo/InfoConclusion/sms/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cycleInfo/InfoConclusion/sms/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cycleInfo/InfoConclusion/sms/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_concl"><?php include '../../../cycleInfo/InfoConclusion/sms/Message retour concl.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_concl"><?php include '../../../cycleInfo/InfoConclusion/sms/Mess_vide_synth_concl.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_concl"><?php include '../../../cycleInfo/InfoConclusion/sms/mess_vide_concl.php'; ?></div>
