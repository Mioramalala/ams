<script>
$(function(){
	$('#Conclusion_Continuation_sta').click(function(){
		$('#message_Sup_Donnees_perdues').hide();
		openButSupsta();
	});
	$('#Conclusion_Add_sta').click(function(){
		if((document.getElementById("commentaire_sta").value=="") || (document.getElementById("conclus_sta_faible").checked==false && document.getElementById("conclus_sta_moyen").checked==false && document.getElementById("conclus_sta_eleve").checked==false))
		{
			$('#mess_vide_conclusion_sta').show();
			$('#message_Sup_Donnees_perdues').hide();
		}
		else{		
			mission_id=$('#mission_id_sta').val();
			commentaire=$('#commentaire_sta').val();
			risque="faible";
			if(document.getElementById("conclus_sta_faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("conclus_sta_moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("conclus_sta_eleve").checked==true){
				risque="eleve";
			}
			$.ajax({
				type:'POST',
				url:'cycleStock/stocka/php/enregistrer_conclusion_sta.php',
				data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
				success:function(e){
					alert(e);
					$('#contSupSta').hide();
					$('#message_Slide_Conclusion_sta').hide();
					$('#contRsciStock').show();
					openButsta();
				}
			});
		}
	});
});
</script>

<div id="Int_Conclusion_Donnee_Perdu_sta" align="center">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="Conclusion_Add_sta" <?php if($commentaire != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="Conclusion_Continuation_sta" >
			</td>
		</tr>
	</table>
</div>