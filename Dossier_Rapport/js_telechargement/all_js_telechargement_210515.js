
$(document).ready(function (){


      $("#btn_charger_fichier_uploader").click(function(){
 //var nom_fichier =$("#monfichier").val();
           // wait for the DOM to be loaded 
       
            // bind 'myForm' and provide a simple callback function 
            $('#frm_videomodif').ajaxForm(function() { 
			
                alert("Thank you for your comment!"); 
            }); 
      
 //$("#frm_videomodif").submit();

/*$(".Afficher").load("fichier_upload.php",function(){
    nom_fichier :$("#monfichier").val()
    */
	

      /*  $('form').ajaxForm({
        beforeSubmit: function() {
            $('#results').html('Submitting...');
        },
        success: function(data) {
            var $out = $('#results');
            $out.html('Your results:');
            $out.append('<div>
 
<pre>'+ data +'</pre></div>');
        }
    });*/

	
	
	
    });

//===========================================
 /*$("#btn_charger_fichier_uploader").click(function(){
    $("#frm_videomodif").submit();

    });
*/
$("#frm_videomodif").submit(function(e)
{
    var monfichier = $("#monfichier").val();

// alert (monfichier);
var formObj = $("#frm_videomodif");
 var formURL = formObj.attr("action");
 alert(formObj.serialize());
  var formData = new FormData(this);
  $.ajax({
         url: "UPL.php",
   type: "POST",
   data:  formData,
   mimeType:"multipart/form-data",
   contentType: false,
         cache: false,
   processData:false,
   success: function(data, textStatus, jqXHR)
      {
alert(data);
   // $(".Afficher").(data);
    return false;
    //$.facebox.close();
   // $.get("../artistes/includes/liste_videoArtiste_editor.php",function (res)

    }   
});

});





            
//});
      

//LETTRE D AFFIRMATION ======================================
	   $("#btn_ltr_affirm").click(function () { 
		//$("#formulaire_insertion").show();
		//$("#formulaire_insertion").load("Reporting_Word/formulaire_des_pages.php #form_affirmation");
            $.ajax({
                type : "POST",
               // url : "PagePDF/page_affirmation.php",
                url : "Dossier_Rapport/Reporting_Word/lettre_affirmation_w.php",
                send : $('#ltr_affirm').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
				,
                success : function(data){
                $('#ltr_affirm').html(data);
            }
			});
			});
			
			
			
			
	//LETTRE DE MISSION ======================================
	  $("#btn_ltr_mission").click(function () { 
		
            $.ajax({
                type : "POST",
               // url : "PagePDF/page_mission.php",
                url : "Dossier_Rapport/Reporting_Word/lettre_mission_w.php",
                send : $('#ltr_mission').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
				,
                success : function(data){
                $('#ltr_mission').html(data);
            }
			});
			});
			
	//LISTE PIECES ======================================
	  $("#btn_ltr_piece").click(function () { 
		
            $.ajax({
                type : "POST",
                //url : "PagePDF/page_pieces.php",
                url : "Dossier_Rapport/Reporting_Word/page_pieces_w.php",
                send : $('#ltr_piece').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
				,
                success : function(data){
                $('#ltr_piece').html(data);
            }
			});
			});

			//LISTE RSCI -CYCLE ACHAT ======================================
	  $("#btn_ltr_cycle_achat").click(function () { 


        if ($('#icone_achat').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Word/rsci_achat_w.php",
                    send : $('#ltr_cycle_achat').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#ltr_cycle_achat').html(data);
                }
                });
            }
        }
        else{
             $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_achat_w.php",
                send : $('#ltr_cycle_achat').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_cycle_achat').html(data);
            }
            });           
        }

        });
			
			//LISTE RSCI -CYCLE IMMO ======================================
	  $("#btn_ltr_cycle_immo").click(function () { 

        if ($('#icone_immo').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Word/rsci_immo_w.php",
                    send : $('#ltr_cycle_immo').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#ltr_cycle_immo').html(data);
                }
                });
            }
        }
        else{
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_immo_w.php",
                send : $('#ltr_cycle_immo').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_cycle_immo').html(data);
            }
            });        
        }
		
        });
			//LISTE RSCI -CYCLE VENTES ======================================
	  $("#btn_ltr_rsci_ventes").click(function () { 

        if ($('#icone_vente').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Word/rsci_ventes.php",
                    send : $('#ltr_rsci_ventes').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#ltr_rsci_ventes').html(data);
                }
                });
            }
        }
        else{
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_ventes.php",
                send : $('#ltr_rsci_ventes').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_rsci_ventes').html(data);
            }
            });
        }   

		});			
			
		//LISTE SYNTHESE RSCI BY NIAINA ======================================
		$("#btn_ltr_SYNTHESE").click(function () { 
//icone_synthese	


        if ($('#icone_synthese').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_synthese_w.php",
                send : $('#ltr_SYNTHESE').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                    $('#ltr_SYNTHESE').html(data);
                }
            });
            }
        }
        else{
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_synthese_w.php",
                send : $('#ltr_SYNTHESE').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                    $('#ltr_SYNTHESE').html(data);
                }
            });        
        }   


		});

		//REPARTITION DES TACHES BY NIAINA ======================================
		$("#btn_ltr_repartition").click(function () { 
		
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/repartition_tache_w.php",
                send : $('#ltr_repartition').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
				,
                success : function(data){
					$('#ltr_repartition').html(data);
				}
			});
		});
		
		//SYNTHESE RISQUES CONCEPTION SYSTEMES BY NIAINA ======================================
		$("#btn_synthese_risques").click(function () { 
            if ($('#icone_risque').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
                    $.ajax({
                        type : "POST",
                        url : "Dossier_Rapport/Reporting_Word/ra_synthese_risques.php",
                        send : $('#synthese_risque').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                        error :function(msg){
                            alert( "Erreur  : " + msg );
                        }
                        ,
                        success : function(data){
                            $('#synthese_risque').html(data);
                        }
                    });
                }
            }
	        else{	
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Word/ra_synthese_risques.php",
                    send : $('#synthese_risque').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
    				,
                    success : function(data){
    					$('#synthese_risque').html(data);
    				}
    			});
            }
		});

		//INCIDENCES BY NIAINA ======================================
		$("#btn_incidences").click(function () { 
            if ($('#icone_incidences').length) {
                if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {		
                    $.ajax({
                        type : "POST",
                        url : "Dossier_Rapport/Reporting_Word/ra_incidences.php",
                        send : $('#incidences').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                        error :function(msg){
                            alert( "Erreur  : " + msg );
                        }
        				,
                        success : function(data){
        					$('#incidences').html(data);
        				}
        			});
                }
            } else{
                    $.ajax({
                        type : "POST",
                        url : "Dossier_Rapport/Reporting_Word/ra_incidences.php",
                        send : $('#incidences').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                        error :function(msg){
                            alert( "Erreur  : " + msg );
                        }
                        ,
                        success : function(data){
                            $('#incidences').html(data);
                        }
                    });                
            }
		});

        //SEUIL DE SIGNIFICATION BY NIAINA ======================================
        $("#btn_seuil_signification").click(function () { 
            if ($('#icone_seuil').length) {
                if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {        
                    $.ajax({
                        type : "POST",
                        url : "Dossier_Rapport/Reporting_Word/ra_seuil_signification.php",
                        send : $('#seuil_signification').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                        error :function(msg){
                            alert( "Erreur  : " + msg );
                        }
                        ,
                        success : function(data){
                            $('#seuil_signification').html(data);
                        }
                    });
                }
            } else{
                    $.ajax({
                        type : "POST",
                        url : "Dossier_Rapport/Reporting_Word/ra_seuil_signification.php",
                        send : $('#seuil_signification').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                        error :function(msg){
                            alert( "Erreur  : " + msg );
                        }
                        ,
                        success : function(data){
                            $('#seuil_signification').html(data);
                        }
                    });                
            }
        });
		
        //TAUX DE SONDAGE BY NIAINA ======================================
        $("#btn_taux_sondage").click(function () { 
            if ($('#icone_sondage').length) {
                if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {          
			            $.ajax({
			                type : "POST",
			                url : "Dossier_Rapport/Reporting_Word/ra_taux_sondage.php",
			                send : $('#taux_sondage').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
			                error :function(msg){
			                    alert( "Erreur  : " + msg );
			                }
			                ,
			                success : function(data){
			                    $('#taux_sondage').html(data);
			                }
			            });
			          }
			      } else{
			            $.ajax({
			                type : "POST",
			                url : "Dossier_Rapport/Reporting_Word/ra_taux_sondage.php",
			                send : $('#taux_sondage').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
			                error :function(msg){
			                    alert( "Erreur  : " + msg );
			                }
			                ,
			                success : function(data){
			                    $('#taux_sondage').html(data);
			                }
			            });			      	
			      }
        });

        //REVUES ANALYTIQUES BY NIAINA ======================================
        $("#btn_revues_analytique").click(function () { 
            if ($('#icone_ra').length) {
                if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {                
				            $.ajax({
				                type : "POST",
				                url : "Dossier_Rapport/Reporting_Excel/ra_revues_analytiques.php",
				                send : $('#revues_analytique').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
				                error :function(msg){
				                    alert( "Erreur  : " + msg );
				                }
				                ,
				                success : function(data){
				                    $('#revues_analytique').html(data);
				                }
				            });
				      	}
				    }
				    else{
				            $.ajax({
				                type : "POST",
				                url : "Dossier_Rapport/Reporting_Excel/ra_revues_analytiques.php",
				                send : $('#revues_analytique').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
				                error :function(msg){
				                    alert( "Erreur  : " + msg );
				                }
				                ,
				                success : function(data){
				                    $('#revues_analytique').html(data);
				                }
				            });				    	
				    }
        });

    //RAPPORT GENERAL BY NIAINA ======================================
      $("#btn_rapport_general").click(function () { 
        
            $.ajax({
                type : "POST",
               // url : "PagePDF/page_mission.php",
                url : "Dossier_Rapport/Reporting_Word/rapport_general_w.php",
                send : $('#rapport_general').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#rapport_general').html(data);
            }
            });
            });

    //RAPPORT SPECIAL BY NIAINA ======================================
      $("#btn_rapport_special").click(function () { 
        
            $.ajax({
                type : "POST",
               // url : "PagePDF/page_mission.php",
                url : "Dossier_Rapport/Reporting_Word/rapport_special_w.php",
                send : $('#rapport_special').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#rapport_special').html(data);
            }
            });
            });

			//LISTE RSCI -CYCLE PAIE ======================================
	  $("#btn_ltr_rsci_paie").click(function () { 

        if ($('#icone_paie').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Word/rsci_paie.php",
                    send : $('#ltr_rsci_paie').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#ltr_rsci_paie').html(data);
                }
                });
            }
        }
        else{
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_paie.php",
                send : $('#ltr_rsci_paie').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_rsci_paie').html(data);
            }
            });
        }   
		
        });
			//LISTE RSCI -CYCLE TRESORERIE RECETTES ======================================
	  $("#btn_ltr_rsci_tr_recette").click(function () { 
        if ($('#icone_recette').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_tresorie_recette.php",
                //Export_cycle_achat_pdf
                send : $('#ltr_rsci_tr_recette').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_rsci_tr_recette').html(data);
            }
            });
            }
        }
        else{
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_tresorie_recette.php",
                //Export_cycle_achat_pdf
                send : $('#ltr_rsci_tr_recette').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_rsci_tr_recette').html(data);
            }
            });
        }  	
		
        });
			//LISTE RSCI -CYCLE TRESORERIE DEPENSE ======================================
	  $("#btn_ltr_rsci_tr_depense").click(function () { 
        if ($('#icone_depense').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Word/rsci_tresorie_depense.php",
                    send : $('#ltr_rsci_tr_depense').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#ltr_rsci_tr_depense').html(data);
                }
                });
            }
        }
        else{
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_tresorie_depense.php",
                send : $('#ltr_rsci_tr_depense').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_rsci_tr_depense').html(data);
            }
            });
        }   
		
        });
			//LISTE RSCI -CYCLE ENVIRONNEMENT ET CONTROLE ======================================
	  $("#btn_ltr_rsci_EC").click(function () { 

        if ($('#icone_env').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_env_control.php",
                send : $('#ltr_rsci_EC').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_rsci_EC').html(data);
            }
            });
            }
        }
        else{
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_env_control.php",
                send : $('#ltr_rsci_EC').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_rsci_EC').html(data);
            }
            });
        }   

		});
			//LISTE RSCI -CYCLE systeme information ======================================
	  $("#btn_ltr_rsci_SI").click(function () { 

        if ($('#icone_info').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_system_info.php",
                send : $('#ltr_rsci_SI').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_rsci_SI').html(data);
            }
            });
            }
        }
        else{
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_system_info.php",
                send : $('#ltr_rsci_SI').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_rsci_SI').html(data);
            }
            });
        }   
		

		
        });
			
			//LISTE RSCI -CYCLE STOCKS ======================================
	  $("#btn_ltr_rsci_stocks").click(function () { 
        if ($('#icone_stock').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Word/rsci_stocks.php",
                    send : $('#ltr_rsci_stocks').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#ltr_rsci_stocks').html(data);
                }
                });
            }
        }
        else{
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_stocks.php",
                send : $('#ltr_rsci_stocks').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#ltr_rsci_stocks').html(data);
            }
            });   
        }		

		});


			//planification_generale ======================================
	  $("#btn_planification_generale").click(function () { 
        if ($('#icone_planif').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {		
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/planification_general.php",
                send : $('#planification_generale').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
								,
                success : function(data){
                $('#planification_generale').html(data);
            		}
						});
          }
        } else{
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/planification_general.php",
                send : $('#planification_generale').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
								,
                success : function(data){
                $('#planification_generale').html(data);
            		}
						});        	
        }
			});
	
        //ReCAP rsci ======================================
      $("#btn_recap_rsci").click(function () { 
        
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/recap_rsci_w.php",
                send : $('#recap_rsci').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#recap_rsci').html(data);
            }
            });
            });
	
	//=============== EXCEL PARTY =============================================
		   $("#btn_Font_propre").click(function () { 
            console.log("Fond propre");
            if ($('#icone_fondPropre').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {   
    		    $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Font_propre_xL.php",
                    send : $('#Font_propre_excel').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
    				,
                    success : function(data){
                    $('#Font_propre_excel').html(data);
                }
    			});
                }
            } else{
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Font_propre_xL.php",
                    send : $('#Font_propre_excel').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#Font_propre_excel').html(data);
                }
                });                
            }
			}); 

            $("#btn_rdc_tresor").click(function () { 
            if ($('#icone_treso').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {   
                $.ajax({
                        type : "POST",
                        url : "Dossier_Rapport/Reporting_Excel/Tresorerie_xL.php",
                        send : $('#rdc_tresor').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                        error :function(msg){
                            alert( "Erreur  : " + msg );
                        }
                        ,
                        success : function(data){
                        $('#rdc_tresor').html(data);
                    }
                });
            }
            } else{
                $.ajax({
                        type : "POST",
                        url : "Dossier_Rapport/Reporting_Excel/Tresorerie_xL.php",
                        send : $('#rdc_tresor').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                        error :function(msg){
                            alert( "Erreur  : " + msg );
                        }
                        ,
                        success : function(data){
                        $('#rdc_tresor').html(data);
                    }
                });                
            }
            });

            $("#btn_immo_fin").click(function () { 
            if ($('#icone_Immo_fin').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {   
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Immo_fin_xL.php",
                    send : $('#immo_fin').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#immo_fin').html(data);
                }
                });
            }
            } else{
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Immo_fin_xL.php",
                    send : $('#immo_fin').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#immo_fin').html(data);
                }
                });                
            }
            });

			$("#btn_emprunt").click(function () {
            if ($('#icone_emprunt').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {    
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Emprunt_xL.php",
                    send : $('#emprunt').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#emprunt').html(data);
                }
                });
            }
            } else{
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Emprunt_xL.php",
                    send : $('#emprunt').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#emprunt').html(data);
                }
                });                
            }
            });

			$("#btn_in_corp").click(function () { 
            if ($('#icone_immoCorp').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {  
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Immo_in_corp_xL.php",
                    send : $('#in_corp').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#in_corp').html(data);
                }
                });
            }
            } else{
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Immo_in_corp_xL.php",
                    send : $('#in_corp').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#in_corp').html(data);
                }
                });                
            }
            });

			$("#btn_stock").click(function () { 
            if ($('#icone_STOCKS').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {  
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Stocks_xL.php",
                    send : $('#stock').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#stock').html(data);
                }
                });
            }
            } else{
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Stocks_xL.php",
                    send : $('#stock').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#stock').html(data);
                }
                });                
            }
            });

			$("#btn_paie_pers").click(function () { 
            if ($('#icone_Paie_personnel').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {                  
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Paie_personnel_xL.php",
                    send : $('#paie_pers').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#paie_pers').html(data);
                }
                });
            }} else{
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Paie_personnel_xL.php",
                    send : $('#paie_pers').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#paie_pers').html(data);
                }
                });                
            }
            });

			$("#btn_deb_cred").click(function () { 
            if ($('#icone_Debiteurs_crediteurs').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {  
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Deb_cred_xL.php",
                    send : $('#deb_cred').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#deb_cred').html(data);
                }
                });
            }} else{
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Deb_cred_xL.php",
                    send : $('#deb_cred').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#deb_cred').html(data);
                }
                });                
            }
            });

			$("#btn_prod_cli").click(function () { 
            if ($('#icone_Produits_clients').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Prod_cli_xL.php",
                    send : $('#prod_cli').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#prod_cli').html(data);
                }
                });
            }} else{
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Prod_cli_xL.php",
                    send : $('#prod_cli').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#prod_cli').html(data);
                }
                });                
            }
            });

			$("#btn_chrg_frs").click(function () { 
            if ($('#icone_Charges_fournisseurs').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/chrg_frs_xL.php",
                    send : $('#chrg_frs').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#chrg_frs').html(data);
                }
                });
            }} else{
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/chrg_frs_xL.php",
                    send : $('#chrg_frs').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#chrg_frs').html(data);
                }
                });                
            }
            });
