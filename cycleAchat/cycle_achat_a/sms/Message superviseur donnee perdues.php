<script>
$(function(){
	$('#Conclusion_Continuation_aca').click(function(){
		$('#message_Sup_Donnees_perdues_aca').hide();
		openButSupaca();
	});
	$('#Conclusion_Add_aca').click(function(){
		if((document.getElementById("commentaire_aca").value=="") || (document.getElementById("conclus_aca_faible").checked==false && document.getElementById("conclus_aca_moyen").checked==false && document.getElementById("conclus_aca_eleve").checked==false))
		{
			$('#mess_empty_conclus').show();
			// $('#message_Sup_Donnees_perdues').hide();
			$('#message_Sup_Donnees_perdues_aca').hide();
		}
		else{		
			mission_id=$('#mission_id_aca').val();
			commentaire=$('#commentaire_aca').val();
			risque="faible";
			if(document.getElementById("conclus_aca_faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("conclus_aca_moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("conclus_aca_eleve").checked==true){
				risque="eleve";
			}
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_a/php/enregistrer_conclusion_aca.php',
				data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
				success:function(){
					$('#contSupaca').hide();
					$('#message_Slide_Conclusion_aca').hide();
					$('#message_Sup_Donnees_perdues_aca').hide();
					$('#contenue_rsci').show();
					openButaca();
				}
			});
		}
	});
});
</script>

<div id="Int_Conclusion_Donnee_Perdu_aca" align="center">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="Conclusion_Add_aca" <?php if($commentaire != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="Conclusion_Continuation_aca">
			</td>
		</tr>
	</table>
</div>