<?php 


require_once 'connexion.php';
@session_start();

//ACHAT
//VENTE

//PAIE
//ENVIRONMNT_CONTROL
//IMMOBILIER
//STOCK
//SYSTEM_INFOS
//DEPENSE

//RECETTE
$lien=$_GET['lien'];
$lien = explode("/",$lien); 

$idMission=$lien[1];
$_SESSION['idMission']=$idMission;
$cycletype=$lien[0];






	$sqlMission = "SELECT tab_mission.ENTREPRISE_ID AS ENTREPRISE_ID,MISSION_ANNEE,MISSION_TYPE
	FROM tab_mission,tab_entreprise 
	where tab_mission.ENTREPRISE_ID=tab_entreprise.ENTREPRISE_ID and tab_mission.MISSION_ID='$idMission'";
	
	
	$req= $bdd->query($sqlMission);
	//$donnees_e=$reponse_e->fetch();
	//print('sqlMission'.$sqlMission);
	$donneeMiss =$req->fetch();
		
		
		$MissAnnee=$donneeMiss['MISSION_ANNEE'];
		$MissType=$donneeMiss['MISSION_TYPE'];
		$IdEntreprise =$donneeMiss['ENTREPRISE_ID'];

	//$sqlNomE      = "SELECT ENTREPRISE_CODE FROM tab_entreprise WHERE ENTREPRISE_ID=".$IdEntr;
	//	$repN         = $bdd->query($sqlNomE);
		//while




if (@$_SESSION["user"]=="")
{
	?><script>window.location.href="index.php";</script><?php
}

$userName=$_SESSION["nom"];
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/cssEntreprise.css"/>
		<link rel="stylesheet" href="css/css2.css"/>
		<link rel="stylesheet" href="css/css.css"/>
		<link rel="stylesheet" href="waiting.css"/>
		<link href="js/bootstrap/css/bootsrap.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="fancybox/jquery.fancybox.css"/>
		
		<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
		<script src="js/jquery-ui.js"></script>

		
		<script text="javascript" src="js/jcanvas.min.js"></script>
		<script text="javascript" src="js/ajax.js"></script>
		<script text="javascript" src="js/pied.js"></script>
		
		<script text="javascript" src="js/js_synthese.js"></script>
		
		<script text="javascript" src="js/fonctions-generiques.js"></script>
		
		<script type="text/javascript" src="fancybox/jquery.fancybox.pack.js?v=2.0.6"></script>
		<script>
		
			function detecte_connexion()
			{
					var online=<?php
					//print ($_SERVER['HTTP_HOST']);
					 $online = $_SERVER['HTTP_HOST'];
					
					 if($online=="localhost")
					  print ("false"); 
					 else
					 print ("true");
					
					  //echo (preg_match("#^#", $_SERVER["HTTP_HOST"]) ? 'false' : 'true'); 
					  ?>;
					  
					  
					if(!online) {
						$('#entete').css('background-color', 'gray');
						$('#pied').css('background-color', 'gray');
						//alert("cccc");
					}
										
			}
			
				/*var confirmOnLeave = function(msg) {
				 
					window.onbeforeunload = function (e) {
						e = e || window.event;
						msg = msg || '';
				 
						// For IE and Firefox
						if (e) {e.returnValue = msg;}
				 
						// For Chrome and Safari
						return msg;
					};
				 
				};
				 
				// message de confirmation générique du navigateur
				//confirmOnLeave();
				 
				// message de confirmation personnalisé
				confirmOnLeave('ts ay tsun e');*/
		</script>
		
	</head>
	<body onLoad="detecte_connexion()" >

	<input type="hidden" value="<?php print($cycletype); ?>" id="CYCLETYPE">
	<input type="hidden" value="<?php print($idMission); ?>" id="idMission">

	<input type="hidden" value="<?php print($MissAnnee); ?>" id="MISSION_ANNEE">
	<input type="hidden" value="<?php print($MissType); ?>" id="MISSION_TYPE">
	<input type="hidden"  value="<?php print($IdEntreprise); ?>" id="ENTREPRISE_ID">
    
    
	
		
		<div id="comteneur">
			<div id="entete">
				<div id="logo_ams"></div>
				<div id="place_interaction">
					<div class="boutton_interaction" id="imprimer" onClick="PrintElem('.imprimable')"></div>
					<div class="boutton_interaction" id="compte"></div>
					<div class="boutton_interaction" id="aide"></div>
				</div>
				<div id="gest_pro">	
					<center>
						<table>
							<tr>
								<img src="icone/TRIANGLE.png" id="tri"/>
								<p id="gest_p" class="Gest1">Mon profil</p>
								<p id="utilisateur" class="Gest1">Utilisateurs</p>
								<a href="#fermer" class="Gest" id="decon" > Déconnexion </a>
								
								<input type value="<?php echo $userName ;?>" id="makaNom" style="display:none;"/>
