<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css">
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
		<link rel="stylesheet" href="../../RA/css_RA.css">
		<script type="text/javascript" src="../RDC/js/function.js"></script>
		<script>
			$(function(){
					
					$('#bt_retour').click(function(){
						$("#contenue").load("RDC/index.php");
					});
					
					$("#A").click(function(){
						//alert('mander ver???');
						$("#contenue").load("RDC/fond_propre/CohPriCo/cohPrCom.php");
					
					});
					
					$("#B").click(function(){
						// alert("B io zao");
						$("#contenue").load("RDC/fond_propre/B/B_Reg_Eng.php");
					});
					
					$("#C").click(function(){
							$("#contenue").load("RDC/fond_propre/C/C_Exi_Sold.php");
					});
					$("#D").click(function(){
							$("#contenue").load("RDC/fond_propre/D/D_Jur_Fisk.php");
					});
					$("#E").click(function(){
							$("#contenue").load("RDC/fond_propre/E/E_Info_Pres.php");
					});
					$("#Recap").click(function(){
					
							$("#contenue").load("RDC/fond_propre/feuille_maitresse.php");
							
					});
					
					
					});
		
		
		</script>
	</head>

	<body>
	
		<div id="GranTitre">Cycle fonds propres</div>
		<table height="100" width="70%" style="background-color:#FFFFFF">
			<tr class="label_Evaluation"  height="110">
				<td class="td_Image"width="50%" id="A">
					<img  src="img/alphabet/A.png"></img>
					<label>COHERENCES ET PRINCIPES COMPTABLES.</label>
				</td>
				<td class="td_Image"width="50%" id="B">
					<img  src="img/alphabet/C.png"></img>
					<label>REGULARITE DES ENREGISTREMENTS</label>
				</td>
			</tr>
			<tr class="label_Evaluation"  height="110">
				<td class="td_Image"width="50%" id="C">
					<img  src="img/alphabet/E.png"></img>
					<label>EXISTENCE DES SOLDES</label>
				</td>
				<td class="td_Image"width="50%" id="D">
					<img  src="img/alphabet/h.png"></img>
					<label>JURIDIQUE FISCAL ET DIVERS</label>
				</td>
			</tr>
			<tr class="label_Evaluation"  height="110">
				<td class="td_Image"width="50%" id="E">
					<img  src="img/alphabet/i.png"></img>
					<label>INFORMATION ET PRESENTATIONS</label>
				</td>
			</tr>
		</table>
		<table>
			<tr height="40px">
				<td id="Recap" align="center" class="bouton_feuille_maitresse" title="Feuille maîtresse">APERCU DE LA FEUILLE MAITRESSE</td> 
				<td align="center" width="21.5%">
					<input
						type="button"
						id="bt_planif"
						onClick="
							$('#RA').click();
							planification('fond');
						"
						value="Planification" class="bouton" height="40px"
					/>
				</td>
				<td align="center" width="21.5%"><input type="button" id="bt_retour" value="Retour" class="bouton"  height="40px"/></td>
			</tr>
		</table>
	</body>
</html>