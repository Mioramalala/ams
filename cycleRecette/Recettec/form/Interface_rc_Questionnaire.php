<div id="int_Question_f">
<table>
	<tr class="sous_Titre" align="center">
		<td width="530">Questions</td>
		<td width="50">Oui N/A Non</td>
		<td width="380">Commentaire</td>
	</tr>
</table>
<div id="table_questionnaire_B">
<table>
<?php
include '../../Connexion.php';

// $mission_id=$_POST['mission_id'];
$mission_id=1;
// $reponse = $bdd->query('SELECT * FROM tab_question_achat_b INNER JOIN Tab_Mission_Question_B ON tab_question_achat_b.QUESTION_ACHAT_B_ID=Tab_Mission_Question_B.QUESTION_ACHAT_B_ID WHERE MISSION_ID = '.$mission_id);
$reponse = $bdd->query('SELECT * FROM tab_objectif INNER JOIN tab_question ON tab_objectif.QUESTION_ID=tab_question.QUESTION_ID WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=19');
$compte=0;
$couleur='#efefef';
while ($donnees = $reponse->fetch())
{
?>	<tr bgcolor="<?php if($couleur=='#efefef'){$couleur='#7da0f8'; echo '#7da0f8';} else {$couleur='#efefef';echo '#efefef';}?>" class="sous_Titre">
		<td width="550" align="left" height="40"><?php echo $donnees['QUESTION_LIBELLE']; ?></td>
		<td width="50" align="center"><?php echo $donnees['OBJECTIF_QCM']; ?></td>
		<td width="480" align="center"><?php echo $donnees['OBJECTIF_COMMENTAIRE']; ?></td>
	</tr>
<?php
$compte++;
}
?>
</table>
</div>
</div>