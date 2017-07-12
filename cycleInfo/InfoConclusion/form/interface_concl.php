<?php
@session_start();
include '../../../connexion.php';
$mission_id=$_SESSION['idMission'];
//PARTIE I
// ---------- verification si un conclusion est effectuer --------// ANDO
$verif=$bdd->query('SELECT count(CONCLUSION_ID) as nb FROM tab_conclusion WHERE (CYCLE_ACHAT_ID=100000000 OR CYCLE_ACHAT_ID = 32 OR CYCLE_ACHAT_ID=33 OR CYCLE_ACHAT_ID=33 OR CYCLE_ACHAT_ID=34) AND MISSION_ID='.$mission_id);
$resultat=$verif->fetch();
$nombre_resultat= $resultat['nb'];

if ($nombre_resultat > 0) {

// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse1=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=100000000 AND MISSION_ID='.$mission_id);
	$donnees1=$reponse1->fetch();
	$commentaire1=utf8_encode($donnees1['CONCLUSION_COMMENTAIRE']);
	$risque1=utf8_encode($donnees1['CONCLUSION_RISQUE']);

// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse2=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=32 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire2=utf8_encode($donnees2['CONCLUSION_COMMENTAIRE']);
	$risque2=utf8_encode($donnees2['CONCLUSION_RISQUE']);
	// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse3=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=33 AND MISSION_ID='.$mission_id);
	$donnees3=$reponse3->fetch();
	$commentaire3=utf8_encode($donnees3['CONCLUSION_COMMENTAIRE']);
	$risque3=utf8_encode($donnees3['CONCLUSION_RISQUE']);

// ---------------- on recupere la conclusion et le niveau de risque du superviseur si existe ---- //
	$reponse4=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=34 AND MISSION_ID='.$mission_id);
	$donnees4=$reponse4->fetch();
	$commentaire4=utf8_encode($donnees4['CONCLUSION_COMMENTAIRE']);
	$risque4=utf8_encode($donnees4['CONCLUSION_RISQUE']);

}
else{
	

	$reponse1 = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=100000000 AND MISSION_ID='.$mission_id);

	$donnees1=$reponse1->fetch();
	$commentaire1=utf8_encode($donnees1['SYNTHESE_COMMENTAIRE']);
	$risque1=utf8_encode($donnees1['SYNTHESE_RISQUE']);

	// PARTIE II
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
		
	$reponse2 = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=32 AND MISSION_ID='.$mission_id);
	$donnees2=$reponse2->fetch();
	$commentaire2=utf8_encode($donnees2['SYNTHESE_COMMENTAIRE']);
	$risque2=utf8_encode($donnees2['SYNTHESE_RISQUE']);

	//PARTIE III
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
		$reponse3=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=33 AND MISSION_ID='.$mission_id);
		$donnees3=$reponse3->fetch();
		$commentaire3=utf8_encode($donnees3['SYNTHESE_COMMENTAIRE']);
		$risque3=utf8_encode($donnees3['SYNTHESE_RISQUE']);

	//PARTIE IV
	// -------------	on recupere la synthes et le niveau de risque de l'auditeur si non------------//
		$reponse4=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=34 AND MISSION_ID='.$mission_id);
		$donnees4=$reponse4->fetch();
		$commentaire4=utf8_encode($donnees4['SYNTHESE_COMMENTAIRE']);
		$risque4=utf8_encode($donnees4['SYNTHESE_RISQUE']);

}
?>



