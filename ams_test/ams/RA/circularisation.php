<?php
	@session_start();
	$_SESSION['fonction']='Synthèse';
	$mission_id=@$_SESSION['idMission'];
	
?>
<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="jquery.js"></script>
	</head>
	
	<body>
		<div  id="dv_donnees_financiers_RA">
		<table width="70%" height="50" style="text-align:left;">
			<tr>
				<td class=""><div style="box-shadow: 10px 10px 5px #888888; width:100%;background-color:#FFFFFF;color:#000000;font-family: font_TE;">Impôts et Taxes</div></td>
			</tr>
		</table>
		<br/>
			<table >
				<tr >
					<td class="tr_table">
						<a href = "">Avocat</a>
					</td>
					<td class="tr_table">
						<a href = "">Banques</a>
					</td>
					<td class="tr_table">
						<a href = "">Fournisseurs</a>
					</td>	
				</tr>
				<tr>
					<td class="tr_table">
						<a href = "">Clients</a>
					</td>
					<td class="tr_table">
						<a href = "">Débiteurs et créditeurs divers</a>
					</td>
				</tr>
								
			</table>
		</div>	
	</body>
	
</html>