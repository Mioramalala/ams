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
	/*
	Mission must defined before anything
	*/
	if(!$_SESSION['idMission']){
		echo "Veuillez selectionner une mission";
		die();
	}
	
	//include '../../../test_acces.php';
	//////////////////////////////////////////////select existance base//////////////////////////////////////////////
	$sql="SELECT  RDC_COMMENTAIRE, RDC_REPONSE, RDC_COMMENTAIRE_SUI_PROC FROM  tab_rdc WHERE RDC_OBJECTIF='D' AND RDC_CYCLE='Fond propre' AND RDC_RANG=2 AND MISSION_ID=".$_SESSION['idMission'];
	// print $sql;
	$rep=$bdd->query($sql);
	$don=$rep->fetch();
		$reponse=$don["RDC_REPONSE"];
		$coment1=$don["RDC_COMMENTAIRE"];
		$trav_D2=$don["RDC_COMMENTAIRE_SUI_PROC"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT  RDC_COMMENTAIRE, RDC_REPONSE, RDC_COMMENTAIRE_SUI_PROC FROM  tab_rdc  WHERE RDC_OBJECTIF='D' AND RDC_CYCLE='Fond propre' AND RDC_RANG=3 AND MISSION_ID=".$_SESSION['idMission'];
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
		$reponse2=$don2["RDC_REPONSE"];
		$coment2=$don2["RDC_COMMENTAIRE"];
		$trav_D2=$don["RDC_COMMENTAIRE_SUI_PROC"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql3="SELECT  RDC_COMMENTAIRE, RDC_REPONSE, RDC_COMMENTAIRE_SUI_PROC FROM  tab_rdc  WHERE RDC_OBJECTIF='D' AND RDC_CYCLE='Fond propre' AND RDC_RANG=4 AND MISSION_ID=".$_SESSION['idMission'];
	$rep3=$bdd->query($sql3);
	$don3=$rep3->fetch();
		$reponse3=$don3["RDC_REPONSE"];
		$coment3=$don3["RDC_COMMENTAIRE"];
		$trav_D2=$don["RDC_COMMENTAIRE_SUI_PROC"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql4="SELECT  RDC_COMMENTAIRE, RDC_REPONSE, RDC_COMMENTAIRE_SUI_PROC FROM  tab_rdc  WHERE RDC_OBJECTIF='D' AND RDC_CYCLE='Fond propre' AND RDC_RANG=5 AND MISSION_ID=".$_SESSION['idMission'];
	$rep4=$bdd->query($sql4);
	$don4=$rep4->fetch();
		$reponse4=$don4["RDC_REPONSE"];
		$coment4=$don4["RDC_COMMENTAIRE"];
		$trav_D2=$don["RDC_COMMENTAIRE_SUI_PROC"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	if(isset($reponse) && isset($coment1) && isset($reponse2) && isset($coment2) && isset($reponse3) && isset($coment3) && isset($reponse4) && isset($coment4))
	{
	 $goUrl="D2_update.php";
	}
	else
		{
		 $goUrl="D2Post2.php"; 
		}
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		
		
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
	                    $("#repA3").attr('disabled', result);
	                    $("#repA4").attr('disabled', result);
	                    $("#CmtA").attr('disabled', result);
	                    $("#CmtA2").attr('disabled', result);
	                    $("#CmtA3").attr('disabled', result);
	                    $("#CmtA4").attr('disabled', result);
	                }
	            }
	        );
			
			$(function(){
								
				$("#btn_ret").click(function(){

					$("#contenue").load("RDC/fond_propre/D/D_Jur_Fisk2.php");
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
					var rep3=$("#repA3").val();				
					var cmt3=$("#CmtA3").val();				
					var rep4=$("#repA4").val();				
					var cmt4=$("#CmtA4").val();
					var trav_D2=$("#trav_D2").val();		
					
					// alert(cmt1+cmt2+cmt3+cmt4);
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || (rep3=="non" && cmt3=="") || (rep4=="non" && cmt4=="") || rep1=="" || rep2=="" || rep3=="" || rep4==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/fond_propre/D/<?php echo $goUrl;?>",
							data:{rep1:rep1,cmt1:cmt1,rep2:rep2,cmt2:cmt2,rep3:rep3,cmt3:cmt3,rep4:rep4,cmt4:cmt4,trav_D2:trav_D2},
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
			function choixrep3(){
				var rep3=$("#repA3").val();				
				var cmt3=$("#CmtA3").val();	
				if(rep3=="non" && cmt3==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
		
			function choixrep2(){
			var rep4=$("#repA4").val();				
			var cmt4=$("#CmtA4").val();	
			if(rep4=="non" && cmt4==""){
				alert('Des commentaires obligatoires ont été omis!');
			}
		}
		
		</script>
	</head>
	<body>
		<div>
			<label class="btn" id="enregistre">>I</label>
			<label class="btn" id="btn_ret"><</label>
		</div>
		<table>
			<tr>
				<td>
				<div id="Travail_D2">	
				<p>SUIVI DES PROCEDURES RELATIVE A LA PERTE DE LA MOITIE DU CAPITAL SOCIAL</p>
				<center>
					<textarea id="trav_D2" placeholder="Analyse du traitement/sort de l'operation de réévaluation"><?php echo $trav_D2; ?></textarea></br>
					<form id="pj_form">
					<input type="file" id="piec_j" name="piec_j"/>
					</form>
					<!--input type="button" value="Enregister" id="Tav_B2_Eng"/--></br>
				
					<?php
					/*
					Solution temporaire pour la sauvegarde du fichier
					
					*/					
					?>
					<div id="lien_piece_j"></div>
					<script>
					load_pj();
					$("#piec_j").unbind("change");
					$("#piec_j").change(function(){
						console.log("saving");
						save_pj();
					});
					function save_pj(){
						var d=new FormData(document.getElementById("pj_form"));
						$.ajax({
							type:"post",
							url:"RDC/fond_propre/D/save_pj.php",
							data:d,
							cache       : false,
							contentType : false,
							processData : false,
							success:function(e){
								load_pj();
							}
			
						});
					}
					function load_pj(){
						$("#lien_piece_j").load("RDC/fond_propre/D/get_pj.php");
						
					}
					</script>
				</center>
				</div>	
				</td>
				<td>
					<div id="CohDroite">
						<h5><u>Question 1</u></h5>
						<p>Les procédures consécutives à la perte de la moitié du capital social sont-elles réalisées ?
							<select id="repA" onchange="choixrep1()">
								<option value=""></option>
								<option value="oui" <?php if($reponse=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA"><?php echo $coment1;?></textarea>
						</p>
						
						<h5><u>Question 2</u></h5>
						<p>
						Les dettes sont-elles liquides et exigibles?
							<select id="repA2" onchange="choixrep2()">
								<option value=""></option>
								<option value="oui" <?php if($reponse2=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse2=="non") echo 'selected';?>> Non</option>
							</select>
						
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA2"><?php echo $coment2;?></textarea>
						</p>
						<h5><u>Question 3</u></h5>
					<p>Les statuts sont-ils mis à jour consécutivement aux modifications survenues ?
							<select id="repA3" onchange="choixrep3()">
								<option value=""></option>
								<option value="oui" <?php if($reponse3=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse3=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse3=="non") echo 'selected';?>> Non</option>
							</select>
						
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA3"><?php echo $coment3;?></textarea>
					</p>	
						<h5><u>Question 4</u></h5>
					<p>Les statuts sont-ils mis en harmonie avec la nouvelle loi sur les sociétés commerciales ?
							<select id="repA4" onchange="choixrep4()">
								<option value=""></option>
								<option value="oui" <?php if($reponse4=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse4=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse4=="non") echo 'selected';?>> Non</option>
							</select>
						
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA4"><?php echo $coment4;?></textarea>
					</p>
					</div>
				</td>
			</tr>
		</table>
	
	
	</body>
</html>
