<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_ev').click(function(){

		$('#message_confirmation_slide_Synthese_ev').hide();
		$('#message_Slide_terminer_Question_ev').hide();

		$('#fancybox_ev').hide();


		$('#Int_ev_Synthese').click();
		/*	$.ajax({
						type:'POST',
						url:'cycleEnvironnement/EnvQuest/php/getSynth.php',
						data:{mission_id:mission_id, cycleId:31},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("rd_Synthese_ev_Faible").checked=false;
							document.getElementById("rd_Synthese_ev_Moyen").checked=false;
							document.getElementById("rd_Synthese_ev_Eleve").checked=false;
							document.getElementById("txt_Synthese_ev").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_ev_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_ev_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_ev_Eleve").checked=true;
							}						
						}
					});
					*/
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_ev">
	<table width="500">
		<tr height="20">
			<td height="20">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">veuillez saisir la synthèse</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_ev">
			</td>
		</tr>
	</table>
</div>