
<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG=2 AND RDC_OBJECTIF='B' AND RDC_CYCLE='paie' AND MISSION_ID=".$_SESSION['idMission'];
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG=3 AND RDC_OBJECTIF='B' AND RDC_CYCLE='paie' AND MISSION_ID=".$_SESSION['idMission'];
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
		$reponse2=$don2["RDC_REPONSE"];
		$coment2=$don2["RDC_COMMENTAIRE"];

	if(isset($reponse1) && isset($coment1) && isset($reponse2) && isset($coment2)){
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<link rel="stylesheet" href="../../../../class/css.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			#waiting{position: absolute;width: 100%; height: 100%;opacity: 0.8;background-color: #fff;}
			#loading{position: absolute;width: 200px; height: 100px;margin-top: 200px;margin-left: 500px;z-index: 10;}
		</style>
		<script>
			$(function(){
				$("#renvoiRevAnPP").click(function(){
					$("#ChampGauche").load("RDC/paie/paieB/TabDB2PP.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieB/cohPrComBPP1.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieB/cohPrComBPP2.php");
				});
				
				$("#suivantPP").click(function(){
					//console.log('mandeha v ty') ;
					$("#waiting").show();
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();
					var rep2=$("#rep2APP").val();				
					var cmt2=$("#Cmt2APP").val();
					var compteur = parseInt($("#ajout").attr('alt'));	
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
						$("#waiting").hide();
					} 
					else{
							$.ajax({
								type:"post",
								url:"RDC/paie/CohPostDrop.php",
								data:{rep:rep1,cmt:cmt1,rang:2,cycle:'paie',objet:'B'},
								success:function(e){
									}				
								});										
							$.ajax({
								type:"post",
								url:"RDC/paie/CohPostDrop.php",
								data:{rep:rep2,cmt:cmt2,rang:3,cycle:'paie',objet:'B'},
								success:function(e){
									}				
								});
						for (var i = 1; i <= compteur; i++) {
							var date = $("#date"+i).val();							
							var police = $("#police"+i).val();							
							var nature = $("#nature"+i).val();							
							var montant = $("#montant"+i).val();							
							var comment = $("#comment"+i).val();
							var nameFile = $('#fichier'+i).val();

							$('#submit'+i).click();
							$.ajax({
								type:"post",
								url:"RDC/paie/paieB/saveB2.php",
								data:{date:date,police:police,nature:nature,montant:montant,comment:comment,name:nameFile},
								success:function(e){

									}				
								});
							}

						$("#contenue").load("RDC/paie/accPP.php");		
						}
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
		<div id="waiting" style="display:none;">
			<div id="loading">
				<center>
					<img src="RDC/paie/ajax-loader_blue.gif"/><br />
					<strong style="color: #095487;">Veuillez patienter ...</strong>
				</center>
			</div>
		</div>	
		<div id="GranTitre">
			B - EXHAUSTIVITE DES ENREGISTREMENTS : Partie II
		</div>
		<div id="ChampGauche">
				<p><strong>Travaux à faire :</strong> Contrôler le paiement et la comptabilisation de toutes les charges concernant les régimes facultatifs et complémentaires d'assurance sociale. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Balance générale et grand livre des comptes.</li>
						<li>Etat récapitulant les assurances sociales allouées aux membres du personnel et livre de paie.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>A-t-on obtenu l'état récapitulant les assurances sociales allouées aux membres du personnel ?</li>
						<li>Les assurances sociales ont-été-t-il comptabilisées correctement ?</li>
					</ul>
				</p>
				
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Etat recapitulatif des assurances en allouées aux membres du personnel</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">|" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["exhaustivte_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>A-t-on obtenu l'état récapitulant les assurances sociales allouées aux membres du personnel ?
					<select id="rep1APP">
						<!-- <option value=""></option> -->
						<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
						<option value="oui" <?php if($reponse1=="oui") echo 'selected';?>>oui</option>
						<option value="non" <?php if($reponse1=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1APP" class="comment"><?php echo $coment1;?></textarea>
				</p>
				<h5><u>Question 2 :</u></h5>
				<p>Les assurances sociales ont-été-t-il comptabilisées correctement ? 
					<select id="rep2APP">
						<!-- <option value=""></option> -->
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?>>oui</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>> non</option>
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
		<style type="text/css">
			#waiting{position: absolute;width: 100%; height: 100%;opacity: 0.8;background-color: #fff;}
			#loading{position: absolute;width: 200px; height: 100px;margin-top: 200px;margin-left: 500px;z-index: 10;}
		</style>
		<script>
			$(function(){
			
				$("#renvoiRevAnPP").click(function(){
					$("#ChampGauche").load("RDC/paie/paieB/TabDB2PP.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieB/cohPrComBPP1.php");
				
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieB/cohPrComBPP2.php");
				});
				$("#suivantPP").click(function(){

					$("#waiting").show();
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();
					var rep2=$("#rep2APP").val();				
					var cmt2=$("#Cmt2APP").val();
					var compteur = parseInt($("#ajout").attr('alt'));
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
						$("#waiting").hide();
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep1,cmt:cmt1,rang:2,cycle:'paie',objet:'B'},
							success:function(e){
								//alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep2,cmt:cmt2,rang:3,cycle:'paie',objet:'B'},
							success:function(e){
								//alert(e);
							}				
						});

						for (var i = 1; i <= compteur; i++) {
							var date = $("#date"+i).val();							
							var police = $("#police"+i).val();							
							var nature = $("#nature"+i).val();							
							var montant = $("#montant"+i).val();							
							var comment = $("#comment"+i).val();
							var nameFile = $('#fichier'+i).val();

							$('#submit'+i).click();
							$.ajax({
								type:"post",
								url:"RDC/paie/paieB/saveB2.php",
								data:{date:date,police:police,nature:nature,montant:montant,comment:comment,name:nameFile},
								success:function(e){

								}				
							});
						}
						$("#contenue").load("RDC/paie/accPP.php");
					}
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
		<div id="waiting" style="display:none;">
			<div id="loading">
				<center>
					<img src="RDC/paie/ajax-loader_blue.gif"/><br />
					<strong style="color: #095487;">Veuillez patienter ...</strong>
				</center>
			</div>
		</div>	
		<div id="GranTitre">
			B - EXHAUSTIVITE DES ENREGISTREMENTS : Partie II
			
		</div>
		<div id="ChampGauche">
				<p><strong>Travaux à faire :</strong> Contrôler le paiement et la comptabilisation de toutes les charges concernant les régimes facultatifs et complémentaires d'assurance sociale. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Balance générale et grand livre des comptes.</li>
						<li>Etat récapitulant les assurances sociales allouées aux membres du personnel et livre de paie.</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>A-t-on obtenu l'état récapitulant les assurances sociales allouées aux membres du personnel ?</li>
						<li>Les assurances sociales ont-été-t-il comptabilisées correctement ?</li>
					</ul>
				</p>
				
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Etat récapitulatif des assurances allouées aux membres du personnel</label> </p>
		</div>
		<div>
			 <input type="button" class="bouton" value=">|" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" /> 
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["exhaustivte_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>A-t-on obtenu l'état récapitulant les assurances sociales allouées aux membres du personnel ?
					<select id="rep1APP" >
						<option value=""></option>
						<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
						<option value="oui" <?php if($reponse1=="oui") echo 'selected';?>>oui</option>
						<option value="non" <?php if($reponse1=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1APP" class="comment"><?php echo $coment1;?></textarea>
				</p>
				<h5><u>Question 2 :</u></h5>
				<p>Les assurances sociales ont-été-t-il comptabilisées correctement ? 
					<select id="rep2APP" >
						<option value=""></option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?>>oui</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>> non</option>
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


