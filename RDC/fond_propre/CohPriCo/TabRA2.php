<?php

@session_start();

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";
	include "$project_path/connexion.php";
//////////////////////////////////////////////select existance base//////////////////////////////////////////////
	$sql="SELECT  RDC_COMMENTAIRE, RDC_REPONSE FROM  tab_rdc WHERE RDC_OBJECTIF='A' AND RDC_CYCLE='Fond propre' AND RDC_RANG=3 AND MISSION_ID=".$_SESSION['idMission'];
	// print $sql;
	$rep=$bdd->query($sql);
	$don=$rep->fetch();
		$reponse1=$don["RDC_REPONSE"];
		$coment1=$don["RDC_COMMENTAIRE"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT  RDC_COMMENTAIRE, RDC_REPONSE FROM  tab_rdc  WHERE RDC_OBJECTIF='A' AND RDC_CYCLE='Fond propre' AND RDC_RANG=4 AND MISSION_ID=".$_SESSION['idMission'];
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
		$reponse2=$don2["RDC_REPONSE"];
		$coment2=$don2["RDC_COMMENTAIRE"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	$mission_id=$_SESSION['idMission'];
	if(isset($reponse1) && isset($coment1) && isset($reponse2) && isset($coment2) ){

		
?>

	<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../css/../css.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		
		
		<script>
			$(function(){
				$("#btn_ret").click(function(){
					$("#contenue").load("RDC/fond_propre/CohPriCo/cohProCom2.php");
				});
			});
		
		</script>
		<script>
		// Droit cycle by Tolotra
            // Page : RDC -> Fonds propres
            // Tâche : A-Fonds propres, 47
            $.ajax(
                {
                    type: 'POST',
                    url: 'droitCycle.php',
                    data: {task_id: 47},
                    success: function (e) {
                        var result = 0 === Number(e);
                        editable = !result;

                        $("#repA").attr('disabled', result);
                        $("#repA2").attr('disabled', result);
                        $("#CmtA").attr('disabled', result);
                        $("#CmtA2").attr('disabled', result);
                    }
                }
            );
			$(function(){
			
				$("#enregistre").click(function(){
					var rep1=$("#repA").val();				
					var cmt1=$("#CmtA").val();				
					var rep2=$("#repA2").val();				
					var cmt2=$("#CmtA2").val();		
					
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/fond_propre/CohPriCo/CohPostUpdate2.php",
							data:{rep1:rep1,cmt1:cmt1,rep2:rep2,cmt2:cmt2},
							success:function(e){
								$("#contenue").load("RDC/fond_propre/accFP.php");
							}
			
						});
					}
										
				});
				
			});
			function choixrep1(){
				var rep1=$("#repA").val();				
				var cmt1=$("#CmtA").val();	
				if(rep1=="non" && cmt1==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
		
			function choixrep2(){
			var rep2=$("#repA2").val();				
			var cmt2=$("#CmtA2").val();	
			if(rep2=="non" && cmt2==""){
				alert('Des commentaires obligatoires ont été omis!');
			}
		}
		
		</script>
	</head>
	<body>
		<div >
			<label class="btn" id="enregistre">>|</label>
			<label class="btn" id="btn_ret"><</label>
		</div>
		<table>
			<tr>
				<td>
								<style>
#RA{
border-collapse:collapse;
font-size:12px;
}
#RA td{
border:1px solid;
}
.ttr{
background-color:#6495ED;
color:#fff;
height:10px;
}
.cldiv{
width:500px;
height:150px;
border:1px solid #6495ED;
}
.cltxt{
width:450px;
height:90px;
}
#syntCon{
background-color:#6495ED;
}
</style>
<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
<div width="100%" height="70%">
		<label>REVUE ANALYTIQUE ET VERIFICATION DE LA VARIATION DES FONDS PROPRES</label>
		<div style="width:100%; height:230px; overflow:auto;">
			<table width="100%" id="RA">
				<tr class="ttr">
					<td width="7%" height="20px" align="center">Compte</td>
					<td width="7%" align="center">Libellé</td>
					<td width="7%" align="center">Débit</td>
					<td width="7%" align="center">Crédit</td>
					<td width="7%" align="center">Solde N</td>
					<td width="7%" align="center">Solde N-1</td>
					<td width="7%" align="center">Variation</td>
					<td width="7%" align="center">Pourcentage</td>
					<td width="7%" align="center">Commentaire</td>
				</tr>
			
			<?php
				include '../../../connexion.php';
		
				$reponse=$bdd->query("select RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SOLDE_N,RA_SOLDE_N1, RA_VARIATION,RA_POURCENTAGE, RA_COMMENTAIRE from tab_ra where RA_COMPTE like '1%' AND RA_CYCLE='fond' AND MISSION_ID=".$mission_id);
		
				while($donnees=$reponse->fetch()){
					$compte=$donnees['RA_COMPTE'];
					$intitule=$donnees['RA_LIBELLE'];
					$debit=$donnees['RA_D'];
					$credit=$donnees['RA_C'];
					$soldeN=$donnees['RA_SOLDE_N'];
					$soldeN1=$donnees['RA_SOLDE_N1'];
					$variation=$donnees['RA_VARIATION'];
					$pourcentage=$donnees['RA_POURCENTAGE'];
					$commentaire=$donnees['RA_COMMENTAIRE'];
			?>
					<tr bgcolor="white">
						<td width="3%"><?php echo $compte;?></td>
						<td width="7%"><?php echo $intitule;?></td>
						<td width="7%"><?php if(empty($debit)){}else{echo number_format($debit, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($credit)){}else{echo number_format($credit, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($soldeN)){}else{echo number_format($soldeN, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($soldeN1)){}else{echo number_format($soldeN1, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($variation)){}else{echo number_format($variation, 2, '.', ' ');}?></td>
						<td width="7%"><?php echo $pourcentage;?>%</td>
						<td width="7%"><?php echo $commentaire?></td>
					</tr>
			<?php
				}
			?>
			</table>
		</div>
			<?php
				$reponseS=$bdd->query("select SYNTHESE  from tab_synthese_ra where SYNTHESE_OBJECTIF='fond' AND MISSION_ID=".$mission_id);
		
				$Synt=$reponseS->fetch();
				
				$reponseC=$bdd->query("select CONCLUSION from tab_conclusion_ra where CONCLUSION_OBJECTIF='fond' AND MISSION_ID=".$mission_id);
		
				$Conc=$reponseC->fetch();
			?>
		
		<div id="syntCon">
		<center>
			<table >
				<tr>
					<td>
						<div  div="synth" class="cldiv">
							<table>
								<tr>
									<td height="15px"><center><label>Synthèse</label></center></td>
								</tr>
								<tr>
									<td><textarea id="txtsynth" class="cltxt" readonly><?php echo $Synt["SYNTHESE"] ?></textarea></td>
								</tr>
							</table>
						</div>
					</td>
					<td>
						<div id="con" class="cldiv">
							<table>
								<tr>
									<td height="15px"><center><label>Conclusion</label></center></td>
								</tr>
								<tr>
									<td><textarea id="txtcon" class="cltxt" readonly><?php echo $Conc["CONCLUSION"] ?></textarea></td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</center>
		</div>
		</div>
	
				<td>
					<div id="CohDroite">
						<h5><u>Question 1</u></h5>
						<p> Les registres sont-ils à jour et bien tenus ? 
							<select id="repA" onchange="choixrep1()">
								<option value=""></option>
								<option value="oui" <?php if($reponse1=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse1=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA"><?php echo $coment1;?></textarea>
						
						<h5><u>Question 2</u></h5>
						 Le principe de permanence des méthodes </br>est-il régulièrement respecté?
							<select id="repA2" onchange="choixrep2()">
								<option value=""></option>
								<option value="oui" <?php if($reponse2=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse2=="non") echo 'selected';?>> Non</option>
							</select>
						
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA2"><?php echo $coment2;?></textarea>
						<!--img src="../../icone/enregistre.png" id="enregistre" class="icone1" title="Enregistrer"/-->
						</p>
						
					</div>
				</td>
			</tr>
		</table>
	
	
	</body>
</html>


<?php }

else {

?>
	<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css"/>
		<link rel="stylesheet" href="../../css/css.css"/>
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		
		
		<script>
			$(function(){
				// $(#"GranTitre").html("OBJECTIF COHERENCES ET PRINCIPES COMPTABLES / Partie II");	
				$("#btn_ret").click(function(){
					
					// $("#CohGauche").css("background-color","#dcdcdc");
					
					// $("#CohGauche").html("#CG");
				// $("#CohGauche").load("RDC/fond_propre/CohPriCo/TabRA.php");
				$("#CohGauche").load("RDC/fond_propre/CohPriCo/cohProCom2.php");
				});
			
			});
		
		</script>
		<script>
			$(function(){
			
				$("#enregistre").click(function(){
				
					var rep1=$("#repA").val();				
					var cmt1=$("#CmtA").val();				
					var rep2=$("#repA2").val();				
					var cmt2=$("#CmtA2").val();		
					// alert('donner'+rep1+rep2+cmt1+cmt2);
					if(rep1=="non" || rep2=="non"){
						alert('des commentaires obligatoires ont été omis!');
					}
					else{
						$.ajax({
							type:"post",
							url:"RDC/fond_propre/CohPriCo/CohPost2.php",
							data:{rep1:rep1,cmt1:cmt1,rep2:rep2,cmt2:cmt2},
							success:function(e){
								$("#contenue").load("RDC/fond_propre/accFP.php");
								// $("#A").css('background-color','red');
							}
			
						});
					}
										
				});
				
			});
		
		</script>
	</head>
	<body>
		<div >
		<label class="btn" id="enregistre">>|</label>
			<label class="btn" id="btn_ret"><</label>
		</div>
		<table>
			<tr>
				<td>
								<style>
#RA{
border-collapse:collapse;
font-size:12px;
}
#RA td{
border:1px solid;
}
.ttr{
background-color:#6495ED;
color:#fff;
height:10px;
}
.cldiv{
width:500px;
height:150px;
border:1px solid #6495ED;
}
.cltxt{
width:450px;
height:90px;
}
#syntCon{
background-color:#6495ED;
}
</style>
<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
<div width="100%" height="70%">
		<label>REVUE ANALYTIQUE</label>
		<div style="width:100%; height:230px; overflow:auto;">
			<table width="100%" id="RA">
				<tr class="ttr">
					<td width="7%" height="20px" align="center">Compte</td>
					<td width="7%" align="center">Libellé</td>
					<td width="7%" align="center">Débit</td>
					<td width="7%" align="center">Crédit</td>
					<td width="7%" align="center">Solde N</td>
					<td width="7%" align="center">Solde N-1</td>
					<td width="7%" align="center">Variation</td>
					<td width="7%" align="center">Pourcentage</td>
					<td width="7%" align="center">Commentaire</td>
				</tr>
			
			<?php
				include '../../../connexion.php';
		
				$reponse=$bdd->query("select RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SOLDE_N,RA_SOLDE_N1, RA_VARIATION,RA_POURCENTAGE, RA_COMMENTAIRE from tab_ra where RA_COMPTE like '1%' AND RA_CYCLE='fond' AND MISSION_ID=".$mission_id);
		
				while($donnees=$reponse->fetch()){
					$compte=$donnees['RA_COMPTE'];
					$intitule=$donnees['RA_LIBELLE'];
					$debit=$donnees['RA_D'];
					$credit=$donnees['RA_C'];
					$soldeN=$donnees['RA_SOLDE_N'];
					$soldeN1=$donnees['RA_SOLDE_N1'];
					$variation=$donnees['RA_VARIATION'];
					$pourcentage=$donnees['RA_POURCENTAGE'];
					$commentaire=$donnees['RA_COMMENTAIRE'];
			?>
					<tr bgcolor="white">
						<td width="3%"><?php echo $compte;?></td>
						<td width="7%"><?php echo $intitule;?></td>
						<td width="7%"><?php if(empty($debit)){}else{echo number_format($debit, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($credit)){}else{echo number_format($credit, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($soldeN)){}else{echo number_format($soldeN, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($soldeN1)){}else{echo number_format($soldeN1, 2, '.', ' ');}?></td>
						<td width="7%"><?php if(empty($variation)){}else{echo number_format($variation, 2, '.', ' ');}?></td>
						<td width="7%"><?php echo $pourcentage;?>%</td>
						<td width="7%"><?php echo $commentaire?></td>
					</tr>
			<?php
				}
			?>
			</table>
		</div>
			<?php
				$reponseS=$bdd->query("select SYNTHESE  from tab_synthese_ra where SYNTHESE_OBJECTIF='fond' AND MISSION_ID=".$mission_id);
		
				$Synt=$reponseS->fetch();
				
				$reponseC=$bdd->query("select CONCLUSION from tab_conclusion_ra where CONCLUSION_OBJECTIF='fond' AND MISSION_ID=".$mission_id);
		
				$Conc=$reponseC->fetch();
			?>
		
		<div id="syntCon">
		<center>
			<table >
				<tr>
					<td>
						<div  div="synth" class="cldiv">
							<table>
								<tr>
									<td height="15px"><center><label>Synthèse</label></center></td>
								</tr>
								<tr>
									<td><textarea id="txtsynth" class="cltxt"><?php echo $Synt["SYNTHESE"] ?></textarea></td>
								</tr>
							</table>
						</div>
					</td>
					<td>
						<div id="con" class="cldiv">
							<table>
								<tr>
									<td height="15px"><center><label>Conclusion</label></center></td>
								</tr>
								<tr>
									<td><textarea id="txtcon" class="cltxt"><?php echo $Conc["CONCLUSION"] ?></textarea></td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
		</center>
		</div>
		</div>
	
				</td>
				<td>
					<div id="CohDroite">
						<h5><u>Question 1</u></h5>
						<p> Les registres sont-ils à jour et bien tenus ? 
							<select id="repA">
								<option value=""></option>
								<option value="oui">Oui</option>
								<option value="N/A">N/A</option>
								<option value="non">Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA"></textarea>
						
						<h5><u>Question 2</u></h5>
						 Le principe de permanence des méthodes </br>est-il régulièrement respecté?
							<select id="repA2">
								<option value=""></option>
								<option value="oui">Oui</option>
								<option value="N/A">N/A</option>
								<option value="non"> Non</option>
							</select>
						
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA2"></textarea>
						<!--img src="../../icone/enregistre.png" id="enregistre" class="icone1" title="Enregistrer"/-->
						</p>
						
					</div>
				</td>
			</tr>
		</table>
	
	
	</body>
</html>
<?php } ?>