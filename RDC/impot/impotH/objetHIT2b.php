<?php @session_start();
$mission_id=$_SESSION['idMission'];
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql3="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 4 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='H' AND MISSION_ID=".$_SESSION['idMission'];
	$rep3=$bdd->query($sql3);
	$don3=$rep3->fetch();
		$reponse3=$don3["RDC_REPONSE"];
		$coment3=$don3["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql4="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 5 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='H' AND MISSION_ID=".$_SESSION['idMission'];
	$rep4=$bdd->query($sql4);
	$don4=$rep4->fetch();
		$reponse4=$don4["RDC_REPONSE"];
		$coment4=$don4["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql5="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 6 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='H' AND MISSION_ID=".$_SESSION['idMission'];
	$rep5=$bdd->query($sql5);
	$don5=$rep5->fetch();
		$reponse5=$don5["RDC_REPONSE"];
		$coment5=$don5["RDC_COMMENTAIRE"];
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql6="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG= 7 AND RDC_CYCLE='impot_taxe' AND RDC_OBJECTIF='H' AND MISSION_ID=".$_SESSION['idMission'];
	$rep6=$bdd->query($sql6);
	$don6=$rep6->fetch();
		$reponse6=$don6["RDC_REPONSE"];
		$coment6=$don6["RDC_COMMENTAIRE"];

	if( isset($reponse3) && isset($coment3) && isset($reponse4) && isset($coment4) &&
		isset($reponse5) && isset($coment5) && isset($reponse6) && isset($coment6) ) $fichier = "miseAjour.php";
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
					$("#ChampGauche").load("RDC/impot/impotH/TabH2b.php");
					$('#ChampDroite').show();
					$('#suivantIT').show();
					$('#precedIT').show();
					$('#retourIT').hide();
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
						alert('Des réponses et des commentaires obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep1,cmt:cmt1,rang:4,cycle:'impot_taxe',objet:'H'},
							success:function(e){
							//	alert(e8;
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep2,cmt:cmt2,rang:5,cycle:'impot_taxe',objet:'H'},
							success:function(e){
								//alert(e);
							}				
						});								
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep3,cmt:cmt3,rang:6,cycle:'impot_taxe',objet:'H'},
							success:function(e){
							//	alert(e);
							}				
						});										
						$.ajax({
							type:"post",
							url:"RDC/impot/<?php echo $fichier; ?>",
							data:{rep:rep4,cmt:cmt4,rang:7,cycle:'impot_taxe',objet:'H'},
							success:function(e){
								//alert(e);
							}				
						});

						var lignes = parseInt(document.getElementById('nbLignes').value);

						for(var i=1; i <(lignes+1); i++){
							var nature = document.getElementById('nature_'+i).value;
							var annexe = document.getElementById('annexe_'+i).value;	
							var ligne = i;

							if(nature!='' || annexe!=''){
								add_Input(nature, annexe, ligne, <?php echo $mission_id; ?>);
							}
						}
						$("#contenue").load("RDC/impot/accIT.php");		
					}
				});
				$("#retourIT").click(function(){
					$("#contenue").load("RDC/impot/impotH/objetHIT2a.php");
				});
				$("#precedIT").click(function(){
					$("#contenue").load("RDC/impot/impotH/objetHIT2b.php");
				});
			});
		function add_Input(nature, note , ligne, mission_id){
		$.ajax({
			type:'POST',
			url:'RDC/impot/impotH//add_Input_i4.php',
			data:{nature:nature, note:note, ligne:ligne, mission_id:mission_id},
			success:function(){
			}
		});	
		}		
			
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
			I - INFORMATION ET PRESENTATION : Partie II	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Véifier les information données en annexe.</p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Notes annexes aux états financiers.</li>
						<li>Toute autre information jugée importante.</li>
					</ul>
				</p>
				<h4>Question :</h4>	
				<p>
					<ul>
						<li>Les informations suivantes sont-elles correctement présentées en annexes :</li>
							<dd>- Le total de l'impôt exigible et différé relatif aux éléments débités ou crédités dans les capitaux propres.</dd>
							<dd>- Une explication de la relation entre la charge/produit d'impôt et le bénéfice comptable.</dd>
							<dd>- Le montant des différences temporelles déductibles, pertes fiscales et crédits d'impôt non utilisés pour lesquels aucun actif d'impôt différé n'a été comptabilisé au bilan</dd>
							<dd>- Pour chaque catégorie de différence temporelle et pour chaque catégorie de pertes fiscales et de crédits d'impôts non utilisés, le montant des actifs et passifs d'ID comptabilisés au bilan pour chaque exercice présenté et le montant du produit ou de la charge d'ID comptabilisé dans le compte de résultat, s'il n'est pas mis en évidence par les variations des montants comptabilisés au bilan.</dd>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoi">Notes annexes</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantIT" style="float: right; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourIT" style="float: right; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedIT" style="float: right; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["information_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question :</u></h5>
				<p>Les informations suivantes sont-elles correctement présentées en annexes :<br />
					<dd>- Le total de l'impôt exigible et différé relatif aux éléments débités ou crédités dans les capitaux propres.</dd>
					<select id="rep1" onchange="choixrep1()">
						<option value=""></option>
						<option value="oui" <?php if($reponse3=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse3=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse3=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt1" class="comment"><?php echo $coment3;?></textarea>							
				</p>
					<dd>- Une explication de la relation entre la charge/produit d'impôt et le bénéfice comptable.</dd>
					<select id="rep2" onchange="choixrep2()">
						<option value=""></option>
						<option value="oui" <?php if($reponse4=="oui") echo 'selected';?>>oui</option>
						<option value="N/A" <?php if($reponse4=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse4=="non") echo 'selected';?>>non</option>
					</select>
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt2" class="comment"><?php echo $coment4;?></textarea>							
				</p>
					<dd>- Le montant des différences temporelles déductibles, pertes fiscales et crédits d'impôt non utilisés pour lesquels aucun actif d'impôt différé n'a été comptabilisé au bilan</dd>
					<select id="rep3" onchange="choixrep3()">
						<option value=""></option>
						<option value="oui" <?php if($reponse5=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse5=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse5=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt3" class="comment"><?php echo $coment5;?></textarea>							
				</p>
					<dd>- Pour chaque catégorie de différence temporelle et pour chaque catégorie de pertes fiscales et de crédits d'impôts non utilisés, le montant des actifs et passifs d'ID comptabilisés au bilan pour chaque exercice présenté et le montant du produit ou de la charge d'ID comptabilisé dans le compte de résultat, s'il n'est pas mis en évidence par les variations des montants comptabilisés au bilan.</dd>
					<select id="rep4" onchange="choixrep4()">
						<option value=""></option>
						<option value="oui" <?php if($reponse6=="oui") echo 'selected';?> >oui</option>
						<option value="N/A" <?php if($reponse6=="N/A") echo 'selected';?>>N/A</option>
						<option value="non" <?php if($reponse6=="non") echo 'selected';?>> non</option>
					</select>
			
				<h5>Commentaires (obligatoire si réponse négative)</h5>
				<textarea id="Cmt4" class="comment"><?php echo $coment6;?></textarea>							
				</p>
			</div>
		</div>
	</body>
</html>
