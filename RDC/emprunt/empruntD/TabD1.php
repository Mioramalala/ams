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
		<center>
			<p class="titreRenvoie">REEVALUATION DES EMPRUNTS LIBELLES EN DEVISES</p>
		</center>
		<div style="overflow:auto">
			<table class="j1">
				<tr class="sous-titre">
					<td width="100px">Compte</td>
					<td width="200px">Solde en devise</td>
					<td width="100px">devise</td>
					<td width="100px">Taux de cloture</td>
					<td width="100px">Solde réévalué</td>
					<td width="100px">Solde comptable</td>
					<td width="100px">Différence</td>
					<td width="200px">Observations</td>
				</tr>
				<?php
					include '../../../connexion.php';
			
					$reponse=$bdd->query("select IMPORT_COMPTES from tab_importer WHERE MISSION_ID=".$mission_id."
					AND IMPORT_COMPTES LIKE '16%' GROUP BY IMPORT_COMPTES");
			
					$ligne=0;
					while($donnees=$reponse->fetch()){
						$cpt = $donnees['IMPORT_COMPTES'];
				?>
				<tr class="sous-titre">
					<td width="100px"><?php echo $donnees['IMPORT_COMPTES'];?></td>
					<?php
						$rep=$bdd->query('SELECT * FROM tab_reeval_emprunt WHERE COMPTE='.$cpt);
						$data=$rep->fetch();
					?>
					<td width="200px"><input type="text" id="<?php echo "soldeDev_".$ligne ?>" value="<?php echo $data['SOLDE_DEV'] ?>"/></td>					
					<td width="200px"><input type="text" id="<?php echo "devise_".$ligne ?>" value="<?php echo $data['DEVISE'] ?>"/></td>
					<td width="100px"><input type="text" id="<?php echo "cloture_".$ligne ?>" value="<?php echo $data['CLOTURE'] ?>"/></td>
					<td width="100px"><?php echo ($data['DEVISE']*$data['CLOTURE']) ?></td>
					<td width="100px"><input type="text" id="<?php echo "soldeComp_".$ligne ?>" value="<?php echo $data['SOLDE_COMP'] ?>"/></td>
					<td width="100px"><?php echo (($data['DEVISE']*$data['CLOTURE'])-$data['SOLDE_COMP']) ?></td>
					<td width="100px"><input type="text" id="<?php echo "observation_".$ligne ?>" value="<?php echo $data['OBSERVATION'] ?>"/></td>
					<input type="hidden" id="<?php echo "compte_".$ligne ?>" value="<?php echo $donnees['IMPORT_COMPTES'];?>"/>
				</tr>
				<?php
					$ligne = $ligne+1;
					}
				?>
			</table>
		</div>

			<input type="hidden" id="nbLignes" value="<?php echo $ligne; ?>"/>
	</body>