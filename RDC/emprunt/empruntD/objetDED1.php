<?php 
	@session_start();

	$mission_id=$_SESSION['idMission'];
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 1 AND RDC_CYCLE='emprunt_dette' AND RDC_OBJECTIF='D' AND MISSION_ID=".$mission_id;
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 2 AND RDC_CYCLE='emprunt_dette' AND RDC_OBJECTIF='D' AND MISSION_ID=".$mission_id;
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
		$reponse2=$don2["RDC_REPONSE"];
		$coment2=$don2["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql3="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 3 AND RDC_CYCLE='emprunt_dette' AND RDC_OBJECTIF='D' AND MISSION_ID=".$mission_id;
	$rep3=$bdd->query($sql3);
	$don3=$rep3->fetch();
		$reponse3=$don3["RDC_REPONSE"];
		$coment3=$don3["RDC_COMMENTAIRE"];

	if(isset($reponse1) && isset($coment1) && isset($reponse2) && isset($coment2) && isset($reponse3) && isset($coment3)) $fichier = "miseAjour.php";
	else $fichier = "insert.php";
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../RDC/emprunt/emprunt.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<script>
			$(function(){
				$("#renvoi").click(function(){
					// $("#ChampGauche").load("RDC/emprunt/empruntD/TabD1.php");
					$("#rev").fadeOut();
					$('#ChampDroite').show();
					$('#suivantIT').show();
					$('#precedIT').show();
					$('#retourIT').hide();
					$("#renvoi").fadeOut();
				});
				$("#suivantIT").click(function(){
					var rep1=$("#rep1").val();				
					var cmt1=$("#Cmt1").val();
					var rep2=$("#rep2").val();				
					var cmt2=$("#Cmt2").val();
					var rep3=$("#rep3").val();				
					var cmt3=$("#Cmt3").val();	
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || (rep3=="non" && cmt3=="") || rep1=="" || rep2=="" || rep3==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/emprunt/<?php echo $fichier; ?>",
							data:{rep:rep1,cmt:cmt1,rang:1,cycle:'emprunt_dette',objet:'D'},
							success:function(e){
							//	alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/emprunt/<?php echo $fichier; ?>",
							data:{rep:rep2,cmt:cmt2,rang:2,cycle:'emprunt_dette',objet:'D'},
							success:function(e){
								//alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/emprunt/<?php echo $fichier; ?>",
							data:{rep:rep3,cmt:cmt3,rang:3,cycle:'emprunt_dette',objet:'D'},
							success:function(e){
								//alert(e);
							}				
						});

						$("#contenue").load("RDC/emprunt/accED.php");	
					}
				});
				$("#retourIT").click(function(){
					$("#contenue").load("RDC/emprunt/accED.php");
				});
				$("#precedIT").click(function(){
					$("#contenue").load("RDC/emprunt/empruntD/objetDED1.php");
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
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			I - INFORMATION ET PRESENTATION : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Vérifier les informations données en annexe. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Etats financiers.</li>
						<li>Notes annexes.</li>
						<li>Grand livre des comptes 66 et 76.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Avez-vous vérifié les engagements financiers non inscrits au bilan (hypothèque, garanties, …) ?</li>
						<li>Les engagements hors bilan sont-ils régulièrement mentionnés dans les annexes aux états financiers ?</li>
						<li>Les différence de change présentant un montant significatif sont-elles données en annexes ?</li>
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
					if(@$_GET["information_visible"]!='OK')
					print 'style="display:none;"'
				?>  >
			
				<h5><u>Question 1 :</u></h5>
				<p>Avez-vous vérifié les engagements financiers non inscrits au bilan (hypothèque, garanties, …) ? 
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
				<p>Les engagements hors bilan sont-ils régulièrement mentionnés dans les annexes aux états financiers ?
					<select id="rep2" onchange="choixrep2()">
						<option value=""></option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt2" class="comment"><?php echo $coment2;?></textarea>							
				</p>
				<h5><u>Question 3 :</u></h5>
				<p>Les différence de change présentant un montant significatif sont-elles données en annexes ?
					<select id="rep3" onchange="choixrep3()">
						<option value=""></option>
						<option value="oui" <?php if($reponse3=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse3=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse3=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt3" class="comment"><?php echo $coment3;?></textarea>							
				</p>
			</div>
		</div>
	</body>
</html>
