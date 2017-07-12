<?php
	@session_start();
	$mission_id=@$_SESSION['idMission'];	
?>
<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="../../../js/jquery-1.7.2.js"></script>
		<style type="text/css">
			textarea{
				width: 100%;
				height: 100%;
				font-size: 8pt;
			}
		</style>
	</head>
	<body>
		<center><p class="titreRenvoie">REVUE ANALYTIQUE ET VERIFICATION DE LA VARIATION DES EMPRUNTS ET DETTES FINANCIERS</p></center>
		<div class="cadre">
			<table class="j1">
				<tr class="sous-titre">
					<td width="100px">Compte</td>
					<td width="200px">Libellé</td>
					<td width="100px">Débit</td>
					<td width="100px">Crédit</td>
					<td width="100px">Solde N</td>
					<td width="100px">Solde N-1</td>
					<td width="100px">Variation</td>
					<td width="100px">% de variation</td>
					<td width="200px">Commentaires</td>
				</tr>

			<?php
				include '../../../connexion.php';
		
				$reponse=$bdd->query("select RA_COMPTE, RA_LIBELLE, RA_D, RA_C, RA_SOLDE_N,RA_SOLDE_N1, RA_VARIATION,RA_POURCENTAGE, RA_COMMENTAIRE from tab_ra where MISSION_ID=".$mission_id."
				AND RA_COMPTE LIKE '16%' OR RA_COMPTE LIKE '660%' OR RA_COMPTE LIKE '661%' ");

				(int)$ligne=1;

				while($donnees=$reponse->fetch()){
			?>
				<tr>
						<td width="3%"><?php echo number_format((double)$donnees['RA_COMPTE'],2,","," ");?></td>
						<td width="7%"><?php echo $donnees['RA_LIBELLE']?></td>
						<td width="7%"><?php echo number_format((double)$donnees['RA_D'],2,","," ");?></td>
						<td width="7%"><?php echo number_format((double)$donnees['RA_C'],2,","," ");?></td>
						<td width="7%"><?php echo number_format((double)$donnees['RA_SOLDE_N'],2,","," ");?></td>
						<td width="7%"><?php echo number_format((double)$donnees['RA_SOLDE_N1'],2,","," ");?></td>
						
						<td width="7%"><?php echo number_format((double)$donnees['RA_VARIATION'],2,","," ");?></td>
						
						<td width="7%"><?php echo number_format((double)$donnees['RA_POURCENTAGE'],2,","," ");?>%</td>
						<td width="7%"><?php echo $donnees['RA_COMMENTAIRE'];?></td>
					</tr>
				<?php
					}
				?>
			
			</table>
			<br />
			<table class="j1">
				<tr class="sous-titre">
					<td>PRE-SYNTHESE</td>
				</tr>
				<tr>
					<td><textarea></textarea></td>
				</tr>
			</table>
			<table class="j1">
				<tr class="sous-titre">
					<td>SYNTHESE FINALE</td>
				</tr>
				<tr>
					<td><textarea></textarea></td>
				</tr>
			</table>
		</div>
		
	</body>