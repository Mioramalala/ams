<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_stb').click(function(){
		$('#message_confirmation_slide_Synthese_stb').hide();
		$('#message_Slide_terminer_Question_stb').hide();
		// $('#Int_Synthese_stb').hide();
		// $('#interface_stb').hide();
		$('#fancybox_stb').hide();
		// $('#contenue_rsci').show();
			$.ajax({
						type:'POST',
						url:'cycleStock/Stockb/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:11},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("rd_Synthese_stb_Faible").checked=false;
							document.getElementById("rd_Synthese_stb_Moyen").checked=false;
							document.getElementById("rd_Synthese_stb_Eleve").checked=false;
							document.getElementById("txt_Synthese_stb").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_stb_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_stb_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_stb_Eleve").checked=true;
							}						
						}
					});
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_stb">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Veuillez maintenant saisir la synthèse</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_stb">
			</td>
		</tr>
	</table>
</div>