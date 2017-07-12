
<script>
function compte_cptra14(id, poste_id, cpt, mission_id){
	id_14="id_14"+cpt;
	if(document.getElementById(id_14).checked==true){
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettea/php/add_ra.php',
			data:{poste_id:poste_id, mission_id:mission_id, ligne:14, result:1, cycleName:'recette'},
			success:function(){
			}
		});
	}
	else{
		$.ajax({
			type:'POST',
			url:'cycleRecette/Recettea/php/delete_ra.php',
			data:{poste_id:poste_id, ligne:14, cycleName:'recette', mission_id:mission_id},
			success:function(){
			}
		});		
	}
}

</script>
<table>
	<tr id="tr_case14">
<?php
include '../../../connexion.php';

$reponse=$bdd->query('SELECT POSTE_CYCLE_ID
						FROM tab_poste_cycle AS tpcycle
						INNER JOIN tab_poste_cle AS tpcle
						ON tpcycle.`POSTE_CLE_ID` = tpcle.`POSTE_CLE_ID`
						WHERE tpcycle.MISSION_ID='.$mission_id.'
						AND tpcycle.ENTREPRISE_ID='.$entrepiseId.'
						AND tpcycle.POSTE_CYCLE_NOM="recette"');
$cpt_col=0;


while ($donnees = $reponse->fetch())
{
$reponse1=$bdd->query('SELECT FONCT_A_RESULT FROM tab_fonct_a WHERE POSTE_CYCLE_ID='.$donnees['POSTE_CYCLE_ID'].' AND FONCT_A_LIGNE=14 AND FONCT_A_NOM="recette"');

$donnees1=$reponse1->fetch();

?>	
		<td class="titre" width="100" align="center">
			<input type="checkbox" onchange="compte_cptra14(this.id,<?php echo $donnees ['POSTE_CYCLE_ID']; ?>,<?php echo $cpt_col; ?>, <?php echo $mission_id; ?>)" id="id_14<?php echo $cpt_col; ?>" <?php if($donnees1['FONCT_A_RESULT']==1) echo 'checked';?> <?php if($conclusionId!=0) echo 'disabled'; ?> />
			<?php
				$cpt_col++;
			?>
		</td>
<?php
}
?>
	</tr>
</table>