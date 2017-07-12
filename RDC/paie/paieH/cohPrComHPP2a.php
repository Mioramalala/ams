<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 2 AND RDC_OBJECTIF='H' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];

	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 3 AND RDC_OBJECTIF='H' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
	$rep2=$bdd->query($sql1);
	$don2=$rep2->fetch();
		$reponse2=$don2["RDC_REPONSE"];
		$coment2=$don2["RDC_COMMENTAIRE"];

	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 4 AND RDC_OBJECTIF='H' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
	$rep3=$bdd->query($sql1);
	$don3=$rep3->fetch();
		$reponse3=$don3["RDC_REPONSE"];
		$coment3=$don3["RDC_COMMENTAIRE"];

	if(isset($reponse1) && isset($coment1) && isset($reponse2) && isset($coment2) && isset($reponse3) && isset($coment3)){
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
					//$("#ChampGauche").load("RDC/paie/paieH/TabDH2PPa.php");
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
					var rep3=$("#rep3APP").val();				
					var cmt3=$("#Cmt3APP").val();	
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || (rep3=="non" && cmt3=="") || rep1=="" || rep2=="" || rep3==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep1,cmt:cmt1,rang:2,cycle:'paie',objet:'H'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep2,cmt:cmt2,rang:3,cycle:'paie',objet:'H'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep3,cmt:cmt3,rang:4,cycle:'paie',objet:'H'},
							success:function(e){
							//	alert(e);
							}				
						});
						var compteur = parseInt($('#ajout').attr('alt'));
						for (var i = 1; i <= compteur; i++) {
							var nat = ($("#nat"+i).text() != "") ? $("#nat"+i).text() : $("#nat"+i).val();
							var na = $("#na"+i).val();

							$.ajax({
								type:"post",
								url:"RDC/paie/paieH/saveH2b.php",
								data:{nat:nat,na:na},
								success:function(e){
								}				
							});
						};
						$("#contenue").load("RDC/paie/accPP.php");
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieH/cohPrComHPP1.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieH/cohPrComHPP2a.php");
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
			function choixrep3(){
				var rep3=$("#rep3APP").val();				
				var cmt3=$("#Cmt3APP").val();
				if(rep3=="non" && cmt3==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
		
		
		</script>
	</head>
	<body>		
		<div id="GranTitre">
			I - INFORMATION ET PRESENTATION : Partie II	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> S'assurer de l'existence des informations suivantes en annexe: indemnité de départ à la retraite, effecitf, rémunérations des dirigeant. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Annexes aux états financiers.</li>
					</ul>
				</p>
				<h4>Question :</h4>	
				<p>
					<ul>
						<li>
							Confirmez-vous que les informations suivantes sont présentes en annexe :<br />
							- Détails et mode de calcul des indemnités de départ à la retraite.<br />
							- Effecitf.<br />
							- Rémunérations des dirigeants.<br />
						</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Questionnaires.</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">|" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["information_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question :</u></h5>
				<p>Confirmez-vous que les informations suivantes sont présentes en annexe :</p>
				<p> - Détails et mode de calcul des indemnités de départ à la retraite.
					<select id="rep1APP" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse1=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse1=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1APP" class="comment"><?php echo $coment1;?></textarea>							
				</p> - Effectif.
					<select id="rep2APP" onchange="choixrep2()">
						<option value=""></option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt2APP" class="comment"><?php echo $coment2;?></textarea>							
				</p>
				<p> - Rémunérations des dirigeants.
					<select id="rep3APP" onchange="choixrep3()">
						<option value=""></option>
						<option value="oui" <?php if($reponse3=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse3=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse3=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt3APP" class="comment"><?php echo $coment3;?></textarea>							
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
					//$("#ChampGauche").load("RDC/paie/paieH/TabDH2PPa.php");
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
					var rep3=$("#rep3APP").val();				
					var cmt3=$("#Cmt3APP").val();
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || (rep3=="non" && cmt3=="") || rep1=="" || rep2=="" || rep3==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep1,cmt:cmt1,rang:2,cycle:'paie',objet:'H'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep2,cmt:cmt2,rang:3,cycle:'paie',objet:'H'},
							success:function(e){
							//	alert(e);
							}				
						});									
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep3,cmt:cmt3,rang:4,cycle:'paie',objet:'H'},
							success:function(e){
							//	alert(e);
							}				
						});
						var compteur = parseInt($('#ajout').attr('alt'));
						for (var i = 1; i <= compteur; i++) {
							var nat = ($("#nat"+i).text() != "") ? $("#nat"+i).text() : $("#nat"+i).val();
							var na = $("#na"+i).val();

							$.ajax({
								type:"post",
								url:"RDC/paie/paieH/saveH2b.php",
								data:{nat:nat,na:na},
								success:function(e){
								}				
							});
						};
						$("#contenue").load("RDC/paie/accPP.php");
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieH/cohPrComHPP1.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieH/cohPrComHPP2a.php");
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
			function choixrep3(){
				var rep3=$("#rep3APP").val();				
				var cmt3=$("#Cmt3APP").val();
				if(rep3=="non" && cmt3==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
		
		
		</script>
	</head>
	<body>		
		<div id="GranTitre">
			H - INFORMATION ET PRESENTATION : Partie II	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> S'assurer de l'existence des informations suivantes en annexe: indemnité de départ à la retraite, effecitf, rémunérations des dirigeant. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Annexes aux états financiers.</li>
					</ul>
				</p>
				<h4>Question :</h4>	
				<p>
					<ul>
						<li>
							Confirmez-vous que les informations suivantes sont présentes en annexe :<br />
							- Détails et mode de calcul des indemnités de départ à la retraite.<br />
							- Effecitf.<br />
							- Rémunérations des dirigeants.<br />
						</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Questionnaires.</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["information_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question :</u></h5>
				<p>Confirmez-vous que les informations suivantes sont présentes en annexe :</p>
				<p> - Détails et mode de calcul des indemnités de départ à la retraite.
					<select id="rep1APP" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse1=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse1=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1APP" class="comment"><?php echo $coment1;?></textarea>							
				</p> - Effectif.
					<select id="rep2APP" onchange="choixrep2()">
						<option value=""></option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt2APP" class="comment"><?php echo $coment2;?></textarea>							
				</p>
				<p> - Rémunérations des dirigeants.
					<select id="rep3APP" onchange="choixrep3()">
						<option value=""></option>
						<option value="oui" <?php if($reponse3=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse3=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse3=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt3APP" class="comment"><?php echo $coment3;?></textarea>							
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