<?php
	@session_start();
	include 'connexion.php';
?>
<div id="contenue_rsci">	
	<?php $mission_id=$_SESSION['idMission'];?>
	<?php include 'cycleAchat/index.php';?>		
</div>



	
<div id="contRsciImmo"><?php include 'cycleImmo/Immo.php' ?></div>
<div id="contRsciStock"><?php include 'cycleStock/Stock.php' ?></div>
<div id="contRsciPaie">	<?php include 'cyclePaie/Paie.php' ?></div>
<div id="contRsciRecette"><?php include 'cycleRecette/Recette.php' ?></div>
<div id="contRsciDepense"><?php include 'cycleDepense/Depense.php' ?></div>
<div id="contRsciVente"><?php include 'cycleVente/Vente.php' ?></div>
<div id="contRsciEnvironnement"><?php include 'cycleEnvironnement/Environnement.php' ?></div>
<div id="contRsciInfo"><?php include 'cycleInfo/Info.php' ?></div>

<input type="text" id="tx_mission_id_ra" value="<?php echo $mission_id;?>"  style="display:none;"/>

<div id="ContentSynthAchat" style="display:none;"></div>
 <!-- Pour la synthèse du cycle achat -->
<!-----------------------------------------mihidt ny traitement----------------------------------------- -->
<!---------------------------Interface de l'objectif du superviseur------------------------------- -->
<div id="contenue_objectif_sup_A"></div>
<!------------------------------------------------------------------------------------------------ -->
<!----------------------------Interface de l'objectif A------------------------------------------- -->
<div id="contenue_objectif_A" style="display:none;"></div>			
<!------------------------------------------------------------------------------------------------ -->
<div id="contenue_poste_a"></div>
<!--------------------------Formulaire de l'objectif b auditeur----------------------------------- -->
<div id="dv_cont_obj_b"></div>
<!------------------------------------------------------------------------------------------------ -->
<!--------------------------Formulaire de l'objectif b chef de mission--------------------------------- -->
<div id="dv_cont_obj_sup_b"></div>
<!------------------------------------------------------------------------------------------------ -->
<!--------------------------Formulaire de l'objectif c auditeur----------------------------------- -->
<div id="dv_cont_obj_c"></div>
<!------------------------------------------------------------------------------------------------ -->
<!-----------------------Formulaire de l'objectif de c superviseur-------------------------------- -->
<div id="dv_cont_obj_c_sup"></div>
<!------------------------------------------------------------------------------------------------ -->
<!--------------------------Formulaire de l'objectif d auditeur----------------------------------- -->
<div id="dv_cont_obj_d"></div>
<!------------------------------------------------------------------------------------------------ -->
<!-----------------------Formulaire de l'objectif de d superviseur-------------------------------- -->
<div id="dv_cont_obj_d_sup"></div>
<!------------------------------------------------------------------------------------------------ -->
<!--------------------------Formulaire de l'objectif e auditeur----------------------------------- -->
<div id="dv_cont_obj_e">></div>
<!------------------------------------------------------------------------------------------------ -->
<!-----------------------Formulaire de l'objectif de e superviseur-------------------------------- -->
<div id="dv_cont_obj_e_sup"><?php //include 'cycleAchat/cycle_achat_interface_e/cycle_achat_e_superviseur/Interface_e_Superviseur.php';?></div>
<!------------------------------------------------------------------------------------------------ -->
<!--------------------------Formulaire de l'objectif e auditeur----------------------------------- -->
<div id="dv_cont_obj_f"><</div>
<!------------------------------------------------------------------------------------------------ -->
<!-----------------------Formulaire de l'objectif de e superviseur-------------------------------- -->
<div id="dv_cont_obj_f_sup"></div>
<!------------------------------------------------------------------------------------------------ -->

<div id="contenue" style="display:none;"><?php include 'RA/index.php';?></div>







						

								



