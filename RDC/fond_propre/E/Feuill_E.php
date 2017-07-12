<?php
	session_start ();
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

	//include '../../../test_acces.php';
	//////////////////////////////////////////////select existance base//////////////////////////////////////////////
	$sql="SELECT  RDC_COMMENTAIRE, RDC_REPONSE FROM  tab_rdc WHERE RDC_OBJECTIF='E' AND RDC_CYCLE='Fond propre' AND RDC_RANG=1 AND MISSION_ID=".$_SESSION['idMission'];
	// print $sql;
	$rep=$bdd->query($sql);
	$don=$rep->fetch();
		$reponse=$don["RDC_REPONSE"];
		$coment1=$don["RDC_COMMENTAIRE"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////

	if (isset($reponse) && isset($coment1)){ $goUrl="E1_update.php";}
	else{ $goUrl="E1Post1.php"; }

	
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
					$("#contenue").load("RDC/fond_propre/E/E_Info_Pres.php");
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
	                    $("#CmtA").attr('disabled', result);
	                }
	            }
	        );

			$(function(){
				function remplirAnnexe(){
					var nature=$("#nature").val();				
					var note=$("#anexE").val();	
					var id=$("#id").val();	

					$.ajax({
						type:"post",
						url:"RDC/fond_propre/E/E_annexe.php",
						data:{nature:nature,note:note},
						success:function(e){

						}
		
					});					

				}	

				$("#enregistre").click(function(){
				
					remplirAnnexe();

					var rep1=$("#repA").val();				
					var cmt1=$("#CmtA").val();				
					if((rep1=="non" && cmt1=="") || rep1==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/fond_propre/E/<?php echo $goUrl;?>",
							data:{rep1:rep1,cmt1:cmt1},
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
		
		</script>
	</head>
	<body>
		<div >
			<label class="btn" id="enregistre">>I</label>
			<label class="btn" id="btn_ret"><</label>
		</div>
		<table>
			<tr>
				<td>
				<div id="Travail_E">	
				<p>ELEMENTS EN ANNEXE</p>
				<?php 
					$sql="SELECT  * FROM  tab_fp_annexe WHERE MISSION_ID=".$_SESSION['idMission'];
					
					$rep=$bdd->query($sql);

				?>
				<table>
					<tr>
						<td></td>
						<td>Nature</td>
						<td>Notes annexes</td>
					</tr>
					<?php
					if($don=$rep->fetch()){
						$ID=$don["ID"];
						$nature=$don["NATURE"];
						$annexe=$don["ANNEXE"];
					}
					else{
						$nature="";
						$annexe="";
					}
					?>
					<tr>
						<td>
							<form id="pj_form">
								<label>Piece jointe</label>
								<input type="file" id="piec_j" name="piec_j"/>
							</form>
							<div id="lien_piece_j"></div>
							<?php
							/*#Jimmy
							Mesure d'urgence
							*/
							?>
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
										url:"RDC/fond_propre/E/save_pj.php",
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
									$("#lien_piece_j").load("RDC/fond_propre/E/get_pj.php");
									
								}
								</script>
						</td>
						
						<td><textarea id="nature"  placeholder="Entrer votre commentaire"><?php echo $nature;?></textarea></td>
						<td><textarea id="anexE"  placeholder="Entrer votre commentaire"><?php echo $annexe;?></textarea></td>
								
					</tr>
				</table>
			
				</div>	
				</td>
				<td>
					<div id="CohDroite">
						<h5><u>Question 1</u></h5>
						<p>Toutes les informations devant être portées dans les annexes sont-elles bien recensées ? 
							<select id="repA" onchange="choixrep1()">
								<option value=""></option>
								<option value="oui" <?php if($reponse=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si réponse négative)</h5>
						<textarea id="CmtA"><?php echo $coment1;?></textarea>
						</p>
					</div>
				</td>
			</tr>
		</table>
	
	
	</body>
</html>
