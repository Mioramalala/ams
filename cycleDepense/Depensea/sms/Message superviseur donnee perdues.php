<script>
$(function(){
	$('#Conclusion_Continuation_da').click(function(){
		$('#message_Sup_Donnees_perdues').hide();
		openButSupda();
	});
	$('#Conclusion_Add_da').click(function(){
		if((document.getElementById("commentaire_da").value=="") || (document.getElementById("conclus_da_faible").checked==false && document.getElementById("conclus_da_moyen").checked==false && document.getElementById("conclus_da_eleve").checked==false))
		{
			$('#mess_vide_conclusion_da').show();
			$('#message_Sup_Donnees_perdues').hide();
		}
		else{		
			mission_id=$('#mission_id_da').val();
			commentaire=$('#commentaire_da').val();
			risque="faible";
			if(document.getElementById("conclus_da_faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("conclus_da_moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("conclus_da_eleve").checked==true){
				risque="eleve";
			}
			$.ajax({
				type:'POST',
				url:'cycleDepense/depensea/php/enregistrer_conclusion_da.php',
				data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
				success:function(e){
					alert(e);
					$('#contSupDa').hide();
					$('#message_Slide_Conclusion_da').hide();
					$('#contRsciDepense').show();
					openButda();
				}
			});
		}
	});
});
</script>

<div id="Int_Conclusion_Donnee_Perdu_da" align="center">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="Conclusion_Add_da" <?php if($commentaire != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="Conclusion_Continuation_da" >
			</td>
		</tr>
	</table>
</div>