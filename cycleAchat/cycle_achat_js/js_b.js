  // $(document).ready(function() {
	// $('#Int_Synthese_B').draggable();
	// $('#int_conclusion_B_superviseur').draggable();
// });

function enregistrer_commentaire_B(commentaire, qcm, mission_id, question_id){
	$.ajax({
		type:'POST',
		url:'cycleAchat/cycle_achatphp/get_B/enregistrer_achat_object_B.php',
		data:{commentaire:commentaire, qcm:qcm, mission_id:mission_id, question_id:question_id},
		success:function(){
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achat_load/load_b/load_rep_b.php',
				data:{mission_id:mission_id},
				success:function(e){
					$('#Interface_Question_B').hide();
					$('#frm_tab_res_b').html(e).show();
				}
			 });
		}
	});
}
function select_tab(id, cpt, mission_id){
	quest_id="#Question_B_"+cpt;
	$.ajax({
		type:'POST',
		url:'cycleAchat/cycle_achatphp/get_B/getRepb.php',
		data:{cpt:cpt, mission_id:mission_id},
		success:function(e){
			doc=e.split(',');
			idcomment="#commentaire_Question_B"+cpt;
			idrisqueoui="rad_Question_Oui_B_"+cpt;
			idrisquena="rad_Question_NA_B_"+cpt;
			idrisquenon="rad_Question_Non_B_"+cpt;
			risque=doc[1];
			if(risque=="OUI"){
				document.getElementById(idrisqueoui).checked=true;
			}
			else if(risque=="N/A"){
				document.getElementById(idrisquena).checked=true;
			}
			else if(risque=="NON"){
				document.getElementById(idrisquenon).checked=true;
			}
			document.getElementById("int_B_Retour").disabled=true;
			document.getElementById("Int_B_Continuer").disabled=true;
			document.getElementById("Int_B_Synthese").disabled=true;
			$(idcomment).val(doc[0]);
			$(quest_id).show();			
		}
	});
}
$(function(){
	
	//Enregistre la coclusion de l'objectif B sup
	$('#enreg_conclus_B_sup').click(function(){
		mission_id=document.getElementById("tx_miss_conc_b").value;
		commentaire=document.getElementById("commentaire_Question_B_sup_conclusion").value;
		risque="faible";
		if(document.getElementById("rad_Conclus_Faible_b").checked==true){
		risque="faible";
		}
		if(document.getElementById("rad_Conclus_Moyen_b").checked==true){
		risque="moyen";
		}	
		if(document.getElementById("rad_Conclus_Eleve_b").checked==true){
		risque="eleve";
		}
		obj_concl_id_b=0;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_B/detect_concl_id_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				obj_concl_id_b=e;
				if(obj_concl_id_b==0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achatphp/get_B/enreg_concl_b.php',
						data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
						success:function(){
						}			
					});
				}
				else{
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achatphp/get_B/upd_concl_b.php',
						data:{commentaire:commentaire, risque:risque, obj_concl_id_b:obj_concl_id_b},
						success:function(){
						}
					});
				}
				$('#dv_cont_obj_sup_b').hide();
				$('#contenue_rsci').show();				
				$('#mess_Termine_conclusion_B_sup').hide();	
				$('#fancybox_bouton').hide();
			}
		});
	});
	//Continue la fermeture de la conclusion sans enregistrement dans l'objectif B sup
	$('#continue_fermer_conclus_B_sup').click(function(){
		$('#mess_Termine_conclusion_B_sup').hide();	
		$('#fancybox_bouton_b').hide();
	});

	//Fermeture de la question objectif vide B
	$('#fermer_mess_quest_vide').click(function(){
		$('#mess_quest_vide_B1').hide();
		$('#Question_B_1').show();
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

function click_eleve(){
	document.getElementById("rd_Synthese_B_Eleve").checked=true;
	document.getElementById("rd_Synthese_B_Moyen").checked=false;
	document.getElementById("rd_Synthese_B_Faible").checked=false;
}
function click_moyen(){
	document.getElementById("rd_Synthese_B_Eleve").checked=false;
	document.getElementById("rd_Synthese_B_Moyen").checked=true;
	document.getElementById("rd_Synthese_B_Faible").checked=false;
}
function click_faible(){
	document.getElementById("rd_Synthese_B_Eleve").checked=false;
	document.getElementById("rd_Synthese_B_Moyen").checked=false;
	document.getElementById("rd_Synthese_B_Faible").checked=true;
}
function update_commentaire_B(commentaire, qcm, question_id, mission_id){
	alert("updateooo");
	$.ajax({
		type:'POST',
		url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
		data:{commentaire:commentaire, qcm:qcm, question_id:question_id, mission_id:mission_id},
		success:function(){
			$.ajax({
				url:'cycleAchat/cycle_achat_load/load_b/load_rep_b.php',
				data:{mission_id:mission_id},
				success:function(e){
					$('#Interface_Question_B').html(e).show();
				}
			 });
		}
	});
}