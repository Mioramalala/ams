<?php
include '../../connexion.php';

$missionIdQuestionB=$_POST['missionQuestionIdB'];

$reponse = $bdd->query('SELECT * FROM tab_mission_question_b WHERE MISSION_QUESTION_B_ID='.$missionIdQuestionB);

while ($donnees = $reponse->fetch()){
?>

<div id="int_Question_B_1_Sup">
	<table width="500">
		<tr style="height:10px">
			<td class="td_Titre_Question" align="center">QUESTION N°1/22
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">1.Toutes les marchandises reçues sont-elles enregistrées :a)	sur des documents standard ?</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Oui/NA<input type="radio" id="rad_Question_Oui_B_1" name="rad_Question" <?php if($donnees['MISSION_QUESTION_B_OUI_NON']=='OUI') echo 'checked'; ?> />&nbsp;&nbsp;&nbsp;
			Non <input type="radio" id="rad_Question_Non_B_1" name="rad_Question" <?php if($donnees['MISSION_QUESTION_B_OUI_NON']=='NON') echo 'checked'; ?>/>
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question" rows="15" cols="50"><?php echo $donnees['MISSION_QUESTION_B_COMMENTAIRE']; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="Enregistrer" class="bouton" id="int_Quest_B_1_Sup_Enreg" />
			</td>
		</tr>
	</table>
</div>
<?php
}
?>
<div id="fermeture_Icone_Question_B"><img src="../cycle_achat_image/Fermer.png" id="fermer_Question_B_1" /></div>