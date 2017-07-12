<?php 
	include '../connexion.php';
	$id=$_POST['a'];
	$idEntre=$_POST['b'];
	//echo $id;
	
	
$bdd->exec("DELETE FROM tab_actionnaire WHERE ACTIONNAIRE_ID=".$id);


?>

<h3> Liste des actionnaires </h3><input type="text" id="idEntre" value="<?php echo $idEntre;?>" style="display:none;"/>
			<table id="tblListAct">	
					<tr>
						<td></td>
						<td> Noms</td>
						<td> Parts</td>
						<td><center>%</center></td>
					</tr>
					<?php 
						///////////////////////////////////////////////////////////////////////////////////////
					$sqlP='SELECT ACTIONNAIRE_PART FROM  tab_actionnaire WHERE ENTREPRISE_ID='.$idEntre;
					 
					 $reponse=$bdd->query($sqlP);
					 $totPart=0;
					 $poucenrage=0;
					 while($d=$reponse->fetch()){
						$partAc=$d["ACTIONNAIRE_PART"];
						$totPart=$totPart+$partAc;
					
					}	
						
						//////////////////////////////////////////////////////////////////////////////////////
						?>
					
					
			<?php
					$sqlNbrAct='SELECT COUNT(ACTIONNAIRE_ID) AS nbrAct FROM  tab_actionnaire WHERE ENTREPRISE_ID='.$idEntre;
					 $reponseNbrAct=$bdd->query($sqlNbrAct);
					 $donneeNbr=$reponseNbrAct->fetch();
					 $nbrAct = $donneeNbr["nbrAct"];
				
					 $sqlListAct='SELECT ACTIONNAIRE_ID,ACTIONNAIRE_NOM,ACTIONNAIRE_PART FROM  tab_actionnaire WHERE ENTREPRISE_ID='.$idEntre;
					 
					 $reponseAct=$bdd->query($sqlListAct);
					
					 $comp=0;
					 while($donneeAct=$reponseAct->fetch()){
						$IdAc=$donneeAct["ACTIONNAIRE_ID"];
						$nomAc=$donneeAct["ACTIONNAIRE_NOM"];
						$partAc=$donneeAct["ACTIONNAIRE_PART"];
						//$PourcAc=$donneeAct["ACTIONNAIRE_POURCENTAGE"];
						
					
				?>
					
						<tr>
							<td><input type="radio" id="radio<?php echo $comp;?>" name="rdName" value="<?php echo $IdAc;?>" onChange="modIf()"/></td>
							<td><?php echo $nomAc;?> </td>
							<td><?php echo $partAc;?></td>
							<!--td><?php //echo $PourcAc;?></td-->
							<td><?php 
								$poucenrage=(100*$partAc)/$totPart;
								echo $poucenrage;
							?></td>
						</tr>
					
				<?php
				$comp++;
				}
				?>
				<h4 style="color:#fff;"><?php
				// amboarina condition de assina effet raha ts @lony; jquery no anaovana azy atao .css//
			
				echo 'Le nombre total des part est: '.$totPart;
				
				?></h4>
			
			</table>
			
		
			