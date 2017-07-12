<html>
	<head>
		<link rel = "stylesheet" href = "../css/styleNewUser.css"/>
		<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
		<link href="../facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
		<script src="../facebox/facebox.js" type="text/javascript"></script> 
		<script>
		
			function mtovmdp(){
				var mdp=$("#mdpUtil").val();
				var confmdp=$("#confmdp").val();

				if(mdp!=confmdp){
					jQuery.facebox({ ajax: '../alert/TestMdp.php' });
					$("#mdpUtil").val("");
					$("#confmdp").val("");
				}
			}
			function testmail(){
				var nom = $("#LoginUtil").val();
				var email = /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test(nom);
				
				if(email) return true;
				else return false;
			}	
			function radier(a){
			
			//$("#LoginUtil").readonly()=true;
				var rad=a;
				// alert(rad);
				if(rad){
				// alert (rad);
					$.ajax({
						type:"post",
						url:"profil/PostModifUser.php",
						data:{id:rad},
						success:function(e){
							$("#modifier").html(e);
							ModifierUser();
						}
					});
				}
				else{
					jQuery.facebox({ ajax: '../alert/fairSel.php' });
				}
			}
			
			function ModifierUser(){
					$("#titreUser2").hide();
					$("#titreUser3").show();
					var nom=$("#nomM").val();
					var log=$("#logM").val();
					var act=$("#actifM").val();
					var sta=$("#statuM").val();
					var mdp=$("#mdpM").val();
					if(nom){
						//alert(sta);
						$("#nomUtil").val(nom);
						$("#LoginUtil").val(log);
						$("#Actif").val(act);
						$("#statUtil").val(sta);
						$("#mdpUtil").val(mdp);
						
						
						//alert(nom);
						$("#engNewUtil").hide();
						$("#btnSavMod").show();
						
					}
					else{
							jQuery.facebox({ ajax: '../alert/fairSel.php' });
					}
				}
			
			
			
			
			$(function(){
				jQuery(document).ready(function($) {
					 $('a[rel*=facebox]').facebox();
				}) ;
				
			//////////////////////////////////////test mail//////////////////////////////////////////	
				
			/////////////////////////////////////////////////////////////////////////////////////////
				$("#engNewUtil").click(function(){
					var nom=$("#nomUtil").val();
					var login=$("#LoginUtil").val();
					var mdp=$("#mdpUtil").val();
					var status=$("#statUtil").val();
					var actif=$("#Actif").val();
					/////////////test mail//////////////////////
					var testTrueMail = testmail();
					if(testTrueMail){
					//////////////////////////////////////////
					// alert(nom+login+status);
						if(login=="" || mdp==""){
							// alert("veuillez remplire toutes les cases!!!");
							jQuery.facebox({ ajax: '../alert/cazVid.php' });
						}
						else{	
							$.ajax({
								type:"POST",
								url:"profil/saveUtil.php",
								data:{a:nom,b:login,c:mdp,d:status,e:actif},
								success:function(n){
								alert("mail send");
									//alert("l'utilisateur a bien été enregistrer");
									jQuery.facebox({ ajax: '../alert/engUtil.php' });
									$("#nomUtil").val("");
									$("#LoginUtil").val("");
									$("#mdpUtil").val("");
									$("#confmdp").val("");
									$("#statUtil").val("");
									$("#pllist").load("profil/pllist2.php");
								}
							});
						}
					}
					else jQuery.facebox({ ajax: '../alert/TestMail.php' });
				});
				
			
				
				$("#AnnulUtil").click(function(){
							$('#titreUser3').hide()
							$('#titreUser2').show();
							$("#btnSavMod").hide();
							$("#engNewUtil").show();
							$("#nomUtil").val("");
							$("#LoginUtil").val("");
							$("#mdpUtil").val("");		
				});
				$("#btnSavMod").click(function(){
					var nomM=$("#nomUtil").val();
					var logM=$("#LoginUtil").val();
					var mdpM=$("#mdpUtil").val();
					var Confmdp=$("#confmdp").val();
					var statM=$("#statUtil").val();
					var actifM=$("#Actif").val();
					var userM=$("#iduser").val();
					
					var testTrueMail = testmail();
					if(testTrueMail){// Si le mail est valide
						if(mdpM == Confmdp){
							$.ajax({
								type:"POST",
								url:"profil/ModifierUtil.php",
								data:{a:nomM,z:logM,e:mdpM,r:statM,t:actifM,id:userM},
								success:function(e){
									//alert(e);
									jQuery.facebox({ ajax: '../alert/engUtilMod.php' });
									$("#pllist").load("profil/pllist2.php");
									$("#nomUtil").val("");
									$("#LoginUtil").val("");
									$("#mdpUtil").val("");
									$("#confmdp").val("");
									$("#btnSavMod").fadeOut(500);
									$("#engNewUtil").fadeIn(500);
								}
							});
						}
						else{
							jQuery.facebox({ ajax: '../alert/ReconMdp.php' });
						
							$("#confmdp").val("");
						}
					}
					else jQuery.facebox({ ajax: '../alert/TestMail.php' });
				});
				//alert("fghfg1");
				$(document).on("click","#fermer",function(){
					//alert("azer");
					parent.location = "../accueil.php";
				});
			});
			// function select1(idtr,cpt){
				// var idrqdio="radio"+cpt;
			// }
			
			
				// $("#ModifierUser").click(function(){
				
				function decon(id_user,nom){
				
					if(confirm("Voulez vouz déconnecter "+nom+" ?")){
					
					$.ajax({
						type:'post',
						url:'profil/decon_user.php',
						data:{id:id_user},
						success:function(e){
							$("#pllist").html(e);
						}
					
					});
					}
				}
				
			
		</script>
	</head>
	<body>
		
		
		<div id="cadreUtilisateur">	
		<img src="../img/exit-retour.png" id="fermer" class="boutonFerme" title="Fermer"/>
			<div id="listUtil">
				<div id="titreUser">Utilisateurs</div>
				<table style="width:875px;background-color:#007FFF;box-shadow:2px 10px 10px #ccc;">
					<tr style="height:30px;font-size: 10pt;font-weight: bold;">
						<td style="width:350px;"><label style="color:white;">Nom</label></td>
						<td width="250px"><label style="color:white;">Login</label></td>
						<td width="150px"><label style="color:white;">Statut</label></td>
						<td width="200px"><label style="color:white;">Mot de passe</label></td>
						<td width="150px"><label style="color:white;">Etat</label></td>
						<td width="80px"></td>
					</tr>
				</table>
				<div id="pllist">
					<table id="listUser">
						<?php
							include '../connexion.php';
							$sql="SELECT UTIL_ID,UTIL_NOM,UTIL_LOGIN,UTIL_ACTIF,UTIL_STATUT,UTIL_MDP,STATUT_CONNEXION FROM   tab_utilisateur order by UTIL_NOM ASC ";
								$rep=$bdd->query($sql);
								$compt=0;
								while($donnee=$rep->fetch()){
									$idUtil=$donnee['UTIL_ID'];
									$nomU=$donnee['UTIL_NOM'];
									$logU=$donnee['UTIL_LOGIN'];
									$actif=$donnee['UTIL_ACTIF'];
									$statu=$donnee['UTIL_STATUT'];
									$mdp=$donnee['UTIL_MDP'];
									$connex=$donnee['STATUT_CONNEXION'];
						?>
									<tr height="50px" id="ligne<?php echo $compt;?>"  onclick="radier(<?php echo $idUtil;?>)">
										<td width="250px">
											<!--input type="radio" id="radio<?php// echo $compt;?>" name="rdname" value="<?php// echo $idUtil?>" /-->
											<?php echo $nomU ;?>
										</td>
										<td width="200px"><?php echo $logU; ?></td>
										
										<?php
											if($actif=="Actif"){
										?>
												<td width="100px" style="color:#12c300;"><?php echo $actif ;?></td>
										<?php
											}
											else{
										?>
												<td width="100px" style="color:red;"><?php echo $actif ;?></td>
										<?php
											}
										?>
										<td width="150px"><?php echo $mdp ;?></td>
										<?php 
											if($connex=="0"){
										?>
											<td width="150px" style="color:red;"> <?php echo "Hors ligne";?></td>
										<?php }
										else{
										?>
											<td width="150px" style="color:#12c300;"><?php echo "Connecté";?> </td>
										<?php } ?>
										
										<td> <img src="icone/btn_power.png" class="deconUser" alt="<?php echo $idUtil;?>" title="Déconnecter" onclick="decon(<?php echo $idUtil;?>,'<?php echo $nomU;?>')"/> </td>
									</tr>
						<?php	
									$compt++;
								}
				
						?>
					</table>
				</div>
			</div>
			<br/>
			<div id="nouvelUser">
				<div id="titreUser2">Nouvel utilisateur</div>
				<div id="titreUser3" style="display:none;">Modification</div>
				<table id="tblUtilisateur">
					<tr>
						<td><label class="nouvUser" placeholder="exemple@xyz.com">Login</label> </td>
						<td><input type="text" id="LoginUtil" placeholder="exemple@xyz.com"/></td>
						
						<td><label class="nouvUser">Mot de passe</label> </td>
						<td><input type="password" id="mdpUtil" placeholder="*******"/></td>
						
						<td><input type="button" value="Ajouter" id="engNewUtil"/>
						<input type="button" value="Enregistrer" id="btnSavMod" style="display:none;"/>
						</td>
					</tr>
		
					<tr>
						<td><label class="nouvUser">Nom</label> </td>
						<td><input type="text" id="nomUtil" placeholder="Votre nom et prénom(s)"/></td>
						
						<td><label class="nouvUser">Confirmation Mdp</label> </td>
						<td><input type="password" id="confmdp"  placeholder="*******"/></td>
						<td><input type="button" value="Annuler" id="AnnulUtil" style="float:left;"/></td>
					</tr>
					<tr>
						<td><label class="nouvUser"></label></td>
						<td>
							<div class="hide_select" style="display:none;">
								<select id="statUtil" onchange="mtovmdp()">
									<option class="nouvUser" value="0">Auditeur</option>
									<option class="nouvUser" value="1">Superviseur</option>
									<option class="nouvUser" value="2">Administrateur</option>
								</select>
							</div>
						</td>
					
						<td><label class="nouvUser">Statut</label></td>
						<td>
							<div class="hide_select">
								<select id="Actif">
									<option class="nouvUser" value="Actif" > Actif</option>
									<option class="nouvUser" value="Non actif"> Non actif</option>
								</select>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div id="modifier" style="display:none">
		</div>
	</body>
</html>