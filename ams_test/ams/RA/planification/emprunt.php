<?php
    include '/../../../connexion.php';
 @session_start();
 $mission_id=@$_SESSION['idMission'];
?>
<html>
	<head>
		<link rel = "stylesheet" href = "../RA/planification/fond/css_planif.css"/>
	</head>
	<body>
		<table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
				<tr>
					<td style="color:white"><center>EMPRUNTS ET DETTES FINANCIERES</center></td>
				</tr>
		</table>
		<div id="dv_fond_planif1">
			<table class="fond1">
				<tr>
					<td class="td_fond"><p class="titre" style="color:blue;">INCIDENCES</p>
						<p id="ligne"></p>
						<p class="td_fond2">FONCTIONS:</p>
				</tr>
				<tr>
					<td ><p class="td_fond2">COMPTES:</p></td>
				</tr>
			</table>
		</div>
		<div id="dv_fond_planif2">
			<table class="fond2">
				<tr>
					<td class="td_fond"><p class="titre" style="color:blue;">PLANIFICATION DES EMPRUNTS ET DETTES FINANCIERES</p></td>
				</tr>
				<tr>
					<td>
						<textarea rows="15px" cols="40px"></textarea>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>