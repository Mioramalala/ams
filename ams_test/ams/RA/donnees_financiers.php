<?php
	session_start();
	$_SESSION['fonction'] = 'Données';
	$mission_id           = @$_SESSION['idMission'];
	
?>

<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		
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
					<td class="td_Image" width="50%"><input type="text" id="tx_miss_id" value="<?php echo $mission_id;?>" style="display:none;"  /> 
						<a style="float:left;padding-top:22px;text-align:center;padding-left:3%" href = "javascript:click_sousMenueREvue('/RA/pcg.php','<?php echo $mission_id;?>')">Structure Plan Comptable</a>
					</td>
				</tr>
				<tr>
					<td  class="td_Image" width="50%">
						<a style="float:left;padding-top:22px;text-align:center;padding-left:3%" href = "javascript:click_sousMenueREvue('/RA/etats_financiers.php',$('#tx_miss_id').val())">Etats Financiers</a>
					</td>
				</tr>
			</table>
			<input type ="button" class="bouton-flat" name= "btRetour" value= "Retour" id = "dv_retour1">
		</div>	
	</body>
</html>
