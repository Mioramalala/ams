<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_rc').click(function(){
		$('#Int_Synthese_rc').show();
		$('#message_Terminer_Synthese_rc').hide();
	});
	$('#enregistrer_msg_Synthese_rc').click(function(){
		$('#message_Terminer_Synthese_rc').hide();
		$('#message_Synthese_Slide_rc').show();
	});
});

</script>
<div id="message_Terminer_Synt_rc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_rc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_rc">
		</td>
	</tr>
</table>
</div>