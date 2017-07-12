<?php
    include '../../../connexion.php';
 @session_start();
 $mission_id=@$_SESSION['idMission'];
  $cycle = "F- Charges Fournisseurs";
 ?>
<script>
 $(function(){
  $("#btn_tel").click(function(){
  //alert("coco");
 // $('#progressbarRDC').show();
  		var data = "";
  		var i = 0;
      //var idChecked = [];
     $("#tbl_ech tr input[type='checkbox']:checked").each(
       function() 
       {
				if(i > 0) data += "/";
          else i++;
          data += this.value
		   //idChecked.push($(this).attr('id'));
		   }); 
		   //alert(data);
		   //var valTransfert = data;
		  // valTransfert="valTransfert=true";
		  // valTransfert = valTransfert+'&listId[]='+idChecked;
		   // alert(valTransfert);
		   $.ajax({
					    type:"POST",
					  	url:"RDC/charge_fournisseur/F_rattachement/EnregistrementEchantilllion.php",
					  	data: {
			            comptes  : data,
			            cycle    : '<?php echo $cycle; ?>',
			          },
					    success:function(e){
					      //alert(e);
					     $('#contenue_travail').load("RDC/charge_fournisseur/F_rattachement/table_new_F61.php");
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
		   <td><center><label style="color:black;">VERIFICATION DE L'EXHAUSTIVITE / REGULARITE DES ENREGISTREMENTS								
			 </label></center></td>
		  </tr>
			<tr>
		   <td><center><b><label style="color:blue;">Veuillez selectionner l'echantillon										
		 </label></b></center></td>
		  </tr>
	 </table>
 
  
    <div style="height:400px;overflow:auto;">
	<table style="border:1px solid #blue;width:900px">
  <tr id="tet">
   <td width="20px"></td>
   <td width="80px">Compte</td>
   <td width="60px">Date</td>
   <td width="60px">Journal</td>
   <td width="100px">Reference</td>
   <td width="240px">Libellé</td>
   <td width="80px">Débit</td>
   <td width="80px">Crédit</td>
   <td width="80px">Solde</td>
  </tr>
   </table>
   <div style="height:400px;overflow:auto;">
  <table id="tbl_ech" style="width:900px;">
  <?php 
    $query = "select 1 AS grand_livre,GL_GEN_ID AS id,GL_GEN_COMPTES AS compte,GL_GEN_DATE AS date,GL_GEN_JL AS jl,GL_GEN_REF AS ref, GL_GEN_LIBELLE AS libelle,
    GL_GEN_DEBIT AS debit,GL_GEN_CREDIT AS credit,GL_GEN_SOLDE AS solde,GL_GEN_CYCLE AS cycle 
    from tab_gl_gen where 
    GL_GEN_CYCLE='".$cycle."' AND MISSION_ID=".$mission_id;

    for ($i = 2; $i < 8; $i++) { 
      $query .= " UNION select ".$i." AS grand_livre,GL_GENC".$i."_ID AS id,GL_GENC".$i."_COMPTES AS compte,GL_GENC".$i."_DATE AS date,GL_GENC".$i."_JL AS jl,GL_GENC".$i."_REF AS ref, GL_GENC".$i."_LIBELLE AS libelle,
      GL_GENC".$i."_DEBIT AS debit,GL_GENC".$i."_CREDIT AS credit,GL_GENC".$i."_SOLDE AS solde,GL_GENC".$i."_CYCLE AS cycle
       from tab_gl_genc".$i." where GL_GENC".$i."_CYCLE='".$cycle."' AND MISSION_ID=".$mission_id;
    }

    $reponse=$bdd->query($query);
    while($donnees=$reponse->fetch()){
    $gl      = $donnees['grand_livre'];
    $id      = $donnees['id'];
    $Comp    = $donnees['compte'];
    $date    = $donnees['date'];
    $jl      = $donnees['jl'];
    $ref     = $donnees['ref'];
    $libelle = $donnees['libelle'];
    $debit   = $donnees['debit'];
    $crd     = $donnees['credit'];
    $sold    = $donnees['solde'];



     $sql = "select COUNT(*) AS nb 
     from tab_ehantillon_gl 
     where GL_GEN_CYCLE= :cycle  AND id_mission= :mission AND ref_ech_gl=:ref";

  $rep = $bdd->prepare($sql);
  $rep->execute(array(
    "cycle"    => $cycle,
    //"objectif" => $objectif,
    "ref"  => $ref,
    "mission"  => $mission_id));

  $checkref = 0;
  if($don = $rep->fetch()) 
    $checkref = $don['nb'];
?>

   <tr>
    <td width="20px"><input

     <?php if($checkref!=0)
            {
               ?>  checked 
              <?php
            }
     ?> type="checkbox" id="<?php echo $id;?>" value="<?php echo $gl.'-'.$id;?>" multiple='multiple' name="listId[]"/></td>
    <td width="80px"><?php echo $Comp;?></td>
    <td width="60px"><?php echo $date;?></td>
    <td width="60px"><?php echo $jl;?></td>
    <td width="100px"><?php echo $ref;?></td>
    <td width="240px"><?php echo $libelle;?></td>
    <td width="80px"><?php echo number_format((double)$debit, 2, '.', ' ')?></td>
    <td width="80px"><?php echo number_format((double)$crd, 2, '.', ' ')?></td>
    <td width="80px"><?php echo number_format((double)$sold, 2, '.', ' ')?></td>
   </tr>
   <?php  } ?>
  </table>
   </div>
 </div> 
 <p id="btn_tel">Enregistrer les éléments cochés</p>
 </center>
