<?php
	session_start();
	include '../../../connexion.php';

	$req=$bdd->query("SELECT * FROM tab_cad_salaire_smids WHERE MISSION_ID='".$_SESSION['idMission']."' ORDER BY PERIODE ASC");
	$rowCount = $req->rowCount();

	$i=0;

	if( $rowCount != 0 ){
		echo '<table class="h7">
					<tr class="sous-titre">
						<td width="200px">Période</td>
						<td width="200px">Salalaires Non Plafonnés</td>
						<td width="200px">Part employés (1%)</td>
						<td width="200px">Part employeur (5%)</td>
						<td width="200px">Total</td>
					</tr>';
		while( $don=$req->fetch() ){
			$i++;
			echo'<tr>
					<td id="PS'.$i.'">'.$don['PERIODE'].'</td>
					<td><input type="text" value="'.$don['SNP'].'" placeholder="0.00" onkeyup="ecartByName(\'comptNPSMIDS\');partEmployeSmids(this,1,5)" onkeydown="ecartByName(\'comptNPSMIDS\');partEmployeSmids(this,1,5)" id="NPSMIDS'.$i.'"/></td>
					<td id="PESMIDS1T'.$i.'">'.$don['PE1'].'</td>
					<td id="PESMIDS5T'.$i.'">'.$don['PE5'].'</td>
					<td id="TPET'.$i.'">'.$don['TOTAL'].'</td>
				</tr>';
		}
		$sql1 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'smids_salaire_non_plafonees' AND MISSION_ID=".$_SESSION['idMission'];
		$rep1 = $bdd->query($sql1);
		$don1 = $rep1->fetch();

		$sql2 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'smids_pe1' AND MISSION_ID=".$_SESSION['idMission'];
		$rep2 = $bdd->query($sql2);
		$don2 = $rep2->fetch();

		$sql3 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'smids_pe5' AND MISSION_ID=".$_SESSION['idMission'];
		$rep3 = $bdd->query($sql3);
		$don3 = $rep3->fetch();

		$sql4 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'smids_total' AND MISSION_ID=".$_SESSION['idMission'];
		$rep4 = $bdd->query($sql4);
		$don4 = $rep4->fetch();
		echo '<tr>
						<td><b>TOTAL (1)</b></td>
						<td id="totalNPSMIDS">'.$don1['TOTAL'].'</td>
						<td id="totalPESMIDS1">'.$don2['TOTAL'].'</td>
						<td id="totalPESMIDS5">'.$don3['TOTAL'].'</td>
						<td id="totalTPE">'.$don4['TOTAL'].'</td>
					</tr>
					<tr>
						<td><b>Comptabilité (2)</b></td>
						<td><input type="text" value="'.$don1['COMPTA'].'" id="comptNPSMIDS" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" value="'.$don2['COMPTA'].'" id="comptPESMIDS1" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" value="'.$don3['COMPTA'].'" id="comptPESMIDS5" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" value="'.$don4['COMPTA'].'" id="comptTPE" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
					</tr>
					<tr>
						<td><b>Ecart (1)-(2)</b></td>
						<td id="ecartNPSMIDS">'.$don1['ECART'].'</td>
						<td id="ecartPESMIDS1">'.$don2['ECART'].'</td>
						<td id="ecartPESMIDS5">'.$don3['ECART'].'</td>
						<td id="ecartTPE">'.$don4['ECART'].'</td>
					</tr>
			</table>';
	}
	else{
		echo '<table class="h7">
					<tr class="sous-titre">
						<td width="200px">Période</td>
						<td width="200px">Salalaires Non Plafonnés</td>
						<td width="200px">Part employés (1%)</td>
						<td width="200px">Part employeur (5%)</td>
						<td width="200px">Total</td>
					</tr>
					<tr>
						<td id="PS1">Trimestre 1</td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptNPSMIDS\');partEmployeSmids(this,1,5)" onkeydown="ecartByName(\'comptNPSMIDS\');partEmployeSmids(this,1,5)" id="NPSMIDS1"/></td>
						<td id="PESMIDS1T1">0.00</td>
						<td id="PESMIDS5T1">0.00</td>
						<td id="TPET1">0.00</td>
					</tr>
					<tr>
						<td id="PS2">Trimestre 2</td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptNPSMIDS\');partEmployeSmids(this,1,5)" onkeydown="ecartByName(\'comptNPSMIDS\');partEmployeSmids(this,1,5)"id="NPSMIDS2"/></td>
						<td id="PESMIDS1T2">0.00</td>
						<td id="PESMIDS5T2">0.00</td>
						<td id="TPET2">0.00</td>
					</tr>
					<tr>
						<td id="PS3">Trimestre 3</td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptNPSMIDS\');partEmployeSmids(this,1,5)" onkeydown="ecartByName(\'comptNPSMIDS\');partEmployeSmids(this,1,5)"id="NPSMIDS3"/></td>
						<td id="PESMIDS1T3">0.00</td>
						<td id="PESMIDS5T3">0.00</td>
						<td id="TPET3">0.00</td>
					</tr>
					<tr>
						<td id="PS4">Trimestre 4</td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptNPSMIDS\');partEmployeSmids(this,1,5)" onkeydown="ecartByName(\'comptNPSMIDS\');partEmployeSmids(this,1,5)"id="NPSMIDS4"/></td>
						<td id="PESMIDS1T4">0.00</td>
						<td id="PESMIDS5T4">0.00</td>
						<td id="TPET4">0.00</td>
					</tr>
					<tr>
						<td><b>TOTAL (1)</b></td>
						<td id="totalNPSMIDS">0.00</td>
						<td id="totalPESMIDS1">0.00</td>
						<td id="totalPESMIDS5">0.00</td>
						<td id="totalTPE">0.00</td>
					</tr>
					<tr>
						<td><b>Comptabilité (2)</b></td>
						<td><input type="text" id="comptNPSMIDS" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" id="comptPESMIDS1" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" id="comptPESMIDS5" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" id="comptTPE" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
					</tr>
					<tr>
						<td><b>Ecart (1)-(2)</b></td>
						<td id="ecartNPSMIDS">0.00</td>
						<td id="ecartPESMIDS1">0.00</td>
						<td id="ecartPESMIDS5">0.00</td>
						<td id="ecartTPE">0.00</td>
					</tr>
			</table>';
	}
?>