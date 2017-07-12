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
		$(document).live("keypress,keyup","#L1_C3,#L1_C2",calcul_celule1);
		//$(document).on("","#L1_C3,#L1_C2",calcul_celule1);
		function calcul_celule1()
		{
			 var L1_C2=$('#L1_C2').val();
			 var L1_C3=$('#L1_C3').val();
			 var ecart1=L1_C2-L1_C3;
			 document.getElementById("L1_C5").value=ecart1;
		}
		
		$(document).on("keypress","#L1_C2,#L1_C4",calcul_celule11);
		$(document).on("keyup","#L1_C2,#L1_C4",calcul_celule11);
		function calcul_celule11()
		{
			var L1_C2=$('#L1_C2').val();
			var L1_C4=$('#L1_C4').val();
			var ecart11=L1_C2-L1_C4;
			document.getElementById("L1_C6").value=ecart11;
		}
		
		$(document).on("keypress","#L1_C3,#L1_C4",calcul_celule111);
		$(document).on("keyup","#L1_C3,#L1_C4",calcul_celule111);
		function calcul_celule111()
		{
			var L1_C3=$('#L1_C3').val();
			var L1_C4=$('#L1_C4').val();
			var ecart111=L1_C3-L1_C4;
			document.getElementById("L1_C7").value=ecart111;
		}
		
		$(document).on("keypress","#L2_C2,#L2_C3",calcul_celule2);
		$(document).on("keyup","#L2_C2,#L2_C3",calcul_celule2);
		function calcul_celule2()
		{
			var L2_C2=$('#L2_C2').val();
			var L2_C3=$('#L2_C3').val();
			var ecart2=L2_C2-L2_C3;
			document.getElementById("L2_C5").value=ecart2;
		}
		
		$(document).on("keypress","#L2_C2,#L2_C4",calcul_celule22);
		$(document).on("keyup","#L2_C2,#L2_C4",calcul_celule22);
		function calcul_celule22()
		{
			var L2_C2=$('#L2_C2').val();
			var L2_C4=$('#L2_C4').val();
			var ecart22=L2_C2-L2_C4;
			document.getElementById("L2_C6").value=ecart22;
		}
		$(document).on("keypress","#L2_C3,#L2_C4",calcul_celule222);
		$(document).on("keyup","#L2_C3,#L2_C4",calcul_celule222);
		
		function calcul_celule222()
		{
			var L2_C3=$('#L2_C3').val();
			var L2_C4=$('#L2_C4').val();
			var ecart222=L2_C3-L2_C4;
			document.getElementById("L2_C7").value=ecart222;
		}
		
		$(document).on("keypress","#L3_C2,#L3_C3",calcul_celule3);
		$(document).on("keyup","#L3_C2,#L3_C3",calcul_celule3);
		
		function calcul_celule3()
		{
			var L3_C2=$('#L3_C2').val();
			var L3_C3=$('#L3_C3').val();
			var ecart3=L3_C2-L3_C3;
			document.getElementById("L3_C5").value=ecart3;
		}
		
		$(document).on("keypress","#L3_C2,#L3_C4",calcul_celule33);
		$(document).on("keyup","#L3_C2,#L3_C4",calcul_celule33);
		
		function calcul_celule33()
		{
			var L3_C2=$('#L3_C2').val();
			var L3_C4=$('#L3_C4').val();
			var ecart33=L3_C2-L3_C4;
			document.getElementById("L3_C6").value=ecart33;
		}
		
		$(document).on("keypress","#L3_C3,#L3_C4",calcul_celule333);
		$(document).on("keyup","#L3_C3,#L3_C4",calcul_celule333);
		
		function calcul_celule333()
		{
			var L3_C3=$('#L3_C3').val();
			var L3_C4=$('#L3_C4').val();
			var ecart333=L3_C3-L3_C4;
			document.getElementById("L3_C7").value=ecart333;
		}
		
		$(document).on("keypress","#L4_C2,#L4_C3",calcul_celule4);
		$(document).on("keyup","#L4_C2,#L4_C3",calcul_celule4);
		
		function calcul_celule4()
		{
			var L4_C2=$('#L4_C2').val();
			var L4_C3=$('#L4_C3').val();
			var ecart4=L4_C2-L4_C3;
			document.getElementById("L4_C5").value=ecart4;
		}
		
		$(document).on("keypress","#L4_C2,#L4_C4",calcul_celule44);
		$(document).on("keyup","#L4_C2,#L4_C4",calcul_celule44);
		
		function calcul_celule44()
		{
			var L4_C2=$('#L4_C2').val();
			var L4_C4=$('#L4_C4').val();
			var ecart44=L4_C2-L4_C4;
			document.getElementById("L4_C6").value=ecart44;
		}
		
		$(document).on("keypress","#L4_C3,#L4_C4",calcul_celule444);
		$(document).on("keyup","#L4_C3,#L4_C4",calcul_celule444);
		
		function calcul_celule444()
		{
			var L4_C3=$('#L4_C3').val();
			var L4_C4=$('#L4_C4').val();
			var ecart444=L4_C3-L4_C4;
			document.getElementById("L4_C7").value=ecart444;
		}
		
		$(document).on("keypress","#L5_C2,#L5_C3",calcul_celule5);
		$(document).on("keyup","#L5_C2,#L5_C3",calcul_celule5);
		
		function calcul_celule5()
		{
			var L5_C2=$('#L5_C2').val();
			var L5_C3=$('#L5_C3').val();
			var ecart5=L5_C2-L5_C3;
			document.getElementById("L5_C5").value=ecart5;
		}
		
		$(document).on("keypress","#L5_C2,#L5_C4",calcul_celule55);
		$(document).on("keyup","#L5_C2,#L5_C4",calcul_celule55);
		
		function calcul_celule55()
		{
			var L5_C2=$('#L5_C2').val();
			var L5_C4=$('#L5_C4').val();
			var ecart55=L5_C2-L5_C4;
			document.getElementById("L5_C6").value=ecart55;
		}
		$(document).on("keypress","#L5_C3,#L5_C4",calcul_celule555);
		$(document).on("keyup","#L5_C3,#L5_C4",calcul_celule555);
		
		function calcul_celule555()
		{
			var L5_C3=$('#L5_C3').val();
			var L5_C4=$('#L5_C4').val();
			var ecart555=L5_C3-L5_C4;
			document.getElementById("L5_C7").value=ecart555;
		}
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
			<td><input type="text" id="L1_C5" value="<?php echo $donneesTableD3['L1_C5']; ?>"/></td>
			<td><input type="text" id="L1_C6" value="<?php echo $donneesTableD3['L1_C6']; ?>"/></td>
			<td><input type="text" id="L1_C7" value="<?php echo $donneesTableD3['L1_C7']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 2</td>
			<td><input type="text" id="L2_C1" value="<?php echo $donneesTableD3['L2_C1']; ?>"/></td>
			<td><input type="text" id="L2_C2" value="<?php echo $donneesTableD3['L2_C2']; ?>"/></td>
			<td><input type="text" id="L2_C3" value="<?php echo $donneesTableD3['L2_C3']; ?>"/></td>
			<td><input type="text" id="L2_C4" value="<?php echo $donneesTableD3['L2_C4']; ?>"/></td>
			<td><input type="text" id="L2_C5" value="<?php echo $donneesTableD3['L2_C5']; ?>"/></td>
			<td><input type="text" id="L2_C6" value="<?php echo $donneesTableD3['L2_C6']; ?>"/></td>
			<td><input type="text" id="L2_C7" value="<?php echo $donneesTableD3['L2_C7']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 3</td>
			<td><input type="text" id="L3_C1" value="<?php echo $donneesTableD3['L3_C1']; ?>"/></td>
			<td><input type="text" id="L3_C2" value="<?php echo $donneesTableD3['L3_C2']; ?>"/></td>
			<td><input type="text" id="L3_C3" value="<?php echo $donneesTableD3['L3_C3']; ?>"/></td>
			<td><input type="text" id="L3_C4" value="<?php echo $donneesTableD3['L3_C4']; ?>"/></td>
			<td><input type="text" id="L3_C5" value="<?php echo $donneesTableD3['L3_C5']; ?>"/></td>
			<td><input type="text" id="L3_C6" value="<?php echo $donneesTableD3['L3_C6']; ?>"/></td>
			<td><input type="text" id="L3_C7" value="<?php echo $donneesTableD3['L3_C7']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 4</td>
			<td><input type="text" id="L4_C1" value="<?php echo $donneesTableD3['L4_C1']; ?>"/></td>
			<td><input type="text" id="L4_C2" value="<?php echo $donneesTableD3['L4_C2']; ?>"/></td>
			<td><input type="text" id="L4_C3" value="<?php echo $donneesTableD3['L4_C3']; ?>"/></td>
			<td><input type="text" id="L4_C4" value="<?php echo $donneesTableD3['L4_C4']; ?>"/></td>
			<td><input type="text" id="L4_C5" value="<?php echo $donneesTableD3['L4_C5']; ?>"/></td>
			<td><input type="text" id="L4_C6" value="<?php echo $donneesTableD3['L4_C6']; ?>"/></td>
			<td><input type="text" id="L4_C7" value="<?php echo $donneesTableD3['L4_C7']; ?>"/></td>
		</tr>
		<tr style="background-color:white;">
			<td>Catégorie 5</td>
			<td><input type="text" id="L5_C1" value="<?php echo $donneesTableD3['L5_C1']; ?>"/></td>
			<td><input type="text" id="L5_C2" value="<?php echo $donneesTableD3['L5_C2']; ?>"/></td>
			<td><input type="text" id="L5_C3" value="<?php echo $donneesTableD3['L5_C3']; ?>"/></td>
			<td><input type="text" id="L5_C4" value="<?php echo $donneesTableD3['L5_C4']; ?>"/></td>
			<td><input type="text" id="L5_C5" value="<?php echo $donneesTableD3['L5_C5']; ?>"/></td>
			<td><input type="text" id="L5_C6" value="<?php echo $donneesTableD3['L5_C6']; ?>"/></td>
			<td><input type="text" id="L5_C7" value="<?php echo $donneesTableD3['L5_C7']; ?>"/></td>
		</tr>
	</table>
</div>
