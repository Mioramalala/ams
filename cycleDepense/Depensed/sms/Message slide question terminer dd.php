<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_dd').click(function(){
		$('#message_confirmation_slide_Synthese_dd').hide();
		$('#message_Slide_terminer_Question_dd').hide();
		// $('#Int_Synthese_dd').hide();
		// $('#interface_dd').hide();
		$('#fancybox_dd').hide();
		// $('#contenue_rsci').show();

			//tinay editer

			// $.ajax({
			// 			type:'POST',
			// 			url:'cycleDepense/Depensed/php/getSynth.php',
			// 			data:{mission_id:mission_id, cycleId:24},
			// 			success:function(e){
			// 				eo=""+e+"";
			// 				doc=eo.split(',');
			// 				document.getElementById("rd_Synthese_dd_Faible").checked=false;
			// 				document.getElementById("rd_Synthese_dd_Moyen").checked=false;
			// 				document.getElementById("rd_Synthese_dd_Eleve").checked=false;
			// 				document.getElementById("txt_Synthese_dd").value=doc[0];
			// 				if(doc[1]=='faible'){
			// 					document.getElementById("rd_Synthese_dd_Faible").checked=true;
			// 				}
			// 				else if(doc[1]=='moyen'){
			// 					document.getElementById("rd_Synthese_dd_Moyen").checked=true;
			// 				}
			// 				else if(doc[1]=='eleve'){
			// 					document.getElementById("rd_Synthese_dd_Eleve").checked=true;
			// 				}						
			// 			}
			// 		});

			$.ajax({
				type:'POST',
				url:'cycleDepense/Depensed/php/getSynth.php',
				data:{mission_id:mission_id, cycleId:24},
				success:function(e){
					eo=""+e+"";
					doc=eo.split('*');
					document.getElementById("rd_Synthese_dd_Faible").checked=false;
					document.getElementById("rd_Synthese_dd_Moyen").checked=false;
					document.getElementById("rd_Synthese_dd_Eleve").checked=false;
					document.getElementById("txt_Synthese_dd").value=doc[0];
					if(doc[1]=='faible'){
						document.getElementById("rd_Synthese_dd_Faible").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rd_Synthese_dd_Moyen").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rd_Synthese_dd_Eleve").checked=true;
					}						
				}
			});
			$('#Int_Synthese_dd').show();
			$('#fancybox_dd').show();
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_dd">
	<table width="500">
		<tr style="height:20px">
			<td style="height:20px">
			</td>
		</tr>
		<tr>
			<td class="td_Contenue_Message" height="50" align="center">Veuillez maintenant saisir le synthèse</td>
		</tr>
		<tr>
			<td align="center">
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_dd">
			</td>
		</tr>
	</table>
</div>