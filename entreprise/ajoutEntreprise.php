<?php 	
	// Droit d'utilisateur (autorisé seulement aux administrateurs) by Niaina
	@session_start();
	$userName=$_SESSION["nom"];
	if ($userName != "Administrateur" && $userName != "Super-Admin") {
?>

<script>
	alert("Vous n'avez pas le droit d'ouvrir l'ajout d'une entreprise");
	window.location.href="../accueil.php";
</script>

<?php
	}
	// Fin Droit d'utilisateur
?>

<html>
	<head>
		<title>ajout</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../css/cssEntreprise.css">
		<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
		<script type="text/javascript" src="../js/NewEntrepreise.js"></script>
		<link href="../facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
		<script src="../facebox/facebox.js" type="text/javascript"></script> 
		<script type="text/javascript" src="src/date/jquery.datepick.min.js"></script>
		<script type="text/javascript" src="src/date/jquery.datepick-fr.js"></script>
		<link rel="stylesheet" href="src/date/jquery.datepick.css"></script>
		
	</head>
	<body>
	<div id="frmEntreprise" >
	<center><p id="ttrCr"><b>Création entreprise</b></p></center>
		<table>
			<tr>
				<td id="gauche">
					<ul id="menu_gauche">
						<li><center><div id="log12"><div id="logo" ><img src="../icone/logo_ams_blanc.png" width="153" height="153 "id="logoCre" class="logo_entreprise"/></div></div></center></li>
						<li ><center><p class="clCre"  id="basique" >Informations basiques</p></center></li>
						<li ><center><p class="clCre" id="comptable">Travail comptable</p></center></li>
						<li ><center><p class="clCre" id="juridique">Informations juridiques</p></center></li>
					</ul>
				</td>
				<td id="droit">
					<div id="creMiova">
						<div id="info_base" ><?php include 'info_base.php';?></div>
						<div id="info_juri" style="display:none;"><?php include 'info_juri.php';?></div>
						<div id="trav_com" style="display:none;"><?php include 'trav_com.php';?></div>
						<div id="doc_perma" style="display:none;">
							<table>
								<tr>
									<td>
										<script>
											/*function clique_enreg(){
												var g=$("#document_").val();
												$("#fa").append("<p>"+g+"</p>");
												$.ajax({
													type:"POST",
													url:"",
													data:{g:g},
													success:function(){
														
													}
													
												});
												//window.location.href="formUpload.php";
											}*/
										</script>
										<!--<form method="post" action="#">
											<input type="file" id="document_"/>
											<input type="button" value="Enregistrer Doc" id="doc_enreg" onClick="clique_enreg()"/>
										</form>
										<div id="fa"></div>-->
									</td>
								</tr>
							</table>
							<?php include 'doc_perma.php';?>
						</div>
					</div>
				</td>
				<td>
					<div id="creSurPlus">
						<div id="post_cle">
						</div>
						<div id="actMiampy">
						</div>
					</div>
				</td>
			</tr>
		</table>	
		<div id="btn">
			<table>
				<tr>
					<td><center><p class="btnCre" id="annulerId">Quitter</p></center><td>
					<td> <p id="logoGet" class="btnCre"  title="telecharger un logo">Add logo</p></td>
					<td><center><p class="btnCre" id="okimg">Terminer</p></center><td>
					<td><center><p class="btnCre" id="suiv1">Suivant</p></center><td>
					<td><center><p class="btnCre" id="prec1">Précedent</p></center><td>
					<td><center><p class="btnCre" id="prec2">Précedent</p></center><td>
					<td><center><p class="btnCre" id="suiv2">Suivant</p></center><td>
					<td><center><p class="btnCre" id="enregistrerId">Créer</p></center><td>
				</tr>
			</table>
		</div>
	</div>
	</body>
</html>
<!--------------------------------------new doc-------------------------------------------------------------->			
	<form method="post" enctype="multipart/form-data" action="entreprise/postDoc.php" style="display:none;" >
		<p><input type="file" id="logoname" accept="image/*" name="logoname" /></p>
		<input type="submit" value="Save doc" id="btnRecImg" name="btnRecDocName" />
	</form>
