
<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 5 AND RDC_CYCLE='paie'AND RDC_OBJECTIF='A' AND MISSION_ID=".$_SESSION['idMission'];
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 6 AND RDC_CYCLE='paie'AND RDC_OBJECTIF='A' AND MISSION_ID=".$_SESSION['idMission'];
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
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<script>

			// Droit cycle by Tolotra
            // Page : RDC -> Paie
            // Tâche : Paie, 25
            $.ajax(
                {
                    type: 'POST',
                    url: 'droitCycle.php',
                    data: {task_id: 25},
                    success: function (e) {
                        var result = 0 === Number(e);
                        $("#rep1APP").attr('disabled', result);
                        $("#rep2APP").attr('disabled', result);
                        $("#Cmt1APP").attr('disabled', result);
                        $("#Cmt2APP").attr('disabled', result);
                    }
                }
            );
		
			$(function(){
			
				$("#renvoiRevAnPP").click(function(){
					//$("#ChampGauche").load("RDC/paie/paieA/TabDA3PP.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
					$('#titrRev').text('Renvoi justificatif : ');
					$('#renvoiRevAnPP').hide();
					$('#uploadJustification').show();
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieA/cohPrComAPP3.php");
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieA/cohPrComAPP2.php");
				});
				$("#suivantPP").click(function(){
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();
					var rep2=$("#rep2APP").val();				
					var cmt2=$("#Cmt2APP").val();
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep1,cmt:cmt1,rang:5,cycle:'paie',objet:'A'},
							success:function(e){
								//alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep2,cmt:cmt2,rang:6,cycle:'paie',objet:'A'},
							success:function(e){
								//alert(e);
							}				
						});
						$('#submit').click();
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
		<div id="GranTitre">
			A - COHERENCE ET PRINCIPES COMPTABLES : Partie III
		</div>
		<div id="ChampGauche">
						
			<p><strong>Travaux à faire :</strong> Examiner les principes de comptabilisation retenus notamment en matière de calcul de la provision pour congés à payer et des engagements de retraite. </p>
			
			<h4>Documents et infos à obtenir</h4>	
			<p>
				<ul>
					<li>Tableau des congés payés</li>
				</ul>
			</p>
			<h4>Questions :</h4>	
			<p>
				<ul>
					<li>Le mode de calcul des congés payés est-il conforme aux dispositions prévues par le code de travail ?</li>
					<li>Assurez-vous que la constatation d'une provision (non obligatoire) de départ à la retraite respecte les normes IAS ?</li>
				</ul>
			</p>
			
			<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Questionnaires.</label> </p>
			<div id="uploadJustification" style="display:none;">
				<iframe style="display:none;" name="uploadFrame"></iframe>
				<?php 
					$sql = "SELECT nom,extension FROM tab_pieces_justificatives WHERE mission_id=".$_SESSION['idMission']." AND pour = 'paie_personnel_a3'";
					$rep =$bdd->query($sql);
					
					if($donnee = $rep->fetch()) {
				?>
					<a href="<?php echo "pieces_justificatives/pj_paie_personnel_a3_".$_SESSION['idMission'].'.'.$donnee['extension'] ?>" target="_blank"><?php echo $donnee['nom'] ?></a>
				<?php
					}
				?>
				<form enctype="multipart/form-data" action="RDC/envoi_pieces_justificatives.php" method="POST" id="form" target="uploadFrame">
					<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
					<input type="hidden" name="pour" value="paie_personnel_a3" />
					<input type="hidden" name="mission_id" value="<?php echo $_SESSION['idMission']; ?>" />
					<input type="file" id="fichier" name="fichier"/>
					<input id="submit" type="submit" value="Upload" />
				</form>
			</div>
		</div>
		<div>
			<input type="button" class="bouton" value=">|" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["coherence_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>Le mode de calcul des congés payés est-il conforme aux dispositions prévues par le code de travail ?
					<select id="rep1APP" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse1=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse1=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1APP" class="comment"><?php echo $coment1;?></textarea>
				</p>
				<h5><u>Question 2 :</u></h5>
				<p>Assurez-vous que la constatation d'une provision (non obligatoire) de départ à la retraite respecte les normes IAS ? 
					<select id="rep2APP" onchange="choixrep2()">
						<option value=""></option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt2APP" class="comment"><?php echo $coment2;?></textarea>
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
					//$("#ChampGauche").load("RDC/paie/paieA/TabDA1PP.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
					$('#titrRev').text('Renvoi justificatif : ');
					$('#renvoiRevAnPP').hide();
					$('#uploadJustification').show();
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieA/cohPrComAPP3.php");
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieA/cohPrComAPP2.php");
				});
				$("#suivantPP").click(function(){
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();
					var rep2=$("#rep2APP").val();				
					var cmt2=$("#Cmt2APP").val();
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep1,cmt:cmt1,rang:5,cycle:'paie',objet:'A'},
							success:function(e){
								//alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep2,cmt:cmt2,rang:6,cycle:'paie',objet:'A'},
							success:function(e){
								//alert(e);
							}				
						});
						$('#submit').click();
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
		<div id="GranTitre">
			A - COHERENCE ET PRINCIPES COMPTABLES : Partie III
		</div>		
		<div id="ChampGauche">		
			<p><strong>Travaux à faire :</strong> Examiner les principes de comptabilisation retenus notamment en matière de calcul de la provision pour congés à payer et des engagements de retraite. </p>
			
			<h4>Documents et infos à obtenir</h4>	
			<p>
				<ul>
					<li>Tableau des congés payés</li>
				</ul>
			</p>
			<h4>Questions :</h4>	
			<p>
				<ul>
					<li>Le mode de calcul des congés payés est-il conforme aux dispositions prévues par le code de travail ?</li>
					<li>Assurez-vous que la constatation d'une provision (non obligatoire) de départ à la retraite respecte les normes IAS ?</li>
				</ul>
			</p>
			
			<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Questionnaires.</label> </p>
			<div id="uploadJustification" style="display:none;">
				<iframe style="display:none;" name="uploadFrame"></iframe>
				<?php 
					$sql = "SELECT nom,extension FROM tab_pieces_justificatives WHERE mission_id=".$_SESSION['idMission']." AND pour = 'paie_personnel_a3'";
					$rep =$bdd->query($sql);
					
					if($donnee = $rep->fetch()) {
				?>
					<a href="<?php echo "pieces_justificatives/pj_paie_personnel_a3_".$_SESSION['idMission'].'.'.$donnee['extension'] ?>" target="_blank"><?php echo $donnee['nom'] ?></a>
				<?php
					}
				?>
				<form enctype="multipart/form-data" action="RDC/envoi_pieces_justificatives.php" method="POST" id="form" target="uploadFrame">
					<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
					<input type="hidden" name="pour" value="paie_personnel_a3" />
					<input type="hidden" name="mission_id" value="<?php echo $_SESSION['idMission']; ?>" />
					<input type="file" id="fichier" name="fichier"/>
					<input id="submit" type="submit" value="Upload" />
				</form>
			</div>
		</div>
		<div>
			<input type="button" class="bouton" value=">|" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["coherence_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question 1 :</u></h5>
				<p>Le mode de calcul des congés payés est-il conforme aux dispositions prévues par le code de travail ?
					<select id="rep1APP" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse1=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse1=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse1=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1APP" class="comment"><?php echo $coment1;?></textarea>
				</p>
				<h5><u>Question 2 :</u></h5>
				<p>Assurez-vous que la constatation d'une provision (non obligatoire) de départ à la retraite respecte les normes IAS ? 
					<select id="rep2APP" onchange="choixrep2()">
						<option value=""></option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
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


