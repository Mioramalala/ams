<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_vb').click(function(){
		$('#Int_Synthese_vb').show();
		$('#message_Terminer_Synthese_vb').hide();
	});
	$('#enregistrer_msg_Synthese_vb').click(function(){
		$('#message_Terminer_Synthese_vb').hide();
		$('#message_Synthese_Slide_vb').show();
	});
});

</script>
<div id="message_Terminer_Synt_vb">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_vb">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_vb">
		</td>
	</tr>
</table>
</div>