<script type="text/javascript" src="../../cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script>
<script>
function compte_cptsta9(id, poste_id, cpt, mission_id){
	id_9="id_9"+cpt;
	if(document.getElementById(id_9).checked==true){
		$.ajax({
			type:'POST',
			url:'cycleStock/Stocka/php/add_sta.php',
			data:{poste_id:poste_id, mission_id:mission_id, ligne:9, result:1, cycleName:'stock'},
			success:function(){
			}
		});
	}
	else{
		$.ajax({
			type:'POST',
			url:'cycleStock/Stocka/php/delete_sta.php',
			data:{poste_id:poste_id, ligne:9, cycleName:'stock', mission_id:mission_id},
			success:function(){
			}
		});		
	}
}

</script>
<table>
	<tr>
<?php
include '../../../connexion.php';

$reponse=$bdd->query('SELECT POSTE_CYCLE_ID FROM tab_poste_cycle WHERE POSTE_CYCLE_NOM="stock" AND MISSION_ID='.$mission_id.' AND tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId);

$cpt_col=0;


while ($donnees = $reponse->fetch())
{
$reponse1=$bdd->query('SELECT FONCT_A_RESULT FROM tab_fonct_a WHERE POSTE_CYCLE_ID='.$donnees['POSTE_CYCLE_ID'].' AND FONCT_A_LIGNE=9 AND FONCT_A_NOM="stock"');

$donnees1=$reponse1->fetch();

?>	
		<td class="titre" width="100" align="center">
			<input type="checkbox" class="verrou_tache16" onchange="compte_cptsta9(this.id,<?php echo $donnees ['POSTE_CYCLE_ID']; ?>,<?php echo $cpt_col; ?>, <?php echo $mission_id; ?>)" id="id_9<?php echo $cpt_col; ?>" <?php if($donnees1['FONCT_A_RESULT']==1) echo 'checked';?> <?php if($conclusionId!=0) echo 'disabled'; ?> />
			<?php
				$cpt_col++;
			?>
		</td>
<?php
}
?>
	</tr>
</table>