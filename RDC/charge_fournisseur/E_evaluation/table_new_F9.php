<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<script>
	
	function solde_reevalue()
	{
		var i=0;
		var nbre_ligne=$('#makacompte').val();
		//alert(nbre_ligne);
		for(i=0;i<nbre_ligne;i++){
			 var id_solde_devise=$('#id_solde_devise_'+i).val();
			 var id_taux=$('#id_taux_'+i).val();
			 var res=id_solde_devise*id_taux;
			 document.getElementById("id_solde_reevalue_"+i).value=res;
		}
	}
	function difference()
	{
		var i=0;
		var nbre_ligne=$('#makacompte').val();
		//alert(nbre_ligne);
		for(i=0;i<nbre_ligne;i++){
			 var id_solde_reevalue=$('#id_solde_reevalue_'+i).val();
			 var id_solde_comptable=$('#id_solde_comptable_'+i).val();
			 var res2=id_solde_reevalue-id_solde_comptable;
			 document.getElementById("id_difference_"+i).value=res2;
		}
	}
</script>
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
<div align="center">
<label>REEVALUATION DES DETTES LIBELLEES EN DEVISES</label>
<div style="overflow:auto;height:360px;">
<table width="800px" id="tet">
	<tr id="tettd">
		<td width="100px" size="50">Compte</td>
		<td width="100px" size="50">Solde en devises(1)</td>
		<td width="100px" size="50">Devise</td>
		<td width="100px" size="50">Taux de clotures(2)</td>
		<td width="100px" size="50"><input type ="button" onclick="solde_reevalue()" value="Solde reevalue(3)=(1)*(2)"></td>
		<td width="100px" size="50">Solde comptable(4)</td>
		<td width="100px" size="50"><input type ="button" onclick="difference()" value="Différence(5)=(3)-(4)"></td>
		<td width="100px" size="50">Observations</td>
	</tr>

	<?php
		include '../../../connexion.php';
		
		$reponse=$bdd->query("select ECH_BAL_AUX_ID,ECH_BAL_AUX_COMPTE,ECH_BAL_AUX_LIBELLE,ECH_BAL_AUX_SOLDE 
		from  tab_echantillon_bal_aux
		where ECH_BAL_AUX_CYCLE='F- Charges Fournisseurs' AND ECH_BAL_AUX_COMPTE like '40%' AND MISSION_ID=".$mission_id);
		
		$compte=0;

		while($donnees=$reponse->fetch()){
	?>
		<tr bgcolor="white">
			
			<td width="100px" size="50"><input type="text" id="id_compte_<?php echo $compte?>" value="<?php echo $donnees['ECH_BAL_AUX_COMPTE'];?>"/></td>
			<td width="100px" size="50"><input type="text" id="id_solde_devise_<?php echo $compte?>" value=""/></td>
			<td width="100px" size="50"><input type="text" id="id_devise_<?php echo $compte?>" value=""/></td>
			<td width="100px" size="50"><input type="text" id="id_taux_<?php echo $compte?>" value=""/></td>
			<td width="100px" size="50"><input type="text" id="id_solde_reevalue_<?php echo $compte?>" value=""/></td>
			<td width="100px" size="50"><input type="text" id="id_solde_comptable_<?php echo $compte?>" value=""/></td>
			<td width="100px" size="50"><input type="text" id="id_difference_<?php echo $compte?>" value=""/></td>
			<td width="100px" size="50"><input type="text" id="id_observation_<?php echo $compte?>" value=""/></td>
		</tr>
			<?php
				$compte++;
				}
			?>
			 <input type ="text" id="makacompte" value="<?php echo $compte?>" style="display:none;"/>
</table>

</div>
</div>