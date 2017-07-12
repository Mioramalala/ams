$(function(){

	// $('#bt_achat').click(function(){
		// $('#dv_cont_menu_rsci').hide();
		// $('#contenue_rsci').show();
	// });



	$('#cycle_achat_D').click(function(){
		$('#image_Bleu_A').hide();
		$('#image_Bleu_B').hide();
		$('#image_Bleu_C').hide();
		$('#image_Bleu_D').show();
		$('#image_Bleu_E').hide();
		$('#image_Bleu_F').hide();
		
		$('#interface_A').hide();
	});
	$('#cycle_achat_E').click(function(){
		$('#image_Bleu_A').hide();
		$('#image_Bleu_B').hide();
		$('#image_Bleu_C').hide();
		$('#image_Bleu_D').hide();
		$('#image_Bleu_E').show();
		$('#image_Bleu_F').hide();
		
		$('#interface_A').hide();
	});
	$('#cycle_achat_F').click(function(){
		$('#image_Bleu_A').hide();
		$('#image_Bleu_B').hide();
		$('#image_Bleu_C').hide();
		$('#image_Bleu_D').hide();
		$('#image_Bleu_E').hide();
		$('#image_Bleu_F').show();
		
		$('#interface_A').hide();
	});
	
	$('#message__Slide_vide_a').click(function(){
		$('#fancybox').hide();
		$('#mess_vide_a').hide();
	});
	
	$('#message__Slide_vide_concl_a').click(function(){
		$('#fancybox_sup_btn').hide();
		$('#mess_pas_synth').hide();
	});
	
	$('#Int_A_Suivant').click(function(){
		mission_id=document.getElementById("txt_mission_id").value;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/det_res_a.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==1){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/getEseIdMissId.php',
						data:{mission_id:mission_id},
						success:function(e){
							eseId=e;							
							$.ajax({
								type:'POST',
								url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/countColFunct.php',
								data:{entrepriseId:eseId},
								success:function(e1){
									if(e1==0){
										$('#fancybox').show();
										$('#mess_vide_a').show();
									}
									else{
										$.ajax({
											type:'POST',
											url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/getSynth.php',
											data:{mission_id:mission_id},
											success:function(e){
												eo=""+e+"";
												doc=eo.split(',');
												document.getElementById("txt_Synthese_A").value=doc[0];
												if(doc[1]=='faible'){
													document.getElementById("rd_Synthese_A_Faible").checked=true;
												}
												else if(doc[1]=='moyen'){
													document.getElementById("rd_Synthese_A_Moyen").checked=true;
												}
												else if(doc[1]=='eleve'){
													document.getElementById("rd_Synthese_A_Eleve").checked=true;
												}
												$('#message_Synthese_a').show();
												$('#message_Synthese_Terminer').hide();
												$('#message_Slide').hide();
												$('#fancybox').show();
											}										
										});
									}
								}
							});
						}
					});
				}	
				else{
					$('#fancybox').show();
					$('#mess_vide_a').show();
				}
			}
		});
	});
	
	$('#int_A_Question_Precedent').click(function(){	
		$('#interface_Conclusion_A').show();
		$('#interface_Question_A').hide();
	});

	$('#int_A_Conclus_Precedent').click(function(){
		$('#interface_A_Conclusion_Superviseur').hide();
		$('#fancybox_sup_btn').hide();
	});
	
	$('#valider_msg_Terminer').click(function(){
		$('#message_Terminer').hide();
	});
	
	$('#valider_msg_Annuler').click(function(){
		$('#message_Terminer').hide();
	});
	
	$('#Int_B_Continuer').click(function(){
		mission_id=document.getElementById("txt_mission_id").value;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_B/aff_quest_fin_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==22){
					$('#message_Terminer_question_B').show();
				}
				else{
					quetion_b="#Question_B_"+e;
					$(quetion_b).fadeIn(500);
				}
				$('#dv_table_b').show();
				$('#lb_veuillez_aff').hide();
				$('#fancybox_B').show();
			}
		});
	});
	
	$('#int_B_Question_Precedent_1').click(function(){
		$('#Question_B_1').fadeOut(500);
	});
	
	$('#int_B_Question_Precedent_2').click(function(){
		$('#Question_B_2').fadeOut(500);
		$('#Question_B_1').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_3').click(function(){
		$('#Question_B_3').fadeOut(500);
		$('#Question_B_2').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_4').click(function(){
		$('#Question_B_4').fadeOut(500);
		$('#Question_B_3').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_5').click(function(){
		$('#Question_B_5').fadeOut(500);
		$('#Question_B_4').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_6').click(function(){
		$('#Question_B_6').fadeOut(500);
		$('#Question_B_5').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_7').click(function(){
		$('#Question_B_7').fadeOut(500);
		$('#Question_B_6').fadeIn(500);
	});

	$('#int_B_Question_Precedent_8').click(function(){
		$('#Question_B_8').fadeOut(500);
		$('#Question_B_7').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_9').click(function(){
		$('#Question_B_9').fadeOut(500);
		$('#Question_B_8').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_10').click(function(){
		$('#Question_B_10').fadeOut(500);
		$('#Question_B_9').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_11').click(function(){
		$('#Question_B_11').fadeOut(500);
		$('#Question_B_10').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_12').click(function(){
		$('#Question_B_12').fadeOut(500);
		$('#Question_B_11').fadeIn(500);
	});

	$('#int_B_Question_Precedent_13').click(function(){
		$('#Question_B_13').fadeOut(500);
		$('#Question_B_12').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_14').click(function(){
		$('#Question_B_14').fadeOut(500);
		$('#Question_B_13').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_15').click(function(){
		$('#Question_B_15').fadeOut(500);
		$('#Question_B_14').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_16').click(function(){
		$('#Question_B_16').fadeOut(500);
		$('#Question_B_15').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_17').click(function(){
		$('#Question_B_17').fadeOut(500);
		$('#Question_B_16').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_18').click(function(){
		$('#Question_B_18').fadeOut(500);
		$('#Question_B_17').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_19').click(function(){
		$('#Question_B_19').fadeOut(500);
		$('#Question_B_18').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_20').click(function(){
		$('#Question_B_20').fadeOut(500);
		$('#Question_B_19').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_21').click(function(){
		$('#Question_B_21').fadeOut(500);
		$('#Question_B_20').fadeIn(500);
	});
	
	$('#int_B_Question_Precedent_22').click(function(){
		$('#Question_B_22').fadeOut(500);
		$('#Question_B_21').fadeIn(500);
	});
		
	$('#valider_msg_Terminer_question_B').click(function(){
		$('#message_Terminer_question_B').hide();
	});
	
	$('#valider_msg_Annuler_question_B').click(function(){
		$('#message_Terminer_question_B').hide();
		$('#Question_B_22').fadeIn(500);
	});
	
	$('#Int_A_Retour').click(function(){	
		$('#message_Terminer').hide();
		$('#message_Synthese_a').hide();
		$('#message_Synthese_Terminer').hide();
		$('#message_Slide').hide();
		$('#message_Donnees_Perdu').hide();
		$('#message_Fermeture_A').show();
		$('#fancybox').show();
	});
	
	$('#valider_Retour_A_superviseur').click(function(){
		$('#contenue_rsci').show();
		$('#contenue_objectif_sup_A').hide();
		$('#message_fermeture_A_sup').hide();
		$('#fancybox_sup_btn').hide();
	});
	
	$('#annuler_Retour_A_superviseur').click(function(){
		$('#message_fermeture_A_sup').hide();
		$('#fancybox_sup_btn').hide();		
	});
	
	$('#Int_A_Retour_Superviseur').click(function(){
		$('#message_fermeture_A_sup').show();
		$('#fancybox_sup_btn').show();
	});
	
	$('#Synthese_A_Precedent').click(function(){
		$('#message_Synthese_a').hide();
		$('#fancybox').hide();
	});
	
	$('#annuler_msg_Synthese_A').click(function(){
		$('#message_Synthese_Terminer').hide();
		$('#message_Synthese_a').show();
	});
	
	$('#enregistrer_msg_Synthese_A').click(function(){
		$('#message_Slide').show();
		$('#message_Synthese_Terminer').hide();
	});
	


	
	$('#message__Slide_Ok').click(function(){		
		$('#contenue_objectif_A').hide();
		$('#contenue_rsci').show();
		$('#fancybox').hide();
		$('#message_Slide').hide();
	});
	
	$('#txt_Synthese_A').click(function(){
		document.getElementById("txt_Synthese_A").value="";
	});
	
	$('#fermer_Synthese').click(function(){
		$('#message_Donnees_Perdu').show();
		$('#message_Synthese_a').hide();
		$('#fancybox').show();
	});
	
	$('#Synthese_Annulation').click(function(){
		$('#message_Donnees_Perdu').hide();
		$('#message_Synthese_a').show();
	});
	
	$('#Synthese_Continuation').click(function(){
		$('#fancybox').hide();
		$('#message_Donnees_Perdu').hide();
		$('#fancybox').hide();
		$('#contenue_rsci').show();
		$('#contenue_objectif_A').hide();
	});
	
	$('#text_Conclusion_A_Sup').click(function(){
		document.getElementById("text_Conclusion_A_Sup").value="";	
	});
	
	$('#int_A_Conclus_Annuler').click(function(){
		$('#interface_A_Conclusion_Superviseur').hide();
	});
	//**************************************************************************************************************
	//************Getconclus.php le document relié
	
	$('#conclusion_A_Superviseur').click(function(){
		mission_id=document.getElementById("tx_miss").value;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/det_synth.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e!=0){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achatphp/get_Check_Achat_A/getConclus.php',
						data:{mission_id:mission_id, cycleAchatId:1},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							$('#commentaire_Question_conclus_A').val(doc[0]);
							if(doc[1]=='faible'){
								document.getElementById("rad_Conclus_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rad_Conclus_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rad_Conclus_Eleve").checked=true;
							}
							if(doc[2]==1){
								document.getElementById("rad_Conclus_Faible").disabled=true;
								document.getElementById("rad_Conclus_Moyen").disabled=true;
								document.getElementById("rad_Conclus_Eleve").disabled=true;
								document.getElementById("commentaire_Question_conclus_A").disabled=true;								
							}
							$('#interface_A_Conclusion_Superviseur').show();
							$('#fancybox_sup_btn').show();
						}
					});					
				}
				else{
					$('#mess_pas_synth').show();
					$('#fancybox_sup_btn').show();
				}
			}
		});

	});
	
	$('#int_A_Conclus_Terminer').click(function(){
		$('#interface_A_Conclusion_Superviseur').hide();	
	});
	
	$('#Int_Conclusion_A_Annuler').click(function(){
		$('#interface_A_Conclusion_Superviseur').hide();
		$('#fancybox_superviseur').hide();
	});
	
	$('#Int_Conclusion_A_Valider').click(function(){
		if(document.getElementById("text_Conclusion_A_Sup").value=""){
			$('#mess_vide_conclusion_A').show();
			$('#interface_A_Conclusion_Superviseur').hide();
		}
		else{
			$('#interface_A_Conclusion_Superviseur').hide();
			$('#Message_Conclusion_A_Terminer').show();
		}
	});
	
	$('#validation_msg_Conclusion_A').click(function(){
		$('#Message_Conclusion_A_Terminer').hide();
	});
	
	$('#annuler_msg_Conclusion_A').click(function(){
		$('#Message_Conclusion_A_Terminer').hide();
		$('#interface_A_Conclusion_Superviseur').show();		
	});

	$('#Terminaison_msg_Conclusion_A').click(function(){
		$('#Message_Conclusion_A_Terminer').hide();
		$('#message_Slide_Conclusion_A').show();
	});
	
	$('#message__Slide_Ok_Conclusion_A').click(function(){
		$('#contenue_rsci').show();
		$('#contenue_objectif_sup_A').hide();
		$('#message_Slide_Conclusion_A').hide();
		$('#fancybox_sup_btn').hide();
	});
	
	$('#fermer_Conclusion_A').click(function(){
		$('#message_Sup_Donnees_perdues').show();
		$('#interface_A_Conclusion_Superviseur').hide();
	});
	
	
	$('#valider_Retour_A').click(function(){
		$('#contenue_rsci').show();
		$('#contenue_objectif_A').hide();
		$('#message_Fermeture_A').hide();
		$('#fancybox').hide();
	});
	
	$('#annuler_Retour_A').click(function(){
		$('#message_Fermeture_A').hide();
		$('#message_Donnees_Perdu').hide();
		$('#fancybox').hide();
	});
	
	$('#Conclusion_Annulation').click(function(){
		$('#message_Sup_Donnees_perdues').hide();
		$('#interface_A_Conclusion_Superviseur').show();
	});
	
	$('#Conclusion_Continuation').click(function(){
		$('#contenue_objectif_sup_A').hide();
		$('#contenue_rsci').show();
		$('#message_Sup_Donnees_perdues').hide();
		$('#fancybox_sup_btn').hide();
	});
	
	$('#int_B_Retour').click(function(){
		$('#message_fermeture_B').show();
		$('#fancybox_B').show();
	});
	
	$('#valider_Retour_B').click(function(){
		$('#contenue_rsci').show();
		$('#dv_cont_obj_b').hide();
		$('#message_fermeture_B').hide();
		$('#fancybox_B').hide();
	});
	
	$('#annuler_Retour_B').click(function(){
		$('#message_fermeture_B').hide();
		$('#fancybox_B').hide();
	});
	
	$('#message__Slide_vide_b').click(function(){
		$('#fancybox_B').hide();
		$('#mess_vide_b').hide();
	});
	
	/*$('#Int_B_Synthese').click(function(){	
		mission_id=document.getElementById("txt_mission_id").value;
		$.ajax({
			type:'POST',
			url:'cycleAchat/cycle_achatphp/get_B/cpt_b.php',
			data:{mission_id:mission_id},
			success:function(e){
				if(e==22){
					$.ajax({
						type:'POST',
						url:'cycleAchat/cycle_achatphp/get_B/getSynth.php',
						data:{mission_id:mission_id, cycleId:2},
						success:function(e){
							eo=""+e+"";
							doc=eo.split(',');
							document.getElementById("txt_Synthese_B").value=doc[0];
							if(doc[1]=='faible'){
								document.getElementById("rd_Synthese_B_Faible").checked=true;
							}
							else if(doc[1]=='moyen'){
								document.getElementById("rd_Synthese_B_Moyen").checked=true;
							}
							else if(doc[1]=='eleve'){
								document.getElementById("rd_Synthese_B_Eleve").checked=true;
							}						
						}
					});
					$('#Int_Synthese_B').show();
					$('#fancybox_B').show();
				}
				else{
					$('#fancybox_B').show();
					$('#mess_vide_obj_b').show();
				}
			}
		});
	});*/
	
	$('#message__Slide_vide_audit_b').click(function(){
		$('#fancybox_B').hide();
		$('#mess_vide_obj_b').hide();
	});
	$('#Synthese_B_annuler').click(function(){
		$('#Int_Synthese_B').hide();
		$('#fancybox_B').hide();
	});
	
	$('#annuler_msg_Synthese_B').click(function(){
		$('#Int_Synthese_B').show();
		$('#message_Terminer_Synthese_B').hide();
	});
	//Continue la fermeture de la conclusion sans enregistrement
	$('#fermeture_Continuation_B').click(function(){
		$('#message_Donnees_Perdu_B').hide();
		$('#Int_Synthese_B').hide();
		$('#fancybox_B').hide();
	});
	//Fermeture de la conclusion
	$('#fermer_Conclusion_B_sup').click(function(){
		$('#int_conclusion_B_superviseur').hide();
		$('#mess_Termine_conclusion_B_sup').show();
	});
	//Termine la conclusion avec enregistrement
	$('#int_B_sup_Conclus_Terminer').click(function(){
		if(($('#commentaire_Question_B_sup_conclusion').val()=="") || (document.getElementById("rad_Conclus_Faible_b").checked==false && document.getElementById("rad_Conclus_Moyen_b").checked==false && document.getElementById("rad_Conclus_Eleve_b").checked==false)){
			$('#int_conclusion_B_superviseur').hide();
			$('#mess_conclus_vide').show();
		}
		else{
			$('#mess_valide_conclusion_B_sup').show();
			$('#int_conclusion_B_superviseur').hide();
		}
	});
	
	$('#fermer_mess_conclus_vide_B').click(function(){
		$('#mess_conclus_vide').hide();
		$('#int_conclusion_B_superviseur').show();
	});
	$('#enregistrer_msg_Synthese_B').click(function(){
		$('#message_Terminer_Synthese_B').hide();
		$('#message_Synthese_Slide_B').show();
	});
	
	$('#message__Slide_Ok_Synthese_B').click(function(){
		$('#dv_cont_obj_b').hide();
		$('#contenue_rsci').show();
		$('#message_Synthese_Slide_B').hide();
		$('#fancybox_B').hide();
	});
	
	$('#txt_Synthese_B').click(function(){
		document.getElementById("txt_Synthese_B").value="";
	});
	
	$('#valider_msg_Terminer_question_B').click(function(){
		$('#message_Slide_terminer_Question_B').show();
		$('#message_Terminer_question_B').hide();
	});
	
	$('#message__Slide_Ok_Question_B').click(function(){
		$('#message_Slide_terminer_Question_B').hide();
		$('#fancybox_B').hide();
	});

	//Message d'ouverture de l'objectif B
	$('#valider_ouverture_B').click(function(){
		$('#fancybox_B').hide();
		$('#mess_ouvrir_question_objectif_B').hide();
	});
	//Enregistre du question objectif B1
	$('#enregistrer_Fermeture_Question_B').click(function(){
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B').hide();		
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B2
	$('#enregistrer_Fermeture_Question_B2').click(function(){
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B2').hide();										
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B3
	$('#enregistrer_Fermeture_Question_B3').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B3').hide();	
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B4
	$('#enregistrer_Fermeture_Question_B4').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B4').hide();	
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B5
	$('#enregistrer_Fermeture_Question_B5').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B5').hide();	
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B6
	$('#enregistrer_Fermeture_Question_B6').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B6').hide();	
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B7
	$('#enregistrer_Fermeture_Question_B7').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B7').hide();	
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B8
	$('#enregistrer_Fermeture_Question_B8').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B8').hide();	
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B9
	$('#enregistrer_Fermeture_Question_B9').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B9').hide();	
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B10
	$('#enregistrer_Fermeture_Question_B10').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B10').hide();	
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B11
	$('#enregistrer_Fermeture_Question_B11').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B11').hide();	
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B12
	$('#enregistrer_Fermeture_Question_B12').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B12').hide();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif 13
	$('#enregistrer_Fermeture_Question_B13').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B13').hide();
									}
								});
							}
						});
					}
				}
			});
		}

	});
	//Enregistre du question objectif B14
	$('#enregistrer_Fermeture_Question_B14').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B14').hide();
									}
								});
							}
						});
					}
				}
			});
		}	
	});
	//Enregistre du question objectif B15
	$('#enregistrer_Fermeture_Question_B15').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B15').hide();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif 16
	$('#enregistrer_Fermeture_Question_B16').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B16').hide();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B17
	$('#enregistrer_Fermeture_Question_B17').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B17').hide();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B18
	$('#enregistrer_Fermeture_Question_B18').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B18').hide();
									}
								});
							}
						});
					}
				}
			});
		}
	})	
	//Enregistre du question objectif B19
	$('#enregistrer_Fermeture_Question_B19').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B19').hide();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B20
	$('#enregistrer_Fermeture_Question_B20').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B20').hide();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B21
	$('#enregistrer_Fermeture_Question_B21').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B21').hide();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Enregistre du question objectif B22
	$('#enregistrer_Fermeture_Question_B22').click(function(){	
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
										openButtonObject();	
										$('#fancybox_B').hide();
										$('#dv_cont_obj_b').hide();
										$('#contenue_rsci').show();
										$('#message_fermeture_question_B22').hide();
									}
								});
							}
						});
					}
				}
			});
		}
	});
	//Fermeture du question num 1
	$('#fermer_Question_B_1').click(function(){
		$('#message_fermeture_question_B').show();
		$('#Question_B_1').hide();
	});
	//Fermeture du question num 2
	$('#fermer_Question_B_2').click(function(){
		$('#message_fermeture_question_B2').show();
		$('#Question_B_2').hide();
	});
	//Fermeture du question num 3
	$('#fermer_Question_B_3').click(function(){
		$('#message_fermeture_question_B3').show();
		$('#Question_B_3').hide();
	});
	//Fermeture du question num 4
	$('#fermer_Question_B_4').click(function(){
		$('#message_fermeture_question_B4').show();
		$('#Question_B_4').hide();
	});
	//Fermeture du question num 5
	$('#fermer_Question_B_5').click(function(){
		$('#message_fermeture_question_B5').show();
		$('#Question_B_5').hide();
	});
	//Fermeture du question num 6
	$('#fermer_Question_B_6').click(function(){
		$('#message_fermeture_question_B6').show();
		$('#Question_B_6').hide();
	});
	//Fermeture du question num 7
	$('#fermer_Question_B_7').click(function(){
		$('#message_fermeture_question_B7').show();
		$('#Question_B_7').hide();
	});
	//Fermeture du question num 8
	$('#fermer_Question_B_8').click(function(){
		$('#message_fermeture_question_B8').show();
		$('#Question_B_8').hide();
	});
	//Fermeture du question num 9
	$('#fermer_Question_B_9').click(function(){
		$('#message_fermeture_question_B9').show();
		$('#Question_B_9').hide();
	});
	//Fermeture du question num 10
	$('#fermer_Question_B_10').click(function(){
		$('#message_fermeture_question_B10').show();
		$('#Question_B_10').hide();
	});
	//Fermeture du question num 11
	$('#fermer_Question_B_11').click(function(){
		$('#message_fermeture_question_B11').show();
		$('#Question_B_11').hide();
	});
	//Fermeture du question num 12
	$('#fermer_Question_B_12').click(function(){
		$('#message_fermeture_question_B12').show();
		$('#Question_B_12').hide();
	});
	//Fermeture du question num 13
	$('#fermer_Question_B_13').click(function(){
		$('#message_fermeture_question_B13').show();
		$('#Question_B_13').hide();
	});
	//Fermeture du question num 14
	$('#fermer_Question_B_14').click(function(){
		$('#message_fermeture_question_B14').show();
		$('#Question_B_14').hide();
	});
	//Fermeture du question num 15
	$('#fermer_Question_B_15').click(function(){
		$('#message_fermeture_question_B15').show();
		$('#Question_B_15').hide();
	});	
	//Fermeture du question num 16
	$('#fermer_Question_B_16').click(function(){
		$('#message_fermeture_question_B16').show();
		$('#Question_B_16').hide();
	});
	//Fermeture du question num 17
	$('#fermer_Question_B_17').click(function(){
		$('#message_fermeture_question_B17').show();
		$('#Question_B_17').hide();
	});
	//Fermeture du question num 18
	$('#fermer_Question_B_18').click(function(){
		$('#message_fermeture_question_B18').show();
		$('#Question_B_18').hide();
	});
	//Fermeture du question num 19
	$('#fermer_Question_B_19').click(function(){
		$('#message_fermeture_question_B19').show();
		$('#Question_B_19').hide();
	});
	//Fermeture du question num 20
	$('#fermer_Question_B_20').click(function(){
		$('#message_fermeture_question_B20').show();
		$('#Question_B_20').hide();
	});
	//Fermeture du question num 21
	$('#fermer_Question_B_21').click(function(){
		$('#message_fermeture_question_B21').show();
		$('#Question_B_21').hide();
	});
	//Fermeture du question num 22
	$('#fermer_Question_B_22').click(function(){
		$('#message_fermeture_question_B22').show();
		$('#Question_B_22').hide();
	});
	
	$('#fermeture_Annulation_B').click(function(){
		$('#message_Donnees_Perdu_B').hide();
		$('#fancybox_B').hide();
		$('#contenue_rsci').show();
		$('#dv_cont_obj_b').hide();
	});
	
	$('#annuler_Fermeture_Question_B').click(function(){
		$('#message_fermeture_question_B').hide();
		$('#Question_B_1').show();
	});
	
	$('#annuler_Fermeture_Question_B2').click(function(){
		$('#message_fermeture_question_B2').hide();
		$('#Question_B_2').show();
	});
	
	$('#annuler_Fermeture_Question_B3').click(function(){
		$('#message_fermeture_question_B3').hide();
		$('#Question_B_3').show();
	});
	
	$('#annuler_Fermeture_Question_B4').click(function(){
		$('#message_fermeture_question_B4').hide();
		$('#Question_B_4').show();
	});
	
	$('#annuler_Fermeture_Question_B5').click(function(){
		$('#message_fermeture_question_B5').hide();
		$('#Question_B_5').show();
	});
	
	$('#annuler_Fermeture_Question_B6').click(function(){
		$('#message_fermeture_question_B6').hide();
		$('#Question_B_6').show();
	});
	
	$('#annuler_Fermeture_Question_B7').click(function(){
		$('#message_fermeture_question_B7').hide();
		$('#Question_B_7').show();
	});
	
	$('#annuler_Fermeture_Question_B8').click(function(){
		$('#message_fermeture_question_B8').hide();
		$('#Question_B_8').show();
	});
	
	$('#annuler_Fermeture_Question_B9').click(function(){
		$('#message_fermeture_question_B9').hide();
		$('#Question_B_9').show();
	});
	
	$('#annuler_Fermeture_Question_B10').click(function(){
		$('#message_fermeture_question_B10').hide();
		$('#Question_B_10').show();
	});
	
	$('#annuler_Fermeture_Question_B11').click(function(){
		$('#message_fermeture_question_B11').hide();
		$('#Question_B_11').show();
	});
	
	$('#annuler_Fermeture_Question_B12').click(function(){
		$('#message_fermeture_question_B12').hide();
		$('#Question_B_12').show();
	});
	
	$('#annuler_Fermeture_Question_B13').click(function(){
		$('#message_fermeture_question_B13').hide();
		$('#Question_B_13').show();
	});
	
	$('#annuler_Fermeture_Question_B14').click(function(){
		$('#message_fermeture_question_B14').hide();
		$('#Question_B_14').show();
	});
	
	$('#annuler_Fermeture_Question_B15').click(function(){
		$('#message_fermeture_question_B15').hide();
		$('#Question_B_15').show();
	});
	
	$('#annuler_Fermeture_Question_B16').click(function(){
		$('#message_fermeture_question_B16').hide();
		$('#Question_B_16').show();
	});
	
	$('#annuler_Fermeture_Question_B17').click(function(){
		$('#message_fermeture_question_B17').hide();
		$('#Question_B_17').show();
	});
	
	$('#annuler_Fermeture_Question_B18').click(function(){
		$('#message_fermeture_question_B18').hide();
		$('#Question_B_18').show();
	});
	
	$('#annuler_Fermeture_Question_B19').click(function(){
		$('#message_fermeture_question_B19').hide();
		$('#Question_B_19').show();
	});
	
	$('#annuler_Fermeture_Question_B20').click(function(){
		$('#message_fermeture_question_B20').hide();
		$('#Question_B_20').show();
	});
	
	$('#annuler_Fermeture_Question_B21').click(function(){
		$('#message_fermeture_question_B21').hide();
		$('#Question_B_21').show();
	});
	
	$('#annuler_Fermeture_Question_B22').click(function(){
		$('#message_fermeture_question_B22').hide();
		$('#Question_B_22').show();
	});
	
	$('#valider_Fermeture_Question_B').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B2').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B2').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B3').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B3').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B4').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B4').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B5').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B5').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B6').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B6').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B7').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B7').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B8').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B8').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B9').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B9').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B10').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B10').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B11').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B11').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B12').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B12').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B13').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B13').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B14').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B14').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B15').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B15').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B16').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B16').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B17').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B17').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B18').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B18').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B19').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B19').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B20').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B20').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B21').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B21').hide();
		$('#fancybox_B').hide();
	});
	
	$('#valider_Fermeture_Question_B22').click(function(){
		openButtonObject();
		$('#message_fermeture_question_B22').hide();
		$('#fancybox_B').hide();
	});
	//evenement de la validation de retour de l'objectif B
	$('#message__Slide_Ok_Conclusion_B').click(function(){
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
				$('#mess_slide_conclusion_B').hide();
				$('#fancybox_bouton_b').hide();
				document.getElementById("int_B_Sup_Retour").disabled=false;
				document.getElementById("int_B_sup_conclusion").disabled=false;
			}
		});
	});

	$('#fermer_Synthese_B').click(function(){
		$('#message_Donnees_Perdu_B').show();
		$('#Int_Synthese_B').hide();
	});
	$('#enreg_conclus_confirm_B_sup').click(function(){
		$('#mess_slide_conclusion_B').show();
		$('#mess_valide_conclusion_B_sup').hide();
	});
	$('#enreg_conclus_ferm_b').click(function(){		
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
	//evenement de l'annulation de la validation de l'objectif B conclusion
	$('#annuler_terminer_conclus_B_sup').click(function(){
		$('#mess_valide_conclusion_B_sup').hide();
		$('#int_conclusion_B_superviseur').show();
	});
	//evenement de la validation de la conclusion de l'objectif B conclusion
	$('#enreg_terminer_fermer_conclus_B_sup').click(function(){
		//enregistrer la conclusion de l'objectif de B sup
		$('#mess_valide_conclusion_B_sup').hide();	
		$('#mess_slide_conclusion_B').show();		
	});
	//evenement de retour dans le menu principale
	$('#int_B_Sup_Retour').click(function(){
		document.getElementById("int_B_Sup_Retour").disabled=true;
		document.getElementById("int_B_sup_conclusion").disabled=true;
		$('#mess_ret_B_sup').show();
		$('#int_conclusion_B_superviseur').hide();
		$('#fancybox_bouton_b').show();
	});
	//evenement de la conclusion de B superviseur*********************************************************************
	$('#int_B_sup_conclusion').click(function(){
		document.getElementById("int_B_Sup_Retour").disabled=true;
		document.getElementById("int_B_sup_conclusion").disabled=true;
		if(document.getElementById("txarea_synthese").value==""){

			$('#mess_synth_non').show();
			$('#fancybox_bouton_b').show();
		}
		else{
			$.ajax({
				type:'POST',
				url:'cycleAchat/cycle_achatphp/get_B/getConclus.php',
				data:{mission_id:mission_id, cycleAchatId:2},
				success:function(e){
					eo=""+e+"";
					doc=eo.split(',');
					$('#commentaire_Question_B_sup_conclusion').val(doc[0]);
					if(doc[1]=='faible'){
						document.getElementById("rad_Conclus_Faible_b").checked=true;
					}
					else if(doc[1]=='moyen'){
						document.getElementById("rad_Conclus_Moyen_b").checked=true;
					}
					else if(doc[1]=='eleve'){
						document.getElementById("rad_Conclus_Eleve_b").checked=true;
					}
					if(doc[2]==1){
						document.getElementById("rad_Conclus_Faible_b").disabled=true;
						document.getElementById("rad_Conclus_Moyen_b").disabled=true;
						document.getElementById("rad_Conclus_Eleve_b").disabled=true;
						document.getElementById("commentaire_Question_B_sup_conclusion").disabled=true;								
					}
					$('#int_conclusion_B_superviseur').show();
					$('#fancybox_bouton_b').show();
				}
			});			
		}
	});
	
	$('#message_slide_non_synth').click(function(){
		document.getElementById("int_B_Sup_Retour").disabled=false;
		document.getElementById("int_B_sup_conclusion").disabled=false;
		$('#mess_synth_non').hide();
		$('#fancybox_bouton_b').hide();
	});
	
	//Continue la fermeture de la conclusion sans enregistrement dans l'objectif B sup
	$('#continue_fermer_conclus_B_sup').click(function(){
		$('#mess_Termine_conclusion_B_sup').hide();	
		$('#fancybox_bouton_b').hide();
	});
	//le retour à l'interface de superviseur B
	$('#int_B_sup_Conclus_Precedent').click(function(){
		document.getElementById("int_B_Sup_Retour").disabled=false;
		document.getElementById("int_B_sup_conclusion").disabled=false;	
		$('#int_conclusion_B_superviseur').hide();
		$('#fancybox_bouton_b').hide();
	});
	//L'initialisation du texte de conclusion vider
	$('#commentaire_Question_B_sup_conclusion').click(function(){
		//document.getElementById("commentaire_Question_B_sup_conclusion").value="";
	});
	//Retour à la page precedent
	$('#annuler_Ret_B_sup').click(function(){
		document.getElementById("int_B_Sup_Retour").disabled=false;
		document.getElementById("int_B_sup_conclusion").disabled=false;	
		$('#mess_ret_B_sup').hide();
		$('#fancybox_bouton_b').hide();
	});
	//Retour au menu principal
	$('#valider_Ret_B_sup').click(function(){
		document.getElementById("int_B_Sup_Retour").disabled=false;
		document.getElementById("int_B_sup_conclusion").disabled=false;		
		$('#contenue_rsci').show();
		$('#dv_cont_obj_sup_b').hide();
		$('#mess_ret_B_sup').hide();
		$('#fancybox_bouton_b').hide();
	});
	
});
	
	function selectionMissionQuestionIdB(tr, missionId){
		var missionIdB=missionId;
		$.ajax({
			type:'POST',
			url:'../cycle_achatphp/get_Question_Id_B.php',
			data:{missionQuestionIdB:missionIdB},
			success:function(result){
				if(result==1){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_1_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e){	
							affiche_1();
							$('#Question_B_1_Sup').html(e).show();
						}
					});
				}
				else if(result==2){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_2_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e2){
							affiche_2();
							$('#Question_B_2_Sup').html(e2).show();
						}
					});
				}
				else if(result==3){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_3_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e3){
							affiche_3();
							$('#Question_B_3_Sup').html(e3).show();
						}
					});
				}
				else if(result==4){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_4_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e4){
							affiche_4();
							$('#Question_B_4_Sup').html(e4).show();
						}
					});
				}
				else if(result==5){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_5_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e5){
							affiche_5();
							$('#Question_B_5_Sup').html(e5).show();
						}
					});
				}
				else if(result==6){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_6_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e6){
							affiche_6();
							$('#Question_B_6_Sup').html(e6).show();
						}
					});
				}
				else if(result==7){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_7_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e7){
							affiche_7();
							$('#Question_B_7_Sup').html(e7).show();
						}
					});
				}
				else if(result==8){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_8_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e8){
							affiche_8();
							$('#Question_B_8_Sup').html(e8).show();
						}
					});
				}
				else if(result==9){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_9_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e9){
							affiche_9();
							$('#Question_B_9_Sup').html(e9).show();
						}
					});
				}
				else if(result==10){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_10_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e10){
							affiche_10();
							$('#Question_B_10_Sup').html(e10).show();
						}
					});
				}
				else if(result==11){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_11_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e11){
							affiche_11();
							$('#Question_B_11_Sup').html(e11).show();
						}
					});
				}
				else if(result==12){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_12_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e12){
							affiche_12();
							$('#Question_B_12_Sup').html(e12).show();
						}
					});
				}
				else if(result==13){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_13_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e13){
							affiche_13();
							$('#Question_B_13_Sup').html(e13).show();
						}
					});
				}
				else if(result==14){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_14_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e14){
							affiche_14();
							$('#Question_B_14_Sup').html(e14).show();
						}
					});
				}
				else if(result==15){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_15_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e15){
							affiche_15();
							$('#Question_B_15_Sup').html(e15).show();
						}
					});
				}
				else if(result==16){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_16_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e16){
							affiche_16();
							$('#Question_B_16_Sup').html(e16).show();
						}
					});
				}
				else if(result==17){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_17_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e17){
							affiche_17();
							$('#Question_B_17_Sup').html(e17).show();
						}
					});
				}
				else if(result==18){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_18_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e18){
							affiche_18();
							$('#Question_B_18_Sup').html(e18).show();
						}
					});
				}
				else if(result==19){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_19_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e19){
							affiche_19();
							$('#Question_B_19_Sup').html(e19).show();
						}
					});
				}
				else if(result==20){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_20_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e20){
							affiche_20();
							$('#Question_B_20_Sup').html(e20).show();
						}
					});
				}
				else if(result==21){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_21_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e21){
							affiche_21();
							$('#Question_B_21_Sup').html(e21).show();
						}
					});
				}
				else if(result==22){
					$.ajax({
						type:'POST',
						url:'../cycle_achat_interface/Interface_Question_B_22_Sup.php',
						data:{missionQuestionIdB:missionIdB},
						success:function(e22){
							affiche_22();
							$('#Question_B_22_Sup').html(e22).show();
						}
					});
				}
			}
		});
	}
	
	function affiche_1(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_2(){
		$('#Question_B_1_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_3(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_4(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_5(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_6(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_7(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_8(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_9(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_10(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_11(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_12(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_13(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_14(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_15(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_16(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_17(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_18(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_19(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_20(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_21(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_1_Sup').hide();
		$('#Question_B_22_Sup').hide();	
	}
	function affiche_22(){
		$('#Question_B_2_Sup').hide();
		$('#Question_B_3_Sup').hide();
		$('#Question_B_4_Sup').hide();
		$('#Question_B_5_Sup').hide();
		$('#Question_B_6_Sup').hide();
		$('#Question_B_7_Sup').hide();
		$('#Question_B_8_Sup').hide();
		$('#Question_B_9_Sup').hide();
		$('#Question_B_10_Sup').hide();
		$('#Question_B_11_Sup').hide();
		$('#Question_B_12_Sup').hide();
		$('#Question_B_13_Sup').hide();
		$('#Question_B_14_Sup').hide();
		$('#Question_B_15_Sup').hide();
		$('#Question_B_16_Sup').hide();
		$('#Question_B_17_Sup').hide();
		$('#Question_B_18_Sup').hide();
		$('#Question_B_19_Sup').hide();
		$('#Question_B_20_Sup').hide();
		$('#Question_B_21_Sup').hide();
		$('#Question_B_1_Sup').hide();	
	}
	function actualiser_Question_B(){
		$('#Question_B_1').fadeOut(500);
		$('#Question_B_2').fadeOut(500);
		$('#Question_B_3').fadeOut(500);
		$('#Question_B_4').fadeOut(500);
		$('#Question_B_5').fadeOut(500);
		$('#Question_B_6').fadeOut(500);
		$('#Question_B_7').fadeOut(500);
		$('#Question_B_8').fadeOut(500);
		$('#Question_B_9').fadeOut(500);
		$('#Question_B_10').fadeOut(500);
		$('#Question_B_11').fadeOut(500);
		$('#Question_B_12').fadeOut(500);
		$('#Question_B_13').fadeOut(500);
		$('#Question_B_14').fadeOut(500);
		$('#Question_B_15').fadeOut(500);
		$('#Question_B_16').fadeOut(500);
		$('#Question_B_17').fadeOut(500);
		$('#Question_B_18').fadeOut(500);
		$('#Question_B_19').fadeOut(500);
		$('#Question_B_20').fadeOut(500);
		$('#Question_B_21').fadeOut(500);
		$('#Question_B_22').fadeOut(500);
		$('#Int_Synthese_B').hide();
	}
	function openButtonObject(){
		document.getElementById("int_B_Retour").disabled=false;
		document.getElementById("Int_B_Continuer").disabled=false;
		document.getElementById("Int_B_Synthese").disabled=false;
	}
