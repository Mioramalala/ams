<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<style>
#tet{
  margin-left:-17px;
  margin-top:20px;
  border-collapse:collapse;
  }
#tettd{
   border:1px solid #ccc;
   background-color:#0074bf;
   color:#fff;
  }

 </style>
<!-----------------------------------------------table 1---------------------------------------->
<center>
	<label>VALIDATION DES CLIENTS A SOLDE CREDITEUR	</label>
</center>
<div style="height:500px;">
<table width="100%" id="tet">
	<tr id="tettd">
		<td width="100">Compte</td>
		<td width="100">Libellé</td>
		<td width="100">Solde Créditeur(1)</td>
		<td width="100">Justification</td>
		<td width="100">Observations</td>
		<td width="100">Renvoi</td>
	</tr>
</table>
<div style="overflow:auto;height:100%;width:100%;">
<table width="100%">
	<?php
	$res=0;
		include '../../../connexion.php';
		
		$reponse=$bdd->query('select BAL_AUX_COMPTE,BAL_AUX_LIBELLE,BAL_AUX_SOLDE from tab_bal_aux where BAL_AUX_COMPTE like "411%" AND BAL_AUX_CYCLE="G- Produits Clients" AND MISSION_ID='.$mission_id);
		$compte=$b=$a=0; 
		while($donnees=$reponse->fetch()){
			$import3=$donnees['BAL_AUX_SOLDE'];
				if($import3<0){
				$a=$donnees['BAL_AUX_COMPTE'];
				$b=$donnees['BAL_AUX_LIBELLE'];
				$res=$import3;
						
				}
		?>
			<tr bgcolor="white">
				<td width="100"><input type="text" id="id_compte_<?php echo $compte?>" value="<?php echo $a;?>"/></td>
				<td width="100"><input type="text" id="id_libelle_<?php echo $compte?>" value="<?php echo $b;?>"/></td>
				<td width="100"><input type="text" id="id_res_<?php echo $compte?>" value="<?php echo number_format((double)$res, 2, '.', ' ');?>"/></td>
				<td width="100"><input type="text" id="id_justification_<?php echo $compte?>" value=""/></td>
				<td width="100"><input type="text" id="id_observation_<?php echo $compte?>" value=""/></td>
				<td width="100">
					<div id="id_upload<?php echo $compte?>">
						<form method = "post" enctype="multipart/form-data" action = "RDC/prod_client/C_regularite/uploader_fichier_G4.php">
								<input type = "file" id = "file_G4" name = "file_G4"/> 
								<input type="submit" name="gl_gen2" value="Upload" id = "id_gl_gen"/><br/><br/>
						</form>
					</div>
				</td>
			</tr>
			<?php
   
    }
   ?>
   <input type ="text" id="makacompte" value="<?php echo $compte ?>" style="display:none;"/>
   </table>
  </div>
</div>