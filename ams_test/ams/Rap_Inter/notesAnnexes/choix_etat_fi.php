<?php
session_start();
	include_once "../../connexion.php";
	$sql = "SELECT `ENTREPRISE_ID`,MISSION_DATE_DEBUT as N1,	MISSION_DATE_CLOTURE as N,MISSION_ANNEE as A
			FROM `tab_mission`
			WHERE `MISSION_ID` =".$_SESSION['idMission'] ;
	$req = $bdd->query($sql) or die($sql);

	$data = $req->fetch();
	$_SESSION['ENTREPRISE_ID'] = $data['ENTREPRISE_ID'];
	$_SESSION['N'] = $data['N'];
	$_SESSION['N1'] = $data['N1'];
	$_SESSION['A'] = $data['A'];
	$_SESSION['A1'] = $data['A']-1;

	//ENTREPRISE
	$req = $bdd->query("SELECT ENTREPRISE_DENOMINATION_SOCIAL
FROM `tab_entreprise` WHERE `ENTREPRISE_ID` =".$_SESSION['ENTREPRISE_ID']) or die($sql);

	$data = $req->fetch();
	$_SESSION['ENTREPRISE'] = $data['ENTREPRISE_DENOMINATION_SOCIAL'];
?>
	<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/RDC.css">
		<script type="text/javascript" src="../../js/jquery-1.7.2.js"></script>
	<link   rel="stylesheet"       href="/css/bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="../RDC/js/function.js"></script>
		<script>
			$(function(){
					
					$('#bt_retour').click(function(){
						$("#contenue_RA").load("Rap_Inter/rapport_definitif.php");
					});
					
					$("#A").click(function(){
						//alert('mander ver???');
						$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_cycle.php");
					
					});
					
					$("#B").click(function(){
						// alert("B io zao");
						$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_bilan.php");
					});
					
					$("#C").click(function(){
							$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_charge.php");
					});
					$("#D").click(function(){
							$("#contenue_RA").load("Rap_Inter/notesAnnexes/choix_produit.php");
					});
					
					});
		
		
		</script>
	</head>

	<body>
	
		<div id="GranTitre">Notes annexes</div>
		<table height="100" width="70%" style="background-color:#FFFFFF">
			<tr class="label_Evaluation"  height="110">
				<td class="td_Image"width="50%" id="A">
					<img  src="img/alphabet/A.png"></img>
					<label>BILAN ACTIF</label>
				</td>
				<td class="td_Image"width="50%" id="B">
					<img  src="img/alphabet/B.png"></img>
					<label>BILAN PASSIF</label>
				</td>
			</tr>
			<tr class="label_Evaluation"  height="110">
				<td class="td_Image"width="50%" id="C">
					<img  src="img/alphabet/C.png"></img>
					<label>CHARGES</label>
				</td>
				<td class="td_Image"width="50%" id="D">
					<img  src="img/alphabet/D.png"></img>
					<label>PRODUITS</label>
				</td>
			</tr>
		</table>
		<table>
			<tr height="40px">
				<td align="center" width="21.5%"><button id="bt_retour" class="bouton"  height="40px">Retour</button></td>
			</tr>
		</table>
	</body>
</html>