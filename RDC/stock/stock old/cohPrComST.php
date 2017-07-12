<link rel="stylesheet" href="../../../class/css.css"/>
<?php @session_start();
	include '../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql="SELECT REPONSE_RDC,COMMENTAIR_RDC FROM tab_rdc WHERE RANG_RDC= 1 AND MISSION_ID=".$_SESSION['idMission'];
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
					$("#CohGauche").load("RDC/stock/TabD1ST.php");
					$('#CohDroite').show();
				});
				
				$("#enregistreST").click(function(){
					var rep=$("#repAST").val();				
					var cmt=$("#CmtAST").val();										
						$.ajax({
							type:"post",
							url:"RDC/stock/CohPostDrop.php",
							data:{rep:rep,cmt:cmt,rang:1,cycle:'stock'},
							success:function(e){
							}				
					});
					$("#contenue").load("RDC/stock/cohPrCom2ST.php");					
				});
				$("#btn_retD1ST").click(function(){					
					$("#CohGauche").css("background-color","#dcdcdc");
					$("#contenue").load("RDC/stock/cohPrComST.php");
				});
			});
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			A- COHERENCES ET PRINCIPES COMPTABLES &nbsp;&nbsp;Partie I
			
		</div>		
		<table>
			<tr>
				<td>
					<div id="CohGauche">
						
							<p><strong>Travaux à faire :</strong> Identifier et expliquer l'origine de tout écart significatif entre les deux exercices. </p>
							<br />
							<strong>Documents et infos à obtenir</strong>								
								<ul>
									<li>Etats financiers des deux exercices (N-1 et N)</li>
									<li>Balance générale des deux exercices (N-1 et N)</li>
									<li>Etat récapitulatif des stocks et en-cours (valeurs brutes et provisions) par catégorie et par site sur les deux exercices</li>
								</ul>							
							<label id="titrRev">Renvoie : </label>  
							<label id="renvoiRevAnST" style="cursor:pointer;color:red;">Revue analytique et vérification de la variation des stocks</label>					
					</div>
					
				</td>
				<td><div id="bt_add" style="float:right;">
				<input type="button" id="btn_retD1ST" value="Retour" class="bouton"/><br />
				<input type="button" class="bouton" value="Suivant" id="enregistreST"/></div>
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
					$("#CohGauche").load("RDC/stock/TabD1ST.php");
					$('#CohDroite').show();
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
							data:{rep:rep,cmt:cmt,rang:1,cycle:'stock'},
							success:function(e){

							}
							
						});
					
					$("#contenue").load("RDC/stock/cohPrCom2ST.php");
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
				<td><div id="bt_add">
				<input type="button" id="btn_retD1ST" value="Retour" class="bouton"/><br />
				<input type="button" class="bouton" value="Suivant" id="enregistreST"/></div>
					<div id="CohGauche">
						
							<strong>Travaux à faire</strong>:Identifier et expliquer l'origine de tout écart significatif entre les deux exercices. </p>						
							<strong>Documents et infos à obtenir</strong>	
								<ul>
									<li>Etats financiers des deux exercices (N-1 et N)</li>
									<li>Balance générale des deux exercices (N-1 et N)</li>
									<li>Etat récapitulatif des stocks et en-cours (valeurs brutes et provisions) par catégorie et par site sur les deux exercices</li>
								</ul>
							<label id="titrRev">Renvoie : <label>  
							<label id="renvoiRevAnST" style="cursor:pointer;color:red;" >Revue analytique et vérification de la variation des stocks</label> </p>
						
					</div>
					
				</td>
				<td>
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


