<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_pb').click(function(){
		$('#message_Slide_terminer_Question_pb').hide();
		$('#Int_Synthese_pb').hide();
		$('#interface_pb').hide();
		$('#fancybox_pb').hide();
		$('#contenue_rsci').show();
			$.ajax({
						type:'POST',
						url:'cyclePaie/Paieb/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:14},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("rd_Synthese_pb_Faible").checked=false;
							document.getElementById("rd_Synthese_pb_Moyen").checked=false;
							document.getElementById("rd_Synthese_pb_Eleve").checked=false;
							document.getElementById("txt_Synthese_pb").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_pb_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_pb_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_pb_Eleve").checked=true;
							}						
						}
					});
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_pb">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_pb">
			</td>
		</tr>
	</table>
</div>