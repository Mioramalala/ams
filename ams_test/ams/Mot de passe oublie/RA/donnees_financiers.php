<?php
	session_start();
	$_SESSION['fonction']='Données';
	$mission_id=@$_GET['mission_id'];
?>

<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">
		
			$(function(){
				$('#dv_retour1').click(function(){
					$('#contenue').load('RA/index.php?mission_id='+<?php echo $mission_id;?>);			
				});
			});
		
		</script>
	</head>
	<body>
		<div  id="dv_donnees_financiers_RA">
		<br/>
			<table >
				<tr >
					<td class="tr_table"><input type="text" id="tx_miss_id" value="<?php echo $mission_id;?>" style="display:none;"  /> 
						<a href = "javascript:click_sousMenueREvue('/RA/pcg.php',<?php echo $mission_id;?>)">Structure Plan Comptable</a>
					</td>
				</tr>
				<tr>
					<td class="tr_table">
						<a href = "javascript:click_sousMenueREvue('/RA/etats_financiers.php',$('#tx_miss_id').val())">Etats Financiers</a>
					</td>
				</tr>
			</table>
			<input type ="button" name= "btRetour" value= "Retour" id = "dv_retour1">
		</div>	
	</body>
</html>
