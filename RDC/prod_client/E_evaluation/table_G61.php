<?php
    include '../../../connexion.php';
 @session_start();
 $mission_id=@$_SESSION['idMission'];
 ?>
<script>
 $(function(){
  $("#btn_tel").click(function(){
    var idChecked = [];
     $("#tbl_ech tr input[type='checkbox']:checked").each(
       function() {
		   idChecked.push($(this).attr('id'));
		   }); 
		   // alert(idChecked);
		   var valTransfert = new Array();
		   valTransfert="valTransfert=true";
		   valTransfert = valTransfert+'&listId[]='+idChecked;
		   // alert(valTransfert);
		   $.ajax({
		  type:"POST",
		  url:"RDC/prod_client/E_evaluation/GetEchant_GL.php",
		  data:valTransfert,
		  success:function(e){
		   // alert(e);
		   // $('#contenue').load("RDC/prod_client/C_regularite/table_B52.php");
		   $('#contenue_travail').load("RDC/prod_client/E_evaluation/table_new_G6.php");
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
  border-collapse:collapse;
  }
  #tet td{
   border:1px solid #ccc;
   background-color:#0074bf;
   color:#fff;
  }
  
 </style>
 <center>
 <table width="100%" height="50" style="text-align:left;">
	  <tr>
	   <td><center><label style="color:black;">REEVALUATION DES CREANCES LIBELLEES EN DEVISES											
	 </label></center></td>
	  </tr>
		<tr>
	   <td><center><b><label style="color:blue;">Veuillez selectionner les clients étrangers et changer le balance auxiliaire à cocher									
	 </label></b></center></td>
	  </tr>
 </table>

  <table id="tet">
  <tr>
   <td width="100">Compte</td>
	<td width="100">Libellé</td>
  </tr>
 </table>
 <div id="echant_GL">
  <table id="tbl_ech">
   <?php 
    $reponse=$bdd->query("select BAL_AUX_ID,BAL_AUX_COMPTE ,BAL_AUX_LIBELLE ,BAL_AUX_SOLDE from tab_bal_aux where BAL_AUX_CYCLE='G- Produits Clients' AND BAL_AUX_COMPTE like '7%' AND MISSION_ID=".$mission_id);
    while($donnees=$reponse->fetch()){
    $id=$donnees['BAL_AUX_ID'];
    $Comp=$donnees['BAL_AUX_COMPTE'];
    $libelle=$donnees['BAL_AUX_LIBELLE'];
    $sold=$donnees['BAL_AUX_SOLDE'];
      ?>
   <tr>
    <td><input type="checkbox" id="<?php echo $id;?>" value="<?php echo $id;?>" multiple='multiple' name="chackGL[]"/></td>
    <td width="100px"><?php echo $Comp;?></td>
    <td width="100px"><?php echo $libelle;?></td>
    <td width="100px"><?php echo number_format((double)$sold, 2, '.', ' ');?></td>
   </tr>
     <?php } ?>
  </table>
   
 </div> 
 <p id="btn_tel">Enregister les elements cochées</p>
 </center>