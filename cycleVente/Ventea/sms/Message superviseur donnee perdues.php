<script>
$(function(){
	$('#Conclusion_Continuation_va').click(function(){
		$('#message_Sup_Donnees_perdues').hide();
		openButSupva();
	});
	$('#Conclusion_Add_va').click(function(){
		if((document.getElementById("commentaire_va").value=="") || (document.getElementById("conclus_va_faible").checked==false && document.getElementById("conclus_va_moyen").checked==false && document.getElementById("conclus_va_eleve").checked==false))
		{
			$('#mess_vide_conclusion_va').show();
			$('#message_Sup_Donnees_perdues').hide();
		}
		else{		
			mission_id=$('#mission_id_va').val();
			commentaire=$('#commentaire_va').val();
			risque="faible";
			if(document.getElementById("conclus_va_faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("conclus_va_moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("conclus_va_eleve").checked==true){
				risque="eleve";
			}
			$.ajax({
				type:'POST',
				url:'cycleVente/ventea/php/enregistrer_conclusion_va.php',
				data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
				success:function(e){
					alert(e);
					$('#contSupVa').hide();
					$('#message_Slide_Conclusion_va').hide();
					$('#contRsciVente').show();
					openButva();
				}
			});
		}
	});
});
</script>

<div id="Int_Conclusion_Donnee_Perdu_va" align="center">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="Conclusion_Add_va" <?php if($commentaire != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="Conclusion_Continuation_va" >
			</td>
		</tr>
	</table>
</div>