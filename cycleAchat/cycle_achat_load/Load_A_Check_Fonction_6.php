<script type="text/javascript" src="../../cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script>
<script>
function compte_cpt6(id, poste_id, cpt, mission_id){
	id_6="id_6"+cpt;
	if(document.getElementById(id_6).checked==true){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/det_ligne_a.php',
			data:{ligne:6,poste_id:poste_id, mission_id:mission_id},
			success:function(e){
				if(e!=6){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/get_achat_A1.php',
						data:{poste_id:poste_id, mission_id:mission_id, ligne:6, result:1},
						success:function(){
						}
					});
				}
			}
		});
	}
	else{
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/update_achat_A1.php',
			data:{poste_id:poste_id, ligne:6},
			success:function(){
			}
		});		
	}
}

</script>
<table>
	<tr>
<?php
include '../../connexion.php';

$reponse = $bdd->query('SELECT POSTE_CYCLE_ID FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="achat"');

$cpt_col=0;


while ($donnees = $reponse->fetch())
{
$reponse1=$bdd->query('SELECT FONCT_ACHAT_A_RESULT FROM tab_fonction_achat_a WHERE POSTE_CYCLE_ID='.$donnees['POSTE_CYCLE_ID'].' AND FONCT_ACHAT_A_LIGNE=6');

$donnees1=$reponse1->fetch();

?>	
		<td class="titre" width="100" align="center">
			<input type="checkbox" onchange="compte_cpt6(this.id,<?php echo $donnees ['POSTE_CYCLE_ID']; ?>,<?php echo $cpt_col; ?>, <?php echo $mission_id; ?>)" id="id_6<?php echo $cpt_col; ?>" <?php if($donnees1['FONCT_ACHAT_A_RESULT']==1) echo 'checked';?>/>
			<?php
				$cpt_col++;
			?>
		</td>
<?php
}
?>
	</tr>
</table>