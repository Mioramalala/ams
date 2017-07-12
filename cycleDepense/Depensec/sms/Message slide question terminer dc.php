<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_dc').click(function(){
		$('#message_confirmation_slide_Synthese_dc').hide();
		$('#message_Slide_terminer_Question_dc').hide();
		// $('#Int_Synthese_dc').hide();
		// $('#interface_dc').hide();
		$('#fancybox_dc').hide();
		// $('#contenue_rsci').show();

			// tinay editer

			// $.ajax({
			// 			type:'POST',
			// 			url:'cycleDepense/Depensec/php/getSynth.php',
			// 			data:{mission_id:mission_id, cycleId:23},
			// 			success:function(e){
			// 				eo=""+e+"";
			// 				doc=eo.split(',');
			// 				document.getElementById("rd_Synthese_dc_Faible").checked=false;
			// 				document.getElementById("rd_Synthese_dc_Moyen").checked=false;
			// 				document.getElementById("rd_Synthese_dc_Eleve").checked=false;
			// 				document.getElementById("txt_Synthese_dc").value=doc[0];
			// 				if(doc[1]=='faible'){
			// 					document.getElementById("rd_Synthese_dc_Faible").checked=true;
			// 				}
			// 				else if(doc[1]=='moyen'){
			// 					document.getElementById("rd_Synthese_dc_Moyen").checked=true;
			// 				}
			// 				else if(doc[1]=='eleve'){
			// 					document.getElementById("rd_Synthese_dc_Eleve").checked=true;
			// 				}						
			// 			}
			// 		});
			
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensec/php/getSynth.php',
				data:{mission_id:mission_id, cycleId:23},
				success:function(e){
					eo=""+e+"";
					doc=eo.split('*');
					document.getElementById("rd_Synthese_dc_Faible").checked=false;
					document.getElementById("rd_Synthese_dc_Moyen").checked=false;
					document.getElementById("rd_Synthese_dc_Eleve").checked=false;
					document.getElementById("txt_Synthese_dc").value=doc[0];
					if(doc[1]=='faible'){
						document.getElementById("rd_Synthese_dc_Faible").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rd_Synthese_dc_Moyen").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rd_Synthese_dc_Eleve").checked=true;
					}						
				}
			});
			$('#Int_Synthese_dc').show();
			$('#fancybox_dc').show();
	});
});
</script>
<div id="message_confirmation_slide_Synthese_dc">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_dc">
			</td>
		</tr>
	</table>
</div>