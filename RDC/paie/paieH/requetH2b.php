<?php
	session_start();
	include '../../../connexion.php';

	$sql ="SELECT * FROM tab_elt_annexe WHERE MISSION_ID='".$_SESSION['idMission']."'";
	$req = $bdd->query($sql);
	$row = $req->rowCount();
	$i=0;

	if( $row != 0 ){
		$atl = $row + 1;
		echo '<table class="h9" id="ajout" alt="'.$atl.'">
				<tr class="sous-titre">
					<td>Nature</td>
					<td>Notes annexes</td>
				</tr>';
		while ( $don= $req->fetch() ) {
			$i++;
			echo'
				<tr>
					<td id="nat'.$i.'">'.$don['NATURE'].'</td>
					<td><textarea id="na'.$i.'">'.$don['ANNEXE'].'</textarea></td>
				</tr>
			';
		}
		echo '
				<tr>
					<td><textarea id="nat'.$atl.'" placeholder="Autre à mentioner"></textarea></td>
					<td><textarea id="na'.$atl.'"></textarea></td>
				</tr>
			</table>
			<input type="button" value="+" id="boutonAjout" class="bouton-pj" title="Ajout d\'une ligne" onclick="ajout();" />
			<input type="button" value="-" id="boutonSupr" class="bouton-pj"  title="Suppression de la dernière ligne" onclick="supp();" />';
	}
	else{
		echo'<table class="h9" id="ajout" alt="5">
				<tr class="sous-titre">
					<td>Nature</td>
					<td>Notes annexes</td>
				</tr>
				<tr>
					<td id="nat1">Détails des indemnités de départ à la retraite</td>
					<td><textarea id="na1"></textarea></td>
				</tr>
				<tr>
					<td id="nat2">Mode de calcul des indemnités de départ à la retraite</td>
					<td><textarea id="na2"></textarea></td>
				</tr>
				<tr>
					<td id="nat3">Effectif du personnel</td>
					<td><textarea id="na3"></textarea></td>
				</tr>
				<tr>
					<td id="nat4">Rénumérations des dirigeants</td>
					<td><textarea id="na4"></textarea></td>
				</tr>
				<tr>
					<td><textarea id="nat5" placeholder="Autre à mentioner"></textarea></td>
					<td><textarea id="na5"></textarea></td>
				</tr>
			</table>
			<input type="button" value="+" id="boutonAjout" class="bouton-pj" title="Ajout d\'une ligne" onclick="ajout();" />
			<input type="button" value="-" id="boutonSupr" class="bouton-pj"  title="Suppression de la dernière ligne" onclick="supp();" />';
	}
?>