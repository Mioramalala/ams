<?php
	session_start();
	include '../../../connexion.php';

	$sql ="SELECT * FROM tab_rdc_cf_f10 WHERE MISSION_ID='".$_SESSION['idMission']."'";
	$req = $bdd->query($sql);
	$row = $req->rowCount();
	$i=0;

	if( $row != 0 ){
		$atl = $row + 1;
		echo '<table width="100%" bgcolor="#6495ED">
				<tr class="tr_table_text_entete">
					<td width="30%">Nature</td>
					<td width="35%">Notes annexes</td>
					<td width="35%">Commentaires</td>
				</tr>
			</table>
			<div style="height:375px;overflow-y:auto;">
				<table  width="100%" bgcolor="#6495ED" alt="'.$atl.'" id="ajout">';
		while ( $don= $req->fetch() ) {
			$i++;
			echo'
				<tr class="tr_table_text_champ">
					<td bgcolor="#ccc" id="nat'.$i.'" width="30%">'.$don['NATURE'].'</td>
					<td>
						<select id="na'.$i.'">
							<option value="oui">oui</option>
							<option value="N/A">N/A</option>
							<option value="non">non</option>
						</select>
					</td>
					<td><textarea id="cmnt'.$i.'" width="35%">'.$don['COMMENTAIRE'].'</textarea></td>
				</tr>
			';
		}
		echo '
				<tr class="tr_table_text_champ">
					<td bgcolor="#ccc" bgcolor="#ccc"><textarea id="nat'.$atl.'" placeholder="Autre à mentioner"></textarea></td>
					<td><textarea id="na'.$atl.'"></textarea></td>
					<td><textarea id="cmnt'.$atl.'"></textarea></td>
				</tr>
			</table>
			</div>
			<input type="button" value="+" id="boutonAjout" class="bouton-pj" title="Ajout d\'une ligne" onclick="ajout();" />
			<input type="button" value="-" id="boutonSupr" class="bouton-pj"  title="Suppression de la dernière ligne" onclick="supp();" />';
	}
	else{
		echo'<table width="100%" bgcolor="#6495ED">
				<tr class="tr_table_text_entete">
					<td width="30%">Nature</td>
					<td width="35%">Notes annexes</td>
					<td width="35%">Commentaires</td>
				</tr>
			</table>
			<div style="height:375px;overflow-y:auto;">
			<table  width="100%" bgcolor="#6495ED" alt="5" id="ajout">
				<tr class="tr_table_text_champ">
					<td id="nat1" bgcolor="#ccc" width="30%">Détails des indemnités de départ à la retraite</td>
					<td>
						<select id="na1">
							<option value=""></option>
							<option value="oui">oui</option>
							<option value="N/A">N/A</option>
							<option value="non">non</option>
						</select>
					</td>
					<td><textarea id="cmnt1" width="35%"></textarea></td>
				</tr>
				<tr class="tr_table_text_champ">
					<td id="nat2" bgcolor="#ccc" width="30%">Mode de calcul des indemnités de départ à la retraite</td>
					<td>
						<select id="na2">
							<option value=""></option>
							<option value="oui">oui</option>
							<option value="N/A">N/A</option>
							<option value="non">non</option>
						</select>
					</td>
					<td><textarea id="cmnt2" width="35%"></textarea></td>
				</tr>
				<tr class="tr_table_text_champ">
					<td id="nat3" bgcolor="#ccc" width="30%">Effectif du personnel</td>
					<td>
						<select id="na3">
							<option value=""></option>
							<option value="oui">oui</option>
							<option value="N/A">N/A</option>
							<option value="non">non</option>
						</select>
					</td>
					<td><textarea id="cmnt3" width="35%"></textarea></td>
				</tr>
				<tr class="tr_table_text_champ">
					<td id="nat4" bgcolor="#ccc" width="30%">Rénumérations des dirigeants</td>
					<td>
						<select id="na4" width="35%"></>
							<option value=""></option>
							<option value="oui">oui</option>
							<option value="N/A">N/A</option>
							<option value="non">non</option>
						</select>
					</td>
					<td><textarea id="cmnt4" width="35%"></textarea></td>
				</tr>
				<tr class="tr_table_text_champ">
					<td><textarea id="nat5" width="30%"placeholder="Autre à mentioner"></textarea></td>
					<td>
						<select id="na5">
							<option value=""></option>
							<option value="oui">oui</option>
							<option value="N/A">N/A</option>
							<option value="non">non</option>
						</select>
					</td>
					<td><textarea id="cmnt5" width="35%"></textarea></td>
				</tr>
			</table>
			</div>
			<input type="button" value="+" id="boutonAjout" class="bouton-pj" title="Ajout d\'une ligne" onclick="ajout();" />
			<input type="button" value="-" id="boutonSupr" class="bouton-pj"  title="Suppression de la dernière ligne" onclick="supp();" />';
	}
?>