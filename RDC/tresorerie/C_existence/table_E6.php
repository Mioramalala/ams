<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
include '../../../connexion.php';
//J'active le requette qui recupere les données de la table import du balance générale de compte classe 5
	$queryBalance='select id_echantillon_bl,compt_ech_bl,libelle_ech_bl,debit_ech_bl,crd_ech_bl,sold_ech_bl from tab_echantillon_bl where id_mission='.$mission_id.' AND (compt_ech_bl LIKE "5%" AND BL_GEN_CYCLE="E- Tresoreries") GROUP BY compt_ech_bl';
	$reponseBalance=$bdd->query($queryBalance);	
?>
<head>
	<script type="text/javascript">
		function calcul(ligne){
				var pv = document.getElementById('pv_'+ligne).value;
				pv = Number(pv); 		

				var journal = document.getElementById('journal_'+ligne).value;
				journal = Number(journal); 						

				if(pv===''){
					$('#ecart1_'+ligne).val('');
				}
				else if(isNaN(pv)){
					alert("Veuillez entrer un nombre.");
					$('#ecart1_'+ligne).val('');
				}
				else if(pv!=''){
					var solde = $('#solde_'+ligne).text();
					var ecart = Number(solde) - Number(pv);
					$('#ecart1_'+ligne).val(ecart);

						if(journal===''){
							$('#ecart2_'+ligne).val('');
						}
						else if(isNaN(journal)){
							alert("Veuillez entrer un nombre.");
							$('#ecart2_'+ligne).val('');
						}
						else if(journal!=''){
							var ecart = Number(pv) - Number(journal);
							$('#ecart2_'+ligne).val(ecart);
						}
				}
		}
	</script>
</head>
<div align="center">
<label>PROCES VERBAL DE COMPTAGE PHYSIQUE DE CAISSE</label>
<table width="1000px" style="overflow:auto;">
	<tr bgcolor="#ccc">
		<td>Compte</td>
		<td>Libellé</td>
		<td>Solde comptable<br />(1)</td>
		<td>Solde PV de caisse<br />(2)</td>
		<td>Renvoi</td>
		<td>Ecart<br />(1)-(2)</td>
		<td>Solde journal<br />de caisse(3)</td>
		<td>Ecart<br />(2)-(3)</td>
		<td>Observations</td>
	</tr>
	<?php
		$ligne=0;
		while ($donneesBalance=$reponseBalance->fetch()){
	?>
	<tr bgcolor="white">
		<td><input type="Text" id="compteE3<?php echo $ligne; ?>" value="<?php echo $donneesBalance['compt_ech_bl']; ?>" size="20px" disabled="disabled"/></td>
		<td><?php echo $donneesBalance['libelle_ech_bl']?></td>
		<td id="<?php echo "solde_".$ligne ?>"><?php echo number_format((double)$donneesBalance['sold_ech_bl'], 2, ',', ' '); ?></td>
	<?php
		$rep=$bdd->query("select * from tab_e6 WHERE MISSION_ID=".$mission_id);
		$dn=$rep->fetch();
	?>
		<td><input type="text" id="<?php echo "pv_".$ligne ?>" value="<?php echo $dn['PV'] ?>" onkeyup="calcul(<?php echo $ligne; ?>);"/></td>
		<td><input type="text" id="<?php echo "renvoi_".$ligne ?>" value="<?php echo $dn['RENVOI'] ?>"/></td>
		<td><input type="text" id="<?php echo "ecart1_".$ligne ?>" value="<?php echo $dn['ECART2'] ?>"/></td>
		<td><input type="text" id="<?php echo "journal_".$ligne ?>" value="<?php echo $dn['JOURNAL'] ?>" onkeyup="calcul(<?php echo $ligne; ?>);"/></td>
		<td><input type="text" id="<?php echo "ecart2_".$ligne ?>" value="<?php echo $dn['ECART2'] ?>"/></td>
		<td><textarea id="<?php echo "observation_".$ligne ?>"><?php echo $dn['OBSERVATION'] ?></textarea></td>
	</tr>

	<?php
			$ligne = $ligne+1;
			}
	?>
	<input type="hidden" value="<?php echo $ligne?>" id="nbLignes"/>
</table>
</div>