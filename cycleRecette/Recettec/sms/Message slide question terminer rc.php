<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_rc').click(function(){
		$('#message_confirmation_slide_Synthese_rc').hide();
		$('#message_Slide_terminer_Question_rc').hide();
		// $('#Int_Synthese_rc').hide();
		// $('#interface_rc').hide();
		$('#fancybox_rc').hide();
		// $('#contenue_rsci').show();

			// tinay editer

			// $.ajax({
			// 			type:'POST',
			// 			url:'cycleRecette/Recettec/php/getSynth.php',
			// 			data:{mission_id:mission_id, cycleId:19},
			// 			success:function(e){
			// 				eo=""+e+"";
			// 				doc=eo.split(',');
			// 				document.getElementById("rc_Synthese_rc_Faible").checked=false;
			// 				document.getElementById("rc_Synthese_rc_Moyen").checked=false;
			// 				document.getElementById("rc_Synthese_rc_Eleve").checked=false;
			// 				document.getElementById("txt_Synthese_rc").value=doc[0];
			// 				if(doc[1]=='faible'){
			// 					document.getElementById("rc_Synthese_rc_Faible").checked=true;
			// 				}
			// 				else if(doc[1]=='moyen'){
			// 					document.getElementById("rc_Synthese_rc_Moyen").checked=true;
			// 				}
			// 				else if(doc[1]=='eleve'){
			// 					document.getElementById("rc_Synthese_rc_Eleve").checked=true;
			// 				}						
			// 			}
			// 		});
			
			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettec/php/getSynth.php',
				data:{mission_id:mission_id, cycleId:19},
				success:function(e){
					eo=""+e+"";
					
					doc=eo.split('*');
					document.getElementById("rc_Synthese_rc_Faible").checked=false;
					document.getElementById("rc_Synthese_rc_Moyen").checked=false;
					document.getElementById("rc_Synthese_rc_Eleve").checked=false;
					document.getElementById("txt_Synthese_rc").value=doc[0];
					if(doc[1]=='faible'){
						document.getElementById("rc_Synthese_rc_Faible").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rc_Synthese_rc_Moyen").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rc_Synthese_rc_Eleve").checked=true;
					}						
				}
			});
			$('#Int_Synthese_rc').show();
			$('#fancybox_rc').show();
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_rc">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_rc">
			</td>
		</tr>
	</table>
</div>