<?php @session_start();
	$mission_id=$_SESSION['idMission'];
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 1 AND RDC_CYCLE='emprunt_dette' AND RDC_OBJECTIF='A' AND MISSION_ID=".$_SESSION['idMission'];
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 2 AND RDC_CYCLE='emprunt_dette' AND RDC_OBJECTIF='A' AND MISSION_ID=".$_SESSION['idMission'];
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
		$reponse2=$don2["RDC_REPONSE"];
		$coment2=$don2["RDC_COMMENTAIRE"];

	if(isset($reponse1) && isset($coment1) && isset($reponse2) && isset($coment2)) $fichier = "miseAjour.php";
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
					$("#ChampGauche").load("RDC/emprunt/empruntA/TabA1.php");
					$('#ChampDroite').show();
					$('#suivantIT').show();
					$('#precedIT').show();
					$('#retourIT').hide();
				});
				$("#suivantIT").click(function(){
					var rep1=$("#rep1").val();				
					var cmt1=$("#Cmt1").val();
					var rep2=$("#rep2").val();				
					var cmt2=$("#Cmt2").val();	
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/emprunt/<?php echo $fichier; ?>",
							data:{rep:rep1,cmt:cmt1,rang:1,cycle:'emprunt_dette',objet:'A'},
							success:function(e){
							//	alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/emprunt/<?php echo $fichier; ?>",
							data:{rep:rep2,cmt:cmt2,rang:2,cycle:'emprunt_dette',objet:'A'},
							success:function(e){
								//alert(e);
							}				
						});

						var synthese = $("#synthese_emprunt").val();	
						var conclusion = $("#conclusion_emprunt").val();	
						if(synthese!=''){add_Synth(synthese, conclusion);}
						if(conclusion!=''){add_Concl(synthese, conclusion);}

						$("#contenue").load("RDC/emprunt/empruntA/objetAED2.php");	
					}
				});
				$("#retourIT").click(function(){
					$("#contenue").load("RDC/emprunt/accED.php");
				});
				$("#precedIT").click(function(){
					$("#contenue").load("RDC/emprunt/empruntA/objetAED1.php");
				});
			});
	function add_Synth(synthese, conclusion){
		$.ajax({
			type:'POST',
			url:'RDC/emprunt/empruntA/add_Synth.php',
			data:{synthese:synthese, conclusion:conclusion, mission_id:<?php echo $mission_id?>},
			success:function(){
			}
		});		
	}	
	function add_Concl(synthese, conclusion){
		$.ajax({
			type:'POST',
			url:'RDC/emprunt/empruntA/add_Concl.php',
			data:{synthese:synthese, conclusion:conclusion, mission_id:<?php echo $mission_id;?>},
			success:function(e){
				// alert(e);
			}
		});		
	}	
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
		</script>
	</head>
	<body>
		<div id="GranTitre">
			A - COHERENCES ET PRINCIPES COMPTABLES : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Analyser la variation des postes par rapport à l'exercice précédent. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Balance générale N et N-1 des comptes d'emprunts.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>A-t-on réalisé la revue analytique des comptes d'emprunts ?</li>
						<li>Est-ce que les variations importantes sont correctement justifiées ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Renvoi : </label>  <label id="renvoi">Revue analytique</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantIT" style="float: right; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourIT" style="float: right; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedIT" style="float: right; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["coherence_visible"]!='OK')
					print 'style="display:none;"'
				?>  >
				<h5><u>Question 1 :</u></h5>
				<p>A-t-on réalisé la revue analytique des comptes de trésorerie ? 
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
				<p>Est-ce que les variations importantes sont correctement justifiées ?
					<select id="rep2" onchange="choixrep2()">
						<option value=""></option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt2" class="comment"><?php echo $coment2;?></textarea>							
				</p>
			</div>
		</div>
	</body>
</html>
