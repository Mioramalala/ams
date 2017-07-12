<?php

include '../../../connexion.php';

$reponse=$bdd->query('SELECT CONCLUSION_ID FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=1');

$donnees=$reponse->fetch();

$conclusionId=$donnees['CONCLUSION_ID'];

?>

<script type="text/javascript" src="cycleAchat/plugins/jquery.easyui.min.js"></script>

<script>
$(function(){
	$(document).ready(function() {
		$('#message_Synthese_aca').draggable();
		// $('#interface_aca_Conclusion_Superviseur').draggable();
		// $('a[rel*=facebox]').facebox();
	});
	
	$('#Int_aca_Retour').click(function(){
		$('#message_Fermeture_aca').show();	
		closedButaca();
	});

	$('#ajoutPersonnel').click(function(){

			var ligne = document.getElementById('nbrTot');
			
			var tableau = document.getElementById('tab_check');
			
			var tr1 = document.createElement("tr");
			var tr2 = document.createElement("tr");
			var tr3 = document.createElement("tr");
			var tr4 = document.createElement("tr");
			var tr5 = document.createElement("tr");
			var tr6 = document.createElement("tr");
			var tr7 = document.createElement("tr");
			var tr8 = document.createElement("tr");
			var tr9 = document.createElement("tr");
			var tr10 = document.createElement("tr");
			var tr11 = document.createElement("tr");
			var tr12 = document.createElement("tr");
			var tr13 = document.createElement("tr");
			var tr14 = document.createElement("tr");
			var tr15 = document.createElement("tr");
			var tr16 = document.createElement("tr");
			var tr17 = document.createElement("tr");
			var tr18 = document.createElement("tr");
			var tr19 = document.createElement("tr");
			var tr20 = document.createElement("tr");
			var tr21 = document.createElement("tr");
			var tr22 = document.createElement("tr");
			
			var td1 = document.createElement("td");
			
			var text1 = document.createElement("<input type='checkbox' id='chek1'/>");
			var text2 = document.createElement("<input type='checkbox' id='chek2'/>");
			var text3 = document.createElement("<input type='checkbox' id='chek3'/>");
			var text4 = document.createElement("<input type='checkbox' id='chek4'/>");
			var text5 = document.createElement("<input type='checkbox' id='chek5'/>");
			var text6 = document.createElement("<input type='checkbox' id='chek6'/>");
			var text7 = document.createElement("<input type='checkbox' id='chek7'/>");
			var text8 = document.createElement("<input type='checkbox' id='chek8'/>");
			var text9 = document.createElement("<input type='checkbox' id='chek9'/>");
			var text10 = document.createElement("<input type='checkbox' id='chek10'/>");
			var text11 = document.createElement("<input type='checkbox' id='chek11'/>");
			var text12 = document.createElement("<input type='checkbox' id='chek12'/>");
			var text13 = document.createElement("<input type='checkbox' id='chek13'/>");
			var text14 = document.createElement("<input type='checkbox' id='chek14'/>");
			var text15 = document.createElement("<input type='checkbox' id='chek15'/>");
			var text16 = document.createElement("<input type='checkbox' id='chek16'/>");
			var text17 = document.createElement("<input type='checkbox' id='chek17'/>");
			var text18 = document.createElement("<input type='checkbox' id='chek18'/>");
			var text19 = document.createElement("<input type='checkbox' id='chek19'/>");
			var text20 = document.createElement("<input type='checkbox' id='chek20'/>");
			var text21 = document.createElement("<input type='checkbox' id='chek21'/>");
			var text22 = document.createElement("<input type='checkbox' id='chek22'/>");
			
			tr.style.backgroundColor = "white";

			// text1.cols = "48";
			// text2.cols = "48";

			text1.id = "chek1"+ligne;
			text2.id = "chek2"+ligne;
			text3.id = "chek3"+ligne;
			text4.id = "chek4"+ligne;
			text5.id = "chek5"+ligne;
			text6.id = "chek6"+ligne;
			text7.id = "chek7"+ligne;
			text8.id = "chek8"+ligne;
			text9.id = "chek9"+ligne;
			text10.id = "chek10"+ligne;
			text11.id = "chek11"+ligne;
			text12.id = "chek12"+ligne;
			text13.id = "chek13"+ligne;
			text14.id = "chek14"+ligne;
			text15.id = "chek15"+ligne;
			text16.id = "chek16"+ligne;
			text17.id = "chek17"+ligne;
			text18.id = "chek18"+ligne;
			text19.id = "chek19"+ligne;
			text20.id = "chek20"+ligne;
			text21.id = "chek21"+ligne;
			text22.id = "chek22"+ligne;
			
			tr1.appendChild(text1);
			tr2.appendChild(text2);
			tr3.appendChild(text3);
			tr4.appendChild(text4);
			tr5.appendChild(text5);
			tr6.appendChild(text6);
			tr7.appendChild(text7);
			tr8.appendChild(text8);
			tr9.appendChild(text9);
			tr10.appendChild(text10);
			tr11.appendChild(text11);
			tr12.appendChild(text12);
			tr13.appendChild(text13);
			tr14.appendChild(text14);
			tr15.appendChild(text15);
			tr16.appendChild(text16);
			tr17.appendChild(text17);
			tr18.appendChild(text18);
			tr19.appendChild(text19);
			tr20.appendChild(text20);
			tr21.appendChild(text21);
			tr22.appendChild(text22);
			
			
			tableau.appendChild(td1);
			
			td1.appendChild(tr1);
			
			// tableau.appendChild(tr2);
			// tableau.appendChild(tr3);
			// tableau.appendChild(tr4);
			// tableau.appendChild(tr5);
			// tableau.appendChild(tr6);
			// tableau.appendChild(tr7);
			// tableau.appendChild(tr8);
			// tableau.appendChild(tr9);
			// tableau.appendChild(tr10);
			// tableau.appendChild(tr11);
			// tableau.appendChild(tr12);
			// tableau.appendChild(tr13);
			// tableau.appendChild(tr14);
			// tableau.appendChild(tr15);
			// tableau.appendChild(tr16);
			// tableau.appendChild(tr17);
			// tableau.appendChild(tr18);
			// tableau.appendChild(tr19);
			// tableau.appendChild(tr20);
			// tableau.appendChild(tr21);
			// tableau.appendChild(tr22);

			document.getElementById('nbrTot').value = ligne;
	});
	
	$('#Int_aca_Suivant').click(function(){
	mission_id=document.getElementById("txt_mission_id").value;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_a/php/det_res_aca.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==1){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_a/php/getEseIdMissId.php',
						data:{mission_id:mission_id},
						success:function(e){
							eseId=e;	
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achat_a/php/countColFunct.php',
								data:{entrepriseId:eseId},
								success:function(e1){
									if(e1==0){
										$('#fancybox_aca').show();
										$('#mess_no_question').show();
									}
									else{
										$.ajax({
											type:'POST',
											url:'cycleAchat/cycle_achat_a/php/getSynth.php',
											data:{mission_id:mission_id, cycleId:1},
											success:function(e){
												eo=""+e+"";
												doc=eo.split('*');
												document.getElementById("rd_Synthese_aca_Faible").checked=false;
												document.getElementById("rd_Synthese_aca_Moyen").checked=false;
												document.getElementById("rd_Synthese_aca_Eleve").checked=false;
												document.getElementById("txt_Synthese_aca").value=doc[0];
												if(doc[1]=='faible'){
													document.getElementById("rd_Synthese_aca_Faible").checked=true;
												}
												else if(doc[1]=='moyen'){
													document.getElementById("rd_Synthese_aca_Moyen").checked=true;
												}
												else if(doc[1]=='eleve'){
													document.getElementById("rd_Synthese_aca_Eleve").checked=true;
												}
												$('#message_Synthese_aca').show();
												$('#message_Synthese_Terminer').hide();
												$('#message_Slide').hide();
												$('#fancybox_aca').show();
											}										
										});
									}
								}
							});
						}
					});
				}	
				else{
					$('#fancybox_aca').show();
					$('#mess_no_question').show();
				}
			}
		});
	});
});
function getSynthese(mission_id, cycleId){
	$.ajax({
		type:'POST',
		url:'cycleAchat/cycle_achat_a/php/getSynth.php',
		data:{mission_id:mission_id, cycleId:cycleId},
		success:function(e){
			eo=""+e+"";
			doc=eo.split('*');
			document.getElementById("txt_Synthese_aca").value=doc[0];
			document.getElementById("rd_Synthese_aca_Faible").checked=false;
			document.getElementById("rd_Synthese_aca_Moyen").checked=false;
			document.getElementById("rd_Synthese_aca_Eleve").checked=false;
			
			if(doc[1]=="faible"){
				document.getElementById("rd_Synthese_aca_Faible").checked=true;
			}
			else if(doc[1]=="moyen"){
				document.getElementById("rd_Synthese_aca_Moyen").checked=true;
			}
			else if(doc[1]=="eleve"){
				document.getElementById("rd_Synthese_aca_Eleve").checked=true;
			}
		}
	});
}
function closedButaca(){
	document.getElementById("Int_aca_Retour").disabled=true;
	document.getElementById("Int_aca_Suivant").disabled=true;
}
function openButaca(){
	document.getElementById("Int_aca_Retour").disabled=false;
	document.getElementById("Int_aca_Suivant").disabled=false;
}
function choix_poste_cle(){
	var poste_cle=$("#id_choix_poste_cle option:selected").html();
	//alert(poste_cle);
	document.getElementById("id_choix_poste_cle").setAttribute("enable","enable");
	$("#choix_post_cle").val(poste_cle);
}
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


