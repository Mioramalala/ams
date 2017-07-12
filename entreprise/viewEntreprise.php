<DOCTYPE html!>

<?php

		@session_start();
		$userName=$_SESSION["nom"];
		require_once('../connexion.php');

		unset($_SESSION['entreprise']) ;
		$_SESSION["entreprise"] = $bdd->lastInsertId();
		
 ?>

<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../css/cssEntreprise.css"/>
		<link rel="stylesheet" href="css/css.css"/>
		<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
		<script>
		var userName="<?php print  $userName; ?>";
			function select(idtr,cpt)
			{
				var idrqdio="radioId"+cpt;
				document.getElementById(idrqdio).checked=true;
				$("#Acc").load("traitement.php");
			}
			$(function(){
				$("#newMission").click(function()
				{
					
					var idEntr= $("#txtId").val();
					// alert (idEntr);
					$.ajax({
						type:"POST",
						url:"entreprise/newMission.php",
						data:{a:idEntr},
						success:function(e){
						 $("#Acc").html(e);
						}
				     	});

					

				});

				

				$("#btnRetoure").click(function(){
					parent.location="accueil.php";
				});

				

				$("#btnModif").click(function(){
					var rad=$("#listMission input[type=radio]:checked").attr("value");
						if(rad == undefined){												
							alert('Veuillez séléctionner une mission');
							}
							else if (userName != "Administrateur" && userName != "Super-Admin") 
							{
								alert("Vous n'êtes pas autorisé!");
								return false;
							}
							else{

						

							 $.ajax({

								type:"post",

								url:"entreprise/repartition_tache.php",

								data:{idMission: rad},

								success:function(e){

									$("#Acc").html(e);

									}

								});

							}

				

				});

				////////////////////////////////////////////////////////////////////////////////////////////////////

				

				$("#btnOvrir").click(function(){

					

					var rad=$("#listMission input[type=radio]:checked").attr("value");

						

						if(rad == undefined){												

							

							alert('Créer ou séléctionner une mission');

							

							}

							else{

							waiting();

							 $.ajax({

								type:"POST",

								url:"../traitement.php",

								data:{z:rad},

								success:function(e){

									positionCycle(1);

									$("#Acc").html(e);

									stopWaiting();

								}

							});

							

							

							}

				

				});

				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				

				

				

				$("#modifEntr").click(function(){
				var idEntr=$("#txtId").val();

				$.ajax({

					type:"POST",

					url:"entreprise/modifEntre.php",

					data:{a:idEntr},

					success:function(e){

						$('#Acc').html(e);

						$('body').append('<span id="idEntreprise" display="none">'+idEntr+'</span>');

					}

				

				});

				

				});

				

				$("#btnSup").click(function()
				{

					var rad2=$("#listMission input[type=radio]:checked").attr("value");
					
						if(rad2 == undefined)
						{												
							alert('séléctionner une mission');
						}
						else if (userName != "Administrateur" && userName != "Super-Admin") 
						{
							alert("Vous n'êtes pas autorisé!");
							return false;
						}
						else if(confirm('Attention! Vous êtes sur le point de supprimer une mission. La mission et toutes les données y afférentes seront perdues.')) {



							waiting();

							 $.ajax({

								type:"POST",

								url:"entreprise/suprimer_mission.php",

								data:{z:rad2},

								success:function(res){

									if(res=="non_autoriser")
									{
										alert("Vous n'êtes pas autorisé!");
										
										
									}else
									{
										
										$("#contentList").html(res);
										
									}
									stopWaiting();

								}

							});

							

							

							}

					

				});

				

			});

			

		</script>

	</head>

	<body>

	<div id="ViewEntr">

		<?php 

			$id=$_POST['a'];

			$_SESSION["idEntre"]=$id;

			unset($_SESSION['entreprise']) ;
			$_SESSION["entreprise"] = $id;
			
		?>

		<div id="info_entreprise" >

			<input type="text" id="txtId" value="<?php echo $id;?>" style="display:none;">

			<input type="button" value="Création" id="newMission"/>

			<center>

				<font style="color:black;font-size:16pt;font-weight:bold;">Liste des missions</font>

				<table id="listMission">

					<tr style="background-color:#00698d; color:#fff;">

						<td style="color:#00698d;"></td>

						<td>Année</td>

						<td>Type</td>

						<td>Date début</td>

						<td>Date clôture</td>

					</tr>

				</table>

				<div id="contentList">

					<table id="listMission">

							<?php

								$sqlMission="SELECT MISSION_ID,MISSION_DATE_DEBUT, MISSION_DATE_CLOTURE, MISSION_ANNEE, MISSION_TYPE 

								FROM   tab_mission WHERE ENTREPRISE_ID='". $id ."' order by MISSION_ID desc";

								$repMiss=$bdd->query($sqlMission);

								$compt=0;

								while($donneeMiss=$repMiss->fetch()){

									$MissId=$donneeMiss['MISSION_ID'];

									$MissDateBed=$donneeMiss['MISSION_DATE_DEBUT'];

									$MissDateClot=$donneeMiss['MISSION_DATE_CLOTURE'];

									$MissAnnée=$donneeMiss['MISSION_ANNEE'];

									$MissType=$donneeMiss['MISSION_TYPE'];

							?>

									<tr id="listE1<?php echo $compt;?>" >

										<td><input type="radio" id="radioId<?php echo $compt;?>" name="radioName" value="<?php echo $MissId;?>" onClick="PreProcess('<?php echo $id; ?>','<?php echo $MissAnnée; ?>','<?php echo $MissType; ?>')"/></td>

										<td > <?php echo $MissAnnée ?></td>

										<td > <?php echo $MissType ?></td>

										<td> <?php echo $MissDateBed ?></td>

										<td> <?php echo $MissDateClot ?></td>

									</tr>

								<?php 

									$compt++;

								}

								?>

					</table>

				</div>

				<input type="button" value="Ouvrir" id="btnOvrir"/>

				<input type="button" value="Modifier" id="btnModif"/>

				<input type="button" value="Supprimer" id="btnSup"/>

				<input type="button" value="Retour" id="btnRetoure"/>

			</center>

		</div>

		<!-- Information de l'entreprise -->

		<div id="espaceEntr">

			<?php  

				include'../connexion.php';

					

				$id=$_POST['a'];

				

				$sqlListEntreprise='SELECT ENTREPRISE_DENOMINATION_SOCIAL,

					ENTREPRISE_CONTACT,ENTREPRISE_CAPITAL_SOCIAL,ENTREPRISE_NIF,

					ENTREPRISE_STAT,ENTREPRISE_REG_COM, ENTREPRISE_RAISON_SOCIAL,ENTREPRISE_ADRESSE,ENTREPRISE_MAIL,

					ENTREPRISE_CODE,ENTREPRISE_SECTEUR_ACTIVITE,ENTREPRISE_DATE_CREATION,

					ENTREPRISE_DURE_SOCIETE,ENTREPRISE_ACTIVITE,ENTREPRISE_NOMBRE_SALARIE,ENTREPRISE_EXO_COMPTABLE,ENTREPRISE_VALORISATION_STOCK,

					ENTREPRISE_SITE_INTERNET,ENTREPRISE_NOMBRE_ACTION,ENTREPRISE_VALEUR_NOMINAL,ENTREPRISE_NBR_ACTIONNAIR

					FROM  tab_entreprise WHERE ENTREPRISE_ID='.$id;

					

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

			 

				 }

				 //background:url('icone/Livre-efefef.png');		

			?>

			<div id="infoEntr" >

				<div id="denomSos" ><center><?php echo $denom;?></center></div>

				<p>

					<?php echo ''.$RaisonSos.'';?> au capital de <?php echo '  Ar  '.$CapSos.' ';?> évoluant dans le secteur <?php echo''.$SectActiv.'';?>

					<?php echo ', '.$Activite. ' .';?>

				</p>

				<p> 

					Entreprise créée en <?php echo str_replace('/',' ',$dateCreat);?>, son exercice comptable est clôturé le <?php echo str_replace('/',' ',$ExoComp);?>.

				</p>

				<p>

					Son siège social est sis à <?php echo ''.$Adress.' .';?>

				</p>

				<div id="btnPlace">

					<center>

						<input type="button" value="Informations et modification entreprise" id="modifEntr">

					</center>

				</div>

			</div>		

		</div>

	</div>

	</body>

</html>





























