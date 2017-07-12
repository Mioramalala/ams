<?php @session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 2 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission'];
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 3 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission'];
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
		$reponse2=$don2["RDC_REPONSE"];
		$coment2=$don2["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql3="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 4 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission'];
	$rep3=$bdd->query($sql3);
	$don3=$rep3->fetch();
		$reponse3=$don3["RDC_REPONSE"];
		$coment3=$don3["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql4="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 5 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission'];
	$rep4=$bdd->query($sql4);
	$don4=$rep4->fetch();
		$reponse4=$don4["RDC_REPONSE"];
		$coment4=$don4["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql5="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 6 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission'];
	$rep5=$bdd->query($sql5);
	$don5=$rep5->fetch();
		$reponse5=$don5["RDC_REPONSE"];
		$coment5=$don5["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql6="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 7 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission'];
	$rep6=$bdd->query($sql6);
	$don6=$rep6->fetch();
		$reponse6=$don6["RDC_REPONSE"];
		$coment6=$don6["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql7="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 8 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission'];
	$rep7=$bdd->query($sql7);
	$don7=$rep7->fetch();
		$reponse7=$don7["RDC_REPONSE"];
		$coment7=$don7["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql8="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 9 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='G' AND MISSION_ID=".$_SESSION['idMission'];
	$rep8=$bdd->query($sql8);
	$don8=$rep8->fetch();
		$reponse8=$don8["RDC_REPONSE"];
		$coment8=$don8["RDC_COMMENTAIRE"];

	if(isset($reponse1) && isset($coment1) && isset($reponse2) && isset($coment2) && isset($reponse3) && isset($coment3) && isset($reponse4) && isset($coment4) &&
		isset($reponse5) && isset($coment5) && isset($reponse6) && isset($coment6) && isset($reponse7) && isset($coment7) && isset($reponse8) && isset($coment8)) $fichier = "miseAjour.php";
	else $fichier = "insert.php";
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../RDC/impot/impot.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<script>
			$(function(){
				$("#renvoi").click(function(){
					// $("#ChampGauche").load("RDC/impot/impotG/TabG2.php");
					$('#ChampDroite').show();
					$('#suivantIT').show();
					$('#precedIT').show();
					$('#retourIT').hide();
					$('#rev').fadeOut();
				});
				$("#suivantIT").click(function(){
					var rep1=$("#rep1").val();				
					var cmt1=$("#Cmt1").val();
					var rep2=$("#rep2").val();				
					var cmt2=$("#Cmt2").val();
					var rep3=$("#rep3").val();				
					var cmt3=$("#Cmt3").val();
					var rep4=$("#rep4").val();				
					var cmt4=$("#Cmt4").val();
					var rep5=$("#rep5").val();				
					var cmt5=$("#Cmt5").val();
					var rep6=$("#rep6").val();				
					var cmt6=$("#Cmt6").val();
					var rep7=$("#rep7").val();				
					var cmt7=$("#Cmt7").val();
					var rep8=$("#rep8").val();				
					var cmt8=$("#Cmt8").val();	
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || (rep3=="non" && cmt3=="") || (rep4=="non" && cmt4=="") || (rep5=="non" && cmt5=="") || (rep6=="non" && cmt6=="") || (rep7=="non" && cmt7=="") || (rep8=="non" && cmt8=="") || rep1=="" || rep2=="" || rep3=="" || rep4=="" || rep5=="" || rep6=="" || rep7=="" || rep8==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep1,cmt:cmt1,rang:2,cycle:'impot_taxe',objet:'G'},
							success:function(e){
							//	alert(e8;
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep2,cmt:cmt2,rang:3,cycle:'impot_taxe',objet:'G'},
							success:function(e){
								//alert(e);
							}				
						});								
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep3,cmt:cmt3,rang:4,cycle:'impot_taxe',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep4,cmt:cmt4,rang:5,cycle:'impot_taxe',objet:'G'},
							success:function(e){
								//alert(e);
							}				
						});								
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep5,cmt:cmt5,rang:6,cycle:'impot_taxe',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep6,cmt:cmt6,rang:7,cycle:'impot_taxe',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep7,cmt:cmt7,rang:8,cycle:'impot_taxe',objet:'G'},
							success:function(e){
								//alert(e);
							}				
						});								
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep8,cmt:cmt8,rang:9,cycle:'impot_taxe',objet:'G'},
							success:function(e){
							//	alert(e);
							}				
						});
						$("#contenue").load("RDC/impot/accIT.php");		
					}
				});
				$("#retourIT").click(function(){
					$("#contenue").load("RDC/impot/impotG/objetGIT1.php");
				});
				$("#precedIT").click(function(){
					$("#contenue").load("RDC/impot/impotG/objetGIT2.php");
				});
			});
			function choixrep1(){
				var rep1=$("#rep1").val();				
				var cmt1=$("#Cmt1").val();
				if(rep1=="non" && cmt1==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
			function choixrep2(){
				var rep2=$('#rep2').val();
				var cmt2=$('#Cmt2').val();
				if(rep2=="non" && cmt2==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
			function choixrep3(){
				var rep3=$('#rep3').val();
				var cmt3=$('#Cmt3').val();
				if(rep3=="non" && cmt3==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
			function choixrep4(){
				var rep4=$('#rep4').val();
				var cmt4=$('#Cmt4').val();
				if(rep4=="non" && cmt4==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
			function choixrep5(){
				var rep5=$("#rep5").val();				
				var cmt5=$("#Cmt5").val();
				if(rep5=="non" && cmt5==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
			function choixrep6(){
				var rep6=$('#rep6').val();
				var cmt6=$('#Cmt6').val();
				if(rep6=="non" && cmt6==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
			function choixrep7(){
				var rep7=$('#rep7').val();
				var cmt7=$('#Cmt7').val();
				if(rep7=="non" && cmt7==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
			function choixrep8(){
				var rep8=$('#rep8').val();
				var cmt8=$('#Cmt8').val();
				if(rep8=="non" && cmt8==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			H - JURIDIQUE FISCAL ET DIVERS : Partie II	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Examiner la situation fiscale.</p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Situation fiscale (211bis).</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Avez-vous analysé la situation fiscale de la société ?</li>
						<li>Avez-vous recensé et vérifié que la société est en règle par rapport aux impôts, droits et taxes suivants :</li>
							<dd>- IR/TVA intermittent</dd>
							<dd>- IRCM</dd>
							<dd>- Droit d'enregistrement</dd>
							<dd>- IFPB</dd>
							<dd>- IFT</dd>
							<dd>- Droit de communication (se référer aux art. 20.06.12 et suivants)</dd>
							<dd>- Droit d'accises</dd>
					</ul>
				</p>
				<p id="rev"><label id="titrRev">Feuille de travail : </label>  <label id="renvoi">QUESTIONNAIRE</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantIT" style="float: right; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourIT" style="float: right; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedIT" style="float: right; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["juridique_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>Avez-vous analysé la situation fiscale de la société ?
					<select id="rep1" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse1=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse1=="non") echo 'selected';?>>non</option>
					</select>
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1" class="comment"><?php echo $coment1;?></textarea>							
				</p>
				<h5><u>Question 2 :</u></h5>
				<p>Avez-vous recensé et vérifié que la société est en règle par rapport aux impôts, droits et taxes suivants :<br />
					<dd>- IR/TVA intermittent</dd>
					<select id="rep2" onchange="choixrep2()">
						<option value=""></option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt2" class="comment"><?php echo $coment2;?></textarea>							
				</p>
					<dd>- IRCM</dd>
					<select id="rep3" onchange="choixrep3()">
						<option value=""></option>
						<option value="oui" <?php if($reponse3=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse3=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse3=="non") echo 'selected';?>>non</option>
					</select>
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt3" class="comment"><?php echo $coment3;?></textarea>							
				</p>
					<dd>- Droit d'enregistrement</dd>
					<select id="rep4" onchange="choixrep4()">
						<option value=""></option>
						<option value="oui" <?php if($reponse4=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse4=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse4=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt4" class="comment"><?php echo $coment4;?></textarea>							
				</p>
					<dd>- IFPB</dd>
					<select id="rep5" onchange="choixrep5()">
						<option value=""></option>
						<option value="oui" <?php if($reponse5=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse5=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse5=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt5" class="comment"><?php echo $coment5;?></textarea>							
				</p>
					<dd>- IFT</dd>
					<select id="rep6" onchange="choixrep6()">
						<option value=""></option>
						<option value="oui" <?php if($reponse6=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse6=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse6=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt6" class="comment"><?php echo $coment6;?></textarea>							
				</p>
					<dd>- Droit de communication (se référer aux art. 20.06.12 et suivants)</dd>
					<select id="rep7" onchange="choixrep7()">
						<option value=""></option>
						<option value="oui" <?php if($reponse7=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse7=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse7=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt7" class="comment"><?php echo $coment7;?></textarea>							
				</p>
					<dd>- Droit d'accises</dd>
					<select id="rep8" onchange="choixrep8()">
						<option value=""></option>
						<option value="oui" <?php if($reponse8=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse8=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse8=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt8" class="comment"><?php echo $coment8;?></textarea>							
				</p>
			</div>
		</div>
	</body>
</html>
