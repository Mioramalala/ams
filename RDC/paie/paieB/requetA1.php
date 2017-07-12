<?php session_start();
	include '../../../connexion.php';//RA_CYCLE = 'paie
	//SELECT year, SUM(profit) FROM sales GROUP BY year;
	$idMission = 0;
	$sqlTest = "SELECT * FROM tab_ra WHERE RA_COMPTE REGEXP '^((64)|(42)|(43)|(442IRSA))' AND MISSION_ID = '".$_SESSION['idMission']."'";
	
	$repTest = $bdd->query($sqlTest);
	$ligneTest = $repTest->rowCount();
	if($ligneTest!=0) $idMission=$_SESSION['idMission'];

	$sql = "SELECT *,SUM(RA_SOLDE_N) AS RA_SOLDE_N,SUM(RA_SOLDE_N1) AS RA_SOLDE_N1,SUM(RA_D) AS DEBIT,SUM(RA_C) AS CREDIT,SUM(RA_VARIATION) AS RA_VARIATION,SUM(RA_POURCENTAGE) AS RA_POURCENTAGE FROM tab_ra WHERE RA_COMPTE REGEXP '^((64)|(42)|(43)|(442IRSA))' AND MISSION_ID = '".$idMission."' GROUP BY RA_COMPTE ORDER BY RA_COMPTE ASC";
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

		echo "<tr class="sous-titre">
						<td width="100px">Compte</td>
						<td width="200px">Libellé</td>
						<td width="100px">Débits</td>
						<td width="100px">Crédits</td>
						<td width="200px">Soldes N</td>
						<td width="200px">Soldes N-1</td>
						<td width="100px">Variation</td>
						<td width="100px">Pourcentage</td>
						<td width="200px">Commentaires</td>
					</tr>";
		while( $don = $rep->fetch() ){
			$i++;
			$compte = $don['RA_COMPTE'];
			$libelle = $don['RA_LIBELLE'];
			$debit = $don['DEBIT'];
			$credit = $don['CREDIT'];
			$SoldeN = $don['RA_SOLDE_N'];
			$soldeN1 = $don['RA_SOLDE_N1'];
			$variation = $don['RA_VARIATION'];
			$pourcentage = $don['RA_POURCENTAGE'];
			$commentaire = $don['RA_COMMENTAIRE'];
					
			echo '

				<style>
					td{text-align:left;}
				</style>

				<tr>
				<td width="100px" id="compte'.$i.'">'.$compte.'</td>
				<td width="200px">'.$libelle.'</td>
				<td width="100px">'.number_format((double)$debit, 2, '.', ' ').'</td>
				<td width="100px">'.number_format((double)$credit, 2, '.', ' ').'</td>
				<td width="200px">'.number_format((double)$SoldeN, 2, '.', ' ').'</td>
				<td width="200px">'.number_format((double)$soldeN1, 2, '.', ' ').'</td>
				<td width="100px">'.number_format((double)$variation, 2, '.', ' ').'</td>
				<td width="100px">'.number_format((double)$pourcentage, 2, '.', ' ').'%</td>
				<td width="200px"><textarea id="cmt'.$i.'">'.$commentaire.'</textarea></td>
			</tr>';
		}
		echo '
		</table>
		<span id="compteur" alt="'.$i.'"></span>';
	}
?>
