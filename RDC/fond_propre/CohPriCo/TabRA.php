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
	include 'fonctions_requetes.php' ;
//////////////////////////////////////////////select existance base//////////////////////////////////////////////
	$sql="SELECT  RDC_COMMENTAIRE, RDC_REPONSE FROM  tab_rdc WHERE RDC_OBJECTIF='A' AND RDC_CYCLE='Fond propre' AND RDC_RANG=1 AND MISSION_ID=".$_SESSION['idMission'];
	// print $sql;
	$rep=$bdd->query($sql);
	$don=$rep->fetch();
	$reponse1=$don["RDC_REPONSE"];
	$coment1=$don["RDC_COMMENTAIRE"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT  RDC_COMMENTAIRE, RDC_REPONSE FROM  tab_rdc  WHERE RDC_OBJECTIF='A' AND RDC_CYCLE='Fond propre' AND RDC_RANG=2 AND MISSION_ID=".$_SESSION['idMission'];
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
	$reponse2=$don2["RDC_REPONSE"];
	$coment2=$don2["RDC_COMMENTAIRE"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	$mission_id=$_SESSION['idMission'];
	/**if(isset($reponse1) && isset($coment1) && isset($reponse2) && isset($coment2) ){ */

	
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
					$("#contenue").load("RDC/fond_propre/CohPriCo/cohProCom.php");
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

                        $("#repA").attr('disabled', result);
                        $("#CmtA").attr('disabled', result);
                        $("#repA2").attr('disabled', result);
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
							type    : "post",
							url     : "RDC/fond_propre/CohPriCo/CohPostUpdete1.php",
							data    : {rep1:rep1,cmt1:cmt1,rep2:rep2,cmt2:cmt2},
							success : function(e){
								$("#contenue").load("RDC/fond_propre/CohPriCo/cohProCom2.php");
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
			<label class="btn" id="enregistre">&gt;</label>
			<label class="btn" id="btn_ret">&lt;</label>
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
.chiffre {
	text-align : right;
	padding-right : 5px;
}
td {
	border : 1px solid #999;
}
</style>
<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
<div width="100%" height="70%">
		<label>REVUE ANALYTIQUE ET VERIFICATION DE LA VARIATION DES FONDS PROPRES</label>
		<div style="width:100%; height:230px; overflow:auto;">
			<table width="100%" id="RA">
				<tr class="ttr">
					<td height="20px" align="center">Compte</td>
					<td align="center">Libellé</td>
					<td align="center">Débit</td>
					<td align="center">Crédit</td>
					<td align="center">Solde N</td>
					<td align="center">Solde N-1</td>
					<td align="center">Variation</td>
					<td align="center">Pourcentage</td>
					<td align="center">Commentaire</td>
				</tr>
			
			<?php
				//include '../../connexion.php';
				$com1=0;
				$numerodecompte=array();
				//echo $_SESSION["user"];
				//superviseur($_SESSION["user"]);
				
				// $reponse=$bdd->query("SELECT  DISTINCT(E2.IMPORT_COMPTES),E2.IMPORT_ID,E2.IMPORT_INTITULES,E2.IMPORT_DEBIT,E2.IMPORT_CREDIT,E1.IMPORT_SOLDE as soldeN1,E2.IMPORT_SOLDE as soldeN,E1.IMPORT_CHOIX_ANNEE,E2.IMPORT_CHOIX_ANNEE,(E2.IMPORT_SOLDE-E1.IMPORT_SOLDE)as Valeur FROM tab_importer E1, tab_importer E2
				// WHERE E1.IMPORT_COMPTES = E2.IMPORT_COMPTES AND E2.IMPORT_CYCLE='A- Fonds propres' AND E2.MISSION_ID=".$mission_id." AND (E2.IMPORT_SOLDE-E1.IMPORT_SOLDE)<>-58000000 AND E1.IMPORT_CHOIX_ANNEE='N-1' AND E2.IMPORT_CHOIX_ANNEE='N' GROUP BY E1.IMPORT_COMPTES");
				
//				$reponse=$bdd->query("SELECT  DISTINCT E1.IMPORT_COMPTES,E2.IMPORT_COMPTES,E2.IMPORT_ID,E2.IMPORT_INTITULES,E2.IMPORT_DEBIT,E2.IMPORT_CREDIT,E1.IMPORT_SOLDE as soldeN1,E2.IMPORT_SOLDE as soldeN,E1.IMPORT_CHOIX_ANNEE,E2.IMPORT_CHOIX_ANNEE,(E2.IMPORT_SOLDE-E1.IMPORT_SOLDE)as Valeur FROM tab_importer E1, tab_importer E2
//				WHERE E2.IMPORT_CYCLE='A- Fonds propres' AND E2.MISSION_ID=".$mission_id." AND E1.IMPORT_CHOIX_ANNEE='N-1' AND E2.IMPORT_CHOIX_ANNEE='N' GROUP BY E2.IMPORT_COMPTES");
				
				$reponse=remplir_tab_par_cycle('A- Fonds propres',$mission_id);
				
				while($donnees=$reponse->fetch())
				{
						$import_compteN=$donnees['COMPTE'];
						$import_intituleN=utf8_decode($donnees['INTITULE']);
						$import_debitN=$donnees['IMPORT_DEBIT'];
						$import_creditN=$donnees['IMPORT_CREDIT'];
						$import_soldeN=$donnees['IMPORT_SOLDE'];
						$import_soldeN1=$donnees['IMPORTN1_SOLDE'];
						//$import_anneeN=$donnees['IMPORT_CHOIX_ANNEE'];
						$import_variation=round($donnees['VARIATION'],2);
						if($import_variation=="") $import_variation=0;

						$numerodecompte=$donnees['IMPORT_ID'];

						$comp=count($import_soldeN1);
							for($i=0; $i<$comp; $i++){
							
							if($import_soldeN1==0){
								$pourcentages = 0;
							}
							else {
								$pourcentages =round(($import_variation/$import_soldeN1)*100,2);
							}
							
			?> 
			<tr height="70" id="idBalGen<?php echo $com1;?>" onclick="makaid(<?php echo $donnees['IMPORT_ID'];?>)" value="<?php echo $donnees['IMPORT_ID'];?>">
				<input type ="hidden" value="<?php echo $donnees['IMPORT_ID']?>"  style="display:none"/>
				
				<td style="width:50px"><?php echo $import_compteN;?></td>
				<input type="hidden"  name="import_compteN[]" id="import_compteN<?php echo $com1;?>" value="<?php echo $import_compteN;?>"/>
				
				<td width="150px" style="max-width:200px;"><?php echo $import_intituleN;?> </td>
				<input type="hidden"  name="import_intituleN[]"  id="import_intituleN<?php echo $com1;?>" value="<?php echo $import_intituleN;?>"/>
				
				<td width="150px"><?php if(empty($import_debitN)){}else{echo number_format($import_debitN, 2, '.', ' ');}?></td>
				<input type="hidden" name="import_debitN[]" id="import_debitN<?php echo $com1;?>" value="<?php echo $import_debitN;?>"/>
				
				<td width="150px"><?php if(empty($import_creditN)){}else{echo number_format($import_creditN, 2, '.', ' ');}?></td>
				<input type="hidden" name="import_creditN[]" id="import_creditN<?php echo $com1;?>" value="<?php echo $import_creditN;?>"/>
				
				<td width="150px"><?php if(empty($import_soldeN)){}else{echo number_format($import_soldeN, 2, '.', ' ');}?></td>
				<input type="hidden" name="import_soldeN[]"  id="import_soldeN<?php echo $com1;?>" value="<?php echo $import_soldeN;?>"/>
				
				<td width="150px"><?php if(empty($import_soldeN1)){}else{echo number_format($import_soldeN1, 2, '.', ' ');}?></td>
				<input type="hidden" name="import_soldeN1[]" id="import_soldeN1<?php echo $com1;?>" value="<?php echo $import_soldeN1;?>"/>
				
				<td width="150px"><?php if(empty($import_variation)){}else{echo number_format($import_variation, 2, '.', ' ');}?></td>
				<input type="hidden" name="import_variation[]"  id="import_variation<?php echo $com1;?>" value="<?php echo $import_variation;?>"/>
				
				<td width="80px"><?php echo $pourcentages;?>%</td>
				<input type="hidden" name="pourcentages[]" id="pourcentages<?php echo $com1;?>" value="<?php echo $pourcentages;?>"/>
				
				<td width="200px">
				<!-- Anciennement un textarea mais il est impossible de determiner si ce champ doit etre modifier ou non -->
					<div name="commentaire[]" cols="5" rows="4" <?php //if(conclusion_existante("fond", $mission_id)==true){echo "disabled class='disabled' ";}?> id="commentfond<?php echo $com1?>"><?php echo afficherCommentaire($import_compteN, 'fond', $mission_id); ?></div>
				</td>
				
			</tr>
	
			<?php
				}
				 
					$com1++;
					
				}	
			?>
		</table>
			
		</div>
			<?php
				$reponseS=$bdd->query("select SYNTHESE  from tab_synthese_ra where SYNTHESE_OBJECTIF='fond' AND MISSION_ID=".$mission_id);
		
				$Synt=$reponseS->fetch();
				
				$reponseC=$bdd->query("select CONCLUSION from tab_conclusion_ra  where CONCLUSION_OBJECTIF='fond' AND MISSION_ID=".$mission_id);
		
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
						<p> Avez-vous réalisé une revue analytique ?  
							<select id="repA" onchange="choixrep1()">
								<option value=""></option>
								<option value="oui" <?php if($reponse1=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse1=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA"><?php echo $coment1;?></textarea>
						
						<h5><u>Question 2</u></h5>
						Cette revue a-t-elle fait l'objet d'une analyse?
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


 <?php /** }

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
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="")){
						alert('des commentaires obligatoires ont été omis!');
					}
					else{
						$.ajax({
							type:"post",
							url:"RDC/fond_propre/CohPriCo/CohPost1.php",
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
					<td height="20px" align="center">Compte</td>
					<td align="center">Libellé</td>
					<td align="center">Débit</td>
					<td align="center">Crédit</td>
					<td align="center">Solde N</td>
					<td align="center">Solde N-1</td>
					<td align="center">Variation</td>
					<td align="center">Pourcentage</td>
					<td align="center">Commentaire</td>
				</tr>
<!----------------------contenu du tableau princpal --------------------------------------------------- -->			
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
						<td><?php echo $compte;?></td>
						<td><?php echo $intitule;?></td>
						<td class="chiffre"><?php if(empty($debit)){}else{echo number_format($debit, 2, '.', ' ');}?></td>
						<td class="chiffre"><?php if(empty($credit)){}else{echo number_format($credit, 2, '.', ' ');}?></td>
						<td class="chiffre"><?php if(empty($soldeN)){}else{echo number_format($soldeN, 2, '.', ' ');}?></td>
						<td class="chiffre"><?php if(empty($soldeN1)){}else{echo number_format($soldeN1, 2, '.', ' ');}?></td>
						<td class="chiffre"><?php if(empty($variation)){}else{echo number_format($variation, 2, '.', ' ');}?></td>
						<td class="chiffre"><?php echo $pourcentage;?>%</td>
						<td><?php echo $commentaire?></td>
					</tr>
			<?php
				}
			?>
			</table>
<!-----------------------fin du tableau ------------------------------------------------------------------------- -->
		
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
									<td><textarea id="txtsynth" class="cltxt"><?php echo $Synt["SYNTHESE"]; ?></textarea></td>
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
									<td><textarea id="txtcon" class="cltxt"><?php echo $Conc["CONCLUSION"]; ?></textarea></td>
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
						<p> Avez-vous réalisé une revue analytique ? 
							<select id="repA">
								<option value=""></option>
								<option value="oui">Oui</option>
								<option value="N/A">N/A</option>
								<option value="non">Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA"></textarea>
						
						<h5><u>Question 2</u></h5>
						Cette revue a-t-elle fait l'objet d'une analyse?
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
<?php }  */ ?>