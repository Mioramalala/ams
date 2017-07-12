<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 1 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='A' AND MISSION_ID=".$_SESSION['idMission'];
	$rep1=$bdd->query($sql1);
	$don1=$rep1->fetch();
		$reponse1=$don1["RDC_REPONSE"];
		$coment1=$don1["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 2 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='A' AND MISSION_ID=".$_SESSION['idMission'];
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
		<link rel="stylesheet" href="../RDC/impot/impot.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			#waiting{position: absolute;width: 100%; height: 100%;opacity: 0.8;background-color: #fff;}
			#loading{position: absolute;width: 200px; height: 100px;margin-top: 200px;margin-left: 500px;z-index: 10;}
		</style>
		<script>

			// Droit cycle by Tolotra
	        // Page : RDC -> Impots et taxes
	        // Tâche : Impots et taxes, 50
	        $.ajax(
	            {
	                type: 'POST',
	                url: 'droitCycle.php',
	                data: {task_id: 50},
	                success: function (e) {
	                    var result = 0 === Number(e);
	                    $("#rep1").attr('disabled', result);
	                    $("#rep2").attr('disabled', result);
	                    $("#Cmt1").attr('disabled', result);
	                    $("#Cmt2").attr('disabled', result);
	                }
	            }
	        );
			
			$(function(){
				$("#renvoi").click(function(){
					$("#waiting").show();
					$("#ChampGauche").load("RDC/impot/impotA/TabA1.php");
					$('#ChampDroite').show();
					$('#suivantIT').show();
					$('#precedIT').show();
					$('#retourIT').hide();
				});
				$("#suivantIT").click(function(){
					$("#waiting").show();
					var rep1=$("#rep1").val();				
					var cmt1=$("#Cmt1").val();
					var rep2=$("#rep2").val();				
					var cmt2=$("#Cmt2").val();
					var ra_compte = "";
					var ra_cmt = "";
					var synthese = $("#synthese").val();
					var conclusion = $("#conclusion").val();
					var compteur = parseInt($("#compteur").attr('alt')); // Compte le nombre de ligne du revu analitique
					if((rep1=="non" && cmt1=="") || (rep2=="non" && cmt2=="") || rep1=="" || rep2==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep1,cmt:cmt1,rang:1,cycle:'impot_taxe',objet:'A'},
							success:function(e){
							//	alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep2,cmt:cmt2,rang:2,cycle:'impot_taxe',objet:'A'},
							success:function(e){
								//alert(e);
							}				
						});
						for (var i = 1; i <= compteur; i++) {// Pour la revu analityque
							ra_compte = $("#compte"+i).text();
							ra_cmt = $("#cmt"+i).val();								
							$.ajax({
								type:"post",
								url:"RDC/impot/impotA/saveA1.php",
								data:{compte:ra_compte,cmt:ra_cmt},
								success:function(e){
								}				
							});
						}								
						$.ajax({ //Pour la synthese de la revu analytique
							type:"post",
							url:"RDC/impot/impotA/saveA1.php",
							data:{synthese:synthese,conclusion:conclusion},
							success:function(e){
							}				
						});
						$("#contenue").load("RDC/impot/impotA/objetAIT2.php");	
					}
				});
				$("#retourIT").click(function(){
					$("#contenue").load("RDC/impot/accIT.php");
				});
				$("#precedIT").click(function(){
					$("#contenue").load("RDC/impot/impotA/objetAIT1.php");
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
		<div id="waiting" style="display:none;">
			<div id="loading">
				<center>
					<img src="RDC/paie/ajax-loader_blue.gif"/><br />
					<strong style="color: #095487;">Veuillez patienter ...</strong>
				</center>
			</div>
		</div>
		<div id="GranTitre">
			A - COHERENCES ET PRINCIPES COMPTABLES : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Identifier et expliquer l'origine de tout écart significatif entre les deux exercices. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Balances générales N-1 et N</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>A-t-on effectué une revue analytique des comptes d'impôts et taxes ainsi que des comptes de tiers associés par rapport à l'exercice précédent ?</li>
						<li>Les écarts significatifs sont-ils tous justifiés et expliqués ?</li>
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
					?> >
				<h5><u>Question 1 :</u></h5>
				<p>A-t-on effectué une revue analytique des comptes d'impôts et taxes ainsi que des comptes de tiers associés par rapport à l'exercice précédent ?
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
				<p>Les écarts significatifs sont - ils tous justifiés et expliqués ?
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
