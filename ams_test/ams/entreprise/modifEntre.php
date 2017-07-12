<?php 	

	// Droit d'utilisateur (autorisé seulement aux administrateurs) by Niaina
	@session_start();
	$userName=$_SESSION["nom"];

	if ($userName != "Administrateur" && $userName != "Super-Admin") 
	{
	?>
			<script>
			   $(".ModCaz1 input").not("#Sortir").attr('disabled','disabled');
                alert("Vous n'avez pas le droit de modifier les données d'une entreprise");
                //window.location.href="../accueil.php";
            </script>
	<?php
	}
	// Fin Droit d'utilisateur

?>



<html>

	<head>

		<title>Modification entreprise</title>

		<meta charset="utf-8"/>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<link rel="stylesheet" href="css/css.css"/>

		<link rel="stylesheet" href="css/cssEntreprise.css"/>

		<script type="text/javascript" src="js/jquery-1.7.2.js"></script>

		<link href="../facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>

		<script src="../facebox/facebox.js" type="text/javascript"></script>

		<link rel="stylesheet" href="../fancybox/jquery.fancybox.css"></script>

		<!--<script type="text/javascript" src="../fancybox/jquery.fancybox.pack.js"></script>-->

		

		<script>

		//chargement de l'image dans le cadre		

		

		function submit_form(){

			

		}

		

		////////////////////////////////////////////function pour la modification d'une poste//////////////////////////////////////////////

		function modPost(){

			var radPost=$("#list_poste").find("tr input:checked").attr("value");

			var idEntre= $("#idEntre").val();

			if(radPost){

			

				$.ajax({

					type:"POST",

					url:"entreprise/ModifPoste.php",

					data:{a:radPost,b:idEntre},

					success:function(e){

						$("#modifPostNone").html(e);

						//$("a.clAct").fancybox();

					}

				});

			}

		}

		////////////////////////////////////////////function pour la modification d'un actionnaire//////////////////////////////////////////////

			function modIf(){

				var radAct=$("#tblListAct").find("tr input:checked").attr("value");

				var idEntre= $("#idEntre").val();

				if(radAct){

				

				$.ajax({

				type:"POST",

				url:"entreprise/ModifAct.php",

				data:{a:radAct,b:idEntre},

				success:function(e){

					$("#modifActNone").html(e);

					//$("a.clAct").fancybox();

				}

				});

				

				}

				else{

					jQuery.facebox({ ajax: '../alert/fairSel.php' });

				

				}

			}

			

			$(function(){

			

				jQuery(document).ready(function($) {

				  $('a[rel*=facebox]').facebox();

				}) ;

				

				$("#ajjAct").click(function(){

					$("#newNomAct").val("");

					$("#newPart").val("");

					$("#newPourC").val("");

				

					$("a.clAct").fancybox();

				});

				

				$("#ModifAct").click(function(){

					var radactM=$("#tblListAct").find("tr input:checked").attr("value");

					

					var nom=$("#ModNomAct").val();

					

					//alert (radactM);

					if(radactM!=undefined){

						

						$("a.clAct").fancybox();

					}

					else{

					// alert("alert");

					//$.facebox.close();

						jQuery.facebox({ ajax: '../alert/fairSel.php' });

					}

				});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				$("#ModifPoste").click(function(){

					var radP=$("#list_poste").find("tr input:checked").attr("value");

				

					var nomP=$("#ModNomPost").val();

					

					if(radP && nomP){

							$("a.clPoste").fancybox();

					

					}

					else{

						jQuery.facebox({ ajax: '../alert/fairSel.php' });

					}

				});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				

				$("#suppAct").click(function(){

					var radActSup=$("#tblListAct").find("tr input:checked").attr("value");

					if(radActSup){

						$("a.clAct").fancybox();

					}

					else

					{

						jQuery.facebox({ ajax: '../alert/fairSel.php' });

					}

				});

				

				

				$("#AjjPost").click(function(){

					$("#newNomPst").val("");

					$("#Titulaire").val("");

					$("a.clPoste").fancybox();

				});

				

				

			

				$("#EnrModEntr").click(function(){

					var idEntre= $("#idEntre").val();

					var denomSos= $("#txtDenom").val();

					var adress=$("#txtAdr").val();

					var StatuJur=$("#txtStatJur").val();

					var Contact=$("#txtTel").val();

					var CapSos=$("#txtCapSos").val();

					var RC=$("#txtRegCom").val();

					var NumStat=$("#txtStat").val();

					var Mail=$("#txtEmail").val();

					var NIF=$("#txtNif").val();

					var Code=$("#txtCode").val();

					var SectAct=$("#SectActiv").val();

					var dateCrea=$("#txtDateCre").val();

					var DurSociete=$("#txtDurSos").val();

					var Activite=$("#txtAct").val();

					var NbrSal=$("#txtNbrSal").val();

					var ExoComp=$("#txtExoComp").val();

					var ValStock=$("#txtValStock").val();

					var Site=$("#txtSiteWeb").val();

					var NbrAction=$("#NbrAction").val();

					var ValNom=$("#ValNomnal").val();

					//var NbrActNair=$("#NbrActionnair").val();

					//alert(ValNom);

					$.ajax({

					type:"POST",

					url:"entreprise/PostModEntr.php",

					data:{id:idEntre,a:denomSos,z:adress,e:StatuJur,r:Contact,t:CapSos,y:RC,u:NumStat,i:Mail,o:NIF,p:Code,q:SectAct,s:dateCrea,d:DurSociete,

					f:Activite,g:NbrSal,h:ExoComp,j:ValStock,k:Site,l:NbrAction,m:ValNom},

					success:function(w){

						if(w)

						{

						//alert('ok');

						jQuery.facebox({ ajax: '../alert/EnrEntrModifOk.php' });

						

						}

						

					}

					});

					

				});

				/////////////////////////////////////////////////////////////////////////////////

				$("#ouiSup").click(function(){

				

					var radActS=$("#tblListAct").find("tr input:checked").attr("value");

					var idEntre= $("#idEntre").val();

					//alert (rad);

					

					 $.ajax({

						type:"POST",

						url:"entreprise/supAct.php",

						data:{a:radActS,b:idEntre},

						success:function(e)

						{

							jQuery.facebox({ ajax: '../alert/supOk.php' });

							$("#infoAct").html(e);

							$.fancybox.close();

						}

					});

				});



				$("#nonSup").click(function(){

					$.fancybox.close();

				});

				////////////////////////////////////////////////////////////////////////////////////////////////

				$("#SupPoste").click(function(){

					var radPostS=$("#list_poste").find("tr input:checked").attr("value");

					if(radPostS){

					$("a.clPoste").fancybox();

					/***************************************************************/

					}

					else{

						jQuery.facebox({ ajax: '../alert/fairSel.php' });

					}				

				});



				$("#nonSupP").click(function(){

					$.fancybox.close();

				});

				

				

				$("#ouiSupP").click(function(){

					var radPostSu=$("#list_poste").find("tr input:checked").attr("value");

					var idEntre= $("#idEntre").val();

					//alert(rad +' on sup dans '+idEntre);

					if(radPostSu)

					{

						$.ajax({

							type:"POST",

							url:"entreprise/supPost.php",

							data:{a:radPostSu,b:idEntre},

							success:function(e)

							{

							jQuery.facebox({ ajax: '../alert/supOk.php' });

								$("#infopost").html(e);

								$.fancybox.close();

								

							}

			

						});

					

					}

					

				});

				

				///////////////////////////////////////////////////////////////////////////////////////////////

					

				///////////////////////////////////////////////////////////////////////////////////////////////

				$("#Sortir").click(function(){

					// parent.location = "accueil.php";

					s= $('#idEntreprise').text();

					$.ajax({

						type:"POST",

						url:"entreprise/viewEntreprise.php",

						data:{a:s},

						success:function(e){

						  $("#Acc").html(e);

						}

					});

				});

				

				$("#enrNewAct").click(function(){

					var nomAct=$("#newNomAct").val();

					var partAct=$("#newPart").val();

					

					var idEntre=$("#idEntre").val();

					// alert(nom+part+idEntre);

					if(nomAct!='' && partAct!=''){

					$.ajax({

						type:"POST",

						url:"entreprise/NewAct.php",

						data:{a:nomAct,b:partAct,d:idEntre},

						success:function(e){

							

							jQuery.facebox({ ajax: '../alert/ActOk.php' });

							$.fancybox.close();

							$("#infoAct").html(e);

							// $('.tblListAct').attr('checked',false);

						}

					

					});

					}

					else {

						jQuery.facebox({ ajax: '../alert/cazVid.php' });

						$.fancybox.close();

						}

				});

				

				$("#enrNewPoste").click(function(){

					// alert("aaa");

					var postN=$("#newNomPst").val();

					var titulaireN=$("#Titulaire").val();

					var idEntre=$("#idEntre").val();

				

					if(postN && titulaireN)

					{

						$.ajax({

							type:"POST",

							url:"entreprise/NewPoste.php",

							data:{a:postN,b:titulaireN,c:idEntre},

							success:function(e){

								jQuery.facebox({ ajax: '../alert/PosteOk.php' });

								$.fancybox.close();

								$("#infopost").html(e);

							}

						

						});

									

					}

					else 

					{

						jQuery.facebox({ ajax: '../alert/cazVid.php' });

						$.fancybox.close();

					}

				

				});

			

			});

			

			

		</script>

	</head>

	<body>



		<?php 

		

		include '../connexion.php';

		$idEntre=$_POST["a"];

		$idUser=$_SESSION["id"];

		// echo $idEntre.' w '.$idUser;



		$sqlListEntreprise='SELECT ENTREPRISE_DENOMINATION_SOCIAL,

				ENTREPRISE_CONTACT,ENTREPRISE_CAPITAL_SOCIAL,ENTREPRISE_NIF,

				ENTREPRISE_STAT,ENTREPRISE_REG_COM, ENTREPRISE_RAISON_SOCIAL,ENTREPRISE_ADRESSE,ENTREPRISE_MAIL,

				ENTREPRISE_CODE,ENTREPRISE_SECTEUR_ACTIVITE,ENTREPRISE_DATE_CREATION,

				ENTREPRISE_DURE_SOCIETE,ENTREPRISE_ACTIVITE,ENTREPRISE_NOMBRE_SALARIE,ENTREPRISE_EXO_COMPTABLE,ENTREPRISE_VALORISATION_STOCK,

				ENTREPRISE_SITE_INTERNET,ENTREPRISE_NOMBRE_ACTION,ENTREPRISE_VALEUR_NOMINAL,ENTREPRISE_NBR_ACTIONNAIR

				FROM  tab_entreprise WHERE ENTREPRISE_ID='.$idEntre;

					

				 $reponseList=$bdd->query($sqlListEntreprise);

				 while($donnee_list=$reponseList->fetch()){

				 

				 $denom=$donnee_list['ENTREPRISE_DENOMINATION_SOCIAL'];

				 $Contact=$donnee_list['ENTREPRISE_CONTACT'];

				 $CapSos=$donnee_list['ENTREPRISE_CAPITAL_SOCIAL'];

				 $RC=$donnee_list['ENTREPRISE_REG_COM'];

				 $Nif=$donnee_list['ENTREPRISE_NIF'];

				 $Stat=$donnee_list['ENTREPRISE_STAT'];

				 $RaisonSos=$donnee_list['ENTREPRISE_RAISON_SOCIAL'];

				 $Adress=$donnee_list['ENTREPRISE_ADRESSE'];

				 $Mail=$donnee_list['ENTREPRISE_MAIL'];

				 $Code=$donnee_list['ENTREPRISE_CODE'];

				 $SectActiv=$donnee_list['ENTREPRISE_SECTEUR_ACTIVITE'];

				 $dateCreat=$donnee_list['ENTREPRISE_DATE_CREATION'];

				 $DureSoc=$donnee_list['ENTREPRISE_DURE_SOCIETE'];

				 $Activite=$donnee_list['ENTREPRISE_ACTIVITE'];

				 $ExoComp=$donnee_list['ENTREPRISE_EXO_COMPTABLE'];

				 $ValStock=$donnee_list['ENTREPRISE_VALORISATION_STOCK'];

				 $NbrAction=$donnee_list['ENTREPRISE_NOMBRE_ACTION'];

				 $NbrSal=$donnee_list['ENTREPRISE_NOMBRE_SALARIE'];

				 $SitWeb=$donnee_list['ENTREPRISE_SITE_INTERNET'];

				 $ValNom=$donnee_list['ENTREPRISE_VALEUR_NOMINAL'];

				 $NbrActionnair=$donnee_list['ENTREPRISE_NBR_ACTIONNAIR'];

			 

				 }

				 





			

		?>

		<center>

		<div id="Modifiction_Entr">

			<div class="ModCaz1">

				<h3>Modification de l'entreprise <?php echo $denom;?></h3>

				<div id='infoG'>

					

					<table id="tblInfG">

						<tr>

							<td>Dénomination sociale</td>

							<td><input type="text" id="txtDenom" value="<?php echo $denom;?>" readonly/></td>	

							<td> Code entreprise</td>

							<td><input type="text" id="txtCode" value="<?php echo $Code;?>" readonly/></td>

						</tr>

						<tr>

							<td> Statut juridique</td>

							<td><input type="text" id="txtStatJur" value="<?php echo $RaisonSos;?>"/></td>

							<td>Date de création</td>

							<td><input type="text" id="txtDateCre" value="<?php echo $dateCreat;?>"/></td>

						</tr>

						<tr>

							<td> Capital social</td>

							<td><input type="text" id="txtCapSos" value="<?php echo $CapSos;?>"/></td>

							<td>Durée de la société</td>

							<td><input type="text" id="txtDurSos" value="<?php echo $DureSoc;?>"/></td>

						</tr>

						<tr>

							<td> Identification fiscale</td>

							<td><input type="text" id="txtNif" value="<?php echo $Nif;?>"/></td>	

							<td>Secteur d'activité</td>

							<td><input type="text" id="SectActiv" value="<?php echo $SectActiv;?>"/></td>

						</tr>

						<tr>

							<td>Numéro Statistique</td>

							<td><input type="text" id="txtStat" value="<?php echo $Stat;?>"/></td>

							<td>Activité</td>

							<td><input type="text" id="txtAct" value="<?php echo $Activite;?>"/></td>

						</tr>

						<tr>

							<td>Registre du Commerce</td>

							<td><input type="text" id="txtRegCom" value="<?php echo $RC;?>"/></td>

							<td> Nombre de salariés</td>

							<td><input type="text" id="txtNbrSal" value="<?php echo $NbrSal;?>"/></td>

						</tr>

						<tr>

							<td>Adresse</td>

							<td><input type="text" id="txtAdr" value="<?php echo $Adress;?>"/></td>

							<td>Exercice Comptable</td>

							<td><input type="text" id="txtExoComp" value="<?php echo $ExoComp;?>"/></td>

						</tr>

						<tr>

							<td>Téléphone</td>

							<td><input type="text" id="txtTel" value="<?php echo $Contact;?>"/></td>

							<td>Valorisation de stock</td>

							<td><input type="text" id="txtValStock" value="<?php echo $ValStock;?>"/></td>

						</tr>

						<tr>

							<td>E-mail</td>

							<td><input type="text" id="txtEmail" value="<?php echo $Mail;?>"/></td>

							<td>Site internet</td>

							<td><input type="text" id="txtSiteWeb" value="<?php echo $SitWeb;?>"/></td>

						</tr>

						<tr>

							<td>Nombre action</td>

							<td><input type="text" id="NbrAction" value="<?php echo $NbrAction;?>"/></td>

							<td>Valeur nominale</td>

							<td><input type="text" id="ValNomnal" value="<?php echo $ValNom;?>"/></td>

						</tr>

					</table>

				</div>

				<div id="btnMod">

					<input type="button" value="Enregistrer modifications" id="EnrModEntr"/>

					<input type="button" value="Sortir" id="Sortir"/>

				</div>	

			</div>

			

			<div class="ModCaz1">	

				<div id="infoAct">

				<h3> Liste des actionnaires </h3><input type="text" id="idEntre" value="<?php echo $idEntre;?>" style="display:none;"/>

				<table id="tblListAct">	

						<tr style="background-color:#B0C4DE">

							<td> </td>

							<td> <h4>Noms</h4></td>

							<td> <h4>Parts</h4></td>

							<td> <h4><center> % </center></h4></td>

						</tr>

						<?php 

						///////////////////////////////////////////////////////////////////////////////////////

					$sqlP='SELECT ACTIONNAIRE_PART FROM  tab_actionnaire WHERE ENTREPRISE_ID='.$idEntre;

					 

					 $reponse=$bdd->query($sqlP);

					 $totPart=0;

					 $poucenrage=0;

					 while($d=$reponse->fetch()){

						$partAc=$d["ACTIONNAIRE_PART"];

						$totPart=$totPart+$partAc;

					

					}	

						

						//////////////////////////////////////////////////////////////////////////////////////

						?>

				<?php

					$sqlNbrAct='SELECT COUNT(ACTIONNAIRE_ID) AS nbrAct FROM  tab_actionnaire WHERE ENTREPRISE_ID='.$idEntre;

					 $reponseNbrAct=$bdd->query($sqlNbrAct);

					 $donneeNbr=$reponseNbrAct->fetch();

					 $nbrAct = $donneeNbr["nbrAct"];

				

					 $sqlListAct='SELECT ACTIONNAIRE_ID,ACTIONNAIRE_NOM,ACTIONNAIRE_PART FROM  tab_actionnaire WHERE ENTREPRISE_ID='.$idEntre;

					 

					 $reponseAct=$bdd->query($sqlListAct);

					

					 $comp=0;

					 while($donneeAct=$reponseAct->fetch()){

						$IdAc=$donneeAct["ACTIONNAIRE_ID"];

						$nomAc=$donneeAct["ACTIONNAIRE_NOM"];

						$partAc=$donneeAct["ACTIONNAIRE_PART"];

						

					

				?>

					

						<tr>

							<td><input type="radio" id="radio<?php echo $comp;?>" name="rdName" value="<?php echo $IdAc;?>" onChange="modIf()"/></td>

							<td><?php echo $nomAc;?> </td>

							<td><?php echo $partAc;?></td>

							<td><?php 

								

								$poucenrage=($partAc*100)/$totPart;

								

								 echo substr($poucenrage,0,5);

							?></td>

						</tr>

					

				<?php

				$comp++;

				}

				?>

				<h4 style="color:#fff;"><?php

				// amboarina condition de assina effet raha ts @lony; jquery no anaovana azy atao .css//

			

				echo 'Le nombre total des part est: '.$totPart;

				

				?></h4>

				</table>

				</div>

				<p><a href="#newAct" class="clAct" id="ajjAct"><input type="button" value="Ajouter actionnaire"/></a>

				<a href="#modifActNone" class="clAct" id="ModifAct"><input type="button" value="Modifier actionnaire"/></a>

				<a href="#sup_ok" class="clAct" id="suppAct"><input type="button" value="Supprimer actionnaire"/></p></a>

				

				

				

				

				<input type="text" value="<?php echo $nbrAct;?>" id="nbrAct" style="display:none;"/>

			

			</div>	

			<div class="ModCaz1">	

				<div id="infopost">

					<h3>Liste des postes clés de l'entreprise</h3>

					

				<table id="list_poste">	

							<tr style="background-color:#B0C4DE">

								<td></td>

								<td><h4> Poste</h4></td>

								<td><h4> Titulaire</h4> </td>

							</tr>

							

					<?php

						$sqlNbrPo='SELECT COUNT(POSTE_CLE_ID) AS nbrPost FROM  tab_poste_cle WHERE ENTREPRISE_ID='.$idEntre;

						 $reponseNbrPo=$bdd->query($sqlNbrPo);

						 $donneeNbr=$reponseNbrPo->fetch();

						 $nbrPo = $donneeNbr["nbrPost"];

					

						 $sqlListP='SELECT POSTE_CLE_ID,POSTE_CLE_NOM,POSTE_CLE_TITULAIRE FROM  tab_poste_cle WHERE ENTREPRISE_ID='.$idEntre;

						 

						 $reponseP=$bdd->query($sqlListP);

						 $comp2=0;

						 while($donneeP=$reponseP->fetch()){

							$idposte=$donneeP["POSTE_CLE_ID"];

							$nomP=$donneeP["POSTE_CLE_NOM"];

							$Tit=$donneeP["POSTE_CLE_TITULAIRE"];

					?>

							<tr>

								<td><input type="radio" id="radio<?php echo $comp2;?>" name="rdName" value="<?php echo $idposte;?>" onChange="modPost()"/></td>

								<td><?php echo $nomP;?> </td>

								<td><?php echo $Tit;?> </td>

							</tr>

					<?php

						$comp2++;

					}

					?>

				</table>

				</div>

					<p>

						<a href="#newPoste" class="clPoste"id="AjjPost" ><input type="button" value="Ajouter poste" /></a>

						<a href="#modifPostNone" class="clPoste" id="ModifPoste"> <input type="button" value="Modifier poste"/></a>

						<a href="#supP_ok" class="clPoste" id="SupPoste"><input type="button" value="Supprimer poste" /></a>

					</p>

			</div>	

			

		<!--	INSERTION MODIFICATION LOGO ET DOCUMENTS PERMANENTS-->

			<div class="ModCaz1">	

				<div id="div_">

					<h3>Insertion/modification du LOGO et des DOCUMENTS PERMANENTS</h3>

					<div>

						

							<iframe src="./entreprise/iframe_logo.php?identreprise=<?php echo $idEntre; ?>" width="300" height="150" />

								

					</div>

					<div>

						<table>

							<tr>

								

								<td>
									<center>
										<iframe src="./entreprise/formUpload2.php" width="320" height="320" />
									</center>
									

								</td>

							</tr>

							

						</table>

						

					</div>

						</div>

			</div>	

		</div>

		<!---------------------------------modification LOGO------------------------------------->

			

	</center>

	

	<!-------------------------------------new actionnaire------------------------------------------------>

		<div id="newAct" style="display:none;">

			<table>

				<th colspan="2">Nouvel actionnaire</th>

				<tr>

					<td> Nom et prénom</td>

					<td><input type="text" id="newNomAct"></td>

				</tr>

				<tr>

					<td> Part</td>

					<td><input type="text" id="newPart"></td>

				</tr>

				

				<tr>

					<td><input type="button" value="Enregistrer" id="enrNewAct"></td>

				</tr>

			</table>

		</div>

		

		<!--------------------------------modification actionnaire----------------------------------------->

		<div id="modifActNone" style="display:none;">

			

			

		</div>

		<!------------------------------------modif poste----------------------------------------->

		<div id="modifPostNone" style="display:none;">

	

	

		</div>

		<!---------------------------------------new poste------------------------------------------------>

		<div id="newPoste" style="display:none;">

			<table>

				<th colspan="2">Nouveau poste</th>

				<tr>

					<td> Nom poste</td>

					<td><input type="text" id="newNomPst"></td>

				</tr>

				<tr>

					<td> Titulaire</td>

					<td><input type="text" id="Titulaire"></td>

				</tr>

				<tr>

					<td><input type="button" value="Enregistrer" id="enrNewPoste"></td>

				</tr>

			</table>

		

		</div>

		

		<!-----------------------------alert sup actionnaire--------------------------------->

			<div id="sup_ok" style="display:none;">

				<p> Etes-vous sûr de vouloir supprimer cette actionnaire ?</p>

				<p><center><input type="button" value="Oui" id="ouiSup"/><input type="button" value="Non" id="nonSup"/></center></p>

		

			</div>

			

			<!---------------------------------alert sup Poste------------------------------------->

			<div id="supP_ok" style="display:none;">

				<p> Etes-vous sûr de vouloir supprimer ce poste ?</p>

				<p><center><input type="button" value="Oui" id="ouiSupP"/><input type="button" value="Non" id="nonSupP"/></center></p>

		

			</div>

			

			

	</body>

</html>











