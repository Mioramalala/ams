var idMission_;
var lienREVUERA_;
var choixlien;
$(document).ready(function (e)
	{



		CYCLETYPE=$("#CYCLETYPE").attr("value");
		idMission=$("#idMission").attr("value");
		MISSION_ANNEE=$("#MISSION_ANNEE").attr("value");
		ENTREPRISE_ID=$("#ENTREPRISE_ID").attr("value");
		MISSION_TYPE=$("#MISSION_TYPE").attr("value");

		REVUERA_=$("#REVUERA_").attr("value");
		choixlien=$("#choixlien").attr("value");




		idMission_=idMission;
		selectSYNTHESE(idMission);//IDMISSION;
		

		//alert(CYCLETYPE);
		
		//selectSYNTHESE(idMission,"",CYCLETYPE);//IDMISSION;
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

	function click_sousMenueREvueRA(lien,mission_id)
	{
		$("#contenue").html("");
		$("#contenue").load(lien+'?mission_id='+mission_id);
	}


	function selectSYNTHESE(idtr,cpt,cycleTYPE)
	{


					var id = idtr;
					waiting();			

					$("#Acc").load( "traitement.php", {"z":id},function() 
					{
						 stopWaiting();
						 setTimeout(function(){ 

						 	$("#RA").click(); 
							
							if(REVUERA_=="SYNTHESE_RISQUE")
							{
								lienREVUERA_="/RA/structure.php";
								
							}else if(REVUERA_=="incidence")
							{
								lienREVUERA_="/RA/incidence.php";
								
							}
							else if(REVUERA_=="Seuil_de_signification" || REVUERA_=="TAUX_SONDAGE")
							{
								lienREVUERA_="/RA/planification/planification.php";
								
							}
							else if(REVUERA_=="RA_FONDPROPRE")
							{
								lienREVUERA_="/RA/fond/fondpropre.php";
							}
							else if(REVUERA_=="RA_IMMOFI")
							{
								lienREVUERA_="/RA/immofi/immofi.php";
							}
							else if(REVUERA_=="RA_TRESORERIE")
							{
								lienREVUERA_="/RA/tresorerie/tresorerie.php";
							}
							else if(REVUERA_=="RA_TRESORERIE")
							{
								lienREVUERA_="/RA/tresorerie/tresorerie.php";
							}
							else if(REVUERA_=="RA_IMPOTTAXE")
							{
								lienREVUERA_="/RA/impot/impot.php";
							}
							else if(REVUERA_=="RA_VENTE")
							{
								lienREVUERA_="/RA/vente/vente.php";
							}
							else if(REVUERA_=="RA_DCD")
							{
								lienREVUERA_="/RA/dcdivers/dcdivers.php";
							}
							else if(REVUERA_=="RA_IMMOCORP_INCORP")
							{
								lienREVUERA_="/RA/immo/immo.php";
							}
							else if(REVUERA_=="RA_STOCK")
							{
								lienREVUERA_="/RA/stock/stock.php";
							}
							else if(REVUERA_=="RA_CHARGEFRS")
							{
								lienREVUERA_="/RA/charge/charge.php";
							}
							
							else if(REVUERA_=="RA_PAIE")
							{
								lienREVUERA_="/RA/paie/paie.php";
							}
							else if(REVUERA_=="RA_emprunt")
							{
								lienREVUERA_="/RA/emprunt/emprunt.php";
							}
							
							
							
							
							
							
							
							else if(REVUERA_=="PLANIF_GENERAL")
							{
								//alert(choixlien);
								lienREVUERA_="/RA/planification/planif_gen/planif_gen.php";
								
								
								
								
							}



							//javascript:click_sousMenueREvue('',$('#missId').val())
							click_sousMenueREvueRA(lienREVUERA_,idMission_);
							

							
							//


						 },500);
					  
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