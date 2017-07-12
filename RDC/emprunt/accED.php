<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css">
		<script type="text/javascript" src="../RDC/js/function.js"></script>
		<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
		<link rel="stylesheet" href="../../RA/css_RA.css">
		<script>
			$(function(){
				$("#AED").click(function(){
					$("#contenue").load("RDC/emprunt/empruntA/objetAED1.php");
				});
				$("#BED").click(function(){
					$("#contenue").load("RDC/emprunt/empruntB/objetBED1.php");
				});
				$("#CED").click(function(){
					$("#contenue").load("RDC/emprunt/empruntC/objetCED1.php");
				});
				$("#DED").click(function(){
					$("#contenue").load("RDC/emprunt/empruntD/objetDED1.php");
				});
				$("#RIT").click(function(){
					$("#contenue").load("RDC/index.php");
				});
				$("#FM").click(function(){
					$("#contenue").load("RDC/emprunt/feuille.php");
				});
			});
		
		</script>
	</head>

	<body>
		<center>
		
		<table width="70%" height="50" style="text-align:left;">
			<tr>
				<td class=""><div style="box-shadow: 10px 10px 5px #888888; width:100%;background-color:#FFFFFF;color:#000000;font-family: font_TE;">Emprunts et Dettes Financières</div></td>
			</tr>
		</table>
		<table  width="70%" height="50" style="text-align:left;">
			<tr class="label_Evaluation"  height="110">
				<td class="td_Image"width="50%" id="AED">
					<img  src="img/alphabet/A.png"></img>
					<label>COHERENCES ET PRINCIPES COMPTABLES.</label>
					
				</td>
				<td class="td_Image"width="50%" id="BED">
					<img  src="img/alphabet/C.png"></img>
					<label>REGULARITE DES ENREGISTREMENTS ET RATTACHEMENT</label>
					
				</td>
			</tr>
			<tr class="label_Evaluation"  height="110">
				<td class="td_Image"width="50%" id="CED">
					<img  src="img/alphabet/F.png"></img>
					<label>EVALUATION DES SOLDES</label>
					
				</td>
				<td class="td_Image"width="50%" id="DED">
					<img  src="img/alphabet/i.png"></img>
					<label>INFORMATION ET PRESENTATION.</label>
					
				<td>
			</tr>
		</table>	
		<table>
			<tr height="40px">
				<td id="FM" align="center" class="bouton_feuille_maitresse" title="Feuille maîtresse">APERCU DE LA FEUILLE MAITRESSE</td> 
				<td align="center" width="21.5%">
					<input type="button" id="bt_planif" onClick="planification('emprunt');" value="Planification" class="bouton" height="40px"/>
				</td>
				<td align="center" width="21.5%"><input type="button" id="RIT" value="Retour" class="bouton"  height="40px"/></td>
			</tr>
		</table>
		</center>
	</body>
</html>