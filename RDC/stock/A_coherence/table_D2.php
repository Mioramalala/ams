<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

$queryTableD2='select * from  tab_rdc_st_d2 where MISSION_ID='.$mission_id;
$reponseTableD2=$bdd->query($queryTableD2);
$donneesTableD2=$reponseTableD2->fetch();
?>
<div width="100%" style="background-color:white;border:1px solid #6495ED;">
	<label style="font-size:16px;">Examen des principaux ratios (D2)</label><br />
</div>
<div style="overflow:auto;height:420px;">
	<label><strong><u>1. Rotation des stocks de matières premières</u></strong></label>
	<table bgcolor="#6495ED" width="100%" id='table-1' data-index="1">
		<tr style="background-color:#6495ED;color:white;height:10px;">
			<td style="color:white;text-align:center;">Exercice</td>
			<td style="color:white;text-align:center;">N</td>
			<td style="color:white;text-align:center;">N-1</td>
			<td style="color:white;text-align:center;">N-2</td>
		</tr>
		<tr style="background-color:white;">
			<td>Stock initial (brut)</td>
			<td><input type="Text" id="T1_L1_N1" size="20px" class="rdc-stock-initial" data-col="N1" value="<?=  $donneesTableD2['T1_L1_N1']=='undefined'?'': $donneesTableD2['T1_L1_N1']?>"></td>
			<td><input type="Text" id="T1_L1_N2" size="20px" class="rdc-stock-initial" data-col="N2" value="<?=  $donneesTableD2['T1_L1_N2']=='undefined'?'': $donneesTableD2['T1_L1_N2'] ?>"></td>
			<td><input type="Text" id="T1_L1_N3" size="20px" class="rdc-stock-initial" data-col="N3" value="<?=  $donneesTableD2['T1_L1_N3']=='undefined'?'': $donneesTableD2['T1_L1_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Stock final (brut)</td>
			<td><input type="Text" id="T1_L2_N1" size="20px" class="rdc-stock-final" data-col="N1" value="<?= $donneesTableD2['T1_L2_N1']=='undefined'?'': $donneesTableD2['T1_L2_N1'] ?>"></td>
			<td><input type="Text" id="T1_L2_N2" size="20px" class="rdc-stock-final" data-col="N2" value="<?= $donneesTableD2['T1_L2_N2']=='undefined'?'': $donneesTableD2['T1_L2_N2'] ?>"></td>
			<td><input type="Text" id="T1_L2_N3" size="20px" class="rdc-stock-final" data-col="N3" value="<?= $donneesTableD2['T1_L2_N3']=='undefined'?'': $donneesTableD2['T1_L2_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Achats de matières premières (HT)</td>
			<td><input type="Text" id="T1_L3_N1" size="20px" class="rdc-achat-matiere-premiere" data-col="N1" value="<?= $donneesTableD2['T1_L3_N1']=='undefined'?'': $donneesTableD2['T1_L3_N1'] ?>"></td>
			<td><input type="Text" id="T1_L3_N2" size="20px" class="rdc-achat-matiere-premiere" data-col="N2" value="<?= $donneesTableD2['T1_L3_N2']=='undefined'?'': $donneesTableD2['T1_L3_N2'] ?>"></td>
			<td><input type="Text" id="T1_L3_N3" size="20px" class="rdc-achat-matiere-premiere" data-col="N3" value="<?= $donneesTableD2['T1_L3_N3']=='undefined'?'': $donneesTableD2['T1_L3_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Ratio (en nombre de jours) *</td>
			<td><input type="Text" id="T1_L4_N1" size="20px" class="rdc-ratio-jour" data-col="N1" value="<?= $donneesTableD2['T1_L4_N1']=='undefined'?'': $donneesTableD2['T1_L4_N1'] ?>"></td>
			<td><input type="Text" id="T1_L4_N2" size="20px" class="rdc-ratio-jour" data-col="N2" value="<?= $donneesTableD2['T1_L4_N2']=='undefined'?'': $donneesTableD2['T1_L4_N2'] ?>"></td>
			<td><input type="Text" id="T1_L4_N3" size="20px" class="rdc-ratio-jour" data-col="N3" value="<?= $donneesTableD2['T1_L4_N3']=='undefined'?'': $donneesTableD2['T1_L4_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Evolution du ratio</td>
			<td><input type="Text" id="T1_L5_N1" size="20px" data-col="N1" value="<?= $donneesTableD2['T1_L5_N1']=='undefined'?'': $donneesTableD2['T1_L5_N1'] ?>"></td>
			<td><input type="Text" id="T1_L5_N2" size="20px" data-col="N2" value="<?= $donneesTableD2['T1_L5_N2']=='undefined'?'': $donneesTableD2['T1_L5_N2'] ?>"></td>
			<td><input type="Text" id="T1_L5_N3" size="20px" data-col="N3" value="<?= $donneesTableD2['T1_L5_N3']=='undefined'?'': $donneesTableD2['T1_L5_N3'] ?>"></td>
		</tr>
	</table>
	<label><strong><u>2. Rotation des stocks de fournitures consommables</u></strong></label>
	<table bgcolor="#6495ED" width="100%" id='table-2' data-index="2">
		<tr style="background-color:#6495ED;color:white;height:10px;">
			<td style="color:white;text-align:center;">Exercice</td>
			<td style="color:white;text-align:center;">N</td>
			<td style="color:white;text-align:center;">N-1</td>
			<td style="color:white;text-align:center;">N-2</td>
		</tr>
		<tr style="background-color:white;">
			<td>Stock initial (brut)</td>
			<td><input type="Text" id="T2_L1_N1" size="20px" class="rdc-stock-initial" data-col="N1" value="<?=  $donneesTableD2['T2_L1_N1']=='undefined'?'': $donneesTableD2['T2_L1_N1']?>"></td>
			<td><input type="Text" id="T2_L1_N2" size="20px" class="rdc-stock-initial" data-col="N2" value="<?=  $donneesTableD2['T2_L1_N2']=='undefined'?'': $donneesTableD2['T2_L1_N2'] ?>"></td>
			<td><input type="Text" id="T2_L1_N3" size="20px" class="rdc-stock-initial" data-col="N3" value="<?=  $donneesTableD2['T2_L1_N3']=='undefined'?'': $donneesTableD2['T2_L1_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Stock final (brut)</td>
			<td><input type="Text" id="T2_L2_N1" size="20px" class="rdc-stock-final" data-col="N1" value="<?= $donneesTableD2['T2_L2_N1']=='undefined'?'': $donneesTableD2['T2_L2_N1'] ?>"></td>
			<td><input type="Text" id="T2_L2_N2" size="20px" class="rdc-stock-final" data-col="N2" value="<?= $donneesTableD2['T2_L2_N2']=='undefined'?'': $donneesTableD2['T2_L2_N2'] ?>"></td>
			<td><input type="Text" id="T2_L2_N3" size="20px" class="rdc-stock-final" data-col="N3" value="<?= $donneesTableD2['T2_L2_N3']=='undefined'?'': $donneesTableD2['T2_L2_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Achats de matières premières (HT)</td>
			<td><input type="Text" id="T2_L3_N1" size="20px" class="rdc-achat-matiere-premiere" data-col="N1" value="<?= $donneesTableD2['T2_L3_N1']=='undefined'?'': $donneesTableD2['T2_L3_N1'] ?>"></td>
			<td><input type="Text" id="T2_L3_N2" size="20px" class="rdc-achat-matiere-premiere" data-col="N2" value="<?= $donneesTableD2['T2_L3_N2']=='undefined'?'': $donneesTableD2['T2_L3_N2'] ?>"></td>
			<td><input type="Text" id="T2_L3_N3" size="20px" class="rdc-achat-matiere-premiere" data-col="N3" value="<?= $donneesTableD2['T2_L3_N3']=='undefined'?'': $donneesTableD2['T2_L3_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Ratio (en nombre de jours) *</td>
			<td><input type="Text" id="T2_L4_N1" size="20px" class="rdc-ratio-jour" data-col="N1" value="<?= $donneesTableD2['T2_L4_N1']=='undefined'?'': $donneesTableD2['T2_L4_N1'] ?>"></td>
			<td><input type="Text" id="T2_L4_N2" size="20px" class="rdc-ratio-jour" data-col="N2" value="<?= $donneesTableD2['T2_L4_N2']=='undefined'?'': $donneesTableD2['T2_L4_N2'] ?>"></td>
			<td><input type="Text" id="T2_L4_N3" size="20px" class="rdc-ratio-jour" data-col="N3" value="<?= $donneesTableD2['T2_L4_N3']=='undefined'?'': $donneesTableD2['T2_L4_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Evolution du ratio</td>
			<td><input type="Text" id="T2_L5_N1" size="20px" data-col="N1" value="<?= $donneesTableD2['T2_L5_N1']=='undefined'?'': $donneesTableD2['T2_L5_N1'] ?>"></td>
			<td><input type="Text" id="T2_L5_N2" size="20px" data-col="N2" value="<?= $donneesTableD2['T2_L5_N2']=='undefined'?'': $donneesTableD2['T2_L5_N2'] ?>"></td>
			<td><input type="Text" id="T2_L5_N3" size="20px" data-col="N3" value="<?= $donneesTableD2['T2_L5_N3']=='undefined'?'': $donneesTableD2['T2_L5_N3'] ?>"></td>
		</tr>
	</table>
	<label><strong><u>3. Rotation des stocks des produits finis</u></strong></label>
	<table bgcolor="#6495ED" width="100%"  id='table-3' data-index="3">
		<tr style="background-color:#6495ED;color:white;height:10px;">
			<td style="color:white;text-align:center;">Exercice</td>
			<td style="color:white;text-align:center;">N</td>
			<td style="color:white;text-align:center;">N-1</td>
			<td style="color:white;text-align:center;">N-2</td>
		</tr>
		<tr style="background-color:white;">
			<td>Stock initial (brut)</td>
			<td><input type="Text" id="T3_L1_N1" size="20px" class="rdc-stock-initial" data-col="N1" value="<?=  $donneesTableD2['T3_L1_N1']=='undefined'?'': $donneesTableD2['T3_L1_N1']?>"></td>
			<td><input type="Text" id="T3_L1_N2" size="20px" class="rdc-stock-initial" data-col="N2" value="<?=  $donneesTableD2['T3_L1_N2']=='undefined'?'': $donneesTableD2['T3_L1_N2']?>"></td>
			<td><input type="Text" id="T3_L1_N3" size="20px" class="rdc-stock-initial" data-col="N3" value="<?=  $donneesTableD2['T3_L1_N1']=='undefined'?'': $donneesTableD2['T3_L1_N3']?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Stock final (brut)</td>
			<td><input type="Text" id="T3_L2_N1" size="20px" class="rdc-stock-final" data-col="N1" value="<?= $donneesTableD2['T3_L2_N1']=='undefined'?'': $donneesTableD2['T3_L2_N1'] ?>"></td>
			<td><input type="Text" id="T3_L2_N2" size="20px" class="rdc-stock-final" data-col="N2" value="<?= $donneesTableD2['T3_L2_N2']=='undefined'?'': $donneesTableD2['T3_L2_N2'] ?>"></td>
			<td><input type="Text" id="T3_L2_N3" size="20px" class="rdc-stock-final" data-col="N3" value="<?= $donneesTableD2['T3_L2_N3']=='undefined'?'': $donneesTableD2['T3_L2_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Achats de matières premières (HT)</td>
			<td><input type="Text" id="T3_L3_N1" size="20px" class="rdc-achat-matiere-premiere" data-col="N1" value="<?= $donneesTableD2['T3_L3_N1']=='undefined'?'': $donneesTableD2['T3_L3_N1'] ?>"></td>
			<td><input type="Text" id="T3_L3_N2" size="20px" class="rdc-achat-matiere-premiere" data-col="N2" value="<?= $donneesTableD2['T3_L3_N2']=='undefined'?'': $donneesTableD2['T3_L3_N2'] ?>"></td>
			<td><input type="Text" id="T3_L3_N3" size="20px" class="rdc-achat-matiere-premiere" data-col="N3" value="<?= $donneesTableD2['T3_L3_N3']=='undefined'?'': $donneesTableD2['T3_L3_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Ratio (en nombre de jours) *</td>
			<td><input type="Text" id="T3_L4_N1" size="20px" class="rdc-ratio-jour" data-col="N1" value="<?= $donneesTableD2['T3_L4_N1']=='undefined'?'': $donneesTableD2['T3_L4_N1'] ?>"></td>
			<td><input type="Text" id="T3_L4_N2" size="20px" class="rdc-ratio-jour" data-col="N2" value="<?= $donneesTableD2['T3_L4_N2']=='undefined'?'': $donneesTableD2['T3_L4_N2'] ?>"></td>
			<td><input type="Text" id="T3_L4_N3" size="20px" class="rdc-ratio-jour" data-col="N3" value="<?= $donneesTableD2['T3_L4_N3']=='undefined'?'': $donneesTableD2['T3_L4_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Evolution du ratio</td>
			<td><input type="Text" id="T3_L5_N1" size="20px" data-col="N1" value="<?= $donneesTableD2['T3_L5_N1']=='undefined'?'': $donneesTableD2['T3_L5_N1'] ?>"></td>
			<td><input type="Text" id="T3_L5_N2" size="20px" data-col="N2" value="<?= $donneesTableD2['T3_L5_N2']=='undefined'?'': $donneesTableD2['T3_L5_N2'] ?>"></td>
			<td><input type="Text" id="T3_L5_N3" size="20px" data-col="N3" value="<?= $donneesTableD2['T3_L5_N3']=='undefined'?'': $donneesTableD2['T3_L5_N3'] ?>"></td>
		</tr>
	</table>

	<label><strong><u>4. Rotation de stocks de marchandises</u></strong></label>
	<table bgcolor="#6495ED" width="100%"  id='table-4' data-index="4">
		<tr style="background-color:#6495ED;color:white;height:10px;">
			<td style="color:white;text-align:center;">Exercice</td>
			<td style="color:white;text-align:center;">N</td>
			<td style="color:white;text-align:center;">N-1</td>
			<td style="color:white;text-align:center;">N-2</td>
		</tr>
		<tr style="background-color:white;">
			<td>Stock initial (brut)</td>
			<td><input type="Text" id="T4_L1_N1" size="20px" class="rdc-stock-initial" data-col="N1" value="<?=  $donneesTableD2['T4_L1_N1']=='undefined'?'': $donneesTableD2['T4_L1_N1']?>"></td>
			<td><input type="Text" id="T4_L1_N2" size="20px" class="rdc-stock-initial" data-col="N2" value="<?=  $donneesTableD2['T4_L1_N2']=='undefined'?'': $donneesTableD2['T4_L1_N2']?>"></td>
			<td><input type="Text" id="T4_L1_N3" size="20px" class="rdc-stock-initial" data-col="N3" value="<?=  $donneesTableD2['T4_L1_N1']=='undefined'?'': $donneesTableD2['T4_L1_N3']?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Stock final (brut)</td>
			<td><input type="Text" id="T4_L2_N1" size="20px" class="rdc-stock-final" data-col="N1" value="<?= $donneesTableD2['T4_L2_N1']=='undefined'?'': $donneesTableD2['T4_L2_N1'] ?>"></td>
			<td><input type="Text" id="T4_L2_N2" size="20px" class="rdc-stock-final" data-col="N2" value="<?= $donneesTableD2['T4_L2_N2']=='undefined'?'': $donneesTableD2['T4_L2_N2'] ?>"></td>
			<td><input type="Text" id="T4_L2_N3" size="20px" class="rdc-stock-final" data-col="N3" value="<?= $donneesTableD2['T4_L2_N3']=='undefined'?'': $donneesTableD2['T4_L2_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Achats de matières premières (HT)</td>
			<td><input type="Text" id="T4_L3_N1" size="20px" class="rdc-achat-matiere-premiere" data-col="N1" value="<?= $donneesTableD2['T4_L3_N1']=='undefined'?'': $donneesTableD2['T4_L3_N1'] ?>"></td>
			<td><input type="Text" id="T4_L3_N2" size="20px" class="rdc-achat-matiere-premiere" data-col="N2" value="<?= $donneesTableD2['T4_L3_N2']=='undefined'?'': $donneesTableD2['T4_L3_N2'] ?>"></td>
			<td><input type="Text" id="T4_L3_N3" size="20px" class="rdc-achat-matiere-premiere" data-col="N3" value="<?= $donneesTableD2['T4_L3_N3']=='undefined'?'': $donneesTableD2['T4_L3_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Ratio (en nombre de jours) *</td>
			<td><input type="Text" id="T4_L4_N1" size="20px" class="rdc-ratio-jour" data-col="N1" value="<?= $donneesTableD2['T4_L4_N1']=='undefined'?'': $donneesTableD2['T4_L4_N1'] ?>"></td>
			<td><input type="Text" id="T4_L4_N2" size="20px" class="rdc-ratio-jour" data-col="N2" value="<?= $donneesTableD2['T4_L4_N2']=='undefined'?'': $donneesTableD2['T4_L4_N2'] ?>"></td>
			<td><input type="Text" id="T4_L4_N3" size="20px" class="rdc-ratio-jour" data-col="N3" value="<?= $donneesTableD2['T4_L4_N3']=='undefined'?'': $donneesTableD2['T4_L4_N3'] ?>"></td>
		</tr>
		<tr style="background-color:white;">
			<td>Evolution du ratio</td>
			<td><input type="Text" id="T4_L5_N1" size="20px" data-col="N1" value="<?= $donneesTableD2['T4_L5_N1']=='undefined'?'': $donneesTableD2['T4_L5_N1'] ?>"></td>
			<td><input type="Text" id="T4_L5_N2" size="20px" data-col="N2" value="<?= $donneesTableD2['T4_L5_N2']=='undefined'?'': $donneesTableD2['T4_L5_N2'] ?>"></td>
			<td><input type="Text" id="T4_L5_N3" size="20px" data-col="N3" value="<?= $donneesTableD2['T4_L5_N3']=='undefined'?'': $donneesTableD2['T4_L5_N3'] ?>"></td>
		</tr>
	</table>
</div>

