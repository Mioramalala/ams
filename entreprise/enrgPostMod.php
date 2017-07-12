<?php
	include '../connexion.php';
	$idEntre=$_POST["d"];
	$id=$_POST["i"];
	$nom=$_POST["a"];
	$Titulaire=$_POST["b"];
	

	$req= $bdd-> prepare('UPDATE tab_poste_cle SET  POSTE_CLE_NOM=:nom,POSTE_CLE_TITULAIRE=:Tit,ENTREPRISE_ID=:idEntre
	 WHERE POSTE_CLE_ID='.$id);
	$req->execute(array(
	'nom'=>$nom,
	'Tit'=>$Titulaire,
	'idEntre'=>$idEntre

	));
?>
<h3>Liste des postes clés de l'entreprise</h3>
				
			<table id="list_poste">	
						<tr>
							<td></td>
							<td><h4> Poste</h4></td>
							<td><h4> Titulaire</h4> </td>
						</tr>
						
				<?php
					$sqlNbrPo='SELECT COUNT(POSTE_CLE_ID) AS nbrPost FROM  tab_poste_cle WHERE ENTREPRISE_ID='.$_POST['d'];
					 $reponseNbrPo=$bdd->query($sqlNbrPo);
					 $donneeNbr=$reponseNbrPo->fetch();
					 $nbrPo = $donneeNbr["nbrPost"];
				
					 $sqlListP='SELECT POSTE_CLE_ID,POSTE_CLE_NOM,POSTE_CLE_TITULAIRE FROM  tab_poste_cle WHERE ENTREPRISE_ID='.$_POST['d'];
					 
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