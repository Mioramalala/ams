<script>
$(function(){
	$('#Conclusion_Continuation_ia
').click(function(){
		$('#message_Sup_Donnees_perdues').hide();
		openButSupia
();
	});
	$('#Conclusion_Add_ia
').click(function(){
		if((document.getElementById("commentaire_ia
").value=="") || (document.getElementById("conclus_ia
_faible").checked==false && document.getElementById("conclus_ia
_moyen").checked==false && document.getElementById("conclus_ia
_eleve").checked==false))
		{
			$('#mess_vide_conclusion_ia
').show();
			$('#message_Sup_Donnees_perdues').hide();
		}
		else{		
			mission_id=$('#mission_id_ia
').val();
			commentaire=$('#commentaire_ia
').val();
			risque="faible";
			if(document.getElementById("conclus_ia
_faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("conclus_ia
_moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("conclus_ia
_eleve").checked==true){
				risque="eleve";
			}
			$.ajax({
				type:'POST',
				url:'cycleRecette/recettea/php/enregistrer_conclusion_ia
.php',
				data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
				success:function(e){
					//alert(e);
					$('#contSupIa
').hide();
					$('#message_Slide_Conclusion_ia
').hide();
					$('#contRsciRecette').show();
					openButia
();
				}
			});
		}
	});
});
</script>

<div id="Int_Conclusion_Donnee_Perdu_ia
" align="center">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="Conclusion_Add_ia
" <?php if($commentaire != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="Conclusion_Continuation_ia
" >
			</td>
		</tr>
	</table>
</div>