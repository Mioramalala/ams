<script>
$(function(){
	$('#Conclusion_Continuation_concl').click(function(){
		$('#message_Sup_Donnees_perdues').hide();
		openButSupConcl();
	});
	$('#Conclusion_Add_concl').click(function(){
		if((document.getElementById("commentaire_concl").value=="") || (document.getElementById("conclus_concl_faible").checked==false && document.getElementById("conclus_concl_moyen").checked==false && document.getElementById("conclus_concl_eleve").checked==false))
		{
			$('#mess_vide_conclusion_concl').show();
			$('#message_Sup_Donnees_perdues').hide();
		}
		else{		
			mission_id=$('#mission_id_concl').val();
			commentaire=$('#commentaire_concl').val();
			risque="faible";
			if(document.getElementById("conclus_concl_faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("conclus_concl_moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("conclus_concl_eleve").checked==true){
				risque="eleve";
			}
			$.ajax({
				type:'POST',
				url:'cycleRecette/recettea/php/enregistrer_conclusion_concl.php',
				data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
				success:function(e){
					//alert(e);
					$('#contSupConcl').hide();
					$('#message_Slide_Conclusion_concl').hide();
					$('#contRsciInfo').show();
					openButconcl();
				}
			});
		}
	});
});
</script>

<div id="Int_Conclusion_Donnee_Perdu_concl" align="center">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="Conclusion_Add_concl" <?php if($commentaire != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="Conclusion_Continuation_concl" >
			</td>
		</tr>
	</table>
</div>