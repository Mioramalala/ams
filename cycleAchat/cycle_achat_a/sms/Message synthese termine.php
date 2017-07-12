<script>
$(function(){
	$('#annuler_msg_Synthese_aca').click(function(){
		$('#message_Synthese_Terminer').hide();
		$('#message_Synthese_aca').show();
	});
	
	$('#enregistrer_msg_Synthese_aca').click(function(){
		mission_id=document.getElementById("txt_mission_id_int_aca").value;
		commentaire=$('#txt_Synthese_aca').val();
		risque="faible";
		if(document.getElementById("rd_Synthese_aca_Faible").checked==true){
			risque="faible";
		}
		else if(document.getElementById("rd_Synthese_aca_Moyen").checked==true){
			risque="moyen";
		}
		else if(document.getElementById("rd_Synthese_aca_Eleve").checked==true){
			risque="eleve";
		}
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achat_a/php/enregistrer_synthese_aca.php',
			data:{mission_id:mission_id, commentaire:commentaire, risque:risque, cycleId:1},
			success:function(){					
			}		
		});
		$('#message_Synthese_Terminer').hide();
		$('#contaca').hide();
		$('#contenue_rsci').show();
		openButaca();
	});
});

</script>


<div id="message_Terminer_Synthese_aca">
<table width="500">
	<tr class="label" align="center" height="50">
		<td>Etes vous sûr de vouloir terminer?</td>
	</tr>
	<tr align="center" height="50">
		<td>
			<input type="button" class="bouton" value="Annuler" id="annuler_msg_Synthese_aca">&nbsp;&nbsp;&nbsp;
			<input type="button" class="bouton" value="Enregistrer" id="enregistrer_msg_Synthese_aca">
		</td>
	</tr>
</table>
</div>