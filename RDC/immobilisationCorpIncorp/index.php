<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css">
		<script type="text/javascript" src="../RDC/js/function.js"></script>
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<!--link rel="stylesheet" href="../../../class/css.css"/-->
		<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
		<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
		<script>
			$(function(){
					$("#coherence").click(function(){
						$("#contenue").load("RDC/immobilisationCorpIncorp/A_coherence/coherence1.php");					
					});				
					$("#exhaustivite").click(function(){
						$("#contenue").load("RDC/immobilisationCorpIncorp/B_exhaustivite/exhaustivite1.php");					
					});	
					$("#regularite").click(function(){
						$("#contenue").load("RDC/immobilisationCorpIncorp/C_regularite/regularite1.php");					
					});
					$("#existence").click(function(){
						$("#contenue").load("RDC/immobilisationCorpIncorp/D_existence/existence1.php");					
					});
					$("#evaluation").click(function(){
						$("#contenue").load("RDC/immobilisationCorpIncorp/E_evaluation/evaluation1.php");					
					});
					$("#rattachement").click(function(){
						$("#contenue").load("RDC/immobilisationCorpIncorp/F_rattachement/rattachement1.php");					
					});
					$("#juridique").click(function(){
						$("#contenue").load("RDC/immobilisationCorpIncorp/G_juridique/juridique1.php");					
					});
					$("#information").click(function(){
						$("#contenue").load("RDC/immobilisationCorpIncorp/H_information/information1.php");					
					});
					
					
					$('#bt_retour').click(function(){
						$("#contenue").load("RDC/index.php");
					});
					
					$('#bt_feuille_maitresse').click(function(){
						$("#contenue").load("RDC/immobilisationCorpIncorp/feuille_maitresse.php");
					});
			
			});
		
		</script>
	</head>

	<body>
		<center>
		<div id="GranTitre">CYCLE IMMOBILISATIONS CORPORELLES ET INCORPORELLES</div>
		<table height="100" width="70%" style="background-color:#FFFFFF">
			<tr class="label_Evaluation" >
				<td class="td_Image"width="50%" id="coherence">
					<img height="70px" src="img/alphabet/A.png"></img>
					<label>COHERENCES ET PRINCIPES COMPTABLES.</label>
				</td>
				<td class="td_Image"width="50%" id="exhaustivite">
					<img height="70px" src="img/alphabet/b.png"></img>
					<label>EXHAUSTIVITE DES ENREGISTREMENTS.</label>
				</td>
			</tr>
			<tr class="label_Evaluation" >
				<td class="td_Image"width="50%" id="regularite">
					<img height="70px" src="img/alphabet/C.png"></img>
					<label>REGULARITE DES ENREGISTREMENTS</label>
				</td>
				<td class="td_Image"width="50%" id="existence">
					<img height="70px" src="img/alphabet/E.png"></img>
					<label>EXISTENCE DES SOLDES</label>
				</td>
			</tr>
			<tr class="label_Evaluation" >
				<td class="td_Image"width="50%" id="evaluation">
					<img height="70px" src="img/alphabet/F.png"></img>
					<label>EVALUATION DES SOLDES</label>
				</td>
				
				<td class="td_Image"width="50%" id="rattachement">
					<img height="70px" src="img/alphabet/g.png"></img>
					<label>RATTACHEMENT DES OPERATIONS</label>
				</td>
			</tr>
			<tr class="label_Evaluation" >
				<td class="td_Image"width="50%" id="juridique">
					<img height="70px" src="img/alphabet/h.png"></img>
					<label>JURIDIQUE FISCAL ET DIVERS</label>
				</td>
				
				<td class="td_Image"width="50%" id="information">
					<img height="70px" src="img/alphabet/i.png"></img>
					<label>INFORMATIONS ET PRESENTATION</label>	
				</td>
			</tr>
		</table>	
		<table>
			<tr height="40px">
				<td id="bt_feuille_maitresse" align="center" class="bouton_feuille_maitresse" title="Feuille maîtresse">APERCU DE LA FEUILLE MAITRESSE</td> 
				<td align="center" width="21.5%">
					<input type="button" id="bt_planif" onClick="planification('immo');" value="Planification" class="bouton" height="40px"/>
				</td>
				<td align="center" width="21.5%"><input type="button" id="bt_retour" value="Retour" class="bouton"  height="40px"/></td>
			</tr>
		</table>
		</center>
	</body>
</html>