<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_vb').click(function(){
		$('#message_confirmation_slide_Synthese_vb').hide();
		$('#message_Slide_terminer_Question_vb').hide();
		// $('#Int_Synthese_vb').hide();
		// $('#interface_vb').hide();
		$('#fancybox_vb').hide();
		// $('#contenue_rsci').show();
		// //**//

			// tinay editer
			$("#Int_vb_Synthese").click();
			// $.ajax({
			// 			type:'POST',
			// 			url:'cycleVente/Venteb/php/getSynth.php',
			// 			data:{mission_id:mission_id, cycleId:26},
			// 			success:function(e){
			// 				eo=""+e+"";
			// 				doc=eo.split(',');
			// 				document.getElementById("rd_Synthese_vb_Faible").checked=false;
			// 				document.getElementById("rd_Synthese_vb_Moyen").checked=false;
			// 				document.getElementById("rd_Synthese_vb_Eleve").checked=false;
			// 				document.getElementById("txt_Synthese_vb").value=doc[0];
			// 				if(doc[1]=='faible'){
			// 					document.getElementById("rd_Synthese_vb_Faible").checked=true;
			// 				}
			// 				else if(doc[1]=='moyen'){
			// 					document.getElementById("rd_Synthese_vb_Moyen").checked=true;
			// 				}
			// 				else if(doc[1]=='eleve'){
			// 					document.getElementById("rd_Synthese_vb_Eleve").checked=true;
			// 				}						
			// 			}
			// 		});
			
			// $.ajax({
			// 	type:'POST',
			// 	url:'cycleVente/Venteb/php/getSynth.php',
			// 	data:{mission_id:mission_id, cycleId:26},
			// 	success:function(e){
			// 		eo=""+e+"";
			// 		doc=eo.split(',');
			// 		document.getElementById("rd_Synthese_vb_Faible").checked=false;
			// 		document.getElementById("rd_Synthese_vb_Moyen").checked=false;
			// 		document.getElementById("rd_Synthese_vb_Eleve").checked=false;
			// 		document.getElementById("txt_Synthese_vb").value=doc[0];
			// 		if(doc[1]=='faible'){
			// 			document.getElementById("rd_Synthese_vb_Faible").checked=true;
			// 		}
			// 		else if(doc[1]=='moyen'){
			// 			document.getElementById("rd_Synthese_vb_Moyen").checked=true;
			// 		}
			// 		else if(doc[1]=='eleve'){
			// 			document.getElementById("rd_Synthese_vb_Eleve").checked=true;
			// 		}						
			// 	}
			// });
			// $('#Int_Synthese_vb').show();
			// $('#fancybox_vb').show();
					
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_vb">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_vb">
			</td>
		</tr>
	</table>
</div>