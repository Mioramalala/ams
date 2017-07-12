<?php
@session_start();
include '../../../connexion.php';
$mission_id=@$_SESSION['idMission'];

///////////////////////////compt accessoires/////////////
	$reponse=$bdd->query("select count(id_frais_acc) As nbr_Acc from tab_Frais_Accessoire where id_mission=".$mission_id);
		$donnees=$reponse->fetch();
		$nbr_Acc=(int)$donnees['nbr_Acc'];
		// echo $nbr_Acc;
///////////////////////////////////////////////////////
	$reponse=$bdd->query("select nom_frais_acc from tab_Frais_Accessoire where id_mission=".$mission_id);
		
?>
<style>
	#tb td{
		border:1px solid;
	}


</style>

<div  style="width:100%">
 <center><label>Détermination du coût d'acquisition/production</label></center>
<div style="overflow:auto;height:360px; width:100%;">
<table id="tb"width="50%" style="border-collapse:collapse;">
	<tr bgcolor="#ccc">
		<td width="7%" rowspan="2"></td>
		<td width="7%" rowspan="2">Renvoi</td>
		<td width="7%" rowspan="2">Prix d'achat</td>

		<td colspan="<?php echo $nbr_Acc;?>"><center>Frais accessoires</center></td>
		
		<td width="7%" rowspan="2">Coût </td>
		<td width="7%" rowspan="2">Montant comptabilisé</td>


		<td width="7%" rowspan="2">Ecart</td>
		<td width="7%" rowspan="2">Observations</td>
	</tr>
	<tr>
		<?php while($donnees=$reponse->fetch())
		{
		$rubrique=$donnees['nom_frais_acc'];?>
		
		<td style="border:1px solid;"><?php echo $rubrique;?></td>
		
		<?php } ?>
	</tr>
	
		<?php 
		$sql="select id_echantillon_GL,compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,
			debit_ech_gl,crd_ech_gl,sold_ech_gl from  tab_ehantillon_gl where id_mission=".$mission_id ;

		$reponse=$bdd->query($sql);
		while($donnees=$reponse->fetch())
		{
			?>
			<tr>
				<td><?php echo $donnees['libelle_ech_gl'];?></td>
				<td> renvoi </td>
				<td><input type="text" id="prix"></td>
				<?php
					for ($i=0;$i<$nbr_Acc;$i++){

				?>
				<td><input type="text" id="Acc<?php echo $i;?>"></td>
				<?php } ?>

				<td><input type="text" id="cout"></td>
				<td><input type="text" id="montan"></td>
				<td><input type="text" id="ecart"></td>
				<td><input type="text" id="observation"></td>
			</tr>
	
	<?php } ?>
	
</table>

</div>
</div>