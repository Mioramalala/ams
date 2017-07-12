<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_ev').click(function(){
		$('#Int_Synthese_ev').show();
		$('#message_Terminer_Synthese_ev').hide();
	});
	$('#enregistrer_msg_Synthese_ev').click(function(){
		$('#message_Terminer_Synthese_ev').hide();
		$('#message_Synthese_Slide_ev').show();
	});
});

</script>
<div id="message_Terminer_Synt_ev">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_ev">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_ev">
		</td>
	</tr>
</table>
</div>