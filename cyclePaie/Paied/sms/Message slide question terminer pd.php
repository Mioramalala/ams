<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_pd').click(function(){
		$('#message_confirmation_slide_Synthese_pd').hide();
		$('#message_Slide_terminer_Question_pd').hide();
		// $('#Int_Synthese_pd').hide();
		// $('#interface_pd').hide();
		$('#fancybox_pd').hide();
		// $('#contenue_rsci').show();

			// tinay editer
			
			// $.ajax({
			// 			type:'POST',
			// 			url:'cyclePaie/Paied/php/getSynth.php',
			// 			data:{mission_id:mission_id, cycleId:16},
			// 			success:function(e){
			// 				eo=""+e+"";
			// 				doc=eo.split(',');
			// 				document.getElementById("rd_Synthese_pd_Faible").checked=false;
			// 				document.getElementById("rd_Synthese_pd_Moyen").checked=false;
			// 				document.getElementById("rd_Synthese_pd_Eleve").checked=false;
			// 				document.getElementById("txt_Synthese_pd").value=doc[0];
			// 				if(doc[1]=='faible'){
			// 					document.getElementById("rd_Synthese_pd_Faible").checked=true;
			// 				}
			// 				else if(doc[1]=='moyen'){
			// 					document.getElementById("rd_Synthese_pd_Moyen").checked=true;
			// 				}
			// 				else if(doc[1]=='eleve'){
			// 					document.getElementById("rd_Synthese_pd_Eleve").checked=true;
			// 				}						
			// 			}
			// 		});
	
			$.ajax({
				type:'POST',
				url:'cyclePaie/Paied/php/getSynth.php',
				data:{mission_id:mission_id, cycleId:16},
				success:function(e){
					eo=""+e+"";
					doc=eo.split('*');
					document.getElementById("rd_Synthese_pd_Faible").checked=false;
					document.getElementById("rd_Synthese_pd_Moyen").checked=false;
					document.getElementById("rd_Synthese_pd_Eleve").checked=false;
					document.getElementById("txt_Synthese_pd").value=doc[0];
					if(doc[1]=='faible'){
						document.getElementById("rd_Synthese_pd_Faible").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rd_Synthese_pd_Moyen").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rd_Synthese_pd_Eleve").checked=true;
					}						
				}
			});
			$('#Int_Synthese_pd').show();
			$('#fancybox_pd').show();
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_pd">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_pd">
			</td>
		</tr>
	</table>
</div>