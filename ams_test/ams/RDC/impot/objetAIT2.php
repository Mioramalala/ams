<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 3 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='A' AND MISSION_ID=".$_SESSION['idMission'];
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
	                }
	            }
	        );
			
			$(function(){
				$("#renvoi").click(function(){
					//$("#waiting").show();
					//waiting();$("#ChampGauche").load("RDC/impot/impotA/TabA2.php",stopWaiting);
					$('#ChampDroite').show();
					$('#suivantIT').show();
					$('#precedIT').show();
					$('#retourIT').hide();
				});
				$("#suivantIT").click(function(){
					//$("#waiting").show();
					var rep1=$("#rep1").val();				
					var cmt1=$("#Cmt1").val();
					var ra_compte = "";
					var ra_cmt = "";
					var synthese = $("#synthese").val();
					var conclusion = $("#conclusion").val();
					var compteur = parseInt($("#compteur").attr('alt'));// Compte le nombre de ligne du revu analitique
					if((rep1=="non" && cmt1=="") || rep1==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep1,cmt:cmt1,rang:3,cycle:'impot_taxe',objet:'A'},
							success:function(e){
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
						waiting();$("#contenue").load("RDC/impot/accIT.php",stopWaiting);	
					}
				});
				$("#retourIT").click(function(){
					waiting();$("#contenue").load("RDC/impot/impotA/objetAIT1.php",stopWaiting);
				});
				$("#precedIT").click(function(){
					waiting();$("#contenue").load("RDC/impot/impotA/objetAIT2.php",stopWaiting);
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
		<div id="waiting" style="display:none;">
			<div id="loading">
				<center>
					<img src="RDC/paie/ajax-loader_blue.gif"/><br />
					<strong style="color: #095487;">Veuillez patienter ...</strong>
				</center>
			</div>
		</div>
		<div id="GranTitre">
			A - COHERENCES ET PRINCIPES COMPTABLES : Partie II	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Examiner les principes de comptabilisation : Suivi et concordance du mode de comptabilisation des opérations avec les normes applicables (PCG 05, IAS/IFRS, norme du Groupe, guide sectoriel). </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Prise de connaissance du système comptable</li>
					</ul>
				</p>
				<h4>Question :</h4>	
				<p>
					<ul>
						<li>Les principes comptables appliquées par la société sont-ils cohérents avec le secteur dans lequel elle exerce ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoi">Questionnaires</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">|" id="suivantIT" style="float: right; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourIT" style="float: right; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedIT" style="float: right; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["coherence_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question :</u></h5>
				<p>Les principes comptables appliquées par la société sont-ils cohérents avec le secteur dans lequel elle exerce ? 
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
