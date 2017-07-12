<?php
	session_start();
	include '../../../connexion.php';

	$req=$bdd->query("SELECT * FROM tab_cad_salaire_cnaps WHERE MISSION_ID='".$_SESSION['idMission']."' ORDER BY PERIODE ASC");
	$rowCount = $req->rowCount();

	$i=0;

	if( $rowCount != 0 ){
		echo '<table class="h7">
					<tr class="sous-titre">
						<td>Période</td>
						<td>Salaires Non plafonnés</td>
						<td>Salaires Plafonnés</td>
						<td>Part employés (1%)</td>
						<td>Part employeur (13%)</td>
					</tr>';
		while( $don=$req->fetch() ){
			$i++;
			echo'   <tr>
						<td id="PC'.$i.'">'.$don['PERIODE'].'</td>
						<td><input type="text" value="'.$don['SNP'].'" placeholder="0.00" onkeyup="ecartByName(\'comptNPCNAPS\')" onkeydown="ecartByName(\'comptNPCNAPS\')" id="NPCNAPS'.$i.'"/></td>
						<td><input type="text" value="'.$don['SP'].'" placeholder="0.00" onkeyup="ecartByName(\'comptPCNAPS\');ecartByName(\'comptPECNAPS1\');ecartByName(\'comptPECNAPS13\');partEmploye(this,1,13)" onkeydown="ecartByName(\'comptPCNAPS\');ecartByName(\'comptPECNAPS1\');ecartByName(\'comptPECNAPS13\');partEmploye(this,1,13)" id="plafone'.$i.'" /></td>
						<td id="PECNAPS1T'.$i.'">'.$don['PE1'].'</td>
						<td id="PECNAPS13T'.$i.'">'.$don['PE13'].'</td>
					</tr>';
		}
		$sql1 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'cnaps_salaire_non_plafonees' AND MISSION_ID=".$_SESSION['idMission'];
		$rep1 = $bdd->query($sql1);
		$don1 = $rep1->fetch();

		$sql2 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'cnaps_salaire_plafonees' AND MISSION_ID=".$_SESSION['idMission'];
		$rep2 = $bdd->query($sql2);
		$don2 = $rep2->fetch();

		$sql3 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'cnaps_pe1' AND MISSION_ID=".$_SESSION['idMission'];
		$rep3 = $bdd->query($sql3);
		$don3 = $rep3->fetch();

		$sql4 = "SELECT * FROM tab_cadrage_salaire WHERE IDENTIFIANT = 'cnaps_pe13' AND MISSION_ID=".$_SESSION['idMission'];
		$rep4 = $bdd->query($sql4);
		$don4 = $rep4->fetch();
		echo '<tr>
						<td><b>TOTAL (1)</b></td>
						<td id="totalNPCNAPS">'.$don1['TOTAL'].'</td>
						<td id="totalPCNAPS">'.$don2['TOTAL'].'</td>
						<td id="totalPECNAPS1">'.$don3['TOTAL'].'</td>
						<td id="totalPECNAPS13">'.$don4['TOTAL'].'</td>
					</tr>
					<tr>
						<td><b>Comptabilité (2)</b></td>
						<td><input type="text" value="'.$don1['COMPTA'].'" id="comptNPCNAPS" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" value="'.$don2['COMPTA'].'" id="comptPCNAPS" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" value="'.$don3['COMPTA'].'" id="comptPECNAPS1" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" value="'.$don4['COMPTA'].'" id="comptPECNAPS13" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
					</tr>
					<tr>
						<td><b>Ecart (1)-(2)</b></td>
						<td id="ecartNPCNAPS">'.$don1['ECART'].'</td>
						<td id="ecartPCNAPS">'.$don2['ECART'].'</td>
						<td id="ecartPECNAPS1">'.$don3['ECART'].'</td>
						<td id="ecartPECNAPS13">'.$don4['ECART'].'</td>
					</tr>
			</table>';
	}
	else{
		echo '<table class="h7">
					<tr class="sous-titre">
						<td>Période</td>
						<td>Salaires Non plafonnés</td>
						<td>Salaires Plafonnés</td>
						<td>Part employés (1%)</td>
						<td>Part employeur (13%)</td>
					</tr>
					<tr>
						<td id="PC1">Trimestre 1</td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptNPCNAPS\')" onkeydown="ecartByName(\'comptNPCNAPS\')" id="NPCNAPS1"/></td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptPCNAPS\');ecartByName(\'comptPECNAPS1\');ecartByName(\'comptPECNAPS13\');partEmploye(this,1,13)" onkeydown="ecartByName(\'comptPCNAPS\');ecartByName(\'comptPECNAPS1\');ecartByName(\'comptPECNAPS13\');partEmploye(this,1,13)" id="plafone1" /></td>
						<td id="PECNAPS1T1">0.00</td>
						<td id="PECNAPS13T1">0.00</td>
					</tr>
					<tr>
						<td id="PC2">Trimestre 2</td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptNPCNAPS\')" onkeydown="ecartByName(\'comptNPCNAPS\')" id="NPCNAPS2"/></td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptPCNAPS\');ecartByName(\'comptPECNAPS1\');ecartByName(\'comptPECNAPS13\');partEmploye(this,1,13)" onkeydown="ecartByName(\'comptPCNAPS\');ecartByName(\'comptPECNAPS1\');ecartByName(\'comptPECNAPS13\');partEmploye(this,1,13)" id="plafone2"/></td>
						<td id="PECNAPS1T2">0.00</td>
						<td id="PECNAPS13T2">0.00</td>
					</tr>
					<tr>
						<td id="PC3">Trimestre 3</td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptNPCNAPS\')" onkeydown="ecartByName(\'comptNPCNAPS\')" id="NPCNAPS3"/></td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptPCNAPS\');ecartByName(\'comptPECNAPS1\');ecartByName(\'comptPECNAPS13\');partEmploye(this,1,13)" onkeydown="ecartByName(\'comptPCNAPS\');ecartByName(\'comptPECNAPS1\');ecartByName(\'comptPECNAPS13\');partEmploye(this,1,13)" id="plafone3"/></td>
						<td id="PECNAPS1T3">0.00</td>
						<td id="PECNAPS13T3">0.00</td>
					</tr>
					<tr>
						<td id="PC4">Trimestre 4</td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptNPCNAPS\')" onkeydown="ecartByName(\'comptNPCNAPS\')" id="NPCNAPS4"/></td>
						<td><input type="text" placeholder="0.00" onkeyup="ecartByName(\'comptPCNAPS\');ecartByName(\'comptPECNAPS1\');ecartByName(\'comptPECNAPS13\');partEmploye(this,1,13)" onkeydown="ecartByName(\'comptPCNAPS\');ecartByName(\'comptPECNAPS1\');ecartByName(\'comptPECNAPS13\');partEmploye(this,1,13)" id="plafone4"/></td>
						<td id="PECNAPS1T4">0.00</td>
						<td id="PECNAPS13T4">0.00</td>
					</tr>
					<tr>
						<td><b>TOTAL (1)</b></td>
						<td id="totalNPCNAPS"></td>
						<td id="totalPCNAPS">0.00</td>
						<td id="totalPECNAPS1">0.00</td>
						<td id="totalPECNAPS13">0.00</td>
					</tr>
					<tr>
						<td><b>Comptabilité (2)</b></td>
						<td><input type="text" id="comptNPCNAPS" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" id="comptPCNAPS" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" id="comptPECNAPS1" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
						<td><input type="text" id="comptPECNAPS13" placeholder="0.00" onkeydown="ecartByThis(this)" onkeyup="ecartByThis(this)" /></td>
					</tr>
					<tr>
						<td><b>Ecart (1)-(2)</b></td>
						<td id="ecartNPCNAPS">0.00</td>
						<td id="ecartPCNAPS">0.00</td>
						<td id="ecartPECNAPS1">0.00</td>
						<td id="ecartPECNAPS13">0.00</td>
					</tr>
			</table>';





	}
