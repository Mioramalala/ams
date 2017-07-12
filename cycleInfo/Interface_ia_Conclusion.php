<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="fond_Sous_Titre" class="menu_Titre"><label class="marge_Titre">CONCLUSION</label> 
<label class="margin_Code">Code : FC2 </label>
</div>
<!--***************************Initialisation de la variable mission_id************************-->
<?php //$mission_id=$idMiss;

$mission_id=@$_POST['mission_id'];

include '../../../connexion.php';

$reponse=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$entrepiseId=$donnees['ENTREPRISE_ID'];

?>
<!--*******************************************************************************************-->
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_da" style="display:none;"/>
<div id="fond_Superviseur_Affiche">
<table width="100%">
	<tr>
		<td>
<div id="interface_ima_Superviseur_Droite">
	<table>
		<tr>
			<td class="sous_Titre" height="30" bgcolor="#ccc" width="410">SYNTHESE</td>
		</tr>
		<tr>
			<td>
				<table>
					<tr>
						<td width="100">
							<textarea id="Synthese_ima_Superviseur" cols="34" rows="15" readonly ><?php echo $commentaire;?></textarea>
						</td>
						<td>
							<table height="180">
								<tr>
									<td  class="sous_Titre" height="170">Niveau de risque:<br /><br />
										<span>
											<input type="radio" id="Synthese_ima_Superviseur_Faible" name="rd_Synthese_A_Superviseur" <?php if($risque=="faible") echo 'checked'; ?> disabled />Faible<br />
											<input type="radio" id="Synthese_ima_Superviseur_Moyen" name="rd_Synthese_A_Superviseur" <?php if($risque=="moyen") echo 'checked'; ?> disabled />Moyen<br />
											<input type="radio" id="Synthese_ima_Superviseur_Eleve" name="rd_Synthese_A_Superviseur" <?php if($risque=="eleve") echo 'checked'; ?> disabled />Elevé
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
</div>
<!--**************************************Affichage de A.************************************************-->
<!--div id="interface_A_Sup"><?php //include 'cycleAchat/cycle_achat_interface/Interface_A_Superviseur_Affichage.php'; ?></div-->
<div id="interface_da_Sup"><?php include 'Interface_da_Superviseur_Affichage.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>