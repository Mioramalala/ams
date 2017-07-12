<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_vc').click(function(){
		$('#message_confirmation_slide_Synthese_vc').hide();
		$('#message_Slide_terminer_Question_vc').hide();
		// $('#Int_Synthese_vc').hide();
		// $('#interface_vc').hide();
		$('#fancybox_vc').hide();
		// $('#contenue_rsci').show();
		
		// //**//
			$.ajax({
						type:'POST',
						url:'cycleVente/Ventec/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:27},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("rd_Synthese_vc_Faible").checked=false;
							document.getElementById("rd_Synthese_vc_Moyen").checked=false;
							document.getElementById("rd_Synthese_vc_Eleve").checked=false;
							document.getElementById("txt_Synthese_vc").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_vc_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_vc_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_vc_Eleve").checked=true;
							}						
						}
					});
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_vc">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">veuillez saisir la synthèse</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_vc">
			</td>
		</tr>
	</table>
</div>