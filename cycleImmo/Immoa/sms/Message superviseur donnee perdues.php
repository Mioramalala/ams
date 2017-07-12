<script>
$(function(){
	$('#Conclusion_Continuation_ima').click(function(){
		$('#message_Sup_Donnees_perdues').hide();
		openButSupima();
	});
	$('#Conclusion_Add_ima').click(function(){
		if((document.getElementById("commentaire_ima").value=="") || (document.getElementById("conclus_ima_faible").checked==false && document.getElementById("conclus_ima_moyen").checked==false && document.getElementById("conclus_ima_eleve").checked==false))
		{
			$('#mess_vide_conclusion_ima').show();
			$('#message_Sup_Donnees_perdues').hide();
		}
		else{		
			mission_id=$('#mission_id_ima').val();
			commentaire=$('#commentaire_ima').val();
			risque="faible";
			if(document.getElementById("conclus_ima_faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("conclus_ima_moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("conclus_ima_eleve").checked==true){
				risque="eleve";
			}
			$.ajax({
				type:'POST',
				url:'cycleImmo/immoa/php/enregistrer_conclusion_ima.php',
				data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
				success:function(e){
					alert(e);
					$('#contSupIma').hide();
					$('#message_Slide_Conclusion_ima').hide();
					$('#contRsciImmo').show();
					openButima();
				}
			});
		}
	});
});
</script>

<div id="Int_Conclusion_Donnee_Perdu_ima" align="center">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="Conclusion_Add_ima" <?php if($commentaire != "") echo 'disabled'; ?> />&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="Conclusion_Continuation_ima" />
			</td>
		</tr>
	</table>
</div>