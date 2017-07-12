
<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 9 AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 10 AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
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
					$("#ChampGauche").load("RDC/paie/paieG/TabDG5PPc.php");
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
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep1,cmt:cmt1,rang:9,cycle:'paie',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep2,cmt:cmt2,rang:10,cycle:'paie',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});
						var irsa = $("#irsa").text();
						var cnaps = $("#cnaps").text();
						var ecart = $("#ecart").text();
						var cmt = $("#commentaire").val();									
						$.ajax({
							type:"post",
							url:"RDC/paie/paieG/save5c.php",
							data:{irsa:irsa,cnaps:cnaps,ecart:ecart,cmt:cmt},
							success:function(e){
							//	alert(e);
							}				
						});
						$("#contenue").load("RDC/paie/accPP.php");		
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP5b.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP5c.php");
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
			H - JURIDIQUE, FISCAL ET DIVERS : Partie V
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Cadrer les salaires avec les déclarations de l'IRSA, CNaPS et OSIE. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Balance générale.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Assurez-vous l'absence d'écart entre les salaires bruts déclarés à l'IRSA et ceux à la CNaPS ?</li>
						<li>Sinon, l'écart est-il justifié ou régularisé ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Rapprochement salaires bruts IRSA/CNaPS</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">|" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["juridique_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>Assurez-vous l'absence d'écart entre les salaires bruts déclarés à l'IRSA et ceux à la CNaPS ?
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
				<p>Sinon, l'écart est-il justifié ou régularisé ?
					<select id="rep2APP" onchange="choixrep2()">
						<option value=""></option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si reponse négative)</h5>
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
					$("#ChampGauche").load("RDC/paie/paieG/TabDG5PPc.php");
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
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep1,cmt:cmt1,rang:9,cycle:'paie',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep2,cmt:cmt2,rang:10,cycle:'paie',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});
						var irsa = $("#irsa").text();
						var cnaps = $("#cnaps").text();
						var ecart = $("#ecart").text();
						var cmt = $("#commentaire").val();									
						$.ajax({
							type:"post",
							url:"RDC/paie/paieG/save5c.php",
							data:{irsa:irsa,cnaps:cnaps,ecart:ecart,cmt:cmt},
							success:function(e){
							//	alert(e);
							}				
						});
						$("#contenue").load("RDC/paie/accPP.php");	
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP5b.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP5c.php");
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
			H - JURIDIQUE, FISCAL ET DIVERS : Partie V
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Cadrer les salaires avec les déclarations de l'IRSA, CNaPS et OSIE. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Balance générale.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Assurez-vous l'absence d'écart entre les salaires bruts déclarés à l'IRSA et ceux à la CNaPS ?</li>
						<li>Sinon, l'écart est-il justifié ou régularisé ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Rapprochement salaires bruts IRSA/CNaPS</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">|" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["juridique_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>Assurez-vous l'absence d'écart entre les salaires bruts déclarés à l'IRSA et ceux à la CNaPS ?
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
				<p>Sinon, l'écart est-il justifié ou régularisé ?
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