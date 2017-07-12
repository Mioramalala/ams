<?php @session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 3 AND RDC_CYCLE='emprunt_dette' AND RDC_OBJECTIF='A' AND MISSION_ID=".$_SESSION['idMission'];
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];

	if(isset($reponse1) && isset($coment1)) $fichier = "miseAjour.php";
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
					// $("#ChampGauche").load("RDC/emprunt/empruntA/TabA2.php");
					$('#rev').fadeOut();
					$('#ChampDroite').show();
					$('#suivantIT').show();
					$('#precedIT').show();
					$('#retourIT').hide();
				});
				$("#suivantIT").click(function(){
					var rep1=$("#rep1").val();				
					var cmt1=$("#Cmt1").val();

					if((rep1=="non" && cmt1=="") || rep1==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/emprunt/<?php echo $fichier; ?>",
							data:{rep:rep1,cmt:cmt1,rang:3,cycle:'emprunt_dette',objet:'A'},
							success:function(e){
							//	alert(e);
							}				
						});
						$("#contenue").load("RDC/emprunt/accED.php");	
					}
				});
				$("#retourIT").click(function(){
					$("#contenue").load("RDC/emprunt/empruntA/objetAED1.php");
				});
				$("#precedIT").click(function(){
					$("#contenue").load("RDC/emprunt/empruntA/objetAED2.php");
				});
			});
			
		function choixrep1(){
			var rep1=$("#rep1").val();				
			var cmt1=$("#Cmt1").val();
			if(rep1=="non" && cmt1==""){
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
			
				<p><strong>Travaux à faire :</strong> Vérifier les méthodes et principes comptables. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Balance générale N et N-1 des comptes d'emprunts</li>
					</ul>
				</p>
				<h4>Question :</h4>	
				<p>
					<ul>
						<li>Les méthodes comptables appliquées sont-elles conformes à celles de l'exercice précédent ?</li>
					</ul>
				</p>
				<p id="rev"><label id="titrRev">Renvoi : </label>  <label id="renvoi">QUESTIONNAIRE</label> </p>
			
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

				<h5><u>Question :</u></h5>
				<p>Les méthodes comptables appliquées sont-elles conformes à celles de l'exercice précédent ?
					<select id="rep1" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse1=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse1=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1" class="comment"><?php echo $coment1;?></textarea>							
				</p>
			</div>
		</div>
	</body>
</html>
