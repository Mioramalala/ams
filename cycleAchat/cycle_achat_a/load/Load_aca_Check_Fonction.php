<script>
// function compte_cptaca1(id, poste_id, cpt, mission_id){
	// id_1="id_1"+cpt;
	// if(document.getElementById(id_1).checked==true){
		// $.ajax({
			// type:'POST',
			// url:'cycleAchat/cycle_achat_a/php/add_aca.php',
			// data:{poste_id:poste_id, mission_id:mission_id, ligne:1, result:1, cycleName:'achat'},
			// success:function(){
			// }
		// });
	// }
	// else{
		// $.ajax({
			// type:'POST',
			// url:'cycleAchat/cycle_achat_a/php/delete_aca.php',
			// data:{poste_id:poste_id, ligne:1, cycleName:'achat', mission_id:mission_id},
			// success:function(){
			// }
		// });		
	// }
// }
</script>
<table>
	<tr>
<?php
include '../../../connexion.php';

$reponse=$bdd->query('SELECT POSTE_CYCLE_ID FROM tab_poste_cycle WHERE POSTE_CYCLE_NOM="achat" AND MISSION_ID='.$mission_id.' AND tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId);

$cpt_col=0;

while ($donnees = $reponse->fetch())
{
$reponse1=$bdd->query('SELECT FONCT_A_RESULT FROM tab_fonct_a WHERE POSTE_CYCLE_ID='.$donnees['POSTE_CYCLE_ID'].' AND FONCT_A_LIGNE=1 AND FONCT_A_NOM="achat"');
$donnees1=$reponse1->fetch();

?>	
		<td class="titre" width="100" align="center">
			<input type="checkbox" style="display:none"/>
			<!--input type="checkbox" onchange="compte_cptaca1(this.id,<?php //echo $donnees ['POSTE_CYCLE_ID']; ?>,<?php //echo $cpt_col; ?>, <?php //echo $mission_id; ?>)" id="id_1<?php //echo $cpt_col; ?>" <?php //if($donnees1['FONCT_A_RESULT']==1) echo 'checked';?> <?php //if($conclusionId!=0) echo 'disabled'; ?> /-->
			<?php
				$cpt_col++;
			?>
		</td>
<?php
}
?>
	</tr>
</table>