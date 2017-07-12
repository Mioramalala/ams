<?php session_start();
	include '../../../connexion.php';
	$sql = "SELECT * FROM tab_importer WHERE IMPORT_COMPTES REGEXP '^((42)|(43)|(442IRSA))' ORDER BY IMPORT_COMPTES ASC";
	$rep = $bdd->query($sql);
	$rowCount = $rep->rowCount();
	if ($rowCount != 0){
	
		$i = 0;
		$compte = "";
		$libelle = "";
		$motant = 0;
		$budget = 0;
		$ecart = 0;
		$commentaire = "";

		echo "<table class='h2'>";
		while( $don = $rep->fetch() ){
			if($i == 0){
				$compte = $don['IMPORT_COMPTES'];
				$libelle = $don['IMPORT_INTITULES'];
				$motant = $don['IMPORT_SOLDE'];
				$budget = 0;
				$ecart = 0;
				$commentaire = "" /*$don['RA_COMMENTAIRE'];*/;
				$i++;
			}
			else{
				if($don['IMPORT_COMPTES'] == $compte ){
					$libelle = $don['IMPORT_INTITULES'];
					$motant = $don['IMPORT_SOLDE'];
					$budget = 0;
					$ecart = 0;
					$commentaire = "" /*$don['RA_COMMENTAIRE'];*/;
				}
				else{
					echo '
						<tr>
							<td width="200px" id="compte'.$i.'">'.$compte.'</td>
							<td width="200px" id="libelle'.$i.'">'.$libelle.'</td>
							<td width="200px" id="montant'.$i.'">'.number_format((double)$montant, 2, '.', ' ').'</td>
							<td width="200px"><input id="budget'.$i.'" onKeydown="calculEcart(this)" onKeyup="calculEcart(this)" /></td>
							<td width="200px" id="ecart'.$i.'">'.number_format((double)$ecart, 2, '.', ' ').'</td>
							<td width="200px"><textarea id="cmt'.$i.'">'.$commentaire.'</textarea></td>
						</tr>';
						$compte = $don['IMPORT_COMPTES'];
						$libelle = $don['IMPORT_INTITULES'];
						$motant = $don['IMPORT_SOLDE'];
						$budget = 0;
						$ecart = 0;
						$commentaire = "" /*$don['RA_COMMENTAIRE'];*/;
						$i++;
				}
			}
		}
		echo '
			<tr>
				<td width="200px" id="compte'.$i.'">'.$compte.'</td>
				<td width="200px" id="libelle'.$i.'">'.$libelle.'</td>
				<td width="200px" id="montant'.$i.'">'.number_format((double)$montant, 2, '.', ' ').'</td>
				<td width="200px"><input id="budget'.$i.'" onKeydown="calculEcart(this)" onKeyup="calculEcart(this)" /></td>
				<td width="200px" id="ecart'.$i.'">'.number_format((double)$ecart, 2, '.', ' ').'</td>
				<td width="200px"><textarea id="cmt'.$i.'">'.$commentaire.'</textarea></td>
			</tr>
		</table>
		<span id="compteur" alt="'.$i.'"></span>';
	}
?>
