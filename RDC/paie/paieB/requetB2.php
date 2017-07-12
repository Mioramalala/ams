<?php session_start();
	include '../../../connexion.php';
	
	$rep = $bdd->query("SELECT * FROM tab_recapassurance WHERE MISSION_ID='".$_SESSION['idMission']."'");
	$rowCount = $rep->rowCount();

	if ($rowCount != 0){
		$i=0;
		echo "<table class='h4' id='ajout' alt='".$rowCount."'>";
		while( $don = $rep->fetch() ){
			$i++;
			echo '<tr id="ligne'.$i.'">
					<td width="200px"><input type="text" placeholder="jj-mm-aaaa" value="'.$don['RAS_DATE'].'" id="date'.$i.'"/></td>
					<td width="200px"><textarea id="police'.$i.'">'.$don['RAS_POLICE'].'</textarea></td>
					<td width="200px"><textarea id="nature'.$i.'">'.$don['RAS_NATURE'].'</textarea></td>
					<td width="200px"><input type="text" id="montant'.$i.'" value="'.$don['RAS_MONTANT'].'" /></td>
					<td width="200px">
						<iframe style="display:none;" name="uploadFrame'.$i.'"></iframe>
						<form enctype="multipart/form-data" action="RDC/paie/paieB/TabDB2PP.php" method="POST" id="form'.$i.'" target="uploadFrame'.$i.'">
							<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
							<input type="file" id="fichier'.$i.'" name="fichier"/>
							<input id="submit'.$i.'" type="submit" value="Upload" />
						</form>
					</td>
					<td width="200px"><textarea id="comment'.$i.'">'.$don['RAS_CMT'].'</textarea></td>
				</tr>';
		}
		echo '</table>';
	}
	else{
		echo '<table class="h4" id="ajout" alt="1">
				<tr id="ligne1">
					<td width="200px"><input type="text" placeholder="jj-mm-aaaa" id="date1"/></td>
					<td width="200px"><textarea id="police1"></textarea></td>
					<td width="200px"><textarea id="nature1"></textarea></td>
					<td width="200px"><input type="text" id="montant1" /></td>
					<td width="200px">
						<iframe style="display:none;" name="uploadFrame1"></iframe>
						<form enctype="multipart/form-data" action="RDC/paie/paieB/TabDB2PP.php" method="POST" id="form1" target="uploadFrame1">
							<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
							<input type="file" id="fichier1" name="fichier"/>
							<input id="submit1" type="submit" value="Upload" />
						</form>
					</td>
					<td width="200px"><textarea id="comment1"></textarea></td>
				</tr>
			</table>';
	}
?>