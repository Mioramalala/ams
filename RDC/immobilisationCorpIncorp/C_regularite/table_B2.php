<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<div align="center">
<label>Rapprochement fichier d'immobilisations avec la comptabilité</label>
<div style="overflow:auto;height:360px;width:1000px;">
<table width="100%">
	<tr bgcolor="#ccc">
		<td width="7%">ETATS FINANCIERS</td>
		<td width="1%"></td>

		<td width="7%" colspan="5">BALANCE GENERALE</td>
		<td width="1%"></td>
		<td width="7%" colspan="3">TABLEAU D'AMORTISSEMENT</td>
		<td width="1%"></td>


		<td width="7%"></td>
	</tr>
	<tr bgcolor="#ccc">
		<td width="7%">Libellé</td>
		<td width="1%"></td>

		<td width="7%">Compte</td>
		<td width="7%">Libellé</td>
		<td width="7%">Débit</td>
		<td width="7%">Crédit</td>
		<td width="7%">Solde</td>
		<td width="1%"></td>

		<td width="7%">Valeur Brute</td>
		<td width="7%">Amortissements cumulés</td>
		<td width="7%">Dotation de l'exercice</td>
		<td width="1%"></td>

		<td width="7%">ECART BG /Tab amort.</td>
	</tr>
</table>

</div>
</div>