<?php
    include './../../../connexion.php';
 @session_start();
 $mission_id=@$_SESSION['idMission'];
?>
<script>
 $(function(){
  $(".btn_retour").click(function(){
	$('#contenue').load("RA/circularisation/circularisation.php");
  });
  $("#btn_tel").click(function(){
  //alert("coco");
 // $('#progressbarRA').show();
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
		  url:"RA/circularisation/avocat/GetEchant_GL.php",
		  data:valTransfert,
		  success:function(e){
		   //alert(e);
		   $('#contenue').load("RA/circularisation/avocat/table_new_avocat.php");
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
  color:#fff; 
  }
   
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
 <table width="100%" height="50" bgcolor="#00698d" style="text-align:left;">
	<tr>
		<td style="color:white"><center>AVOCAT</center></td>
	</tr>
</table>
 <center>
	 <table width="100%" height="50" style="text-align:left;">
		<tr>
		  <td><center><b><label style="color:blue;">Sélectionner avocat à circulariser									
		 </label></b></center></td>
		 </tr>
	 </table>
 
  <table style="border:1px solid #blue;width:900px">
	  <tr id="tet">
	    <td width="20px"></td>
		<td width="300px">Compte</td>
		<td width="300px">Annexe</td>
		<td width="280px">Solde</td>
	  </tr>
  </table>
    <div style="height:300px;overflow:auto;">
	<table id="tbl_ech" style="width:900px;">
	<?php 
	$reponse=$bdd->query("select BAL_AUX_ID,BAL_AUX_COMPTE,BAL_AUX_LIBELLE,BAL_AUX_SOLDE from tab_bal_aux where BAL_AUX_COMPTE like '40%' AND MISSION_ID=".$mission_id);
		while($donnees=$reponse->fetch()){
		$id=$donnees['BAL_AUX_ID'];
		$Comp=$donnees['BAL_AUX_COMPTE'];
		$annexe=$donnees['BAL_AUX_LIBELLE'];
		$sold=$donnees['BAL_AUX_SOLDE'];
	?>
	   <tr>
			<td width="20px"><input type="checkbox" id="<?php echo $id;?>" value="<?php echo $id;?>" multiple='multiple' name="chackGL[]"/></td>
			<td width="300px"><?php echo $Comp;?></td>
			<td width="300px"><?php echo $annexe;?></td>
			<td width="280px"><?php echo $sold;?></td>
	   </tr>
	   <?php } ?>
	  </table>
   </div>
 </div> 
  </center>
  
	<p id="btn_tel">Enregistrer les éléments cochées</p></td>
	
 <div id="progressbarRA" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
</div>