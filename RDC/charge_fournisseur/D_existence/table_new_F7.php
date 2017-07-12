<?php
  include '../../../connexion.php';
 @session_start();
 $mission_id=@$_SESSION['idMission'];

 ?>

<script>

</script>

 
 <style>
  #tbl_ech{
  border-collapse:collapse;
  }
  #tbl_ech td{
   border:1px solid;
   background-color:#FFFAFA; 
  }
  #echant_GL{
  overflow:auto;
  height:330px;
  width:800px;
  }
  #btn_tel{
  border:1px solid #ccc;
  background-color:#efefef;
  border-radius:8px;
  width:200px;
  height:auto;
  }
  #btn_tel:hover
  {
  cursor:pointer;
  background-color:#0074bf;
  color:#fff;  }
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
 
 <table width="100%" height="50" style="text-align:left;">
	  <tr>
		   <td><center><label style="color:black;">JUSTIFICATION DES FOURNISSEURS												
			</label></center></td>
	  </tr>
 </table>
  <table width="400px" style="overflow:auto">
	  <tr id="tettd">
		  <td width="100">Compte</td>
		<td width="100">Libellé</td>
		<td width="100">Solde Créditeur(1)</td>
		<td width="100">Justification</td>
	  </tr>
   <?php 
    $reponse=$bdd->query("select ECH_BAL_AUX_ID,ECH_BAL_AUX_COMPTE,ECH_BAL_AUX_LIBELLE,ECH_BAL_AUX_SOLDE 
	from  tab_echantillon_bal_aux
	where ECH_BAL_AUX_CYCLE='F- Charges Fournisseurs' AND ECH_BAL_AUX_COMPTE like '40%' AND MISSION_ID=".$mission_id);
	$compte=0;
    while($donnees=$reponse->fetch()){
   ?>
   <tr id="tbl_ech">
      <td  width="100"><input type="text" id="id_compte_<?php echo $compte?>" value="<?php echo $donnees['ECH_BAL_AUX_COMPTE'];?>"/></td>
      <td width="100"><input type="text" id="id_libelle_<?php echo $compte?>" value="<?php echo $donnees['ECH_BAL_AUX_LIBELLE'];?>"/></td>
      <td width="100"><input type="text" id="id_solde_crediteur_<?php echo $compte?>" value="<?php echo $donnees['ECH_BAL_AUX_SOLDE'];?>"/></td>
      <td width="100"><input type="text" id="id_justification_<?php echo $compte?>" value=""/></td>
    </tr>
   <?php
   $compte++;
    }
   ?>
   </table>
  </div>
 