<script>
$(function(){
	//le retour à l'interface de superviseur B
	$('#int_f_sup_Conclus_Precedent').click(function(){
		$('#int_conclusion_f_superviseur').hide();
		$('#fancybox_bouton_f').hide();
		openButtSupf();
	});
	//Termine la conclusion avec enregistrement
	$('#int_f_sup_Conclus_Terminer').click(function(){
		if(($('#commentaire_Question_f_sup_conclusion').val()=="") || (document.getElementById("rad_Conclus_Faible_f").checked==false && document.getElementById("rad_Conclus_Moyen_f").checked==false && document.getElementById("rad_Conclus_Eleve_f").checked==false)){
			$('#int_conclusion_f_superviseur').hide();
			$('#mess_conclus_vide').show();
		}
		else{
			$('#mess_valide_conclusion_f_sup').show();
			$('#int_conclusion_f_superviseur').hide();
		}
	});
	//Fermeture de la conclusion
	$('#fermer_Conclusion_f_sup').click(function(){
		$('#int_conclusion_f_superviseur').hide();
		$('#mess_Termine_conclusion_f_sup').show();
	});
	
	$('#commentaire_Question_f_sup_conclusion').click(function(){
		document.getElementById("commentaire_Question_f_sup_conclusion").value="";
	});
});
</script>
<div id="int_Question_f_Sup">
	<table width="500">
		<tr style="height:10px">
			<td class="label_Question" align="center">Niveau de risque :</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Oui_Non" align="center">
			Faible <input type="radio" id="rad_Conclus_Faible_f" name="rad_Conclus_f" <?php if($risqueFin=="faible") echo 'checked'; ?> <?php if($commentaire1 != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
			Moyen <input type="radio" id="rad_Conclus_Moyen_f" name="rad_Conclus_f" <?php if($risqueFin=="moyen") echo 'checked'; ?> <?php if($commentaire1 != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
			Elevé <input type="radio" id="rad_Conclus_Eleve_f" name="rad_Conclus_f" <?php if($risqueFin=="eleve") echo 'checked'; ?> <?php if($commentaire1 != "") echo 'disabled'; ?> />
			</td>
		</tr>
		<tr style="height:10px">
			<td class="label_Question" align="center">Commentaires</td>
		</tr>
		<tr>
			<td align="center"><textarea id="commentaire_Question_f_sup_conclusion" rows="15" cols="50" <?php if($commentaire1 != "") echo 'disabled'; ?>><?php if($commentaire=="") echo '[Rédiger ici votre conclusion]'; else if($commentaire1 != "") echo $commentaire1 ; else echo $commentaire ; ?></textarea>
			</td>
		</tr>
		<tr>
			<td align="center">
					<input type="button" value="annuler" class="bouton" id="int_f_sup_Conclus_Precedent"/>&nbsp;&nbsp;&nbsp;
				<input type="button" value="Valider" class="bouton" id="int_f_sup_Conclus_Terminer" <?php if($commentaire1 != "") echo 'disabled'; ?> />
			</td>
		</tr>
	</table>
</div>
<div id="fermer_Conclusion_f_sup"></div>