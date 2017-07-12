<?php
@session_start();

$mission_id=@$_SESSION['idMission'];
?>
<script>
  $(function(){
  $("#btn_tel").click(function(){
			valTransfert=$("#tbl_ech tr input[type='checkbox']:checked").serialize();
		   $.ajax({
			  type:"POST",
			  url:"/RDC/charge_fournisseur/E_evaluation/GetEchant_GL.php",
			  data:valTransfert,
			  success:function(e){
			  //alert(e);
				   $('#contenue_travail').load("RDC/charge_fournisseur/E_evaluation/table_new_F9.php");
			  }
			});
		});
 });
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
 </style>
<!-----------------------------------------------table 1---------------------------------------->
<center>
	<label>REEVALUATION DES DETTES LIBELLEES EN DEVISES</label>
</center>
<div style="height:700px;">
<table width="700px" id="tet">
	<tr id="tettd">
		<td width="100"></td>
		<td width="200">Compte</td>
		<td width="200">Libellé</td>
		<td width="200">Solde</td>
	</tr>
</table>
<div style="overflow:auto;height:360px;width:700px;">
<table id="tbl_ech" style="width:700px;">

	<?php
	$res=0;
		include '../../../connexion.php';
		
		$reponse=$bdd->query('select BAL_AUX_ID,BAL_AUX_COMPTE,BAL_AUX_LIBELLE,BAL_AUX_SOLDE from tab_bal_aux where BAL_AUX_COMPTE like "40%" AND BAL_AUX_CYCLE="F- Charges Fournisseurs" AND MISSION_ID='.$mission_id);
		$compte=$b=$a=0; 
		while($donnees=$reponse->fetch()){
			 $id_gl_gen=$donnees['BAL_AUX_ID'];
			 $num_compte=$donnees['BAL_AUX_COMPTE'];
			 $libelle=$donnees['BAL_AUX_LIBELLE'];
			$solde=$donnees['BAL_AUX_SOLDE'];
		?>
			<tr bgcolor="white">
				 <td width="100"><input type="checkbox" id="<?php echo $id_gl_gen;?>" value="<?php echo $id_gl_gen;?>" multiple='multiple' name="listId[]"/></td>
				<td width="200"><input type="text" id="id_compte_<?php echo $compte?>" value="<?php echo $num_compte;?>"/></td>
				<td width="200"><input type="text" id="id_libelle_<?php echo $compte?>" value="<?php echo $libelle;?>"/></td>
				<td width="200"><input type="text" id="id_res_<?php echo $compte?>" value="<?php echo number_format((double)$solde, 2, '.', ' ');?>"/></td>
			</tr>
			<?php
   
    }
   ?>
   <input type ="text" id="makacompte" value="<?php echo $compte ?>" style="display:none;"/>
   </table>
  </div>
  <center><p id="btn_tel">Enregister les éléments cochés</p><center>
</div>
