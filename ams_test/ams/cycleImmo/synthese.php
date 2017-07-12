<?php
	@session_start();
	include '../connexion.php';

	$synthese = $risque = '';

	$req = $bdd->query(" SELECT SYNTHESE, RISQUE FROM tab_synthese_rsci WHERE CYCLE = 'immobilisation' AND MISSION_ID =".$_SESSION['idMission']." ");
	$ligne = $req->rowCount();

	if( $ligne != 0 ){
		$donnee = $req->fetch();
		$synthese = $donnee['SYNTHESE'];
		$risque = $donnee['RISQUE'];
	}
	
?>

<script type="text/javascript">
	$(function(){

		// Droit cycle by Tolotra
        // Page : RSCI -> Cycle immobilisation
        // Tâche : Revue Contrôles Immobilisations, numéro 7
        $.ajax({
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 7},
            success: function (e) {
                var result = 0 === Number(e);
                $("#synthUnTier").find("table tr td form input").attr('disabled', result);
                $("#ValueSynth").attr('disabled', result);
                $("#SaveSynth").attr('disabled', result);
            }
        });
		
		$('#HideSynth').click(function(){
			$('#ContentSynthAchat').hide();
			$('#contRsciImmo').show();
		});

		// save synthèse
		$('#SaveSynth').click(function(){

			var synthese = $('#ValueSynth').val();
			var risque = $('input[name="risque"]:checked').val();

			$.ajax({
				type:'POST',
				url:'cycleImmo/saveSynthese.php',
				data:{synthese:synthese,risque:risque},
				success:function(e){
					$('#ContentSynthAchat').hide();
					$('#contRsciImmo').show();
				}
			});
		});
	});
</script>
<?php
	$objectifs = array('A. Séparation de fonction','B. Exhaustivité','C. Correspondance','D. Evaluation');
	$scores = $risques = $comments = array();

	// tinay editer: puisque le système enregistre la synthèse Immo A pour la valeur "CYCLE_ACHAT_ID: 1000", on doit checker pour  la valeur 1000

	// faire pour Immo A seulement.
	$cycle_achat_id= 1000;
	$requete = $bdd->query('SELECT SCORE,SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID='.$cycle_achat_id.'');
		
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

	// 6 est à ignrer la boucle commence donc à 7.
	for ($i=7; $i <=9 ; $i++) { 
		// $requete = $bdd->query('SELECT concl.* ,synth.SCORE FROM tab_synthese AS synth, tab_conclusion AS concl WHERE concl.MISSION_ID  = '.$_SESSION['idMission'].' AND synth.MISSION_ID = '.$_SESSION['idMission'].' AND concl.CYCLE_ACHAT_ID= '.$i.' AND synth.CYCLE_ACHAT_ID = '.$i.'');
		
		$requete = $bdd->query('SELECT SCORE,SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID='.$i.'');
		
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
	<div id="titreSyntheseRsci">Synthese du cycle Immobilisation</div>
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
				<?php
					$couleur = "";
					$scores[0] = "-";
					for ($i=0; $i < 4 ; $i++) {
						$couleur = ($i%2 == 0) ? 'FFF' : '8FA3AD';
						echo'
							<tr style="background-color: #'.$couleur.';">
								<td style="text-align:center;">'.$objectifs[$i].'</td>
								<td style="text-align:center;">'.$scores[$i].'</td>
								<td style="text-align:center;">'.$risques[$i].'</td>
								<td style="font-size: 8pt;">'.$comments[$i].'</td>
							</tr>
						';
					}
				?>
			</tbody>
		</table>
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