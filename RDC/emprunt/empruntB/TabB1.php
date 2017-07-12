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
				/*width: 100%;
				height: 100%;
				font-size: 8pt;*/
			}
		</style>
<script>
		function calcul(ligne){
				var emprunt = document.getElementById('emprunt_'+ligne).value;
				var emprunt1=emprunt.replace(".","");
				var emprunt2 = emprunt1.replace(",",".");
				emprunt2 = Number(emprunt2); 				

				if(emprunt2===''){
					$('#ecart_'+ligne).val('');
				}
				else if(isNaN(emprunt2)){
					alert("Veuillez entrer un nombre.");
					$('#ecart_'+ligne).val('');
				}
				else if(emprunt2!=''){
					var solde = document.getElementById('solde_'+ligne).value;
					var ecart = Number(solde) - Number(emprunt2);
					$('#ecart_'+ligne).val(ecart);
				}
		}

</script>
	</head>
	<body>
		<center>
			<p class="titreRenvoie">Rapprochement du solde comptable avec le tableau d'amortissement des emprunts</p>
		</center>
		<div style="overflow:auto">
			<table class="j1">
				<tr class="sous-titre">
					<td width="100px">Compte</td>
					<td width="200px">Libellé</td>
					<td width="100px">Débit</td>
					<td width="100px">Crédit</td>
					<td width="100px">Solde N</td>
					<td width="100px">Tab. Emprunts</td>
					<td width="100px">Ecart</td>
					<td width="200px">Commentaires</td>
				</tr>
				<?php
					include '../../../connexion.php';
			
					$reponse=$bdd->query("select * from tab_importer WHERE MISSION_ID=".$mission_id."
					AND (IMPORT_COMPTES LIKE '160%' OR IMPORT_COMPTES LIKE '161%' OR IMPORT_COMPTES LIKE '162%' 
					OR IMPORT_COMPTES LIKE '163%' OR IMPORT_COMPTES LIKE '164%' OR IMPORT_COMPTES LIKE '165%' OR IMPORT_COMPTES LIKE '166%' 
					OR IMPORT_COMPTES LIKE '167%' OR IMPORT_COMPTES LIKE '168%' OR IMPORT_COMPTES LIKE '169%') GROUP BY IMPORT_COMPTES");
			
					$ligne=0;
					while($donnees=$reponse->fetch()){
					$cpt = $donnees['IMPORT_COMPTES'];
				?>
				<tr class="sous-titre" bgcolor="white">
					<td width="100px"><?php echo number_format((double)$donnees['IMPORT_COMPTES'],2,","," ");?></td>
					<td width="200px"><?php echo $donnees['IMPORT_INTITULES'];?></td>
					<td width="100px"><?php echo number_format((double)$donnees['IMPORT_DEBIT'],2,","," ");?></td>
					<td width="100px"><?php echo number_format((double)$donnees['IMPORT_CREDIT'],2,","," ");?></td>
					<td width="100px"><?php echo number_format((double)$donnees['IMPORT_SOLDE'],2,","," ");?></td>
					<?php
						$rep=$bdd->query('SELECT * FROM tab_j2 WHERE COMPTE='.$cpt);
						$data=$rep->fetch();
					?>
					<td width="100px"><input type="text" id="<?php echo "emprunt_".$ligne ?>" value="<?php echo $data['EMPRUNT']; ?>" onkeyup="calcul(<?php echo $ligne; ?>);"/></td>
					<td width="100px"><input type="text"  id="<?php echo "ecart_".$ligne ?>"  value="<?php echo $data['ECART']; ?>"</td>
					<td width="200px"><textarea rows="4" cols="20" id="<?php echo "commentaire_".$ligne ?>"><?php echo $data['COMMENTAIRE']; ?></textarea></td>
					<input type="hidden" id="<?php echo "compte_".$ligne ?>" value="<?php echo $donnees['IMPORT_COMPTES'];?>"/>
					<input type="hidden" id="<?php echo "solde_".$ligne ?>" value="<?php echo $donnees['IMPORT_SOLDE'];?>"/>					
				</tr>
				<?php
					$ligne = $ligne+1;
					}
				?>
			</table>
		</div>
			<input type="hidden" id="nbLignes" value="<?php echo $ligne; ?>"/>		
	</body>