<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css">
				<script type="text/javascript" src="../RDC/js/function.js"></script>
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<!--link rel="stylesheet" href="../../../class/css.css"/-->
		<link rel="stylesheet" href="../RDC/tresorerie/css_tresorerie.css">
		<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
		<script>
			$(function(){
					$("#coherence").click(function(){
						waiting();$("#contenue").load("RDC/tresorerie/A_coherence/coherence1.php",stopWaiting);					
					});				
					$("#regularite").click(function(){
						waiting();$("#contenue").load("RDC/tresorerie/B_regularite/regularite1.php",stopWaiting);					
					});	
					$("#existence").click(function(){
						waiting();$("#contenue").load("RDC/tresorerie/C_existence/existence1.php",stopWaiting);					
					});
					$("#rattachement").click(function(){
						waiting();$("#contenue").load("RDC/tresorerie/D_rattachement/rattachement1.php",stopWaiting);					
					});
					$("#juridique").click(function(){
						waiting();$("#contenue").load("RDC/tresorerie/E_juridique/juridique1.php",stopWaiting);					
					});
					$("#information").click(function(){
						waiting();$("#contenue").load("RDC/tresorerie/F_information/information1.php",stopWaiting);					
					});
					$('#bt_retour').click(function(){
						waiting();$("#contenue").load("RDC/index.php",stopWaiting);
					});
					
					$('#bt_feuille_maitresse').click(function(){
						waiting();$("#contenue").load("RDC/tresorerie/feuille_maitresse.php",stopWaiting);
					});
			
			});
		
		</script>
	</head>

	<body>
		<center>
		<table width="70%" height="50" style="text-align:left;">
			<tr>
				<td class=""><div style="box-shadow: 10px 10px 5px #888888; width:100%;background-color:#FFFFFF;color:#000000;font-family: font_TE;">TRESORERIE</div></td>
			</tr>
		</table>
		<table height="100" width="70%" style="background-color:#FFFFFF">
			<tr class="label_Evaluation"  height="110">
				<td class="td_Image"width="50%" id="coherence">
					<img  src="img/alphabet/A.png"></img>
					<label>COHERENCES ET PRINCIPES COMPTABLES.</label>
					
				</td>
				<td class="td_Image"width="50%" id="regularite">
					<img  src="img/alphabet/C.png"></img>
					<label>REGULARITE DES ENREGISTREMENTS</label>
					
				</td>
			</tr>
			<tr class="label_Evaluation"  height="110">
				<td class="td_Image"width="50%" id="existence">
					<img  src="img/alphabet/E.png"></img>
					<label> EXISTENCE DE SOLDE</label>
					
				</td>
				<td class="td_Image"width="50%" id="rattachement">
					<img  src="img/alphabet/g.png"></img>
					<label>RATTACHEMENT DES OPERATIONS.</label>
					
				<td>
			</tr>
			<tr class="label_Evaluation"  height="110">
				<td class="td_Image"width="50%" id="juridique">
					<img  src="img/alphabet/h.png"></img>
					<label>JURIDIQUE, FISCAL ET DIVERS.</label>
					
				</td>
				
				<td class="td_Image"width="50%" id="information">
					<img  src="img/alphabet/i.png"></img>
					<label>INFORMATION ET PRESENTATION</label>
					
				</td>
			</tr>
		</table>
		<table>
			<tr height="40px">
				<td id="bt_feuille_maitresse" align="center" class="bouton_feuille_maitresse" title="Feuille maîtresse">APERCU DE LA FEUILLE MAITRESSE</td> 
				<td align="center" width="21.5%">
					<input type="button" id="bt_planif" onClick="planification('tresorerie');" value="Planification" class="bouton" height="40px"/>
				</td>
				<td align="center" width="21.5%"><input type="button" id="bt_retour" value="Retour" class="bouton" /></td>
			</tr>
		</table>	
				
		</center>
		<!----------------------------------------deconnexion--------------------------------------------------------------->    
      <div id="fermer" style="display:none;">
       <center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
             
<!------------------------------------------------------------------------------------------------------------------>
	</body>
</html>