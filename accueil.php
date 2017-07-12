<?php 
include 'connexion.php';
@session_start();
if (@$_SESSION["user"]=="")
{
	?><script>window.location.href="index.php";</script><?php
}

$userName=$_SESSION["nom"];
?>

<!-- <p>template principale /accueil.php -->

<html>
	<head>
		<meta name="viewport" content="width=device-width"/>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/cssEntreprise.css"/>
		<link rel="stylesheet" href="css/css2.css"/>
		<link rel="stylesheet" href="css/css.css"/>
		<link rel="stylesheet" href="waiting.css"/>
		<link href="js/bootstrap/css/bootsrap.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="fancybox/jquery.fancybox.css"/>
		<style type="text/css">
			.btn{
				border: none; /* Remove borders */
			    color: white; /* Add a text color */
			    padding: 14px 28px; /* Add some padding */
			    cursor: pointer; /* Add a pointer cursor on mouse-over */
			}
			.default {background-color: #eee; color: black;} /* Gray */
			.default:hover {background: #ddd;}
		</style>
		
		<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
		<script src="js/jquery-ui.js"></script>

		
		<script text="javascript" src="js/jcanvas.min.js"></script>
		<script text="javascript" src="js/ajax.js"></script>
		<script text="javascript" src="js/pied.js"></script>
		<script text="javascript" src="js/fonctions-generiques.js"></script>
		
		<script type="text/javascript" src="fancybox/jquery.fancybox.pack.js?v=2.0.6"></script>

		<script type="text/javascript" src="js/angular.js"></script>
		<!-- Tinay -->
		<!-- <script text="javascript" src="cycleAchat/cycle_achat_js/js_event.js"></script> -->

		<script>
			function detecte_connexion()
			{
					var online = <?php echo (preg_match("#^localhost#", $_SERVER["HTTP_HOST"]) ? 'false' : 'true') ?>;
					if(!online) {
						$('#entete').css('background-color', 'gray');
						$('#pied').css('background-color', 'gray');
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

		<!--<p>template principale /accueil.php</p>-->
		
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
					<!-- <div id="tete_menue" onClick="afficheMenue()"></div> -->
				</div><!--fin menu laterale-->
				<div id="Acc">
					<div id="data">
						<div class="deuxRange" id="les_entreprise">

							<!-- Affiche la liste des entreptrises -->
							<div id="liste_entreprise">
								<?php
									require_once('includes/liste_entreprise.php');
								?>
							</div>

							<!-- affiche le status des entreprises -->
							<div id="statut_entreprise">
								<?php
									require_once('includes/statut_entreprise.php');
								?>
							</div>
						</div>
						<!--fin les_entreprises-->

						<div class="deuxRange" id="les_missions">

							<!-- Affiche la liste des missions -->
							<div id="liste_mission">
								<?php require_once('includes/liste_mission.php'); ?>
							</div>

							<!-- Affiche la liste des status missions encours et terminées -->
							<div id="statut_mission">
								<?php require_once('includes/statut_mission.php');?>
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
	</div>
	</body>
</html>
