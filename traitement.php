<doctype html!>
<?php
	@session_start();
	include 'connexion.php';

	
	

	if(!empty($_POST["z"])){
	$idMiss=$_POST["z"];
	$_SESSION['idMission']=$idMiss;
	$sqlNbrPo='SELECT tab_mission.ENTREPRISE_ID, ENTREPRISE_DENOMINATION_SOCIAL  FROM  tab_mission JOIN tab_entreprise ON tab_mission.ENTREPRISE_ID=tab_entreprise.ENTREPRISE_ID  WHERE MISSION_ID='.$_SESSION['idMission'];
	 $reponse=$bdd->query($sqlNbrPo);
	 $donneeNbr=$reponse->fetch();
	 $_SESSION["id_Entre"] = $donneeNbr["ENTREPRISE_ID"];		
	 $_SESSION["nom_entreprise"] = $donneeNbr["ENTREPRISE_DENOMINATION_SOCIAL"];		
	
		
	 
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
		<script type="text/javascript" src="js/menu_mission.js"></script>

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

		// Tinay : Appel automatique des scripts dans /cycleAchat/index dès qu'on entre dans RSCI onglet.
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
					
					$('#immobilisation').html(data);

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
			
		// tinay editer
		$('#bt_syst').click(function(){
			waiting();
			$.ajax({
				type:'GET',
				url:'include_syst_info.php',
				success:function(data){
					//$('#evironement').html(data); tinay editer
					$('#syst_info').html(data);
					stopWaiting();
				}
			});
		
		
		});
		
		});
	</script>
</html>





















