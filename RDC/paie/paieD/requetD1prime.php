<?php
	session_start();
	include '../../../connexion.php';

	$sql1 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'avantage nature' AND MISSION_ID='".$_SESSION['idMission']."'";
	$rep1 = $bdd->query($sql1);
	$rowCount1 = $rep1->rowCount();

	$sql2 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'salaires bruts' AND MISSION_ID='".$_SESSION['idMission']."'";
	$rep2 = $bdd->query($sql2);
	$rowCount2 = $rep2->rowCount();

	$sql3 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'salaires temporaires' AND MISSION_ID='".$_SESSION['idMission']."'";
	$rep3 = $bdd->query($sql3);
	$rowCount3 = $rep3->rowCount();

	$sql4 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'total salaire declare' AND MISSION_ID='".$_SESSION['idMission']."'";
	$rep4 = $bdd->query($sql4);
	$rowCount4 = $rep4->rowCount();

	$sql5 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'irsa' AND MISSION_ID='".$_SESSION['idMission']."'";
	$rep5 = $bdd->query($sql5);
	$rowCount5 = $rep5->rowCount();

	if ( ($rowCount1 != 0) && ($rowCount2 != 0) && ($rowCount3 != 0) && ($rowCount4 != 0) ){
		$don1=$rep1->fetch();
		$don2=$rep2->fetch();
		$don3=$rep3->fetch();
		$don4=$rep4->fetch();
		$don5=$rep5->fetch();

			echo '<table class="h6">
					<tr>
						<td width="200px">Total (1)</td>
						<td width="200px" id="totalnbr"></td>
						<td width="200px" id="totalavt">'.$don1['TOTAL'].'</td>
						<td width="200px" id="totalsalaire">'.$don2['TOTAL'].'</td>
						<td width="200px" id="totalsalaireT">'.$don3['TOTAL'].'</td>
						<td width="200px" id="totaltotalD">'.$don4['TOTAL'].'</td>
						<td width="200px" id="totalirsa">'.$don5['TOTAL'].'</td>
						<td width="200px" id="totalpersT"></td>
					</tr>
					<tr>
						<td width="200px">Comptabilté (2)</td>
						<td width="200px"></td>
						<td width="200px"><input type="text" value="'.$don1['COMPTA'].'" id="Comptavt" onkeyup="calculEcart(this)" onkeydown="calculEcart(this)" /></td>
						<td width="200px"><input type="text" value="'.$don2['COMPTA'].'" id="Comptsalaire" onkeyup="calculEcart(this)" onkeydown="calculEcart(this)" /></td>
						<td width="200px"><input type="text" value="'.$don3['COMPTA'].'" id="ComptsalaireT" onkeyup="calculEcart(this)" onkeydown="calculEcart(this)" /></td>
						<td width="200px"><input type="text" value="'.$don4['COMPTA'].'" id="CompttotalD" onkeyup="calculEcart(this)" onkeydown="calculEcart(this)" /></td>
						<td width="200px"><input type="text" value="'.$don5['COMPTA'].'" id="Comptirsa" onkeyup="calculEcart(this)" onkeydown="calculEcart(this)" /></td>
						<td width="200px"></td>
					</tr>
					<tr>
						<td width="200px">Ecart (1)-(2)</td>
						<td width="200px" id="ecartnbr"></td>
						<td width="200px" id="ecartavt">'.$don1['ECART'].'</td>
						<td width="200px" id="ecartsalaire">'.$don2['ECART'].'</td>
						<td width="200px" id="ecartsalaireT">'.$don3['ECART'].'</td>
						<td width="200px" id="ecarttotalD">'.$don4['ECART'].'</td>
						<td width="200px" id="ecartirsa">'.$don5['ECART'].'</td>
						<td width="200px" id="ecartpersT"></td>
					</tr>
				</table>';
	}
	else{
		echo '<table class="h6">
					<tr>
						<td width="200px">Total (1)</td>
						<td width="200px" id="totalnbr"></td>
						<td width="200px" id="totalavt">0.00</td>
						<td width="200px" id="totalsalaire">0.00</td>
						<td width="200px" id="totalsalaireT">0.00</td>
						<td width="200px" id="totaltotalD">0.00</td>
						<td width="200px" id="totalirsa">0.00</td>
						<td width="200px" id="totalpersT"></td>
					</tr>
					<tr>
						<td width="200px">Comptabilté (2)</td>
						<td width="200px"></td>
						<td width="200px"><input type="text" id="Comptavt" onkeyup="calculEcart(this)" onkeydown="calculEcart(this)" /></td>
						<td width="200px"><input type="text" id="Comptsalaire" onkeyup="calculEcart(this)" onkeydown="calculEcart(this)" /></td>
						<td width="200px"><input type="text" id="ComptsalaireT" onkeyup="calculEcart(this)" onkeydown="calculEcart(this)" /></td>
						<td width="200px"><input type="text" id="CompttotalD" onkeyup="calculEcart(this)" onkeydown="calculEcart(this)" /></td>
						<td width="200px"><input type="text" id="Comptirsa" onkeyup="calculEcart(this)" onkeydown="calculEcart(this)" /></td>
						<td width="200px"></td>
					</tr>
					<tr>
						<td width="200px">Ecart (1)-(2)</td>
						<td width="200px" id="ecartnbr"></td>
						<td width="200px" id="ecartavt">0.00</td>
						<td width="200px" id="ecartsalaire">0.00</td>
						<td width="200px" id="ecartsalaireT">0.00</td>
						<td width="200px" id="ecarttotalD">0.00</td>
						<td width="200px" id="ecartirsa">0.00</td>
						<td width="200px" id="ecartpersT"></td>
					</tr>
				</table>';
	}

?>