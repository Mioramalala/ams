<?php
	@session_start();
	$_SESSION['fonction']='Synthèse';
?>
<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="jquery.js"></script>
	</head>
	
	<body>
		<div  id="dv_donnees_financiers_RA">
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