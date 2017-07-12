<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_dd').click(function(){
		$('#Int_Synthese_dd').show();
		$('#message_Terminer_Synthese_dd').hide();
	});
	$('#enregistrer_msg_Synthese_dd').click(function(){
		$('#message_Terminer_Synthese_dd').hide();
		$('#message_Synthese_Slide_dd').show();
	});
});

</script>
<div id="message_Terminer_Synt_dd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_dd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_dd">
		</td>
	</tr>
</table>
</div>