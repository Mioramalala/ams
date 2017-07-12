
<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 2 AND RDC_OBJECTIF='C' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
	$rep=$bdd->query($sql1);
	$don=$rep->fetch();
		$reponse=$don["RDC_REPONSE"];
		$coment=$don["RDC_COMMENTAIRE"];

	if(isset($reponse) && isset($coment)){
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
					//$("#ChampGauche").load("RDC/paie/paieC/TabDC2PPa.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
					$('#titrRev').text('Renvoi justificatif : ');
					$('#renvoiRevAnPP').hide();
					$('#uploadJustification').show();
				});
				$("#suivantPP").click(function(){
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();
					var compteur = parseInt($("#ajout").attr('alt'));	
					if((rep1=="non" && cmt1=="") || rep1==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep1,cmt:cmt1,rang:2,cycle:'paie',objet:'C'},
							success:function(e){
							//	alert(e);
							}				
						});
						$('#submit').click();
						$("#contenue").load("RDC/paie/paieC/cohPrComCPP2b.php");
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/paieC/cohPrComCPP1.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieC/cohPrComCPP2a.php");
				});
			});
			function choixrep1(){
				var rep1=$("#rep1APP").val();				
				var cmt1=$("#Cmt1APP").val();
				if(rep1=="non" && cmt1==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
		
		</script>
	</head>
	<body>		
		<div id="GranTitre">
			 C - REGULARITE DES ENREGISTREMENTS : Partie II	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Contrôler l'état de calcul des congés payés. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Etat de calcul des provisions pour congés payés.</li>
					</ul>
				</p>
				<h4>Question :</h4>	
				<p>
					<ul>
						<li>Le calcul des provisions pour congés payés est-il exact ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Questionnaire.</label> </p>
				<div id="uploadJustification" style="display:none;">
					<iframe style="display:none;" name="uploadFrame"></iframe>
					<?php 
						$sql = "SELECT nom,extension FROM tab_pieces_justificatives WHERE mission_id=".$_SESSION['idMission']." AND pour = 'paie_personnel_c2'";
						$rep =$bdd->query($sql);
						
						if($donnee = $rep->fetch()) {
					?>
						<a href="<?php echo "pieces_justificatives/pj_paie_personnel_c2_".$_SESSION['idMission'].'.'.$donnee['extension'] ?>" target="_blank"><?php echo $donnee['nom'] ?></a>
					<?php
						}
					?>
					<form enctype="multipart/form-data" action="RDC/envoi_pieces_justificatives.php" method="POST" id="form" target="uploadFrame">
						<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
						<input type="hidden" name="pour" value="paie_personnel_c2" />
						<input type="hidden" name="mission_id" value="<?php echo $_SESSION['idMission']; ?>" />
						<input type="file" id="fichier" name="fichier"/>
						<input id="submit" type="submit" value="Upload" />
					</form>
				</div>
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["regularite_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question :</u></h5>
				<p>Le calcul des provisions pour congés payés est-il exact ? 
					<select id="rep1APP" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1APP" class="comment"><?php echo $coment;?></textarea>							
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
					//$("#ChampGauche").load("RDC/paie/paieC/TabDC2PPa.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
					$('#titrRev').text('Renvoi justificatif : ');
					$('#renvoiRevAnPP').hide();
					$('#uploadJustification').show();
				});
				$("#suivantPP").click(function(){
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();
					var compteur = parseInt($("#ajout").attr('alt'));
					if((rep1=="non" && cmt1=="") || rep1==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep1,cmt:cmt1,rang:2,cycle:'paie',objet:'C'},
							success:function(e){
							//	alert(e);
							}
						});
						$('#submit').click();
						$("#contenue").load("RDC/paie/paieC/cohPrComCPP2b.php");
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RRDC/paie/paieC/cohPrComCPP1.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieC/cohPrComCPP2a.php");
				});
			});
			function choixrep1(){
				var rep1=$("#rep1APP").val();				
				var cmt1=$("#Cmt1APP").val();
				if(rep1=="non" && cmt1==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			}
		
		</script>
	</head>
	<body>		
		<div id="GranTitre">
			C - REGULARITE DES ENREGISTREMENTS : Partie II	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Contrôler l'état de calcul des congés payés. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Etat de calcul des provisions pour congés payés.</li>
					</ul>
				</p>
				<h4>Question :</h4>	
				<p>
					<ul>
						<li>Le calcul des provisions pour congés payés est-il exact ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Questionnaire.</label> </p>
				<div id="uploadJustification" style="display:none;">
					<iframe style="display:none;" name="uploadFrame"></iframe>
					<?php 
						$sql = "SELECT nom,extension FROM tab_pieces_justificatives WHERE mission_id=".$_SESSION['idMission']." AND pour = 'paie_personnel_c2'";
						$rep =$bdd->query($sql);
						
						if($donnee = $rep->fetch()) {
					?>
						<a href="<?php echo "pieces_justificatives/pj_paie_personnel_c2_".$_SESSION['idMission'].'.'.$donnee['extension'] ?>" target="_blank"><?php echo $donnee['nom'] ?></a>
					<?php
						}
					?>
					<form enctype="multipart/form-data" action="RDC/envoi_pieces_justificatives.php" method="POST" id="form" target="uploadFrame">
						<input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
						<input type="hidden" name="pour" value="paie_personnel_c2" />
						<input type="hidden" name="mission_id" value="<?php echo $_SESSION['idMission']; ?>" />
						<input type="file" id="fichier" name="fichier"/>
						<input id="submit" type="submit" value="Upload" />
					</form>
				</div>
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["regularite_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question :</u></h5>
				<p>Le calcul des provisions pour congés payés est-il exact ? 
					<select id="rep1APP" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse=="non") echo 'selected';?>>non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1APP" class="comment"><?php echo $coment;?></textarea>							
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