<!------------------------------------------------------------------------------------------------------------------------------>
	
				
			
	

	<script>
	var lastEntrepriseId = -1;
	
	$(function(){
	
		$("#pluTel").click(function(){
			$("#txtcontact2").fadeIn(1000);
		});
		
		$("#enregistrerId").click(function(){
				var denom   = $("#txtdenomination").val();
				var adress  = $("#txtAdress").val();
				var RaizSos = $("#txtraisonSoc").val();
				var Contact = $("#txtcontact").val();
				var CapSos  = $("#txtCapitSoc").val();
				var RC      = $("#txtRC").val();
				var NumStat = $("#txtNumStat").val();
				var Mail    = $("#txtMail").val();
				var NIF     = $("#txtNIF").val();
				var Code    = $("#txtCode").val();
				var SectAct = $("#txtSectActi").val();
				
					////////////date creation////////////
				var jour     = $("#jourCre").val();
				var mois     = $("#moisCre").val();
				var annee    = $("#AnnCre").val();
				var dateCrea = jour+'/'+mois+'/'+annee;
				
					/////////////////////////////////////
			
				var DurSociete = $("#txtDureSoc").val();
				var Activite   = $("#txtActi").val();
				var NbrSal     = $("#txtNbrSal").val();
				
					///////////////Exo comptable///////////////
					
				var jourExo = $("#jourExoCom").val();
				var MoisExo = $("#moisExoComp").val();
				var ExoComp = jourExo+'/'+MoisExo;
					
					//////////////////////////////////////////
				var ValStock   = $("#txtValStock").val();
				var Site       = $("#txtsite").val();
				var NbrAction  = $("#NbrAction").val();
				var ValNom     = CapSos/NbrAction;
				var NbrActNair = $("#NbrActionnair").val();
				
				// alert(denom+adress+RaizSos+Contact+CapSos+RC+NumStat+Mail+NIF+Code+SectAct+dateCrea+DurSociete+Activite+NbrSal+ExoComp+ValStock+Site+NbrAction+ValNom+NbrActNair);		
				if(denom && adress && RaizSos && Contact && CapSos && RC && NumStat && NIF && Code && SectAct && dateCrea && DurSociete && ExoComp  && NbrAction && ValNom&& NbrActNair) {
					$.ajax({
						type:"POST",
						url:"entreprise/PostEntreprise.php",
						data:{a:denom,z:adress,e:RaizSos,r:Contact,t:CapSos,y:RC,u:NumStat,i:Mail,o:NIF,p:Code,q:SectAct,s:dateCrea,d:DurSociete,
						f:Activite,g:NbrSal,h:ExoComp,j:ValStock,k:Site,l:NbrAction,m:ValNom,w:NbrActNair},
						success:function(lastId){
							lastEntrepriseId = lastId;
							//alert(lastEntrepriseId);
							
							jQuery.facebox({ ajax: '../alert/engEntrOk.php' });
							$("#okimg").show();
							$("#logoGet").show();
							$("#enregistrerId").hide();
							$("#annulerId").hide();
							$('#txtdenomination').attr("disabled", true);
							$('#txtAdress').attr("disabled", true);
							$('#txtraisonSoc').attr("disabled", true);
							$('#txtcontact').attr("disabled", true);
							$('#txtCapitSoc').attr("disabled", true);
							$('#txtRC').attr("disabled", true);
							$('#txtNumStat').attr("disabled", true);
							$('#txtMail').attr("disabled", true);
							$('#txtNIF').attr("disabled", true);
							$('#txtCode').attr("disabled", true);
							$('#txtSectActi').attr("disabled", true);
							$('#jourCre').attr("disabled", true);
							$('#moisCre').attr("disabled", true);
							$('#AnnCre').attr("disabled", true);
							$('#txtDureSoc').attr("disabled", true);
							$('#txtActi').attr("disabled", true);
							$('#txtNbrSal').attr("disabled", true);
							$('#jourExoCom').attr("disabled", true);
							$('#moisExoComp').attr("disabled", true);
							$('#txtValStock').attr("disabled", true);
							$('#txtsite').attr("disabled", true);
							$('#NbrAction').attr("disabled", true);
							$('#NbrActionnair').attr("disabled", true);
							$("#basique").hide();
							$("#comptable").hide();
							$("#juridique").hide();
							$("#prec2").hide();
							$("#post_cle").hide();
							$("#actMiampy").hide();
								
							jQuery.facebox({ ajax: '../alert/Logo.php' });
							$("#doc_perma").show();
							$("#info_juri").hide();
							
							$("#engPost").trigger('click');
							$("#engAct").trigger('click');
						}
					});
				} else {  
						jQuery.facebox({ ajax: '../alert/cazVid.php' });
				}
			});
		});
		
		
			function verif_NbrAction(){
				var NbrAction=$("#NbrAction").val();
				if (isNaN(NbrAction)){
					alert("veuillez entrer un nombre pour NOMBRE D'ACTIONS s'il vous plaît");
					$("#NbrAction").focus();
					$("#NbrAction").val("");
				
				}
				
			
			}
			function verif_CapSos(){
			
			var CapSos=$("#txtCapitSoc").val();
				 if (isNaN(CapSos)){
					$("#txtCapitSoc").focus();
					alert("veuillez entrer un nombre pour CAPITAL SOCIAL s'il vous plaît");
					
					$("#txtCapitSoc").val("");
					 
				}
			
			}
	
		</script>
	
