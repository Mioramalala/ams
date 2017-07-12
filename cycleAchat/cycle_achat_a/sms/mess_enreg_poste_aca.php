<script type="text/javascript" src="cycleAchat/cycle_acachat_js/cycle_acachat_plugins/jquery.js"></script>
<link href="cycleAchat/cycle_acachat_css/div.css" rel="stylesheet" type="text/css" />
<script>
	$(function(){
		$('#enreg_poste_aca').click(function(){
			$('#mess_enreg_poste_aca').hide();
			$('#contenue_rsci').show();
			$('#contenue_poste_aca').hide();
		});
	});
</script>


<div id="message_confirmation_slide_poste_aca">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Toutes les données sont stockées...</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="enreg_poste_aca">
			</td>
		</tr>
	</table>
</div>