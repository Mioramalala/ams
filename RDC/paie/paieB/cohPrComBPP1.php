
<?php 
		session_start();
		include '../../../connexion.php';
		//include '../../../test_acces.php';
		///////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$sql1="SELECT RDC_REPONSE,RDC_COMMENTAIRE FROM tab_rdc WHERE RDC_RANG=1 AND RDC_OBJECTIF='B' AND MISSION_ID=".$_SESSION['idMission']." AND RDC_CYCLE='paie'";
		$rep=$bdd->query($sql1);
		$don=$rep->fetch();
		$reponse=$don["RDC_REPONSE"];
		$coment=$don["RDC_COMMENTAIRE"];

	if(isset($reponse) && isset($coment))
	{
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<link rel="stylesheet" href="../../../class/css.css"/>
		
		<style type="text/css">
			#waiting{position: absolute;width: 100%; height: 100%;opacity: 0.8;background-color: #fff;}
			#loading{position: absolute;width: 200px; height: 100px;margin-top: 200px;margin-left: 500px;z-index: 10;}
		</style>
		<script  type="text/javascript">
			$(function(){
				
			
				$("#renvoiRevAnPP").click(function(){

					//alert("CCC");
					$("#ChampGauche").load("RDC/paie/paieB/TabDB1PP.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
				});
				$("#suivantPP").click(function(){

					iterI();
					//$("#waiting").show();	
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();
					var ra_compte = "";
					var ra_cmt = "";
					var compteur = parseInt($("#compteur").attr('alt')); // Compte le nombre de ligne du revu analitique
					if((rep1=="non" && cmt1=="") || rep1==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep1,cmt:cmt1,rang:1,cycle:'paie',objet:'B'},
							success:function(e){
							//	alert(e);
							}				
						});
						for (var i = 1; i <= compteur; i++) {// Pour la revu analityque
							ra_compte = $("#compte"+i).text();
							ra_cmt = $("#cmt"+i).val();								
							$.ajax({
								type:"post",
								url:"RDC/paie/paieB/saveB1.php",
								data:{compte:ra_compte,cmt:ra_cmt,cycle:'paie_personnel',objectif:'B'},
								success:function(e){
									 //alert(envoyee);
								}				
							});
						}
						$("#contenue").load("RDC/paie/paieB/cohPrComBPP2.php");		
					}
				});
				
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/accPP.php");
				});

				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieB/cohPrComBPP1.php");
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
		<div id="waiting" style="display:none;">
			<div id="loading">
				<center>
					<img src="RDC/paie/ajax-loader_blue.gif"/><br />
					<strong style="color: #095487;">Veuillez patienter ...</strong>
				</center>
			</div>
		</div>		
		<div id="GranTitre">
			 B - EXHAUSTIVITE DES ENREGISTREMENTS : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> S'assurer de la cohérence de tous les états justificatifs des comptes. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Balance générale N (comptes 42x et 64)</li>
						<li>Grand livre N (comptes 42x et 64)</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Les soldes des grand-livres/balance générale sont-ils conformes entre eux ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Rapprochement soldes GL/Balance</label> </p>
			
		</div>
		<div>
			<input type="button" class="bouton" value=">" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite"
				<?php 
					if(@$_GET["exhaustivte_visible"]!='OK')
					print 'style="display:none;"'
				?> >
				<h5><u>Question :</u></h5>
				<p>Les soldes des grand-livres/balance générale sont-ils conformes entre eux ? 
					<select id="rep1APP" onchange="choixrep1()">
						<!-- <option value=""></option> -->
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
<?php 

}
else
{
 ?>

<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		
		<style type="text/css">
			#waiting{position: absolute;width: 100%; height: 100%;opacity: 0.8;background-color: #fff;}
			#loading{position: absolute;width: 200px; height: 100px;margin-top: 200px;margin-left: 500px;z-index: 10;}
		</style>
		<script type="text/javascript">


		$(function(){
				
			
				$("#renvoiRevAnPP").click(function(){

					//alert("CCC");
					$("#ChampGauche").load("RDC/paie/paieB/TabDB1PP.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
				});
				$("#suivantPP").click(function(){

					iterI();
					//$("#waiting").show();	
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();
					var ra_compte = "";
					var ra_cmt = "";
					var compteur = parseInt($("#compteur").attr('alt')); // Compte le nombre de ligne du revu analitique
					if((rep1=="non" && cmt1=="") || rep1==""){ 
						alert('Des réponses obligatoires ont été omises!');
					} 
					else{
						
						$.ajax({
							type:"post",
							url:"RDC/paie/CohPostDrop.php",
							data:{rep:rep1,cmt:cmt1,rang:1,cycle:'paie',objet:'B'},
							success:function(e){
								//alert(e);
							}				
						});
						for (var i = 1; i <= compteur; i++) {// Pour la revu analityque
							ra_compte = $("#compte"+i).text();
							ra_cmt = $("#cmt"+i).val();								
							$.ajax({
								type:"post",
								url:"RDC/paie/paieB/saveB1.php",
								data:{compte:ra_compte,cmt:ra_cmt,cycle:'paie_personnel',objectif:'B'},
								success:function(e){
									 // alert(ra_cmt);
								}				
							});
						}
						$("#contenue").load("RDC/paie/paieB/cohPrComBPP2.php");		
					}
				});
				
				$("#retourPP").click(function(){
					$("#contenue").load("RDC/paie/accPP.php");
				});

				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieB/cohPrComBPP1.php");
				});
			});



				function choixrep1(){
					var rep1=$("#rep1APP").val();				
					var cmt1=$("#Cmt1APP").val();
					if(rep1=="non" && cmt1==""){
						alert('Des commentaires obligatoires ont été omis!');
					}
				}

			

			/*$(function()
			{
					

				

				$("#renvoiRevAnPP").click(function(){
					$("#ChampGauche").load("RDC/paie/paieB/TabDB1PP.php");
					$('#ChampDroite').show();
					$('#suivantPP').show();
					$('#precedPP').show();
					$('#retourPP').hide();
				});

				$("#suivantPP").click(function(){
					$("#contenue").load("RDC/paie/paieB/cohPrComBPP2.php");
				});

				$("#precedPP").click(function(){
					$("#contenue").load("RDC/paie/paieB/cohPrComBPP1.php");
				});

			});
			function choixrep1()
			{
				var rep1=$("#rep1APP").val();				
				var cmt1=$("#Cmt1APP").val();
				if(rep1=="non" && cmt1==""){
					alert('Des commentaires obligatoires ont été omis!');
				}
			} */
			
		
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
			B - EXHAUSTIVITE DES ENREGISTREMENTS : Partie I	
		</div>		
		<div id="ChampGauche">
			
				<p><strong>Travaux à faire :</strong> S'assurer de la cohérence de tous les états justificatifs des comptes. </p>
				
				<h4>Documents et infos à obtenir</h4>	
				<p>
					<ul>
						<li>Balance générale N (comptes 42x et 64)</li>
						<li>Grand livre N (comptes 42x et 64)</li>
					</ul>
				</p>
				<h4>Questions :</h4>	
				<p>
					<ul>
						<li>Les soldes des grand-livres/balance générale sont-ils conformes entre eux ?</li>
					</ul>
				</p>
				<p><label id="titrRev">Feuille de travail : </label>  <label id="renvoiRevAnPP">Rapprochement soldes GL/Balance</label> </p>
			
		</div>
		<div> <!-- ts mandeha reto boutton reto -->
			<input type="button" class="bouton" value=">" id="suivantPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<input type="button" class="bouton" value="<" id="retourPP" style="float: right; position: relatif; margin-top: 0;" />
			<input type="button" class="bouton" value="<" id="precedPP" style="float: right; position: relatif; margin-top: 0;display:none;" />
			<div id="ChampDroite" 
				<?php 
					if(@$_GET["exhaustivte_visible"]!='OK')
					print 'style="display:none;"';
				?> >
				<h5><u>Question :</u></h5>
				<p>Les soldes des grand-livres/balance générale sont-ils conformes entre eux ? 
					<select id="rep1APP" onchange="choixrep1()">
						<!-- <option value=""></option> -->
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