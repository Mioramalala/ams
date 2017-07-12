
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
		
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_PDF/RSCI/Cycle_ACHAT/Export_cycle_achat_pdf.php",
                send : $('#ltr_cycle_achat').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                },
                success : function(data){
                $('#ltr_cycle_achat').html(data);
            }
			});
			});
			
			//LISTE RSCI -CYCLE IMMO ======================================
	  $("#btn_ltr_cycle_immo").click(function () { 
		
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_PDF/RSCI/Cycle_IMMO/Export_IMMO_pdf.php",
                send : $('#ltr_cycle_immo').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
				,
                success : function(data){
                $('#ltr_cycle_immo').html(data);
            }
			});
			});
			//LISTE RSCI -CYCLE VENTES ======================================
	  $("#btn_ltr_rsci_ventes").click(function () { 
		
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
			});
			//LISTE RSCI -CYCLE PAIE ======================================
	  $("#btn_ltr_rsci_paie").click(function () { 
		
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_PDF/RSCI/Cycle_PAIE/Export_PAIE_pdf.php",
                send : $('#ltr_rsci_paie').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
				,
                success : function(data){
                $('#ltr_rsci_paie').html(data);
            }
			});
			});
			//LISTE RSCI -CYCLE TRESORERIE RECETTES ======================================
	  $("#btn_ltr_rsci_tr_recette").click(function () { 
		
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Word/rsci_tresorie_recette.php",
                send : $('#ltr_rsci_tr_recette').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
				,
                success : function(data){
                $('#ltr_rsci_tr_recette').html(data);
            }
			});
			});
			//LISTE RSCI -CYCLE TRESORERIE DEPENSE ======================================
	  $("#btn_ltr_rsci_tr_depense").click(function () { 
		
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
			});
					//LISTE RSCI -CYCLE ENVIRONNEMENT ET CONTROLE ======================================
	  $("#btn_ltr_rsci_EC").click(function () { 
		
            $.ajax({
                type : "POST",
                //url : "Dossier_Rapport/Reporting_Word/rsci_env_control.php", 
                url : "Dossier_Rapport/Reporting_PDF/RSCI/Environnement_control/Export_Environnement_control_pdf.php",
				send : $('#ltr_rsci_EC').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
				,
                success : function(data){
                $('#ltr_rsci_EC').html(data);
            }
			});
			});
			//LISTE RSCI -CYCLE systeme information ======================================
	  $("#btn_ltr_rsci_SI").click(function () { 
		
            $.ajax({
                type : "POST",
               // url : "Dossier_Rapport/Reporting_Word/rsci_system_info.php",
                 url : "Dossier_Rapport/Reporting_PDF/RSCI/System_info/Export_system_info_pdf.php",
                //007
                send : $('#ltr_rsci_SI').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
				,
                success : function(data){
                $('#ltr_rsci_SI').html(data);
            }
			});
			});
			
			//LISTE RSCI -CYCLE STOCKS ======================================
	  $("#btn_ltr_rsci_stocks").click(function () { 
		
            $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_PDF/RSCI/Cycle_STOCKS/Export_STOCKS_pdf.php",
                send : $('#ltr_rsci_stocks').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
				,
                success : function(data){
                $('#ltr_rsci_stocks').html(data);
            }
			});
			});
			//planification_generale ======================================
	  $("#btn_planification_generale").click(function () { 
		
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
		 $.ajax({
                type : "POST",
                url : "Dossier_Rapport/Reporting_Excel/Fond_propre_xL.php",
                send : $('#Font_propre_excel').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
				,
                success : function(data){
                $('#Font_propre_excel').html(data);
            }
			});
			}); 

              $("#btn_rdc_tresor").click(function () { 
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
            });

                   $("#btn_immo_fin").click(function () { 
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
            });
			$("#btn_emprunt").click(function () { 
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
            });
			$("#btn_in_corp").click(function () { 
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
            });
			$("#btn_stock").click(function () { 
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
            });
			$("#btn_paie_pers").click(function () { 
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
            });
			$("#btn_deb_cred").click(function () { 
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
            });
			$("#btn_prod_cli").click(function () { 
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
            });

			$("#btn_chrg_frs").click(function () { 
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
            });
//

    $("#btn_impot_taxe").click(function () { 
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
            });
    
       $("#btn_note_synthese").click(function () { 
         $.ajax({
                type : "POST",
                url :"Dossier_Rapport/Reporting_Word/rap_def_noteSynthese.php",
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

           $("#btn_rap_general").click(function () { 
         $.ajax({
                type : "POST",
                url :"Dossier_Rapport/Reporting_Word/rapport_general_w.php",
                send : $('#rap_general').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#rap_general').html(data);
            }
            });
            }); 
			
			
     $("#btn_Note_annexe").click(function () { 
         $.ajax({
                type : "POST",
                url :"Dossier_Rapport/Reporting_Word/Note_annexe_w.php",
                send : $('#Note_annexe').html("<img src='Dossier_Rapport/img/loading.gif'  alt='chargement' height='30px' width='30px' />"),
                error :function(msg){
                    alert( "Erreur  : " + msg );
                }
                ,
                success : function(data){
                $('#Note_annexe').html(data);
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




	
