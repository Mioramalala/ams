<?php session_start();
	include '../../../connexion.php';
	$sql = "SELECT * FROM tab_ra WHERE RA_COMPTE REGEXP '^(42)' ORDER BY RA_COMPTE ASC";
	$rep = $bdd->query($sql);
	$rowCount = $rep->rowCount();

	if ($rowCount != 0){
	
		$i = 0;
		$compte = "";
		$libelle = "";
		$debit = 0;
		$credit = 0;
		$SDN = 0;
		$SCN = 0;
		$SDN1 = 0;
		$SCN1 = 0;
		$variation = 0;
		$pourcentage = 0;
		$commentaire = "";

		echo "<table class='h1'>";
		while( $don = $rep->fetch() ){
			if($i == 0){
				$compte = $don['RA_COMPTE'];
				$libelle = $don['RA_LIBELLE'];
				$debit = $don['RA_D'];
				$credit = $don['RA_C'];
				$SDN = $don['RA_SD_N'];
				$SCN = $don['RA_SC_N'];
				$SDN1 = $don['RA_SD_N1'];
				$SCN1 = $don['RA_SC_N1'];
				$variation = ($don['RA_SD_VARIATION'] + $don['RA_SC_VARIATION'])/2;
				$pourcentage = ($don['RA_POURCENTAGE_C'] + $don['RA_POURCENTAGE_D'])/2;
				$commentaire = $don['RA_COMMENTAIRE'];
				$i++; // Pour compter le nombre d'affichage
			}
			else{
				if($don['RA_COMPTE'] == $compte ){
					$libelle = $don['RA_LIBELLE'];
					$debit = $don['RA_D'];
					$credit = $don['RA_C'];
					$SDN = $don['RA_SD_N'];
					$SCN = $don['RA_SC_N'];
					$SDN1 = $don['RA_SD_N1'];
					$SCN1 = $don['RA_SC_N1'];
					$variation = ($don['RA_SD_VARIATION'] + $don['RA_SC_VARIATION'])/2;
					$pourcentage = ($don['RA_POURCENTAGE_C'] + $don['RA_POURCENTAGE_D'])/2;
					$commentaire = $don['RA_COMMENTAIRE'];
				}
				else{
					echo '
						<tr>
							<td width="100px" id="compte'.$i.'">'.$compte.'</td>
							<td width="200px">'.$libelle.'</td>
							<td width="100px">'.$debit.'</td>
							<td width="100px">'.$credit.'</td>
							<td width="100px">'.$SDN.'</td>
							<td width="100px">'.$SCN.'</td>
							<td width="100px">'.$SDN1.'</td>
							<td width="100px">'.$SCN1.'</td>
							<td width="100px">'.$variation.'</td>
							<td width="100px">'.$pourcentage.'</td>
							<td width="200px"><textarea id="cmt'.$i.'">'.$commentaire.'</textarea></td>
						</tr>';

						$i++; // Pour compter le nombre d'affichage
						$compte = $don['RA_COMPTE'];
						$libelle = $don['RA_LIBELLE'];
						$debit = $don['RA_D'];
						$credit = $don['RA_C'];
						$SDN = $don['RA_SD_N'];
						$SCN = $don['RA_SC_N'];
						$SDN1 = $don['RA_SD_N1'];
						$SCN1 = $don['RA_SC_N1'];
						$variation = ($don['RA_SD_VARIATION'] + $don['RA_SC_VARIATION'])/2;
						$pourcentage = ($don['RA_POURCENTAGE_C'] + $don['RA_POURCENTAGE_D'])/2;
						$commentaire = $don['RA_COMMENTAIRE'];
				}
			}
		}
		echo '
			<tr>
				<td width="100px" id="compte'.$i.'">'.$compte.'</td>
				<td width="200px" style="max-width: 200px;color: green;">'.$libelle.'</td>
				<td width="100px">'.$debit.'</td>
				<td width="100px">'.$credit.'</td>
				<td width="100px">'.$SDN.'</td>
				<td width="100px">'.$SCN.'</td>
				<td width="100px">'.$SDN1.'</td>
				<td width="100px">'.$SCN1.'</td>
				<td width="100px">'.$variation.'</td>
				<td width="100px">'.$pourcentage.'</td>
				<td width="200px"><textarea id="cmt'.$i.'">'.$commentaire.'</textarea></td>
			</tr>
		</table>
		<span id="compteur" alt="'.$i.'"></span>';
	}
?>
