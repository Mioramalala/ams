<link rel="stylesheet" href="../../../class/css.css"/>
<?php @session_start();
	include '../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql="SELECT REPONSE_RDC,COMMENTAIR_RDC FROM tab_rdc WHERE RANG_RDC= 3 AND MISSION_ID=".$_SESSION['idMission'];
	$rep=$bdd->query($sql);
	$don=$rep->fetch();
		$reponse=$don["REPONSE_RDC"];
		$coment=$don["COMMENTAIR_RDC"];

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT REPONSE_RDC,COMMENTAIR_RDC FROM tab_rdc WHERE RANG_RDC= 4 AND MISSION_ID=".$_SESSION['idMission'];
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
		$reponse2=$don2["REPONSE_RDC"];
		$coment2=$don2["COMMENTAIR_RDC"];
	if(isset($reponse) && isset($coment) && isset($reponse2) && isset($coment2)){
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
					$("#CohGauche").load("RDC/stock/TabD3ST.php");
					$('#CohDroite').show();
				});
				$("#precedST").click(function(){
					$("#contenue").load("RDC/stock/cohPrCom2ST.php");
				
				});
				$("#enregistre3ST").click(function(){
					var rep=$("#repAST").val();				
					var cmt=$("#CmtAST").val();		
					var rep2=$("#repA2ST").val();				
					var cmt2=$("#CmtA2ST").val();
					if(cmt=="" || cmt2==""){
						alert("Veuiller sélectionner la feuille de travail");
					}
					else{
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPostDrop.php",
							data:{rep:rep,cmt:cmt,rang:3,cycle:'stock'},
							success:function(){								
							}				
						});
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPostDrop.php",
							data:{rep:rep2,cmt:cmt2,rang:4,cycle:'stock'},
							success:function(){								
							}				
						});
						$("#contenue").load("RDC/stock/cohPrCom21ST.php");		
					}
				});
				
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			Partie I
			
		</div>		
		<table>
			<tr>
				<td>
					<div id="CohGauche">
						
							<p><h4>Travaux à faire:</h4>Identifier et expliquer l'origine de tout écart significatif entre les deux exercices. </p>
							
							<h4>Documents et infos à obtenir</h4>	
							<p>
								<ul>
									<li>Etats financiers des deux exercices (N-1 et N)</li>
									<li>Balance générale des deux exercices (N-1 et N)</li>
									<li>Etat récapitulatif des stocks et en-cours (valeurs brutes et provisions) par catégorie et par site sur les deux exercices</li>
								</ul>
							</p>
							<p><label id="titrRev">Feuille de travail: </label>  <label id="renvoiRevAnST">Revue analytique</label> </p>
						
					</div>
					
				</td>
				<td>
					<div id="bt_add" style="float:right;">
						<input type="button" class="bouton" value="Précédent" id="precedST"/>
						<input type="button" class="bouton" value="Enregistrer" id="enregistre3ST"/></div>
					<div id="CohDroite" style="display:none;">
						<h5><u>Question 1</u></h5>
						<p>Avez-vous examiné l'évolution du taux moyen de provision, globalement, et par catégorie de stocks ?
							<select id="repAST">
								<option value=""></option>
								<option value="oui" <?php if($reponse=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtAST"><?php echo $coment;?></textarea>							
						</p>
						<h5><u>Question 2</u></h5>
						<p>Avez-vous obtenu des explications nécessaires sur les évolutions les plus significatives ?
							<select id="repA2ST">
								<option value=""></option>
								<option value="oui" <?php if($reponse2=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse2=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtA2ST" rows="5"><?php echo $coment2;?></textarea>							
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
					$("#CohGauche").load("RDC/stock/TabD3ST.php");
					$('#CohDroite').show();
				});
				$("#precedST").click(function(){
					$("#contenue").load("RDC/stock/cohPrCom2ST.php");
				
				});
				$("#enregistre3ST").click(function(){
					var rep=$("#repAST").val();				
					var cmt=$("#CmtAST").val();	
					var rep2=$("#repA2ST").val();				
					var cmt2=$("#CmtA2ST").val();
					if(cmt=="" || cmt2==""){
						alert("Veuiller sélectionner la feuille de travail");
					}
					else{
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPost.php",
							data:{rep:rep,cmt:cmt,rang:3},
							success:function(e){								
							}
							
						});
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPost.php",
							data:{rep:rep2,cmt:cmt2,rang:4},
							success:function(e){								
							}
							
						});
					
						$("#contenue").load("RDC/stock/cohPrCom21ST.php");
					}
					
				});
				
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			Partie I
			
		</div>
		<table>
			<tr>
				<td>
					<div id="CohGauche">
						
							<p>Travaux à faire: Identifier et expliquer l'origine de tout écart significatif entre les deux exercices. </p>
							
							<h4>Documents et infos à obtenir</h4>	
							<p>
								<ul>
									<li>Etats financiers des deux exercices (N-1 et N)</li>
									<li>Balance générale des deux exercices (N-1 et N)</li>
									<li>Etat récapitulatif des stocks et en-cours (valeurs brutes et provisions) par catégorie et par site sur les deux exercices</li>
								</ul>
							</p>
							<p><label id="titrRev">Feuille de travail : <label>  <label id="renvoiRevAnST">Revue analytique</label> </p>
						
					</div>
					
				</td>
				<td>
					<div id="CohDroite" style="display:none;">
						<div id="bt_add" style="float:right;">
							<input type="button" class="bouton" value="Précédent" id="precedST"/>
							<input type="button" class="bouton" value="Enregistrer" id="enregistre3ST"/></div>
						<h5><u>Question 1</u></h5>
						<p>Avez-vous examiné l'évolution du taux moyen de provision, globalement, et par catégorie de stocks ?
							<select id="repAST">
									<option value=""></option>
									<option value="oui">Oui</option>
									<option value="N/A">N/A</option>
									<option value="non">Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtAST"></textarea>						
						
						</p>
						<h5><u>Question 1</u></h5>
						<p>Avez-vous obtenu des explications nécessaires sur les évolutions les plus significatives ?
							<select id="repA2ST">
									<option value=""></option>
									<option value="oui">Oui</option>
									<option value="N/A">N/A</option>
									<option value="non">Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtA2ST" rows="5"></textarea>						
						
						</p>
					</div>
				</td>
			</tr>
		</table>
	
	
	</body>
</html>
<?php } ?>


