<table>

<?php
include 'connexion.php';

$reponse=$bdd->query('SELECT QUESTION_LIBELLE FROM tab_question WHERE QUESTION_CYCLE_ACHAT=25');

while($donnees=$reponse->fetch()){

?>

<tr>
	<td width="100%" class="lb_quest" height="10"><?php echo $donnees['QUESTION_LIBELLE'];?></td>
</tr>

<?php
}
?>
</table>