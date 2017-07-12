<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_e').click(function(){
		$('#Int_Synthese_e').show();
		$('#message_Terminer_Synthese_e').hide();
	});
	$('#enregistrer_msg_Synthese_e').click(function(){
		$('#message_Terminer_Synthese_e').hide();
		$('#message_Synthese_Slide_e').show();
	});
});

</script>
<div id="message_Terminer_Synt_e">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_e">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_e">
		</td>
	</tr>
</table>
</div>