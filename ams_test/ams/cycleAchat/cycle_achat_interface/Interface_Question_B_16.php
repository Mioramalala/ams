<?php

include '../../../connexion.php';

$reponse = $bdd->query('SELECT OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif WHERE QUESTION_ID=16 AND CYCLE_ACHAT_ID=2 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['OBJECTIF_COMMENTAIRE'];
$qcm=$donnees['OBJECTIF_QCM'];

?>

<div id="int_Question_B_16">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">Les charges afférentes aux achats (frais de transport) sont-elles identifiées au fur et à mesure des réceptions pour permettre de vérifier que : b)	les factures sont comptabilisées ?




</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui<input type="radio" id="rad_Question_Oui_B_16" name="rad_Question_B16" <?php if($qcm=="OUI") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			N/A<input type="radio" id="rad_Question_NA_B_16" name="rad_Question_B16" <?php if($qcm=="N/A") echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_B_16" name="rad_Question_B16" <?php if($qcm=="NON") echo 'checked'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_B16" rows="15" cols="50"><?php echo $commentaire; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_B_Question_Precedent_16"/>&nbsp;&nbsp;&nbsp;<input type="button" value="Suivant" class="bouton" id="Question_B_16_Bouton" />
			</td>
		</tr>
	</table>
</div>
<div id="fermeture_Icone_Question_B"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_B_16" /></div>