<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_vf').click(function(){
		$('#message_confirmation_slide_Synthese_vf').hide();
		$('#message_Slide_terminer_Question_vf').hide();
		// $('#Int_Synthese_vf').hide();
		// $('#interface_vf').hide();
		$('#fancybox_vf').hide();
		// $('#contenue_rsci').show();

			// tinay editer

			// $.ajax({
			// 			type:'POST',
			// 			url:'cycleVente/Ventef/php/getSynth.php',
			// 			data:{mission_id:mission_id, cycleId:30},
			// 			success:function(e){
			// 				eo=""+e+"";
			// 				doc=eo.split(',');
			// 				document.getElementById("rd_Synthese_vf_Faible").checked=false;
			// 				document.getElementById("rd_Synthese_vf_Moyen").checked=false;
			// 				document.getElementById("rd_Synthese_vf_Eleve").checked=false;
			// 				document.getElementById("txt_Synthese_vf").value=doc[0];
			// 				if(doc[1]=='faible'){
			// 					document.getElementById("rd_Synthese_vf_Faible").checked=true;
			// 				}
			// 				else if(doc[1]=='moyen'){
			// 					document.getElementById("rd_Synthese_vf_Moyen").checked=true;
			// 				}
			// 				else if(doc[1]=='eleve'){
			// 					document.getElementById("rd_Synthese_vf_Eleve").checked=true;
			// 				}						
			// 			}
			// 		});
			
			$.ajax({
				type:'POST',
				url:'cycleVente/Ventef/php/getSynth.php',
				data:{mission_id:mission_id, cycleId:30},
				success:function(e){
					eo=""+e+"";
					doc=eo.split('*');
					document.getElementById("rd_Synthese_vf_Faible").checked=false;
					document.getElementById("rd_Synthese_vf_Moyen").checked=false;
					document.getElementById("rd_Synthese_vf_Eleve").checked=false;
					document.getElementById("txt_Synthese_vf").value=doc[0];
					if(doc[1]=='faible'){
						document.getElementById("rd_Synthese_vf_Faible").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rd_Synthese_vf_Moyen").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rd_Synthese_vf_Eleve").checked=true;
					}						
				}
			});
			$('#Int_Synthese_vf').show();
			$('#fancybox_vf').show();
	});
});
</script>
<div id="message_confirmation_slide_Synthese_vf">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_vf">
			</td>
		</tr>
	</table>
</div>