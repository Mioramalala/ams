<?php

include '../../../connexion.php';

$reponse = $bdd->query('SELECT SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=111');

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];
?>

<script>
$(function(){
	$('#interface_sta_Conclusion_Superviseur').draggable();
	
	$('#Int_sta_Retour_Superviseur').click(function(){
	
		$('#message_fermeture_sta_sup').show();
		
	});
	$('#conclusion_sta_Superviseur').click(function(){
		var commentaire=$('#Synthese_sta_Superviseur').val();
				$.ajax({
					type:'POST',
					url:'cycleStock/Stocka/php/enregistrer_synthese_sta.php',
					data:{mission_id:mission_id,commentaire:commentaire,cycleAchatId:111},
					success:function(e){
						//alert(e);
						alert("cycle stock a bien enregistré");
					}
				});
		
	});
});
function openButSupsta(){
	document.getElementById("Int_sta_Retour_Superviseur").disabled=false;
	document.getElementById("conclusion_sta_Superviseur").disabled=false;
}
function closedButSupsta(){
	document.getElementById("Int_sta_Retour_Superviseur").disabled=true;
	document.getElementById("conclusion_sta_Superviseur").disabled=true;
}

</script>
<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
<div id="int_sta_Superviseur">
<table>
	<tr>
		<td width="8" class="sous_Titre" align="center">Fonction</td>
		<td width="700" class="sous_Titre" align="center">Personnel concerné</td>
	</tr>
</table>
<table style="left:-180px;position:relative;">
<!--table style="left:-200px;position:relative;"-->
	<tr>
		<td width="250"></td>
		<td width="450">
			<table>
				<tr>
					<?php
						$reponse0=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);
						
						$donnees0=$reponse0->fetch();
						
						$entrepiseId=$donnees0['ENTREPRISE_ID'];

						$reponse = $bdd->query('SELECT POSTE_CLE_NOM FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND  tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="stock"');
						while ($donnees = $reponse->fetch())
						{
						?>	
							<td class="sous_Titre" width="100" align="center" bgcolor="#D0D0D0"><?php echo $donnees['POSTE_CLE_NOM']; ?></td>
					<?php
					}
					?>
				</tr>
			</table>
		</td>
	</tr>
</table>

<table>
<tr>
	<td>
		<div id="Int_sta_Sup_Overflow">
			<table class="label">
				<tr bgcolor="#ccc">
					<td width="250">1 Magasin</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta1.php'?>
					</td>
				</tr>
				<tr>
					<td width="250">2 Réception</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta2.php'?>
					</td>
				</tr>
				<tr  bgcolor="#ccc">
					<td width="250">3 Expédition</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta3.php'?></td>
				</tr>
				<tr>
					<td width="250">4 Tenue de fiches de stocks en quantités</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta4.php'?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">5 Tenue de l'inventaire permanent</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta5.php'?></td>
				</tr>
				<tr>
					<td width="250">6 Responsable de l'inventaire physique</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta6.php'?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">7 Rapprochement inventaire physique - inventaire permanent</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta7.php'?>
					</td>
				</tr>
				<tr>
					<td width="250">8 Approbation des ajustements après inventaire</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta8.php'?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">9 Rapport sur les stocks obsolètes, inutilisables, etc.</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta9.php'?></td>
				</tr>
				<tr>
					<td width="250">10 Autorisation de cession des stocks détériorés ou inutilisés</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta10.php'?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">11 Rapprochement comptabilité générale/ analytique</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta11.php'?></td>
				</tr>
				<tr>
					<td width="250">12 Définition des prix de revient</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta12.php'?></td>
				</tr>
				<tr bgcolor="#ccc">
					<td width="250">13 Comparaison prix de revient/prix de vente</td>
					<td width="400">
						<?php include '../../../cycleStock/Stocka/load/load_check_fonct_sup_sta13.php'?></td>
				</tr>
				<tr>
					<td width="250">Niveau de risque</td>
					<td width="400"><?php include '../../../cycleStock/Stocka/load/load_risque_sta_sup.php'?></td>
				</tr>
		</table>
	</div>
