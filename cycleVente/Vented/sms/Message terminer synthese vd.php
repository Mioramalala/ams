<script>
$(function(){	
	//--------------------Dans la boite de dialogue de message_Terminer_Synthese_c	
	$('#annuler_msg_Synthese_vd').click(function(){
		$('#Int_Synthese_vd').show();
		$('#message_Terminer_Synthese_vd').hide();
	});
	$('#enregistrer_msg_Synthese_vd').click(function(){
		$('#message_Terminer_Synthese_vd').hide();
		$('#message_Synthese_Slide_vd').show();
	});
});

</script>
<div id="message_Terminer_Synt_vd">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_vd">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_vd">
		</td>
	</tr>
</table>
</div>