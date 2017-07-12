<?php

// include '../../connexion.php';

// $reponse = $bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_RSCI_ID=1');

// $donnees=$reponse->fetch();

// $reponse_synth=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_RSCI_ID=1');

// $donnees_synth=$reponse_synth->fetch();

// $commentaire_synth=$donnees_synth['SYNTHESE_COMMENTAIRE'];
// $risque_synth=$donnees_synth['SYNTHESE_RISQUE'];

// $commentaire=$donnees['CONCLUSION_COMMENTAIRE'];
// $risque=$donnees['CONCLUSION_RISQUE'];

?>
<script>
$(function(){
	$('#commentaire_Question_conclus_A').click(function(){
		document.getElementById("commentaire_Question_conclus_A").value="";
	});

});
</script>
<div id="int_Question_A">
	<input type="text" value="<?php echo $mission_id;?>" id="mission_id" style="display:none;" />
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">Niveau de risque :</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Faible <input type="radio" id="rad_Conclus_Faible" name="rad_Conclus" <?php //if($risque=="faible") echo 'checked'; else if($risque_synth=="faible") echo 'checked'; ?> <?php //if($commentaire != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
			Moyen <input type="radio" id="rad_Conclus_Moyen" name="rad_Conclus"<?php //if($risque=="moyen") echo 'checked'; else if($risque_synth=="moyen") echo 'checked'; ?> <?php //if($commentaire != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
			Elevé <input type="radio" id="rad_Conclus_Eleve" name="rad_Conclus" <?php //if($risque=="eleve") echo 'checked'; else if($risque_synth=="eleve") echo 'checked'; ?> <?php //if($commentaire != "") echo 'disabled'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_conclus_A" rows="15" cols="50" <?php //if($commentaire != "") echo 'disabled'; ?>><?php //if($commentaire!="") echo $commentaire; else {if($commentaire_synth != "") echo $commentaire_synth; else '[Rédiger ici votre conclusion]';} ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_A_Conclus_Precedent"/>&nbsp;&nbsp;&nbsp;
			<input type="button" value="Valider" class="bouton" id="conclus_A" />
			</td>
		</tr>
	</table>
</div>
<!--***************************Bouton fermer*****************************************-->
<div id="fermer_Conclusion_A"></div>
<!--*********************************************************************************-->