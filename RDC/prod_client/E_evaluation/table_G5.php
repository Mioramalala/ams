<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<style>
#tet{
  margin-left:-17px;
  margin-top:20px;
  border-collapse:collapse;
  }
#tettd{
   border:1px solid #ccc;
   background-color:#0074bf;
   color:#fff;
  }
 </style>
<!-----------------------------------------------table 1---------------------------------------->
<div align="center">
	<label>SUIVI DE LA CIRCULARISATION DES COMPTES CLIENTS							
	</label>
	<div style="overflow:auto;height:360px;">
		<table width="100%" id="tet">
			<tr id="tettd">
				<td width="7%">Compte</td>
				<td width="7%">Libellé</td>
				<td width="7%">Solde Comptable(1)</td>
				<td width="7%">Date de circularisation</td>
				<td width="7%">Date de la reponse</td>
				<td width="7%">Solde circularisé</td>
				<td width="7%">Ecart (1)-(2)</td>
				<td width="7%">Observations</td>
			</tr>
		</table>
		<table>
		TABLE 5
		</table>

</div>
</div>