$(function(){
	//evenement de l'objectif b dans le menu auditeur
	/*$('#cycle_achat_B').click(function(){
		mission_id=document.getElementById("mission_id_index").value;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_B/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e1){
				if(e1>0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achat_load/load_b/load_rep_b.php',
						data:{mission_id:mission_id},
						success:function(e){
							$('#frm_tab_res_b').html(e).show();
							$('#dv_cont_obj_b').show();
							$('#contenue_rsci').hide();
							$('#Interface_Question_B').hide();
							$('#dv_table_b').show();
						}
					});					
				}
				else{
					$('#dv_cont_obj_b').show();
					$('#contenue_rsci').hide();
					$('#Interface_Question_B').show();
				}
			}
		});
	});*/


	//Evènement de la synthese de b
	$('#Synthese_B_Terminer').click(function(){
		if((document.getElementById("txt_Synthese_B").value=="") || (document.getElementById("rd_Synthese_B_Faible").checked==false && document.getElementById("rd_Synthese_B_Moyen").checked==false && document.getElementById("rd_Synthese_B_Eleve").checked==false)){
			$('#Int_Synthese_B').hide();
			$('#mess_vide_synthese_B').show();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("txt_Synthese_B").value;
			risque="faible";
			if(document.getElementById("rd_Synthese_B_Faible").checked==true){
				risque="faible";
			}
			else if(document.getElementById("rd_Synthese_B_Moyen").checked==true){
				risque="moyen";
			}
			else if(document.getElementById("rd_Synthese_B_Eleve").checked==true){
				risque="eleve";
			}
			synthese_b_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_synth_b_id.php',
				data:{mission_id:mission_id},
				success:function(e){
					synthese_b_id=e;
					if(synthese_b_id==0){
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/enreg_synth_b.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){
							}
						});
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/upd_synth_b.php',
							data:{mission_id:mission_id, commentaire:commentaire, risque:risque},
							success:function(){	
							}
						});
					}
					$('#Int_Synthese_B').hide();
					$('#message_Terminer_Synthese_B').show();
				}
			});
		}
	});

	$('#Question_B_1_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_B1").value=="") || (document.getElementById("rad_Question_Oui_B_1").checked==false && document.getElementById("rad_Question_NA_B_1").checked==false && document.getElementById("rad_Question_Non_B_1").checked==false)){
			$('#mess_quest_vide_B1').show();
			$('#Question_B_1').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B1").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_1").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_1").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_1").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:1, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){					
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 1);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:1},
							success:function(){
								$.ajax({
									type:'POST',
									url:'cycleAchat/cycle_achat_load/load_b/load_rep_b.php',
									data:{mission_id:mission_id},
									success:function(e){
										$('#Interface_Question_B').hide();
										$('#frm_tab_res_b').html(e).show();
										$('#dv_table_b').show();
									}
								});
							}
						});
					}
				}
			});

			$('#Question_B_1').fadeOut(500);
			$('#Question_B_2').fadeIn(500);
			$('#lb_veuillez_aff').hide();
		}
	});	
	//Evenement de message vide de la question B2
	$('#Question_B_2_Bouton').click(function(){
		if((document.getElementById("commentaire_Question_B2").value=="") || (document.getElementById("rad_Question_Oui_B_2").checked==false && document.getElementById("rad_Question_NA_B_2").checked==false && document.getElementById("rad_Question_Non_B_2").checked==false)){
			$('#mess_quest_vide_B2').show();
			$('#Question_B_2').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B2").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_2").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_2").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_2").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:2, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 2);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:2},
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
				}
			});
			$('#Question_B_2').fadeOut(500);
			$('#Question_B_3').fadeIn(500);
		}
	});	
	//Evenement de message vide de la question B3
	$('#Question_B_3_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B3").value=="") || (document.getElementById("rad_Question_Oui_B_3").checked==false && document.getElementById("rad_Question_NA_B_3").checked==false && document.getElementById("rad_Question_Non_B_3").checked==false)){
			$('#mess_quest_vide_B3').show();
			$('#Question_B_3').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B3").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_3").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_3").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_3").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:3, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 3);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:3},
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
				}
			});
			$('#Question_B_3').fadeOut(500);
			$('#Question_B_4').fadeIn(500);
		}
	});	
	//Evenement de message vide de la question B4
	$('#Question_B_4_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B4").value=="") || (document.getElementById("rad_Question_Oui_B_4").checked==false && document.getElementById("rad_Question_NA_B_4").checked==false && document.getElementById("rad_Question_Non_B_4").checked==false)){
			$('#mess_quest_vide_B4').show();
			$('#Question_B_4').hide();
		}
		else{
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
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:4, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 4);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:4},
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
				}
			});
			$('#Question_B_4').fadeOut(500);
			$('#Question_B_5').fadeIn(500);
		}
	});	
	//Evenement de message vide de la question B5
	$('#Question_B_5_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B5").value=="") || (document.getElementById("rad_Question_Oui_B_5").checked==false && document.getElementById("rad_Question_NA_B_5").checked==false && document.getElementById("rad_Question_Non_B_5").checked==false)){
			$('#mess_quest_vide_B5').show();
			$('#Question_B_5').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B5").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_5").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_5").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_5").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:5, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 5);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:5},
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
				}
			});
			$('#Question_B_5').fadeOut(500);
			$('#Question_B_6').fadeIn(500);
		}
	});	
		//Evenement de message vide de la question B6
	$('#Question_B_6_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B6").value=="") || (document.getElementById("rad_Question_Oui_B_6").checked==false && document.getElementById("rad_Question_NA_B_6").checked==false && document.getElementById("rad_Question_Non_B_6").checked==false)){
			$('#mess_quest_vide_B6').show();
			$('#Question_B_6').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B6").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_6").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_6").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_6").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:6, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 6);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:6},
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
				}
			});
			$('#Question_B_6').fadeOut(500);
			$('#Question_B_7').fadeIn(500);
		}
	});	
		//Evenement de message vide de la question B5
	$('#Question_B_7_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B7").value=="") || (document.getElementById("rad_Question_Oui_B_7").checked==false && document.getElementById("rad_Question_NA_B_7").checked==false && document.getElementById("rad_Question_Non_B_7").checked==false)){
			$('#mess_quest_vide_B7').show();
			$('#Question_B_7').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B7").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_7").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_7").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_7").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:7, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 7);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:7},
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
				}
			});
			$('#Question_B_7').fadeOut(500);
			$('#Question_B_8').fadeIn(500);
		}
	});	
		//Evenement de message vide de la question B8
	$('#Question_B_8_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B8").value=="") || (document.getElementById("rad_Question_Oui_B_8").checked==false && document.getElementById("rad_Question_NA_B_8").checked==false && document.getElementById("rad_Question_Non_B_8").checked==false)){
			$('#mess_quest_vide_B8').show();
			$('#Question_B_8').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B8").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_8").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_8").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_8").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:8, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 8);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:8},
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
				}
			});
			$('#Question_B_8').fadeOut(500);
			$('#Question_B_9').fadeIn(500);
		}
	});	
		//Evenement de message vide de la question B9
	$('#Question_B_9_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B9").value=="") || (document.getElementById("rad_Question_Oui_B_9").checked==false && document.getElementById("rad_Question_NA_B_9").checked==false && document.getElementById("rad_Question_Non_B_9").checked==false)){
			$('#mess_quest_vide_B9').show();
			$('#Question_B_9').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B9").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_9").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_9").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_9").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:9, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 9);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:9},
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
				}
			});
			$('#Question_B_9').fadeOut(500);
			$('#Question_B_10').fadeIn(500);
		}
	});	
	$('#Question_B_10_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B10").value=="") || (document.getElementById("rad_Question_Oui_B_10").checked==false && document.getElementById("rad_Question_NA_B_10").checked==false && document.getElementById("rad_Question_Non_B_10").checked==false)){
			$('#mess_quest_vide_B10').show();
			$('#Question_B_10').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B10").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_10").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_10").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_9").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:10, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 10);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:10},
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
				}
			});
			$('#Question_B_10').fadeOut(500);
			$('#Question_B_11').fadeIn(500);
		}
	});	
		$('#Question_B_11_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B11").value=="") || (document.getElementById("rad_Question_Oui_B_11").checked==false && document.getElementById("rad_Question_NA_B_11").checked==false && document.getElementById("rad_Question_Non_B_11").checked==false)){
			$('#mess_quest_vide_B11').show();
			$('#Question_B_11').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B11").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_11").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_11").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_11").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:11, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 11);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:11},
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
				}
			});
			$('#Question_B_11').fadeOut(500);
			$('#Question_B_12').fadeIn(500);
		}
	});	
		//Evenement de message vide de la question B12
	$('#Question_B_12_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B12").value=="") || (document.getElementById("rad_Question_Oui_B_12").checked==false && document.getElementById("rad_Question_NA_B_12").checked==false && document.getElementById("rad_Question_Non_B_12").checked==false)){
			$('#mess_quest_vide_B12').show();
			$('#Question_B_12').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B12").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_12").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_12").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_12").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:12, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 12);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:12},
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
				}
			});
			$('#Question_B_12').fadeOut(500);
			$('#Question_B_13').fadeIn(500);
		}
	});	
	//Evenement de message vide de la question B13
	$('#Question_B_13_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B13").value=="") || (document.getElementById("rad_Question_Oui_B_13").checked==false && document.getElementById("rad_Question_NA_B_13").checked==false && document.getElementById("rad_Question_Non_B_13").checked==false)){
			$('#mess_quest_vide_B13').show();
			$('#Question_B_13').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B13").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_13").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_13").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_13").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:13, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 13);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:13},
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
				}
			});
			$('#Question_B_13').fadeOut(500);
			$('#Question_B_14').fadeIn(500);
		}
	});	
	//Evenement de message vide de la question B14
	$('#Question_B_14_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B14").value=="") || (document.getElementById("rad_Question_Oui_B_14").checked==false && document.getElementById("rad_Question_NA_B_14").checked==false && document.getElementById("rad_Question_Non_B_14").checked==false)){
			$('#mess_quest_vide_B14').show();
			$('#Question_B_14').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B14").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_14").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_14").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_14").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:14, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 14);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:14},
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
				}
			});
			$('#Question_B_14').fadeOut(500);
			$('#Question_B_15').fadeIn(500);
		}
	});	
	//Evenement de message vide de la question B15
	$('#Question_B_15_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B15").value=="") || (document.getElementById("rad_Question_Oui_B_15").checked==false && document.getElementById("rad_Question_NA_B_15").checked==false && document.getElementById("rad_Question_Non_B_15").checked==false)){
			$('#mess_quest_vide_B15').show();
			$('#Question_B_15').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B15").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_15").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_15").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_15").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:15, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 15);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:15},
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
				}
			});
			$('#Question_B_15').fadeOut(500);
			$('#Question_B_16').fadeIn(500);
		}
	});	
		//Evenement de message vide de la question B16
	$('#Question_B_16_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B16").value=="") || (document.getElementById("rad_Question_Oui_B_16").checked==false && document.getElementById("rad_Question_NA_B_16").checked==false && document.getElementById("rad_Question_Non_B_16").checked==false)){
			$('#mess_quest_vide_B16').show();
			$('#Question_B_16').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B16").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_16").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_16").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_16").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:16, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 16);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:16},
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
				}
			});
			$('#Question_B_16').fadeOut(500);
			$('#Question_B_17').fadeIn(500);
		}
	});	
