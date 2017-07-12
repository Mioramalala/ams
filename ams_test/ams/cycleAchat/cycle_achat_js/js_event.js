	var fonct_achat_A_id;
	var detect_achat_A_existant;
	var fonct_achat_A_id_2;
	
	
	// function select_risque_A_sup(id, pers_id, mission_id,cpt){
		// alert("pers_id = "+pers_id);
		// alert("mission_id ="+missionId);
		// idet="risque_A_sup"+cpt;
		// risque= document.getElementById(idet).value;
		// alert(document.getElementById(idet).value);
		// $.ajax({
			// type:'POST',
			// url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_risque_id_existant_A.php',
			// data:{pers_id:pers_id, mission_id:mission_id},
			// success:function(e){
				// risque_A_id=e;
				// if(risque_A_id==0){
					// enregistrer_risque_A(pers_id, mission_id, risque);
				// }
				// else{
					// update_risque(risque_A_id, risque);
				// }
			// }
		// });
	// }
	
	function select_risque_A_t(id, pers_id, mission_id,cpt){
		// alert("pers_id = "+pers_id);
		// alert("mission_id ="+missionId);
		idet="risque_A"+cpt;
		risque= document.getElementById(idet).value;
		// alert(document.getElementById(idet).value);
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_risque_id_existant_A.php',
			data:{pers_id:pers_id, mission_id:mission_id},
			success:function(e){
				risque_A_id=e;
				if(risque_A_id==0){
					enregistrer_risque_A(pers_id, mission_id, risque);
				}
				else{
					update_risque(risque_A_id, risque);
				}
			}
		});
	}
	function update_risque(risque_A_id, risque){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/update_risque_A.php',
			data:{risque_A_id:risque_A_id, risque:risque},
			success:function(){
			}
		});
	}
	
	function enregistrer_risque_A(pers_id, mission_id, risque){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/enregistrer_risque_A.php',
			data:{pers_id:pers_id, mission_id:mission_id, risque:risque},
			success:function(){
			}
		});
	}
	function compte_cpt_22(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_22=e;	
				if(document.getElementById("_22"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_22==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_22);
						}
					}
				else if(document.getElementById("_22"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_22);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_21(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_21=e;	
				if(document.getElementById("_21"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_21==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_21);
						}
					}
				else if(document.getElementById("_21"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_21);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_20(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_20=e;	
				if(document.getElementById("_20"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_20==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_20);
						}
					}
				else if(document.getElementById("_20"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_20);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_19(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_19=e;	
				if(document.getElementById("_19"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_19==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_19);
						}
					}
				else if(document.getElementById("_19"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_19);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_18(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_18=e;	
				if(document.getElementById("_18"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_18==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_18);
						}
					}
				else if(document.getElementById("_18"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_18);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_17(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_17=e;	
				if(document.getElementById("_17"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_17==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_17);
						}
					}
				else if(document.getElementById("_17"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_17);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_16(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_16=e;	
				if(document.getElementById("_16"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_16==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_16);
						}
					}
				else if(document.getElementById("_16"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_16);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_15(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_15=e;	
				if(document.getElementById("_15"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_15==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_15);
						}
					}
				else if(document.getElementById("_15"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_15);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_14(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_14=e;	
				if(document.getElementById("_14"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_14==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_14);
						}
					}
				else if(document.getElementById("_14"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_14);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_13(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_13=e;	
				if(document.getElementById("_13"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_13==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_13);
						}
					}
				else if(document.getElementById("_13"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_13);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	
	function compte_cpt_12(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_12=e;	
				if(document.getElementById("_12"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_12==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_12);
						}
					}
				else if(document.getElementById("_12"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_12);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	
	function compte_cpt_11(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_11=e;	
				if(document.getElementById("_11"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_11==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_11);
						}
					}
				else if(document.getElementById("_11"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_11);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_10(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_10=e;	
				if(document.getElementById("_10"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_10==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_10);
						}
					}
				else if(document.getElementById("_10"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_10);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_9(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_9=e;	
				if(document.getElementById("_9"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_9==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_9);
						}
					}
				else if(document.getElementById("_9"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_9);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_8(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_8=e;	
				if(document.getElementById("_8"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_8==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_8);
						}
					}
				else if(document.getElementById("_8"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_8);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_7(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_7=e;	
				if(document.getElementById("_7"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_7==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_7);
						}
					}
				else if(document.getElementById("_7"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_7);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_6(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_6=e;	
				if(document.getElementById("_6"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_6==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_6);
						}
					}
				else if(document.getElementById("_6"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_6);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	function compte_cpt_5(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_5=e;	
				if(document.getElementById("_5"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_5==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_5);
						}
					}
				else if(document.getElementById("_5"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_5);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	
	function compte_cpt_4(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_4=e;	
				if(document.getElementById("_4"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_4==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_4);
						}
					}
				else if(document.getElementById("_4"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_4);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}

	function compte_cpt_3(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_3=e;	
				if(document.getElementById("_3"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_3==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_3);
						}
					}
				else if(document.getElementById("_3"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_3);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	
	function compte_cpt_2(id, pers_id, ligne, id, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			data:{personnelId:pers_id, ligne:ligne, missionId:missionId},
			success:function(e){	
				detect_achat_A_existant_2=e;				
				if(document.getElementById("_2"+id).checked==true){
						result=1;
						if(detect_achat_A_existant_2==0) {
							enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						}
						else{
							update_fonction_achat_A(result, detect_achat_A_existant_2);
						}
					}
				else if(document.getElementById("_2"+id).checked==false){
						result=0;
						update_fonction_achat_A(result, detect_achat_A_existant_2);
						supprimer_synthese_conclusion(mission_id);
					}
				}
		});	
	}
	
	// function compte_cpt(id,cpt){
		// alert("hihihi");
		// $.ajax({
			// type:'POST',
			// url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_enregistrement_existant_A1.php',
			// data:{poste_id:poste_id, ligne:ligne, mission_id:mission_id},
			// success:function(e){	
				// detect_achat_A_existant=e;	
				// alert(e);
					// if(document.getElementById("_"+id).checked==true){
						// result=1;
						// if(detect_achat_A_existant==0) {
							// enregistrer_fonction_achat_A(pers_id, ligne, result, missionId);
						// }
						// else{
							// update_fonction_achat_A(result, detect_achat_A_existant);
						// }						
					// }
					// else if(document.getElementById("_"+id).checked==false){
						// result=0;
						// update_fonction_achat_A(result, detect_achat_A_existant);
						// supprimer_synthese_conclusion(mission_id);
					// }					
				// }
		// });
	// }

	function supprimer_synthese_conclusion(mission_id){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/suppr_synth.php',
			data:{mission_id:mission_id},
			success:function(){	
			}
		});
	}
	
	function enregistrer_fonction_achat_A(personnelId, ligne, result, missionId){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/get_achat_A1.php',
			data:{missionId:missionId, personnelId:personnelId, ligne:ligne, result:result},
			success:function(e){
				fonct_achat_A_id=e;
			}
		});
	}
	
	function update_fonction_achat_A(result, fonct_achat_id){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/update_achat_A1.php',
			data:{result:result, fonct_achat_id:fonct_achat_id},
			success:function(){
			}
		});
	}
	
	function enregistrer_synthese_A(commentaire, risque, mission_id){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/enregistrer_synthese_A.php',
			data:{commentaire:commentaire, risque:risque, mission_id:mission_id},
			success:function(){
			}
		});
	}
	
	function update_synthese_A(synthese_id, commentaire, risque){
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/update_synthese_A.php',
			data:{synthese_id:synthese_id, commentaire:commentaire, risque:risque},
			success:function(){
			}		
		});
	}
	

$(function(){

	

	$('#Synthese_A_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_A").value=="")||(document.getElementById("rd_Synthese_A_Faible").checked==false && document.getElementById("rd_Synthese_A_Moyen").checked==false && document.getElementById("rd_Synthese_A_Eleve").checked==false)){
			$('#message_Synthese_a').hide();
			$('#mess_vide_synthese_A').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("txt_Synthese_A").value;
			risque = "faible";
			if(document.getElementById("rd_Synthese_A_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_A_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_A_Eleve").checked==true){
				risque="eleve";
			}
			synthese_id_A=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/detect_synthese_existant_A.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_id_A=e;
					if(synthese_id_A==0){
						enregistrer_synthese_A(commentaire, risque, mission_id);
					}
					else{
						update_synthese_A(synthese_id_A, commentaire, risque);
					}
				}
			});
			$('#message_Synthese_Terminer').show();
			$('#message_Synthese_a').hide();
		}
	});

	$('#fermer_mess_vide_synth_A').click(function(){
		$('#mess_vide_synthese_A').hide();
		$('#message_Synthese_a').show();
	});
	
	$('#fermer_mess_vide_conclus_A').click(function(){
		$('#mess_vide_conclusion_A').hide();
		$('#interface_A_Conclusion_Superviseur').show();
	});
	
	$('#fermer_mess_synth_vide_B').click(function(){
		$('#mess_vide_synthese_B').hide();
		$('#Int_Synthese_B').show();
	});
	
});

