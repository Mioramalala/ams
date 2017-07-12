<?php
	@session_start();
	$mission_id=$_SESSION['idMission'];
?>
<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../../../css/RDC.css"/>
		<link rel="stylesheet" href="../../../css/css.css"/>
		<link rel="stylesheet" href="../RDC/paie/paie.css"/>
		<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
		<script text="javascript" src="js/automatic-calculation.js"></script>
		<style type="text/css">
			input{width: 100%;height: 100%;font-size: 8pt;}
		</style>
		<script>
			$(function(){
					var ligne = document.getElementById('nbLignes').value;

					$('#bt_supp').click(function(){
						if(parseInt(ligne)>1){
									
							delete_Input(ligne ,<?php echo $mission_id; ?>);

							deleterow('tabK2');
							ligne = parseInt(ligne)-1;
							document.getElementById('nbLignes').value = ligne;
						}
					});
					
					$('#bt_ajout').click(function(){
						ligne = parseInt(ligne)+1;
						var tableau = document.getElementById('tabK2');

						row=document.createElement('tr');

						cell1=document.createElement('td');
						cell2=document.createElement('td');
						cell3=document.createElement('td');
						cell4=document.createElement('td');
						cell5=document.createElement('td');
						cell6=document.createElement('td');
						cell7=document.createElement('td');


			   			text1=document.createElement('textarea');
			   			text2=document.createElement('textarea');
			   			text3=document.createElement('textarea');   		
			   			text4=document.createElement('textarea');
			   			text5=document.createElement('textarea');
			   			text6=document.createElement('textarea');
			   			text7=document.createElement('textarea');
			  	

			   			text1.id = "periode_"+ligne;
			   			text2.id = "perte_"+ligne;
			   			text3.id = "ir_"+ligne;
			   			text4.id = "ida1_"+ligne;
			   			text5.id = "ida2_"+ligne;
			   			text6.id = "investissement_"+ligne;
			   			text7.id = "total_"+ligne;

			   			cell1.appendChild(text1);    
			   			cell2.appendChild(text2);    
			   			cell3.appendChild(text3);    
			   			cell4.appendChild(text4);    
			    		cell5.appendChild(text5);      			
			   			cell6.appendChild(text6);    
			    		cell7.appendChild(text7);

						row.appendChild(cell1);
						row.appendChild(cell2);
						row.appendChild(cell3);
						row.appendChild(cell4);
						row.appendChild(cell5);
						row.appendChild(cell6);
						row.appendChild(cell7);				

						$("#tabK2 > tbody").append(row);

						var formule = "";
						var i = $("#tabK2 > tbody > tr").get().length - 1;

						formule += "{3," + i + "} = {1," + i + "} * {2," + i + "};";
						formule += "{5," + i + "} = {4," + i + "} * {2," + i + "};";
						formule += "{6," + i + "} = {3," + i + "} + {5," + i + "}";

						$("#tabK2").automaticCalculation({
							expressions : formule,
							delimiter   : ";",
							disabled    : true
						});
						
					});
					
			});
				function delete_Input(ligne, mission_id){
					$.ajax({
						type:'POST',
						url:'RDC/impot/impotF/delete_Input_F2.php',
						data:{ligne:ligne, mission_id:mission_id},
						success:function(){
						}
					});	
				}
				function deleterow(tableID) {
			    var table = document.getElementById(tableID);
			    var rowCount = table.rows.length;
				table.deleteRow(rowCount -1);
				}	
				
			//////////////////////////////////Calcul automatique///////////////////////////////////
			
			function ida1()
			{
			var nbLignes=document.getElementById('nbLignes').value;
			var i=0;
				for(i=1;i<=nbLignes;i++){
					var perte=$('#perte_'+i).val();
					var ir=$('#ir_'+i).val();
					var total_ida1=perte*ir;
					document.getElementById("ida1_"+i).value=total_ida1;
				}
			}
			function ida2()
			{
			var nbLignes2=document.getElementById('nbLignes').value;
			var j=0;
			alert(nbLignes2);
				for(j=1;j<=nbLignes2;j++){
					var investissement=$('#investissement_'+j).val();
					var ir2=$('#ir_'+j).val();
					var total_ida2=investissement*ir2;
					document.getElementById("ida2_"+j).value=total_ida2;
				}
			}
			function total_ida()
			{
			var nbLignes3=document.getElementById('nbLignes').value;
			var k=0;
			alert(nbLignes3);
				for(k=1;k<=nbLignes;k++){
					var ida1=$('#ida1_'+k).val();
					var ida2=$('#ida2_'+k).val();
					var total_ida1=ida1+ida2;
					document.getElementById("total_"+k).value=total_ida1;
				}
			}
			
			var formule = "";
			for(var i = 0; i < $("#tabK2 > tbody > tr").get().length; i++) {
				if(i > 0) formule += ";";
				formule += "{3," + i + "} = {1," + i + "} * {2," + i + "};";
				formule += "{5," + i + "} = {4," + i + "} * {2," + i + "};";
				formule += "{6," + i + "} = {3," + i + "} + {5," + i + "}";
			}

			$("#tabK2").automaticCalculation({
				expressions : formule,
				delimiter   : ";",
				disabled    : true
			});
			
		</script>
