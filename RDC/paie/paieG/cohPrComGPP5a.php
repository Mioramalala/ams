
<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 5 AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 6 AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
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
					$("#ChampGauche").load("RDC/paie/paieG/TabDG5PPa.php");
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
							data:{rep:rep1,cmt:cmt1,rang:5,cycle:'paie',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep2,cmt:cmt2,rang:6,cycle:'paie',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});
						var compteur = parseInt($("#ajout").attr('alt'));
						for (var i = 1; i <= compteur; i++) {
							var periode = $("#periode"+i).val();
							var nbr = $("#nbr"+i).val();
							var avt = parseFloat($("#avt"+i).val());
							var salaire = parseFloat($("#salaire"+i).val());
							var salaireT = parseFloat($("#salaireT"+i).val());
							var totalD = parseFloat($("#totalD"+i).text());
							var irsa = parseFloat($("#irsa"+i).val());
							var persT = $("#persT"+i).val();	

							$.ajax({
								type:"post",
								url:"RDC/paie/paieG/saveG5a.php",
								data:{periode:periode,nbr:nbr,avt:avt.toFixed(2),salaire:salaire.toFixed(2),salaireT:salaireT.toFixed(2),totalD:totalD.toFixed(2),irsa:irsa.toFixed(2),persT:persT},
								success:function(e){
									//alert(periode+" "+nbr);
								}				

							});
						};
						var tableau = new Array("avt","salaire","salaireT","totalD","irsa");
						for(var i=0; i< tableau.length; i++ ){
							var total = parseFloat($('#total'+tableau[i]).text());						
							var compta = parseFloat($('#Compt'+tableau[i]).val());						
							var ecart = parseFloat($('#ecart'+tableau[i]).text());
							var id = "";
							switch(tableau[i]){
								case "avt":
									id = "avantage nature";
									break;
								case "salaire":
									id = "salaires bruts";
									break;
								case "salaireT":
									id = "salaires temporaires";
									break;
								case "totalD":
									id = "total salaire declare";
									break;
								case "irsa":
									id = "irsa";
									break;
								default :
									break;
							}
							$.ajax({
								type:"post",
								url:"RDC/paie/paieG/saveG5aprime.php",
								data:{total:total,compta:compta,ecart:ecart,id:id},
								success:function(e){

								}				
							});
						}
						$("#contenue").load("RDC/paie/paieG/cohPrComGPP5b.php");
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP4.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP5a.php");
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
						<li>Déclarations IRSA, CNaPS et OSIE.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Confirmez-vous l'absence d'écart entre les salaires bruts déclarés à l'IRSA et ceux comptabilisés ?</li>
						<li>Sinon, l'écart est-il justifié ou régularisé ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Cadrage des salaires bruts déclarés à l'IRSA</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["juridique_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>Confirmez-vous l'absence d'écart entre les salaires bruts déclarés à l'IRSA et ceux comptabilisés ?
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
					$("#ChampGauche").load("RDC/paie/paieG/TabDG5PPa.php");
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
							type:"POST",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep1,cmt:cmt1,rang:5,cycle:'paie',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep2,cmt:cmt2,rang:6,cycle:'paie',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});
						var compteur = parseInt($("#ajout").attr('alt'));
						for (var i = 1; i <= compteur; i++) {
							var periode = $("#periode"+i).val();
							var nbr = $("#nbr"+i).val();
							var avt = parseFloat($("#avt"+i).val());
							var salaire = parseFloat($("#salaire"+i).val());
							var salaireT = parseFloat($("#salaireT"+i).val());
							var totalD = parseFloat($("#totalD"+i).text());
							var irsa = parseFloat($("#irsa"+i).val());
							var persT = $("#persT"+i).val();	

							$.ajax({
								type:"post",
								url:"RDC/paie/paieG/saveG5a.php",
								data:{periode:periode,nbr:nbr,avt:avt.toFixed(2),salaire:salaire.toFixed(2),salaireT:salaireT.toFixed(2),totalD:totalD.toFixed(2),irsa:irsa.toFixed(2),persT:persT},
								success:function(e){

								}				

							});
						};
						var tableau = new Array("avt","salaire","salaireT","totalD","irsa");
						for(var i=0; i< tableau.length; i++ ){
							var total = parseFloat($('#total'+tableau[i]).text());						
							var compta = parseFloat($('#Compt'+tableau[i]).val());						
							var ecart = parseFloat($('#ecart'+tableau[i]).text());
							var id = "";
							switch(tableau[i]){
								case "avt":
									id = "avantage nature";
									break;
								case "salaire":
									id = "salaires bruts";
									break;
								case "salaireT":
									id = "salaires temporaires";
									break;
								case "totalD":
									id = "total salaire declare";
									break;
								case "irsa":
									id = "irsa";
									break;
								default :
									break;
							}
							$.ajax({
								type:"post",
								url:"RDC/paie/paieG/saveG5aprime.php",
								data:{total:total,compta:compta,ecart:ecart,id:id},
								success:function(e){
								}				
							});
						}
						$("#contenue").load("RDC/paie/paieG/cohPrComGPP5b.php");	
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP4.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP5a.php");
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
						<li>Déclarations IRSA, CNaPS et OSIE.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Confirmez-vous l'absence d'écart entre les salaires bruts déclarés à l'IRSA et ceux comptabilisés ?</li>
						<li>Sinon, l'écart est-il justifié ou régularisé ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Cadrage des salaires bruts déclarés à l'IRSA</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["juridique_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>Confirmez-vous l'absence d'écart entre les salaires bruts déclarés à l'IRSA et ceux comptabilisés ?
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