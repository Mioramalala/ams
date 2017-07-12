<?php
	@session_start();
	$_SESSION['fonction']='Par cycle';
	$mission_id=@$_GET['mission_id'];
?>

<html>
	<head>
		<!--link rel = "stylesheet" href = "../RA/css_RA.css"/-->
		<link rel="stylesheet" href="../RA/css_RA.css">
		<script type="text/javascript" src="/RA/jquery.js"></script>
		<script type="text/javascript">
			$(function(){

				$('#id_btvalider_fond').click(function(){
					$('#contenue').load('RA/fond/fondpropre.php?mission_id='+'<?php echo $mission_id; ?>');			
				});
				$('#id_btvalider_immo').click(function(){
					$('#contenue').load('RA/immo/immo.php?mission_id='+'<?php echo $mission_id; ?>');			
				});	
				$('#id_btvalider_immofi').click(function(){
					$('#contenue').load('RA/immofi/immofi.php?mission_id='+'<?php echo $mission_id; ?>');			
				});
				$('#id_btvalider_stock').click(function(){
					$('#contenue').load('RA/stock/stock.php?mission_id='+'<?php echo $mission_id; ?>');			
				});
				$('#id_btvalider_tresorerie').click(function(){
					$('#contenue').load('RA/tresorerie/tresorerie.php?mission_id='+'<?php echo $mission_id; ?>');			
				});
				$('#id_btvalider_charge').click(function(){
					$('#contenue').load('RA/charge/charge.php?mission_id='+'<?php echo $mission_id; ?>');			
				});
				$('#id_btvalider_vente').click(function(){
					$('#contenue').load('RA/vente/vente.php?mission_id='+'<?php echo $mission_id; ?>');			
				});
				$('#id_btvalider_paie').click(function(){
					$('#contenue').load('RA/paie/paie.php?mission_id='+'<?php echo $mission_id; ?>');			
				});
				$('#id_btvalider_impot').click(function(){
					$('#contenue').load('RA/impot/impot.php?mission_id='+'<?php echo $mission_id; ?>');			
				});
				$('#id_btvalider_emprunt').click(function(){
					$('#contenue').load('RA/emprunt/emprunt.php?mission_id='+'<?php echo $mission_id; ?>');			
				});
				$('#id_btvalider_dcdivers').click(function(){
					$('#contenue').load('RA/dcdivers/dcdivers.php?mission_id='+'<?php echo $mission_id; ?>');			
				});




				
				$('#bt_retour').click(function(){
					$("#contenue").load("RA/index.php");
				});
			});
			
			
		
			
		</script>
	</head>
	
	<body>
		
		<table width="79.5%" height="50"  style="text-align:left;background-color:#FFFFFF;margin-bottom:10px">
			<tr>
				<td style="color:#0099FF">
					<div style="box-shadow: 10px 10px 5px #888888; width:100%;background-color:#FFFFFF;">
						<table>
							<tr>
								<td width="20%" style="left:15%;top:2px;margin-left:15%"><img src="../img/iconswidgets/revues-par-cycle.png" height="48" width="48"/></td>
								<td width="50%" style="color:#89CCF8;font-size:1.5em;font-family:font_TE;font-weight:bold;">Revue par Cycle</td>
							</tr>
						
						</table>
					
					</div>
					
					</td>
			</tr>
	</table>
		
			<table width="79.5%" style="background-color:#FFFFFF">
				<tr class="label_Evaluation1" >
					<td class="td_Image" width="50%" onClick="javascript:click_sousMenueREvue('/RA/fond/fondpropre.php',$('#missId').val())"><input type="text" id="missId" value="<?php echo $mission_id;?>" style="display:none;" />
					<div style="float:left"><img height="50px" src="img/alphabet/A.png"></img></div>
					<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>FOND PROPRE.</label></div>
						
					</td>
					<td class="td_Image" width="50%" align="center" onClick="javascript:click_sousMenueREvue('/RA/immo/immo.php',$('#missId').val())">
							<div style="float:left"><img height="50px" src="img/alphabet/B.png"></img></div>
							<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>IMMOBILISATIONS CORPORELLES ET INCORPORELLES.</label></div>
					</td>
				</tr>
				<tr class="label_Evaluation1" >
					<td class="td_Image" width="50%" onClick="javascript:click_sousMenueREvue('/RA/immofi/immofi.php',$('#missId').val())">
						<div style="float:left"><img height="50px" src="img/alphabet/C.png"></img></div>
						<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>IMMOBILISATIONS FINANCIERES.</label></div>
					</td>
				
					<td class="td_Image" width="50%" onClick="javascript:click_sousMenueREvue('/RA/stock/stock.php',$('#missId').val())">
							<div style="float:left"><img height="50px" src="img/alphabet/D.png"></img></div>
							<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>STOCKS.</label></div>
					</td>
				</tr>
				<tr class="label_Evaluation1" >
					<td class="td_Image" width="50%" onClick="javascript:click_sousMenueREvue('/RA/tresorerie/tresorerie.php',$('#missId').val())">
						<div style="float:left"><img height="50px" src="img/alphabet/E.png"></img></div>
						<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>TRESORERIE.</label></div>
					</td>
					<td class="td_Image" width="50%" onClick="javascript:click_sousMenueREvue('/RA/charge/charge.php',$('#missId').val())">
						<div style="float:left"> <img height="70px" src="img/alphabet/F.png"></img></div>
						<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>CHARGES-FOURNISSEURS.</label></div>
					</td>
				</tr>
				<tr class="label_Evaluation1" >
					<td class="td_Image" width="50%" onClick="javascript:click_sousMenueREvue('/RA/vente/vente.php',$('#missId').val())">
							<div style="float:left"><img height="50px" src="img/alphabet/g.png"></img></div>
							<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>VENTES-CLIENTS.</label></div>
					</td>
					<td class="td_Image" width="50%" onClick="javascript:click_sousMenueREvue('/RA/paie/paie.php',$('#missId').val())">
						<div style="float:left"><img height="70px" src="img/alphabet/h.png"></img></div>
						<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>PAIE-PERSONNEL.</label></div>
					</td>
				</tr>
				<tr class="label_Evaluation1" >
					<td class="td_Image" width="50%" onClick="javascript:click_sousMenueREvue('/RA/impot/impot.php',$('#missId').val())">
						<div style="float:left"><img height="50px" src="img/alphabet/i.png"></img></div>
						<div style="float:left;padding-top:22px;text-align:center; padding-left:3%"><label>IMPOTS ET TAXES</label></div>
					</td>
		
					<td class="td_Image" width="50%" onClick="javascript:click_sousMenueREvue('/RA/emprunt/emprunt.php',$('#missId').val())">
						<div style="float:left"><img height="50px" src="img/alphabet/j.png"></img></div>
						<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>EMPRUNTS ET DETTES FINANCIERES.</label></div>
					</td>
				</tr>
				<tr class="label_Evaluation1" >
					<td class="td_Image" width="50%" onClick="javascript:click_sousMenueREvue('/RA/dcdivers/dcdivers.php',$('#missId').val())">
						<div style="float:left"><img height="50px" src="img/alphabet/K.png"></img></div>
						<div style="float:left;padding-top:22px;text-align:center;padding-left:3%"><label>DEBITEURS ET CREDITEURS DIVERS.</label></div>
					</td>
					<td align="center">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="bt_retour" value="Retour" class="bouton" style="border-radius:10px;height:50px;color:#FFFFFF;font-size:16px" />
					</td> 
				</tr>
								
			</table>
		</div>	
	</body>
	
</html>