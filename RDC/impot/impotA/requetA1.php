<?php session_start();
	include '../../../connexion.php';//RA_COMPTE REGEXP '^((63)|(44[0-4])|(44[6-9]))' AND 
	$sql = "SELECT * FROM tab_ra WHERE RA_CYCLE = 'impot' AND MISSION_ID = '".$_SESSION['idMission']."' ORDER BY RA_COMPTE ASC";
	$rep = $bdd->query($sql);
	$rowCount = $rep->rowCount();

	if ($rowCount != 0){
	
		$i = 0;
		$compte = "";
		$libelle = "";
		$debit = 0;
		$credit = 0;
		$SoldeN = 0;
		$soldeN1 = 0;
		$variation = 0;
		$pourcentage = 0;
		$commentaire = "";

		echo "<table class='i1'>";
		while( $don = $rep->fetch() ){
			if($i == 0){
				$compte = $don['RA_COMPTE'];
				$libelle = $don['RA_LIBELLE'];
				$debit = $don['RA_D'];
				$credit = $don['RA_C'];
				$SoldeN = $don['RA_SOLDE_N'];
				$soldeN1 = $don['RA_SOLDE_N1'];
				$variation = $don['RA_VARIATION'];
				$pourcentage = $don['RA_POURCENTAGE'];
				$commentaire = $don['RA_COMMENTAIRE'];
				$i++; // Pour compter le nombre d'affichage
			}
			else{
				if($don['RA_COMPTE'] == $compte ){
					$libelle = $don['RA_LIBELLE'];
					$debit = $don['RA_D'];
					$credit = $don['RA_C'];
					$SoldeN = $don['RA_SOLDE_N'];
					$soldeN1 = $don['RA_SOLDE_N1'];
					$variation = $don['RA_VARIATION'];
					$pourcentage = $don['RA_POURCENTAGE'];
					$commentaire = $don['RA_COMMENTAIRE'];
				}
				else{
					echo '
						<tr>
							<td width="100px" id="compte'.$i.'">'.$compte.'</td>
							<td width="200px">'.$libelle.'</td>
							<td width="100px">'.number_format((double)$debit, 2, '.', ' ').'</td>
							<td width="100px">'.number_format((double)$credit, 2, '.', ' ').'</td>
							<td width="100px">'.number_format((double)$SoldeN, 2, '.', ' ').'</td>
							<td width="100px">'.number_format((double)$soldeN1, 2, '.', ' ').'</td>
							<td width="100px">'.number_format((double)$variation, 2, '.', ' ').'</td>
							<td width="100px">'.number_format((double)$pourcentage, 2, '.', ' ').'%</td>
							<td width="200px"><textarea id="cmt'.$i.'">'.$commentaire.'</textarea></td>
						</tr>';

						$i++; // Pour compter le nombre d'affichage
						$compte = $don['RA_COMPTE'];
						$libelle = $don['RA_LIBELLE'];
						$debit = $don['RA_D'];
						$credit = $don['RA_C'];
						$SoldeN = $don['RA_SOLDE_N'];
						$soldeN1 = $don['RA_SOLDE_N1'];
						$variation = $don['RA_VARIATION'];
						$pourcentage = $don['RA_POURCENTAGE'];
						$commentaire = $don['RA_COMMENTAIRE'];
				}
			}
		}
		echo '
			<tr>
				<td width="100px" id="compte'.$i.'">'.$compte.'</td>
				<td width="200px" style="max-width: 200px;color: green;">'.$libelle.'</td>
				<td width="100px">'.number_format((double)$debit, 2, '.', ' ').'</td>
				<td width="100px">'.number_format((double)$credit, 2, '.', ' ').'</td>
				<td width="100px">'.number_format((double)$SoldeN, 2, '.', ' ').'</td>
				<td width="100px">'.number_format((double)$soldeN1, 2, '.', ' ').'</td>
				<td width="100px">'.number_format((double)$variation, 2, '.', ' ').'</td>
				<td width="100px">'.number_format((double)$pourcentage, 2, '.', ' ').'%</td>
				<td width="200px"><textarea id="cmt'.$i.'">'.$commentaire.'</textarea></td>
			</tr>
		</table>
		<span id="compteur" alt="'.$i.'"></span>';
	}
?>
