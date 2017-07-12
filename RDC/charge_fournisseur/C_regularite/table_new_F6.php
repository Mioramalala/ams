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
		   <td><center><label style="color:black;">VERIFICATION DE L'EXHAUSTIVITE / REGULARITE DES ENREGISTREMENTS												
			</label></center></td>
	  </tr>
 </table>
  <table width="300px" style="overflow:auto">
	  <tr id="tettd">
		   <td width="5px">Compte</td>
		   <td width="5px">Date</td>
		   <td width="5px">Journal</td>
		   <td width="5px">Reference</td>
		   <td width="5px">Libellé</td>
		   <td width="5px">Débit</td>
		   <td width="5px">Crédit</td>
		   <td width="5px">Solde</td>
		   
			<td width="5px">Pointage</td>
		   <td width="5px">"Régularité des PJ (20.06.18)"</td>
			<td width="5px">BC</td>
		   <td width="5px">BL</td>
		   <td width="5px">Observations</td>
		   <td width="5px">Renvoi</td>
	  </tr>
   <?php 
    $reponse=$bdd->query("select id_echantillon_GL,compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,debit_ech_gl,crd_ech_gl,sold_ech_gl 
	from  tab_ehantillon_gl
	where GL_GEN_CYCLE='F- Charges Fournisseurs' AND id_mission=".$mission_id);
	$compte=0;
    while($donnees=$reponse->fetch()){
   ?>
   <tr id="tbl_ech">
 
      <td  width="5px"><input width="5px" type="text" id="id_compte_<?php echo $compte?>" value="<?php echo $donnees['compt_ech_gl'];?>"/></td>
      <td width="5px"><input width="5px" type="text" id="id_date_<?php echo $compte?>" value="<?php echo $donnees['date_ech_gl'];?>"/></td>
      <td width="5px"><input width="5px" type="text" id="id_jl_<?php echo $compte?>" value="<?php echo $donnees['journal_ech_gl'];?>"/></td>
      <td width="5px"><input width="5px" type="text" id="id_ref_<?php echo $compte?>" value="<?php echo $donnees['ref_ech_gl'];?>"/></td>
      <td width="5px"><input width="5px" type="text" id="id_libelle_<?php echo $compte?>" value="<?php echo $donnees['libelle_ech_gl'];?>"/></td>
      <td width="5px"><input width="5px" type="text" id="id_d_<?php echo $compte?>" value="<?php echo $donnees['debit_ech_gl'];?>"/></td>
      <td width="5px"><input width="5px" type="text" id="id_c_<?php echo $compte?>" value="<?php echo $donnees['crd_ech_gl'];?>"/></td>
      <td width="5px"><input width="5px"type="text" id="id_solde_<?php echo $compte?>" value=" <?php echo $donnees['sold_ech_gl'];?>"/></td>
	  
	   <td width="5px"><input width="5px" type="text" id="id_pointage_<?php echo $compte?>" value=""/></td>
	   <td width="5px"><input width="5px" type="text" id="id_reg_<?php echo $compte?>" value=""/></td>
	   <td width="5px"><input width="5px" type="text" id="id_bc_<?php echo $compte?>" value=""/></td>
	   <td width="5px"><input width="5px" type="text" id="id_bl_<?php echo $compte?>" value=""/></td>
	   <td width="5px"><input width="5px" type="text" id="id_observation_<?php echo $compte?>" value=""/></td>
	   <td width="5px"><input width="5px" type="text" id="id_renvoie_<?php echo $compte?>" value=""/></td>
     </tr>
   <?php
   $compte++;
    }
   ?>
   </table>
  </div>
 