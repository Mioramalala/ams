<?php	

		@session_start();
		include'connexion.php';
		$nom_table      = array('tab_balance_general','tab_bal_aux','tab_commentaire_ra','tab_conclusion_ra','tab_gl_aux','tab_gl_gen','tab_incidence_ra','tab_planification_ra','tab_planif_gen_ra','tab_ra','tab_structure_pcg_ra','tab_synthese_ra','tab_importer','tab_synthese_rsci_ra');
		$nom_table_rdc  = array('tab_echantillon_bal_aux','tab_cadrage_salaire','tab_c1','tab_cad_salaire_cnaps','tab_cad_salaire_irsa','tab_cad_salaire_smids','tab_d6','tab_e5','tab_e6','tab_e7','tab_elt_annexe','tab_elt_annexe_dcd','tab_f1','tab_f6','tab_f9_2','tab_g1','tab_g2','tab_g3','tab_g4','tab_g6','tab_g7','tab_i3','tab_i4','tab_j2','tab_j3','tab_observation_rdc','tab_rap_cpbl','tab_rap_irsa_cnaps','tab_rap_person_budget','tab_rdc','	tab_rdc_cf_f3','tab_rdc_cf_f7','tab_rdc_cf_f9','tab_rdc_cf_f10','tab_rdc_st_d2','tab_rdc_st_d3','tab_recapassurance','tab_reeval_emprunt','tab_reslt_fiscal','tab_risque_lie_systeme','tab_somme_gl_aux','tab_somme_gl_gen','tab_synthese_feuille_rdc','tab_validation_synthese_rdc','tab_rdc_cf_f2','tab_rdc_cf_f4_1','tab_rdc_cf_f4_2','tab_rdc_cf_f5','tab_rdc_st_d4','tab_rdc_st_d5','tab_suivi_export_fichier');
		$nom_table_rdc1 = array('tab_bal_gen_mission','tab_echantillon_bl','tab_ehantillon_gl','tab_Frais_Accessoire','tab_rdc_cf_f8');
	   
	    
		?>


        <div class="conteneur_table">
	    <table cellpadding="4" cellspacing="0">
		   <caption class="titre_liste" id="titre_statut_mission">Missions en cours</caption>
			<tr id="titre_tabstat" style=''>
				<td style="width:63%;">Entreprise</td>
				<td style="width:auto;">Cours de progression</td>
			</tr>
	
	<?php 
	
	$req_miss   = "select MISSION_ID,ENTREPRISE_ID,MISSION_DEADLINE,MISSION_ANNEE,MISSION_TYPE,DATE_NOW 
				   from tab_mission ORDER BY MISSION_ID DESC";

 $rep_miss="";				   
