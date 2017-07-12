	// $(document).ready(function() {
		// $('#message_Synthese').draggable();
		// $('#interface_A_Conclusion_Superviseur').draggable();
	// });
	
	
$(function(){	
	$('#conclus_A').click(function(){	
		if((document.getElementById("commentaire_Question_conclus_A").value=="") || (document.getElementById("rad_Conclus_Faible").checked==false && document.getElementById("rad_Conclus_Moyen").checked==false && document.getElementById("rad_Conclus_Eleve").checked==false)){
			$('#interface_A_Conclusion_Superviseur').hide();
			$('#mess_vide_conclusion_A').show();
		}
		else{
			cycle_id=1;
			mission_id=document.getElementById("mission_id").value;
			commentaire=document.getElementById("commentaire_Question_conclus_A").value;
			risque = "faible";
			if(document.getElementById("rad_Conclus_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rad_Conclus_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rad_Conclus_Eleve").checked==true){
				risque="eleve";
			}
			conclusion_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_conclusion_id_A.php',
				data:{cycle_id:cycle_id, mission_id:mission_id},
				success:function(e){
					conclusion_id=e;
					if(conclusion_id==0){					
						enregistrer_conclusion_A(commentaire, risque, mission_id, cycle_id);
					}
					else{
						update_conclusion(commentaire, risque, conclusion_id);
					}
				}
			})
			$('#interface_A_Conclusion_Superviseur').hide();
			$('#Message_Conclusion_A_Terminer').show();
		}
	});
});
	function enregistrer_conclusion_A(commentaire, risque, mission_id, cycle_id){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/enregistrer_conclusion_A.php',
			data:{commentaire:commentaire, risque:risque, mission_id:mission_id, cycle_id:cycle_id},
			success:function(){
			}
		});
	}
	
	function update_conclusion(commentaire, risque, conclusion_id){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/update_conclusion_A.php',
			data:{commentaire:commentaire, risque:risque, conclusion_id:conclusion_id},
			success:function(){
			}
		});
	}