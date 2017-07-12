<?php
	@session_start();
	include '../connexion.php';

	$synthese = $risque = '';

	$req = $bdd->query(" SELECT SYNTHESE,RISQUE FROM tab_synthese_rsci WHERE CYCLE = 'paie_personnel' AND MISSION_ID =".$_SESSION['idMission']." ");
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
        // Page : RSCI -> Cycle paie
        // Tâche : Revue Cotrôles Paie, numéro 21
        $.ajax({
            type: 'POST',
            url: 'droitCycle.php',
            data: {task_id: 21},
            success: function (e) {
                var result = 0 === Number(e);
                $("#synthUnTier").find("table tr td form input").attr('disabled', result);
                $("#ValueSynth").attr('disabled', result);
                $("#SaveSynth").attr('disabled', result);
            }
        });

		$('#HideSynth').click(function(){
			$('#ContentSynthAchat').hide();
			$('#contRsciPaie').show();
		});
		$('#SaveSynth').click(function(){
			var synthese = $('#ValueSynth').val();
			var risque = $('input[name="risque"]:checked').val();

			$.ajax({
				type:'POST',
				url:'cyclePaie/saveSynthese.php',
				data:{synthese:synthese,risque:risque},
				success:function(e){
					$('#ContentSynthAchat').hide();
					$('#contRsciPaie').show();
				}
			});
		});
	});
</script>
<?php
	$objectifs = array('A. Séparation de fonction','B. Exhaustivité','C. Réalité','D. Evaluation','E. Imputation');
	$scores = $risques = $comments = array();
	$tab_id = array(10000,14,15,16,17);
//10000
	foreach($tab_id as $i)
	{
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
	<div id="titreSyntheseRsci">Synthèse du cycle Paie et Personnel</div>
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
					for ($i=0; $i < 5 ; $i++) {
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