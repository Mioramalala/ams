<?php include '../connexion.php';
@session_start();

if (@$_SESSION["user"] AND @$_SESSION["mdp"])
{
$utilisateur=$_SESSION["user"];
$mdp=$_SESSION["mdp"];
}

	$sql="SELECT UTIL_ID,UTIL_NOM,UTIL_LOGIN,UTIL_ACTIF,UTIL_STATUT,UTIL_MDP FROM tab_utilisateur WHERE UTIL_MDP='".$mdp."'AND  UTIL_LOGIN='".$utilisateur."'";
		// echo $sql;
		$rep=$bdd->query($sql);
		$donnee=$rep->fetch();
			$nomU=$donnee['UTIL_NOM'];
			$logU=$donnee['UTIL_LOGIN'];
			$actif=$donnee['UTIL_ACTIF'];
			$statu=$donnee['UTIL_STATUT'];
			$mdp=$donnee['UTIL_MDP'];
			$id_utilisateur=$donnee['UTIL_ID'];
		
?>
<html>
	<head>
	
		<!--link rel="stylesheet" href="../css/css2.css"/-->		
		<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>		
		<link rel = "stylesheet" href = "../css/styleprofil.css"/>
		<link rel="stylesheet" href="../css/css.css"/>
		<link href="../facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
		<script src="../facebox/facebox.js" type="text/javascript"></script> 
		<style>
		
#upload_submit{
	margin-bottom:20px;
	color:#FFFFFF;
	padding-left:30px;
	background-color:#95cef2;
	border-radius:10px;
	cursor:pointer;
	padding-top:5px;
	width:50%;
	margin-left: 20%;
}

