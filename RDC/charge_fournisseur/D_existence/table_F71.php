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
			  url:"/RDC/charge_fournisseur/D_existence/GetEchant_GL.php",
			  data:valTransfert,
			  success:function(e){
			  //alert(e);
				   $('#contenue_travail').load("RDC/charge_fournisseur/D_existence/table_new_F7.php");
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
 </style>
<!-----------------------------------------------table 1---------------------------------------->
<center>
	<label>JUSTIFICATION DES FOURNISSEURS</label>
</center>
<div style="height:100%;">
<table width="100%" id="tet">
	<thead>
		<tr id="tettd">
			<th width="20px"></th>
			<th width="150">Compte</th>
			<th width="150">Libellé</th>
			<th width="150">Solde Créditeur(1)</th>
			<th width="150">Justification</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$res=0;
			include '../../../connexion.php';
			
			$reponse=$bdd->query('select BAL_AUX_ID,BAL_AUX_COMPTE,BAL_AUX_LIBELLE,BAL_AUX_SOLDE from tab_bal_aux where BAL_AUX_COMPTE like "40%" AND BAL_AUX_CYCLE="F- Charges Fournisseurs" AND MISSION_ID='.$mission_id);
			$compte=$b=$a=0; 
			while($donnees=$reponse->fetch()){
				 $id_gl_gen=$donnees['BAL_AUX_ID'];
				$import3=$donnees['BAL_AUX_SOLDE'];
					if($import3<0){
					$a=$donnees['BAL_AUX_COMPTE'];
					$b=$donnees['BAL_AUX_LIBELLE'];
					$res=$import3;
							
					}
			?>
				<tr bgcolor="white">
					 <td width="20px"><input type="checkbox" id="<?php echo $id_gl_gen;?>" value="<?php echo $id_gl_gen;?>" multiple='multiple' name="listId[]"/ style="margin-left:5px;"></td>
					<td width="150"><input type="text" id="id_compte_<?php echo $compte?>" value="<?php echo $a;?>"/></td>
					<td width="150"><input type="text" id="id_libelle_<?php echo $compte?>" value="<?php echo $b;?>"/></td>
					<td width="150"><input type="text" id="id_res_<?php echo $compte?>" value="<?php echo number_format((double)$res, 2, '.', ' ');?>"/></td>
					<td width="150"><input type="text" id="id_justification_<?php echo $compte?>" value=""/></td>
				</tr>
				<?php
	   
		}
	   ?>
	   <input type ="text" id="makacompte" value="<?php echo $compte ?>" style="display:none;"/>
	</tbody>
</table>
  </div>
</div>
<p id="btn_tel">Enregister les éléments cochés</p>