//Evenement de message vide de la question B17
	$('#Question_B_17_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B17").value=="") || (document.getElementById("rad_Question_Oui_B_17").checked==false && document.getElementById("rad_Question_NA_B_17").checked==false && document.getElementById("rad_Question_Non_B_17").checked==false)){
			$('#mess_quest_vide_B17').show();
			$('#Question_B_17').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B17").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_17").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_17").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_17").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:17, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 17);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:17},
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
				}
			});
			$('#Question_B_17').fadeOut(500);
			$('#Question_B_18').fadeIn(500);
		}
	});	
	//Evenement de message vide de la question B18
	$('#Question_B_18_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B18").value=="") || (document.getElementById("rad_Question_Oui_B_18").checked==false && document.getElementById("rad_Question_NA_B_18").checked==false && document.getElementById("rad_Question_Non_B_18").checked==false)){
			$('#mess_quest_vide_B18').show();
			$('#Question_B_18').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B18").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_18").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_18").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_18").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:18, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 18);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:18},
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
				}
			});
			$('#Question_B_18').fadeOut(500);
			$('#Question_B_19').fadeIn(500);
		}
	});
//Evenement de message vide de la question B19
	$('#Question_B_19_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B19").value=="") || (document.getElementById("rad_Question_Oui_B_19").checked==false && document.getElementById("rad_Question_NA_B_19").checked==false && document.getElementById("rad_Question_Non_B_19").checked==false)){
			$('#mess_quest_vide_B19').show();
			$('#Question_B_19').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B19").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_19").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_19").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_19").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:19, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 19);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:19},
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
				}
			});
			$('#Question_B_19').fadeOut(500);
			$('#Question_B_20').fadeIn(500);
		}
	});
	//Evenement de message vide de la question B20
	$('#Question_B_20_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B20").value=="") || (document.getElementById("rad_Question_Oui_B_20").checked==false && document.getElementById("rad_Question_NA_B_20").checked==false && document.getElementById("rad_Question_Non_B_20").checked==false)){
			$('#mess_quest_vide_B20').show();
			$('#Question_B_20').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B20").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_20").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_20").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_20").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:20, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 20);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:20},
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
				}
			});
			$('#Question_B_20').fadeOut(500);
			$('#Question_B_21').fadeIn(500);
		}
	});
	//Evenement de message vide de la question B21
	$('#Question_B_21_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B21").value=="") || (document.getElementById("rad_Question_Oui_B_21").checked==false && document.getElementById("rad_Question_NA_B_21").checked==false && document.getElementById("rad_Question_Non_B_21").checked==false)){
			$('#mess_quest_vide_B21').show();
			$('#Question_B_21').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B21").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_21").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_21").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_21").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:21, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 21);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:21},
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
				}
			});
			$('#Question_B_21').fadeOut(500);
			$('#Question_B_22').fadeIn(500);
		}
	});
	//Evenement de message vide de la question B22
	$('#Question_B_22_Bouton').click(function(){	
		if((document.getElementById("commentaire_Question_B22").value=="") || (document.getElementById("rad_Question_Oui_B_22").checked==false && document.getElementById("rad_Question_NA_B_22").checked==false && document.getElementById("rad_Question_Non_B_22").checked==false)){
			$('#mess_quest_vide_B22').show();
			$('#Question_B_22').hide();
		}
		else{
			mission_id=document.getElementById("txt_mission_id").value;
			commentaire=document.getElementById("commentaire_Question_B22").value;
			qcm="OUI";
			if(document.getElementById("rad_Question_Oui_B_22").checked==true){
				qcm="OUI";
			}
			else if(document.getElementById("rad_Question_NA_B_22").checked==true){
				qcm="N/A";
			}
			else if(document.getElementById("rad_Question_Non_B_22").checked==true){
				qcm="NON";
			}
			objectif_id=0;
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/detect_objectif_exist_B.php',
				data:{mission_id:mission_id, question_id:22, cycle_achat_id:2},
				success:function(e){
					objectif_id=e;
					if(objectif_id==0){
						enregistrer_commentaire_B(commentaire, qcm, mission_id, 22);
					}
					else{
						$.ajax({
							type:'POST',
							url:'cycleAchat/cycle_achatphp/get_B/update_achat_object_B.php',
							data:{commentaire:commentaire, qcm:qcm, question_id:22},
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
				}
			});
			$('#Question_B_22').fadeOut(500);
			$('#message_Terminer_question_B').show();
		}
	});
});