try
{
    $rep_miss   = $bdd->query($req_miss);


}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	


	while($don_miss = $rep_miss->fetch()) 
	{
		
			$MissDeadline  = $don_miss['MISSION_DEADLINE'];
			$IntDeadline   = (int)$MissDeadline;
			$date_now      = $don_miss["DATE_NOW"];
			$IntDateNow    = (int) $date_now;
					 
			$id_mission    = $don_miss["MISSION_ID"];
			$id_entreprise = $don_miss["ENTREPRISE_ID"];
			$mission_type  = $don_miss["MISSION_TYPE"];
			$mission_annee = $don_miss["MISSION_ANNEE"];


			
			
			$checkRSCI="";
			$checkRA="";
			$checkRDC="";

			//CHECK REPARTITION
			$nbrRepartEtend=0; 
			$MAXnbrRepartEtend=3;

			$sqlCHECKrepart="select * from tab_repartionEtendue where id_mission='$id_mission'";
			//print ($sqlCHECKrepart);
			$req=$bdd->query($sqlCHECKrepart);
			while($res = $req->fetch())
			{
				global $checkRSCI,$checkRA,$checkRDC,$nbrRepartEtend;
				if($res['id_tache']=="RSCI")
				{
					//print "CHEKECTfff";
					$checkRSCI="checked";
					//print $checkRSCI."RSCI";

				}else if($res['id_tache']=="RA")
				{
					$checkRA="checked";

				}else if($res['id_tache']=="RDC")
				{
					$checkRDC="checked";
				}
				



				$nbrRepartEtend++;

			}


			

			$totarepart=0;
			$totarepartPourcent=0;
			$PoucentageMAXPPLE=0;
			$poucentage_ra=0;
			$poucentage_rdc1=0;
			if($nbrRepartEtend>0 && $nbrRepartEtend<$MAXnbrRepartEtend)
			{

					global $checkRA,$checkRSCI,$checkRDC,$id_mission;

					//print "cccc<br>";
					//exit();
					/////////////////////////progressbar RA//////////////////////////////////////
					if($checkRA=="checked")
					{

						$compteur=0;
						foreach($nom_table as $valeur) 
						{
							$sql_recup_ra = "select count(MISSION_ID) as recup_nbr_ra from ".$valeur." where MISSION_ID=".$id_mission;
							$recup_ra     = $bdd->query($sql_recup_ra);
							$don_recup_ra = $recup_ra->fetch();
							$x            = $don_recup_ra['recup_nbr_ra'];
							if($x > 0) {
								$compteur++;
							}
						}

						global $poucentage_ra,$totarepart;
						//$PoucentageMAXPPLE=$PoucentageMAXPPLE+20;
						//
						//$totalPoucentage=($compteur*14);
						$totarepart++;
						$poucentage_ra = ($compteur)/100;
						//$poucentage_ra=($poucentage_ra*20)/100;

					}//FIN IF
					

			
					
					if($checkRSCI=="checked")
					{
								global $nom_table_rdc1,$id_mission,$totarepart;

								$compteur_rdc1  = 0;
								foreach($nom_table_rdc1 as $valeur_rdc1) 
								{
									$sql_recup_rdc1 = "select count(id_mission) as recup_nbr_rdc1 from ".$valeur_rdc1." where id_mission=".$id_mission;
									$recup_rdc1     = $bdd->query($sql_recup_rdc1);
									$don_recup_rdc1 = $recup_rdc1->fetch();
									$z              = $don_recup_rdc1['recup_nbr_rdc1'];
									if($z > 0) {
										$compteur_rdc1++;
									}
							}

						global $poucentage_rdc1,$totarepart;
						$totarepart++;
						$poucentage_rdc1 = ($compteur_rdc1)/100;
						//$poucentage_rdc1 = ($compteur_rdc1*5)/3;
					//	$poucentage_rdc1=($poucentage_rdc1*3)/100;
						



					}//FIN IF 
						

					

					if($checkRDC="checked")
					{

						$compteur_rdc  = 0;
						foreach($nom_table_rdc as $valeur_rdc) {
							$sql_recup_rdc = "select count(MISSION_ID) as recup_nbr_rdc from ".$valeur_rdc." where MISSION_ID =".$id_mission;
							$recup_rdc     = $bdd->query($sql_recup_rdc);
							$don_recup_rdc = $recup_rdc->fetch();
							$y             = $don_recup_rdc['recup_nbr_rdc'];
							if($y > 0) {
								$compteur_rdc++;
							}
						}

						global $totarepart,$poucentage_rdc;
						$totarepart++;
						$poucentage_rdc = ($compteur_rdc)/100;
	
						//$PoucentageMAXPPLE=$PoucentageMAXPPLE+52;

						//$poucentage_rdc = ($compteur_rdc*51)/52;
						//$poucentage_rdc =($poucentage_rdc *52)/100;

					}//F"VAL".IN IF



					$valeur=($poucentage_rdc+$poucentage_rdc1+$poucentage_ra)*100;



					$req_miss_object = "select count(MISSION_ID) as nbr_mission from tab_objectif where MISSION_ID=".$id_mission;
					$rep_miss_object = $bdd->query($req_miss_object);
						
					while($don_miss_object = $rep_miss_object->fetch())
					{

									global $valeur;
									$req_miss_entreprise = "select ENTREPRISE_RAISON_SOCIAL,ENTREPRISE_DENOMINATION_SOCIAL from tab_entreprise where ENTREPRISE_ID=".$id_entreprise;
									$rep_miss_entreprise = $bdd->query($req_miss_entreprise);
									?>
									<tr>
										<td align="left">
										<?php  
										while($don_miss_entreprise = $rep_miss_entreprise->fetch()) {
											echo $don_miss_entreprise['ENTREPRISE_DENOMINATION_SOCIAL'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$don_miss_entreprise['ENTREPRISE_RAISON_SOCIAL'];
										}
										?>
									</td>
									
									<?php
									//$req_RCSI= $don_miss_object["nbr_mission"];
									//$valeur= (($req_RCSI * 25) / 480) + $poucentage_ra;
									$comparaisonDeadline=$IntDateNow - 2;
						
									if($comparaisonDeadline > $IntDeadline) 
									{
									?>
										<td>
											<?php echo  $mission_type."&nbsp;&nbsp;&nbsp;&nbsp".$mission_annee;


											 ?>
											<meter style="width:120px" value="<?php echo $valeur;?>" max="100"></meter><?php //echo $poucentage_rdc; ?><?php //echo $poucentage_rdc1;?>
										</td>
										<?php

										} else {
										?>
										<td>
											<meter style="width:120px" value="<?php echo $valeur;?>" min="0" max="100" high="75" low="25" optimum="100"></meter><?php //echo $poucentage_rdc; ?><?php //echo $poucentage_rdc1;?>
										</td>
									</tr>
									<?php

									}//FIN IF


					}//FIN while





			}	
			else if($nbrRepartEtend>=$MAXnbrRepartEtend or $nbrRepartEtend==0)
			{



			

					




						/////////////////////////progressbar RA//////////////////////////////////////
						$compteur=0;
						foreach($nom_table as $valeur) 
						{
							$sql_recup_ra = "select count(MISSION_ID) as recup_nbr_ra from ".$valeur." where MISSION_ID=".$id_mission;
							$recup_ra     = $bdd->query($sql_recup_ra);
							$don_recup_ra = $recup_ra->fetch();
							$x            = $don_recup_ra['recup_nbr_ra'];
							if($x > 0) {
								$compteur++;
							}
						}
						$poucentage_ra = ($compteur*14)/20;
					
						/////////////////////////RSCI//////////////////////////////////////////////////	


						/////////////////////////progressbar RDC MISSION_ID//////////////////////////////////////
						$compteur_rdc  = 0;
						foreach($nom_table_rdc as $valeur_rdc) {
							$sql_recup_rdc = "select count(MISSION_ID) as recup_nbr_rdc from ".$valeur_rdc." where MISSION_ID =".$id_mission;
							$recup_rdc     = $bdd->query($sql_recup_rdc);
							$don_recup_rdc = $recup_rdc->fetch();
							$y             = $don_recup_rdc['recup_nbr_rdc'];
							if($y > 0) {
								$compteur_rdc++;
							}
						}
						$poucentage_rdc = ($compteur_rdc*51)/52;
			
						/////////////////////////RDC//////////////////////////////////////

						/////////////////////////progressbar RDC id_mission//////////////////////////////////////
						$compteur_rdc1  = 0;
						foreach($nom_table_rdc1 as $valeur_rdc1) {
							$sql_recup_rdc1 = "select count(id_mission) as recup_nbr_rdc1 from ".$valeur_rdc1." where id_mission=".$id_mission;
							$recup_rdc1     = $bdd->query($sql_recup_rdc1);
							$don_recup_rdc1 = $recup_rdc1->fetch();
							$z              = $don_recup_rdc1['recup_nbr_rdc1'];
							if($z > 0) {
								$compteur_rdc1++;
							}
						}
						$poucentage_rdc1 = ($compteur_rdc1*5)/3;
					


				/////////////////////////RDC//////////////////////////////////////
					$req_miss_object = "select count(MISSION_ID) as nbr_mission from tab_objectif where MISSION_ID=".$id_mission;
					$rep_miss_object = $bdd->query($req_miss_object);
					
					while($don_miss_object = $rep_miss_object->fetch())
					{
									$req_miss_entreprise = "select ENTREPRISE_RAISON_SOCIAL,ENTREPRISE_DENOMINATION_SOCIAL from tab_entreprise where ENTREPRISE_ID=".$id_entreprise;
									$rep_miss_entreprise = $bdd->query($req_miss_entreprise);
									?>
									<tr>
										<td align="left">
										<?php  
										while($don_miss_entreprise = $rep_miss_entreprise->fetch()) {
											echo $don_miss_entreprise['ENTREPRISE_DENOMINATION_SOCIAL'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$don_miss_entreprise['ENTREPRISE_RAISON_SOCIAL'];
										}
										?>
									</td>
									
									<?php
									$req_RCSI= $don_miss_object["nbr_mission"];
									$valeur= (($req_RCSI * 25) / 480) + $poucentage_ra;
									$comparaisonDeadline=$IntDateNow - 2;
						
									if($comparaisonDeadline > $IntDeadline) 
									{
									?>
										<td>
											<?php echo  $mission_type."&nbsp;&nbsp;&nbsp;&nbsp".$mission_annee; ?>
											<meter style="width:120px" value="<?php echo $valeur;?>" max="100"></meter><?php //echo $poucentage_rdc; ?><?php //echo $poucentage_rdc1;?>
										</td>
										<?php

										} else {
										?>
										<td>
											<meter style="width:120px" value="<?php echo $valeur;?>" min="0" max="100" high="75" low="25" optimum="100"></meter><?php //echo $poucentage_rdc; ?><?php //echo $poucentage_rdc1;?>
										</td>
									</tr>
									<?php

									}//FIN IF


					}//FIN while

			
		}
				
			


	}	//FIN While
		
?>
			
	</table><!--fin liste mission-->
</div>