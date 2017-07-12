<script>
$(function(){
	$('#Conclusion_Continuation_id').click(function(){
		$('#message_Sup_Donnees_perdues').hide();
		openButSupid();
	});
	$('#Conclusion_Add_id').click(function(){
		if((document.getElementById("commentaire_id").value=="") || (document.getElementById("conclus_id_faible").checked==false && document.getElementById("conclus_id_moyen").checked==false && document.getElementById("conclus_id_eleve").checked==false))
		{
			$('#mess_vide_conclusion_id').show();
			$('#message_Sup_Donnees_perdues').hide();
		}
		else{		
			mission_id=$('#mission_id_id').val();
			commentaire=$('#commentaire_id').val();
			risque="faible";
			if(document.getElementById("conclus_id_faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("conclus_id_moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("conclus_id_eleve").checked==true){
				risque="eleve";
			}
			$.ajax({
				type:'POST',
				url:'cycleRecette/recettea/php/enregistrer_conclusion_id.php',
				data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
				success:function(e){
					//alert(e);
					$('#contSupId').hide();
					$('#message_Slide_Conclusion_id').hide();
					$('#contRsciRecette').show();
					openButid();
				}
			});
		}
	});
});
</script>

<div id="Int_Conclusion_Donnee_Perdu_id" align="center">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="Conclusion_Add_id" <?php if($commentaire != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="Conclusion_Continuation_id" >
			</td>
		</tr>
	</table>
</div>