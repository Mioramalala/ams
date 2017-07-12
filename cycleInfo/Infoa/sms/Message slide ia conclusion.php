<script>
$(function(){
	$('#message__Slide_Ok_Conclusion_ia
').click(function(){
		mission_id=$('#mission_id_ia
').val();
		commentaire=$('#commentaire_ia
').val();
		risque="faible";
		if(document.getElementById("conclus_ia
_faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("conclus_ia
_moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("conclus_ia
_eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleRecette/recettea/php/enregistrer_conclusion_ia
.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
			success:function(){
				$('#contSupIa
').hide();
				$('#message_Slide_Conclusion_ia
').hide();
				$('#contRsciRecette').show();
				openButia
();
			}
		});
	});
});
</script>

<div id="message_confirmation_slide_ia
">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Toutes les données sont stockées...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Conclusion_ia
">
			</td>
		</tr>
	</table>
</div>