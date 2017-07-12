<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
include '../../../connexion.php';


?>
<div align="center">
<label>TAUX D'AMORTISSEMENT</label></div>
<p>Il est rappelé :
	<br/> - que la base admise pour le calcul de la partie déductible de l'annuité d'amortissement pour  les aéronefs, non destinés en permanence à la  location ou au  transport à titre onéreux, est fixée à 50 % de la valeur d’acquisition.			
						
	<br/> -  que l’annuité d’amortissement des immeubles donnés en location mais n’appartenant pas à une société immobilière ne doit  pas excéder 15% des loyers bruts perçus annuellement sur ces immeubles.			
</p>
<div style="overflow:auto;height:360px;">

<form id="frm_juridique">
<table width="100%" border="1">
	<tr bgcolor="#ccc">
			<td width="7%" >Rubrique</td>
			<td width="7%">Taux d'amort. Appliqué</td>
			<td width="7%">Taux maxima admis fiscalement</td>
			<td width="7%">Obs.</td>
	</tr>
	
<?php
$req=$bdd->query("SELECT * FROM tblrdc_rublibtauxammorti ");

while ($donnees=$req->fetch()) 
{
	?>
	<tr>
		<td width="7%" >


		<?php

						if($donnees["titreP"]=="P") 
						{
							?>
							<b><?php print (stripcslashes($donnees["libelle"])) ; ?></b>
							<?php 
						}
						else
						{
							print (stripcslashes($donnees["libelle"])) ;
						}

						$id_rubbrique=$donnees["id_rubbrique"]; 	
						$req_=$bdd->query("SELECT * FROM tblrdc_tauxammorti where MISSION_ID='$mission_id' and  id_rubbrique='$id_rubbrique'");
						$don =$req_->fetch()

						?>
						</td>
						<td width="7%"><?php
						    if($donnees["saisie"]==1)
						    {
						    	?><input name="tauxammorti[]"   value="<?php print ($don["taux_amortappliquer"]); ?>"><?php
							}
						else
						{
							?>
							<input  type="hidden" value="" name="tauxammorti[]" type="hidden" >
							<?php
						}
					 ?>
					 <input type="hidden" value="<?php print ($id_rubbrique); ?>" name="id_rubbrique[]"  >
					</td>
				<td width="7%"><?php print (stripcslashes($donnees["tauxmax_admisfisc"])) ; ?></td>
				<td width="7%"><textarea name="obs_[]"><?php print ($don["obs"]); ?></textarea></td>
	</tr>
	<?php
}
 
?>
</table>
</form>
</div>
</div>