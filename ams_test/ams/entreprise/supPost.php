<?php 

	include '../connexion.php';
	$id=$_POST['a'];
	$idEntre=$_POST['b'];
	//echo $id;
	
	
$bdd->exec("DELETE FROM  tab_poste_cle WHERE POSTE_CLE_ID=".$id);




?>
				<h3>Liste des postes clés de l'entreprise</h3>
				
			<table id="list_poste">	
						<tr>
							<td></td>
							<td><h4> Poste</h4></td>
							<td><h4> Titulaire</h4> </td>
						</tr>
						
				<?php
					$sqlNbrPo='SELECT COUNT(POSTE_CLE_ID) AS nbrPost FROM  tab_poste_cle WHERE ENTREPRISE_ID='.$idEntre;
					 $reponseNbrPo=$bdd->query($sqlNbrPo);
					 $donneeNbr=$reponseNbrPo->fetch();
					 $nbrPo = $donneeNbr["nbrPost"];
				
					 $sqlListP='SELECT POSTE_CLE_ID,POSTE_CLE_NOM,POSTE_CLE_TITULAIRE FROM  tab_poste_cle WHERE ENTREPRISE_ID='.$idEntre;
					 
					 $reponseP=$bdd->query($sqlListP);
					 $comp2=0;
					 while($donneeP=$reponseP->fetch()){
						$idposte=$donneeP["POSTE_CLE_ID"];
						$nomP=$donneeP["POSTE_CLE_NOM"];
						$Tit=$donneeP["POSTE_CLE_TITULAIRE"];
						
				?>
					
						<tr>
							<td><input type="radio" id="radio<?php echo $comp2;?>" name="rdName" value="<?php echo $idposte;?>" onChange="modPost()"/></td>
							<td><?php echo $nomP;?> </td>
							<td><?php echo $Tit;?> </td>
							
						</tr>
					
				<?php
				$comp2++;
				}
				?>
			</table>