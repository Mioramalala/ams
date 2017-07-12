<doctype html!>
<?php
	@session_start();
	include 'connexion.php';

	
	

	if(!empty($_POST["z"])){
	$idMiss=$_POST["z"];
	$_SESSION['idMission']=$idMiss;
	$sqlNbrPo='SELECT ENTREPRISE_ID  FROM  tab_mission WHERE MISSION_ID='.$_SESSION['idMission'];
	 $reponse=$bdd->query($sqlNbrPo);
	 $donneeNbr=$reponse->fetch();
	 $_SESSION["id_Entre"] = $donneeNbr["ENTREPRISE_ID"];		
	
		
	 
		}else{
		//==========================================================
		//
		//==========================================================
		include "Dossier_Rapport/connex.php";

        $mail_utilisateur = $_SESSION["user"]; 
        
		$ID_mission=get($mail_utilisateur);
		
	    $_SESSION['idMission']=$ID_mission;
		
		}
		
		
		function get($mail_utilisateur){
		$get_ID_util=db_connect("SELECT UTIL_ID  FROM tab_utilisateur WHERE UTIL_LOGIN ='".$mail_utilisateur ."' ");
		foreach ($get_ID_util as $val){
		$ID_utilisateur =$val['UTIL_ID'];
		}
		$get_ID_mission=db_connect("SELECT nom_tache,max(MISSION_ID) as MISSION_ID FROM tab_utilisateur u,tab_distribution_tache d
		 WHERE u.UTIL_ID=d.UTIL_ID AND u.UTIL_ID ='".$ID_utilisateur."' ");

		foreach ($get_ID_mission as $val_mission){
		$nom_tache=$val_mission['nom_tache'];
		$MISSION_ID=$val_mission['MISSION_ID'];
		/* if(empty($nom_tache) AND empty($MISSION_ID) ){
		   echo '<option value="0">Pas de mission en cours.</option>';
			}else{
			echo '<option value="'.$MISSION_ID.'">'.$nom_tache.'</option><br>';
	      }*/
		}
		return $MISSION_ID;
		}
		
	 ?>
<html>
	<head>
		<script type="text/javascript">
				waiting();
		</script>
		<title>Traitement AMS</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/css.css"/>
		<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
		<script type="text/javascript" src="js/js_menue.js"></script>
		<script type="text/javascript" src="js/js_RA.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>

		<script>
		
			$(function(){
			$('#RSCI').css('background-color','#2ca3f3');
				$('#contenue').hide();
				$('#contenue_objectif_A').hide();
				
				$("#RSCI").click(function(){
					$('#deux_tresorerie').hide();
					$('#bt_tresorerie').show();
					$(this).css('background-color','#2ca3f3');
					$('#Rap_int').removeAttr("style");
					$('#RA').removeAttr("style");
					$('#RDC').removeAttr("style");
					$('#Ref_arch').removeAttr("style");
					$('.Rap_def').removeAttr("style");

					$('#contenue_rsci').hide();
					$('#contenue').hide();
					$('#contenue_objectif_sup_A').hide();
					$('#contenue_objectif_A').hide();
					$('#dv_cont_obj_b').hide();
					$('#dv_cont_obj_sup_b').hide();
					$('#dv_cont_obj_c').hide();
					$('#dv_cont_obj_sup_c').hide();
					$('#dv_cont_obj_d').hide();
					$('#dv_cont_obj_sup_d').hide();
					$('#dv_cont_obj_e').hide();
					$('#dv_cont_obj_sup_e').hide();
					$('#dv_cont_obj_f').hide();
					$('#dv_cont_obj_sup_f').hide();
					$('#contenue_poste_a').hide();
					$('#contRsciImmo').hide();
					$('#contRsciPaie').hide();
					$('#contRsciRecette').hide();
					$('#contRsciDepense').hide();
					$('#contRsciStock').hide();
					$('#contRsciVente').hide();
					$('#contRsciInfo').hide();
					$('#contRsciEnvironnement').hide();
					$('#contimb').hide();
					$('#contev').hide();
					$('#contia').hide();
					$('#contib').hide();
					$('#contic').hide();
					$('#contid').hide();
					$('#contSupConclusion').hide();
					$('#ContentSynthAchat').hide();
					$('#dv_cont_menu_rsci').fadeIn(1000);
				});
			
				$("#RA").click(function(){
					$('#contenue').hide();
					$(this).css('background-color','#2ca3f3');
					$('#Rap_int').removeAttr("style");
					$('#RSCI').removeAttr("style");
					$('#RDC').removeAttr("style");
					$('#Ref_arch').removeAttr("style");
					$('.Rap_def').removeAttr("style");
					
					$('#ContentSynthAchat').hide();
					$('#contenue_rsci').hide();
					$('#contenue_objectif_sup_A').hide();
					$('#contenue_objectif_A').hide();
					$('#dv_cont_obj_b').hide();
					$('#dv_cont_obj_sup_b').hide();
					$('#dv_cont_obj_c').hide();
					$('#dv_cont_obj_sup_c').hide();
					$('#dv_cont_obj_d').hide();
					$('#dv_cont_obj_sup_d').hide();
					$('#dv_cont_obj_e').hide();
					$('#dv_cont_obj_sup_e').hide();
					$('#dv_cont_obj_f').hide();
					$('#dv_cont_obj_sup_f').hide();
					$('#dv_cont_menu_rsci').hide();

					$('#contRsciImmo').hide();
					$('#contRsciPaie').hide();
					$('#contRsciRecette').hide();
					$('#contRsciDepense').hide();
					$('#contRsciStock').hide();
					$('#contRsciVente').hide();
					$('#contRsciInfo').hide();
					$('#contRsciEnvironnement').hide();
					$('#contimb').hide();
					$('#contev').hide();
					$('#contia').hide();
					$('#contib').hide();
					$('#contic').hide();
					$('#contid').hide();
					$('#contSupConclusion').hide();
					$('#contenue_poste_a').hide();
					$('#contenue').fadeIn(1000);
				});
				
				$("#RDC").click(function(){
					$('#contenue').hide();
					$(this).css('background-color','#2ca3f3');
					$('.Rap_def').removeAttr("style");
					$('#RSCI').removeAttr("style");
					$('#RA').removeAttr("style");
					$('#Ref_arch').removeAttr("style");
					$('#Rap_int').removeAttr("style");
					
					//////////////// traitement RDC luc rodin //////////////////////////////////
					$('#ContentSynthAchat').hide();
					$('#dv_donnees_financiers_RA').hide();
					$('#contenue_rsci').hide();
					$('#contenue_objectif_sup_A').hide();
					$('#contenue_objectif_A').hide();
					$('#dv_cont_obj_b').hide();
					$('#dv_cont_obj_sup_b').hide();
					$('#dv_cont_obj_c').hide();
					$('#dv_cont_obj_sup_c').hide();
					$('#dv_cont_obj_d').hide();
					$('#dv_cont_obj_sup_d').hide();
					$('#dv_cont_obj_e').hide();
					$('#dv_cont_obj_sup_e').hide();
					$('#dv_cont_obj_f').hide();
					$('#dv_cont_obj_sup_f').hide();
					$('#dv_cont_menu_rsci').hide();
					$('#contenue_poste_a').hide();
			
					$('#contRsciImmo').hide();
					$('#contRsciPaie').hide();
					$('#contRsciRecette').hide();
					$('#contRsciDepense').hide();
					$('#contRsciStock').hide();
					$('#contRsciVente').hide();
					$('#contRsciInfo').hide();
					$('#contRsciEnvironnement').hide();
					$('#contimb').hide();
					$('#contev').hide();
					$('#contia').hide();
					$('#contib').hide();
					$('#contic').hide();
					$('#contid').hide();
					$('#contSupConclusion').hide();
					$('#contenue').fadeIn(1000);
					$("#contenue").load("RDC/index.php");
				});
					
				$("#Rap_int").click(function(){
				
					$(this).css('background-color','#2ca3f3');
					$('#RDC').removeAttr("style");
					$('#RSCI').removeAttr("style");
					$('#RA').removeAttr("style");
					$('#Ref_arch').removeAttr("style");
					$('.Rap_def').removeAttr("style");
					// alert("azertyuiop");
					
					////////////////////////////////////////////////////////////////////////////
					
					$('#ContentSynthAchat').hide();
					$('#dv_donnees_financiers_RA').hide();
					$('#contenue_rsci').hide();
					$('#contenue_objectif_sup_A').hide();
					$('#contenue_objectif_A').hide();
					$('#dv_cont_obj_b').hide();
					$('#dv_cont_obj_sup_b').hide();
					$('#dv_cont_obj_c').hide();
					$('#dv_cont_obj_sup_c').hide();
					$('#dv_cont_obj_d').hide();
					$('#dv_cont_obj_sup_d').hide();
					$('#dv_cont_obj_e').hide();
					$('#dv_cont_obj_sup_e').hide();
					$('#dv_cont_obj_f').hide();
					$('#dv_cont_obj_sup_f').hide();
					$('#dv_cont_menu_rsci').hide();
					$('#contenue_poste_a').hide();
			
					$('#contRsciImmo').hide();
					$('#contRsciPaie').hide();
					$('#contRsciRecette').hide();
					$('#contRsciDepense').hide();
					$('#contRsciStock').hide();
					$('#contRsciVente').hide();
					$('#contRsciInfo').hide();
					$('#contRsciEnvironnement').hide();
					$('#contimb').hide();
					$('#contev').hide();
					$('#contia').hide();
					$('#contib').hide();
					$('#contic').hide();
					$('#contid').hide();
					$('#contSupConclusion').hide();
					
					////////////////////////////////////////////////////////////////////////////
					
					$('#contenue').fadeIn(1000);
					$("#contenue").load("Rap_Inter/index.php");
					
					
					
				});
				
				$(".Rap_def").click(function(){
					
				  // $("#dv_cont_menu_rsci").empty();
					/*$(this).css('background-color','#2ca3f3');
					$("#contenue").load("Rap_Inter/rapport_definitif.php");
					$('#RDC').removeAttr("style");
					$('#RSCI').removeAttr("style");
					$('#RA').removeAttr("style");
					$('#Ref_arch').removeAttr("style");
					$('#Rap_int').removeAttr("style");*/
					$('#contenue').hide();
					$(this).css('background-color','#2ca3f3');
					$('#Rap_int').removeAttr("style");
					$('#RSCI').removeAttr("style");
					$('#RDC').removeAttr("style");
					$('#Ref_arch').removeAttr("style");
					$('.Rap_def').removeAttr("style");
					
					$('#ContentSynthAchat').hide();
					$('#contenue_rsci').hide();
					$('#contenue_objectif_sup_A').hide();
					$('#contenue_objectif_A').hide();
					$('#dv_cont_obj_b').hide();
					$('#dv_cont_obj_sup_b').hide();
					$('#dv_cont_obj_c').hide();
					$('#dv_cont_obj_sup_c').hide();
					$('#dv_cont_obj_d').hide();
					$('#dv_cont_obj_sup_d').hide();
					$('#dv_cont_obj_e').hide();
					$('#dv_cont_obj_sup_e').hide();
					$('#dv_cont_obj_f').hide();
					$('#dv_cont_obj_sup_f').hide();
					$('#dv_cont_menu_rsci').hide();

					$('#contRsciImmo').hide();
					$('#contRsciPaie').hide();
					$('#contRsciRecette').hide();
					$('#contRsciDepense').hide();
					$('#contRsciStock').hide();
					$('#contRsciVente').hide();
					$('#contRsciInfo').hide();
					$('#contRsciEnvironnement').hide();
					$('#contimb').hide();
					$('#contev').hide();
					$('#contia').hide();
					$('#contib').hide();
					$('#contic').hide();
					$('#contid').hide();
					$('#contSupConclusion').hide();
					$('#contenue_poste_a').hide();
					$('#contenue').fadeIn(1000);
$("#contenue").load("Rap_Inter/rapport_definitif.php");

					
					
				});
					
				$("#Ref_arch").click(function(){
					$(this).css('background-color','#2ca3f3');
					$('#RDC').removeAttr("style");
					$('#RSCI').removeAttr("style");
					$('#RA').removeAttr("style");
					$('.Rap_def').removeAttr("style");
					$('#Rap_int').removeAttr("style");
				});	
			});
		</script>
	</head>
	<body>
		<center>		
			<div id="ongulet">
				<table>
					<tr>
						<td id="RSCI" onclick="positionCycle(1)"> Revue système contrôle interne </td>
						<td id="RA" onclick="positionCycle(2)"> Revue Analytique </td>
						<td id="RDC" onclick="positionCycle(3)"> Revue des comptes </td>
						<td id="Rap_int" onclick="positionCycle(4)"> Rapports intermédiaires </td>
						<td class="Rap_def" onclick="positionCycle(5)"> Rapports définitifs </td>
						<td id="Ref_arch" onclick="positionCycle(6)"> Références & archives </td>
					</tr>
				</table>
			</div>
			<!-- ================================================================================================= -->
			<div id="dv_cont_menu_rsci"><?php include 'menu_rsci.php'; ?></div>
			<!-- ================================================================================================= -->
			<!-- =====================================ato ny traitement rehetra no ho includena===================================== -->
			<div id="avoka"></div>
			<div id="achat"></div>
			<div id="immobilisation"></div>
			<div id="stock"></div>
			<div id="paie"></div>
			<div id="recette"></div>
			<div id="depense"></div>
			<div id="vente"></div>
			<div id="evironement"></div>
			<div id="syst_info"></div>
			
			
			
		</center>
	</body>
	<script type="text/javascript">
		$(document).ready(function(){
			waiting();
			$.ajax({
				type:'GET',
				url:'include_traitement.php',
				success:function(data){
					$('#avoka').html(data);
					stopWaiting();
				}
			});
		});
		
		$(function(){
				$('#bt_achat').click(function(){
				
			waiting();
			$.ajax({
				type:'GET',
				url:'include_achat.php',
				success:function(data){
					$('#achat').html(data);
					stopWaiting();
				}
			});
			});
			
			
			
		$('#bt_immo').click(function(){

			waiting();
			$.ajax({
				type:'GET',
				url:'include_immo.php',
				success:function(data){
					alert("DEBUT");
					$('#immobilisation').html(data);
					alert("FIN ");
					stopWaiting();

				}
			});
				
		
		});
		
		$('#bt_stock').click(function(){
		
			waiting();
			$.ajax({
				type:'GET',
				url:'include_stock.php',
				success:function(data){
					$('#stock').html(data);
					stopWaiting();
				}
			});
				
				
			});
			
			$('#bt_paie').click(function(){
				waiting();
				$.ajax({
					type:'GET',
					url:'include_paie.php',
					success:function(data){
						$('#paie').html(data);
						stopWaiting();
					}
				});
				
			});
			
			
			$('#bt_recette').click(function(){
				//alert("RECETTE");
				waiting();
				$.ajax({
					type:'GET',
					url:'include_recette.php',
					success:function(data){
						$('#recette').html(data);
						stopWaiting();
					}
				});
				
			});
			
		$('#bt_dep').click(function(){
			waiting();
				$.ajax({
					type:'GET',
					url:'include_depense.php',
					success:function(data){
						$('#depense').html(data);
						stopWaiting();
					}
				});
			});
		
		$('#bt_vente').click(function(){
			//waiting();
				$.ajax({
					type:'GET',
					url:'include_vente.php',
					success:function(data){
						$('#vente').html(data);
					//	stopWaiting();
					}
				});
		
		
		
		});
		
		$('#bt_env').click(function(){
			waiting();
				$.ajax({
					type:'GET',
					url:'include_evironement.php',
					success:function(data){
						$('#evironement').html(data);
						stopWaiting();
					}
				});
		
		
		});
		
		$('#bt_syst').click(function(){
			waiting();
				$.ajax({
					type:'GET',
					url:'include_syst_info.php',
					success:function(data){
						$('#evironement').html(data);
						stopWaiting();
					}
				});
		
		
		});
		
		});
	</script>
</html>





















