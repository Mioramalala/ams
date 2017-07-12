$(document).ready(function() {

//==========================NOUVELLE AJOUT ====================================
$("#menu_laterale").animate({width:'1px'});

$( "#yahoo li" ).click(function() {
//var idString = $( this ).text();// + " = " + $( this ).attr( "id" );
//var idString1 = $( this ).attr( "id" );// + " = " + $( this ).attr( "id" );
var idString2 = $( this ).attr( "class" );
//var idString3 = $( this ).attr( "alt" );
var val =idString2;
//alert(val);
	/*$.ajax({
				type:"POST",
				url:"pop_up_fichier.php",
				data:{val:val},
				success:function(e){
				}
			});*/
		});	
//createCookie("rapport_cookies",val,7);
		
});






$("#liste_mission").click (function (){
$("#liste_rapport").show();
//alert ("cdckcmk");
});


//======================cookies===========================
 function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
//===========================================================================


});