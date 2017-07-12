<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_std').click(function(){
		$('#Int_Synthese_std').show();
		$('#message_Terminer_Synthese_std').hide();
	});
	$('#enregistrer_msg_Synthese_std').click(function(){
		$('#message_Terminer_Synthese_std').hide();
		$('#message_Synthese_Slide_std').show();
	});
});

</script>
<div id="message_Terminer_Synt_std">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_std">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_std">
		</td>
	</tr>
</table>
</div>