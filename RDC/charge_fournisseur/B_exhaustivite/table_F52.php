<?php

include '../../../connexion.php';

@session_start();

$mission_id=@$_SESSION['idMission'];
//C'est là le requette de la nouvelle table  solde de Mamy
//pour l'affichage de compte, libellé, solde balance, solde GL, solde auxiliaire



?>
<script>
function ajoutDonnees(){
	alert("I add the data solde");
}
function modifierDonnees(){
	alert("I update the data solde");
}
</script>
<div>
<div style="background-color:white;border:1px solid #6495ED;width:1098px;">
	<center><label style="font-size:12px;">RAPPROCHEMENT SOLDES GL / BALANCE / AUXILIAIRE</label></center>
</div>
	<table width="1100px" style="background-color:#6495ED;">
		<tr class="tr_table_text_entete" align="center">
			<td>COMPTE</td>
			<td>LIBELLE</td>
			<td style="color:white;">SOLDE BALANCE <br />(1)</td>
			<td>SOLDE GL <br />(2)</td>
			<td  style="color:white;">SOLDE BALANCE <br /> AUXILIAIRE (3)</td>
			<td>ECART <br />(1)-(2)</td>
			<td>OBSERVATIONS</td>
			<td>ECART <br />(1)-(3)</td>
			<td>OBSERVATIONS</td>
			<td>ACTIONS</td>
		</tr>
		<tr class="tr_table_text_champ">
			<td style="color:blue;">compte</td>
			<td>libellé</td>
			<td><input type="text" value="solde balance" id="tx_s_gl" size="22px" class="tr_table_text_champ" /></td>
			<td><input type="text" value="solde GL (2)" id="tx_s_gl" size="22px" class="tr_table_text_champ" /></td>
			<td><input type="text" value="solde bal aux" id="tx_s_gl" size="22px" class="tr_table_text_champ" /></td>
			<td>ecart (1)</td>
			<td><textarea id="tx_obs_1_" cols="18" rows="3"></textarea></td>
			<td>ecart 2</td>
			<td><textarea id="tx_obs_2_" cols="18" rows="3" ></textarea></td>
			<td><label style="cursor:pointer;color:blue;" id="ajout_" onclick="ajoutDonnees()">ajouter</label><br /><label style="cursor:pointer;color:blue;" id="modifier_" onclick="modifierDonnees()">modifier</label></td>
		</tr>
	</table>
</div>