#upload_submit:hover{
	margin-bottom:20px;
	color:#FFFFFF;
	padding-left:30px;
	background-color:#FF6600;
	border-radius:10px;
	cursor:pointer;
}
#tr_download{
	position: absolute;
	left: -15%;
}
#save_{
	position: absolute;
	top: 131%;
    left: 49%;
	width: 20%;
    text-align: center;
}
#upload_final{
	position: absolute;
    top: 172%;
    left: 5%;
}
#upload_submit{
	position: absolute;
    top: 185%;
    left: -15%;
}
#liste_missions{
	position: absolute;
    top: 152%;
    left: 2%;
    width: 58%;
}
#annuler_{
	position: absolute;
	top: 155%;
    left: 72.5%;
}

		</style>
		<script>
			$(function(){
			
				///////////////////// espace mot de passe ///////////////////////////////
				$("#ChangePSW").click(function(){
				// //alert("test mdp");
					$(".clProf1").css("background-color","#0074bf");
					$("#EnrMdp").fadeIn(20);
					$("#txt1").fadeIn(10);
					$("#caz1").fadeIn(10);
					$("#txt").fadeIn(10);
					$("#caz").fadeIn(10);
					$("#txt2").fadeIn(10);
					$("#caz2").fadeIn(10);
					$("#cazMDP").fadeIn(10);
					$("#cloz").fadeIn(10);
					$("#NewMdp").val("");
					$("#ConfMdp").val("");
				});
				
				$("#x_img").click(function(){
					$("#EnrMdp").fadeOut(20);
					$("#txt1").fadeOut(10);
					$("#caz1").fadeOut(10);
					$("#txt").fadeOut(10);
					$("#caz").fadeOut(10);
					$("#txt2").fadeOut(10);
					$("#caz2").fadeOut(10);
					$(".clProf1").css("background-color","#fff");
				
				});
				
				
				$("#anuMdp").click(function(){
					parent.location = "accueil.php";
				});
				
				$("#EnrMdp").click(function(){
					var encien=$("#Enci1mdp").val();
					var nouveau=$("#NewMdp").val();
					var confirm=$("#ConfMdp").val();
						$.ajax({
							type:"POST",
							url:"profil/testMdp.php",
							data:{a:encien},
							success:function(e){
								if(e!=1)
								{
									jQuery.facebox({ ajax: '../alert/encientMdp.php' });
									$("#Enci1mdp").val("");
								
								}
								else 
								{
									if (nouveau!=""){
									if(  nouveau == confirm){
										$.ajax({
											type:"POST",
											url:"profil/modifMdp.php",
											data:{z:confirm,q:encien},
											success:function(r)
											{
												alert('Votre mot de passe a \351t\351 modifi\351 avec succ\350s! Veuillez vous reconnecter votre compte.');
												window.location.href='../logout.php';
											}
										});
									}
									else{
										jQuery.facebox({ ajax: '../alert/ReconMdp.php' });
										$("#ConfMdp").val("");
										$("#NewMdp").val("");
									}
									}
									else{
										jQuery.facebox({ ajax: '../alert/cazVid.php' });
									}
								}
							}
					
						});
			
				});
				
				///////////////// fin espace mot de passe ////////////////////////
					$("#Enregistrer").click(function(){
						var nom=$("#txtnom").val();
						var log=$("#txtlogin").val();
					
						$.ajax({
							type:"POST",
							url:"profil/modifProfil.php",
							data:{a:nom,b:log},
							success:function(e){
								jQuery.facebox({ ajax: '../alert/msg.php' });
								$("#txtnom").attr('readonly', true);
								$("#NomUser").load("userName.php");
							}
						});

					});
					
					$("#RetourId").click(function(){
						parent.location = "accueil.php";
					});
					
					$("#enreg_mission").click(function(){
						
						$.ajax({
							type:"POST",
							url:"../test_replication.php",
							
							success:function(e){
								alert(e);								
							}
						});
					
					});
					/*$("#td2_mission").click(function(){
						$("#div_profil").hide();
						$("#div_mission").show();
						
					});*/
					$("#td2_mission").on("hover",function(){
						$("#td1_mission").css("background-color","#0033FF");
						$("#td1_mission").css("color","#FFFFFF");
						$(this).css("background-color","#FFFFFF");
						$(this).css("color","#0000FF");
						$("#div_profil").hide();
						$("#div_mission").show();
						$("#img_1").attr("src","../icone/profil-inactif.png");
						$("#img_2").attr("src","../icone/mission-actif.png");
						detecte_connexion();
					});
					$("#td1_mission").on("hover",function(){
						$("#td2_mission").css("background-color","#0033FF");
						$("#td2_mission").css("color","#FFFFFF");
						$(this).css("background-color","#FFFFFF");
						$(this).css("color","#0000FF");
						$("#div_profil").show();
						$("#div_mission").hide();
						$("#img_1").attr("src","../icone/profil-actif.png");
						$("#img_2").attr("src","../icone/mission-inactif.png");
						
					});
					
					$("#td1_mission").click(function(){
						$("#div_profil").show();
						$("#div_mission").hide();
						$(this).css("background-color","#FFFFFF");
						$("#td2_mission").css("background-color","#0033FF");
						$("#td2_mission").css("color","#FFFFFF");
						$(this).css("color","#0000FF");
						
					});
					$("#td2_mission").click(function(){
						$("#div_profil").hide();
						$("#div_mission").show();
						$(this).css("background-color","#FFFFFF");
						$("#td1_mission").css("background-color","#0033FF");
						$("#td1_mission").css("color","#FFFFFF");
						$(this).css("color","#0000FF");
						
					});
					$("#tr_download").click(function(){
							if(confirm("êtes vous sur de vouloir enregistrer ?")){
								window.location.href="db_backup.php";
							}
									
					});
					$("#tr_upload").click(function(){
							$("#upload_final").click();
							if(confirm("voulez-vous vraiment importer ces données ?")){
								
								$("#frm_upload").submit();
								
							}
									
					});
					$("#save_").click(function(){
						$("#upload_local").click();
						
						if(confirm("voulez-vous vraiment importer ces données ?")){
								
								$("#frm_down").submit();
								
							}
					});
					$("#annuler_").click(function(){
						if(confirm("êtes vous sur de vouloir enregistrer ?")){
								//window.location.href="test_replication.php";
								window.location.href="fichier/save_mission/sauvegarde_mission.php?mission_id=" + 
								document.getElementById('liste_missions').value;
							}
					});
					
					//=================================================================================
					
						$("#openAchat").click(function(){
				$(this).hide();
				$("#CloseAchat").show();
				$("#list_achat").show();
			
			});	
			
			$("#CloseAchat").click(function(){
				$(this).hide();
				$("#openAchat").show();
				$("#list_achat").hide();
			
			});	
			
			$("#openImmo").click(function(){
				$(this).hide();
				$("#CloseImmo").show();
				$("#list_Immo").show();
			
			});
			$("#CloseImmo").click(function(){
				$(this).hide();
				$("#openImmo").show();
				$("#list_Immo").hide();
			
			});	
			$("#openStock").click(function(){
				$(this).hide();
				$("#list_Stock").show();
				$("#CloseStock").show();
				
			});
			
			$("#CloseStock").click(function(){
				$(this).hide();
				$("#openStock").show();
				$("#list_Stock").hide();
				
			});
			
			$("#openPaie").click(function(){
				$(this).hide();
				$("#list_Paie").show();
				$("#ClosePaie").show();
				
			});
			
			$("#ClosePaie").click(function(){
				$(this).hide();
				$("#openPaie").show();
				$("#list_Paie").hide();
				
			});
			$("#openTreso").click(function(){
				$(this).hide();
				$("#list_Treso").show();
				$("#CloseTreso").show();
				
			});
			
			$("#CloseTreso").click(function(){
				$(this).hide();
				$("#openTreso").show();
				$("#list_Treso").hide();
				
			});
			$("#openVentes").click(function(){
				$(this).hide();
				$("#list_Ventes").show();
				$("#CloseVentes").show();
				
			});
			
			$("#CloseVentes").click(function(){
				$(this).hide();
				$("#openVentes").show();
				$("#list_Ventes").hide();
				
			});
			$("#openEnv").click(function(){
				$(this).hide();
				$("#list_Env").show();
				$("#CloseEnv").show();
				
			});
			
			$("#CloseEnv").click(function(){
				$(this).hide();
				$("#openEnv").show();
				$("#list_Env").hide();
				
			});
			$("#openSystInfo").click(function(){
				$(this).hide();
				$("#list_SystInfo").show();
				$("#CloseSystInfo").show();
				
			});
			
			$("#CloseSystInfo").click(function(){
				$(this).hide();
				$("#openSystInfo").show();
				$("#list_SystInfo").hide();
				
			});
			$("#openFondProp").click(function(){
				$(this).hide();
				$("#list_FondProp").show();
				$("#CloseFondProp").show();
				
			});
			
			$("#CloseFondProp").click(function(){
				$(this).hide();
				$("#openFondProp").show();
				$("#list_FondProp").hide();
				
			});
			$("#openImpot").click(function(){
				$(this).hide();
				$("#list_Impot").show();
				$("#CloseImpot").show();
				
			});
			
			$("#CloseImpot").click(function(){
				$(this).hide();
				$("#openImpot").show();
				$("#list_Impot").hide();
				
			});
			
				$("#openEmpr").click(function(){
				$(this).hide();
				$("#list_Empr").show();
				$("#CloseEmpr").show();
				
			});
			
			$("#CloseEmpr").click(function(){
				$(this).hide();
				$("#openEmpr").show();
				$("#list_Empr").hide();
				
			});
			$("#openReport").click(function(){
				$(this).hide();
				$("#list_Report").show();
				$("#CloseReport").show();
				
			});
			
			$("#CloseReport").click(function(){
				$(this).hide();
				$("#openReport").show();
				$("#list_Report").hide();
				
			});
			});
			
			//*****************************************************************************************************
			
			function affiche_tache(str){
				var id_utilisateur="<?php echo $id_utilisateur;?>";
				var id_mission=str;
				//alert(id_utilisateur);
				//alert(id_mission);
				$.ajax({
							type:"POST",
							url:"profil/affiche_tache.php",
							data:{id_user:id_utilisateur,id_mission:id_mission},
							success:function(data){
								//alert(e);
								//alert("tonga");
								$("#affiche_tache").html(data);								
							}
						
				});
			}
			
			function detecte_connexion(){
				var connex="<?php echo $connex; ?>";
				if(connex==""){
					$("#tr_download").show();
					$("#tr_upload").show();
				}
				
				//alert(connex);
			}
		 </script>
	</head>
	
	<body >
		
		<div id = "cadreprofil1">
		
		<table id="tab_mission" width="100%" height="40px" bgcolor="#0033FF">
			<td id="td1_mission" align="center" style="color:#0000FF" bgcolor="#FFFFFF"><img id="img_1" src="../icone/profil-actif.png" /> profil</td>
			<td align="center" id="td2_mission" ><img id="img_2" src="../icone/mission-inactif.png" />missions</td>
			<td width=""></td>
		</table>
			<div id="div_profil">
			
			
			<b><label id="profilTitle">Profil utilisateur</label></b>
				<table id="Monprof">
						<tr>
							<td>Login:</td>
							<td class="clProf1bis"> <input type = "text" name = "txtlogin" value = "<?php echo $logU;?>" id = "txtlogin" readonly class="clProf"/> </td>
						</tr>
						
						<tr>
							<td width="200">Nom:</td>
							<td class="clProf1bis"><input type = "text" value = "<?php echo $nomU ;?>" id = "txtnom" readonly class="clProf"/> </td>
						</tr>
						<tr>
							<td width="200">Statut:</td>
							<td class="clProf1bis"><input type = "text" value = "<?php if($statu==0) echo'Auditeur'; elseif($statu==1)echo "Superviseur"; else echo"Administrateur";?>" id = "txtnom" readonly class="clProf"/> </td>
						</tr>
						<tr>
							<td >Mot de passe:</td>
							<td class="clProf1" ><input readonly type="password" id="Enci1mdp" value="<?php echo $mdp ;?>" class="clProf"/></td>
							<td > <p id="ChangePSW"> Modifier  </p> </td>				
						</tr>
						<tr>
							<td id="txt1" class="clProf1" style="display:none">Nouveau mot de passe</td>
							<td id="caz1"  style="display:none"><input type="password" id="NewMdp" class="clProf"/></td>
						</tr>
						<tr >
							<td id="txt"  style="display:none">Confirmation </td>
							<td id="caz"  style="display:none"><input type="password" id="ConfMdp" class="clProf"/></td>
						</tr>
						<tr>
							<td id="txt2"></td>
							<td id="caz2"  style="display:none"><div id="img_close"><img id="x_img" src="img/exit-retour.png"/></div></td>
						</tr>
			</table>
			
								<div id="cazMDP">
									
								  
								   	<p class="opProfil" id="anuMdp">Annuler</p>
									<p class="opProfil" id="EnrMdp" style="display:none;">Enregistrer</p>
																	
								</div>
	</div>
				<div id="div_mission" style="display:none">
					
						
						<b><label id="" style="color:#517FB2;font-size:21px">Liste des missions</label></b>
						<p>Ici vous pouvez consulter les missions qui vous sont assign&eacute;es</p>
				
							<?php
								require_once('../includes/liste_mission_chacun.php');
							?>
								<div id="mission_tab" >
									<div id="div_tache">
										<b><label style="color:#FFFFFF">Vos t&acirc;ches</label></b></br>
										<div id="affiche_tache">
																															
												
						
						<!-----------------------------------------tache------------------------------------------------>
									</div>
									<table style="padding-left:20%;padding-top:2%;" >
										<tr>
											<td><img src="../icone/synchronisation.png" /></td>
											<td style="font-size:12px;">Synchronisation des bases</td>
										</tr>
										<tr><td colspan="2" style="font-size:12px;"><p>Sauvegarde offline et mise en ligne de votre base</p></td></tr>
									</table>
									<div id="tr_download" >
										<img src="../icone/download.png" />
										Sauver en local									
									</div>
									<span id="save_">Importer</span><br/>
									
									<select id="liste_missions" style="margin : 10px;">
										<?php
											$reponse = $bdd->query("SELECT MISSION_ID, tab_entreprise.ENTREPRISE_DENOMINATION_SOCIAL AS ENTREPRISE_DENOMINATION, MISSION_TYPE
																	FROM tab_mission LEFT JOIN tab_entreprise ON tab_entreprise.ENTREPRISE_ID = tab_mission.ENTREPRISE_ID");

											while($donnee = $reponse->fetch()) {
										?>
											<option value="<?php echo $donnee['MISSION_ID']; ?>">
												<?php echo $donnee['ENTREPRISE_DENOMINATION'].' '.$donnee['MISSION_TYPE']; ?>
											</option>
										<?php
											}
										?>
									</select>
									<span id="annuler_" >Sauvegarder</span>
									
									<form action="http://41.188.17.140/import_final.php" method="post" enctype="multipart/form-data"  id="+++++" >
										<input type="file" name="fichier_final" id="upload_final"/><br />
										<button id="upload_submit" type="submit"><img src="../icone/upload.png" />Mettre en ligne</button>
									</form>	
									<!-- <div id="tr_upload">							
									</div>-->			
									
									
												
									<form id="frm_down" action="fichierUpload.php" method="post" enctype="multipart/form-data" style="visibility:hidden" >
										<input type="file" name="fichier"  id="upload_local"/><br />
										<input type="submit" value="Importer la mission sur le local" />
									</form>	
								</div>
				</div>
			</div>	
	</body>
</html>