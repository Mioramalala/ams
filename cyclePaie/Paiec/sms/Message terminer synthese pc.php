<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_pc').click(function(){
		$('#Int_Synthese_pc').show();
		$('#message_Terminer_Synthese_pc').hide();
	});
	$('#enregistrer_msg_Synthese_pc').click(function(){
		$('#message_Terminer_Synthese_pc').hide();
		$('#message_Synthese_Slide_pc').show();
	});
});

</script>
<div id="message_Terminer_Synt_pc">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_pc">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_pc">
		</td>
	</tr>
</table>
</div>