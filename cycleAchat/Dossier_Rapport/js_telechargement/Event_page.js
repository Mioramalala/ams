
$(document).ready(function (){

$("#tr").focus(function()
    {
    $("#tr").css('background-color', 'yellow');
    });

$("#sous_menu_rsci").hide();
	   $("#afficher_rsci").mouseover(function () { 
	    
		//$("#tr_afficher").slideToggle();
		$("#sous_menu_rsci").delay(1000).slideToggle();
	      
	  });
	  //========================================================
	  //
	  //  EVENEMENT UPLOAD
	  //
	  //========================================================
		 $("#div_upload").hide();
		 $(".label_upload").click(function (){
		  $("#div_upload").show(1000);
		 });
		 
});




	
