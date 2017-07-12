<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_rb').click(function(){
		$('#Int_Synthese_rb').show();
		$('#message_Terminer_Synthese_rb').hide();
	});
	$('#enregistrer_msg_Synthese_rb').click(function(){
		$('#message_Terminer_Synthese_rb').hide();
		$('#message_Synthese_Slide_rb').show();
	});
});

</script>
<div id="message_Terminer_Synt_rb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_rb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_rb">
		</td>
	</tr>
</table>
</div>