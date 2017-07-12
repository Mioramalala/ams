<?php

include '../../../connexion.php';

$reponse = $bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=10');

$donnees=$reponse->fetch();

$reponse_synth=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID='.$mission_id.' AND CYCLE_ACHAT_ID=10');

$donnees_synth=$reponse_synth->fetch();

$commentaire_synth=$donnees_synth['SYNTHESE_COMMENTAIRE'];
$risque_synth=$donnees_synth['SYNTHESE_RISQUE'];

$commentaire=$donnees['CONCLUSION_COMMENTAIRE'];
$risque=$donnees['CONCLUSION_RISQUE'];

?>
<script>
$(function(){
	$('#commentaire_sta').click(function(){
		document.getElementById("commentaire_sta").value="";
	});
	
	$('#int_sta_Conclus_Precedent').click(function(){
		$('#interface_sta_Conclusion_Superviseur').hide();
		openButSupsta();
	});
	
	$('#fermer_Conclusion_sta').click(function(){
		$('#message_Sup_Donnees_perdues').show();
		$('#interface_sta_Conclusion_Superviseur').hide();
		openButSupsta();
	});
	
	$('#conclus_sta').click(function(){
		if((document.getElementById("commentaire_sta").value=="") || (document.getElementById("conclus_sta_faible").checked==false && document.getElementById("conclus_sta_moyen").checked==false && document.getElementById("conclus_sta_eleve").checked==false)){
			$('#mess_vide_conclusion_aca').show();
		}
		else{
			$('#Message_Conclusion_sta_Terminer').show();
		}
		$('#interface_sta_Conclusion_Superviseur').hide();
	});
	
	$('#fermer_Conclusion_sta').click(function(){
		$('#message_Sup_Donnees_perdues').show();
		$('#interface_sta_Conclusion_Superviseur').hide();
	});

});
</script>
<div id="int_Question_sta">
	<input type="text" value="<?php echo $mission_id;?>" id="mission_id_sta" style="display:none;" />
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">Niveau de risque :</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Faible <input type="radio" id="conclus_sta_faible" name="rad_Conclus_sta" <?php if($risque=="faible") echo 'checked'; else if($risque_synth=="faible") echo 'checked'; ?> <?php if($commentaire != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
			Moyen <input type="radio" id="conclus_sta_moyen" name="rad_Conclus_sta"<?php if($risque=="moyen") echo 'checked'; else if($risque_synth=="moyen") echo 'checked'; ?> <?php if($commentaire != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
			Elevé <input type="radio" id="conclus_sta_eleve" name="rad_Conclus_sta" <?php if($risque=="eleve") echo 'checked'; else if($risque_synth=="eleve") echo 'checked'; ?> <?php if($commentaire != "") echo 'disabled'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_sta" rows="15" cols="50" <?php if($commentaire != "") echo 'disabled'; ?>><?php if($commentaire!="") echo $commentaire; else {if($commentaire_synth != "") echo $commentaire_synth; else '[Rédiger ici votre conclusion]';} ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center"><input type="button" value="Precedent" class="bouton" id="int_sta_Conclus_Precedent"/>&nbsp;&nbsp;&nbsp;
			<input type="button" value="Valider" class="bouton" id="conclus_sta" <?php if($commentaire != "") echo 'disabled'; ?> />
			</td>
		</tr>
	</table>
</div>
<!--***************************Bouton fermer*****************************************-->
<div id="fermer_Conclusion_sta"></div>
<!--*********************************************************************************-->