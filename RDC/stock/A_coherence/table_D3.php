<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

//J'active le requette pour afficher les données du table tab_rdc_st_d3 
$queryTableD3='select * from tab_rdc_st_d3 where MISSION_ID='.$mission_id;
$reponseQueryTableD3=$bdd->query($queryTableD3);
$donneesTableD3=$reponseQueryTableD3->fetch();
?>
<div width="100%" style="background-color:white;border:1px solid #6495ED;">
	<label style="font-size:16px;">Analyse de l'évolution du taux moyen de provision (D3)</label>
</div>
<div style="overflow:auto;">
	<label><strong><u>Taux de provision en % (provision/montant brut)</u></strong></label>
	<table width="100%" bgcolor="#6495ED">
		<tr style="background-color:#6495ED;color:white;height:10px;">
			<td></td>
			<td style="color:white;text-align:center;">Désignation *</td>
			<td style="color:white;text-align:center;">N</td>
			<td style="color:white;text-align:center;">N-1</td>
			<td style="color:white;text-align:center;">N-2</td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 1</td>
			<td><input type="text" id="L1_C1" value="<?php echo $donneesTableD3['L1_C1']; ?>"/></td>
			<td><input type="text" id="L1_C2" value="<?php echo $donneesTableD3['L1_C2']; ?>"/></td>
			<td><input type="text" id="L1_C3" value="<?php echo $donneesTableD3['L1_C3']; ?>"/></td>
			<td><input type="text" id="L1_C4" value="<?php echo $donneesTableD3['L1_C4']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 2</td>
			<td><input type="text" id="L2_C1" value="<?php echo $donneesTableD3['L2_C1']; ?>"/></td>
			<td><input type="text" id="L2_C2" value="<?php echo $donneesTableD3['L2_C2']; ?>"/></td>
			<td><input type="text" id="L2_C3" value="<?php echo $donneesTableD3['L2_C3']; ?>"/></td>
			<td><input type="text" id="L2_C4" value="<?php echo $donneesTableD3['L2_C4']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 3</td>
			<td><input type="text" id="L3_C1" value="<?php echo $donneesTableD3['L3_C1']; ?>"/></td>
			<td><input type="text" id="L3_C2" value="<?php echo $donneesTableD3['L3_C2']; ?>"/></td>
			<td><input type="text" id="L3_C3" value="<?php echo $donneesTableD3['L3_C3']; ?>"/></td>
			<td><input type="text" id="L3_C4" value="<?php echo $donneesTableD3['L3_C4']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 4</td>
			<td><input type="text" id="L4_C1" value="<?php echo $donneesTableD3['L4_C1']; ?>"/></td>
			<td><input type="text" id="L4_C2" value="<?php echo $donneesTableD3['L4_C2']; ?>"/></td>
			<td><input type="text" id="L4_C3" value="<?php echo $donneesTableD3['L4_C3']; ?>"/></td>
			<td><input type="text" id="L4_C4" value="<?php echo $donneesTableD3['L4_C4']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 5</td>
			<td><input type="text" id="L5_C1" value="<?php echo $donneesTableD3['L5_C1']; ?>"/></td>
			<td><input type="text" id="L5_C2" value="<?php echo $donneesTableD3['L5_C2']; ?>"/></td>
			<td><input type="text" id="L5_C3" value="<?php echo $donneesTableD3['L5_C3']; ?>"/></td>
			<td><input type="text" id="L5_C4" value="<?php echo $donneesTableD3['L5_C4']; ?>"/></td>
		</tr>
	</table>
</div>
