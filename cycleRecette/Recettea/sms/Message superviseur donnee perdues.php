<script>
$(function(){
	$('#Conclusion_Continuation_ra').click(function(){
		$('#message_Sup_Donnees_perdues').hide();
		openButSupra();
	});
	$('#Conclusion_Add_ra').click(function(){
		if((document.getElementById("commentaire_ra").value=="") || (document.getElementById("conclus_ra_faible").checked==false && document.getElementById("conclus_ra_moyen").checked==false && document.getElementById("conclus_ra_eleve").checked==false))
		{
			$('#mess_vide_conclusion_ra').show();
			$('#message_Sup_Donnees_perdues').hide();
		}
		else{		
			mission_id=$('#mission_id_ra').val();
			commentaire=$('#commentaire_ra').val();
			risque="faible";
			if(document.getElementById("conclus_ra_faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("conclus_ra_moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("conclus_ra_eleve").checked==true){
				risque="eleve";
			}
			$.ajax({
				type:'POST',
				url:'cycleRecette/recettea/php/enregistrer_conclusion_ra.php',
				data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
				success:function(e){
					alert(e);
					$('#contSupRa').hide();
					$('#message_Slide_Conclusion_ra').hide();
					$('#contRsciRecette').show();
					openButra();
				}
			});
		}
	});
});
</script>

<div id="Int_Conclusion_Donnee_Perdu_ra" align="center">
	<table>
		<tr class="label" height="50">
			<td align="center">Attention toutes les données seront perdues</td>
		</tr>
		<tr>
			<td height="50" align="center">
				<input type="button" value="Enregistrer" class="bouton" id="Conclusion_Add_ra" <?php if($commentaire != "") echo 'disabled'; ?> >&nbsp;&nbsp;&nbsp;
				<input type="button" value="Continuer" class="bouton" id="Conclusion_Continuation_ra" >
			</td>
		</tr>
	</table>
</div>