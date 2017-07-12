<?php
 @session_start();
  include '../../../connexion.php';
 $mission_id=@$_SESSION['idMission'];
 ?>
<script>
  $(function(){
  $("#btn_tel").click(function(){
			valTransfert=$("#tbl_ech tr input[type='checkbox']:checked").serialize();
      alert(valTransfert);
		   $.ajax({
			  type:"POST",
			  url:"/RDC/charge_fournisseur/G_juridique/GetEchant.php",
			  data:valTransfert,
			  success:function(e){
			  alert(e);
				   $('#contenue_travail').load("RDC/charge_fournisseur/G_juridique/table_new_F6.php");
			  }
			});
		});
 });
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
  height:220px;
  width:800px;
  }
  #btn_tel{
  border:1px solid #ccc;
  background-color:#efefef;
  border-radius:8px;
  width:300px;
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
  }
  #tet td{
   border:1px solid #black;
   background-color:#0074bf;
   color:#fff;
  }
  
 </style>
 <center>
 <table width="100%" height="50" style="text-align:left;">
	  <tr>
	   <td><center><label style="color:black;">REGULARITE DES ENREGISTREMENTS </label></center></td>
	  </tr>
		<tr>
	   <td><center><b><label style="color:blue;">Veuillez séléctionner l'échantillon </label></b></center></td>
	  </tr>
 </table>
  <table style="border:1px solid #blue;width:900px">
  <tr id="tet">
   <td width="20px"></td>
   <td width="80px">Compte</td>
   <td width="240px">Libellé</td>
   <td width="80px">Débit</td>
   <td width="80px">Crédit</td>
   <td width="80px">Solde</td>
  </tr>
   </table>
   <div style="height:400px;overflow:auto;">
  <table id="tbl_ech" style="width:900px;">
   <?php 
    //$reponse=$bdd->query("select IMPORT_ID,IMPORT_COMPTES ,IMPORT_INTITULES ,IMPORT_DEBIT,IMPORT_CREDIT, IMPORT_SOLDE from tab_importer where IMPORT_CYCLE='F- Charges Fournisseurs' AND IMPORT_COMPTES like '6%' AND MISSION_ID=".$mission_id);
    $reponse = $bdd->query("SELECT `GL_GENC6_ID`, `GL_GENC6_COMPTES`,`GL_GENC6_LIBELLE`,`GL_GENC6_DEBIT`,`GL_GENC6_CREDIT`,`GL_GENC6_SOLDE` FROM `tab_gl_genc6` WHERE `GL_GENC6_CYCLE`='F- Charges Fournisseurs' AND `MISSION_ID`=".$mission_id);
    while($donnees=$reponse->fetch()){
    $id_bl_gen=$donnees['GL_GENC6_ID'];
    $Comp=$donnees['GL_GENC6_COMPTES'];
    $libelle=$donnees['GL_GENC6_LIBELLE'];
    $debit=$donnees['GL_GENC6_DEBIT'];
    $crd=$donnees['GL_GENC6_CREDIT'];
    $sold=$donnees['GL_GENC6_SOLDE'];
  ?>
   <tr>
    <td width="20px"><input type="checkbox" id="<?php echo $id_bl_gen;?>" value="<?php echo $id_bl_gen;?>" multiple='multiple' name="listId[]"/></td>
    <td width="80px"><?php echo $Comp;?></td>
    <td width="240px"><?php echo $libelle;?></td>
    <td width="80px"><?php echo number_format((double)$debit, 2, '.', ' ')?></td>
    <td width="80px"><?php echo number_format((double)$crd, 2, '.', ' ')?></td>
    <td width="80px"><?php echo number_format((double)$sold, 2, '.', ' ')?></td>
   </tr>
   <?php } ?>
  </table>
   <p id="btn_tel">Enregister les éléments cochés</p>
   </div>
 </div> 
 </center>
 <div id="progressbarRDC" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
</div>