//

            $("#btn_impot_taxe").click(function () { 
            if ($('#icone_Impots_taxes').length) {
            if (confirm('Le fichier existe deja, voulez-vous l\'ecraser?')) {
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Impot_xL.php",
                    send : $('#impot_taxe').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#impot_taxe').html(data);
                }
                });
            }} else {
                $.ajax({
                    type : "POST",
                    url : "Dossier_Rapport/Reporting_Excel/Impot_xL.php",
                    send : $('#impot_taxe').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                    error :function(msg){
                        alert( "Erreur  : " + msg );
                    }
                    ,
                    success : function(data){
                    $('#impot_taxe').html(data);
                }
                });                
            }
            });
    
            $("#btn_note_synthese").click(function () { 
            $.ajax({
                type : "POST",
                url :"Dossier_Rapport/Reporting_Word/rap_def_note_synthese.php",
                send : $('#note_synthese').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#note_synthese').html(data);
            }
            });
            });
			
			
			
			 $("#btn_charger_fichier_uploader").click(function(){
			 // alert('dddddddddd');
			 var nom_fichier =$("#monfichier").val();
			 $.ajax({
				 type : "POST",
                url :"Dossier_Rapport/fichier_upload.php",
				data:{nom_fichier:nom_fichier},
				  
				  error :function(msg){
                    alert( "Erreur  : " + msg );
                		},
                success : function(data){
               		 $('#label_upload').html(data);
            			}
				 });
				// alert(nom_fichier);
			 
			 
			 });
			

              
});




	