<!----------------------------------------deconnexion--------------------------------------------------------------->				
								<div id="fermer" style="display:none; z-index:9999;">
									<center>
										<p> Voulez vous vraiment fermer l'application <?php echo $userName ;?>?</p>
										<p>
											<input type="button" value="Valider" id="okferme"/>
											
										</p>
									</center>
									
								</div>
													
<!-------------------------------------------------------------------------------------------------------------------->	
							</tr>
						</table>
					</center>	
				</div> <!--fin "gest-pro"-->
				<div id="aide_apropos">	
					<center>
						<table>
							<tr>
								<img src="icone/TRIANGLE.png" id="tri"/>
								<p id="aide_" class="Gest1">Aide</p>
								<p id="apropos_" class="Gest1">A propos</p>
							</tr>
						</table>
					</center>
				</div>
				<div id="fenetre_aide"  style="display:none; z-index:9999;" align="center" data-options="handle:'#dragg'" >
				<div id="btn_fermeture"></div>
					<center>
						<p><input type="button" value="Fermer" id="fermeture" /></p>
					</center>	
				</div>
				<div id="fenetre_apropos"  style="display:none; z-index:9999;" align="center" data-options="handle:'#dragg'" >
									<div id="btn_fermeture1"></div>
									<div style="background-color:#FFFFFF;"><img src="icone/defaut_.png" width="100px" height="100px"/>
										<p style="color:#666666">Version 2.3</p>
										<p style="color:#666666">Date : 29-01-2015</p>
									</div>
									
									<div id="apropos_pied">
									<table style="margin-left:2px" cellspacing="10">
										<tr >
											<td>
												<span style="color:#FFFFFF;font-size:10px">Application Web conçue et dévéloppée par </span>
											</td>
											<td>
												<table>
													<tr>
														<td><p><img src="logo/TMS-576x352.png" width="108px" height="40px"/></p></td>
														
													</tr>
													<tr>
														<td><span style="color:#FFFFFF;font-size:10px">www.tmsconsulting.pro</span></td>
														
													</tr>
												</table>
												
												
											</td>
										</tr>
									</table>
									</div>
									<!--<center>
									<p><input type="button" value="Fermer" id="fermeture" /></p>
									</center>-->
									
				</div>
			</div>
			<div id="contenueA">
				<div class="" id="menu_laterale">
					<!--<div id="contenue_menue"></div>-->
					<div id="tete_menue" onClick="afficheMenue()"></div>
				</div><!--fin menu laterale-->
				<div id="Acc">
					<div id="data">
						<div class="deuxRange" id="les_entreprise">
							<div id="liste_entreprise">
								<?php
									require_once('includes/liste_entreprise.php');
								?>
							</div>
							<div id="statut_entreprise">
								<?php
									require_once('includes/statut_entreprise.php');
								?>
							</div>
						</div><!--fin les_entreprises-->
						<div class="deuxRange" id="les_missions">
							<div id="liste_mission">
							<?php
								require_once('includes/liste_mission.php');
							?>
							</div><!--fin liste_mission-->
							<div id="statut_mission">
							<?php
								require_once('includes/statut_mission.php');
							?>
							</div>

						</div><!--fin les missions-->
					</div><!--fin data-->
				</div><!--fin data_ams-->
			</div><!--fin contenue-->
		
			<div id="pied">
				<?php
					require_once('includes/pied.php');
				?>
			</div>
		</div><!--fin contenu-->
		
	</body>
</html>
