<?php @session_start();
	$mission_id=$_SESSION['idMission'];
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql2="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 2 AND RDC_CYCLE='emprunt_dette' AND RDC_OBJECTIF='B' AND MISSION_ID=".$mission_id;
	$rep2=$bdd->query($sql2);
	$don2=$rep2->fetch();
		$reponse2=$don2["RDC_REPONSE"];
		$coment2=$don2["RDC_COMMENTAIRE"];

	if(isset($reponse2) && isset($coment2)) $fichier = "miseAjour.php";
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
					$("#ChampGauche").load("RDC/emprunt/empruntB/TabB2.php");
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
							data:{rep:rep1,cmt:cmt1,rang:2,cycle:'emprunt_dette',objet:'B'},
							success:function(e){
								//alert(e);
							}				
						});
						var lignes = parseInt(document.getElementById('nbLignes').value);

						for(var i=1; i <(lignes+1); i++){
							var date = document.getElementById('date_'+i).value;
							var libelle = document.getElementById('libelle_'+i).value;	
							var montant = document.getElementById('montant_'+i).value;
							var compte = document.getElementById('compte_'+i).value;
							var commentaire = document.getElementById('commentaire_'+i).value;
							var ligne = i;

							if(date!='' || libelle!='' || montant!='' || compte!='' || commentaire!=''){
								add_Input(ligne, date, libelle, montant, compte, commentaire, <?php echo $mission_id; ?>);
							}
						}

						$("#contenue").load("RDC/emprunt/accED.php");	
					}
				});
				$("#retourIT").click(function(){
					$("#contenue").load("RDC/emprunt/empruntB/objetBED1.php");
				});
				$("#precedIT").click(function(){
					$("#contenue").load("RDC/emprunt/empruntB/objetBED2.php");
				});
			});
			function add_Input(ligne, date, libelle, montant, compte, commentaire, mission_id){
				$.ajax({
					type:'POST',
					url:'RDC/emprunt/empruntB/add_Input_B2.php',
					data:{ligne:ligne ,date:date, libelle:libelle, montant:montant, 
					compte:compte, commentaire:commentaire, mission_id:mission_id},
					success:function(){
					}
				});	
			}
			function choixrep1(){
				var rep1=$("#rep1").val();				
				var cmt1=$("#Cmt1").val();
				if(rep1=="non" && cmt1==""){
					alert('Des commentaires obligatoires ont été omis!!');
				}
			}
		</script>
	</head>
	<body>
		<div id="GranTitre">
			C - REGULARITE DES ENREGISTREMENTS ET RATTACHEMENT : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Justifier les soldes des emprunts. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Contrats des emprunts.</li>
					</ul>
				</p>
				<h4>Question :</h4>	
				<p>
					<ul>
						<li>Assurez-vous que toutes les charges d'intérêts sont justifiées et correctement comptabilisées ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoi">Justification et correct comptabilisation des charges d'intérêts</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantIT" style="float: right; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourIT" style="float: right; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedIT" style="float: right; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["regularite_visible"]!='OK')
					print 'style="display:none;"'
				?>  >
				<h5><u>Question :</u></h5>
				<p>Assurez-vous que toutes les charges d'intérêts sont justifiées et correctement comptabilisées ?
					<select id="rep1" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse2=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse2=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse2=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1" class="comment"><?php echo $coment2;?></textarea>							
				</p>
			</div>
		</div>
	</body>
</html>
