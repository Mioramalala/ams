<link rel="stylesheet" href="../../../class/css.css"/>
<?php @session_start();
	include '../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql="SELECT REPONSE_RDC,COMMENTAIR_RDC FROM tab_rdc WHERE RANG_RDC= 5 AND MISSION_ID=".$_SESSION['idMission'];
	$rep=$bdd->query($sql);
	$don=$rep->fetch();
		$reponse=$don["REPONSE_RDC"];
		$coment=$don["COMMENTAIR_RDC"];
	if(isset($reponse) && isset($coment)){
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css"/>
		<link rel="stylesheet" href="../../css/css.css"/>
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<script>
			$(function(){
			
				$("#renvoiRevAnST").click(function(){
					$("#CohGauche").load("RDC/stock/TabD11ST.php");
					$('#CohDroite').show();
				});
				$("#precedST").click(function(){
					$("#contenue").load("RDC/stock/cohPrCom3ST.php");
				
				});
				
				$("#enregistreST").click(function(){
					var rep=$("#repAST").val();				
					var cmt=$("#CmtAST").val();	
					if(cmt==""){
						alert("Veuiller sélectionner la feuille de travail");
					}
					else{
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPostDrop.php",
							data:{rep:rep,cmt:cmt,rang:5,cycle:'stock'},
							success:function(e){								
							}
							
					
						});
						$("#contenue").load("RDC/stock/cohPrCom22ST.php");
					}
				});
				
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			Partie II
			
		</div>
		<table>
			<tr>
				<td>
					<div id="CohGauche">
						
							<p>Travaux à faire: Vérifier la concordance des stocks d'ouverture et de clôture avec la variation de stocks</p>
							
							<h4>Documents et infos à obtenir (1)</h4>	
							<p>
								<ul>
									<li>Etats financiers des deux exercices (N-1 et N)</li>
									
								</ul>
							</p>
							
							<h4>Documents et infos à obtenir (2)</h4>	
							<p>
								<ul>
									<li>Balance générale des deux exercices (N-1 et N)</li>
								</ul>
							</p>							
							<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnST">Revue analytique</label> </p>
						
					</div>
					
				</td>
				<td><div id="bt_add" style="float:right;">
						<input type="button" class="bouton" value="Précédent" id="precedST"/>
						<input type="button" class="bouton" value="Enregistrer" id="enregistreST"/></div>
					<div id="CohDroite" style="display:none">
						<h5><u>Question 1</u></h5>
						<p>Les stocks d'ouverture et les stocks de clôture sont-ils conformes avec la variation de stocks ?
							<select id="repAST">
								<option value=""></option>
								<option value="oui" <?php if($reponse=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtAST" rows="5"><?php echo $coment;?></textarea>
						
						<!--img src="../../icone/enregistre.png" id="enregistre" class="icone1" title="Enregistrer"/-->
						</p>
					</div>
				</td>
			</tr>
		</table>
	
	
	</body>
</html>
<?php }
else{
 ?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css"/>
		<link rel="stylesheet" href="../../css/css.css"/>
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<script>
			$(function(){
			
				$("#renvoiRevAnST").click(function(){
					$("#CohGauche").load("RDC/stock/TabD11ST.php");
					$('#CohDroite').show();
				});
				$("#precedST").click(function(){
					$("#contenue").load("RDC/stock/cohPrCom3ST.php");
				
				});
				$("#enregistreST").click(function(){
					var rep=$("#repAST").val();				
					var cmt=$("#CmtAST").val();		
					if(cmt==""){
						alert("Veuiller sélectionner la feuille de travail");
					}
					else{
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPost.php",
							data:{rep:rep,cmt:cmt,rang:5,cycle:'stock'},
							success:function(){
								
							}
							
					
						});
					// }
					$("#contenue").load("RDC/stock/cohPrCom22ST.php");
					}
				});
				
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			Partie II
			
		</div>		
		<table>
			<tr>
				<td>
					<div id="CohGauche">
						
							<p><h4>Travaux à faire:</h4>Identifier et expliquer l'origine de tout écart significatif entre les deux exercices.</p>
														
							<h4>Documents et infos à obtenir (1)</h4>	
							<p>
								<ul>
									<li>Etats financiers des deux exercices (N-1 et N)</li>
									
								</ul>
							</p>
							
							<h4>Documents et infos à obtenir (2)</h4>	
							<p>
								<ul>
									<li>Balance générale des deux exercices (N-1 et N)</li>
								</ul>
							</p>							
							<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnST">Revue analytique</label> </p>
						
					</div>
					
				</td>
				<td><div id="bt_add" style="float:right;">
					<input type="button" class="bouton" value="Précédent" id="precedST"/>
					<input type="button" class="bouton" value="Enregistrer" id="enregistreST"/></div>
					<div id="CohDroite" style="display:none">
						<h5><u>Question 1</u></h5>
						<p>Les stocks d'ouverture et les stocks de clôture sont-ils conformes avec la variation de stocks ?
							<select id="repAST">
									<option value=""></option>
									<option value="oui">Oui</option>
									<option value="N/A">N/A</option>
									<option value="non">Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtAST" rows="5"></textarea>						
						
						</p>
					</div>
				</td>
			</tr>
		</table>
	
	</body>
</html>
<?php } ?>


