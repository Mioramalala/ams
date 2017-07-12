<?php
	session_start();
	include '../../../connexion.php';

	$sql = "SELECT * FROM tab_cad_salaire_irsa WHERE  MISSION_ID=".$_SESSION['idMission'];
	$rep = $bdd->query($sql);
	$rowCount = $rep->rowCount();
	$i=0;

	if ( $rowCount != 0 ){
		echo '<table class="h6" id="ajout" alt="'.$rowCount.'">';
		
		while( $don=$rep->fetch() ){
			$i++;
			echo '	<tr id="ligne'.$i.'">
					<td width="200px"><input type="text" id="periode'.$i.'" value="'.$don['PERIODE'].'" /></td>
					<td width="200px"><input type="text" id="nbr'.$i.'" placeholder="0" value="'.$don['NBR_PRS'].'"/></td>
					<td width="200px"><input type="text" id="avt'.$i.'" value="'.$don['AVANTAGE_NATURE'].'" placeholder="0.00" onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)"/></td>
					<td width="200px"><input type="text" id="salaire'.$i.'" value="'.$don['SALAIRE_BRUT'].'" placeholder="0.00" onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)" /></td>
					<td width="200px"><input type="text" id="salaireT'.$i.'" value="'.$don['SALAIRE_TEMP'].'" placeholder="0.00"  onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)"/></td>
					<td width="200px" id="totalD'.$i.'">'.$don['TOTAL_DECLARE'].'</td>
					<td width="200px"><input type="text" id="irsa'.$i.'" value="'.$don['IRSA'].'" placeholder="0.00" onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)"/></td>
					<td width="200px"><input type="text" id="persT'.$i.'"  value="'.$don['PRS_TEMP'].'" placeholder="0" /></td>
				</tr>';
		}
		echo '</table>';
	}
	else{
		echo '<table class="h6" id="ajout" alt="1">
				<tr id="ligne1">
					<td width="200px"><input type="text" id="periode1"/></td>
					<td width="200px"><input type="text" id="nbr1" placeholder="0" /></td>
					<td width="200px"><input type="text" id="avt1" placeholder="0.00" onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)"/></td>
					<td width="200px"><input type="text" id="salaire1" placeholder="0.00" onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)" /></td>
					<td width="200px"><input type="text" id="salaireT1" placeholder="0.00"  onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)"/></td>
					<td width="200px" id="totalD1">0.00</td>
					<td width="200px"><input type="text" id="irsa1" placeholder="0.00" onkeyup="calculTotalH(this)" onkeydown="calculTotalH(this)"/></td>
					<td width="200px"><input type="text" id="persT1" placeholder="0" /></td>
				</tr>
		</table>';
	}

?>

<script type="text/javascript">



 

}
</script>