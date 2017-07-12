<html>
	<head>
		<meta charset="utf-8"/>
		<!--link rel="stylesheet" href="../../css/RDC.css"-->
		<script type="text/javascript" src="../RDC/js/function.js"></script>
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
		<!--link rel="stylesheet" href="../../../class/css.css"/-->
		<link rel="stylesheet" href="../../RA/css_RA.css">
		<link rel="stylesheet" href="RDC/stock/css_stock.css">
		<link rel="stylesheet" href="../RDC/charge_fournisseur/css_charge_frns.css">
		<script>
			$(function(){
					$("#coherence").click(function(){
						$("#contenue").load("RDC/stock/A_coherence/coherence.php");
					});	
					$("#existence").click(function(){
						$("#contenue").load("RDC/stock/B_existence/existence1.php");
					});	
					$("#evaluation").click(function(){
						$("#contenue").load("RDC/stock/C_evaluation/evaluation1.php");
					});
					$("#rattachement").click(function(){
						$("#contenue").load("RDC/stock/D_rattachement/rattachement1.php");
					});
					$("#juridique").click(function(){
						$("#contenue").load("RDC/stock/E_juridique/juridique1.php");
					});		
					$("#information").click(function(){
						$("#contenue").load("RDC/stock/F_information/information1.php");
					});						
					$('#bt_retour').click(function(){
						$("#contenue").load("RDC/index.php");
					});				
					$('#bt_feuille_maitresse').click(function(){
						$("#contenue").load("RDC/stock/feuille_maitresse.php");
					});			
	
			});
		
		</script>
	</head>

	<body>
		<center>
		<table width="70%" height="50" style="text-align:left;">
			<tr>
				<td class=""><div style="box-shadow: 10px 10px 5px #888888; width:100%;background-color:#FFFFFF;color:#000000;font-family: font_TE;">STOCK</div></td>
			</tr>
		</table>
		<table height="100" width="70%" style="background-color:#FFFFFF">
			<tr class="label_Evaluation1" >
				<td class="td_Image"width="50%" id="coherence">
					
					<img  src="img/alphabet/A.png"></img>
					<label>COHERENCES ET PRINCIPES COMPTABLES.</label>
				</td>
				<td class="td_Image"width="50%" id="existence">
					
					<img  src="img/alphabet/E.png"></img>
					<label>EXISTENCE DES SOLDES</label>
				</td>
			</tr>
			<tr class="label_Evaluation1" >
				<td class="td_Image"width="50%" id="evaluation">
					
					<img  src="img/alphabet/F.png"></img>
					<label>EVALUATION DES SOLDES</label>
				</td>
				<td class="td_Image"width="50%" id="rattachement">
					
					<img  src="img/alphabet/g.png"></img>
					<label>RATTACHEMENT DES OPERATIONS</label>
				<td>
			</tr>
			<tr class="label_Evaluation1" >
				<td class="td_Image"width="50%" id="juridique">
					
					<img  src="img/alphabet/h.png"></img>
					<label>JURIDIQUE FISCAL ET DIVERS</label>
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
					<input type="button" id="bt_planif" onClick="planification('stock');" value="Planification" class="bouton" height="40px"/>
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