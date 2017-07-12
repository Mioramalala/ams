<?php
	@session_start();
	include '../connexion.php';

	$synthese = $risque = '';

	$req = $bdd->query(" SELECT SYNTHESE,RISQUE FROM tab_synthese_rsci WHERE CYCLE = 'tresorerie' AND MISSION_ID =".$_SESSION['idMission']." ");
	$ligne = $req->rowCount();

	if( $ligne != 0 ){
		$donnee = $req->fetch();
		$synthese = $donnee['SYNTHESE'];
		$risque = $donnee['RISQUE'];
	}
?>
<script type="text/javascript">
	$(function(){
		$('#HideSynth').click(function(){
			$('#ContentSynthAchat').hide();
			$('#contRsciDepense').show();
		});
		$('#SaveSynth').click(function(){
			var synthese = $('#ValueSynth').val();
			var risque = $('input[name="risque"]:checked').val();

			$.ajax({
				type:'POST',
				url:'cycleDepense/saveSynthese.php',
				data:{synthese:synthese,risque:risque},
				success:function(e){
					$('#ContentSynthAchat').hide();
					$('#contRsciDepense').show();
				}
			});
		});
	});
</script>
<?php
	$objectifs = array('A. Séparation de fonction','B. Exhaustivité','C. Correspondance','D. Evaluation','E. Imputation','A. Séparation de fonction','B. Exhaustivité','C. Correspondance','D. Evaluation','E. Imputation');
	// $tad = array(20,21,22,23,24,25,26,27,28,29);
	$scores = $risques = $comments = array();
	
	//$cycle = array(1000, 18, 19, 20, 21, 10000, 22, 23, 24, 25); 
	$cycle = array(100, 18, 19, 20, 21, 1000000, 22, 23, 24, 25); 
	// tinay editer 10000 represente paie A, pour Depense A c'est 1000000 et 1000 est inconnu.
	foreach ($cycle as $cycleId) {
		// $requete = $bdd->query('SELECT concl.* ,synth.SCORE FROM tab_synthese AS synth, tab_conclusion AS concl WHERE concl.MISSION_ID  = '.$_SESSION['idMission'].' AND synth.MISSION_ID = '.$_SESSION['idMission'].' AND concl.CYCLE_ACHAT_ID= '.$i.' AND synth.CYCLE_ACHAT_ID = '.$i.'');
		$requete = $bdd->query('SELECT SCORE,SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID='.$cycleId.'');
		
		$lignes = $requete->rowCount();
		if( $lignes != 0){
			$donnee = $requete->fetch();
			array_push($scores, $donnee['SCORE']);
			array_push($comments, $donnee['SYNTHESE_COMMENTAIRE']);
			array_push($risques, $donnee['SYNTHESE_RISQUE']);
		}
		else{
			array_push($scores, '0');
			array_push($comments, '');
			array_push($risques, '');
		}
	}
?>
<div id="RsciSynth">
	<div id="titreSyntheseRsci">Synthèse du cycle Trésorerie</div>
	<div id="synthDeuxTier">
		<table>
			<thead>
				<tr>
					<th width="20%">Objectifs</th>
					<th width="10%">Scores</th>
					<th width="10%">Risques</th>
					<th width="60%">Commentaires</th>
				</tr>
			</thead>
			<tbody>
				<tr class="sousTitre">
					<td colspan="4">Cycle trésorerie recettes</td>
				</tr>
			</tbody>
		</table>
		<div class="content">
			<table width="100%">
				<?php
					$couleur = "";
					$scores[0] = "-";
					for ($i=0; $i < 5 ; $i++) {
						$couleur = ($i%2 == 0) ? 'FFF' : '8FA3AD';
						echo'
							<tr style="background-color: #'.$couleur.';">
								<td style="text-align:center;width:20%;">'.$objectifs[$i].'</td>
								<td style="text-align:center;width:10%;">'.$scores[$i].'</td>
								<td style="text-align:center;width:10%;">'.$risques[$i].'</td>
								<td style="font-size: 8pt;width:60%;">'.$comments[$i].'</td>
							</tr>
						';
					}
				?>
			</table>
		</div>
		<table>
			<tr class="sousTitre">
				<td colspan="4">Cycle trésorerie dépenses</td>
			</tr>
		</table>
		</table>
		<div class="content">
			<table width="100%">
			<?php
					$couleur = "";
					$scores[5] = "-";
					for ($i=5; $i < 10 ; $i++) {
						$couleur = ($i%2 == 0) ? 'FFF' : '8FA3AD';
						echo'
							<tr style="background-color: #'.$couleur.';">
								<td style="text-align:center;width:20%;">'.$objectifs[$i].'</td>
								<td style="text-align:center;width:10%;">'.$scores[$i].'</td>
								<td style="text-align:center;width:10%;">'.$risques[$i].'</td>
								<td style="font-size: 8pt;width:60%;">'.$comments[$i].'</td>
							</tr>
						';
					}
				?>
				
			</table>
		</div>
	</div>
	<div id="synthUnTier">
		<input type="button" class="bouton" value="Retour" id="HideSynth"/>
		<input type="button" class="bouton" value="Enregistrer" id="SaveSynth"/><br />
		<table>
			<thead>
				<tr><th>Risque</th></tr>
			</thead>
			<tbody>
				<tr>
					<td height="30px">
						<center>
							<form>
								<input type="radio" name="risque" value="Faible" <?php if ($risque == 'Faible') echo 'checked'; ?> />Faible
								<input type="radio"name="risque" value="Moyen" <?php if ($risque == 'Moyen') echo 'checked'; ?> />Moyen
								<input type="radio" name="risque" value="Elevé" <?php if ($risque == 'Elevé') echo 'checked'; ?> />Elevé
							</form>
						</center>
					</td>
				</tr>
				<tr>
					<td height="30px" style="font-weight:bold;text-align:center;">Synthèse</td>
				</tr>
				<tr>
					<td><textarea id="ValueSynth" placeholder="Saisissez votre synthèse ici ..."><?php echo $synthese;?></textarea></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>