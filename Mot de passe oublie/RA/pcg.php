<?php
@session_start();
$_SESSION['objectif']='Plan comptable';
$mission_id=@$_GET['mission_id'];
$choix_plan=@$_POST['choix_plan'];
?>
	<link rel = "stylesheet" href = "../RA/css_RA.css"/>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
	var choix_plan='';
	var vali1='';
	var vali4='';
	var m='';
	function choixplan()
			{
				choix_plan=$('#dv_plan').val();				
				$.ajax({
					type:'POST',
					url:'RA/pcg.php',
					data:{choix_plan:choix_plan},
					success:function(e){
						$("#contenue").html(e);
						$('#dv_plan').val(choix_plan);
					}
				});
			}
		function makaid(comp){
			//var idBal="idBalGen"+comp;
			
			//AJAX COMPTE CONCERNES
			var transfert="comp="+comp+"&mission_id="+<?php echo $mission_id?>;
			$.ajax({
				type:"POST",
				url:"RA/modif.php",
				data:transfert,
				success: function(e){
				$("#contenue").html(e);
				}
			});
		}
		
			//FONCTION COMPTE COCNCERNES
			$(function(){
				$('#labModif').click(function(){
				var idbal=$('#idBalGen').val();
				});
				
				$('#btretour').click(function(){
						$('#contenue').load('RA/index.php?mission_id='+<?php echo $mission_id; ?>);			
					});
				});
			
			// function cycle(){
				// $('#dv_cycle').click(function(){
				// var i=0;
				// for (i=0;i<64;i++){
				// $('#td_cycle'+i).show();}
				//alert("votre cycle est inserée");
				// });
			// }
		function valideko(){
		alert("yes");
			var i = 0;
				for(i=0;i<73;i++){
					vali1=$('#id_bal1'+i).val();
					vali4=$('#id_bal4'+i).val();
					 // alert(vali1);
					// alert(vali4);
				}
					
			$("form.frm_balancegnrl").submit(function() {
				//alert("vali1");
				s = $(this).serialize(); 
				$.ajax({
					type:"POST",
					data: s,
					url: $(this).attr("action"),
					success: function(retour){ 
						alert(retour);
					}
				});
				return false;
			 });
				
				// $.ajax({
					// type:'POST',
					// url:'RA/validerpcg.php',
					// data:{vali1:vali1,vali4:vali4},
					// success:function(e){
						// $("#contenue").html(e);
							// alert('Modifications bien enregistrées');
							//$('#contenue').load('RA/index.php?mission_id='+<?php echo $mission_id; ?>);	
					// }
				// });
			}
		
		</script>
		<br/>
			<input type = "button" id= "btretour" value = "Retour" style = "float:right" /><br/>
			<center><label style="font-size:14"><b>Définition de la nomenclature des comptes</b> </label></center><br/>
		<div>	
			<table  width="1000" border="1">
				<tr>
					<td width="300">PLAN DE COMPTES A 
						<select id = 'dv_plan' onchange = "choixplan()">
							<option></option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select> 
						DIGITS
					</td>
					<td width="300" style="border:1px solid black; background-color:#efefef;"></td>
					<td width="420" style="border:1px solid black; background-color:#efefef;"><input type = "button" value="Valider" id="id_val" onclick="valideko()"/></td>
				</tr>
				<tr>
					<td width="300" style="background-color:blue;"><label style="color:white">Comptes concernés <br/>de &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;à<label> </td>
					<td width="300" style="background-color:blue;"><label style="color:white">Groupe de comptes</td>
					<td width="420" style="background-color:blue;"><label style="color:white">Cycles</td>
				</tr>	
			</table>
		</div>
		<div id="div_pcg">
		<form name="frm_balancegnrl"  class="frm_balancegnrl" action="validerpcg.php" method="POST">
		<!--form-->
			<table border="1" width="980">
				<?php
					include '../connexion.php';
					$max=$bdd->query('SELECT MAX(BALANCE_GENERAL_ID) AS m from tab_balance_general');
					$valiny=$max->fetch();
					//echo $valiny['m'];
						
					$reponse = $bdd->query('SELECT BALANCE_GENERAL_ID,BALANCE_GENERAL_COMPTE_CONCERNE,BALANCE_GENERAL_COMPTE_CONCERNE2,BALANCE_GENERAL_GROUPES,BALANCE_GENERAL_CYCLE FROM tab_balance_general where BALANCE_GENERAL_PCG=2');
					$compte=0;
					while ($donnees = $reponse->fetch())
					{
						$bal1=$donnees['BALANCE_GENERAL_COMPTE_CONCERNE'];
						$bal4=$donnees['BALANCE_GENERAL_COMPTE_CONCERNE2'];
						$bal2=$donnees['BALANCE_GENERAL_GROUPES'];
						$bal3=$donnees['BALANCE_GENERAL_CYCLE'];
							
						if($choix_plan!=0){
							$bal1=substr($bal1,0,$choix_plan);
							$bal4=substr($bal4,0,$choix_plan);
						}
				?>	
				<tr id="idBalGen<?php echo $compte;?>" onclick="makaid(<?php echo $donnees['BALANCE_GENERAL_ID'];?>)" value="<?php echo $donnees['BALANCE_GENERAL_ID'];?>">
					<input type ="text" value="<?php echo $donnees['BALANCE_GENERAL_ID']?>"  style="display:none"/>
					<td width="150" id="id_bal1<?php echo $compte;?>"><?php echo $bal1;?> </td>
					<td width="150" id="id_bal4<?php echo $compte;?>"><?php echo $bal4;?> </td>
					<input name="Balancecompte_1[]" type= "hidden" value="<?php echo $bal1;?>">
					<input name="Balancecompte_2[]" type= "hidden" value="<?php echo $bal4;?>">
					<td width="320"><?php echo $bal2;?></td>
					<td id="td_cycle<?php echo $compte;?>" style ="width:370;display:block"><?php echo $bal3;?></td>
					<td width="50" ><label id="labModif" style ="color:blue;">Modifier</label><td>
				</tr>
				<?php
					$compte++;
					}
				?>
			</table>
		</form>
</div>
	