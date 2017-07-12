<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 1 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='C' AND MISSION_ID=".$_SESSION['idMission'];
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
	$reponse1=$don1["RDC_REPONSE"];
	$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 2 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='C' AND MISSION_ID=".$_SESSION['idMission'];
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
	$reponse2=$don2["RDC_REPONSE"];
	$coment2=$don2["RDC_COMMENTAIRE"];
$fichier="";
	if(isset($reponse1) && isset($coment1) && isset($reponse2) && isset($coment2))
	$fichier = "miseAjour.php";
	else 
	$fichier = "insert.php";
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../RDC/impot/impot.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<script>
			$(function(){
				$("#renvoi").click(function(){
					$("#ChampGauche").load("RDC/impot/impotC/TabC1.php");
					$('#ChampDroite').show();
					$('#suivantIT').show();
					$('#precedIT').show();
					$('#retourIT').hide();
				});
				$("#suivantIT").click(function(){
					$('#submit').click();
					var rep1=$("#rep1").val();				
					var cmt1=$("#Cmt1").val();
					var rep2=$("#rep2").val();				
					var cmt2=$("#Cmt2").val();
					var redaction = $("#redaction").val();
					var nomFichier = $("#fichier").val();	
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{

						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep1,cmt:cmt1,rang:1,cycle:'impot_taxe',objet:'C'},
							success:function(e){
								//alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep2,cmt:cmt2,rang:2,cycle:'impot_taxe',objet:'C'},
							success:function(e){
							//alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/impot/impotC/saveC1.php",
							data:{redaction:redaction,nomFichier:nomFichier},
							success:function(e){
								//alert("REDACTION"+e);
							}				
						});
						$("#contenue").load("RDC/impot/impotC/objetCIT2.php");		
					}
				});
				$("#retourIT").click(function(){
					$("#contenue").load("RDC/impot/accIT.php");
				});
				$("#precedIT").click(function(){
					$("#contenue").load("RDC/impot/impotC/objetCIT1.php");
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
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			C - REGULARITE DES ENREGISTREMENTS : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Contrôler la détermination du résultat fiscal. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Tableau de calcul du résultat fiscal.</li>
						<li>Détails des charges à réintégrer (Cf. cycle "charges/fournisseurs").</li>
						<li>Produits à déduire (suivant contrôle du cycle vente).</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>A-t-on obtenu le tableau de détermination du résultat fiscal ?</li>
						<li>Le mode de calcul du résultat fiscal est-il correct ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoi">Résultat fiscal</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantIT" style="float: right; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourIT" style="float: right; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedIT" style="float: right; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["regularite_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>A-t-on obtenu le tableau de détermination du résultat fiscal ? 
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
				<p>Le mode de calcul du résultat fiscal est-il correct ?
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
	<div id="fermer" style="display:none;"><center>
        <p> Voulez-vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>
</html>