<div id="int_aca">
<table>
	<tr>
		<td width="380" class="sous_Titre" align="center">Fonctions</td>
		<td width="400" class="sous_Titre" align="center">Personnels concernées/Intervenants</td>
		<td width="400" class="sous_Titre" align="center"><input id="ajoutPersonnel" type="button" value="Ajouter personnels concernés"></td>
		<td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0">
			<select id = "id_choix_poste_cle" onchange="choix_poste_cle()">
				<?php
				$reponse1 = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle WHERE ENTREPRISE_ID='.$entrepiseId.'');
				while ($donnees1 = $reponse1->fetch())
				{
					$poste_cle_nom=$donnees1['POSTE_CLE_NOM'];
				?>
					<option value=""><?php echo $poste_cle_nom; ?></option>
				<?php
				}
				?>
			</select>	
		</td>

	</tr>
</table>

<table>
	<tr>
		<td width="380"></td>
		<td width="400" class="titre"><?php //include 'cycleAchat/cycle_achat_load/Load_A_Persll_adt.php'?>
		<td width="400" class="titre"></td>
		<td width="100" class="titre"></td>
		<table>
		<tr>
<?php

	$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="achat"');
	
	$nbrTot=0;

	while ($donnees = $reponse->fetch())
	{
	?>	
		<td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0"><?php echo $donnees['POSTE_CLE_NOM']; ?></td>
	<?php
		
		$i=0;
		?>
		<td id= "poste_cle" class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0" style="display:none;width:10px;">
		<input type ="text" value="" id="choix_post_cle">
		</td>
	</tr>
</table>
	<input type="text" id="nbrTot" value="<?php echo $nbrTot;?>" style="display:none;"/></td>
	</tr>
</table>
<div id="table_Interface_aca">
<table  id="tab_check" class="label">
	<tr bgcolor="#efefef">
		<td width="380">1 Demandeurs d'achats</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_1.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek1".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">2 Établissement des commandes</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_2.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek2".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr  bgcolor="#efefef">
		<td width="380">3 Autorisation des commandes</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_3.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek3".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">4 Réception</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_4.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek4".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">5 Comparaison commande-facture</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_5.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek5".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">6 Comparaison bon de réception-facture</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_6.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek6".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">7 Imputation comptable</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_7.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek7".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">8 Vérification de l'imputation comptable</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_8.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek8".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">9 Bon à payer</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_9.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek9".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">10 Tenue du journal des achats</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_10.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek10".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">11 Tenue des comptes fournisseurs</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_11.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek11".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">12 Rapprochement des relevés fournisseurs avec les comptes</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_12.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek12".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">13 Rapprochement de la balance fournisseurs avec le compte collectif</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_13.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek13".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">14 Centralisation des achats</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_14.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek14".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">15 Signature des chèques</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_15.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek15".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">16 Envoi des chèques</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_16.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek16".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">17 Acceptation des traites</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_17.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek17".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">18 Tenue du journal des effets à payer</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_18.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek18".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">19 Tenue du journal de trésorerie</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_19.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek19".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">20 Annulation des pièces justificatives</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_20.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek20".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr bgcolor="#efefef">
		<td width="380">21 Accès à la comptabilité générale</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_21.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek21".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">22 Suivi des avoirs</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction_22.php'; ?></td>
		<!--td width="500"><?php //include '../../../cycleAchat/cycle_achat_a/load/Load_aca_Check_Fonction.php'; ?></td-->
		<td width="500"><input id="<?php echo "chek22".$nbrTot ?>" type="checkbox"/></td>
	</tr>
	<tr>
		<td width="380">Niveaux de risque</td>
		<td width="400"><?php include '../../../cycleAchat/cycle_achat_a/load/Load_Risque_aca.php'; ?></td>
		<td width="500">
			<select>
				<option value="faible" <?php //if($donnees1['NIVEAU_RISQUE_NOM']=="faible") echo 'selected'; ?> >Faible</option>
				<option value="moyen" <?php //if($donnees1['NIVEAU_RISQUE_NOM']=="moyen") echo 'selected'; ?> >Moyen</option>
				<option value="eleve" <?php //if($donnees1['NIVEAU_RISQUE_NOM']=="eleve") echo 'selected'; ?> >Elevé</option>
			</select>
		</td>
		<?php
			}
			$nbrTot++;
		?>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="button" class="bouton" value="Retour"id="Int_aca_Retour" />&nbsp;&nbsp;
			<input type="button" class="bouton" value="Suivant" id="Int_aca_Suivant" />
		</td>
	</tr>
