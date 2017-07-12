<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 1 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='B' AND MISSION_ID=".$_SESSION['idMission'];
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
		<link rel="stylesheet" href="../RDC/impot/impot.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<script>
			$(function(){
				$("#renvoi").click(function(){
					//$("#ChampGauche").load("RDC/impot/impotB/TabB1.php");
					$('#ChampDroite').show();
					$('#suivantIT').show();
					$('#precedIT').show();
					$('#retourIT').hide();
					$('#titrRev').hide();
					$('#renvoi').hide();
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
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep1,cmt:cmt1,rang:1,cycle:'impot_taxe',objet:'B'},
							success:function(e){
							}				
						});
						$("#contenue").load("RDC/impot/accIT.php");	
					}
				});
				$("#retourIT").click(function(){
					$("#contenue").load("RDC/impot/accIT.php");
				});
				$("#precedIT").click(function(){
					$("#contenue").load("RDC/impot/impotB/objetBIT1.php");
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
			B - EXHAUSTIVITE DES ENREGISTREMENTS : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Contrôler le paiement et la comptabilisation de tous les impôts et taxes applicables à la société. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Prise de connaissance de tous les impôts et taxes applicables à la société.</li>
						<li>Grand livre des comptes de charges d'impôts.</li>
					</ul>
				</p>
				<h4>Question :</h4>	
				<p>
					<ul>
						<li>Tous les impôts et taxes applicables à la société ont-ils été correctement comptabilisés ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Renvoi : </label>  <label id="renvoi">Questionnaire.</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantIT" style="float: right; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourIT" style="float: right; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedIT" style="float: right; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["exhaustivite_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>Tous les impôts et taxes applicables à la société ont-ils été correctement comptabilisés ? 
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
	<div id="fermer" style="display:none;"><center>
        <p> Voulez-vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>
</html>