</td>
<td>
<!--****************************************Interface A Superviseur droite*********************************-->
<div id="interface_sta_Superviseur_Droite">
	<table>
		<tr>
			<td class="sous_Titre" height="30" bgcolor="#ccc" width="410">SYNTHESE ET CONCLUSION</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td width="100">
							<textarea id="Synthese_sta_Superviseur" cols="34" rows="15" ><?php echo $commentaire;?></textarea>
						</td>
						<td>
							<table height="180">
								<tr>
									<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
										<span>
											<input type="radio" id="Synthese_sta_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque=="faible") echo 'checked'; ?> disabled />Faible<br />
											<input type="radio" id="Synthese_sta_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque=="moyen") echo 'checked'; ?> disabled />Moyen<br />
											<input type="radio" id="Synthese_sta_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque=="eleve") echo 'checked'; ?> disabled />Elevé
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
</div><br />
<!--******************************Interface A Conclusion Superviseur**************************************-->
<div id="interface_sta_Superviseur_Droite_Bas">
	<table>
		<tr>
			<td height="30" bgcolor="#ccc" width="410" align="center">
				<input type="button" class="bouton" value="Retour"id="Int_sta_Retour_Superviseur" />&nbsp;&nbsp;		
				<input type="button" class="bouton" value="Validation" id="conclusion_sta_Superviseur" />
			</td>
		</tr>
		<tr>
			<td class="sous_Titre" height="30" align="center"></td>
		</tr>
	</table>
<!--/div-->
</div>
</td>
</tr>
</table>
</div>
<!--*************************************Fancybox des boutons retour et conclusion**************************-->
<!--div id="fancybox_sup_btn_sta"></div-->
<!--********************************************************************************************************-->
<!--***********************************Message de fermeture de la page*************************************-->
<div id="message_fermeture_sta_sup"><?php include '../../../cycleStock/Stocka/sms/Message retour sta superviseur.php';?></div>
<!--*******************************************************************************************************-->
<!--div id="fancybox_superviseur"></div-->
<!--******************************************************************************************************-->
<!--***********************************Interface A Message conclusion superviseur*************************-->
<!--div id="message_Synthese" data-options="handle:'#dragg'" align="center">
<div id="dragg" class="td_Titre_Question"><br />SYNTHESE</div-->
<div id="interface_sta_Conclusion_Superviseur" data-options="handle:'#dragg_conlus_sta'" align="center">
<div id="dragg_conlus_sta" class="td_Titre_Question"><br />CONCLUSION</div>
<?php include '../../../cycleStock/Stocka/form/Interface_sta_Conclusion.php';?></div>
<!--******************************************************************************************************-->
<!--**********************************Interface de message de terminaison du conclusion*******************-->
<div id="Message_Conclusion_sta_Terminer"><?php include '../../../cycleStock/Stocka/sms/Message terminer conclusion sta.php'?></div>
<!--******************************************************************************************************-->
<!--*********************************Interface de terminaison du cunclusion/sms*******************************-->
<div id="message_Slide_Conclusion_sta"><?php include '../../../cycleStock/Stocka/sms/Message slide sta conclusion.php'?></div>
<!--******************************************************************************************************-->
<!--********************************Emplacement du bouton de fermeture************************************-->
<div id="message_Sup_Donnees_perdues"><?php include '../../../cycleStock/Stocka/sms/Message superviseur donnee perdues.php'; ?></div>
<!--******************************************************************************************************-->
<!--*******************************Interface de message vide de la conclusion******************************-->
<div id="mess_vide_conclusion_sta"><?php include '../../../cycleStock/Stocka/sms/Mess_vide_conclus_sta.php'; ?></div>
<!--*******************************************************************************************************-->
<!--***********************Pas de synthèse******************************************-->
<div id="mess_pas_synth"><?php include '../../../cycleStock/Stocka/sms/mess_vide_conclus_sta.php';?></div>
<!--************************************************************************************-->