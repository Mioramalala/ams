<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css">
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<script type="text/javascript" src="../RDC/js/function.js"></script>
		<!--link rel="stylesheet" href="../../../class/css.css"/-->
		<link rel="stylesheet" href="../RDC/DCD/css.css">
		<link rel="stylesheet" href="../../RA/css_RA.css">
		<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
		<script>
			$(function(){
				$("#coherence").click(function(){
					$("#contenue").load("RDC/DCD/A_coherence/coherence1.php");					
				});				
				$("#exhaustivite").click(function(){
					$("#contenue").load("RDC/DCD/B_exhaustivite/exhaustivite1.php");					
				});	
				$("#regularite").click(function(){
					$("#contenue").load("RDC/DCD/C_regularite/regularite1.php");					
				});
				$("#existence").click(function(){
					$("#contenue").load("RDC/DCD/D_existence/existence1.php");					
				});
				$("#evaluation").click(function(){
					$("#contenue").load("RDC/DCD/E_evaluation/evaluation1.php");					
				});		
				$("#juridique").click(function(){
					$("#contenue").load("RDC/DCD/F_juridique/juridique1.php");					
				});
				$("#information").click(function(){
					$("#contenue").load("RDC/DCD/G_information/information1.php");					
				});
				
				
				$('#bt_retour').click(function(){
					$("#contenue").load("RDC/index.php");
				});
				
				$('#bt_feuille_maitresse').click(function(){
					$("#contenue").load("RDC/DCD/feuille_maitresse.php");
				});
			
			});
		
		</script>
	</head>

	<body>
		<center>
	
		<table width="70%" height="50" style="text-align:left;">
			<tr>
				<td class=""><div style="box-shadow: 10px 10px 5px #888888; width:100%;background-color:#FFFFFF;color:#000000;font-family: font_TE;">CYCLE DEBITEURS ET CREDITEURS DIVERS</div></td>
			</tr>
		</table>
		<table width="70%" height="50" style="text-align:left;">
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="coherence">
					
					<img height="70px" src="img/alphabet/A.png"></img>
					<label>COHERENCES ET PRINCIPES COMPTABLES</label>
				</td>
				<td class="td_Image" width="50%" id="exhaustivite">
					
					<img height="70px" src="img/alphabet/b.png"></img>
					<label>EXHAUSTIVITE DES ENREGISTREMENTS</label>
				</td>
			</tr>
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="regularite">
				
					<img height="70px" src="img/alphabet/C.png"></img>
					<label>REGULARITE DES ENREGISTREMENTS</label>
				</td>
				<td class="td_Image" width="50%" id="existence">
					
					<img height="70px" src="img/alphabet/E.png"></img>
					<label>EXISTENCE DES SOLDES</label>
				</td>
			</tr>
			<tr class="label_Evaluation1">
				<td id="evaluation"  class="td_Image" width="50%" >
				
					<img height="70px" src="img/alphabet/F.png"></img>
					<label>EVALUATION DES SOLDES</label>
				</td>
				<td id="juridique"   class="td_Image" width="50%" >
					
					<img height="70px" src="img/alphabet/h.png"></img>
					<label>JURIDIQUE FISCAL ET DIVERS</label>
				</td>
				
			</tr>
			<tr class="label_Evaluation1">
				
				<td id="information"  class="td_Image" width="50%" >
					
					<img height="70px" src="img/alphabet/i.png"></img>
					<label>INFORMATION ET PRESENTATION</label>
				</td>
			</tr>
			

		</table>
		<table>
			<tr height="40">
				<td id="bt_feuille_maitresse" align="center" class="bouton_feuille_maitresse">APERCU DE LA FEUILLE MAITRESSE
				</td>
				<td align="center" width="21.5%">
					<input type="button" id="bt_planif" onClick="planification('dcd');" value="Planification" class="bouton" height="40px"/>
				</td> 
				<td align="center" width="21.5%"><input type="button" id="bt_retour" value="Retour" class="bouton" /></td>
			</tr>
		</table>		
		</center>
	</body>
</html>