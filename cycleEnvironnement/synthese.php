<?php
	@session_start();
	include '../connexion.php';

	$synthese = $risque = '';

	$req = $bdd->query(" SELECT SYNTHESE,RISQUE FROM tab_synthese_rsci WHERE CYCLE = 'environnement' AND MISSION_ID =".$_SESSION['idMission']." ");
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
			$('#contRsciEnvironnement').show();
		});
		$('#SaveSynth').click(function(){
			var synthese = $('#ValueSynth').val();
			var risque = $('input[name="risque"]:checked').val();

			$.ajax({
				type:'POST',
				url:'cycleEnvironnement/saveSynthese.php',
				data:{synthese:synthese,risque:risque},
				success:function(e){
					$('#ContentSynthAchat').hide();
					$('#contRsciEnvironnement').show();
				}
			});
		});
	});
</script>
<?php
	$objectifs = array('QUESTIONNAIRE PME D’ANALYSE DU CONTRÔLE INTERNE');
	$tad = array(31);
	$scores = $risques = $comments = array();
	
	// $requete = $bdd->query('SELECT concl.* ,synth.SCORE FROM tab_synthese AS synth, tab_conclusion AS concl WHERE concl.MISSION_ID  = '.$_SESSION['idMission'].' AND synth.MISSION_ID = '.$_SESSION['idMission'].' AND concl.CYCLE_ACHAT_ID=31 AND synth.CYCLE_ACHAT_ID = 31');
	
	foreach ($tad as $i) {
		$requete = $bdd->query('SELECT SCORE,SYNTHESE_COMMENTAIRE,SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$_SESSION['idMission'].' AND CYCLE_ACHAT_ID=31');
		
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
	<div id="titreSyntheseRsci">Synthèse du cycle Environnement de Contrôle</div>
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
				<tr style="background-color: #FFF">
					<td style="text-align:center;width:20%;"><?php echo $objectifs[0]; ?></td>
					<td style="text-align:center;width:10%;"><?php echo $scores[0]; ?></td>
					<td style="text-align:center;width:10%;"><?php echo $risques[0]; ?></td>
					<td style="font-size: 8pt;width:60%;"><?php echo $comments[0]; ?></td>
				</tr>
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