<?php
   include './../../../connexion.php';
 @session_start();
 $mission_id=@$_SESSION['idMission'];

 ?>

<script>
$(function(){
    // $("#btn_lettre").click(function(){
    //     $.ajax({
    //     type:"POST",
    //     url:"RA/circularisation/client/export_word.php",
    //     success:function(e){
    //         $('#contenue').load("RA/circularisation/client/export_word.php");
    //     }

    //     });
    // });
   $("#listForm").submit(function(){
      $.ajax({
         type:"POST",
         url:"RA/circularisation/client/export_word.php",
         data: $(this).serialize(),
         success:function(e){
            $('#contenue').html(e);
         }
      });
   });

   $("#btn_retour").click(function(){
      $('#contenue').load("/RA/circularisation/client/client.php");
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
  color:#fff;  
  }
  #btn_retour{
  border:1px solid #ccc;
  background-color:#efefef;
  border-radius:8px;
  width:300px;
  height:auto;
  }
  #btn_retour:hover
  {
  cursor:pointer;
  background-color:#0074bf;
  color:#fff; 
  }
  #btn_lettre{
  border:1px solid #ccc;
  background-color:#efefef;
  border-radius:8px;
  width:300px;
  height:auto;
  }
  #btn_lettre:hover
  {
  cursor:pointer;
  background-color:#0074bf;
  color:#fff; 
  }
  #lettre{
  background-color:white;
  width:1000px;
  height:550px;
  }
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
 <table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td style="color:white"><center>CLIENT</center></td>
	</tr>
</table>
<div id="corps_avocat">
   <form id="listForm" onsubmit="return false">
      <table width="900">
         <tr id="tettd">
            <td width="200px">Nom du client</td>
            <td width="300px">Nom complet</td>
            <td width="400px">Coordonnees</td>
         </tr>
	   <?php 
		// $reponse=$bdd->query("select ECH_BAL_AUX_ID,ECH_BAL_AUX_COMPTE,ECH_BAL_AUX_LIBELLE,ECH_BAL_AUX_SOLDE  
		// from tab_echantillon_bal_aux
		// where ECH_BAL_AUX_CYCLE='client' AND MISSION_ID=".$mission_id);
		// $compte=0;
		// while($donnees=$reponse->fetch()){
	   ?>
	   <!-- <tr id="tbl_ech" style="width:900px">
		  <td width="300px"><input type="text" id="id_compte_<?php echo $compte?>" value="<?php echo $donnees['ECH_BAL_AUX_COMPTE'];?>"/></td>
		  <td width="300px"><input type="text" id="id_libelle_<?php echo $compte?>" value="<?php echo $donnees['ECH_BAL_AUX_LIBELLE'];?>"/></td>
		  <td width="300px"><input type="text" id="id_solde_<?php echo $compte?>" value=" <?php echo $donnees['ECH_BAL_AUX_SOLDE'];?>"/></td>
		  
		 </tr> -->
	   <?php
	   // $compte++;
		// }
	   ?>
	   <?php 
     $compte = 0;
     foreach ($_POST['listId'] as $key => $value) { ?>
        <tr id="tbl_ech" style="width:900px">
            <td width="200px"><?= $value ?></td>
            <td><input style='width=300px' type="text" name="nom-<?php echo $compte?>"/></td>
            <td><input style='width=400px' type="text" name="coordonnees-<?php echo $compte?>"/></td>
        </tr>
     <?php 
        $compte++;
        } ?>
     
     <input type ="hidden" name='nbr' value="<?php echo $compte ?>"/>
     </table>
    
    
    <input type="submit" id="btn_lettre" value="Générer lettre circularisation">
      <p id="btn_retour"> Retour </p>
      </form>
      </div>
 