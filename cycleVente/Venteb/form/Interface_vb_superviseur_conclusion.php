<?php

include '../../../connexion.php';

$reponse=$bdd->query('SELECT SYNTHESE_COMMENTAIRE, SYNTHESE_RISQUE FROM tab_synthese WHERE CYCLE_ACHAT_ID=26 AND MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$commentaire=$donnees['SYNTHESE_COMMENTAIRE'];
$risque=$donnees['SYNTHESE_RISQUE'];

$reponse1=$bdd->query('SELECT CONCLUSION_COMMENTAIRE, CONCLUSION_RISQUE FROM tab_conclusion WHERE CYCLE_ACHAT_ID=26 AND MISSION_ID='.$mission_id);

$donnees1=$reponse1->fetch();

$commentaire1=$donnees1['CONCLUSION_COMMENTAIRE'];
$risque1=$donnees1['CONCLUSION_RISQUE'];

if($risque1==""){
	$risqueFin=$risque;
}
else{
	$risqueFin=$risque1;
}

?>
<script>
$(function(){
	//le retour à l'interface de superviseur B
	$('#int_vb_sup_Conclus_Precedent').click(function(){
		$('#int_conclusion_vb_superviseur').hide();
		$('#fancybox_bouton_vb').hide();
		openButtSupvb();
	});
	//Termine la conclusion avec enregistrement
	$('#int_vb_sup_Conclus_Terminer').click(function(){
		if(($('#commentaire_Question_vb_sup_conclusion').val()=="") || (document.getElementById("rad_Conclus_Faible_vb").checked==false && document.getElementById("rad_Conclus_Moyen_vb").checked==false && document.getElementById("rad_Conclus_Eleve_vb").checked==false)){
			$('#int_conclusion_vb_superviseur').hide();
			$('#mess_empty_conclus_vb').show();
		}
		else{
			$('#mess_valide_conclusion_vb_sup').show();
			$('#int_conclusion_vb_superviseur').hide();
		}
	});
	//Fermeture de la conclusion
	$('#fermer_Conclusion_vb_sup').click(function(){
		$('#int_conclusion_vb_superviseur').hide();
		$('#mess_Termine_conclusion_vb_sup').show();
	});
	
	$('#commentaire_Question_vb_sup_conclusion').click(function(){
		document.getElementById("commentaire_Question_vb_sup_conclusion").value="";
	});
});
</script>
<div id="int_Question_vb_Sup">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">Niveau de risque :</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Faible <input type="radio" id="rad_Conclus_Faible_vb" name="rad_Conclus_vb" <?php if($risqueFin=="faible") echo 'checked'; ?> <?php if($commentaire1 != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
			Moyen <input type="radio" id="rad_Conclus_Moyen_vb" name="rad_Conclus_vb" <?php if($risqueFin=="moyen") echo 'checked'; ?> <?php if($commentaire1 != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
			Elevé <input type="radio" id="rad_Conclus_Eleve_vb" name="rad_Conclus_vb" <?php if($risqueFin=="eleve") echo 'checked'; ?> <?php if($commentaire1 != "") echo 'disabled'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_vb_sup_conclusion" rows="15" cols="50" <?php if($commentaire1 != "") echo 'disabled'; ?>><?php if($commentaire=="") echo '[Rédiger ici votre conclusion]'; else if($commentaire1 != "") echo $commentaire1 ; else echo $commentaire ; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center">
					<input type="button" value="annuler" class="bouton" id="int_vb_sup_Conclus_Precedent"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Valider" class="bouton" id="int_vb_sup_Conclus_Terminer" />
			</td>
		</tr>
	</table>
</div>
<div id="fermer_Conclusion_vb_sup"></div>