</table>

</div>
</div>
<div id="fancybox_aca"></div>
<div id="message_Synthese_aca" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div>
<?php include '../../../cycleAchat/cycle_achat_a/form/Interface_aca_Synthese.php';?></div>
<!--*******************************************************************************************************-->
<!--****************************************Interface A Synthese A terminer********************************-->
<div id="message_Synthese_Terminer" align="center"><?php include '../../../cycleAchat/cycle_achat_a/sms/Message synthese termine.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Slide"><?php include '../../../cycleAchat/cycle_achat_a/sms/Message slide.php';?></div>
<!--*******************************************************************************************************-->
<!--********************************Interface d'affichage de confirmation de message***********************-->
<div id="message_Donnees_Perdu"><?php include '../../../cycleAchat/cycle_achat_a/sms/Message donnees perdu.php';?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de fermeture de la page***************************************-->
<div id="message_Fermeture_aca"><?php include '../../../cycleAchat/cycle_achat_a/sms/Message retour aca.php'?></div>
<!--*******************************************************************************************************-->
<!--*******************************Interface de message vide du synthese***********************************-->
<div id="mess_vide_synthese_aca"><?php include '../../../cycleAchat/cycle_achat_a/sms/Mess_vide_synth_aca.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***************************Formulaire de comptage de resultat de a*************************************-->
<div id="mess_vide_aca"><?php include '../../../cycleAchat/cycle_achat_a/sms/mess_vide_aca.php'; ?></div>
<div id="mess_no_question"><?php include '../../../cycleAchat/cycle_achat_a/sms/mess_no_question.php'; ?></div>