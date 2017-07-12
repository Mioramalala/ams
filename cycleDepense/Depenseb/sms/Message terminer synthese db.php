<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_db').click(function(){
		$('#Int_Synthese_db').show();
		$('#message_Terminer_Synthese_db').hide();
	});
	$('#enregistrer_msg_Synthese_db').click(function(){
		$('#message_Terminer_Synthese_db').hide();
		$('#message_Synthese_Slide_db').show();
	});
});

</script>
<div id="message_Terminer_Synt_db">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_db">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_db">
		</td>
	</tr>
</table>
</div>