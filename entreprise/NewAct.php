<?php 
include '../connexion.php';

$nom=$_POST['a'];
$part=$_POST['b'];

$IdEntre=$_POST['d'];


$reqInsert=$bdd->prepare("INSERT INTO  tab_actionnaire (ACTIONNAIRE_NOM, 
ACTIONNAIRE_PART,ENTREPRISE_ID) VALUE (:n,:z,:r)");
$reqInsert->execute(array(
'n'=>$nom,
'z'=>$part ,
'r'=>$IdEntre
));
//echo $nom.$part.$pourc.$IdEntre;
?>

<h3> Liste des actionnaires </h3><input type="text" id="idEntre" value="<?php echo $_POST['d'];?>" style="display:none;"/>
			<table id="tblListAct">	
					<tr>
						<td></td>
						<td> Noms</td>
						<td> Parts</td>
						<td>%</td>
					</tr>
					<?php 
						///////////////////////////////////////////////////////////////////////////////////////
					$sqlP='SELECT ACTIONNAIRE_PART FROM  tab_actionnaire WHERE ENTREPRISE_ID='.$_POST['d'];
					 
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
					$sqlNbrAct='SELECT COUNT(ACTIONNAIRE_ID) AS nbrAct FROM  tab_actionnaire WHERE ENTREPRISE_ID='.$_POST['d'];
					 $reponseNbrAct=$bdd->query($sqlNbrAct);
					 $donneeNbr=$reponseNbrAct->fetch();
					 $nbrAct = $donneeNbr["nbrAct"];
				
					 $sqlListAct='SELECT ACTIONNAIRE_ID,ACTIONNAIRE_NOM,ACTIONNAIRE_PART FROM  tab_actionnaire WHERE ENTREPRISE_ID='.$_POST['d'];
					 
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
			
				echo 'Le nombre total des parts est: '.$totPart;
				
				?></h4>
			</table>
		