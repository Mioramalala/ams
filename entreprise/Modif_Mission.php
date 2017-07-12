<doctype html!>
<?php 
	include'../connexion.php';
	$idMiss=$_POST['z'];
	// Droit d'utilisateur (autorisé seulement aux administrateurs et aux superviseurs) by Niaina
	@session_start();
	$userName=$_SESSION["nom"];

	$sql = 'SELECT COUNT(*) AS NB FROM tab_superviseur WHERE SUPERVISEUR_NOM="'.$userName.'" AND MISSION_ID='.$idMiss;
    $result = $bdd->query($sql);
    $columns = $result->fetch();
    $nb = $columns['NB'];

	if ($userName != "Administrateur" && $userName != "Super-Admin" && $nb == 0) {
?>

<script>
	alert("Vous n'avez pas le droit de modifier une mission");
	window.location.href="../accueil.php";
</script>

<?php
	}
	// Fin Droit d'utilisateur
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
		 <link href="css/multi-select.css" media="screen" rel="stylesheet" type="text/css">
		 <script src="js/jquery.multi-select.js" type="text/javascript"></script>
		 <script type="text/javascript" src="src/date/jquery.datepick.min.js"></script>
		<script type="text/javascript" src="src/date/jquery.datepick-fr.js"></script>
		<link rel="stylesheet" href="src/date/jquery.datepick.css"></script>
		<script>
			var i;
			i=0;
			$(function(){
			
				$('#txtdateD').datepick({ 
					dateFormat: 'dd/mm/yyyy'
				});
				$('#txtdateC').datepick({ 
					dateFormat: 'dd/mm/yyyy'
				});
				$('#txtDeadline').datepick({ 
					dateFormat: 'dd/mm/yyyy'
				});
			
				// $("#plusOpId").click(function(){
					
					// i++;
					// $("#list_Auditeur").html($("#list_Auditeur").html()+"<input  id='idOp"+i+"'/>");
					// $("#list_Auditeur").append("<select id='idOp"+i+"'>  <?php
					//////////////////////////////////
					// $sql_list='SELECT UTIL_NOM FROM  tab_utilisateur
										// WHERE UTIL_STATUT = 1 order by UTIL_ID asc ';
						// $reponse_list=$bdd->query($sql_list);
						// while ($donnees_list=$reponse_list->fetch())
						
						// {?>
						// '<option> <?php //$NomOp=$donnees_list['UTIL_NOM'];echo $NomOp; ?>  </option> <?php// } ?> </select>");
						
					/////////////////////////////////////
				// });
				

				// $("#moinOpId").click(function(){
					// $("#idOp"+i).remove();
					// i--;
				// });
				
				$("#EnregistrerMiss").click(function(){
					var typeM=$("#typeMiss").val();
					var AnneM=$("#txtAnnMiss").val();					
					var DebuM=$("#txtdateD").val();
					var ClozM=$("#txtdateC").val();
					var IdEntr=$("#txtIdEntr").val();
					var IdDeadline=$("#txtDeadline").val();
					var IdMission = $("#txtIdMiss").val();
					
					//Script pour recuperer id et nom superviseur by Niaina
					var valuesID = [];	
					var valuesNOM = [];
					var nbr = $('#listbox_ajout_Superv option').size();
					var transfert = "nbr="+nbr+"&idMiss="+IdMission;
					for(var i=0;i<nbr;i++)
					{
						valuesID = ($("#listbox_ajout_Superv option"))[i].value;
						valuesNOM = ($("#listbox_ajout_Superv option"))[i].text;
						transfert = transfert+ "&valuesID[]=" +valuesID+ "&valuesNOM[]=" +valuesNOM;
					}
					//Fin Script pour recuperer id et nom superviseur by Niaina
					
					$.ajax({
						type:"POST",
						url:"entreprise/updateMission.php",
						data:{a:typeM,u:IdDeadline,z:AnneM,r:DebuM,t:ClozM,y:IdEntr,i:IdMission},
						success:function(e){
							if (e==1) {
								//Script pour envoyer ajax id et nom superviseur by Niaina 
								$.ajax({
								  type:"POST",
								  url:"entreprise/update_superviseur.php",
								  data:transfert,
								});
								//Fin script pour envoyer ajax id et nom superviseur by Niaina
								
								alert("Modification(s) bien enregistrée(s)");								
								//Retour au liste mission entreprise actuel by Niaina
								var IdEntr=$("#txtIdEntr").val();
								$.ajax({
									type:"POST",
									url:"entreprise/viewEntreprise.php",
									data:{a:IdEntr},
									success:function(e){									 
									  $("#Acc").html(e);
									}
								});
							} else {
								alert('Cette mission existe déjà !');
							}							
						}
					});
				});
			
			$("#reptache").click(function(){

				$.ajax({
					type:"POST",
					url:"entreprise/modification_distribution_tache.php",					
					success:function(e){
						$("#Acc").load("entreprise/modification_distribution_tache.php");
					}
				});
			});
			
				$("#annulCM").click(function(){
					var IdEntr=document.getElementById('txtIdEntr').value;
					// var IdEntr=$("#txtIdEntr").val();
					//alert(IdEntr);
					// transfert="a="+dEntr;
					 // $.get("entreprise/viewEntreprise.php?"+transfert,function (e)
					 // {
						// alert("eeeee");
						// $("#Acc").html(e);
					 // })
		
					 $.ajax({
						type:"POST",
						// url:"entreprise/viewEntreprise.php?"+transfert,
						 url:"entreprise/viewEntreprise.php?",
						data:{a:IdEntr},
						success:function(e){
						// alert("eeeee");
						$("#Acc").html(e);
						}
					});
				});
			});
			
			
			var id_artADD="";
			$(function(){
			 $("#btn_ajout_Sup").click(Clickbtn_ajoutU);//BOUTON AJOUTER ARTISTE à PARTICIPER A L'EVENEMENT Qui se sitie dans l'input
			 $(document).on("click","#list_rechercheArt",Clicklist_ajoutSuperviseur);
			});
			function Clickbtn_ajoutU()
			{
			  
			  UTIL_ID=$("#entrer_nomSuperviseur  option:selected").attr("value");
			  nomSup=$("#entrer_nomSuperviseur option:selected").html();
			  //if($("#entrer_nomSuperviseur").val()=="") return false;

			 
			 var eltSelectSup=$("#listbox_ajout_Superv");//element parent Sup
			 elt_option="<option value='"+UTIL_ID+"'>"+nomSup+"</option>";//Element option ajouter
			 eltSelectSup.prepend(elt_option); 
			   
			}

			function Clicklist_ajoutSuperviseur()
			{
			 
			 id_artADD=$(this).attr("IdUtil");
			 //alert($(this).text());
			 $("#entrer_nomSuperviseur").val($(this).text());
			 $("#list_rechercheArt").css("display","none"); 
			}

			$(function(){
			 $("#btn_suprime").click(function(){
			  id_suppr=$("#listbox_ajout_Superv option:selected").attr("value");//recuperation Id artiste participant
			  $("#listbox_ajout_Superv option:selected").remove();
			  
			  });
			 });
	
		</script>
	</head>
	<body>
	<div id="creationMiss">
	
	<?php
		////////////////////sql selection de la mission a modifier/////////////////////
	$SqlMiss="SELECT MISSION_DATE_DEBUT,MISSION_DATE_CLOTURE,MISSION_ANNEE,MISSION_TYPE,MISSION_DEADLINE,ENTREPRISE_ID
	FROM  tab_mission WHERE MISSION_ID=".$idMiss;
	
	$repMiss=$bdd->query($SqlMiss);
	$donne=$repMiss->fetch();
	$typeM=$donne["MISSION_TYPE"];
	$dateD=$donne["MISSION_DATE_DEBUT"];
	$dateC=$donne["MISSION_DATE_CLOTURE"];
	$AnnM=$donne["MISSION_ANNEE"];
	$Deadline=$donne["MISSION_DEADLINE"];
	$IdEntr=$donne['ENTREPRISE_ID'];
	?>
		
		<input type="text" id="txtIdMiss" value="<?php echo $idMiss;?>" style="display:none;"/>
		<input type="text" id="txtIdEntr" value="<?php echo $IdEntr;?>" style="display:none;"/>
		<table id="CrMission">
			<th colspan="5" id="ttrCr">Modification mission<br><br></th>
			<tr>
				<td class="lab">Type de mission : </td>
				<td>
					<select id="typeMiss" class="txtGen" align="center">
						<option selected="true" value="<?php echo $typeM ;?>"><center><?php echo $typeM ;?></center></option>
						<option value="Final"><center> Final </center></option>
						<option value="Intérimaires"><center> Intérimaires </center></option>
					</select>
				</td>
				<td class="lab">Année de mission :</td>
				<td>
					<select id="txtAnnMiss" class="txtGen" align="center">	
						<option selected="true" value="<?php echo $AnnM ?>"><?php echo $AnnM ?></option>					
						<!-- Modification by Niaina -->
						<?php for($i=1930;$i<2101;$i++) { ?>
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
						<?php } ?>
						<!-- Fin Modification -->
					</select>
				</td>
				
			</tr>
			<tr>
				<td class="lab">Superviseur :</td>
				<td>
				<div class="list_">
                            
                            <select id="entrer_nomSuperviseur"   align="center">  
								<option value="">Séléctionner superviseur</option>
								<?php
									 $sqltoperan="SELECT UTIL_NOM,UTIL_ID FROM tab_utilisateur WHERE UTIL_STATUT=0";
									 $repTO=$bdd->query($sqltoperan); 
									 while($donneTo=$repTO->fetch()){
									 $NomUtil=$donneTo["UTIL_NOM"];
									 $IdUtil=$donneTo["UTIL_ID"];
									 ?>
										<option value="<?php echo $IdUtil; ?>"> <?php echo $NomUtil;?></option>
									 <?php
                                     }
								?>
                            </select>
                            <input type="button" id="btn_ajout_Sup" name="btn_ajout_Sup" value="+"> 
                            <input type="button" id="btn_suprime" name="btn_suprime" value="X">             
                        <div id="list_rechercheArt">
                                
                        </div>
             
                </div>
                <div class="list_">
                     <select id="listbox_ajout_Superv" size="3"   multiple="multiple" style="width:220px; height:65px;" >
						<?php
							 $sqltoperan = "SELECT * FROM tab_superviseur WHERE MISSION_ID=".$idMiss;
							 $repTO = $bdd->query($sqltoperan); 
							 while ($donneTo = $repTO->fetch()){
							 $idSuperviseur = $donneTo["SUPERVISEUR_ID"];
							 $nomSuperviseur = $donneTo["SUPERVISEUR_NOM"];
							 ?>
								<option value="<?php echo $idSuperviseur; ?>"> <?php echo $nomSuperviseur;?></option>
							 <?php
							 }
						?>
					 </select>
                </div>
					
				</td>
				
				<td class="lab">Deadline :</td>
				<td><input type="text" id="txtDeadline" class="txtGen" value="<?php echo $Deadline;?>" style="background:#DCDCDC;border:1px solid;"/></td>
				
			</tr>
			<tr>
				<td class="lab"> Date début :</td>
				<td><input type="text" id="txtdateD" class="txtGen" value="<?php echo $dateD ;?>" style="background:#DCDCDC;border:1px solid;"/></td>
				<td class="lab"> Date clôture :</td>
				<td><input type="text" id="txtdateC" class="txtGen" value="<?php echo $dateC ;?>" style="background:#DCDCDC;border:1px solid;"/></td>
			</tr>
		</table>
	</div><br/><br/><br/><br/><br/>
	<!--center>
	<confirmation enregistremen>
		<div id="txtbox" >
		<p> La mission a bien été enregistrer </p>
		<input type="button" value="OK" id="ok"/>
		</div>
	<fin confirmation>
	</center-->
		<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="button" value="Enregistrer" id="EnregistrerMiss" class="txtGen"/>
		<input type="button" value="Annuler" id="annulCM" class="txtGen"/>
		<input type="button" value="Repartition des tâches" id="reptache" class="txtGen"/>
	
	</body>
</html>