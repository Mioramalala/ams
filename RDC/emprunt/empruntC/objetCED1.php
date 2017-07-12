<?php @session_start();
	$mission_id=$_SESSION['idMission'];
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 1 AND RDC_CYCLE='emprunt_dette' AND RDC_OBJECTIF='C' AND MISSION_ID=".$_SESSION['idMission'];
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 2 AND RDC_CYCLE='emprunt_dette' AND RDC_OBJECTIF='C' AND MISSION_ID=".$_SESSION['idMission'];
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
					$("#ChampGauche").load("RDC/emprunt/empruntC/TabC1.php");
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
							data:{rep:rep1,cmt:cmt1,rang:1,cycle:'emprunt_dette',objet:'C'},
							success:function(e){
							//	alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/emprunt/<?php echo $fichier; ?>",
							data:{rep:rep2,cmt:cmt2,rang:2,cycle:'emprunt_dette',objet:'C'},
							success:function(e){
								//alert(e);
							}				
						});

						var lignes = document.getElementById('nbLignes').value;
						// alert('ok');
						for(var i=0; i<(lignes); i++){
							var compte = document.getElementById('compte_'+i).value;
							var soldeDev = $('#soldeDev_'+i).val();
							var devise = $('#devise_'+i).val();
							var cloture = $('#cloture_'+i).val();
							var soldeReeval = $('#soldeReeval_'+i).val();
							var soldeComp = $('#soldeComp_'+i).val();
							var difference = $('#difference_'+i).val();		
							var observation = $('#observation_'+i).val();	
							if(soldeDev!='' || devise!='' || cloture!='' || soldeReeval!='' || soldeComp!='' || difference!='' || observation!='')
							{add_Input(compte, soldeDev, devise, cloture, soldeReeval, soldeComp, difference, observation, <?php echo $mission_id; ?>);}					
						}

						$("#contenue").load("RDC/emprunt/accED.php");
					}
				});
				$("#retourIT").click(function(){
					$("#contenue").load("RDC/emprunt/accED.php");
				});
				$("#precedIT").click(function(){
					$("#contenue").load("RDC/emprunt/empruntC/objetCED1.php");
				});
			});

	function add_Input(compte, soldeDev, devise, cloture, soldeReeval, soldeComp, difference, observation, mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/emprunt/empruntC/add_Input_C1.php',
			data:{compte:compte,soldeDev:soldeDev,devise:devise, cloture:cloture, soldeReeval:soldeReeval, 
			soldeComp:soldeComp, difference:difference, observation:observation ,mission_id:mission_id},
			success:function(e){

               console.log(e);

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
			F - EVALUATION DES SOLDES : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Contrôler l'évaluation des emprunts en devises. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Tableau d'amortissement des emprunts.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Les emprunts en devises sont-ils réévalués au  taux de clôture ?</li>
						<li>Les différences de change constatées sont-elles correctement comptabilisées ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoi">Réévaluation des emprunts libellés en devises</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantIT" style="float: right; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourIT" style="float: right; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedIT" style="float: right; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["evaluation_visible"]!='OK')
					print 'style="display:none;"'
				?>  >
				<h5><u>Question 1 :</u></h5>
				<p>Les emprunts en devises sont-ils réévalués au  taux de clôture ?
					<select id="rep1" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse1=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse1=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si reponse négative)</h5>
				<textarea id="Cmt1" class="comment"><?php echo $coment1;?></textarea>							
				</p>
				<h5><u>Question 2 :</u></h5>
				<p>Les différences de change constatées sont-elles correctement comptabilisées ?
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
