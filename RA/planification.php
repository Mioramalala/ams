<?php
	@session_start();
	$_SESSION['fonction'] = 'Planification';
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
						<a href = "">A. Fonds propres</a>
					</td>
					<td class="tr_table">
						<a href = "">B. Immobilisations corporelles et incorporelles</a>
					</td>
					<td class="tr_table">
						<a href = "">C. Immobilisation Financieres</a>
					</td>	
				</tr>
				<tr>
					<td class="tr_table">
						<a href = "">D. Stocks</a>
					</td>
					<td class="tr_table">
						<a href = "">E .Tresorerie</a>
					</td>
					<td class="tr_table">
						<a href = "">F. Charges fournisseurs</a>
					</td>
				</tr>
				<tr>
					<td class="tr_table">
						<a href = "">G. Ventes-Clients</a>
					</td>
					<td class="tr_table">
						<a href = "">H. Paie-Personnel</a>
					</td>
					<td class="tr_table">
						<a href = "">I. Impôts et taxes</a>
					</td>
				</tr>
				<tr>
					<td class="tr_table">
						<a href = "">J. Emprunts et dettes financières</a>
					</td>
					<td class="tr_table">
						<a href = "">K. Débiteurs et créditeurs divers</a>
					</td>
					<td class="tr_table">
						<a href = "">Planification générale</a>
					</td>
					
				</tr>
								
			</table>
		</div>	
	</body>
	
</html>