<div id="avoka">
			<div id="ContentSynthAchat" style="display:none;"></div> <!-- Pour la synthèse du cycle achat -->
			<!-----------------------------------------mihidt ny traitement----------------------------------------- -->
			<!---------------------------Interface de l'objectif du superviseur------------------------------- -->
			<div id="contenue_objectif_sup_A"><?php //include 'cycleAchat/cycle_achat_interface/Interface_A_Superviseur.php'; ?></div>
			<!------------------------------------------------------------------------------------------------ -->
			<!----------------------------Interface de l'objectif A------------------------------------------- -->
			<div id="contenue_objectif_A"><?php //include 'cycleAchat/cycle_achat_interface/Interface_A_Secondaire.php';?></div>			
			<!------------------------------------------------------------------------------------------------ -->
			<div id="contenue_poste_a"><?php //include 'cycleAchat/cycle_achat_interface/interface_poste_a.php';?></div>
			<!--------------------------Formulaire de l'objectif b auditeur----------------------------------- -->
			<div id="dv_cont_obj_b"><?php //include 'cycleAchat/cycle_achat_interface/Interface_B_Secondaire.php'; ?></div>
			<!------------------------------------------------------------------------------------------------ -->
			<!--------------------------Formulaire de l'objectif b chef de mission--------------------------------- -->
			<div id="dv_cont_obj_sup_b"><?php //include 'cycleAchat/cycle_achat_interface/Interface_B_Superviseur.php'; ?></div>
			<!------------------------------------------------------------------------------------------------ -->
			<!--------------------------Formulaire de l'objectif c auditeur----------------------------------- -->
			<div id="dv_cont_obj_c"><?php //include 'cycleAchat/cycle_achat_c/form/Interface_c_Secondaire.php'; ?></div>
			<!------------------------------------------------------------------------------------------------ -->
			<!-----------------------Formulaire de l'objectif de c superviseur-------------------------------- -->
			<div id="dv_cont_obj_c_sup"><?php //include 'cycleAchat/cycle_achat_interface_c/cycle_achat_c_superviseur/Interface_c_Superviseur.php';?></div>
			<!------------------------------------------------------------------------------------------------ -->
			<!--------------------------Formulaire de l'objectif d auditeur----------------------------------- -->
			<div id="dv_cont_obj_d"><?php //include 'cycleAchat/cycle_achat_d/form/Interface_d_Secondaire.php'; ?></div>
			<!------------------------------------------------------------------------------------------------ -->
			<!-----------------------Formulaire de l'objectif de d superviseur-------------------------------- -->
			<div id="dv_cont_obj_d_sup"><?php //include 'cycleAchat/cycle_achat_interface_d/cycle_achat_d_superviseur/Interface_d_Superviseur.php';?></div>
			<!------------------------------------------------------------------------------------------------ -->
			<!--------------------------Formulaire de l'objectif e auditeur----------------------------------- -->
			<div id="dv_cont_obj_e"><?php //include 'cycleAchat/cycle_achat_e/form/Interface_e_Secondaire.php'; ?></div>
			<!------------------------------------------------------------------------------------------------ -->
			<!-----------------------Formulaire de l'objectif de e superviseur-------------------------------- -->
			<div id="dv_cont_obj_e_sup"><?php //include 'cycleAchat/cycle_achat_interface_e/cycle_achat_e_superviseur/Interface_e_Superviseur.php';?></div>
			<!------------------------------------------------------------------------------------------------ -->
			<!--------------------------Formulaire de l'objectif e auditeur----------------------------------- -->
			<div id="dv_cont_obj_f"><?php //include 'cycleAchat/cycle_achat_f/form/Interface_f_Secondaire.php'; ?></div>
			<!------------------------------------------------------------------------------------------------ -->
			<!-----------------------Formulaire de l'objectif de e superviseur-------------------------------- -->
			<div id="dv_cont_obj_f_sup"><?php //include 'cycleAchat/cycle_achat_interface_e/cycle_achat_e_superviseur/Interface_e_Superviseur.php';?></div>
			<!------------------------------------------------------------------------------------------------ -->
			

			
			<!-------------------Achat de l'objectif a---------------------------------------------- -->
			<div id="contaca"></div>
			<div id="contPosteaca"></div>
			<div id="contSupaca"></div>
			<!-------------------Immobilisation de l'objectif a------------------------------------- -->
			<div id="contima"></div>
			<div id="contPosteIma"></div>
			<div id="contSupIma"></div>
			<!-------------------Immobilisation de l'objectif b------------------------------------- -->
			<div id="contRsciImmo"><?php include 'cycleImmo/Immo.php' ?></div>
			<div id="contimb"><?php include 'cycleImmo/Immob/form/Interface_imb_Secondaire.php' ?></div>
			<div id="contSupimb"></div>
			<!-------------------Immobilisation de l'objectif c------------------------------------- -->
			<div id="contimc"><?php include 'cycleImmo/Immoc/form/Interface_imc_Secondaire.php' ?></div>
			<div id="contSupimc"></div>
			<!-------------------------------------------------------------------------------------- -->
			<!-------------------Immobilisation de l'objectif d------------------------------------- -->
			<div id="contimd"><?php include 'cycleImmo/Immod/form/Interface_imd_Secondaire.php' ?></div>
			<div id="contSupimd"></div>
			<!-------------------------------------------------------------------------------------- -->
			
									<!--CYCLE STOCK -->
			<!-------------------Stock de l'objectif a------------------------------------- -->
			<div id="contsta"></div>

			<!-- tinay editer -->
			<div id="contPosteSta">
				<p>Ramalanirina load_page</p>
			</div>
			
			<div id="contSupSta"></div>

			<!-------------------Stock de l'objectif b------------------------------------- -->
			<div id="contRsciStock"><?php include 'cycleStock/Stock.php' ?></div>
			<div id="contstb"><?php include 'cycleStock/Stockb/form/Interface_stb_Secondaire.php' ?></div>
			<div id="contSupstb"></div>

			<!-------------------Stock de l'objectif c------------------------------------- -->
			<div id="contstc"><?php include 'cycleStock/Stockc/form/Interface_stc_Secondaire.php' ?></div>
			<div id="contSupstc"></div>
	
			<!-------------------Stock de l'objectif d------------------------------------- -->
			<div id="contstd"><?php include 'cycleStock/Stockd/form/Interface_std_Secondaire.php' ?></div>
			<div id="contSupstd"></div>
			
												<!--CYCLE PAIE -->
			<!-------------------Paie de l'objectif a------------------------------------- -->
			<div id="contpa"></div>
			<div id="contPostePa"></div>
			<div id="contSupPa"></div>

			<!-------------------Paie de l'objectif b------------------------------------- -->
			<div id="contRsciPaie"><?php include 'cyclePaie/Paie.php' ?></div>
			<div id="contpb"><?php include 'cyclePaie/Paieb/form/Interface_pb_Secondaire.php' ?></div>
			<div id="contSupPb"></div>
 
			<!-------------------Paie de l'objectif c------------------------------------- -->
			<div id="contpc"><?php include 'cyclePaie/Paiec/form/Interface_pc_Secondaire.php' ?></div>
			<div id="contSupPc"></div>
	
			<!-------------------Paie de l'objectif d------------------------------------- -->
			<div id="contpd"><?php include 'cyclePaie/Paied/form/Interface_pd_Secondaire.php' ?></div>
			<div id="contSupPd"></div>

			<!-------------------Paie de l'objectif e------------------------------------- -->
			<div id="contpe"><?php include 'cyclePaie/Paiee/form/Interface_pe_Secondaire.php' ?></div>
			<div id="contSupPe"></div>

								<!-- CYCLE RECETTE  -->
			<!-------------------Recette de l'objectif a------------------------------------- -->
			<div id="contra"></div>
			<div id="contPosteRa"></div>
			<div id="contSupRa"></div>

			<!-------------------Recette de l'objectif b------------------------------------- -->
			<div id="contRsciRecette"><?php include 'cycleRecette/Recette.php' ?></div>
			<div id="contrb"><?php include 'cycleRecette/Recetteb/form/Interface_rb_Secondaire.php' ?></div>
			<div id="contSupRb"></div>

			<!-------------------Recette de l'objectif c------------------------------------- -->
			<div id="contrc"><?php include 'cycleRecette/Recettec/form/Interface_rc_Secondaire.php' ?></div>
			<div id="contSupRc"></div>

			<!-------------------Recette de l'objectif d------------------------------------- -->
			<div id="contrd"><?php include 'cycleRecette/Recetted/form/Interface_rd_Secondaire.php' ?></div>
			<div id="contSupRd"></div>

			<!-------------------Recette de l'objectif e------------------------------------- -->
			<div id="contre"><?php include 'cycleRecette/Recettee/form/Interface_re_Secondaire.php' ?></div>
			<div id="contSupRe"></div>

											<!-- CYCLE TRESORERIE DEPENSE  -->
						<!-----------------Depense de l'objectif a------------------------------------- -->
	    	<div id="contda"></div>
			<div id="contPosteDa"></div>
			<div id="contSupDa"></div> 

			<!-------------------Depense de l'objectif b------------------------------------- -->
			<div id="contRsciDepense"><?php include 'cycleDepense/Depense.php' ?></div>
			<div id="contdb"><?php include 'cycleDepense/Depenseb/form/Interface_db_Secondaire.php' ?></div>
			<div id="contSupDb"></div>

			<!-------------------Depense de l'objectif c------------------------------------- -->
			<div id="contdc"><?php include 'cycleDepense/Depensec/form/Interface_dc_Secondaire.php' ?></div>
			<div id="contSupDc"></div>

			<!-------------------Depense de l'objectif d------------------------------------- -->
			<div id="contdd"><?php include 'cycleDepense/Depensed/form/Interface_dd_Secondaire.php' ?></div>
			<div id="contSupDd"></div>

			<!-------------------Depense de l'objectif e------------------------------------- -->
			<div id="contde"><?php include 'cycleDepense/Depensee/form/Interface_de_Secondaire.php' ?></div>
			<div id="contSupDe"></div>

										<!-- CYCLE VENTE  -->
			<!-----------------Vente de l'objectif a------------------------------------- -->
	    	<div id="contva"></div>
			<div id="contPosteVa"></div>
			<div id="contSupVa"></div> 

			<!-------------------Ventede l'objectif b------------------------------------- -->
			<div id="contRsciVente"><?php include 'cycleVente/Vente.php' ?></div>
			<div id="contvb"><?php include 'cycleVente/Venteb/form/Interface_vb_Secondaire.php' ?></div>
			<div id="contSupVb"></div>

					            <!-------------------Vente de l'objectif c------------------------------------- -->
			<div id="contvc"><?php include 'cycleVente/Ventec/form/Interface_vc_Secondaire.php' ?></div>
			<div id="contSupVc"></div>
								<!-------------------Vente de l'objectif d------------------------------------- -->
			<div id="contvd"><?php include 'cycleVente/Vented/form/Interface_vd_Secondaire.php' ?></div>
			<div id="contSupVd"></div>

								<!-------------------Vente de l'objectif e------------------------------------- -->
			<div id="contve"><?php include 'cycleVente/Ventee/form/Interface_ve_Secondaire.php' ?></div>
			<div id="contSupVe"></div>

						<!-------------------Vente de l'objectif f------------------------------------- -->
			<div id="contvf"><?php include 'cycleVente/Ventef/form/Interface_vf_Secondaire.php' ?></div>
			<div id="contSupVf"></div>

						<!-------------------CYCLE ENVIRONNEMENT DE CONTROLE------------------------------------s -->
			<div id="contRsciEnvironnement"><?php include 'cycleEnvironnement/Environnement.php' ?></div>
			<div id="contev"><?php include 'cycleEnvironnement/EnvQuest/form/Interface_ev_Secondaire.php' ?></div>
			<div id="contSupEv"></div>

									<!-------------------CYCLE SYSTEME D'INFO------------------------------------s -->

	    	<div id="contia"></div>
			<div id="contPosteIa"></div>
			<div id="contSupIa"></div> 

			<div id="contRsciInfo"><?php include 'cycleInfo/Info.php' ?></div>
			
			<div id="contib"><?php include 'cycleInfo/Infob/form/Interface_ib.php' ?></div>
			<div id="contSupIb"></div>

			<div id="contic"><?php include 'cycleInfo/Infoc/form/Interface_ic.php' ?></div>
			<div id="contSupIc"></div>
			
			<div id="contid"><?php include 'cycleInfo/Infod/form/Interface_id.php' ?></div>
			<div id="contSupId"></div>
			
			<div id="contSupConclusion"></div>
			
		</center>
		</div>