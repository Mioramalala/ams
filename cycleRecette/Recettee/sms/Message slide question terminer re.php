<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_re').click(function(){
		$('#message_confirmation_slide_Synthese_re').hide();
		$('#message_Slide_terminer_Question_re').hide();
		// $('#Int_Synthese_re').hide();
		// $('#interface_re').hide();
		$('#fancybox_re').hide();
		// $('#contenue_rsci').show();

			// tinay editer

			// $.ajax({
			// 			type:'POST',
			// 			url:'cycleRecette/Recettee/php/getSynth.php',
			// 			data:{mission_id:mission_id, cycle_achat_id:21},
			// 			success:function(e){
			// 				eo=""+e+"";
			// 				doc=eo.split(',');
			// 				document.getElementById("re_Synthese_re_Faible").checked=false;
			// 				document.getElementById("re_Synthese_re_Moyen").checked=false;
			// 				document.getElementById("re_Synthese_re_Eleve").checked=false;
			// 				document.getElementById("txt_Synthese_re").value=doc[0];
			// 				if(doc[1]=='faible'){
			// 					document.getElementById("re_Synthese_re_Faible").checked=true;
			// 				}
			// 				else if(doc[1]=='moyen'){
			// 					document.getElementById("re_Synthese_re_Moyen").checked=true;
			// 				}
			// 				else if(doc[1]=='eleve'){
			// 					document.getElementById("re_Synthese_re_Eleve").checked=true;
			// 				}						
			// 			}
			// 		});

			$.ajax({
				type:'POST',
				url:'cycleRecette/Recettee/php/getSynth.php',
				data:{mission_id:mission_id, cycle_achat_id:21},
				success:function(e){
					eo=""+e+"";
					doc=eo.split('*');
					document.getElementById("re_Synthese_re_Faible").checked=false;
					document.getElementById("re_Synthese_re_Moyen").checked=false;
					document.getElementById("re_Synthese_re_Eleve").checked=false;
					document.getElementById("txt_Synthese_re").value=doc[0];
					if(doc[1]=='faible'){
						document.getElementById("re_Synthese_re_Faible").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("re_Synthese_re_Moyen").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("re_Synthese_re_Eleve").checked=true;
					}						
				}
			});
			$('#Int_Synthese_re').show();
			$('#fancybox_re').show();
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_re">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_re">
			</td>
		</tr>
	</table>
</div>