$(function(){
	$('#RSCI').css('background-color','#2ca3f3');
	$('#contenue').hide();
	$('#contenue_objectif_A').hide();

	$("#RSCI").click(function(){
		$('#deux_tresorerie').hide();
		$('#bt_tresorerie').show();
		$(this).css('background-color','#2ca3f3');
		$('#Rap_int').removeAttr("style");
		$('#RA').removeAttr("style");
		$('#RDC').removeAttr("style");
		$('#Ref_arch').removeAttr("style");
		$('.Rap_def').removeAttr("style");

		$('#contenue_rsci').hide();
		$('#contenue').hide();
		$('#contenue_objectif_sup_A').hide();
		$('#contenue_objectif_A').hide();
		$('#dv_cont_obj_b').hide();
		$('#dv_cont_obj_sup_b').hide();
		$('#dv_cont_obj_c').hide();
		$('#dv_cont_obj_sup_c').hide();
		$('#dv_cont_obj_d').hide();
		$('#dv_cont_obj_sup_d').hide();
		$('#dv_cont_obj_e').hide();
		$('#dv_cont_obj_sup_e').hide();
		$('#dv_cont_obj_f').hide();
		$('#dv_cont_obj_sup_f').hide();
		$('#contenue_poste_a').hide();
		$('#contRsciImmo').hide();
		$('#contRsciPaie').hide();
		$('#contRsciRecette').hide();
		$('#contRsciDepense').hide();
		$('#contRsciStock').hide();
		$('#contRsciVente').hide();
		$('#contRsciInfo').hide();
		$('#contRsciEnvironnement').hide();
		$('#contimb').hide();
		$('#contev').hide();
		$('#contia').hide();
		$('#contib').hide();
		$('#contic').hide();
		$('#contid').hide();
		$('#contSupConclusion').hide();
		$('#ContentSynthAchat').hide();
		$('#dv_cont_menu_rsci').fadeIn(1000);
	});

	$("#RA").click(function(){
		$('#contenue').hide();
		$(this).css('background-color','#2ca3f3');
		$('#Rap_int').removeAttr("style");
		$('#RSCI').removeAttr("style");
		$('#RDC').removeAttr("style");
		$('#Ref_arch').removeAttr("style");
		$('.Rap_def').removeAttr("style");
		
		$('#ContentSynthAchat').hide();
		$('#contenue_rsci').hide();
		$('#contenue_objectif_sup_A').hide();
		$('#contenue_objectif_A').hide();
		$('#dv_cont_obj_b').hide();
		$('#dv_cont_obj_sup_b').hide();
		$('#dv_cont_obj_c').hide();
		$('#dv_cont_obj_sup_c').hide();
		$('#dv_cont_obj_d').hide();
		$('#dv_cont_obj_sup_d').hide();
		$('#dv_cont_obj_e').hide();
		$('#dv_cont_obj_sup_e').hide();
		$('#dv_cont_obj_f').hide();
		$('#dv_cont_obj_sup_f').hide();
		$('#dv_cont_menu_rsci').hide();

		$('#contRsciImmo').hide();
		$('#contRsciPaie').hide();
		$('#contRsciRecette').hide();
		$('#contRsciDepense').hide();
		$('#contRsciStock').hide();
		$('#contRsciVente').hide();
		$('#contRsciInfo').hide();
		$('#contRsciEnvironnement').hide();
		$('#contimb').hide();
		$('#contev').hide();
		$('#contia').hide();
		$('#contib').hide();
		$('#contic').hide();
		$('#contid').hide();
		$('#contSupConclusion').hide();
		$('#contenue_poste_a').hide();
		$('#contenue').fadeIn(1000);
	});

	$("#RDC").unbind("click");	
	$("#RDC").click(function(){
		$('#contenue').hide();
		$(this).css('background-color','#2ca3f3');
		$('.Rap_def').removeAttr("style");
		$('#RSCI').removeAttr("style");
		$('#RA').removeAttr("style");
		$('#Ref_arch').removeAttr("style");
		$('#Rap_int').removeAttr("style");
		
		//////////////// traitement RDC luc rodin //////////////////////////////////
		$('#ContentSynthAchat').hide();
		$('#dv_donnees_financiers_RA').hide();
		$('#contenue_rsci').hide();
		$('#contenue_objectif_sup_A').hide();
		$('#contenue_objectif_A').hide();
		$('#dv_cont_obj_b').hide();
		$('#dv_cont_obj_sup_b').hide();
		$('#dv_cont_obj_c').hide();
		$('#dv_cont_obj_sup_c').hide();
		$('#dv_cont_obj_d').hide();
		$('#dv_cont_obj_sup_d').hide();
		$('#dv_cont_obj_e').hide();
		$('#dv_cont_obj_sup_e').hide();
		$('#dv_cont_obj_f').hide();
		$('#dv_cont_obj_sup_f').hide();
		$('#dv_cont_menu_rsci').hide();
		$('#contenue_poste_a').hide();

		$('#contRsciImmo').hide();
		$('#contRsciPaie').hide();
		$('#contRsciRecette').hide();
		$('#contRsciDepense').hide();
		$('#contRsciStock').hide();
		$('#contRsciVente').hide();
		$('#contRsciInfo').hide();
		$('#contRsciEnvironnement').hide();
		$('#contimb').hide();
		$('#contev').hide();
		$('#contia').hide();
		$('#contib').hide();
		$('#contic').hide();
		$('#contid').hide();
		$('#contSupConclusion').hide();
		$('#contenue').fadeIn(1000);
		waiting();
		$("#contenue").load("RDC/index.php",stopWaiting);
	});
	$("#Rap_int").click(function(){

		$(this).css('background-color','#2ca3f3');
		$('#RDC').removeAttr("style");
		$('#RSCI').removeAttr("style");
		$('#RA').removeAttr("style");
		$('#Ref_arch').removeAttr("style");
		$('.Rap_def').removeAttr("style");
		// alert("azertyuiop");
		
		////////////////////////////////////////////////////////////////////////////
		
		$('#ContentSynthAchat').hide();
		$('#dv_donnees_financiers_RA').hide();
		$('#contenue_rsci').hide();
		$('#contenue_objectif_sup_A').hide();
		$('#contenue_objectif_A').hide();
		$('#dv_cont_obj_b').hide();
		$('#dv_cont_obj_sup_b').hide();
		$('#dv_cont_obj_c').hide();
		$('#dv_cont_obj_sup_c').hide();
		$('#dv_cont_obj_d').hide();
		$('#dv_cont_obj_sup_d').hide();
		$('#dv_cont_obj_e').hide();
		$('#dv_cont_obj_sup_e').hide();
		$('#dv_cont_obj_f').hide();
		$('#dv_cont_obj_sup_f').hide();
		$('#dv_cont_menu_rsci').hide();
		$('#contenue_poste_a').hide();

		$('#contRsciImmo').hide();
		$('#contRsciPaie').hide();
		$('#contRsciRecette').hide();
		$('#contRsciDepense').hide();
		$('#contRsciStock').hide();
		$('#contRsciVente').hide();
		$('#contRsciInfo').hide();
		$('#contRsciEnvironnement').hide();
		$('#contimb').hide();
		$('#contev').hide();
		$('#contia').hide();
		$('#contib').hide();
		$('#contic').hide();
		$('#contid').hide();
		$('#contSupConclusion').hide();
		
		////////////////////////////////////////////////////////////////////////////
		
		$('#contenue').fadeIn(1000);
		$("#contenue").load("Rap_Inter/index.php");
		
		
		
	});

	$(".Rap_def").click(function(){
		
	  // $("#dv_cont_menu_rsci").empty();
		/*$(this).css('background-color','#2ca3f3');
		$("#contenue").load("Rap_Inter/rapport_definitif.php");
		$('#RDC').removeAttr("style");
		$('#RSCI').removeAttr("style");
		$('#RA').removeAttr("style");
		$('#Ref_arch').removeAttr("style");
		$('#Rap_int').removeAttr("style");*/
		$('#contenue').hide();
		$(this).css('background-color','#2ca3f3');
		$('#Rap_int').removeAttr("style");
		$('#RSCI').removeAttr("style");
		$('#RDC').removeAttr("style");
		$('#Ref_arch').removeAttr("style");
		$('.Rap_def').removeAttr("style");
		
		$('#ContentSynthAchat').hide();
		$('#contenue_rsci').hide();
		$('#contenue_objectif_sup_A').hide();
		$('#contenue_objectif_A').hide();
		$('#dv_cont_obj_b').hide();
		$('#dv_cont_obj_sup_b').hide();
		$('#dv_cont_obj_c').hide();
		$('#dv_cont_obj_sup_c').hide();
		$('#dv_cont_obj_d').hide();
		$('#dv_cont_obj_sup_d').hide();
		$('#dv_cont_obj_e').hide();
		$('#dv_cont_obj_sup_e').hide();
		$('#dv_cont_obj_f').hide();
		$('#dv_cont_obj_sup_f').hide();
		$('#dv_cont_menu_rsci').hide();

		$('#contRsciImmo').hide();
		$('#contRsciPaie').hide();
		$('#contRsciRecette').hide();
		$('#contRsciDepense').hide();
		$('#contRsciStock').hide();
		$('#contRsciVente').hide();
		$('#contRsciInfo').hide();
		$('#contRsciEnvironnement').hide();
		$('#contimb').hide();
		$('#contev').hide();
		$('#contia').hide();
		$('#contib').hide();
		$('#contic').hide();
		$('#contid').hide();
		$('#contSupConclusion').hide();
		$('#contenue_poste_a').hide();
		$('#contenue').fadeIn(1000);
		$("#contenue").load("Rap_Inter/rapport_definitif.php");

			
			
	});
			
	$("#Ref_arch").click(function(){
		$(this).css('background-color','#2ca3f3');
		$('#RDC').removeAttr("style");
		$('#RSCI').removeAttr("style");
		$('#RA').removeAttr("style");
		$('.Rap_def').removeAttr("style");
		$('#Rap_int').removeAttr("style");
	});	
});
