<?php // Les évènements des boutons sont dans l'interface_c ?>
<script>
$(function(){
	//--------------------Dans la boite de dialogue de message_Slide_terminer_Question_c
	$('#message__Slide_Ok_Question_pc').click(function(){

		$('#message_confirmation_slide_Synthese_pc').hide();
		$('#message_Slide_terminer_Question_pc').hide();
		// $('#Int_Synthese_pc').hide();
		// $('#interface_pc').hide();
		$('#fancybox_pc').hide();
		//$('#contenue_rsci').show();
		
		$.ajax({
			type:'POST',
			url:'cyclePaie/Paiec/php/getSynth.php',
			data:{mission_id:mission_id, cycleId:15},
			success:function(e){
				eo=""+e+"";
				doc=eo.split(',');
				document.getElementById("rd_Synthese_pc_Faible").checked=false;
				document.getElementById("rd_Synthese_pc_Moyen").checked=false;
				document.getElementById("rd_Synthese_pc_Eleve").checked=false;
				document.getElementById("txt_Synthese_pc").value=doc[0];
				if(doc[1]=='faible'){
					document.getElementById("rd_Synthese_pc_Faible").checked=true;
				}
				else if(doc[1]=='moyen'){
					document.getElementById("rd_Synthese_pc_Moyen").checked=true;
				}
				else if(doc[1]=='eleve'){
					document.getElementById("rd_Synthese_pc_Eleve").checked=true;
				}						
			}
		});

		$('#Int_Synthese_pc').show();
		$('#fancybox_pc').show();

		//$("#Int_pc_Synthese").click();
					
	});
});
</script>
<div id="message_confirmation_slide_Synthese_pc">
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
				<input type="button" value="OK" class="bouton" id="message__Slide_Ok_Question_pc">
			</td>
		</tr>
	</table>
</div>