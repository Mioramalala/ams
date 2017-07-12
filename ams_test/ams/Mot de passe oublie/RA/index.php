<?php
@session_start();
$_SESSION['processus']='Revue Analytique';
$mission_id=@$_GET['mission_id'];

?>

<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript"></script>
	</head>
	
	<body>
		<div  id="dv_donnees_financiers_RA">
		
		<br/>
			<table >
				<tr >
					<td class="tr_table"><input type="text" id="missId" value="<?php echo $mission_id;?>" style="display:none;" />
						<a href = "javascript:click_sousMenueREvue('/RA/structure.php',$('#missId').val())">Synthèse RSCI</a>
					</td>
				</tr>
				<tr>
					<td class="tr_table"><input type="text" id="missId" value="<?php echo $mission_id;?>" style="display:none;" />
					<a href = "javascript:click_sousMenueREvue('/RA/donnees_financiers.php',$('#missId').val())">Données Financières</a>	
					</td>	
				</tr>
				<tr>
					<td class="tr_table">
						<a href = "javascript:click_sousMenueREvue('/RA/revue.php',$('#missId').val())">Revue par cycle</a>
					</td>
				</tr>
				<tr>
					<td class="tr_table">
					<a href = "javascript:click_sousMenueREvue('/RA/planification.php',$('#missId').val())">Planification</a>
					</td>
				</tr>
				<tr>
					<td>
						<div class="tr_table">
							<a href = "javascript:click_sousMenueREvue('/RA/circularisation.php',$('#missId').val())">Circularisation</a>
						</div>
					</td>
				</tr>
			</table>
		</div>	
	</body>
</html>