<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_rb').click(function(){
		$('#message_confirmation_slide_Synthese_rb').hide();
		$('#message_Slide_terminer_Question_rb').hide();
		// $('#Int_Synthese_rb').hide();
		// $('#interface_rb').hide();
		$('#fancybox_rb').hide();
		// $('#contenue_rsci').show();


			// tinay editer

			// $.ajax({
			// 			type:'POST',
			// 			url:'cycleRecette/Recetteb/php/getSynth.php',
			// 			data:{mission_id:mission_id, cycleId:18},
			// 			success:function(e){
			// 				eo=""+e+"";
			// 				doc=eo.split(',');
			// 				document.getElementById("rd_Synthese_rb_Faible").checked=false;
			// 				document.getElementById("rd_Synthese_rb_Moyen").checked=false;
			// 				document.getElementById("rd_Synthese_rb_Eleve").checked=false;
			// 				document.getElementById("txt_Synthese_rb").value=doc[0];
			// 				if(doc[1]=='faible'){
			// 					document.getElementById("rd_Synthese_rb_Faible").checked=true;
			// 				}
			// 				else if(doc[1]=='moyen'){
			// 					document.getElementById("rd_Synthese_rb_Moyen").checked=true;
			// 				}
			// 				else if(doc[1]=='eleve'){
			// 					document.getElementById("rd_Synthese_rb_Eleve").checked=true;
			// 				}						
			// 			}
			// 		});

			$.ajax({
				type:'POST',
				url:'cycleRecette/Recetteb/php/getSynth.php',
				data:{mission_id:mission_id, cycleId:18},
				success:function(e){
					eo=""+e+"";
					doc=eo.split('*');
					document.getElementById("rd_Synthese_rb_Faible").checked=false;
					document.getElementById("rd_Synthese_rb_Moyen").checked=false;
					document.getElementById("rd_Synthese_rb_Eleve").checked=false;
					document.getElementById("txt_Synthese_rb").value=doc[0];
					if(doc[1]=='faible'){
						document.getElementById("rd_Synthese_rb_Faible").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rd_Synthese_rb_Moyen").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rd_Synthese_rb_Eleve").checked=true;
					}						
				}
			});
			$('#Int_Synthese_rb').show();
			$('#fancybox_rb').show();
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_rb">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_rb">
			</td>
		</tr>
	</table>
</div>