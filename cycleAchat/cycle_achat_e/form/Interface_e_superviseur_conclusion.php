<script>
$(function(){
	//le retour à l'interface de superviseur B
	$('#int_e_sup_Conclus_Precedent').click(function(){
		$('#int_conclusion_e_superviseur').hide();
		$('#fancybox_bouton_e').hide();
		openButtSupe();
	});
	//Termine la conclusion avec enregistrement
	$('#int_e_sup_Conclus_Terminer').click(function(){
		if(($('#commentaire_Question_e_sup_conclusion').val()=="") || (document.getElementById("rad_Conclus_Faible_e").checked==false && document.getElementById("rad_Conclus_Moyen_e").checked==false && document.getElementById("rad_Conclus_Eleve_e").checked==false)){
			$('#int_conclusion_e_superviseur').hide();
			$('#mess_conclus_vide').show();
		}
		else{
			$('#mess_valide_conclusion_e_sup').show();
			$('#int_conclusion_e_superviseur').hide();
		}
	});
	//Fermeture de la conclusion
	$('#fermer_Conclusion_e_sup').click(function(){
		$('#int_conclusion_e_superviseur').hide();
		$('#mess_Termine_conclusion_e_sup').show();
	});
	
	$('#commentaire_Question_e_sup_conclusion').click(function(){
		document.getElementById("commentaire_Question_e_sup_conclusion").value="";
	});
});
</script>
<div id="int_Question_e_Sup">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">Niveau de risque :</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Faible <input type="radio" id="rad_Conclus_Faible_e" name="rad_Conclus_e" <?php if($risqueFin=="faible") echo 'checked'; ?> <?php if($commentaire1 != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
			Moyen <input type="radio" id="rad_Conclus_Moyen_e" name="rad_Conclus_e" <?php if($risqueFin=="moyen") echo 'checked'; ?> <?php if($commentaire1 != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
			Elevé <input type="radio" id="rad_Conclus_Eleve_e" name="rad_Conclus_e" <?php if($risqueFin=="eleve") echo 'checked'; ?> <?php if($commentaire1 != "") echo 'disabled'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_e_sup_conclusion" rows="15" cols="50" <?php if($commentaire1 != "") echo 'disabled'; ?> ><?php if($commentaire=="") echo '[Rédiger ici votre conclusion]'; else if($commentaire1 != "") echo $commentaire1 ; else echo $commentaire ; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center">
					<input type="button" value="annuler" class="bouton" id="int_e_sup_Conclus_Precedent"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Valider" class="bouton" id="int_e_sup_Conclus_Terminer" <?php if($commentaire1 != "") echo 'disabled'; ?> />
			</td>
		</tr>
	</table>
</div>
<div id="fermer_Conclusion_e_sup"></div>