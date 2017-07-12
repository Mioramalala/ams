<?php
	$mission_id=@$_POST['mission_id'];
	include '../connexion.php';
	$comp1=$_POST['comp'];

	$reponse=$bdd->query("SELECT BALANCE_GENERAL_ID, BALANCE_GENERAL_COMPTE_CONCERNE,BALANCE_GENERAL_COMPTE_CONCERNE2, BALANCE_GENERAL_CYCLE, BALANCE_GENERAL_GROUPES FROM  tab_balance_general WHERE BALANCE_GENERAL_ID='$comp1'") or die (mysql_error());
	$res=$reponse->fetch();
	//echo($res['BALANCE_GENERAL_COMPTE_CONCERNE']);
?>
<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="evenement.js"></script>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript">
			 function modifier(){
				 var num = $('#dv_txt1').val();
				 var id = $('#dv_txt0').val();
				 var cycle = $('#dv_txt2').val();
				 var num2 =$('#dv_txt3').val();
					$.ajax({
						type:"post",
						url:'RA/modifieko.php',
						data:{num:num,id:id,cycle:cycle,num2:num2},
						success:function(e){
							$("#contenue").html(e);
							alert("Modifications bien enregistrées");
							$('#contenue').load('RA/pcg.php');
						}
					});
			}
			$(function(){
				$('#dv_retour').click(function(){
					$('#contenue').load('RA/pcg.php?mission_id='+<?php echo $mission_id; ?>);			
				});	
			});
	
		</script>
	</head>
	
	<body>
		<br/><br/>
		<table style="border:1px solid black; width:500px; height:200px; background-color:#efefef;">	
			<tr>
				<td><input style = "display:none" type="text" id= "dv_txt0" value = "<?php echo ($res['BALANCE_GENERAL_ID']); ?>"/></td>
			</tr>
			<tr>
				<td><label><?php echo ($res['BALANCE_GENERAL_GROUPES']); ?></label></td>
			</tr>
			<tr>
				<td>Modifier le numéro des comptes de:</td>
				<td><input type = "text" id ="dv_txt1" name = 'txtnum' value = "<?php echo ($res['BALANCE_GENERAL_COMPTE_CONCERNE']); ?>"/></td>
			</tr>
			<tr>
				<td>Modifier le numéro des comptes à:</td>
				<td><input type = "text" id ="dv_txt3" name = 'txtnum' value = "<?php echo ($res['BALANCE_GENERAL_COMPTE_CONCERNE2']); ?>"/></td>
			</tr>
			<tr>
				<td>Modifier le cycle:</td>
				<td>
				<input type = "text" id ="dv_txt2" name = 'txtcycle' value = "<?php echo($res['BALANCE_GENERAL_CYCLE']); ?>"/>

<!-- 				<select id="dv_txt2">
					<option value="Selectionnez un cycle" disabled></option>
					<option value="A- Fonds propres">A- Fonds propres</option>
					<option value="B- Immobilisations incorporelles et corporelles">B- Immobilisations incorporelles et corporelles</option> 
					<option value="C- Immobilisations financières">C- Immobilisations financières</option> 
					<option value="D- Stocks">D- Stocks</option> 
					<option value="E- Trésoreries">E- Trésoreries</option>
					<option value="F- Charges Fournisseurs">F- Charges Fournisseurs</option>
					<option value="G- Produits Clients">G- Produits Clients</option>
					<option value="H- Paie et Personnel">H- Paie et Personnel</option>
					<option value="I- Impôts et taxes">I- Impôts et taxes</option>
					<option value="J- Emprunts et dettes financières">J- Emprunts et dettes financières</option>
					<option value="K- Débiteurs et créditeurs divers">K- Débiteurs et créditeurs divers</option>
				</select> -->
				</td>
			</tr>
			<tr>
				<td><input type = "button" id ="dv_modif" value = "VALIDER" onclick ="modifier()"/></td>
				<td><input type = "button" id ="dv_retour" value = "RETOUR" onclick ="retour()"/></td>
			</tr>
		</table>
	</body>
</html>
