<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_pe').click(function(){
		$('#Int_Synthese_pe').show();
		$('#message_Terminer_Synthese_pe').hide();
	});
	$('#enregistrer_msg_Synthese_pe').click(function(){
		$('#message_Terminer_Synthese_pe').hide();
		$('#message_Synthese_Slide_pe').show();
	});
});

</script>
<div id="message_Terminer_Synt_pe">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_pe">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_pe">
		</td>
	</tr>
</table>
</div>