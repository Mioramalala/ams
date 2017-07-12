<?php
 @session_start();
		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
 
 
 /*
 if some day need the sql back-up to active, just use the following variable
 */
 $backup_sql="";
 
 /*
 Agent de alertant l'utilisateur qu'il à été deconnécté
 */
 
include "$project_path/agent_connex_detection.php";
include "$project_path/connexion.php";


 $mission_id=@$_SESSION['idMission'];

  $cycle = "B- Immobilisations incorporelles et corporelles";
  $objectif = "B1";

  $Revoir_echantillon=@$_GET["Revoir_echantillon"];

?>
<script>
 $(function(){
  $("#btn_tel").click(function(){
		   //valTransfert=$("#tbl_ech tr input[type='checkbox']:checked").serialize();
       var data = "";
       var i = 0;
       $("#tbl_ech tr input[type='checkbox']:checked").each(function() {
          if(i > 0) data += "/";
          else i++;
          data += this.value;
       });
       
		  $.ajax({
    		  type:"POST",
    		  url:"RDC/enregistrerEchant_GL.php",
    		  data: {
            comptes  : data,
            cycle    : '<?php echo $cycle; ?>',
            objectif : '<?php echo $objectif; ?>'
          },
    		  success:function(e){
    		   // $('#contenue').load("RDC/immobilisationCorpIncorp/C_regularite/table_B52.php");
    		   $('#contenue_travail').load("RDC/immobilisationCorpIncorp/B_exhaustivite/table_new_B6.php");
          },
          error : function(e) {
            alert("Error : " + e);
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
<?php
  
  $sql = "select COUNT(*) AS nb from tab_ehantillon_gl where GL_GEN_CYCLE= :cycle AND objectif = :objectif AND id_mission= :mission";

  $reponse = $bdd->prepare($sql);
  $reponse->execute(array(
    "cycle"    => $cycle,
    "objectif" => $objectif,
    "mission"  => $mission_id
  ));

  $count = 0;
  if($donnee = $reponse->fetch()) 
    $count = $donnee['nb'];

  if($count == 0 ||  $Revoir_echantillon=="retourechant") {
?>

 <center>
 <table width="100%" height="50" style="text-align:left;">
	  <tr>
	   <td><center><label style="color:black;">VERIFICATION DE L'EXHAUSTIVITE / REGULARITE DES ENREGISTREMENTS </label></center></td>
	  </tr>
		<tr>
	   <td><center><b><label style="color:blue;">Veuillez selectionner l'echantillon </label></b></center></td>
	  </tr>
 </table>
  <table style="border:1px solid #blue;width:900px;">
      <tr colspan="9" >
          <td><input style="height:40px;background:#00698d;font-size: 18px;color:#fff " id="btn_tel" value="Enregister les éléments cochés"></td>
      </tr>
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
    $query = "
	(select
		1 AS grand_livre,
		GL_GEN_ID AS id,
		GL_GEN_COMPTES AS compte,
		GL_GEN_DATE AS date,
		GL_GEN_JL AS jl,
		GL_GEN_REF AS ref, 
		GL_GEN_LIBELLE AS libelle,
		GL_GEN_DEBIT AS debit,
		GL_GEN_CREDIT AS credit,
		GL_GEN_SOLDE AS solde,
		GL_GEN_CYCLE AS cycle
	from
		tab_gl_gen
	where
		GL_GEN_CYCLE='".$cycle."' AND
		MISSION_ID=".$mission_id."
	ORDER BY
		id)
	";

    for ($i = 2; $i < 8; $i++) { 
		$query .= "
			UNION
		(select
			".$i." AS grand_livre,
			GL_GENC".$i."_ID AS id,
			GL_GENC".$i."_COMPTES AS compte,
			GL_GENC".$i."_DATE AS date,
			GL_GENC".$i."_JL AS jl,
			GL_GENC".$i."_REF AS ref,
			GL_GENC".$i."_LIBELLE AS libelle,
			GL_GENC".$i."_DEBIT AS debit,
			GL_GENC".$i."_CREDIT AS credit,
			GL_GENC".$i."_SOLDE AS solde,
			GL_GENC".$i."_CYCLE AS cycle
		from
			tab_gl_genc".$i."
		where
			GL_GENC".$i."_CYCLE='".$cycle."' AND
			MISSION_ID=".$mission_id."
	ORDER BY
		id
		)
	";
    }

    $reponse=$bdd->query($query);
    while($donnees=$reponse->fetch())
    {
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


                $sql="select id_echantillon_GL,compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,debit_ech_gl,crd_ech_gl,sold_ech_gl	
                                    from tab_ehantillon_gl 
                                    where
									compt_ech_gl='$Comp' AND
									ref_ech_gl='$ref' AND
									id_mission='$mission_id' AND objectif='B1' and GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles'" ;

                $rps_echantcheck=$bdd->query($sql);
                $don=$rps_echantcheck->fetch();
            ?>

               <tr>
                <td width="20px"><input   type="checkbox" <?php if($don!=null){?> checked <?php } ?> id="<?php echo $id;?>" value="<?php echo $gl.'-'.$id;?>" multiple='multiple' name="listId[]"/></td>
                <td width="80px"><?php echo $Comp;?></td>
                <td width="60px"><?php echo $date;?></td>
                <td width="60px"><?php echo $jl;?></td>
                <td width="100px"><?php echo $ref;?></td>
                <td width="240px"><?php echo $libelle;?></td>
                <td width="80px"><?php echo number_format((double)$debit, 2, '.', ' ')?></td>
                <td width="80px"><?php echo number_format((double)$crd, 2, '.', ' ')?></td>
                <td width="80px"><?php echo number_format((double)$sold, 2, '.', ' ')?></td>
               </tr>

            <?php
            } ?>
  </table>
   
 </div> 

 </center>
<?php
  } else {
?>
<script type="text/javascript">

  $(function()
  {

	  
	  
		$('#contenue_travail')
		.load("RDC/immobilisationCorpIncorp/B_exhaustivite/table_new_B6.php");
	  
	});
</script>
<?php
  }
?>

