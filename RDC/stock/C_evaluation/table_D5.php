<?php

@session_start();

$mission_id=@$_SESSION['idMission'];

include '../../../connexion.php';

//J'active le requette pour afficher les données du table tab_rdc_st_d3 
$queryTableD3='select * from tab_rdc_st_d3 where MISSION_ID='.$mission_id;
$reponseQueryTableD3=$bdd->query($queryTableD3);
$donneesTableD3=$reponseQueryTableD3->fetch();
?>
<script>
	$(function(){
		
		function doubleValueOf(champ) {
			var value = parseFloat(champ.value.replace(/ /, '').replace(/%/, ''));
			return isNaN(value) ? 0 : value;
		}
		
		function calculAutomatique() {
			for(var i = 0; i < 5; i++) {
				(function() {
					var ii = i + 1;
					var champ1 = document.getElementById('L' + ii + '_C2');
					var champ2 = document.getElementById('L' + ii + '_C3');
					var champ3 = document.getElementById('L' + ii + '_C4');
					var champ4 = document.getElementById('L' + ii + '_C5');
					var champ5 = document.getElementById('L' + ii + '_C6');
					var champ6 = document.getElementById('L' + ii + '_C7');
					champ1.addEventListener('change', function() {
						
						champ4.value = (doubleValueOf(this) - doubleValueOf(champ2));
						champ5.value = (doubleValueOf(this) - doubleValueOf(champ3));
					});
					champ2.addEventListener('change', function() {
						champ4.value = (doubleValueOf(champ1) - doubleValueOf(this));
						champ6.value = (doubleValueOf(this) - doubleValueOf(champ3));
					});
					champ3.addEventListener('change', function() {
						champ5.value = (doubleValueOf(champ1) - doubleValueOf(this));
						champ6.value = (doubleValueOf(champ2) - doubleValueOf(this));
					});
				})();
			}
		}
		
		calculAutomatique();
		
	});
</script>
<div style="overflow:auto;">
	<label><strong><u>COMPARAISON COÛT DE REVIENT / PRIX DE VENTE  /  PRIX DE MARCHE							
</u></strong></label>
	<table width="100%" bgcolor="#6495ED">
		<tr style="background-color:#6495ED;color:white;height:10px;">
			<td></td>
			<td style="color:white;text-align:center;">Désignation *</td>
			<td style="color:white;text-align:center;">"Coût de revient(1)"</td>
			<td style="color:white;text-align:center;">"Prix de vente(2)"</td>
			<td style="color:white;text-align:center;">"Prix de marché(3)"</td>
			<td style="color:white;text-align:center;">"Ecart A (1) - (2)"</td>
			<td style="color:white;text-align:center;">"Ecart B (1) - (3)"</td>
			<td style="color:white;text-align:center;">"Ecart C (2) - (3)"</td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 1</td>
			<td><input type="text" id="L1_C1" value="<?php echo $donneesTableD3['L1_C1']; ?>"/></td>
			<td><input type="text" id="L1_C2" value="<?php echo $donneesTableD3['L1_C2']; ?>"/></td>
			<td><input type="text" id="L1_C3" value="<?php echo $donneesTableD3['L1_C3']; ?>"/></td>
			<td><input type="text" id="L1_C4" value="<?php echo $donneesTableD3['L1_C4']; ?>"/></td>
			<td><input type="text" id="L1_C5" value="<?php //echo $donneesTableD3['L1_C5']; ?>"/></td>
			<td><input type="text" id="L1_C6" value="<?php //echo $donneesTableD3['L1_C6']; ?>"/></td>
			<td><input type="text" id="L1_C7" value="<?php //echo $donneesTableD3['L1_C7']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 2</td>
			<td><input type="text" id="L2_C1" value="<?php echo $donneesTableD3['L2_C1']; ?>"/></td>
			<td><input type="text" id="L2_C2" value="<?php echo $donneesTableD3['L2_C2']; ?>"/></td>
			<td><input type="text" id="L2_C3" value="<?php echo $donneesTableD3['L2_C3']; ?>"/></td>
			<td><input type="text" id="L2_C4" value="<?php echo $donneesTableD3['L2_C4']; ?>"/></td>
			<td><input type="text" id="L2_C5" value="<?php //echo $donneesTableD3['L2_C5']; ?>"/></td>
			<td><input type="text" id="L2_C6" value="<?php //echo $donneesTableD3['L2_C6']; ?>"/></td>
			<td><input type="text" id="L2_C7" value="<?php //echo $donneesTableD3['L2_C7']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 3</td>
			<td><input type="text" id="L3_C1" value="<?php echo $donneesTableD3['L3_C1']; ?>"/></td>
			<td><input type="text" id="L3_C2" value="<?php echo $donneesTableD3['L3_C2']; ?>"/></td>
			<td><input type="text" id="L3_C3" value="<?php echo $donneesTableD3['L3_C3']; ?>"/></td>
			<td><input type="text" id="L3_C4" value="<?php echo $donneesTableD3['L3_C4']; ?>"/></td>
			<td><input type="text" id="L3_C5" value="<?php //echo $donneesTableD3['L3_C5']; ?>"/></td>
			<td><input type="text" id="L3_C6" value="<?php //echo $donneesTableD3['L3_C6']; ?>"/></td>
			<td><input type="text" id="L3_C7" value="<?php //echo $donneesTableD3['L3_C7']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 4</td>
			<td><input type="text" id="L4_C1" value="<?php echo $donneesTableD3['L4_C1']; ?>"/></td>
			<td><input type="text" id="L4_C2" value="<?php echo $donneesTableD3['L4_C2']; ?>"/></td>
			<td><input type="text" id="L4_C3" value="<?php echo $donneesTableD3['L4_C3']; ?>"/></td>
			<td><input type="text" id="L4_C4" value="<?php echo $donneesTableD3['L4_C4']; ?>"/></td>
			<td><input type="text" id="L4_C5" value="<?php //echo $donneesTableD3['L4_C5']; ?>"/></td>
			<td><input type="text" id="L4_C6" value="<?php ///echo $donneesTableD3['L4_C6']; ?>"/></td>
			<td><input type="text" id="L4_C7" value="<?php //echo $donneesTableD3['L4_C7']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 5</td>
			<td><input type="text" id="L5_C1" value="<?php echo $donneesTableD3['L5_C1']; ?>"/></td>
			<td><input type="text" id="L5_C2" value="<?php echo $donneesTableD3['L5_C2']; ?>"/></td>
			<td><input type="text" id="L5_C3" value="<?php echo $donneesTableD3['L5_C3']; ?>"/></td>
			<td><input type="text" id="L5_C4" value="<?php echo $donneesTableD3['L5_C4']; ?>"/></td>
			<td><input type="text" id="L5_C5" value="<?php //echo $donneesTableD3['L5_C5']; ?>"/></td>
			<td><input type="text" id="L5_C6" value="<?php ///echo $donneesTableD3['L5_C6']; ?>"/></td>
			<td><input type="text" id="L5_C7" value="<?php //echo $donneesTableD3['L5_C7']; ?>"/></td>
		</tr>
	</table>
</div>
