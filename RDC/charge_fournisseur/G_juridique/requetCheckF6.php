<?php
	@session_start();
	include '../../../connexion.php';
//POINTAGE; REGULARITE_PJ; OBSERVATION
	if( isset($_POST['tabCompte']) && isset($_POST['tabLibelle']) ){
		$tabCompte = $_POST['tabCompte'];
		$tabLibelle = $_POST['tabLibelle'];
		$tabNum = $_POST['tabNum'];
		$obs = '';

		echo '<div class="titreSelect">Vérification de l\'éxhaustivité/Régularité des enregistrements.</div>
			<div class="contentTab">
				<table style="width:1500px;color:white;background-color:#025387;">
					<tr style="font-size:9pt;font-weight:bold;">
						<td width="200px" style="text-align: center;border:0;">Compte</td>
						<td width="100px" style="text-align: center;border:0;">Date</td>
						<td width="300px" style="text-align: center;border:0;">Libellé</td>
						<td width="200px" style="text-align: center;border:0;">Débit</td>
						<td width="200px" style="text-align: center;border:0;">Crédit</td>
						<td width="100px" style="text-align: center;border:0;">Pointage</td>
						<td width="200px" style="text-align: center;border:0;">Régularités des PJ</td>
						<td width="200px" style="text-align: center;border:0;">Observations</td>
					</tr>
				</table>
				<div class="contentAfterCheckTab">
				<table id="tabPostChecked" alt="'.count($tabCompte).'" style="width:1500px;">';

		for($i=0; $i<count($tabCompte); $i++){
			$reponse = $bdd->query('SELECT * FROM tab_f6 WHERE COMPTE = "'.$tabCompte[$i].'" AND LIBELLE = "'.$tabLibelle[$i].'" AND MISSION_ID="'.$_SESSION['idMission'].'"');
			$ligne = $reponse->rowCount();

			if( $ligne != 0 ){
				$donnees = $reponse->fetch();
				$obs = $donnees['OBSERVATION'];
			}
			else{
				$reponse2 = $bdd->query('SELECT * FROM tab_f6 WHERE COMPTE = "'.$tabCompte[$i].'" AND LIBELLE = "'.$tabLibelle[$i].'" AND MISSION_ID=""');
				$donnees = $reponse2->fetch();
			}
			$j = $i+1;
			echo "<tr>
					<td width='200px' height='40px' id='compte".$j."' alt='".$tabNum[$i]."''>".$tabCompte[$i]."</td>
					<td width='100px' height='40px'>".$donnees['DATY']."</td>
					<td width='300px' height='40px' id='libelle".$j."'>".$tabLibelle[$i]."</td>
					<td width='200px' height='40px' style='text-align:right;'>".number_format($donnees['DEBIT'], 2,'.',' ')."</td>
					<td width='200px' height='40px' style='text-align:right;'>".number_format($donnees['CREDIT'], 2,'.',' ')."</td>
					<td width='100px' height='40px'>".$donnees['POINTAGE']."</td>
					<td width='200px' height='40px'>".$donnees['REGULARITE_PJ']."</td>
					<td width='200px' height='40px'><textarea id='obs".$j."'>".$obs."</textarea></td>
				</tr>";
		}
			echo '</table>
				</div>
			</div>';
	}
	else{
		echo '<div class="titreSelect">Vérification de l\'éxhaustivité/Régularité des enregistrements.</div>
			<div class="contentTab">
					<center><h4 style="color:red;">Vous n\'avez rien séléctionné dans le tableau d\'échantillonnages.</h4></center>
			</div>';
	}

?>