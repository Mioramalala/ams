<link rel="stylesheet" href="../../../class/css.css"/>
<?php @session_start();
	include '../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql="SELECT REPONSE_RDC,COMMENTAIR_RDC FROM tab_rdc WHERE RANG_RDC= 6 AND MISSION_ID=".$_SESSION['idMission'];
	$rep=$bdd->query($sql);
	$don=$rep->fetch();
		$reponse=$don["REPONSE_RDC"];
		$coment=$don["COMMENTAIR_RDC"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT REPONSE_RDC,COMMENTAIR_RDC FROM tab_rdc WHERE RANG_RDC= 7 AND MISSION_ID=".$_SESSION['idMission'];
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
		$reponse2=$don2["REPONSE_RDC"];
		$coment2=$don2["COMMENTAIR_RDC"];		
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql3="SELECT REPONSE_RDC,COMMENTAIR_RDC FROM tab_rdc WHERE RANG_RDC= 8 AND MISSION_ID=".$_SESSION['idMission'];
	$rep3=$bdd->query($sql3);
	$don3=$rep3->fetch();
		$reponse3=$don3["REPONSE_RDC"];
		$coment3=$don3["COMMENTAIR_RDC"];
	if(isset($reponse) && isset($coment)&& isset($reponse2) && isset($coment2) && isset($reponse3) && isset($coment3)){
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
					$("#CohGauche").load("RDC/stock/TabD12ST.php");
					$('#CohDroite').show();
				});
				$("#precedST").click(function(){
					$("#contenue").load("RDC/stock/cohPrCom21ST.php");
				
				});
				
				$("#enregistreST").click(function(){
					var rep=$("#repAST").val();				
					var cmt=$("#CmtAST").val();	
					var rep2=$("#repA2ST").val();				
					var cmt2=$("#CmtA2ST").val();	
					var rep3=$("#repA3ST").val();				
					var cmt3=$("#CmtA3ST").val();

					if(cmt=="" || cmt2=="" || cmt3==""){
						alert("Veuiller sélectionner la feuille de travail");
					}
					else{
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPostDrop.php",
							data:{rep:rep,cmt:cmt,rang:6,cycle:'stock'},
							success:function(e){	
							}
							
					
						});
					$.ajax({
							type:"post",
							url:"RDC/stock/CohPostDrop.php",
							data:{rep:rep2,cmt:cmt2,rang:7,cycle:'stock'},
							success:function(e){
							}
							
					
						});
					$.ajax({
							type:"post",
							url:"RDC/stock/CohPostDrop.php",
							data:{rep:rep3,cmt:cmt3,rang:8,cycle:'stock'},
							success:function(e){	
							}
							
					
						});
					$("#contenue").load("RDC/stock/accST.php");
					}
				});
				
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			Partie III
			
		</div>
		<table>
			<tr>
				<td>
					<div id="CohGauche">
						
							<p>Travaux à faire:Examiner les principes de comptabilisation et de la permanence de méthodes</p>
							
							<h4>Documents et infos à obtenir (1)</h4>	
							<p>
								<ul>
									<li>Journal / GL des stocks</li>
									
								</ul>
							</p>
							
							<h4>Documents et infos à obtenir (2)</h4>	
							<p>
								<ul>
									<li>Etats valorisés de N et N-1 (vérification du mode de calcul par sondage)</li>
								</ul>
							</p>							
							<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnST">Revue analytique</label> </p>
						
					</div>
					
				</td>
				<td><div id="bt_add" style="float:right;">
						<input type="button" class="bouton" value="Précédent" id="precedST"/>
						<input type="button" class="bouton" value="Enregistrer" id="enregistreST"/></div>
					<div id="CohDroite" style="display:none;">
						<h5><u>Question 1</u></h5>
						<p>Tous les éléments traités dans les stocks répondent-ils aux critères fixés par le PCG ?
							<select id="repAST">
								<option value=""></option>
								<option value="oui" <?php if($reponse=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtAST" rows="5"><?php echo $coment;?></textarea>	
						
						</p>
						<h5><u>Question 2</u></h5>
						<p>Les principes comptables appliqués par la société sont-ils cohérents avec le secteur dans lequel elle exerce ?
							<select id="repA2ST">
								<option value=""></option>
								<option value="oui" <?php if($reponse2=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse2=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtA2ST"><?php echo $coment2;?></textarea>	
						
						</p>
						<h5><u>Question 3</u></h5>
						<p>La méthode de valorisation et de dépréciation appliquée est-elle utilisée de façon permanente (du moins sur les deux derniers exercices) ?
							<select id="repA3ST">
								<option value=""></option>
								<option value="oui" <?php if($reponse3=="oui") echo 'selected';?> >Oui</option>
								<option value="N/A" <?php if($reponse3=="N/A") echo 'selected';?>>N/A</option>
								<option value="non" <?php if($reponse3=="non") echo 'selected';?>> Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtA3ST"><?php echo $coment3;?></textarea>	
						
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
					$("#CohGauche").load("RDC/stock/TabD12ST.php");
					$('#CohDroite').show();
				});
				$("#precedST").click(function(){
					$("#contenue").load("RDC/stock/cohPrCom21ST.php");
				
				});
				$("#enregistreST").click(function(){
					var rep=$("#repAST").val();				
					var cmt=$("#CmtAST").val();	
					var rep2=$("#repA2ST").val();				
					var cmt2=$("#CmtA2ST").val();
					var rep3=$("#repA3ST").val();				
					var cmt3=$("#CmtA3ST").val();					
					if(cmt=="" || cmt2=="" || cmt3==""){
						alert("Veuiller sélectionner la feuille de travail");
					}
					else{
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPost.php",
							data:{rep:rep,cmt:cmt,rang:6,cycle:'stock'},
							success:function(){								
							}				
						});
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPost.php",
							data:{rep:rep2,cmt:cmt2,rang:7,cycle:'stock'},
							success:function(){								
							}				
						});
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPost.php",
							data:{rep:rep3,cmt:cmt3,rang:8,cycle:'stock'},
							success:function(){								
							}				
						});
					$("#contenue").load("RDC/stock/accST.php");
					}
				});
				
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			Partie III
			
		</div>		
		<table>
			<tr>
				<td>
					<div id="CohGauche">
						
							<p>Travaux à faire:Examiner les principes de comptabilisation et de la permanence de méthodes</p>
														
							<h4>Documents et infos à obtenir (1)</h4>	
							<p>
								<ul>
									<li>Journal / GL des stocks</li>
									
								</ul>
							</p>
							
							<h4>Documents et infos à obtenir (2)</h4>	
							<p>
								<ul>
									<li>Etats valorisés de N et N-1 (vérification du mode de calcul par sondage)</li>
								</ul>
							</p>							
							<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnST">Revue analytique</label> </p>
						
					</div>
					
				</td>
				<td><div id="bt_add" style="float:right;">
					<input type="button" class="bouton" value="Précédent" id="precedST"/>
					<input type="button" class="bouton" value="Enregistrer" id="enregistreST"/></div>
					<div id="CohDroite" style="display:none;">
						<h5><u>Question 1</u></h5>
						<p>Tous les éléments traités dans les stocks répondent-ils aux critères fixés par le PCG ?
							<select id="repAST">
									<option value=""></option>
									<option value="oui">Oui</option>
									<option value="N/A">N/A</option>
									<option value="non">Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtAST"></textarea>						
						
						</p>
						<h5><u>Question 2</u></h5>
						<p>Les principes comptables appliqués par la société sont-ils cohérents avec le secteur dans lequel elle exerce ?
							<select id="repA2ST">
									<option value=""></option>
									<option value="oui">Oui</option>
									<option value="N/A">N/A</option>
									<option value="non">Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtA2ST"></textarea>						
						
						</p>
						<h5><u>Question 3</u></h5>
						<p>La méthode de valorisation et de dépréciation appliquée est-elle utilisée de façon permanente (du moins sur les deux derniers exercices) ?
							<select id="repA3ST">
									<option value=""></option>
									<option value="oui">Oui</option>
									<option value="N/A">N/A</option>
									<option value="non">Non</option>
							</select>
					
						<h5>Commentaires (obligatoire si reponse négative)</h5>
						<textarea id="CmtA3ST" rows="5"></textarea>						
						
						</p>
					</div>
				</td>
			</tr>
		</table>
	
	</body>
</html>
<?php } ?>


