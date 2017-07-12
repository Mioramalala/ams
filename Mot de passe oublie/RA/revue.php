<?php
	@session_start();
	$_SESSION['fonction']='Par cycle';
	$mission_id=@$_GET['mission_id'];
?>

<html>
	<head>
		<!--link rel = "stylesheet" href = "../RA/css_RA.css"/-->
		<link rel="stylesheet" href="../RA/css_RA.css">
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">
			$(function(){
				$('#id_btvalider_fond').click(function(){
				$('#contenue').load('RA/fond/fondpropre.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			});	
			$(function(){
				$('#id_btvalider_immo').click(function(){
				$('#contenue').load('RA/immo/immo.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			});	
			$(function(){	
				$('#id_btvalider_immofi').click(function(){
				$('#contenue').load('RA/immofi/immofi.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			});	
			$(function(){
				$('#id_btvalider_stock').click(function(){
				$('#contenue').load('RA/stock/stock.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			});
			$(function(){
				$('#id_btvalider_tresorerie').click(function(){
				$('#contenue').load('RA/tresorerie/tresorerie.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			});
			$(function(){
				$('#id_btvalider_charge').click(function(){
				$('#contenue').load('RA/charge/charge.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			});
			
			$(function(){
				$('#id_btvalider_vente').click(function(){
				$('#contenue').load('RA/vente/vente.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			});
			
			$(function(){
				$('#id_btvalider_paie').click(function(){
				$('#contenue').load('RA/paie/paie.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			});
			
			$(function(){
				$('#id_btvalider_impot').click(function(){
				$('#contenue').load('RA/impot/impot.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			});
			$(function(){
				$('#id_btvalider_emprunt').click(function(){
				$('#contenue').load('RA/emprunt/emprunt.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			});
			$(function(){
				$('#id_btvalider_dcdivers').click(function(){
				$('#contenue').load('RA/dcdivers/dcdivers.php?mission_id='+<?php echo $mission_id; ?>);			
				});
			});
			
			
		
			
		</script>
	</head>
	
	<body>
		<div  id="dv_donnees_financiers_RA">
		<br/>
			<table>
				<tr>
					<td class="menu_RA"><input type="text" id="missId" value="<?php echo $mission_id;?>" style="display:none;" />
						<a href = "javascript:click_sousMenueREvue('/RA/fond/fondpropre.php',$('#missId').val())" style="color:black">A. FONDS PROPRES</a>
						<!--input type= "button" id="id_btvalider_fond" value = "Valider"/-->
					</td>
					<td class="menu_RA">
						<a href = "javascript:click_sousMenueREvue('/RA/immo/immo.php',$('#missId').val())" style="color:black">B. IMMOBILISATIONS CORPORELLES ET INCORPORELLES </a>
						<!--input type= "button" id="id_btvalider_immo"value = "Valider"/-->
					</td>
				</tr>
				<tr>
					<td class="menu_RA">
						<a href = "javascript:click_sousMenueREvue('/RA/immofi/immofi.php',$('#missId').val())" style="color:black">C. IMMOBILISATIONS FINANCIERES</a>
						<!--input type= "button" id="id_btvalider_immofi" value = "Valider"/-->
					</td>
				
					<td class="menu_RA">
						<a href = "javascript:click_sousMenueREvue('/RA/stock/stock.php',$('#missId').val())" style="color:black">D. STOCKS</a>
						<!--input type= "button" id="id_btvalider_stock" value = "Valider"/-->
					</td>
				</tr>
					<td class="menu_RA">
						<a href = "javascript:click_sousMenueREvue('/RA/tresorerie/tresorerie.php',$('#missId').val())" style="color:black">E .TRESORERIES</a>
						<!--input type= "button" id="id_btvalider_tresorerie" value = "Valider"/-->
					</td>
					<td class="menu_RA">
						  <a href = "javascript:click_sousMenueREvue('/RA/charge/charge.php',$('#missId').val())" style="color:black">F. CHARGES FOURNISSEURS</a>
						  <!--input type= "button" id="id_btvalider_charge" value = "Valider"/-->
					</td>
				</tr>
				<tr>
					<td class="menu_RA">
						<a href = "javascript:click_sousMenueREvue('/RA/vente/vente.php',$('#missId').val())" style="color:black">G. VENTES-CLIENTS</a>
						  <!--input type= "button" id="id_btvalider_vente" value = "Valider"/-->
					</td>
					<td class="menu_RA">
						<a href = "javascript:click_sousMenueREvue('/RA/paie/paie.php',$('#missId').val())" style="color:black">H. PAIE-PERSONNEL</a>
						<!--input type= "button" id="id_btvalider_paie" value = "Valider"/-->
					</td>
				</tr>
				<tr>
					<td class="menu_RA">
						<a href = "javascript:click_sousMenueREvue('/RA/impot/impot.php',$('#missId').val())" style="color:black">I. IMPOTS ET TAXES</a>
						<!--input type= "button" id="id_btvalider_impot" value = "Valider"/-->
					</td>
		
					<td class="menu_RA">
						<a href = "javascript:click_sousMenueREvue('/RA/emprunt/emprunt.php',$('#missId').val())" style="color:black">J. EMPRUNTS ET DETTES FINANCIERES</a>
						<!--input type= "button" id="id_btvalider_emprunt" value = "Valider"/-->
					</td>
				</tr>
				<tr>
					<td class="menu_RA">
						<a href = "javascript:click_sousMenueREvue('/RA/dcdivers/dcdivers.php',$('#missId').val())" style="color:black">K. DEBITEURS ET CREDITEURS DIVERS</a>
						<!--input type= "button" id="id_btvalider_dcdivers" value = "Valider"/-->
					</td>
				</tr>
								
			</table>
		</div>	
	</body>
	
</html>