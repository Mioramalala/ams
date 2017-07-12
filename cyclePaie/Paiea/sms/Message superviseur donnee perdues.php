<script>
$(function(){
	$('#Conclusion_Continuation_pa').click(function(){
		$('#message_Sup_Donnees_perdues').hide();
		openButSuppa();
	});
	$('#Conclusion_Add_pa').click(function(){
		if((document.getElementById("commentaire_pa").value=="") || (document.getElementById("conclus_pa_faible").checked==false && document.getElementById("conclus_pa_moyen").checked==false && document.getElementById("conclus_pa_eleve").checked==false))
		{
			$('#mess_vide_conclusion_pa').show();
			$('#message_Sup_Donnees_perdues').hide();
		}
		else{		
			mission_id=$('#mission_id_pa').val();
			commentaire=$('#commentaire_pa').val();
			risque="faible";
			if(document.getElementById("conclus_pa_faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("conclus_pa_moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("conclus_pa_eleve").checked==true){
				risque="eleve";
			}
			$.ajax({
				type:'POST',
				url:'cyclePaie/paiea/php/enregistrer_conclusion_pa.php',
				data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
				success:function(e){
					alert(e);
					$('#contSupPa').hide();
					$('#message_Slide_Conclusion_pa').hide();
					$('#contRsciPaie').show();
					openButpa();
				}
			});
		}
	});
});
</script>

<div id="Int_Conclusion_Donnee_Perdu_pa" align="center">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="Conclusion_Add_pa" <?php if($commentaire != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="Conclusion_Continuation_pa" >
			</td>
		</tr>
	</table>
</div>