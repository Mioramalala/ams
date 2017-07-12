<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<div align="center">
<label>VERIFICATION DES TITRES DE PROPRIETE *</label>
<div style="overflow:auto;height:360px;">
<table width="100%">


	<tr bgcolor="#ccc">
		<td width="7%" colspan="4">Titres de propriété</td>
	</tr>
	<tr bgcolor="#ccc">
		<td width="7%"></td>	
		<td width="7%">Nature</td>	
		<td width="7%">Régularité</td>
		<td width="7%">Observations</td>
	</tr>
	<?php 
		for ($a=0; $a<=10 ;$a++){
	
	?>
	<tr>
		<td>immobilisation<?php echo $a;?></td>
		<td><textarea id="nature"></textarea></td>
		<td><textarea id="reg"></textarea></td>
		<td><textarea id="obs"></textarea></td>
	</tr>
	
	<?php } ?>
</table>

</div>
</div>