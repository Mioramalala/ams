<script>
$(function(){
	$('#Conclusion_Continuation_ib
').click(function(){
		$('#message_Sup_Donnees_perdues').hide();
		openButSupib
();
	});
	$('#Conclusion_Add_ib
').click(function(){
		if((document.getElementById("commentaire_ib
").value=="") || (document.getElementById("conclus_ib
_faible").checked==false && document.getElementById("conclus_ib
_moyen").checked==false && document.getElementById("conclus_ib
_eleve").checked==false))
		{
			$('#mess_vide_conclusion_ib
').show();
			$('#message_Sup_Donnees_perdues').hide();
		}
		else{		
			mission_id=$('#mission_id_ib
').val();
			commentaire=$('#commentaire_ib
').val();
			risque="faible";
			if(document.getElementById("conclus_ib
_faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("conclus_ib
_moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("conclus_ib
_eleve").checked==true){
				risque="eleve";
			}
			$.ajax({
				type:'POST',
				url:'cycleRecette/recettea/php/enregistrer_conclusion_ib
.php',
				data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
				success:function(e){
					//alert(e);
					$('#contSupIa
').hide();
					$('#message_Slide_Conclusion_ib
').hide();
					$('#contRsciRecette').show();
					openButib
();
				}
			});
		}
	});
});
</script>

<div id="Int_Conclusion_Donnee_Perdu_ib
" align="center">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="Conclusion_Add_ib
" <?php if($commentaire != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="Conclusion_Continuation_ib
" >
			</td>
		</tr>
	</table>
</div>