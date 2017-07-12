<?php
	session_start();
	include '../../../connexion.php';
	//Pour Total salaire brut IRSA
	$sql1 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'salaires bruts' AND MISSION_ID='".$_SESSION['idMission']."'";
	$rep1 = $bdd->query($sql1);
	$don1 = $rep1->fetch();
	//Pour Total salaire brut CNaPS
	$sql2 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'cnaps_salaire_non_plafonees' AND MISSION_ID='".$_SESSION['idMission']."'";
	$rep2 = $bdd->query($sql2);
	$don2 = $rep2->fetch();
	//Pour le commentaire
	$sql3 = "SELECT * FROM tab_rap_irsa_cnaps WHERE MISSION_ID='".$_SESSION['idMission']."'";
	$rep3 = $bdd->query($sql3);
	$don3 = $rep3->fetch();
?>
<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			#ecart{font-weight: bold;font-size: 8pt;text-align: right;}
			#commentaire{width: 400px;height: 100px}
		</style>
		<script>
			$(document).ready(function(){//Calcul de l'ecart
				var cnaps = parseFloat($("#cnaps").text());
				var irsa = parseFloat($("#irsa").text());
				var ecart = irsa - cnaps;

				$("#ecart").text(ecart.toFixed(2));

			});
		
		</script>
	</head>
	<body>

		<center>
			<p class="titreRenvoie">Rapprochement salaires bruts IRSA/CNaPS</p>
		</center>
		<div class="cadre">
			<br />
			<table class="h8">
					<tr>
						<td width="200px">Salaires bruts <strong>IRSA</strong></td>
						<td width="200px" style="text-align:right;" id="irsa"><?php echo number_format($don1['TOTAL'],2,'.',''); ?></td>
					</tr>
					<tr>
						<td>Salaires bruts <strong>CNaPS</strong></td>
						<td style="text-align:right;" id="cnaps" ><?php echo number_format($don2['TOTAL'],2,'.',''); ?></td>
					</tr>
					<tr>
						<td>Ecart</td>
						<td id="ecart" id="ecart">0.00</td>
					</tr>
			</table>
			<center>
				<br /><strong>Commentaire :</strong><br />
				<textarea id="commentaire"><?php echo $don3['CMT']; ?></textarea>
			</center>
		</div>
		
		
	<div id="fermer" style="display:none;"><center>
        <p> Voulez vous vraiment fermer l'application ?</p>
        <p>
         <input type="button" value="Valider" id="okferme"/>
         
        </p>
       </center>
       
      </div>
      </body>