<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_stc').click(function(){
		$('#message_Slide_terminer_Question_stc').hide();
		$('#fancybox_stc').hide();
		// //**//
			$.ajax({
						type:'POST',
						url:'cycleStock/Stockc/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:12},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("rd_Synthese_stc_Faible").checked=false;
							document.getElementById("rd_Synthese_stc_Moyen").checked=false;
							document.getElementById("rd_Synthese_stc_Eleve").checked=false;
							document.getElementById("txt_Synthese_stc").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_stc_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_stc_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_stc_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_stc').show();
					$('#fancybox_stc').show();
		//**//
	//		$('#contRsciStock').show();
	//		$('#contstc').hide();
	});
});
</script>
<div id="message_confirmation_slide_Synthese_stc">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_stc">
			</td>
		</tr>
	</table>
</div>