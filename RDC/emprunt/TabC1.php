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
		<script>
			function calcul(ligne){
				devise = $("#soldeDev_"+ligne).val();
				devise = Number(devise);
				cloture = $("#cloture_"+ligne).val();
				cloture = Number(cloture);

				if(devise!='' && cloture!=''){
					if(isNaN(cloture)){
						alert("Veuillez entrer un nombre.");
					}
					else{
						var solde = parseInt(devise)*parseInt(cloture);
						$("#soldeReeval_"+ligne).val(solde);
						var soldeComp = $("#soldeComp_"+ligne).val();
						if(isNaN(soldeComp)){
							alert("Veuillez entrer un nombre.");								
						}
						else{
							if(soldeComp==''){soldeComp=0;}
							var diff = parseInt(solde)-parseInt(soldeComp);
							$("#difference_"+ligne).val(diff);
						}
					}
				}

			}
		</script>
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
			
					$reponse=$bdd->query("SELECT * FROM tab_importer WHERE MISSION_ID=".$mission_id."
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
					<td width="200px"><input type="text" id="<?php echo "soldeDev_".$ligne ?>" value="<?php echo $data['SOLDE_DEV'] ?>" onkeyup="calcul(<?php echo $ligne;?>)"/></td>					
					<td width="200px"><input type="text" id="<?php echo "devise_".$ligne ?>" value="<?php echo $data['DEVISE'] ?>" onkeyup="calcul(<?php echo $ligne;?>);"/></td>
					<td width="100px"><input type="text" id="<?php echo "cloture_".$ligne ?>" value="<?php echo $data['CLOTURE'] ?>" onkeyup="calcul(<?php echo $ligne;?>);"/></td>
					<td width="100px"><input type="text" id="<?php echo "soldeReeval_".$ligne ?>" value="<?php echo $data['SOLDE_DEV']*$data['CLOTURE']; ?>"/></td>
					<td width="100px"><input type="text" id="<?php echo "soldeComp_".$ligne ?>" value="<?php echo $donnees['IMPORT_SOLDE']; ?>"/></td>
					<td width="100px"><input type="text" id="<?php echo "difference_".$ligne ?>" value="<?php echo (($data['DEVISE']*$data['CLOTURE'])-$data['SOLDE_COMP']) ?>"/></td>
					<td width="100px"><textarea rows="4" cols="20"  id="<?php echo "observation_".$ligne ?>"><?php echo $data['OBSERVATION'] ?></textarea></td>
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


	<script type="text/javascript">

	var nbLigne=$('#nbLigne's).val();


	      for(var i=0; i<nbLigne; i++ ){

	      }



	</script>