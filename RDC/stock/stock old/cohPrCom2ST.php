<link rel="stylesheet" href="../../../class/css.css"/>
<?php @session_start();
	include '../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql="SELECT REPONSE_RDC,COMMENTAIR_RDC FROM tab_rdc WHERE RANG_RDC= 2 AND MISSION_ID=".$_SESSION['idMission'];
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
					$("#CohGauche").load("RDC/stock/TabD2ST.php");
					$('#CohDroite').show();
				});
				$("#precedST").click(function(){
					$("#contenue").load("RDC/stock/cohPrComST.php");
				
				});
				
				$("#enregistreST").click(function(){
					var rep=$("#repAST").val();				
					var cmt=$("#CmtAST").val();		
					if(cmt==""){
						alert("Veuiller sélectionner le feuille de travail");
					}
					else{
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPostDrop.php",
							data:{rep:rep,cmt:cmt,rang:2,cycle:'stock'},
							success:function(e){								
							}
							
					
						});
					$("#contenue").load("RDC/stock/cohPrCom3ST.php");
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
					<div id="CohGauche" style="overflow:auto;">
						
							<p>Travaux à faire:Identifier et expliquer l'origine de tout écart significatif entre les deux exercices. </p>
							
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
							<h4>Documents et infos à obtenir (3)</h4>	
							<p>
								<ul>
									<li>Etat récapitulatif des stocks et en-cours (valeurs brutes et provisions) par catégorie et par site sur les deux exercices</li>
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
						<p>Avez-vous effectué l'examen des ratios permettant de mesurer l'importance des stocks en nombre de jours de production (PF & en-cours) ou nombre de jours 
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
					$("#CohGauche").load("RDC/stock/TabD2ST.php");
					$('#CohDroite').show();
				});
				$("#precedST").click(function(){
					$("#contenue").load("RDC/stock/cohPrComST.php");
				
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
								data:{rep:rep,cmt:cmt,rang:2,cycle:'stock'},
								success:function(){
									
								}
								
						
							});
						// }
						$("#contenue").load("RDC/stock/cohPrCom3ST.php");
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
						
							<p>Travaux à faire:Identifier et expliquer l'origine de tout écart significatif entre les deux exercices.</p>
														
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
							<h4>Documents et infos à obtenir (3)</h4>	
							<p>
								<ul>
									<li>Etat récapitulatif des stocks et en-cours (valeurs brutes et provisions) par catégorie et par site sur les deux exercices</li>
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
						<p>Avez-vous effectué l'examen des ratios permettant de mesurer l'importance des stocks en nombre de jours de production (PF & en-cours) ou nombre de jours 
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


