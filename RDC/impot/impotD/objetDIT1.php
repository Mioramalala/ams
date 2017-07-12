<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 1 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='D' AND MISSION_ID=".$_SESSION['idMission'];
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 2 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='D' AND MISSION_ID=".$_SESSION['idMission'];
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
		$reponse2=$don2["RDC_REPONSE"];
		$coment2=$don2["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql3="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 3 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='D' AND MISSION_ID=".$_SESSION['idMission'];
	$rep3=$bdd->query($sql3);
	$don3=$rep3->fetch();
		$reponse3=$don3["RDC_REPONSE"];
		$coment3=$don3["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql4="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 4 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='D' AND MISSION_ID=".$_SESSION['idMission'];
	$rep4=$bdd->query($sql4);
	$don4=$rep4->fetch();
		$reponse4=$don4["RDC_REPONSE"];
		$coment4=$don4["RDC_COMMENTAIRE"];

	if(isset($reponse1) && isset($coment1) && isset($reponse2) && isset($coment2) && isset($reponse3) && isset($coment3) && isset($reponse4) && isset($coment4) ) $fichier = "miseAjour.php";
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
					//$("#ChampGauche").load("RDC/impot/impotD/TabD1.php");
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
					var rep2=$("#rep2").val();				
					var cmt2=$("#Cmt2").val();
					var rep3=$("#rep3").val();				
					var cmt3=$("#Cmt3").val();
					var rep4=$("#rep4").val();				
					var cmt4=$("#Cmt4").val();
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || (rep3=="non" && cmt3=="") || (rep4=="non" && cmt4=="") || rep1=="" || rep2=="" || rep3=="" || rep4==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep1,cmt:cmt1,rang:1,cycle:'impot_taxe',objet:'D'},
							success:function(e){
							//	alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep2,cmt:cmt2,rang:2,cycle:'impot_taxe',objet:'D'},
							success:function(e){
								//alert(e);
							}				
						});								
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep3,cmt:cmt3,rang:3,cycle:'impot_taxe',objet:'D'},
							success:function(e){
							//	alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep4,cmt:cmt4,rang:4,cycle:'impot_taxe',objet:'D'},
							success:function(e){
								//alert(e);
							}				
						});
						$("#contenue").load("RDC/impot/accIT.php");	
					}
				});
				$("#retourIT").click(function(){
					$("#contenue").load("RDC/impot/accIT.php");
				});
				$("#precedIT").click(function(){
					$("#contenue").load("RDC/impot/impotD/objetDIT1.php");
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
		
		
		</script>
	</head>
	<body>
		<div id="GranTitre">
			E - EXISTENCE DES SOLDES : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Justifier les autres créances et dettes d'impôts apparaissant au bilan. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>GL de toutes les écritures des comptes d'impôt (44x).</li>
						<li>Bilan et notes annexes.</li>
						<li>Détails des soldes relatifs aux créances et dettes envers l'Etat.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Le solde de chaque créance d'impôt est-il justifié ?</li>
						<li>Le solde de chaque dette d'impôt est-il justifié ?</li>
						<li>Les travaux de lettrage des comptes liés aux impôts et taxes sont-ils à jour ?</li>
						<li>Tous les comptes composant chaque poste du bilan sont-ils conformes aux soldes de la balance générale ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoi">Questionnaires.</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">|" id="suivantIT" style="float: right; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourIT" style="float: right; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedIT" style="float: right; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["existence_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>Le solde de chaque créance d'impôt est-il justifié ? 
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
				<p>Le solde de chaque dette d'impôt est-il justifié ?
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
				<p>Les travaux de lettrage des comptes liés aux impôts et taxes sont-ils à jour ?
					<select id="rep3" onchange="choixrep3()">
						<option value=""></option>
						<option value="oui" <?php if($reponse3=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse3=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse3=="non") echo 'selected';?>>non</option>
					</select>
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt3" class="comment"><?php echo $coment3;?></textarea>							
				</p>
				<h5><u>Question 4 :</u></h5>
				<p>Tous les comptes composant chaque poste du bilan sont-ils conformes aux soldes de la balance générale ?
					<select id="rep4" onchange="choixrep4()">
						<option value=""></option>
						<option value="oui" <?php if($reponse4=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse4=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse4=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt4" class="comment"><?php echo $coment4;?></textarea>							
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