?>
<script type="text/javascript">


$("#suivantPP").on("click",function(){
	
			console.log("ajax vers : RDC/paie/paieG/save5bSmids.php");

			var comptNPCNAPS=$('#comptNPCNAPS').val(),
		          comptPECNAPS1=$('#comptPECNAPS1').val(),
		          comptPECNAPS13=$('#comptPECNAPS13').val(),
		          comptPCNAPS=$('#comptPCNAPS').val();


				var totalNPCNAPS=$('#totalNPCNAPS').html(),
					totalPECNAPS1=$('#totalPECNAPS1').html(),
					totalPECNAPS13=$('#totalPECNAPS13').html(),
					totalPCNAPS=$('#totalPCNAPS').html();

				var ecartNPCNAPS=$('#ecartNPCNAPS').html(),
					ecartPCNAPS=$('#ecartNPCNAPS').html(),
					ecartPECNAPS1=$('#ecartPECNAPS1').html(),
					ecartPECNAPS13=$('#ecartPECNAPS13').html();

			if(isNaN(parseFloat(comptNPCNAPS)) || isNaN(parseFloat(comptPCNAPS)) || isNaN(parseFloat(comptPECNAPS1)) || isNaN(parseFloat(totalNPCNAPS)) || isNaN(parseFloat(totalPECNAPS1)) || isNaN(parseFloat(comptPECNAPS13)) || isNaN(parseFloat(totalNPCNAPS))|| isNaN(parseFloat(totalPCNAPS)) || isNaN(parseFloat(ecartNPCNAPS))|| isNaN(parseFloat(ecartPECNAPS1))|| isNaN(parseFloat(ecartPECNAPS13)) || isNaN(parseFloat(ecartPCNAPS))
				){
				alert("Certaines valeurs sont incorrectes, veuillez vérifier. ");
				//alert("Certaines valeurs sont incorrect,veuillez vérifier. 2: "+totalNPSMIDS+" - "+totalPESMIDS1+" - "+totalPESMIDS5+" - "+totalTPE);
			 }

			else{

				$.ajax({
					type:"post",
					url:"RDC/paie/paieG/save5bCnaps.php",
					data:{
						comptNPCNAPS: parseFloat(comptNPCNAPS),
						comptPCNAPS:parseFloat(comptPCNAPS),
						comptPECNAPS1:parseFloat(comptPECNAPS1),
						comptPECNAPS13:parseFloat(comptPECNAPS13),
						totalNPCNAPS:totalNPCNAPS,
						totalPECNAPS1:totalPECNAPS1,
						totalPECNAPS13:totalPECNAPS13,
						totalPCNAPS:totalPCNAPS,
						ecartNPCNAPS:ecartNPCNAPS,
						 ecartPECNAPS1:ecartPECNAPS1,
						 ecartPECNAPS13:ecartPECNAPS13,
						 ecartPCNAPS:ecartPCNAPS
					},
						success:function(e){

					  //alert("------"+parseFloat(comptPECNAPS1)+"------"+parseFloat(comptPECNAPS13));
					
						        
							 
						}
				});
			}

				

			});



</script>


