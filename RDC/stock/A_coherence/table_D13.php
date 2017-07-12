<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
?>
<style>
#tet{
  margin-left:-17px;
  margin-top:20px;
  border-collapse:collapse;
  }
#tettd{
   border:1px solid #ccc;
   background-color:#0074bf;
   color:#fff;
  }
 </style>
<script type="text/javascript" src="js/automatic-calculation.js"></script>
 <script>

function variation(){
	var stock_ini=$('#stock_initial').val();
	var stock_fin=$('#stock_final').val();
	var resVariation=stock_fin-stock_ini;
	document.getElementById("variation").value=resVariation;
}
function ecart(){
	var stock_ini=$('#stock_initial').val();
	var stock_fin=$('#stock_final').val();
	var resVariation=stock_ini-stock_fin;
	var solde=$('#solde').val();
	var resEcart=resVariation-solde;
	document.getElementById("ecart").value=resEcart;
}

	$(function(){
		$("#tet").automaticCalculation({
			expressions : "{2, 0} = {0, 0} - {1, 0}; {4, 0} = {2, 0} - {3, 0}"
		});
	});

</script>
<div align="center">
<label>CONCORDANDE DES STOCKS D'OUVERTURE ET DE CLOTURE</label>
<div style="overflow:auto;height:360px;">
<?php
	include '../../../connexion.php';

	$req = "SELECT * FROM tab_st_d13 WHERE MISSION_ID=".$mission_id;
	$rep=$bdd->query($req);

	$data = $rep->fetch();
?>
	<table width="800px" id="tet">
		<thead>
			<tr id="tettd">
				<td width="15%">Stock initial(1)</td>
				<td width="7%">Stock final(2)</td>
				<td width="7%"><input type = "button" value="Variation(3)=(2)-(1)" onclick="variation()"></td>
				<td width="7%">Solde comptable Variation de stock(4)</td>
				<td width="7%"><input type = "button"  value="Ecart(5)=(3)-(4)" onclick="ecart()"></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td width="15%"><textarea style="text-align:right;" cols="15" id="stock_initial"><?php echo number_format($data["STOCK_INITIAL"],2,"," , " ");?></textarea></td>
				<td width="7%"><textarea style="text-align:right;" cols="15" id="stock_final"><?php echo number_format($data["STOCK_FINAL"],2,"," , " ");?></textarea></td>
				<td width="7%"><textarea style="text-align:right;" cols="15" id="variation"><?php $variation=$data["STOCK_FINAL"] - $data["STOCK_INITIAL"]; echo number_format($variation,2,"," , " ");?></textarea></td>
				<td width="7%"><textarea style="text-align:right;" cols="15" id="solde"><?php echo number_format($data["SOLDE"],2,"," , " ");?></textarea></td>
				<td width="7%"><textarea style="text-align:right;" cols="15" id="ecart"><?php echo number_format($data["ECART"],2,"," , " ");?></textarea></td>
			</tr>
		</tbody>
	</table>
</div>