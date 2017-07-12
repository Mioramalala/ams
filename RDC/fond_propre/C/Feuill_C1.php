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
	$sql     = "SELECT  RDC_COMMENTAIRE, RDC_REPONSE FROM  tab_rdc WHERE RDC_OBJECTIF='C' AND RDC_CYCLE='Fond propre' AND RDC_RANG=1 AND MISSION_ID=".$_SESSION['idMission'];
	// print $sql;
	$rep     = $bdd->query($sql);
	$don     = $rep->fetch();
	$reponse = $don["RDC_REPONSE"];
	$coment1 = $don["RDC_COMMENTAIRE"];

	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	if(isset($reponse) && isset($coment1)) { 
		$goUrl="C1_update.php";
	} else { 
		$goUrl = "C1Post1.php"; 
	}

	
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		
		
		<script>
			$(function(){
								
				$("#btn_ret").click(function(){

					$("#contenue").load("RDC/fond_propre/C/C_Exi_Sold.php");
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
	                }
	            }
	        );
        
			$(function(){
				$("#enregistre").click(function(){
					enregistrer_justification();
					var rep1    = $("#repA").val();				
					var cmt1    = $("#CmtA").val();				
					var rep2    = $("#repA2").val();				
					var cmt2    = $("#CmtA2").val();		
					var trav_B2 = $("#Trav_B2").val();
					if((rep1 == "non" && cmt1 == "") || (rep2 == "non" && cmt2 == "") || rep1 == "" || rep2 == "") { 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type    : "post",
							url     : "RDC/fond_propre/C/<?php echo $goUrl;?>",
							data    : {
								rep1 : rep1,
								cmt1 : cmt1
							},
							success : function(e){
								$("#contenue").load("RDC/fond_propre/C/C_Exi_Sold2.php");
							}
			
						});
					}
										
				});
				
				function enregistrer_justification(){
					var f=new FormData(document.getElementById("justification_soldes"));
					$.ajax({
						type:"post",
						url:"RDC/fond_propre/C/save_comment.php",
						data:f,
						cache       : false,
						contentType : false,
						processData : false,
						success:function(e){
							
						}
		
					});
				}
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
			<label class="btn" id="enregistre">></label>
			<label class="btn" id="btn_ret"><</label>
		</div>
		<form id="justification_soldes">
		<table>
			<tr>
				<td>
				<div id="Travail_B2">	
				<p>JUSTIFICATION DES SOLDES DE LA "CLASSE 1"</p>
				<table id="balanceC1">
					<tr style="background-color:#B0C4DE">
						<center>
							<th>Compte</th>
							<th>Libellé</th>
							<th>Solde debiteur</th>
							<th>Solde crediteur</th>
							<th>Commentaires</th>
						</center>
					</tr>
				<?php 
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////
						$sql="SELECT DISTINCT(GL_GEN_COMPTES),GL_GEN_COMMENTAIRE,GL_GEN_ID,GL_GEN_LIBELLE,GL_GEN_DEBIT,GL_GEN_CREDIT FROM tab_gl_gen WHERE
						GL_GEN_CYCLE='A- Fonds propres' AND GL_GEN_COMPTES like '1%' AND MISSION_ID=".$_SESSION['idMission'];
						$rep=$bdd->query($sql);
						while($don=$rep->fetch()){
							$compte=$don["GL_GEN_COMPTES"];
							$libelet=$don["GL_GEN_LIBELLE"];
							$SolDN=$don["GL_GEN_DEBIT"];
							$SolCN=$don["GL_GEN_CREDIT"];
							$SolCM=$don["GL_GEN_COMMENTAIRE"];
							$id=$don["GL_GEN_ID"];
							
							?>
					<tr>								
						<td><?php echo $compte;?></td>
						<td><?php echo $libelet;?></td>
						<td><?php if(empty($SolDN)){}else{echo number_format($SolDN, 2, '.', ' ');}?></td>
						<td><?php if(empty($SolCN)){}else{echo number_format($SolCN, 2, '.', ' ');}?></td>
						<td><textarea id="cmt_B3" name="cmt_B3[]"><?php echo $SolCM; ?></textarea></td>
						<input type="hidden" name="ids[]" value="<?php echo $id; ?>"/>
						
					</tr>
						<?php } ?>
					
					
				</table>
				</div>	
				</td>
				<td>
					<div id="CohDroite">
						<h5><u>Question 1</u></h5>
						<p>Les soldes des comptes de la classe 1 </br>(hors emprunts) sont-ils justifiés ?
							<select id="repA" onchange="choixrep1()">
								<option value=""></option>
								<option value="oui" <?php if($reponse=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA"><?php echo $coment1;?></textarea>
					</div>
				</td>
			</tr>
		</table>
		</form>
	
	
	</body>
</html>
