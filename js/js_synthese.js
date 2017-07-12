$(document).ready(function (e)
	{


		CYCLETYPE=$("#CYCLETYPE").attr("value");
		idMission=$("#idMission").attr("value");
		MISSION_ANNEE=$("#MISSION_ANNEE").attr("value");
		ENTREPRISE_ID=$("#ENTREPRISE_ID").attr("value");
		MISSION_TYPE=$("#MISSION_TYPE").attr("value");
		//alert(CYCLETYPE);
		
		selectSYNTHESE(idMission,"",CYCLETYPE);//IDMISSION;
		PositionProcess(ENTREPRISE_ID,MISSION_ANNEE,MISSION_TYPE);
		//$('#SynthAchat').click();

				//$('#dv_cont_menu_rsci').hide();
				//$('#contenue_rsci').show();
				//$('#deux_tresorerie').hide();
				//$('#bt_tresorerie').show();
				//bloquerOnglets();
		//positionCycle(1);
		//alert("CCC");










	});

	//var lienSYnthese="";
	function selectSYNTHESE(idtr,cpt,cycleTYPE)
	{


				var id = idtr;
				
				waiting();			
				$.ajax({
					type:"POST",
					url:"traitement.php",
					data:{z:id},
					success:function(e){
						$("#Acc").html(e);
						stopWaiting();

							//************** DEBUT RSCI SYNTHESE *******************
								if(cycleTYPE=="ACHAT")
								{
											$('#bt_achat').click();
											AJAX_SYNTHESE("cycleAchat/synthese.php");
								}
								else if(cycleTYPE=="VENTE")
								{
											$('#bt_vente').click();	
											AJAX_SYNTHESE("cycleVente/synthese.php");
								
								}else if(cycleTYPE=="PAIE")
								{
											$('#bt_paie').click();
											AJAX_SYNTHESE("cyclePaie/synthese.php");	
								}
								else if(cycleTYPE=="ENVIRONMNT_CONTROL")
								{
											$('#bt_env').click();
											AJAX_SYNTHESE("cycleEnvironnement/synthese.php");	
								}
								else if(cycleTYPE=="RECETTE")
								{
											$('#bt_recette').click();
											AJAX_SYNTHESE("cycleRecette/synthese.php");	
								}
								else if(cycleTYPE=="DEPENSE")
								{
											$('#bt_dep').click();
											AJAX_SYNTHESE("cycleDepense/synthese.php");	
								}

								

								else if(cycleTYPE=="IMMOBILIER")
								{
											$('#bt_immo').click();	
											AJAX_SYNTHESE("cycleImmo/synthese.php");
								
								}
								else if(cycleTYPE=="STOCK")
								{
											$('#bt_stock').click();	
											AJAX_SYNTHESE("cycleStock/synthese.php");
								
								}
								else if(cycleTYPE=="SYSTEM_INFOS")
								{
											$('#bt_syst').click();	
											AJAX_SYNTHESE("cycleInfo/synthese.php");
								
								}else if(cycleTYPE=="SYNTHESE_RSCI")
								{
								}

								//************** FIN RSCI SYNTHESE *******************

								
						
						
						//alert("cccc")
						

					}	
				 });
				get_missionSYNTHESE (idtr);
	}
	//PRENDRE L ID MISSION CLIQUE


	function get_missionSYNTHESE (idtr)
	{
	 
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


	function AJAX_SYNTHESE(lienSYnthese)
	{
								$.ajax({
										type:'GET',
										url:lienSYnthese,
										success:function(e){
											$('#ContentSynthAchat').html(e).show();
											$('#contenue_rsci').hide();
										}
									});
	}