</head>
<body>
	<center><p class="titreRenvoie">DETAIL DES IDA</p></center>
	<div class="cadre">
		<table class="i2" id="tabK2" >
			<thead>
				<tr class="sous-titre">
					<td width="100px">Période</td>
					<td width="100px">Perte fiscale</td>
					<td width="100px">Taux IR</td>
					<td width="150px"><input type="button" value="IDA 1" onclick="ida1()" style="width:100px;height:30px"></td>
					<td width="200px">Investissement</td>
					<td width="150px"><input type="button" value="IDA 2" onclick="ida2()" style="width:100px;height:30px"></td>
					<td width="200px"><input type="button" value="Total IDA" onclick="total_ida()" style="width:120px;height:30px"></td>
				</tr>
			</thead>

			<tbody>
			<?php
					include '../../../connexion.php';
			
					$reponse=$bdd->query('select * FROM tab_i3 where MISSION_ID='.$mission_id);
					(int)$ligne=1;

					while($donnees=$reponse->fetch()){
			?>
				<tr>
					<td width="100px"><textarea id="<?php echo "periode_".$ligne?>"><?php echo $donnees['PERIODE']?></textarea></td>
					<td width="100px"><textarea id="<?php echo "perte_".$ligne?>"><?php echo $donnees['PERTE_FISCALE']?></textarea></td>
					<td width="100px"><textarea id="<?php echo "ir_".$ligne?>"><?php echo $donnees['IR']?></textarea></td>
					<td width="150px"><textarea id="<?php echo "ida1_".$ligne?>"><?php echo $donnees['IDA1']?></textarea></td>
					<td width="200px"><textarea id="<?php echo "investissement_".$ligne?>"><?php echo $donnees['INVESTISSEMENT']?></textarea></td>
					<td width="150px"><textarea id="<?php echo "ida2_".$ligne?>"><?php echo $donnees['IDA2']?></textarea></td>
					<td width="200px"><textarea id="<?php echo "total_".$ligne?>"><?php echo $donnees['TOTAL']?></textarea></td>
				</tr>			

			<?php
						$ligne = $ligne +1;
				}
			?>
			</tbody>

		</table>
<div style="float:right;">
	<input type="button" id="bt_ajout" value="+" class="bouton" style="color:white; background-color:black;"/>
	<input type="button" id="bt_supp" value="-" class="bouton"  style="color:white; background-color:black;"/>
	<input type="hidden" id="nbLignes" value="<?php echo ($ligne-1)?>"/>
</div>		
	</div>
	
</body>
