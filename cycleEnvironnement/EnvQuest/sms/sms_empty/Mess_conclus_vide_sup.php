<script>
$(function(){
	$('#fermer_mess_conclus_vide_ev').click(function(){
		$('#mess_conclus_vide').hide();
		$('#int_conclusion_ev_superviseur').show();
	});
});
</script>

<div id="message_conclus_vide_f2">
<table width="500">
	<tr class="label" align="center" height="50">
		<td><img src="../cycle_achat_image/alerte.jpg" width="50" height="50" id="img_vide"/>Tous les champs doivent être remplis</td>
	</tr>
</table>
</div>
<div id="fermer_mess_conclus_vide_ev"><img src="../cycle_achat_image/Fermer.png" /></div>