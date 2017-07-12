<?php
	session_start ();
	include '../../../connexion.php';
	//////////////////////////////////////////////select existance base//////////////////////////////////////////////
	$sql="SELECT  RDC_COMMENTAIRE, RDC_REPONSE, RDC_COMMENTAIRE_IDA,RDC_COMMENTAIRE_IR, RDC_COMMENTAIRE_SIT_FISC FROM  tab_rdc WHERE RDC_OBJECTIF='C' AND RDC_CYCLE='Fond propre' AND RDC_RANG=2 AND MISSION_ID=".$_SESSION['idMission'];
	// print $sql;
	$rep=$bdd->query($sql);
	$don=$rep->fetch();
	$reponse=$don["RDC_REPONSE"];
	$coment1=$don["RDC_COMMENTAIRE"];
	$trav_C1=$don["RDC_COMMENTAIRE_IDA"];
	$trav_C2=$don["RDC_COMMENTAIRE_IR"];
	$trav_C3=$don["RDC_COMMENTAIRE_SIT_FISC"];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////

	if (isset($reponse) && isset($coment1))
		{ 
			$goUrl="C2_update.php";
		}
	else
		{
		 $goUrl="C2Post2.php";
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

	                    $("#repA").attr('disabled', result);
	                    $("#CmtA").attr('disabled', result);
	                }
	            }
	        );
		
			$(function(){								
				$("#btn_ret").click(function(){
					$("#contenue").load("RDC/fond_propre/C/C_Exi_Sold.php");
				});
				$("#enregistre").click(function(){
				
					var rep1=$("#repA").val();				
					var cmt1=$("#CmtA").val();				
					var rep2=$("#repA2").val();				
					var cmt2=$("#CmtA2").val();		
					var trav_C1=$("#trav_C1").val();
					var trav_C2=$("#trav_C2").val();
					var trav_C3=$("#trav_C3").val();
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || (rep1=="" || rep2==""))
					{ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/fond_propre/C/<?php echo $goUrl;?>",
							data:{rep1:rep1,cmt1:cmt1,trav_C1:trav_C1,trav_C2:trav_C2,trav_C3:trav_C3},
							success:function(e){
								$("#contenue").load("RDC/fond_propre/accFP.php");
							}
						});
					}
										
				});
				$(".form").submit(function(){
					console.log(arguments);
					alert("Upload réussi");
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
			<label class="btn" id="enregistre">>I</label>
			<label class="btn" id="btn_ret"><</label>
		</div>
		<table>
			<tr>
				<td>
					<div id="Travail_C2">	
					<b><p>JUSTIFICATION DU SOLDE DES IMPOTS DIFFERES</p></b>
						<div id="cg1">
							<p>IDA</p>
								<textarea class="C2" id="trav_C1" placeholder="Entrer votre commentaire"><?php echo $trav_C1 ?></textarea></br>
							<a href="RDC/fond_propre/C/modeles_fichier/IDA.xlsx"><input type="button" value="Télécharger le modèle"/></a></br>
							<iframe style="display:none" name="uploadFrame"></iframe>
							<form class="form" enctype="multipart/form-data" action="RDC/fond_propre/C/uploader_fichier.php" method="POST" target="uploadFrame">
								<input type="hidden" name="pour" value="IDA" />
								<input type="file" name="fichier"/>
								<input type="submit" value="Upload"/>
							</form>
						</div>
						<div id="cg2">
							<p>I.R SUR INVESTISSEMENTS</p>
							<textarea  class="C2" id="trav_C2" placeholder="Entrer votre commentaire"><?php echo $trav_C2 ?></textarea></br>
							<iframe style="display:none" name="uploadFrame"></iframe>
							<form class="form" enctype="multipart/form-data" action="RDC/fond_propre/C/uploader_fichier.php" method="POST" target="uploadFrame">
								<input type="hidden" name="pour" value="IR" />
								<input type="file" name="fichier"/>
								<input type="submit" value="Upload" />
							</form>
						</div>
						<div id="cg3">
							<p>SITUATION FISCALE</p>
							<textarea  class="C2" id="trav_C3" placeholder="Entrer votre commentaire"><?php echo $trav_C3 ?></textarea></br>
							<iframe style="display:none" name="uploadFrame"></iframe>
							<form class="form" enctype="multipart/form-data" action="RDC/fond_propre/C/uploader_fichier.php" method="POST" target="uploadFrame">
								<input type="hidden" name="pour" value="SF" />
								<input type="file" name="fichier"/>
								<input type="submit" value="Upload" />
							</form>
						</div>
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
	
	
	</body>
</html>