<script>
$(function()
{



	//DEBUT CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE
	var NBR_SYNTHESE="";
	//var Questionnaire=0;

	//test questionnaire
	/*$.get("",function(res)
	{
		Questionnaire=res;
	});*/

	$.post("cycleInfo/getSynthese_abcd.php",function (res)
	{
		NBR_SYNTHESE=res;

	});
	//test SYTHESE
	//FIN CODE DE TEST LES QUESTIONNAIRE SONT DEJA REMPLIS OU NON + SYNTESE


	// $('#message_Synthese_concl').draggable();

	//REMPLIR LA BASE

	$('#Int_concl_Retour').click(function(){
		$('#message_Fermeture_concl').show();	
		closedButconcl();
	});
	
	//SUIVANT
	$('#Int_concl_Suivant').click(function()
	{

		/*if(Questionnaire==0)
		{
			alert ("Vous devez cocher les cases vides..");
			return false;
		}else*/

		if(NBR_SYNTHESE<4)
		{
			alert ("veuillez remplir la synthese..");
			return false;
		}

		var commentaire1=$('#Synthese_ia_Superviseur1').val();	
		var commentaire2=$('#Synthese_ia_Superviseur2').val();				
		var commentaire3=$('#Synthese_ia_Superviseur3').val();				
		var commentaire4=$('#Synthese_ia_Superviseur4').val();				
			
		var risque1=$('input[type=radio][name=risque1]:checked').val();
		var risque2=$('input[type=radio][name=risque2]:checked').val();
		var risque3=$('input[type=radio][name=risque3]:checked').val();
		var risque4=$('input[type=radio][name=risque4]:checked').val();

		mission_id=document.getElementById("txt_mission_id").value;	
		//alert(mission_id);		
				$.ajax({
				type:'POST',
					url:'cycleInfo/InfoConclusion/php/enregistrer_synthese_concl.php',
					data:{risque1:risque1,risque2:risque2,risque3:risque3,risque4:risque4,commentaire1:commentaire1,
						commentaire2:commentaire2,commentaire3:commentaire3,commentaire4:commentaire4},
					success:function(e)
					{
						alert("cycle information bien enregistré");
						$("#contRsciInfo").load("cycleInfo/Info.php",function (res)
						{



							$('#contRsciInfo').show();
							$('#contSupConcl').hide();
							$('#message_fermeture_concl_sup').hide();
						});



					}										
										
				});

	});
	//SUIVANT

});
function getSynthese(mission_id, cycleId){
	$.ajax({
		type:'POST',
		url:'cycleInfo/InfoConclusion/php/getSynth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			eo=""+e+"";
			doc=eo.split('*');
			document.getElementById("txt_Synthese_concl").value=doc[0];
			document.getElementById("rd_Synthese_concl_Faible").checked=false;
			document.getElementById("rd_Synthese_concl_Moyen").checked=false;
			document.getElementById("rd_Synthese_concl_Eleve").checked=false;
			
			if(doc[1]=="faible"){
				document.getElementById("rd_Synthese_concl_Faible").checked=true;
			}
			else if(doc[1]=="moyen"){
				document.getElementById("rd_Synthese_concl_Moyen").checked=true;
			}
			else if(doc[1]=="eleve"){
				document.getElementById("rd_Synthese_concl_Eleve").checked=true;
			}
		}
	});
}
function closedButconcl(){
	document.getElementById("Int_concl_Retour").disabled=true;
	document.getElementById("Int_concl_Suivant").disabled=true;
}
function openButconcl(){
	document.getElementById("Int_concl_Retour").disabled=false;
	document.getElementById("Int_concl_Suivant").disabled=false;
}
function select_risque(question_id, id_risque){
		risque=document.getElementById(id_risque).value;
		$.ajax({
			type:'POST',
			url:'cycleInfo/InfoConclusion/php/detect_risque_id_existant_concl.php',
			data:{question_id:question_id},
			success:function(e){
				if(e==0){
					$.ajax({
						type:'POST',
						url:'cycleInfo/InfoConclusion/php/enregistrer_risque_concl.php',
						data:{risque:risque, question_id:question_id},
						success:function(){
						}
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleInfo/InfoConclusion/php/update_risque_concl.php',
						data:{question_id:question_id, risque:risque},
						success:function(){
						}
					});
				}
			}
		
		});
}
function select_reponse(question_id, id_reponse){
		reponse=document.getElementById(id_reponse).value;
		$.ajax({
			type:'POST',
			url:'cycleInfo/InfoConclusion/php/detect_risque_id_existant_concl.php',
			data:{question_id:question_id},
			success:function(e){
				if(e==0){
					$.ajax({
						type:'POST',
						url:'cycleInfo/InfoConclusion/php/enregistrer_reponse_concl.php',
						data:{reponse:reponse, question_id:question_id},
						success:function(){
						}
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleInfo/InfoConclusion/php/update_reponse_concl.php',
						data:{question_id:question_id, reponse:reponse},
						success:function(){
						}
					});
				}
			}
		
		});
}
function ecrire_risque(question_id, id_risque){
		$.ajax({
			type:'POST',
			url:'cycleInfo/InfoConclusion/php/detect_risque_id_existant_concl.php',
			data:{question_id:question_id},
			success:function(e){
				if(e==0){

				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleInfo/InfoConclusion/php/update_risque_concl.php',
						data:{question_id:question_id, risque:"faible"},
						success:function(){
						}
					});
				}
			}
		
		});
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<div id="int_concl">

