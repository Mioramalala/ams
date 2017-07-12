<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_imc').click(function(){
		$('#Int_Synthese_imc').show();
		$('#message_Terminer_Synthese_imc').hide();
	});
	$('#enregistrer_msg_Synthese_imc').click(function(){
		$('#message_Terminer_Synthese_imc').hide();
		$('#message_Synthese_Slide_imc').show();
	});
});

</script>
<div id="message_Terminer_Synt_imc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_imc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_imc">
		</td>
	</tr>
</table>
</div>