
<?php session_start();
	include '../../../connexion.php';
	//include '../../../test_acces.php';
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG=1 AND RDC_OBJECTIF='D' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
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
					//$("#ChampGauche").load("RDC/paie/paieD/TabDD1PP.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
				});
				$("#suivantPP").click(function(){
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();	
					if((rep1=="non" && cmt1=="") || rep1==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep1,cmt:cmt1,rang:1,cycle:'paie',objet:'D'},
							success:function(e){
							}				
						});
						var compteur = parseInt($("#ajout").attr('alt'));
						for (var i = 1; i <= compteur; i++) {
							var periode = $("#periode"+i).val();
							var nbr = $("#nbr"+i).val();
							var avt = parseFloat($("#avt"+i).val());
							var salaire = parseFloat($("#salaire"+i).val());
							var salaireT = parseFloat($("#salaireT"+i).val());
							var totalD = parseFloat($("#totalD"+i).text());
							var irsa = parseFloat($("#irsa"+i).val());
							var persT = $("#persT"+i).val();	

							$.ajax({
								type:"post",
								url:"RDC/paie/paieD/saveD1.php",
								data:{periode:periode,nbr:nbr,avt:avt.toFixed(2),salaire:salaire.toFixed(2),salaireT:salaireT.toFixed(2),totalD:totalD.toFixed(2),irsa:irsa.toFixed(2),persT:persT},
								success:function(e){
								}				
							});
						};
						var tableau = new Array("avt","salaire","salaireT","totalD","irsa");
						for(var i=0; i< tableau.length; i++ ){
							var total = parseFloat($('#total'+tableau[i]).text());						
							var compta = parseFloat($('#Compt'+tableau[i]).val());						
							var ecart = parseFloat($('#ecart'+tableau[i]).text());
							var id = "";
							switch(tableau[i]){
								case "avt":
									id = "avantage nature";
									break;
								case "salaire":
									id = "salaires bruts";
									break;
								case "salaireT":
									id = "salaires temporaires";
									break;
								case "totalD":
									id = "total salaire declare";
									break;
								case "irsa":
									id = "irsa";
									break;
								default :
									break;
							}
							$.ajax({
								type:"post",
								url:"RDC/paie/paieD/saveD1prime.php",
								data:{total:total,compta:compta,ecart:ecart,id:id},
								success:function(e){
								}				
							});
						}
						$("#contenue").load("RDC/paie/paieD/cohPrComDPP1a.php");
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/accPP.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieD/cohPrComDPP1.php");
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
			 E - EXISTENCE DES SOLDES : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Justifier les soldes du bilan : impôts sur les salaires, rémunérations dues, prêts et acomptes au personnel. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Balance générale des comptes.</li>
					</ul>
				</p>
				<h4>Question :</h4>	
				<p>
					<ul>
						<li>Les soldes des comptes de salaires au bilan sont-ils justifiés par rapport aux dernières déclarations sociales et fiscales ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Questionnaires</label></p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["existence_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question :</u></h5>
				<p>Les soldes des comptes de salaires au bilan sont-ils justifiés par rapport aux dernières déclarations sociales et fiscales ?
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
					//$("#ChampGauche").load("RDC/paie/paieD/TabDD1PP.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
				});
				$("#suivantPP").click(function(){
					var rep=$("#rep1APP").val();				
					var cmt=$("#Cmt1APP").val();
					if((rep=="non" && cmt=="") || rep==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPost.php",
							data:{rep:rep,cmt:cmt,rang:1,cycle:'paie',objet:'D'},
							success:function(e){
							//	alert(e);
							}
						});
						var compteur = parseInt($("#ajout").attr('alt'));
						for (var i = 1; i <= compteur; i++) {
							var periode = $("#periode"+i).val();
							var nbr = $("#nbr"+i).val();
							var avt = parseFloat($("#avt"+i).val());
							var salaire = parseFloat($("#salaire"+i).val());
							var salaireT = parseFloat($("#salaireT"+i).val());
							var totalD = parseFloat($("#totalD"+i).text());
							var irsa = parseFloat($("#irsa"+i).val());
							var persT = $("#persT"+i).val();	

							$.ajax({
								type:"post",
								url:"RDC/paie/paieD/saveD1.php",
								data:{periode:periode,nbr:nbr,avt:avt.toFixed(2),salaire:salaire.toFixed(2),salaireT:salaireT.toFixed(2),totalD:totalD.toFixed(2),irsa:irsa.toFixed(2),persT:persT},
								success:function(e){
								}				
							});
						};
						var tableau = new Array("avt","salaire","salaireT","totalD","irsa");
						for(var i=0; i< tableau.length; i++ ){
							var total = parseFloat($('#total'+tableau[i]).text());						
							var compta = parseFloat($('#Compt'+tableau[i]).val());						
							var ecart = parseFloat($('#ecart'+tableau[i]).text());
							var id = "";
							switch(tableau[i]){
								case "avt":
									id = "avantage nature";
									break;
								case "salaire":
									id = "salaires bruts";
									break;
								case "salaireT":
									id = "salaires temporaires";
									break;
								case "totalD":
									id = "total salaire declare";
									break;
								case "irsa":
									id = "irsa";
									break;
								default :
									break;
							}
							$.ajax({
								type:"post",
								url:"RDC/paie/paieD/saveD1prime.php",
								data:{total:total,compta:compta,ecart:ecart,id:id},
								success:function(e){
								}				
							});
						}
						$("#contenue").load("RDC/paie/paieD/cohPrComDPP1a.php");
					}
				});
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/accPP.php");
				});
				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieD/cohPrComDPP1.php");
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
			 E - EXISTENCE DES SOLDES : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> Justifier les soldes du bilan : impôts sur les salaires, rémunérations dues, prêts et acomptes au personnel. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Balance générale des comptes.</li>
					</ul>
				</p>
				<h4>Question :</h4>	
				<p>
					<ul>
						<li>Les soldes des comptes de salaires au bilan sont-ils justifiés par rapport aux dernières déclarations sociales et fiscales ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Questionnaires</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">|" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["existence_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question :</u></h5>
				<p>Les soldes des comptes de salaires au bilan sont-ils justifiés par rapport aux dernières déclarations sociales et fiscales ?
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