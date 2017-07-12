/**scripte des icones mère**/
$(function(){
$("#zone_telechargement").show();
		$("#Rap_RSCI").click( function(){
			$(".div_RSCI").show();
			$("#Sous_rdc_tbl").fadeOut(1000);
			$("#Sous_RA").fadeOut(1000);
				$(".Sous_rdc").hide(1000);
			$("#Sous_Rap_In_mission").fadeOut(1000);
			$("#Sous_Memorandum").fadeOut(1000);
			 //$("#Sous_rsci").load("../page_telechargement.php #Formulaire_rapport");
		});
		
		$("#Rap_RDC").click( function(){
			$("#zone_telechargement").show();
			$(".Sous_rdc").show(1000);
			$("#Sous_rdc_tbl").fadeIn(1000);
			
			$(".div_RSCI").fadeOut(1000);
			$("#Sous_RA").fadeOut(1000);
			$("#Sous_Rap_In_mission").fadeOut(1000);
			$("#Sous_Memorandum").fadeOut(1000);
		});
		
		$("#Rap_RA").click( function(){
			$("#zone_telechargement").show();
			$("#Sous_RA").fadeIn(1000);
			$(".div_RSCI").fadeOut(1000);
			$(".Sous_rdc").fadeOut(1000);
			$("#Sous_rsci_tbl").fadeOut(1000);
			$("#Sous_Rap_In_mission").fadeOut(1000);
			$("#Sous_Memorandum").fadeOut(1000);
		});
		
		$("#Rap_In_mission").click( function(){
			$("#zone_telechargement").show();
			$(".Sous_rdc").fadeOut(1000);
			$(".div_RSCI").fadeOut(1000);
			$("#Sous_Rap_In_mission").fadeIn(1000);
			$("#Sous_rdc_tbl").fadeOut(1000);
			$("#Sous_rsci_tbl").fadeOut(1000);
			$("#Sous_RA").fadeOut(1000);
			$("#Sous_Memorandum").fadeOut(1000);
		});
	
	
		$("#Rap_Memor").click(function(e) {
            $("#zone_telechargement").show();
			$("#Sous_Rap_In_mission").fadeOut(1000);
			$(".Sous_rdc").fadeOut(1000);
			$(".div_RSCI").fadeOut(1000);
			$("#Sous_Memorandum").fadeIn(1000);
			$("#Sous_rdc_tbl").fadeOut(1000);
			$("#Sous_rsci_tbl").fadeOut(1000);
			$("#Sous_RA").fadeOut(1000);
        });
	
	
	
	
//scripte des sous icones

	$("#repTach").click(function(){
		// $("#fon_Rap_Inter").css("background-color","red");
		$("#fon_Rap_Inter").css("overflow","auto");
		$("#fon_Rap_Inter").load("Rap_Inter/repartition_tache.php");
	});
});



