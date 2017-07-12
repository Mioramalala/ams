<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$queryTable='select * from  tab_rdc_cf_f3 where MISSION_ID='.$mission_id.' and REFERENCE="F31"';
$reponseTable=$bdd->query($queryTable);
$donneesTable=$reponseTable->fetch();

?>

<div>
<div style="background-color:white;border:1px solid #6495ED;width:99.8%">
	<center><label style="font-size:12px;">RATIOS FOURNISSEURS (F3)</label></center>
</div>
	<table width="100%" class="tr_table_text_entete">
		<tr align="center" class="tr_table_text_entete">
			<td>Délai crédit fournisseur :</td>
			<td>Année N</td>
			<td style="color:white;font-weight:normal;">Année N-1</td>
		</tr>
		<tr bgcolor="white">
			<td bgcolor="#ccc">Achats import</td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA1_C1" value="<?php echo $donneesTable['L1_C1'];?>" onkeyup="testEntier(this.id)"/></td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA1_C2" value="<?php echo $donneesTable['L1_C2'];?>" onkeyup="testEntier(this.id)"/></td>
		</tr>
		<tr bgcolor="white">
			<td bgcolor="#ccc">Achats locaux</td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA2_C1" value="<?php echo $donneesTable['L2_C1'];?>" onkeyup="testEntier(this.id)"/></td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA2_C2" value="<?php echo $donneesTable['L2_C2'];?>" onkeyup="testEntier(this.id)"/></td>
		</tr>
		<tr bgcolor="white">
			<td bgcolor="#ccc">Achats TTC</td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA3_C1" value="<?php echo $donneesTable['L3_C1'];?>" onkeyup="testEntier(this.id)"/></td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA3_C2" value="<?php echo $donneesTable['L3_C2'];?>" onkeyup="testEntier(this.id)"/></td>
		</tr>
		<tr bgcolor="white">
			<td bgcolor="#ccc">FOURNISSEURS</td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA4_C1" value="<?php echo $donneesTable['L4_C1'];?>" onkeyup="testEntier(this.id)"/></td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA4_C2" value="<?php echo $donneesTable['L4_C2'];?>" onkeyup="testEntier(this.id)"/></td>
		</tr>
		<tr bgcolor="white">
			<td bgcolor="#ccc"></td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA5_C1" value="<?php echo $donneesTable['L5_C1'];?>" onkeyup="testEntier(this.id)"/></td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA5_C2" value="<?php echo $donneesTable['L5_C2'];?>" onkeyup="testEntier(this.id)"/></td>
		</tr>
		<tr bgcolor="white">
			<td bgcolor="#ccc">En nombres de jours</td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA6_C1" value="<?php echo $donneesTable['L6_C1'];?>" onkeyup="testEntier(this.id)"/></td>
			<td align="center"><input type="text" size="50px" class="tr_table_text_champ" id="LA6_C2" value="<?php echo $donneesTable['L6_C2'];?>" onkeyup="testEntier(this.id)"/></td>
		</tr>
	</table>
</div>