<div id="fond_Superviseur_Affiche">
<table width="100%">
	<tr align="center">
		<td>
<div id="interface_ia_Superviseur_Droite">
	<table>
				<tr>
					<td class="sous_Titre" height="30" bgcolor="#ccc" width="410" align="center">COMMENTAIRE TRAITEMENTS AUTOMATISES DES CYCLES</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="100">
									<textarea id="Synthese_ia_Superviseur1" cols="34" rows="15" <?php if($nombre_resultat>0){echo "disabled";}?> ><?php echo $commentaire1;?></textarea>
								</td>
								<td>
									<table height="180">
									
										<tr>
											<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
												<span>
													<?php if($nombre_resultat>0){ ?>
														<input type="radio" class="risque" value="faible" id="Synthese_ia_Superviseur_Faible" name="risque1" <?php if($risque1=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
														<input type="radio" class="risque" value="moyen" id="Synthese_ia_Superviseur_Moyen" name="risque1" <?php if($risque1=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
														<input type="radio" class="risque" value="eleve" id="Synthese_ia_Superviseur_Eleve" name="risque1" <?php if($risque1=="eleve") {echo 'checked=checked';}?>disabled/>Elevé
													<?php } else{?>
														<input type="radio" class="risque" value="faible" id="Synthese_ia_Superviseur_Faible" name="risque1" <?php if($risque1=="faible") {echo 'checked=checked';}?>/>Faible<br />
														<input type="radio" class="risque" value="moyen" id="Synthese_ia_Superviseur_Moyen" name="risque1" <?php if($risque1=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
														<input type="radio" class="risque" value="eleve" id="Synthese_ia_Superviseur_Eleve" name="risque1" <?php if($risque1=="eleve") {echo 'checked=checked';}?>/>Elevé
													<?php } ?>
												
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
<div id="interface_ia_Superviseur_Droite" align="center">
	<table>
				<tr >
					<td class="sous_Titre" height="30" bgcolor="#ccc" width="410" align="center">COMMENTAIRE FONCTION INFORMATIQUE</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="100">
									<textarea id="Synthese_ia_Superviseur2" cols="34" rows="15"<?php if($nombre_resultat>0){echo "disabled";}?>  ><?php echo $commentaire2;?></textarea>
								</td>
								<td>
									<table height="180">
											<tr>
													<?php  
														$rep1 = $bdd->query('SELECT SCORE FROM tab_synthese WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID=32');
														$score=$rep1->fetch();
													?>
													<td class="sous_Titre" align="center">Score : <?php echo $score['SCORE']; ?></td>
											</tr>
										<tr>
											<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
												<span>
													<?php if($nombre_resultat>0){ ?>
														<input type="radio" class="risque" value="faible" id="Synthese_ia_Superviseur_Faible" name="risque2" <?php if($risque2=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
														<input type="radio" class="risque" value="moyen" id="Synthese_ia_Superviseur_Moyen" name="risque2" <?php if($risque2=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
														<input type="radio" class="risque" value="eleve" id="Synthese_ia_Superviseur_Eleve" name="risque2" <?php if($risque2=="eleve") {echo 'checked=checked';}?>disabled/>Elevé
													<?php } else{?>
														<input type="radio" class="risque" value="faible" id="Synthese_ia_Superviseur_Faible" name="risque2" <?php if($risque2=="faible") {echo 'checked=checked';}?>/>Faible<br />
														<input type="radio" class="risque" value="moyen" id="Synthese_ia_Superviseur_Moyen" name="risque2" <?php if($risque2=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
														<input type="radio" class="risque" value="eleve" id="Synthese_ia_Superviseur_Eleve" name="risque2" <?php if($risque2=="eleve") {echo 'checked=checked';}?>/>Elevé
													<?php } ?>
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
<div id="interface_ia_Superviseur_Droite" align="center">
	<table>
				<tr align="center">
					<td class="sous_Titre" height="30" bgcolor="#ccc" width="410" align="center">COMMENTAIRE MATERIEL</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="100">
									<textarea id="Synthese_ia_Superviseur3" cols="34" rows="15"<?php if($nombre_resultat>0){echo "disabled";}?>  ><?php echo $commentaire3;?></textarea>
								</td>
								<td>
									<table height="180">
									<tr>
													<?php  
														$rep1 = $bdd->query('SELECT SCORE FROM tab_synthese WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID=33');
														$score=$rep1->fetch();
													?>
													<td class="sous_Titre" align="center">Score : <?php echo $score['SCORE']; ?></td>
										</tr>
										<tr>
											<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
												<span>
													<?php if($nombre_resultat>0){ ?>
														<input type="radio" class="risque" value="faible" id="Synthese_ia_Superviseur_Faible" name="risque3" <?php if($risque3=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
														<input type="radio" class="risque" value="moyen" id="Synthese_ia_Superviseur_Moyen" name="risque3" <?php if($risque3=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
														<input type="radio" class="risque" value="eleve" id="Synthese_ia_Superviseur_Eleve" name="risque3" <?php if($risque3=="eleve") {echo 'checked=checked';}?>disabled/>Elevé
													<?php } else{?>
														<input type="radio" class="risque" value="faible" id="Synthese_ia_Superviseur_Faible" name="risque3" <?php if($risque3=="faible") {echo 'checked=checked';}?>/>Faible<br />
														<input type="radio" class="risque" value="moyen" id="Synthese_ia_Superviseur_Moyen" name="risque3" <?php if($risque3=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
														<input type="radio" class="risque" value="eleve" id="Synthese_ia_Superviseur_Eleve" name="risque3" <?php if($risque3=="eleve") {echo 'checked=checked';}?>/>Elevé
													<?php } ?>
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
<div id="interface_ia_Superviseur_Droite" align="center">
	<table>
				<tr align="center">
					<td class="sous_Titre" height="30" bgcolor="#ccc" width="410" align="center">COMMENTAIRE LOGICIEL</td>
				</tr>
				<tr>
					<td align="center">
						<table>
							<tr>
								<td width="100">
									<textarea id="Synthese_ia_Superviseur4"cols="34" rows="15" <?php if($nombre_resultat>0){echo "disabled";}?> ><?php echo $commentaire4;?></textarea>
								</td>
								<td>
									<table height="180">
										<tr>
													<?php  
														$rep1 = $bdd->query('SELECT SCORE FROM tab_synthese WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID=34');
														$score=$rep1->fetch();
													?>
													<td class="sous_Titre" align="center">Score : <?php echo $score['SCORE']; ?>/23</td>
										</tr>
										<tr>
											<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
												<span>
													<?php if($nombre_resultat>0){ ?>
														<input type="radio" class="risque" value="faible" id="Synthese_ia_Superviseur_Faible" name="risque4" <?php if($risque4=="faible") {echo 'checked=checked';}?> disabled/>Faible<br />
														<input type="radio" class="risque" value="moyen" id="Synthese_ia_Superviseur_Moyen" name="risque4" <?php if($risque4=="moyen") {echo 'checked=checked';} ?>disabled/>Moyen<br />
														<input type="radio" class="risque" value="eleve" id="Synthese_ia_Superviseur_Eleve" name="risque4" <?php if($risque4=="eleve") {echo 'checked=checked';}?>disabled/>Elevé
													<?php } else{?>
														<input type="radio" class="risque" value="faible" id="Synthese_ia_Superviseur_Faible" name="risque4" <?php if($risque4=="faible") {echo 'checked=checked';}?>/>Faible<br />
														<input type="radio" class="risque" value="moyen" id="Synthese_ia_Superviseur_Moyen" name="risque4" <?php if($risque4=="moyen") {echo 'checked=checked';}?>/>Moyen<br />
														<input type="radio" class="risque" value="eleve" id="Synthese_ia_Superviseur_Eleve" name="risque4" <?php if($risque4=="eleve") {echo 'checked=checked';}?>/>Elevé
													<?php } ?>
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
			<input type="button" class="bouton" value="Retour" id="Int_concl_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Valider" id="Int_concl_Suivant"<?php if($nombre_resultat>1){echo "disabled=disabled";}?>  />
		</td>
		</tr>
	</table>
</div>

	</tr>

</div>
</div>
<div id="fancybox_concl"></div>
<div id="message_Synthese_concl" data-options="handle:'#dicgg'" align="center">
	<div id="dicgg" class="td_Titre_Question">
		<br />CONCLUSION
	</div>
	<?php include '../../../cycleInfo/InfoConclusion/form/Interface_concl_Synthese.php';?>
</div>
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
