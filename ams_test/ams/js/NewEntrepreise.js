			$(function(){
			///////////////////////////////////upload document//////////////////////////
			
			$("#plus_up").click(function(){
				alert("Veuillez s\351lectionner les documents permanents de l\'entreprise");
				$("#docFileId").click();
			
			});
			///////////////////////////////////////////////////telecharger img///////////////////////////////////////////
			$("#logoGet").click(function(){
				$("#logoname").click();
				// $("#load").show();
				
			});
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			jQuery(document).ready(function($) {
				  $('a[rel*=facebox]').facebox();
				}) ;
				
				$('#annulerId').click(function(){
					
					parent.location = "accueil.php";
				
				});
			
				
				
				////////////////////////////affichage  insert info/////////////////////////
				$("#comptable").click(function(){
					$("#info_base").hide();
					$("#info_juri").hide();
					$("#trav_com").show();
			
					$("#enregistrerId").hide();
					$("#prec2").hide();
					$("#suiv1").hide();
					$("#suiv2").show();
					$("#prec1").show();
					
				$("#juridique").css("color","#009afc");
				$("#juridique").css("background-color","#F8F8FF");
				$("#basique").css("color","#009afc");
				$("#basique").css("background-color","#F8F8FF");
				$("#comptable").css("color","#fff");
				$("#comptable").css("background-color","009afc");
				
				});
					$("#juridique").click(function(){
					$("#info_base").hide();
					$("#info_juri").show();
					$("#trav_com").hide();
					
					$("#basique").css("color","#009afc");
					$("#basique").css("background-color","#F8F8FF");
					$("#comptable").css("color","#009afc");
					$("#comptable").css("background-color","#F8F8FF");
					$("#juridique").css("color","#fff");
					$("#juridique").css("background-color","#009afc");
					
					
					$("#enregistrerId").show();
					$("#prec1").hide();
					$("#suiv1").hide();
					$("#suiv2").hide();
					$("#prec2").show();
				
				});
					$("#basique").click(function(){
					$("#info_base").show();
					$("#info_juri").hide();
					$("#trav_com").hide();
				
				
					$("#basique").css("color","#fff");
					$("#basique").css("background-color","#009afc");
					$("#comptable").css("color","#009afc");
					$("#comptable").css("background-color","#F8F8FF");
					$("#juridique").css("color","#009afc");
					$("#juridique").css("background-color","#F8F8FF");
					
					$("#enregistrerId").hide();
					$("#prec1").hide();
					$("#suiv1").show();
					$("#suiv2").hide();
					$("#prec2").hide();
				});
				
				$("#suiv1").click(function(){
					$(this).hide();
					$("#suiv2").show();
					$("#prec1").show();
					$("#info_base").hide();
					$("#trav_com").show();
					
					$("#basique").css("color","#009afc");
					$("#basique").css("background-color","#F8F8FF");
					$("#comptable").css("color","#fff");
					$("#comptable").css("background-color","009afc");
					
				});
				
				$("#suiv2").click(function(){
					$(this).hide();
					$("#prec1").hide();
					$("#enregistrerId").show();
					$("#prec2").show();
					$("#info_juri").show();
					$("#trav_com").hide();
					$("#comptable").css("color","#009afc");
					$("#comptable").css("background-color","#F8F8FF");
					$("#juridique").css("color","#fff");
					$("#juridique").css("background-color","#009afc");
					
				});
				$("#prec1").click(function(){
					$(this).hide();
					$("#suiv1").show();
					$("#suiv2").hide();
					$("#info_base").show();
					$("#trav_com").hide();
					
					$("#basique").css("color","#fff");
					$("#basique").css("background-color","#009afc");
					$("#comptable").css("color","#009afc");
					$("#comptable").css("background-color","#F8F8FF");
				});	
				
				$("#prec2").click(function(){
					$(this).hide();
					$("#enregistrerId").hide();
					$("#suiv1").hide();
					$("#suiv2").show();
					$("#prec1").show();
					$("#info_base").hide();
					$("#info_juri").hide();
					$("#trav_com").show();
					
					$("#juridique").css("color","#009afc");
					$("#juridique").css("background-color","#F8F8FF");
					$("#comptable").css("color","#fff");
					$("#comptable").css("background-color","#009afc");				
				});
	
				$('#txt_dateCreation').datepick({ 
				dateFormat: 'dd/mm/yyyy'
				});
				$('#txtExoCom').datepick({ 
				dateFormat: 'dd/mm'
				});
		
				
			});
		

		$(function(){
				$("#logoname").change(function(){
					$("#logo").html('');
					var fileInput=document.querySelector('#logoname');
					for(i=0;i<fileInput.files.length;i++){
						var reader=new FileReader();
						reader.readAsDataURL(fileInput.files[i]);
						reader.onload=function(event){
							image=document.createElement('img');
							image.src=event.target.result;
							$("#logo").html(image);
							$("#logo img").css("width","150px");
							$("#logo img").css("heigth","150px");
						};
					}
				});
			});
			/////////////////////////////////////////logo fin///////////////////
			function affich_case(){
				var nbrAct=$("#NbrActionnair").val();
				$.ajax({
					type:"POST",
					url:"entreprise/addActionnair.php",
					data:{a:nbrAct},
					success:function(e){
						
						 $("#actMiampy").html(e);
					}
				});
			
			}
			function affich_casePost(){
			
				var nbrAct=$("#NbrPostCle").val();
				$.ajax({
					type:"POST",
					url:"entreprise/addpostCle.php",
					data:{a:nbrAct},
					success:function(e){
						 $("#post_cle").html(e);
					}
				});
			
			}
