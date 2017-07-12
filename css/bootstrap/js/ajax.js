		$(function(){
		jQuery(document).ready(function($) {
			$('a[rel*=facebox]').facebox();
			
		}) ;
		
		$('.Gest').fancybox();
		
		//=====================gest_pro============================================================
		$("#gest_pro").mouseleave(function(){
										   
			$("#gest_pro").fadeOut(600);
		});
		$("#compte").mouseover(function(){
				$("#aide_apropos").hide();						
				$('#gest_pro').slideToggle(600,function(){$('#gest_pro').css('margin-right','10px');});
		});
		$("#gest_p").click(function(){
				$("#Acc").load("profil/monProfil.php");
				$("#gest_pro").fadeOut(1000);
			
			});
			
			$("#utilisateur").click(function(){
				
			
				
			var nom= $("#makaNom").val();
					$.ajax({
						type:"POST",
						url:"droitAccUtil.php",
						data:{nom:nom},
						success:function(e){
							//alert(e);
							if(e==2){
							$("#Acc").load("profil/utilisateur.php");
							$("#gest_pro").fadeOut(1000);
							}
							else if(e==0 || e==1){
								//alert("ccc");
								$("#Acc").load("profil/utilisateur.php");
							//$("#Acc").load("profil/utilisateurConsultation.php");
							$("#gest_pro").fadeOut(1000);
							}
						}
					});
				
			
		});
		//============ AIDE et A PROPOS ==========================================================
			$("#aide").mouseover(function(){
				$("#gest_pro").hide();
				$('#aide_apropos').slideToggle(600,function(){$('#aide_apropos').css('margin-right','10px');});
			});
			$("#aide_").click(function(){
				$("#fenetre_aide").show();					  
			});
			$("#btn_fermeture").click(function(){
				$("#fenetre_aide").hide();
				//$("#fenetre_apropos").hide();
			});
			$("#btn_fermeture1").click(function(){
				$("#fenetre_apropos").hide();
			});
			$("#apropos_").click(function(){
				$("#fenetre_apropos").show();				  
			});
		//=========================================================================================
		
		
			
		///////////////////deconnexion//////////////////////////
			$("#power").click(function(){
				$("a.Gest").fancybox();
			});
			
			$(document).on('click',"#decon",function(){
					$("a.Gest").fancybox();
				});
				
			$("#okferme").click(function(){
				parent.location='logout.php';
			});
				
			////////////////////////////////////////////////////////
		
			$('#logo_ams').click(function(){
				parent.location = "accueil.php";
			});
			
			
			
			$("#btn_new_entreprise").click(function(){
				$("#Acc").load("entreprise/ajoutEntreprise.php");
			});
		
		});
		function doubleclicker(id,code){
			var x=code;
			s=x;
			$.ajax({
				type:"POST",
				url:"entreprise/viewEntreprise.php",
				data:{a:s},
				success:function(e){
				  $("#Acc").html(e);
				}
			});
			
			$.ajax({
				type:"POST",
				url:"entreprise/viewListMission.php",
				data:{a:s},
				success:function(e){
				}
			});
			
		}
/*
	function select(idtr,cpt){
		var id = idtr;
		waiting();			
		$.ajax({
			type:"POST",
			url:"traitement.php",
			data:{z:id},
			success:function(e){
				$("#Acc").html(e);
				stopWaiting();
			}	
		 });	
	}
	*/
	function select(idtr,cpt){
		var id = idtr;
		waiting();			
		$.ajax({
			type:"POST",
			url:"traitement.php",
			data:{z:id},
			success:function(e){
				$("#Acc").html(e);
				stopWaiting();
			}	
		 });	

		
		get_mission (idtr);
	}

	
		
		function cejour() {
		 var maintenant = new Date();
		 var jour = maintenant.getDate();
		 var mois = maintenant.getMonth() + 1;
		 var an = maintenant.getYear();
		 if(an < 999) an += 1900;
		 var jourprec  = ((jour < 10) ? "0" : "");
		 var moisprec  = ((mois < 10) ? ".0" : ".");
		 var date = jourprec + jour + moisprec + mois  + "." + an;
		 document.write("<h1>" + date + "<\/h1>")
		}
		
	



function GetDomOffset( Obj, Prop ) {
	var iVal = 0;
	while (Obj && Obj.tagName != 'BODY') {
		eval('iVal += Obj.' + Prop + ';');
		Obj = Obj.offsetParent;
	}
	return iVal;
}
function resizeContenue(){
	
	var hauteurPied = $('#pied').height();
	var hauteurTete = $('#entete').height();
	var hauteurComteneur = $('#comteneur').height();
	var hauteurConteneur=hauteurComteneur - hauteurTete - hauteurPied;
	$('#contenue').css({
       		 			height:hauteurConteneur
    				});
}

$( window ).bind('resize load',function() {
 	resizeContenue();
 	resizeListeEntreprise();
});
/*
function afficheMenue(){
	var afficheur = $('#menu_laterale');
	taille=afficheur.width();
	if(taille<10){
		afficheur.animate({width:'100px'});
	}
	else{
		afficheur.animate({width:'2px'});
	}
	resizeData();
}
*/
//[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[Rapport]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]]
function afficheMenue(){
	$("#contenue_laterale").show();

	var afficheur = $("#menu_laterale");
	taille=afficheur.width();
	if(taille<10){
		$("#menu_laterale").animate({width:'80px'});

	}
	else{
		$("#menu_laterale").animate({width:'2px'});
	}

}

//PRENDRE L ID MISSION CLIQUE
function get_mission (idtr){
 var id = idtr;

$.ajax({
			type:"POST",
			url:"../popup_rapport.php",
			data:{z:id},
			success:function(e){
				$("#liste_rapport").html(e);
				//stopWaiting();
			}	
		 });
$("#menu_laterale").animate({width:'2px'});
}

//==========================================================================================================

function resizeListeEntreprise(){
	var liste_entreprise = $('#liste_entreprise').height();
	var titre_liste_entreprise = $('#titre_liste_entreprise').height();
	var hauteur=liste_entreprise - titre_liste_entreprise;
	$('#contenue_liste_entreprise').css({
       		 					height:hauteur
    								});
}
function afficheStatut(i){
	affiche=$("#statut-"+i+"");
	ecran=affiche.css("display");
	if (ecran!="block") {
		$(".un_statut_entreprise").slideUp(500);
		affiche.slideDown(500);
	};
}

function search(){
	var GetSearch=$("#input_entreprise").val();
	$.ajax({
		type:"post",
		url:"../recherche.php",
		data:{a:GetSearch},
		success:function(e){
			$("#contenue_liste_entreprise").html(e);
		}
	});
}
	function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'imprimable', 'height=400,width=600');
        mywindow.document.write('<html><head><title>imprimable</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();
        return true;
    }

