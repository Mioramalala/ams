<div id="int_Question_f">
<table>
	<tr class="sous_Titre" align="center">
		<td width="350">Questions</td>
		<td width="340">Commentaire</td>
	</tr>
</table>
<div id="table_questionnaire_d_Sup">
<table>
<?php
include '../../../connexion.php';

// $mission_id=$_POST['mission_id'];
// $reponse = $bdd->query('SELECT * FROM tab_question_achat_b INNER JOIN Tab_Mission_Question_B ON tab_question_achat_b.QUESTION_ACHAT_B_ID=Tab_Mission_Question_B.QUESTION_ACHAT_B_ID WHERE MISSION_ID = '.$mission_id);
$reponse=$bdd->query('SELECT QUESTION_LIBELLE, OBJECTIF_COMMENTAIRE, OBJECTIF_QCM FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE QUESTION_CYCLE_ACHAT=22 AND MISSION_ID='.$mission_id);
$compte=0;
$couleur='#efefef';
while ($donnees = $reponse->fetch())
{
?>	<tr bgcolor="<?php if($couleur=='#efefef'){$couleur='#fff'; echo '#fff';} else {$couleur='#efefef';echo '#efefef';}?>" class="sous_Titre" value="<?php //echo $donnees['MISSION_QUESTION_B_ID']; ?>" onclick="selectionMissionQuestionIdf(this.id,<?php //echo $donnees['MISSION_QUESTION_B_ID']; ?>)" style="cursor:pointer;">
		<td width="360" align="left" height="40"><?php echo $donnees['QUESTION_LIBELLE']; ?></td>
		<td width="50" align="center"><?php echo $donnees['OBJECTIF_QCM']; ?></td>
		<td width="340" align="center"><?php echo $donnees['OBJECTIF_COMMENTAIRE']; ?></td>
	</tr>
<?php
$compte++;
}
?>
</table>
</div>
</div>