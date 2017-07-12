$(function(){

	//Fermeture de la question ojectif vide B2
	$('#fermer_mess_quest_vide_B2').click(function(){
		$('#mess_quest_vide_B2').hide();
		$('#Question_B_2').show();
	});		
	//Fermeture de la question ojectif vide B3
	$('#fermer_mess_quest_vide_B3').click(function(){
		$('#mess_quest_vide_B3').hide();
		$('#Question_B_3').show();
	});	
	//Fermeture de la question ojectif vide B4
	$('#fermer_mess_quest_vide_B4').click(function(){
		$('#mess_quest_vide_B4').hide();
		$('#Question_B_4').show();
	});	
	//Fermeture de la question ojectif vide B5
	$('#fermer_mess_quest_vide_B5').click(function(){
		$('#mess_quest_vide_B5').hide();
		$('#Question_B_5').show();
	});	
	//Fermeture de la question ojectif vide B6
	$('#fermer_mess_quest_vide_B6').click(function(){
		$('#mess_quest_vide_B6').hide();
		$('#Question_B_6').show();
	});	
	//Fermeture de la question ojectif vide B7
	$('#fermer_mess_quest_vide_B7').click(function(){
		$('#mess_quest_vide_B7').hide();
		$('#Question_B_7').show();
	});	
	//Fermeture de la question ojectif vide B8
	$('#fermer_mess_quest_vide_B8').click(function(){
		$('#mess_quest_vide_B8').hide();
		$('#Question_B_8').show();
	});	
	//Fermeture de la question ojectif vide B9
	$('#fermer_mess_quest_vide_B9').click(function(){
		$('#mess_quest_vide_B9').hide();
		$('#Question_B_9').show();
	});	
	//Fermeture de la question ojectif vide B10
	$('#fermer_mess_quest_vide_B10').click(function(){
		$('#mess_quest_vide_B10').hide();
		$('#Question_B_10').show();
	});	
	//Fermeture de la question ojectif vide B11
	$('#fermer_mess_quest_vide_B11').click(function(){
		$('#mess_quest_vide_B11').hide();
		$('#Question_B_11').show();
	});	
	//Fermeture de la question ojectif vide B12
	$('#fermer_mess_quest_vide_B12').click(function(){
		$('#mess_quest_vide_B12').hide();
		$('#Question_B_12').show();
	});	
	//Fermeture de la question ojectif vide B13
	$('#fermer_mess_quest_vide_B13').click(function(){
		$('#mess_quest_vide_B13').hide();
		$('#Question_B_13').show();
	});	
	//Fermeture de la question ojectif vide B14
	$('#fermer_mess_quest_vide_B14').click(function(){
		$('#mess_quest_vide_B14').hide();
		$('#Question_B_14').show();
	});	
	//Fermeture de la question ojectif vide B15
	$('#fermer_mess_quest_vide_B15').click(function(){
		$('#mess_quest_vide_B15').hide();
		$('#Question_B_15').show();
	});	
	//Fermeture de la question ojectif vide B16
	$('#fermer_mess_quest_vide_B16').click(function(){
		$('#mess_quest_vide_B16').hide();
		$('#Question_B_16').show();
	});	
	//Fermeture de la question ojectif vide B17
	$('#fermer_mess_quest_vide_B17').click(function(){
		$('#mess_quest_vide_B17').hide();
		$('#Question_B_17').show();
	});	
	//Fermeture de la question ojectif vide B18
	$('#fermer_mess_quest_vide_B18').click(function(){
		$('#mess_quest_vide_B18').hide();
		$('#Question_B_18').show();
	});	
	//Fermeture de la question ojectif vide B19
	$('#fermer_mess_quest_vide_B19').click(function(){
		$('#mess_quest_vide_B19').hide();
		$('#Question_B_19').show();
	});	
	//Fermeture de la question ojectif vide B20
	$('#fermer_mess_quest_vide_B20').click(function(){
		$('#mess_quest_vide_B20').hide();
		$('#Question_B_20').show();
	});	
	//Fermeture de la question ojectif vide B21
	$('#fermer_mess_quest_vide_B21').click(function(){
		$('#mess_quest_vide_B21').hide();
		$('#Question_B_21').show();
	});	
	//Fermeture de la question ojectif vide B22
	$('#fermer_mess_quest_vide_B22').click(function(){
		$('#mess_quest_vide_B22').hide();
		$('#Question_B_22').show();
	});	

});

function enregistrer_tous_objectif_B(question_id, cycle_achat_id){
		mission_id=document.getElementById("txt_mission_id").value;
		commentaire=document.getElementById("commentaire_Question_B4").value;
		qcm="OUI";
		if(document.getElementById("rad_Question_Oui_B_4").checked==true){
			qcm="OUI";
		}
		else if(document.getElementById("rad_Question_NA_B_4").checked==true){
			qcm="N/A";
		}
		else if(document.getElementById("rad_Question_Non_B_4").checked==true){
			qcm="NON";
		}
		alert("atoo");
		// objectif_id=0;
		// $.ajax({
			// type:'POST',
			// url:'../cycle_achatphp/get_B/detect_objectif_exist_B.php',
			// data:{mission_id:mission_id, question_id:question_id, cycle_achat_id:cycle_achat_id},
			// success:function(e){
				// objectif_id=e;
				// if(objectif_id==0){
					// enregistrer_commentaire_B(commentaire, qcm, mission_id, question_id);
				// }
				// else{
					// update_commentaire_B(commentaire, qcm, question_id);
				// }
			// }
		// });
}



