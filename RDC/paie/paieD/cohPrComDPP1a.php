
<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 2 AND RDC_OBJECTIF='D' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 3 AND RDC_OBJECTIF='D' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
		$reponse2=$don2["RDC_REPONSE"];
		$coment2=$don2["RDC_COMMENTAIRE"];

	if(isset($reponse2) && isset($coment2) && isset($reponse1) && isset($coment1)){
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<link rel="stylesheet" href="../../../class/css.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<script>
			$(function(){
				$("#renvoiRevAnPP").click(function(){
					//$("#ChampGauche").load("RDC/paie/paieD/TabDD1PPa.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
				});
				$("#suivantPP").click(function(){
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();
					var rep2=$("#rep2APP").val();				
					var cmt2=$("#Cmt2APP").val();
					var ra_compte = "";
					var ra_cmt = "";
					var synthese = $("#synthese").val();
					var conclusion = $("#conclusion").val();
					var compteur = parseInt($("#compteur").attr('alt')); // Compte le nombre de ligne du revu analitique
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep1,cmt:cmt1,rang:2,cycle:'paie',objet:'D'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep2,cmt:cmt2,rang:3,cycle:'paie',objet:'D'},
							success:function(e){
							//	alert(e);
							}				
						});
						for (var i = 1; i < compteur; i++) {// Pour la revu analityque
							ra_compte = $("#compte"+i).text();
							ra_cmt = $("#cmt"+i).val();								
							$.ajax({
								type:"post",
								url:"RDC/paie/paieD/saveD1a.php",
								data:{compte:ra_compte,cmt:ra_cmt},
								success:function(e){
								}				
							});
						}								
						$.ajax({ //Pour la synthese de la revu analytique
							type:"post",
							url:"RDC/paie/paieD/saveD1a.php",
							data:{synthese:synthese,conclusion:conclusion},
							success:function(e){
							}				
						});
						$("#contenue").load("RDC/paie/accPP.php");	
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieD/cohPrComDPP1.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieD/cohPrComDPP1a.php");
				});
			});
			function choixrep1(){
				var rep1=$("#rep1APP").val();				
				var cmt1=$("#Cmt1APP").val();
				if(rep1=="non" && cmt1==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
			function choixrep2(){
				var rep2=$("#rep2APP").val();				
				var cmt2=$("#Cmt2APP").val();
				if(rep2=="non" && cmt2==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
		
		</script>
	</head>
	<body>		
		<div id="GranTitre">
			 E - EXISTENCE DES SOLDES : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Justifier les soldes du bilan : impôts sur les salaires, rémunérations dues, prêts et acomptes au personnel. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Grand livres des comptes 42.</li>
						<li>Etat des avances : quinzaine et spéciale.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Le compte "421 rémunérations dues" est-il soldé ?</li>
						<li>Les avances au personnel sont-elles toutes justifiées ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail: </label>  <label id="renvoiRevAnPP">Questionnaires</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">|" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["existence_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>Le compte "421 rémunérations dues" est-il soldé ?
					<select id="rep1APP" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse1=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse1=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1APP" class="comment"><?php echo $coment1;?></textarea>							
				</p>
				<h5><u>Question 2 :</u></h5>
				<p>Les avances au personnel sont-elles toutes justifiées ?
					<select id="rep2APP" onchange="choixrep2()">
						<option value=""></option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt2APP" class="comment"><?php echo $coment2;?></textarea>							
				</p>
			</div>
		</div>
	<div id="fermer" style="display:none;"><center>
        <p> Voulez-vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>
</html>
<?php }
else{
 ?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<script>
			$(function(){
				$("#renvoiRevAnPP").click(function(){
					//$("#ChampGauche").load("RDC/paie/paieD/TabDD1PPa.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
				});
				$("#suivantPP").click(function(){
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();
					var rep2=$("#rep2APP").val();				
					var cmt2=$("#Cmt2APP").val();
					var ra_compte = "";
					var ra_cmt = "";
					var synthese = $("#synthese").val();
					var conclusion = $("#conclusion").val();
					var compteur = parseInt($("#compteur").attr('alt')); // Compte le nombre de ligne du revu analitique
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep1,cmt:cmt1,rang:2,cycle:'paie',objet:'D'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep2,cmt:cmt2,rang:3,cycle:'paie',objet:'D'},
							success:function(e){
							//	alert(e);
							}				
						});
						for (var i = 1; i < compteur; i++) {// Pour la revu analityque
							ra_compte = $("#compte"+i).text();
							ra_cmt = $("#cmt"+i).val();								
							$.ajax({
								type:"post",
								url:"RDC/paie/paieD/saveD1a.php",
								data:{compte:ra_compte,cmt:ra_cmt},
								success:function(e){
								}				
							});
						}								
						$.ajax({ //Pour la synthese de la revu analytique
							type:"post",
							url:"RDC/paie/paieD/saveD1a.php",
							data:{synthese:synthese,conclusion:conclusion},
							success:function(e){
							}				
						});
						$("#contenue").load("RDC/paie/accPP.php");	
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieD/cohPrComDPP1.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieD/cohPrComDPP1a.php");
				});
			});
			function choixrep1(){
				var rep1=$("#rep1APP").val();				
				var cmt1=$("#Cmt1APP").val();
				if(rep1=="non" && cmt1==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
			function choixrep2(){
				var rep2=$("#rep2APP").val();				
				var cmt2=$("#Cmt2APP").val();
				if(rep2=="non" && cmt2==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
		
		</script>
	</head>
	<body>		
		<div id="GranTitre">
			 E - EXISTENCE DES SOLDES : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Justifier les soldes du bilan : impôts sur les salaires, rémunérations dues, prêts et acomptes au personnel. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Grand livres des comptes 42.</li>
						<li>Etat des avances : quinzaine et spéciale.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Le compte "421 rémunérations dues" est-il soldé ?</li>
						<li>Les avances au personnel sont-elles toutes justifiées ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Questionniares</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">|" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["existence_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>Le compte "421 rémunérations dues" est-il soldé ?
					<select id="rep1APP" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse1=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse1=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1APP" class="comment"><?php echo $coment1;?></textarea>							
				</p>
				<h5><u>Question 2 :</u></h5>
				<p>Les avances au personnel sont-elles toutes justifiées ?
					<select id="rep2APP" onchange="choixrep2()">
						<option value=""></option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt2APP" class="comment"><?php echo $coment2;?></textarea>							
				</p>
			</div>
		</div>
	<div id="fermer" style="display:none;"><center>
        <p> Voulez-vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>
</html>
<?php } ?>