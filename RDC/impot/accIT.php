<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css">
		<link rel="stylesheet" href="../../RA/css_RA.css">
		<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
		<script type="text/javascript" src="../RDC/js/function.js"></script>
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<script>
			$(function(){
				$("#AIT").click(function(){
					$("#contenue").load("RDC/impot/impotA/objetAIT1.php");
				});
				$("#BIT").click(function(){
					$("#contenue").load("RDC/impot/impotB/objetBIT1.php");
				});
				$("#CIT").click(function(){
					$("#contenue").load("RDC/impot/impotC/objetCIT1.php");
				});
				$("#DIT").click(function(){
					$("#contenue").load("RDC/impot/impotD/objetDIT1.php");
				});
				$("#EIT").click(function(){
					$("#contenue").load("RDC/impot/impotE/objetEIT1.php");
				});
				$("#FIT").click(function(){
					$("#contenue").load("RDC/impot/impotF/objetFIT1.php");
				});
				$("#GIT").click(function(){
					$("#contenue").load("RDC/impot/impotG/objetGIT1.php");
				});
				$("#HIT").click(function(){
					$("#contenue").load("RDC/impot/impotH/objetHIT1.php");
				});
				$("#RIT").click(function(){
					$("#contenue").load("RDC/index.php");
				});
				$("#FM").click(function(){
					$("#contenue").load("RDC/impot/feuille.php");
				});
			});
		
		</script>
	</head>

	<body>
		<center>
		
		<table width="70%" height="50" style="text-align:left;background-color:#FFFFFF;margin-bottom:10px">
			<tr>
				<td style="color:#0099FF">
					<div style="box-shadow: 10px 10px 5px #888888; width:100%;background-color:#FFFFFF;">		
						<table>
							<tr>
								<td width="20%" style="left:15%;top:2px;margin-left:15%"><img src="../../img/iconswidgets/impots-taxe.png" height="48" width="48"/></td>
								<td width="50%" style="color:#89CCF8;font-size:1.5em;font-family:font_TE;font-weight:bold;">Impôts et Taxes</td>
							</tr>
						
						</table>
					</div>
					</td>
				
			</tr>
			
	</table>
		<table width="70%" height="50" style="text-align:left;">
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="AIT">
					
					<img height="70px" src="img/alphabet/A.png"></img>
					<label>COHERENCES ET PRINCIPES COMPTABLES</label>
				</td>
				<td class="td_Image" width="50%" id="BIT">
					
					<img height="70px" src="img/alphabet/b.png"></img>
					<label>EXHAUSTIVITE DES ENREGISTREMENTS</label>
				</td>
			</tr>
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="CIT">
					
					<img height="70px" src="img/alphabet/C.png"></img>
					<label>REGULARITE DES ENREGISTREMENTS</label>
				</td>
				<td class="td_Image" width="50%" id="DIT">
					
					<img height="70px" src="img/alphabet/E.png"></img>
					<label> EXISTENCE DES SOLDES</label>
				<td>
			</tr>
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="EIT">
					
					<img height="70px" src="img/alphabet/F.png"></img>
					<label>EVALUATION DES SOLDES</label>
				</td>
				<td class="td_Image" width="50%" id="FIT">
					
					<img height="70px" src="img/alphabet/g.png"></img>
					<label>RATTACHEMENT DES OPERATIONS</label>
				</td>
			</tr>
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="GIT">
					
					<img height="70px" src="img/alphabet/h.png"></img>
					<label>JURIDIQUE, FISCAL ET DIVERS</label>
				</td>
				<td class="td_Image" width="50%" id="HIT">
					
					<img height="70px" src="img/alphabet/i.png"></img>
					<label>INFORMATION ET PRESENTATION</label>
				</td>
			</tr>
		</table>
		<table>
			<tr height="40px">
				<td id="FM" align="center" class="bouton_feuille_maitresse" title="Feuille maîtresse">APERCU DE LA FEUILLE MAITRESSE</td> 
				<td align="center" width="21.5%">
					<input type="button" id="bt_planif" onclick="planification('impot');" value="Planification" class="bouton" height="40px"/>
				</td>
				<td align="center" width="21.5%"><input type="button" id="RIT" value="Retour" class="bouton"  height="40px"/></td>
			</tr>
		</table>
		</center>
	</body>
</html>