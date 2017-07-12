	<?php
	@session_start();
	include '../../../connexion.php';
	$mission_id=@$_SESSION['idMission'];
	?>
	
<div align="center">
<label>VERIFICATION DE L'EXHAUSTIVITE / REGULARITE DES ENREGISTREMENTS 3. Détermination du coût d'acquisition/production</label>
<div style="overflow:auto;height:360px;">
<table width="100%">
	<tr bgcolor="#ccc">
		<td width="7%">Compte</td>
		<td width="7%">Date</td>
		<td width="7%" >Journal</td>	
		<td width="7%">Référence</td>
		<td width="7%">Libellé</td>
		<td width="7%">Débit</td>
		<td width="7%">Crédit</td>
		<td width="7%">Observations</td>	
	</tr>
	
	<?php 
			$reponse=$bdd->query("select id_echantillon_GL,compt_ech_gl ,date_ech_gl,journal_ech_gl,ref_ech_gl, libelle_ech_gl,
			debit_ech_gl,crd_ech_gl from tab_ehantillon_gl where
			GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles' AND id_mission=".$mission_id);
			while($donnees=$reponse->fetch()){
			$id=$donnees['id_echantillon_GL'];
			$Comp=$donnees['compt_ech_gl'];
			$date=$donnees['date_ech_gl'];
			$jl=$donnees['journal_ech_gl'];
			$ref=$donnees['ref_ech_gl'];
			$libelle=$donnees['libelle_ech_gl'];
			$debit=$donnees['debit_ech_gl'];
			$crd=$donnees['crd_ech_gl'];
	?>
	<tr>
		<td><?php echo $Comp ;?></td>
		<td><?php echo $date ;?></td>
		<td><?php echo $jl ;?></td>
		<td><?php echo $ref ;?></td>
		<td><?php echo $libelle ;?></td>
		
		<td><?php echo number_format((double)$debit, 2, '.', ' ');?></td>	
		<td><?php echo number_format((double)$crd, 2, '.', ' ');?></td>
		<td><textarea id="observation"></textarea></td>
		
	</tr>
	
	<?php } ?>
</table>

</div>
</div>