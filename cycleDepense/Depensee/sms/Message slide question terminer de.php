<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_de').click(function(){
		$('#message_confirmation_slide_Synthese_de').hide();
		$('#message_Slide_terminer_Question_de').hide();
		// $('#Int_Synthese_de').hide();
		// $('#interface_de').hide();
		$('#fancybox_de').hide();
		// $('#contenue_rsci').show();

			// tinay editer
			// $.ajax({
			// 			type:'POST',
			// 			url:'cycleDepense/Depensee/php/getSynth.php',
			// 			data:{mission_id:mission_id, cycleId:25},
			// 			success:function(e){
			// 				eo=""+e+"";
			// 				doc=eo.split(',');
			// 				document.getElementById("rd_Synthese_de_Faible").checked=false;
			// 				document.getElementById("rd_Synthese_de_Moyen").checked=false;
			// 				document.getElementById("rd_Synthese_de_Eleve").checked=false;
			// 				document.getElementById("txt_Synthese_de").value=doc[0];
			// 				if(doc[1]=='faible'){
			// 					document.getElementById("rd_Synthese_de_Faible").checked=true;
			// 				}
			// 				else if(doc[1]=='moyen'){
			// 					document.getElementById("rd_Synthese_de_Moyen").checked=true;
			// 				}
			// 				else if(doc[1]=='eleve'){
			// 					document.getElementById("rd_Synthese_de_Eleve").checked=true;
			// 				}						
			// 			}
			// 		});
			
			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensee/php/getSynth.php',
				data:{mission_id:mission_id, cycleId:25},
				success:function(e){
					eo=""+e+"";
					doc=eo.split('*');
					document.getElementById("rd_Synthese_de_Faible").checked=false;
					document.getElementById("rd_Synthese_de_Moyen").checked=false;
					document.getElementById("rd_Synthese_de_Eleve").checked=false;
					document.getElementById("txt_Synthese_de").value=doc[0];
					if(doc[1]=='faible'){
						document.getElementById("rd_Synthese_de_Faible").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rd_Synthese_de_Moyen").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rd_Synthese_de_Eleve").checked=true;
					}						
				}
			});
			$('#Int_Synthese_de').show();
			$('#fancybox_de').show();
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_de">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_de">
			</td>
		</tr>
	</table>
</div>