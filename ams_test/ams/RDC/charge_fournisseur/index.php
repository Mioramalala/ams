<html>
	<head>
		<meta charset="utf-8"/>
		<!--link rel="stylesheet" href="../../css/RDC.css"-->
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<!--link rel="stylesheet" href="../../../class/css.css"/-->
		<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
		<link rel="stylesheet" href="../../RA/css_RA.css">
		<script type="text/javascript" src="../RDC/js/function.js"></script>
		<script>
			$(function(){
					$("#coherence").click(function(){
						waiting();$("#contenue").load("RDC/charge_fournisseur/A_coherence/coherence1.php",stopWaiting);					
					});		
					$("#exhaustivite").click(function(){
						waiting();$("#contenue").load("RDC/charge_fournisseur/B_exhaustivite/exhaustivite1.php",stopWaiting);				
					});	
					$("#regularite").click(function(){
						waiting();$("#contenue").load("RDC/charge_fournisseur/C_regularite/regularite1.php",stopWaiting);					
					});	
					$("#existence").click(function(){
						waiting();$("#contenue").load("RDC/charge_fournisseur/D_existence/existence1.php",stopWaiting);					
					});	
					$("#evaluation").click(function(){
						waiting();$("#contenue").load("RDC/charge_fournisseur/E_evaluation/evaluation1.php",stopWaiting);					
					});	
					$("#rattachement").click(function(){
						waiting();$("#contenue").load("RDC/charge_fournisseur/F_rattachement/rattachement1.php",stopWaiting);				
					});	
					$("#juridique").click(function(){
						waiting();$("#contenue").load("RDC/charge_fournisseur/G_juridique/juridique1.php",stopWaiting);					
					});	
					$("#information").click(function(){
						waiting();$("#contenue").load("RDC/charge_fournisseur/H_information/information1.php",stopWaiting);					
					});						
					$('#bt_feuille_maitresse').click(function(){
						waiting();$("#contenue").load("RDC/charge_fournisseur/feuille_maitresse.php",stopWaiting);
					});
					$('#bt_retour').click(function(){
						waiting();$("#contenue").load("RDC/index.php",stopWaiting);
					});			
			});
		
		</script>
	</head>

	<body>
		<center>
		
		<table width="70%" height="50" style="text-align:left;">
			<tr>
				<td ><div style="box-shadow: 10px 10px 5px #888888; width:100%;background-color:#FFFFFF;color:#000000;font-family: font_TE;">CHARGES / FOURNISSEURS</div></td>
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
					<label> EXISTENCE DES SOLDES</label>
				<td>
			</tr>
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="evaluation">
					
					<img height="70px" src="img/alphabet/F.png"></img>
					<label>EVALUATION DES SOLDES</label>
				</td>
				<td class="td_Image" width="50%" id="rattachement">
					
					<img height="70px" src="img/alphabet/g.png"></img>
					<label>RATTACHEMENT DES OPERATIONS</label>
				</td>
			</tr>
			<tr class="label_Evaluation1">
				<td class="td_Image" width="50%" id="juridique">
					
					<img height="70px" src="img/alphabet/h.png"></img>
					<label>JURIDIQUE, FISCAL ET DIVERS</label>
				</td>
				<td class="td_Image" width="50%" id="information">
					<img height="70px" src="img/alphabet/i.png"></img>
					<label>INFORMATION ET PRESENTATION</label>
				</td>
			</tr>
		</table>
		<table>
			<tr height="40px">
				<td id="bt_feuille_maitresse" align="center" class="bouton_feuille_maitresse" title="Feuille maîtresse">APERCU DE LA FEUILLE MAITRESSE</td> 
				<td align="center" width="21.5%">
					<input type="button" id="bt_planif" onClick="planification('charge');" value="Planification" class="bouton" height="40px"/>
				</td>
				<td align="center" width="21.5%"><input type="button" id="bt_retour" value="Retour" class="bouton" height="40px"/></td>
			</tr>
		</table>
		</center>
		<!----------------------------------------deconnexion--------------------------------------------------------------->    
      <div id="fermer" style="display:none;">
       <center>
        <p> Voulez-vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
             
		<!------------------------------------------------------------------------------------------------------------------>
	</body>
</html>