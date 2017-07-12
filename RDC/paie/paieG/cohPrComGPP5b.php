
<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 7 AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 8 AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
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
					$("#ChampGauche").load("RDC/paie/paieG/TabDG5PPb.php");
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
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep1,cmt:cmt1,rang:7,cycle:'paie',objet:'G'},
							success:function(e){

							}				

						});									
						$.ajax({
							type:"POST",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep2,cmt:cmt2,rang:8,cycle:'paie',objet:'G'},
							success:function(e){
							}				
						});
						for (var i = 1; i <= 4; i++) {
							var periode = $("#PC"+i).text();
							var snp = $("#NPCNAPS"+i).val();
							var sp = $("#plafone"+i).val();
							var pe1 = $("#PECNAPS1T"+i).text();
							var pe13 = $("#PECNAPS13T"+i).text();
							$.ajax({
								type:"post",
								url:"RDC/paie/paieG/save5bCnaps.php",
								data:{periode:periode,snp:snp,sp:sp,pe1:pe1,pe13:pe13},
								success:function(e){
								}				
							});
							var id = "";
							var total = "";
							var compta = "";
							var ecart = "";
							switch(i){
								case 1:
									id = "cnaps_salaire_non_plafonees";
									total = $("#totalNPCNAPS").text();
									compta = $("#comptNPCNAPS").val();
									ecart = $("#ecartNPCNAPS").text();
									break;
								case 2:
									id = "cnaps_salaire_plafonees";
									total = $("#totalPCNAPS").text();
									compta = $("#comptPCNAPS").val();
									ecart = $("#ecartPCNAPS").text();
									break;
								case 3:
									id = "cnaps_pe1";
									total = $("#totalPECNAPS1").text();
									compta = $("#comptPECNAPS1").val();
									ecart = $("#ecartPECNAPS1").text();
									break;
								case 4:
									id = "cnaps_pe13";
									total = $("#totalPECNAPS13").text();
									compta = $("#comptPECNAPS13").val();
									ecart = $("#ecartPECNAPS13").text();
									break;
								default :
									break;
							}
							$.ajax({
								type:"post",
								url:"RDC/paie/paieD/saveD1prime.php",
								data:{total:total,compta:compta,ecart:ecart,id:id},
								success:function(e){
								}				
							});		
						};
						for (var i = 1; i <= 4; i++) {
							var periode = $("#PS"+i).text();
							var snp = $("#NPSMIDS"+i).val();
							var pe1 = $("#PESMIDS1T"+i).text();
							var pe5 = $("#PESMIDS5T"+i).text();
							var total = $("#TPET"+i).text();
																
							$.ajax({
								type:"post",
								url:"RDC/paie/paieG/save5bSmids.php",
								data:{periode:periode,snp:snp,pe1:pe1,pe5:pe5,total:total},
								success:function(e){
								}				
							});
							var id = "";
							var total = "";
							var compta = "";
							var ecart = "";
							switch(i){
								case 1:
									id = "smids_salaire_non_plafonees";
									total = $("#totalNPSMIDS").text();
									compta = $("#comptNPSMIDS").val();
									ecart = $("#ecartNPSMIDS").text();
									break;
								case 2:
									id = "smids_pe1";
									total = $("#totalPESMIDS1").text();
									compta = $("#comptPESMIDS1").val();
									ecart = $("#ecartPESMIDS1").text()
									break;
								case 3:
									id = "smids_pe5";
									total = $("#totalPESMIDS5").text();
									compta = $("#comptPESMIDS5").val();
									ecart = $("#ecartPESMIDS5").text();
									break;
								case 4:
									id = "smids_total";
									total = $("#totalTPE").text();
									compta = $("#comptTPE").val();
									ecart = $("#ecartTPE").text();
									break;
								default :
									break;
							}
							$.ajax({
								type:"post",
								url:"RDC/paie/paieD/saveD1prime.php",
								data:{total:total,compta:compta,ecart:ecart,id:id},
								success:function(e){
								}				
							});		
						};
						$("#contenue").load("RDC/paie/paieG/cohPrComGPP5c.php");
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP5a.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP5b.php");
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
						<li>Balance générale.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Confirmez-vous que les charges sociales patronales relatives aux déclarations sociales correspondent avec la comptabilité ?</li>
						<li>Sinon, l'écart est-il justifié ou régularisé ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Cadrage des salaires bruts déclarés à la CNaPS et au SMIDS</label> </p>
			
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
				<p>Confirmez-vous que les charges sociales patronales relatives aux déclarations sociales correspondent avec la comptabilité ?
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
					$("#ChampGauche").load("RDC/paie/paieG/TabDG5PPb.php");
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
							data:{rep:rep1,cmt:cmt1,rang:7,cycle:'paie',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep2,cmt:cmt2,rang:8,cycle:'paie',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});
						$("#contenue").load("RDC/paie/paieG/cohPrComGPP5c.php");	
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP5a.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP5b.php");
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
						<li>Balance générale.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Confirmez-vous que les charges sociales patronales relatives aux déclarations sociales correspondent avec la comptabilité ?</li>
						<li>Sinon, l'écart est-il justifié ou régularisé ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Cadrage des salaires bruts déclarés à la CNaPS et au SMIDS</label> </p>
			
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
				<p>Confirmez-vous que les charges sociales patronales relatives aux déclarations sociales correspondent avec la comptabilité ?
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
				<textarea id="Cmt2APP" class="comment" name="text1"><?php echo $coment2;?></textarea>							
				</p>
			</div>
		</div>
	<div id="fermer" style=""><center>
        <p> Voulez-vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>
</html>
<?php } ?>
