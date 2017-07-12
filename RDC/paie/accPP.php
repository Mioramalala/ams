<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css">
		<link rel="stylesheet" href="../../RA/css_RA.css">
				<script type="text/javascript" src="../RDC/js/function.js"></script>
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
		<link rel="stylesheet" href="../../RA/css_RA.css">
		<script>
			$(function(){
				$("#APP").click(function(){
					$("#contenue").load("RDC/paie/paieA/cohPrComAPP1.php");
				});
				$("#BPP").click(function(){
					$("#contenue").load("RDC/paie/paieB/cohPrComBPP1.php");
				});
				$("#CPP").click(function(){
					$("#contenue").load("RDC/paie/paieC/cohPrComCPP1.php");
				});
				$("#DPP").click(function(){
					$("#contenue").load("RDC/paie/paieD/cohPrComDPP1.php");
				});
				$("#EPP").click(function(){
					$("#contenue").load("RDC/paie/paieE/cohPrComEPP1.php");
				});
				$("#FPP").click(function(){
					$("#contenue").load("RDC/paie/paieF/cohPrComFPP1.php");
				});
				$("#GPP").click(function(){
					$("#contenue").load("RDC/paie/paieG/cohPrComGPP1.php");
				});
				$("#HPP").click(function(){
					$("#contenue").load("RDC/paie/paieH/cohPrComHPP1.php");
				});
				$("#RPP").click(function(){
					$("#contenue").load("RDC/index.php");
				});
				$("#FM").click(function(){
					$("#contenue").load("RDC/paie/feuille.php");
				});
			});
		
		</script>
	</head>

	<body>
		<center>
		<table width="70%" height="50" style="text-align:left;">
			<tr>
				<td class=""><div style="box-shadow: 10px 10px 5px #888888; width:100%;background-color:#FFFFFF;color:#000000;font-family: font_TE;">Paie et Personnel</div></td>
			</tr>
		</table>
		
		<table width="70%" height="50" style="text-align:left;">
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="APP">
					
					<img height="70px" src="img/alphabet/A.png"></img>
					<label>COHERENCES ET PRINCIPES COMPTABLES</label>
				</td>
				<td class="td_Image" width="50%" id="BPP">
					
					<img height="70px" src="img/alphabet/b.png"></img>
					<label>EXHAUSTIVITE DES ENREGISTREMENTS</label>
				</td>
			</tr>
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="CPP">
					
					<img height="70px" src="img/alphabet/C.png"></img>
					<label>REGULARITE DES ENREGISTREMENTS</label>
				</td>
				<td class="td_Image" width="50%" id="DPP">
					
					<img height="70px" src="img/alphabet/E.png"></img>
					<label> EXISTENCE DES SOLDES</label>
				<td>
			</tr>
			
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="EPP">
					
					<img height="70px" src="img/alphabet/F.png"></img>
					<label>EVALUATION DES SOLDES</label>
				</td>
				<td class="td_Image" width="50%" id="FPP">
					
					<img height="70px" src="img/alphabet/g.png"></img>
					<label>RATTACHEMENT DES OPERATIONS</label>
				</td>
			</tr>
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="GPP">
					
					<img height="70px" src="img/alphabet/h.png"></img>
					<label>JURIDIQUE, FISCAL ET DIVERS</label>
				</td>
				<td class="td_Image" width="50%" id="HPP">
					
					<img height="70px" src="img/alphabet/i.png"></img>
					<label>INFORMATION ET PRESENTATION</label>
				</td>
			</tr>
		</table>
		<table>
			<tr height="40px">
				<td id="FM" align="center" class="bouton_feuille_maitresse" title="Feuille maîtresse">APERCU DE LA FEUILLE MAITRESSE</td> 
				<td align="center" width="21.5%">
					<input type="button" id="bt_planif" onClick="planification('paie');" value="Planification" class="bouton" height="40px"/>
				</td>
				<td align="center" width="21.5%"><input type="button" id="RPP" value="Retour" class="bouton"  height="40px"/></td>
			</tr>
		</table>		
		</center>
	<div id="fermer" style="display:none;"><center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>
</html>