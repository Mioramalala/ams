var idMission_;
var lienREVUE;
$(document).ready(function (e)
	{



		CYCLETYPE=$("#CYCLETYPE").attr("value");
		idMission=$("#idMission").attr("value");
		MISSION_ANNEE=$("#MISSION_ANNEE").attr("value");
		ENTREPRISE_ID=$("#ENTREPRISE_ID").attr("value");
		MISSION_TYPE=$("#MISSION_TYPE").attr("value");

		REVUERDC_=$("#REVUERDC_").attr("value");
		
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

						 	$("#RDC").click(); 
							
							if(REVUERDC_=="FONDPROPRES")
							{
								
												switch (choixlien)
													{
														case "TabRA":
														lienREVUE="RDC/fond_propre/CohPriCo/TabRA.php";
														break;
														
														case "TabRA2":
														lienREVUE="RDC/fond_propre/CohPriCo/TabRA2.php";
														break;
														
														case "Feuill_B1":
														lienREVUE="RDC/fond_propre/B/Feuill_B1.php";
														break;
														
														case "Feuill_B2":
														lienREVUE="RDC/fond_propre/B/Feuill_B2.php";
														break;
														
														case "Feuill_B3":
														lienREVUE="RDC/fond_propre/B/Feuill_B3.php";
														break;
														
														case "Feuill_C1":
														lienREVUE="RDC/fond_propre/C/Feuill_C1.php";
														break;
														
														case "Feuill_C2":
														lienREVUE="RDC/fond_propre/C/Feuill_C2.php";
														break;
														
														case "Feuill_D1":
														lienREVUE="RDC/fond_propre/D/Feuill_D1.php";
														break;
														
														case "Feuill_D2":
														lienREVUE="RDC/fond_propre/D/Feuill_D2.php";
														break;
														
														case "Feuill_E":
														lienREVUE="RDC/fond_propre/E/Feuill_E.php";
														break;
														
														
														
														
														
													
													
														default:
														
														lienREVUE="RDC/fond_propre/feuille_maitresse.php";
														break;
													}
											
										
								
								
								
							}
							else if(REVUERDC_=="TRESORERIE")
							{
								
											switch (choixlien)
											{
														case "A_coherence1":
														lienREVUE="RDC/tresorerie/A_coherence/coherence1.php?coherence_visible=OK";
														break;
														
														case "A_coherence2":
														lienREVUE="RDC/tresorerie/A_coherence/coherence2.php?coherence_visible=OK";
														break;
														
														
														case "B_regularite1":
														  lienREVUE="RDC/tresorerie/B_regularite/regularite1.php?regularite_visible=OK";             
														break;
														case "B_regularite2":
														  lienREVUE="RDC/tresorerie/B_regularite/regularite2.php?regularite_visible=OK";             
														break;
														case "B_regularite3":
														  lienREVUE="RDC/tresorerie/B_regularite/regularite3.php?regularite_visible=OK";             
														break;
														
														case "C_existence1":
														  lienREVUE="RDC/tresorerie/C_existence/existence1.php?existence_visible=OK";             
														break;
														case "C_existence2":
														  lienREVUE="RDC/tresorerie/C_existence/existence2.php?existence_visible=OK";             
														break;
														case "C_existence3":
														  lienREVUE="RDC/tresorerie/C_existence/existence3.php?existence_visible=OK";             
														break;
														case "C_existence4":
														  lienREVUE="RDC/tresorerie/C_existence/existence4.php?existence_visible=OK";             
														break;
														case "C_existence5":
														  lienREVUE="RDC/tresorerie/C_existence/existence5.php?existence_visible=OK";             
														break;
														case "C_existence6":
														  lienREVUE="RDC/tresorerie/C_existence/existence6.php?existence_visible=OK";             
														break;
														
														case "D_rattachement":
														  lienREVUE="RDC/tresorerie/D_rattachement/rattachement1.php?rattachement_visible=OK";             
														break;
														
														case "E_juridique":
														  lienREVUE="RDC/tresorerie/E_juridique/juridique.php?juridique_visible=OK";             
														break;
														
														case "F_information1":
														  lienREVUE="RDC/tresorerie/F_information/information1.php?information_visible=O";             
														break;
														case "F_information2":
														  lienREVUE="RDC/tresorerie/F_information/information2.php?information_visible=O";             
														break;
														
														
														
														
														
														
														
	
													
														default:
															
														lienREVUE="RDC/tresorerie/feuille_maitresse.php";
														break;
											}
								
								
							}
							else if(REVUERDC_=="IMMO_FINANCE")
							{
								
										switch (choixlien)
										{
														case "A_coherence1":
														lienREVUE="RDC/immofi/A_coherence/coherence1.php?coherence_visible=OK";
														break;
														case "A_coherence2":
														lienREVUE="RDC/immofi/A_coherence/coherence2.php?coherence_visible=OK";
														break;
														
														
														case "B_regularite1":
														lienREVUE="RDC/immofi/B_regularite/regularite1.php?regularite_visible=OK";
														break;
														case "B_regularite2":
														lienREVUE="RDC/immofi/B_regularite/regularite2.php?regularite_visible=OK";
														break;
														case "B_regularite3":
														lienREVUE="RDC/immofi/B_regularite/regularite3.php?regularite_visible=OK";
														break;
														
														case "C_existence":
														lienREVUE="RDC/immofi/C_existence/existence1.php?existence_visible=OK";
														break;
														
														case "D_evaluation1":
														lienREVUE="RDC/immofi/D_evaluation/evaluation1.php?evaluation_visible=OK";
														break;
														case "D_evaluation2":
														lienREVUE="RDC/immofi/D_evaluation/evaluation2.php?evaluation_visible=OK";
														break;
														
														case "E_rattachement":
														lienREVUE="RDC/immofi/E_rattachement/rattachement1.php?rattachement_visible=OK";
														break;
														
														case "F_juridique1":
														lienREVUE="RDC/immofi/F_juridique/juridique1.php?juridique_visible=OK";
														break;
														case "F_juridique2":
														lienREVUE="RDC/immofi/F_juridique/juridique2.php?juridique_visible=OK";
														break;
														case "F_juridiqu3":
														lienREVUE="RDC/immofi/F_juridique/juridique3.php?juridique_visible=OK";
														break;
														
														case "G_information1":
														lienREVUE="RDC/immofi/G_information/information1.php?information_visible=OK";
														break;
														
														case "G_information2":
														lienREVUE="RDC/immofi/G_information/information2.php?information_visible=OK";
														break;
														case "G_information3":
														lienREVUE="RDC/immofi/G_information/information3.php?information_visible=OK";
														break;
														
														
														
	
														
	
													
														default:
															
														lienREVUE="RDC/immofi/feuille_maitresse.php";
														break;
											}
								
								
								
								
							}
							else if(REVUERDC_=="EMPRUNTD_FINANC")
							{
								
								
								
										switch (choixlien)
										{
														
														
														case "empruntA1":
														lienREVUE="RDC/emprunt/empruntA/objetAED1.php?coherence_visible=OK";
														break;	
														case "empruntA2":
														lienREVUE="RDC/emprunt/empruntA/objetAED2.php?coherence_visible=OK";
														break;	
														
														case "empruntB1":
														lienREVUE="RDC/emprunt/empruntB/objetBED1.php?regularite_visible=OK";
														break;	
														case "empruntB2":
														lienREVUE="RDC/emprunt/empruntB/objetBED2.php?regularite_visible=OK";
														break;	
														
														
														case "empruntC":
														lienREVUE="RDC/emprunt/empruntC/objetCED1.php?evaluation_visible=OK";
														break;
														
														case "empruntD":
														lienREVUE="RDC/emprunt/empruntD/objetDED1.php?information_visible=OK";
														break;
														
														
														
	
														
	
													
														default:	
														lienREVUE="RDC/emprunt/feuille.php";
														break;
											}
								
								
								
							}
							else if(REVUERDC_=="IMMO_CORP_INCORP")
							{
										switch (choixlien)
										{
														
														
														
														
	
														
														case "A_coherence1":
														lienREVUE="RDC/immobilisationCorpIncorp/A_coherence/coherence1.php?coherence_visible=OK";
														break;	
														case "A_coherence2":
														lienREVUE="RDC/immobilisationCorpIncorp/A_coherence/coherence2.php?coherence_visible=OK";
														break;	
														
														case "A_coherence3":
														lienREVUE="RDC/immobilisationCorpIncorp/A_coherence/coherence3.php?coherence_visible=OK";
														break;	
														case "A_coherence4":
														lienREVUE="RDC/immobilisationCorpIncorp/A_coherence/coherence4.php?coherence_visible=OK";
														break;	
														case "A_coherence5":
														lienREVUE="RDC/immobilisationCorpIncorp/A_coherence/coherence5.php?coherence_visible=OK";
														break;	
														case "A_coherence6":
														lienREVUE="RDC/immobilisationCorpIncorp/A_coherence/coherence6.php?coherence_visible=OK";
														break;	
														
														case "A_coherence7":
														lienREVUE="RDC/immobilisationCorpIncorp/A_coherence/coherence7.php?coherence_visible=OK";
														break;	
														case "A_coherence8":
														lienREVUE="RDC/immobilisationCorpIncorp/A_coherence/coherence8.php?coherence_visible=OK";
														break;	
														
														case "B_exhaustivite":
														lienREVUE="RDC/immobilisationCorpIncorp/B_exhaustivite/exhaustivite1.php?exhaustivite_visible=OK";
														break;	
														
														case "C_regularite1":
														lienREVUE="RDC/immobilisationCorpIncorp/C_regularite/regularite1.php?regularite_visible=O";
														break;	
														case "C_regularite2":
														lienREVUE="RDC/immobilisationCorpIncorp/C_regularite/regularite2.php?regularite_visible=O";
														break;	
														case "C_regularite3":
														lienREVUE="RDC/immobilisationCorpIncorp/C_regularite/regularite3.php?regularite_visible=O";
														break;	
														case "C_regularite4":
														lienREVUE="RDC/immobilisationCorpIncorp/C_regularite/regularite4.php?regularite_visible=O";
														break;	
														
														case "D_existence1":
														lienREVUE="RDC/immobilisationCorpIncorp/D_existence/existence1.php?existence_visible=OK";
														break;	
														
														case "D_existence2":
														lienREVUE="RDC/immobilisationCorpIncorp/D_existence/existence2.php?existence_visible=OK";
														break;	
														case "D_existence3":
					
														lienREVUE="RDC/immobilisationCorpIncorp/D_existence/existence3.php?existence_visible=OK";
														break;	
														
														case "D_existence4":
														lienREVUE="RDC/immobilisationCorpIncorp/D_existence/existence4.php?existence_visible=OK";
														break;	
														
														
														case "F_rattachement1":
														lienREVUE="RDC/immobilisationCorpIncorp/F_rattachement/rattachement1.php?rattachement_visible=OK";
														break;	
														case "F_rattachement2":
														lienREVUE="RDC/immobilisationCorpIncorp/F_rattachement/rattachement2.php?rattachement_visible=OK";
														break;
														
														case "G_juridique1":
														lienREVUE="RDC/immobilisationCorpIncorp/G_juridique/juridique1.php?juridique_visible=OK";
														break;
														case "G_juridique2":
														lienREVUE="RDC/immobilisationCorpIncorp/G_juridique/juridique2.php?juridique_visible=OK";
														break;
														case "G_juridique3":
														lienREVUE="RDC/immobilisationCorpIncorp/G_juridique/juridique3.php?juridique_visible=OK";
														break;
														case "G_juridique4":
														lienREVUE="RDC/immobilisationCorpIncorp/G_juridique/juridique4.php?juridique_visible=OK";
														break;
														case "G_juridique5":
														lienREVUE="RDC/immobilisationCorpIncorp/G_juridique/juridique5.php?juridique_visible=OK";
														break;
														
														case "H_information1":
														lienREVUE="RDC/immobilisationCorpIncorp/H_information/information1.php?information_visible=OK";
														break;
														
														
														
														
														
														
													
														default:	
														lienREVUE="RDC/immobilisationCorpIncorp/feuille_maitresse.php";
														break;
										}
								
								
							}
							else if(REVUERDC_=="STOCK")
							{
								
											switch (choixlien)
											{
														
														
														case "A_coherence":
														lienREVUE="RDC/stock/A_coherence/coherence.php?coherence_visible=OK";
														break;		
														
														case "A_coherence1":
														lienREVUE="RDC/stock/A_coherence/coherence1.php?coherence_visible=OK";
														break;	
														
														case "A_coherence2":
														lienREVUE="RDC/stock/A_coherence/coherence2.php?coherence_visible=OK";
														break;	
														
														case "A_coherence3":
														lienREVUE="RDC/stock/A_coherence/coherence3.php?coherence_visible=OK";
														break;	
														
														case "A_coherence4":
														lienREVUE="RDC/stock/A_coherence/coherence4.php?coherence_visible=OK";
														break;	
														
														case "B_existence1":
														lienREVUE="RDC/stock/B_existence/existence1.php?existence_visible=OK";
														break;	
														case "B_existence2":
														lienREVUE="RDC/stock/B_existence/existence2.php?existence_visible=OK";
														break;	
														
														case "B_existence3":
														lienREVUE="RDC/stock/B_existence/existence3.php?existence_visible=OK";
														break;	
														case "B_existence4":
														lienREVUE="RDC/stock/B_existence/existence4.php?existence_visible=OK";
														break;	
														case "B_existence5":
														lienREVUE="RDC/stock/B_existence/existence44.php?existence_visible=OK";
														break;
														
														case "C_evaluation1":
														lienREVUE="RDC/stock/C_evaluation/evaluation1.php?evaluation_visible=OK";
														break;
														case "C_evaluation2":
														lienREVUE="RDC/stock/C_evaluation/evaluation2.php?evaluation_visible=OK";
														break;
														case "C_evaluation3":
														lienREVUE="RDC/stock/C_evaluation/evaluation3.php?evaluation_visible=OK";
														break;
														case "C_evaluation4":
														lienREVUE="RDC/stock/C_evaluation/evaluation4.php?evaluation_visible=OK";
														break;
														case "C_evaluation5":
														lienREVUE="RDC/stock/C_evaluation/evaluation5.php?evaluation_visible=OK";
														break;
														case "C_evaluation6":
														lienREVUE="RDC/stock/C_evaluation/evaluation6.php?evaluation_visible=OK";
														break;
														
														case "D_rattachement1":
														lienREVUE="RDC/stock/D_rattachement/rattachement1.php?rattachement_visible=OK";
														break;
														
														case "D_rattachement2":
														lienREVUE="RDC/stock/D_rattachement/rattachement2.php?rattachement_visible=OK";
														break;
														
														case "E_juridique1":
														lienREVUE="RDC/stock/E_juridique/juridique1.php?juridique_visible=OK";
														break;
														case "F_information1":
														lienREVUE="RDC/stock/F_information/information1.php?information_visible=OK";
														break;
														case "F_information2":
														lienREVUE="RDC/stock/F_information/information2.php?information_visible=OK";
														break;
														
	
	
														
	
													
														default:	
														lienREVUE="RDC/stock/feuille_maitresse.php";
														break;
											}
								
								
							}
							else if(REVUERDC_=="PAIE_PERS")
							{
								
											switch (choixlien)
											{
														
														
														
														
														case "paieA1":
														lienREVUE="RDC/paie/paieA/cohPrComAPP1.php?coherence_visible=OK";
														break;
														case "paieA2":
														lienREVUE="RDC/paie/paieA/cohPrComAPP2.php?coherence_visible=OK";
														break;
														case "paieA3":
														lienREVUE="RDC/paie/paieA/cohPrComAPP3.php?coherence_visible=OK";
														break;
														
														
														case "paieB1":
														lienREVUE="RDC/paie/paieB/cohPrComBPP1.php?exhaustivte_visible=OK";
														break;
														case "paieB2":
														lienREVUE="RDC/paie/paieB/cohPrComBPP2.php?exhaustivte_visible=OK";
														break;
														
														case "paieC1":
														lienREVUE="RDC/paie/paieC/cohPrComCPP1.php?regularite_visible=OK";
														break;
														case "paieC2a":
														lienREVUE="RDC/paie/paieC/cohPrComCPP2a.php?regularite_visible=OK";
														break;
														case "paieC2B":
														lienREVUE="RDC/paie/paieC/cohPrComCPP2b.php?regularite_visible=OK";
														break;
														
														case "paieD1":
														lienREVUE="RDC/paie/paieD/cohPrComDPP1.php?existence_visible=OK";
														break;
														case "paieD1a":
														lienREVUE="RDC/paie/paieD/cohPrComDPP1a.php?existence_visible=OK";
														break;
														case "paieE":
														lienREVUE="RDC/paie/paieE/cohPrComEPP1.php?evaluation_visible=OK";
														break;
														case "paieF":
														lienREVUE="RDC/paie/paieF/cohPrComFPP1.php?rattachement_visible=OK";
														break;
														
														case "paieG1":
														lienREVUE="RDC/paie/paieG/cohPrComGPP1.php?juridique_visible=OK";
														break;
														
														case "paieG2":
														lienREVUE="RDC/paie/paieG/cohPrComGPP2.php?juridique_visible=OK";
														break;
														
														case "paieG3":
														lienREVUE="RDC/paie/paieG/cohPrComGPP3.php?juridique_visible=OK";
														break;
														
														case "paieG4":
														lienREVUE="RDC/paie/paieG/cohPrComGPP4.php?juridique_visible=OK";
														break;
														
														case "paieG5A":
														lienREVUE="RDC/paie/paieG/cohPrComGPP5a.php?juridique_visible=OK";
														break;
														case "paieG5B":
														lienREVUE="RDC/paie/paieG/cohPrComGPP5b.php?juridique_visible=OK";
														break;
														case "paieG5C":
														lienREVUE="RDC/paie/paieG/cohPrComGPP5c.php?juridique_visible=OK";
														break;
														case "paieH1":
														lienREVUE="RDC/paie/paieH/cohPrComHPP1.php?information_visible=OK";
														break;
														case "paieH2":
														lienREVUE="RDC/paie/paieH/cohPrComHPP2a.php?information_visible=OK";
														break;
														
														
														
														
														
														
														
														
	
													
														default:	
														lienREVUE="RDC/paie/feuille.php";
														break;
											}
								
								
							}
							else if(REVUERDC_=="DEBIT_CREDIT_DIVERS")
							{
								
											switch (choixlien)
											{
														
														
														
														
														case "A_coherence1":
														lienREVUE="RDC/DCD/A_coherence/coherence1.php?coherence_visible=OK";
														break;
														case "A_coherence2":
														lienREVUE="RDC/DCD/A_coherence/coherence2.php?coherence_visible=OK";
														break;
														case "A_coherence3":
														lienREVUE="RDC/DCD/A_coherence/coherence3.php?coherence_visible=OK";
														break;
														
														case "B_exhaustivite":
														lienREVUE="RDC/DCD/B_exhaustivite/exhaustivite1.php?exhaustivite_visible=OK";
														break;
														
														case "C_regularite1":
														lienREVUE="RDC/DCD/C_regularite/regularite1.php?regularite_visible=OK";
														break;
														
														case "D_existence":
														lienREVUE="RDC/DCD/D_existence/existence1.php?existence_visible=OK";
														break;
														
														case "F_juridique":
														lienREVUE="RDC/DCD/F_juridique/juridique1.php?juridique_visible=OK";
														break;
														
														case "G_information":
														lienREVUE="RDC/DCD/G_information/information1.php?information_visible=OK";
														break;
														
														
														
														
														
														
														
														
														
	
													
														default:	
														lienREVUE="RDC/DCD/feuille_maitresse.php";
														break;
											}
								
							}
							else if(REVUERDC_=="PRODUIT_CLIENTS")
							{
											switch (choixlien)
											{
														
														
														
														case "A_coherence1":
														lienREVUE="RDC/prod_client/A_coherence/coherence1.php?coherence_visible=OK";
														break;
														case "A_coherence2":
														lienREVUE="RDC/prod_client/A_coherence/coherence2.php?coherence_visible=OK";
														break;
														case "A_coherence3":
														lienREVUE="RDC/prod_client/A_coherence/coherence3.php?coherence_visible=OK";
														break;
														
														case "B_exhaustivite":
														lienREVUE="RDC/prod_client/B_exhaustivite/exhaustivite1.php?exhaustivite_visible=OK";
														break;
														
														case "C_regularite1":
														lienREVUE="RDC/prod_client/C_regularite/regularite1.php?regularite_visible=OK";
														break;
														case "C_regularite2":
														lienREVUE="RDC/prod_client/C_regularite/regularite2.php?regularite_visible=OK";
														break;
														
														case "D_existence1":
														lienREVUE="RDC/prod_client/D_existence/existence1.php?existence_visible=OK";
														break;
														case "D_existence2":
														lienREVUE="RDC/prod_client/D_existence/existence2.php?existence_visible=OK";
														break;
														
														case "E_evaluation1":
														lienREVUE="RDC/prod_client/E_evaluation/evaluation1.php?evaluation_visible=OK";
														break;
														case "E_evaluation2":
														lienREVUE="RDC/prod_client/E_evaluation/evaluation2.php?evaluation_visible=OK";
														break;
														case "E_evaluation3":
														lienREVUE="RDC/prod_client/E_evaluation/evaluation3.php?evaluation_visible=OK";
														break;
														case "E_evaluation4":
														lienREVUE="RDC/prod_client/E_evaluation/evaluation4.php?evaluation_visible=OK";
														break;
														
														case "F_rattachement1":
														lienREVUE="RDC/prod_client/F_rattachement/rattachement1.php?rattachement_visible=OK";
														break;
														case "F_rattachement2":
														lienREVUE="RDC/prod_client/F_rattachement/rattachement2.php?rattachement_visible=OK";
														break;
														
														
														case "G_juridique1":
														lienREVUE="RDC/prod_client/G_juridique/juridique1.php?juridique_visible=OK";
														break;
														case "G_juridique2":
														lienREVUE="RDC/prod_client/G_juridique/juridique2.php?juridique_visible=OK";
														break;
														case "G_juridique3":
														lienREVUE="RDC/prod_client/G_juridique/juridique3.php?juridique_visible=OK";
														break;
														
														case "H_information1":
														lienREVUE="RDC/prod_client/H_information/information1.php?information_visible=OK";
														break;
														case "H_information2":
														lienREVUE="RDC/prod_client/H_information/information2.php?information_visible=OK";
														break;
														case "H_information3":
														lienREVUE="RDC/prod_client/H_information/information3.php?information_visible=OK";
														break;
														case "H_information4":
														lienREVUE="RDC/prod_client/H_information/information4.php?information_visible=OK";
														break;
														
														
														
														
														
														
														
														
														
														
															
	
														
	
													
														default:	
														lienREVUE="RDC/prod_client/feuille_maitresse.php";
														break;
											}
								
								
							}
							else if(REVUERDC_=="CHARGES_FRS")
							{
											switch (choixlien)
											{
															
	
														case "A_coherence1":
														lienREVUE="RDC/charge_fournisseur/A_coherence/coherence1.php?coherence_visible=OK";
														break;
														case "A_coherence2":
														lienREVUE="RDC/charge_fournisseur/A_coherence/coherence2.php?coherence_visible=OK";
														break;
														case "A_coherence3":
														lienREVUE="RDC/charge_fournisseur/A_coherence/coherence3.php?coherence_visible=OK";
														break;
														case "A_coherence4":
														lienREVUE="RDC/charge_fournisseur/A_coherence/coherence4.php?coherence_visible=OK";
														break;
														case "A_coherence3":
														lienREVUE="RDC/charge_fournisseur/A_coherence/coherence3.php?coherence_visible=OK";
														break;
														case "A_coherence4":
														lienREVUE="RDC/charge_fournisseur/A_coherence/coherence4.php?coherence_visible=OK";
														break;
														case "A_coherence5":
														lienREVUE="RDC/charge_fournisseur/A_coherence/coherence5.php?coherence_visible=OK";
														break;
														case "A_coherence6":
														lienREVUE="RDC/charge_fournisseur/A_coherence/coherence6.php?coherence_visible=OK";
														break;
														case "A_coherence7":
														lienREVUE="RDC/charge_fournisseur/A_coherence/coherence7.php?coherence_visible=OK";
														break;
														
														
														case "B_exhaustivite":
														lienREVUE="RDC/charge_fournisseur/B_exhaustivite/exhaustivite1.php?exhaustivite_visible=OK";
														break;
														
														case "C_regularite1":
														lienREVUE="RDC/charge_fournisseur/C_regularite/regularite1.php?regularite_visible=OK";
														break;
														case "C_regularite2":
														lienREVUE="RDC/charge_fournisseur/C_regularite/regularite2.php?regularite_visible=OK";
														break;
														case "C_regularite3":
														lienREVUE="RDC/charge_fournisseur/C_regularite/regularite3.php?regularite_visible=OK";
														break;
														
														
														case "D_existence1":
														lienREVUE="RDC/charge_fournisseur/D_existence/existence1.php?existence_visible=OK";
														break;
														case "D_existence2":
														lienREVUE="RDC/charge_fournisseur/D_existence/existence2.php?existence_visible=OK";
														break;
														
														
														case "E_evaluation1":
														lienREVUE="RDC/charge_fournisseur/E_evaluation/evaluation1.php?evaluation_visible=OK";
														break;
														case "E_evaluation2":
														lienREVUE="RDC/charge_fournisseur/E_evaluation/evaluation2.php?evaluation_visible=OK";
														break;
														case "E_evaluation3":
														lienREVUE="RDC/charge_fournisseur/E_evaluation/evaluation3.php?evaluation_visible=OK";
														break;
														
														
														case "F_rattachement1":
														lienREVUE="RDC/charge_fournisseur/F_rattachement/rattachement1.php?rattachement_visible=OK";
														break;
														case "F_rattachement2":
														lienREVUE="RDC/charge_fournisseur/F_rattachement/rattachement1.php?rattachement_visible=OK";
														break;
														
														case "G_juridique1":
														lienREVUE="RDC/charge_fournisseur/G_juridique/juridique1.php?juridique_visible=OK";
														break;
														case "G_juridique1_part2":
														lienREVUE="RDC/charge_fournisseur/G_juridique/juridique1_part2.php?juridique_visible=OK";
														break;
														case "G_juridique2":
														lienREVUE="RDC/charge_fournisseur/G_juridique/juridique2.php?juridique_visible=OK";
														break;
														case "G_juridique2_part2":
														lienREVUE="RDC/charge_fournisseur/G_juridique/juridique2_part2.php?juridique_visible=OK";
														break;
														
														case "H_information1":
														lienREVUE="RDC/charge_fournisseur/H_information/information1.php?information_visible=OK";
														break;
														case "H_information2":
														lienREVUE="RDC/charge_fournisseur/H_information/information2.php?information_visible=OK";
														break;
														case "H_information3":
														lienREVUE="RDC/charge_fournisseur/H_information/information3.php?information_visible=OK";
														break;
														
														case "H_information4":
														lienREVUE="RDC/charge_fournisseur/H_information/information4.php?information_visible=OK";
														break;
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
														
	
													
														default:	
														lienREVUE="RDC/charge_fournisseur/feuille_maitresse.php";
														break;
											}
								
								
							}
							else if(REVUERDC_=="IMPOT_TAXE")
							{
											switch (choixlien)
											{
														
	
														case "impotA1":
														lienREVUE="RDC/impot/impotA/objetAIT1.php?coherence_visible=OK";
														break;
														case "impotA2":
														lienREVUE="RDC/impot/impotA/objetAIT2.php?coherence_visible=OK";
														break;
														
														case "impotB":
														lienREVUE="RDC/impot/impotB/objetBIT1.php?exhaustivite_visible=OK";
														break;
														
														case "impotC1":
														lienREVUE="RDC/impot/impotC/objetCIT1.php?regularite_visible=OK";
														break;
														case "impotC2":
														lienREVUE="RDC/impot/impotC/objetCIT2.php?regularite_visible=OK";
														break;
														
														case "impotD":
														lienREVUE="RDC/impot/impotD/objetDIT1.php?existence_visible=OK";
														break;
														
														
														case "impotE":
														lienREVUE="RDC/impot/impotE/objetEIT1.php?evaluation_visible=OK";
														break;
														
														case "impotF1":
														lienREVUE="RDC/impot/impotF/objetFIT1.php?rattachement_visible=OK";
														break;
														case "impotF2":
														lienREVUE="RDC/impot/impotF/objetFIT2.php?rattachement_visible=OK";
														break;
														
														case "impotG1":
														lienREVUE="RDC/impot/impotG/objetGIT1.php?juridique_visible=OK";
														break;
														
														case "impotG2":
														lienREVUE="RDC/impot/impotG/objetGIT2.php?juridique_visible=OK";
														break;
														
														
														
														case "impotH1":
														lienREVUE="RDC/impot/impotH/objetHIT1.php?information_visible=OK";
														break;
														
														case "impotH2A":
														lienREVUE="RDC/impot/impotH/objetHIT2a.php?information_visible=OK";
														break;
														case "impotH2B":
														lienREVUE="RDC/impot/impotH/objetHIT2b.php?information_visible=OK";
														break;
														case "impotH2B":
														lienREVUE="RDC/impot/impotH/objetHIT2b.php?information_visible=OK";
														break;
														
														
														
														
														
														
														
														
														
														
													
														default:	
														lienREVUE="RDC/impot/feuille.php";
														break;
											}
								
								
							}



							/*else if(REVUERDC_=="incidence")
							{
								lienREVUERA_="/RA/incidence.php";
								
							}
							else if(REVUERDC_=="Seuil_de_signification" || REVUERDC_=="TAUX_SONDAGE")
							{
								lienREVUERA_="/RA/planification/planification.php";
								
							}
							else if(REVUERDC_=="PLANIF_GENERAL")
							{
								lienREVUERA_="/RA/planification/planif_gen/planif_gen.php";
								
							}*/



							//javascript:click_sousMenueREvue('',$('#missId').val())
							click_sousMenueREvueRA(lienREVUE,idMission_);
							

							
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