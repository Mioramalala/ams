<?php

 @session_start();
 
		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 
 
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";
	include "$project_path/connexion.php";
	$mission_id=@$_SESSION['idMission'];
	$cycle = "B- Immobilisations incorporelles et corporelles";
	$objectif = "B1";
	?>

	<script type="text/javascript">

		$("#enregistrer_echantillon").click(function() {
			var formData = new FormData(document.getElementById("form_echantillon"));

			$.ajax({
				url  : "RDC/enregistrementEchantillionInfo2.php", //script qui traitera l'envoi du fichier
				type : 'POST',
				//dataType : 'json',
				xhr  : function() { // xhr qui traite la barre de progression
					myXhr = $.ajaxSettings.xhr();
					if(myXhr.upload) { // vérifie si l'upload existe
						myXhr.upload.addEventListener('progress',function(e) {
							if(e.lengthComputable);
						}, false); // Pour ajouter l'évènement progress sur l'upload de fichier
					}
					return myXhr;
				},

				//Traitements AJAX
				//beforeSend  : traitementAvantEnvois,
				success     : function(e) {

					alert("Modification réussite.");
				},
				error       : function(e) {
					alert('error : ' + e);
				},
				//Données du formulaire envoyé
				data        : formData,
				//Options signifiant à jQuery de ne pas s'occuper du type de données
				cache       : false,
				contentType : false,
				processData : false
			});
		});
	</script>
<div align="center">

	<form id="form_echantillon" method = "post" action="" enctype="multipart/form-data">
	<label>VERIFICATION DE L'EXHAUSTIVITE / REGULARITE DES ENREGISTREMENTS 3. Détermination du coût d'acquisition/production</label>
	<input type="button" style="color:#fff;float: left;height:40px;background:#00698d;font-size: 18px" value="Revoir l'échantillon" id="Revoir_echantillon">
		<input type="button" style="color:#fff;float: left;height:40px;background:#00698d;font-size: 18px"  name="submit" id="enregistrer_echantillon" value="enregistrer" id="submit" />
	<div style="overflow:auto;height:360px;float: left;">

	<table width="100%">
		<thead>
			<tr bgcolor="#ccc">
				<td width="7%">Compte</td>
				<td width="7%">Date</td>
				<td width="7%" >Journal</td>	
				<td width="7%">Référence</td>
				<td width="7%">Libellé</td>
				<td width="7%">Débit</td>
				<td width="7%">Crédit</td>
				<td width="7%">Pointage</td>
				<td width="7%">Régularité des PJ (20.06.18)</td>
				<td width="7%">Observations</td>
				<td width="7%">Renvoi</td>	
			</tr>
		</thead>
		<tbody>

	<?php 
			$reponse=$bdd->query("select id_echantillon_GL,compt_ech_gl ,date_ech_gl,journal_ech_gl,ref_ech_gl, libelle_ech_gl,
			debit_ech_gl,crd_ech_gl, pointage, regularite_pj, observation, renvoi from tab_ehantillon_gl where
			GL_GEN_CYCLE='".$cycle."' AND objectif='".$objectif."' AND id_mission=".$mission_id);

			$comptes = "";
			$references = "";
			$i = 0;

			while($donnees=$reponse->fetch())
			{

				$id      = $donnees['id_echantillon_GL'];
				$Comp    = $donnees['compt_ech_gl'];
				$date    = $donnees['date_ech_gl'];
				$jl      = $donnees['journal_ech_gl'];
				$ref     = $donnees['ref_ech_gl'];
				$libelle = $donnees['libelle_ech_gl'];
				$debit   = $donnees['debit_ech_gl'];
				$crd     = $donnees['crd_ech_gl'];

				$pointage    = $donnees['pointage'];
				$regularite  = $donnees['regularite_pj'];
				$observation = $donnees['observation'];
				$renvoi      = $donnees['renvoi'];
				if($renvoi != ""){
					$ext = pathinfo($renvoi);
					$extension = $ext['extension'];
				}
				if($i > 0) {
					$comptes .= "/";
					$references .= "/";
				}
				else $i++;
				$comptes .= $Comp;
				$references .= $ref;
	?>
			<tr>
				<td><?php echo $Comp ;?></td>
				<td><?php echo $date ;?></td>
				<td><?php echo $jl ;?></td>
				<td><?php echo $ref ;?></td>
				<td><?php echo $libelle ;?></td>

				<td><?php echo number_format((double)$debit, 2, '.', ' ');?></td>
				<td><?php echo number_format((double)$crd, 2, '.', ' ');?></td>
				<td><textarea name="pointage_[]"><?php echo $pointage ;?></textarea></td>
				<td><textarea name="regularite_[]"><?php echo $regularite ;?></textarea></td>
				<td><textarea name="observation_[]"><?php echo $observation ;?></textarea></td>
				<td><input type="file" name="renvoi_<?php echo $Comp.'_'.$ref ;?>" />
					<br>
<?php
	if($renvoi != "") {
?>
					<a href="renvoi_echantillon/<?php echo 'renvoi_'.$mission_id.'_'.$cycle.'_'.$objectif.'_'.$Comp.'_'.$ref.'.'.$extension;?>" target="_blank" ><?php echo $renvoi ;?></a>
<?php
	}
?>
				</td>
				
			</tr>
		</tbody>
		<input type="hidden" name="objectif[]" value="<?php echo $objectif;?>" />
		<input type="hidden" name="cycle[]" value="<?php echo $cycle ;?>" />

		<input type="hidden" name="id_echantillon_GL[]" value="<?php echo $id;?>" />


		<?php } ?>

		<input type="hidden" name="comptes" value="<?php echo $comptes ;?>" />
		<input type="hidden" name="references" value="<?php echo $references ;?>" />
	</table>




</div>
</div>
	</form>
	<script>
	
	  /*
	  #Jimmy
	  Cette section se fait appelé à chaque fois qu'on tente de repondre à la première partie, ce qui engendre à plusieurs reprise un ralentissement du serveur
	  
	  La solution temporaire fut de n'activer son execution qu'une seule fois
	  */
	  $("#Revoir_echantillon").unbind("click");
	  ("#Revoir_echantillon").click(function ()
	  {
		  $('#contenue_travail').load("RDC/immobilisationCorpIncorp/B_exhaustivite/table_B6.php?Revoir_echantillon=retourechant");
	  });
	
	</script>