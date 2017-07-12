<script>
	function select_risque_ima(id, poste_id, mission_id, cpt){
		id_risque="risque_ima"+cpt;
		risque=document.getElementById(id_risque).value;
		$.ajax({
			type:'POST',
			url:'cycleImmo/Immoa/php/detect_risque_id_existant_ima.php',
			data:{poste_id:poste_id, mission_id:mission_id},
			success:function(e){
				if(e==0){
					$.ajax({
						type:'POST',
						url:'cycleImmo/Immoa/php/enregistrer_risque_ima.php',
						data:{risque:risque, poste_id:poste_id, mission_id:mission_id},
						success:function(){
						}
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleImmo/Immoa/php/update_risque_ima.php',
						data:{risque_id:e, risque:risque},
						success:function(){
						}
					});
				}
			}
		
		});
	}
</script>

<table>
		<tr id="tr_case12">
	<?php
	include '../../../connexion.php';
	
	$reponse = $bdd->query('SELECT POSTE_CYCLE_ID FROM tab_poste_cle INNER JOIN tab_poste_cycle ON tab_poste_cle.POSTE_CLE_ID=tab_poste_cycle.POSTE_CLE_ID WHERE MISSION_ID='.$mission_id.' AND tab_poste_cycle.ENTREPRISE_ID='.$entrepiseId.' AND POSTE_CYCLE_NOM="immo"');

	$cpt=0;

	while ($donnees = $reponse->fetch())
	{
	
	$reponse1=$bdd->query('SELECT NIVEAU_RISQUE_NOM FROM tab_niveau_risque_a WHERE POSTE_CYCLE_ID='.$donnees['POSTE_CYCLE_ID'].' AND MISSION_ID='.$mission_id);
	
	$donnees1=$reponse1->fetch();
	
	?>	
			<td class="titre" width="100" align="center">
				<select id="risque_ima<?php echo $cpt; ?>" onchange="select_risque_ima(this.id,<?php echo $donnees['POSTE_CYCLE_ID']; ?>,<?php echo $mission_id;?>,<?php echo $cpt; ?>)" <?php if($conclusionId!=0) echo 'disabled'; ?>>
					<option value="faible" <?php if($donnees1['NIVEAU_RISQUE_NOM']=="faible") echo 'selected'; ?> >Faible</option>
					<option value="moyen" <?php if($donnees1['NIVEAU_RISQUE_NOM']=="moyen") echo 'selected'; ?> >Moyen</option>
					<option value="eleve" <?php if($donnees1['NIVEAU_RISQUE_NOM']=="eleve") echo 'selected'; ?> >Elevé</option>
				</select>
			</td>
	<?php
	$cpt++;
	}
	?>
		</tr>
</table>