/**scripte des icones mère**/
$(function(){
		$("#Rap_RSCI").click( function(){
			$("#Sous_rsci_tbl").fadeIn(1000);
			$("#Sous_rdc_tbl").fadeOut(1000);
			$("#Sous_RA").fadeOut(1000);
			$("#Sous_Rap_In_mission").fadeOut(1000);
		});
		
		$("#Rap_RDC").click( function(){
			$("#Sous_rdc_tbl").fadeIn(1000);
			$("#Sous_rsci_tbl").fadeOut(1000);
			$("#Sous_RA").fadeOut(1000);
			$("#Sous_Rap_In_mission").fadeOut(1000);
		});
		
		$("#Rap_RA").click( function(){
			$("#Sous_RA").fadeIn(1000);
			$("#Sous_rdc_tbl").fadeOut(1000);
			$("#Sous_rsci_tbl").fadeOut(1000);
			$("#Sous_Rap_In_mission").fadeOut(1000);
		});
		
		$("#Rap_In_mission").click( function(){
			$("#Sous_Rap_In_mission").fadeIn(1000);
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



