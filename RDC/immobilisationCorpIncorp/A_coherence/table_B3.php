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
 //$mission_id=5;

   $cycle = "B- Immobilisations incorporelles et corporelles";
   $objectif = "B3";
   $UTIL_ID=@$_SESSION['UTIL_ID'];

 
 ?>
<script>
 $(function(){
  $("#btn_tel").click(function(){

   // alert("TEL");
			
       var data = "";
       var i = 0;
       $("#tbl_ech tr input[type='checkbox']:checked").each(function() {
          if(i > 0) data += "/";
          else i++;
          data += this.value;
       });

      //alert(data);
      
      $.ajax({
          type:"POST",
          url:"RDC/enregistrerEchant_GL.php",
          data: {
            comptes  : data,
            cycle    : '<?php echo $cycle; ?>',
            objectif : '<?php echo $objectif; ?>'
          },
          success:function(e)
          {
            //alert(e);
              $('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_new_B3.php");
          },
          error : function(e) {
            alert("Error : " + e);
          }
          
       });




/*
      valTransfert=$("#tbl_ech tr input[type='checkbox']:checked").serialize();
      alert(valTransfert);
		   $.ajax({
			  type:"POST",
			  url:"/RDC/immobilisationCorpIncorp/A_coherence/GetEchant_GL.php",
			  data:valTransfert,
			  success:function(e){

          alert(e);
			  //alert(e);
				   $('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_new_B3.php");
			  }
			});*/

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
  .textarea-min {
    max-width: 110px;
  }

  td.number {
    text-align : right;
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

  if($count == 0) 
  {
    ?> 



                   <center>
                   <table id="tbl_ech"  height="50" style="width:100%;">
                  	  <tr>
                  	   <td colspan="9"><center><label style="color:black;">RAPPROCHEMENT DES INVESTISSEMENTS REALISES AVEC LE BUDGET</label></center></td>
                  	  </tr>
                  		<tr>
                  	   <td colspan="9"><center><b><label style="color:blue;">Veuillez selectionner l'echantillon </label></b></center></td>
                  	  </tr>
                      
                      <tr id="tet">
                    <td width="20px"></td>
                    <td width="75px">Compte</td>
                    <td  width="110px">Solde</td>
                    <td width="80px">Date</td>
                    <td width="60px" >Journal</td>
                    <td width="52px" >Ref</td>
                    <td width="321px">Libellé</td>
                    <td width="92px" >Débit</td>
                    <td width="92px">Crédit</td>
                      </tr>
                   </table>



                <div style="height:300px;overflow:auto;">    
                  <table id="tbl_ech" style="width:100%;">
                    
                  


                              <?php 
                    
                    
                                $reponse=$bdd->query("SELECT 1 AS grand_livre,GL_GEN_ID AS id,GL_GEN_COMPTES ,GL_GEN_DATE ,GL_GEN_JL,GL_GEN_REF, GL_GEN_LIBELLE,
                                GL_GEN_DEBIT,GL_GEN_CREDIT,GL_GEN_SOLDE,GL_GEN_CYCLE FROM tab_gl_gen WHERE GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID='$mission_id' 
                                UNION 
                                SELECT 2 AS grand_livre,GL_GENC2_ID AS id,GL_GENC2_COMPTES ,GL_GENC2_DATE ,GL_GENC2_JL,GL_GENC2_REF, GL_GENC2_LIBELLE,
                                GL_GENC2_DEBIT,GL_GENC2_CREDIT,GL_GENC2_SOLDE,GL_GENC2_CYCLE FROM tab_gl_genc2 WHERE GL_GENC2_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID='$mission_id'

                                UNION 
                                SELECT 3 AS grand_livre,GL_GENC3_ID AS id,GL_GENC3_COMPTES ,GL_GENC3_DATE ,GL_GENC3_JL,GL_GENC3_REF, GL_GENC3_LIBELLE,
                                GL_GENC3_DEBIT,GL_GENC3_CREDIT,GL_GENC3_SOLDE,GL_GENC3_CYCLE FROM tab_gl_genc3 WHERE GL_GENC3_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID='$mission_id'
                                UNION 
                                SELECT 4 AS grand_livre,GL_GENC4_ID AS id,GL_GENC4_COMPTES ,GL_GENC4_DATE ,GL_GENC4_JL,GL_GENC4_REF, GL_GENC4_LIBELLE,
                                GL_GENC4_DEBIT,GL_GENC4_CREDIT,GL_GENC4_SOLDE,GL_GENC4_CYCLE FROM tab_gl_genc4 WHERE GL_GENC4_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID='$mission_id'
                                UNION 
                                SELECT 5 AS grand_livre,GL_GENC5_ID AS id,GL_GENC5_COMPTES ,GL_GENC5_DATE ,GL_GENC5_JL,GL_GENC5_REF, GL_GENC5_LIBELLE,
                                GL_GENC5_DEBIT,GL_GENC5_CREDIT,GL_GENC5_SOLDE,GL_GENC5_CYCLE FROM tab_gl_genc5 WHERE GL_GENC5_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID='$mission_id'
                                UNION 
                                SELECT 6 AS grand_livre,GL_GENC6_ID AS id,GL_GENC6_COMPTES ,GL_GENC6_DATE ,GL_GENC6_JL,GL_GENC6_REF, GL_GENC6_LIBELLE,
                                GL_GENC6_DEBIT,GL_GENC6_CREDIT,GL_GENC6_SOLDE,GL_GENC6_CYCLE FROM tab_gl_genc6 WHERE GL_GENC6_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID='$mission_id'
                                UNION
                                SELECT 7 AS grand_livre,GL_GENC7_ID AS i,GL_GENC7_COMPTES ,GL_GENC7_DATE ,GL_GENC7_JL,GL_GENC7_REF, GL_GENC7_LIBELLE,
                                GL_GENC7_DEBIT,GL_GENC7_CREDIT,GL_GENC7_SOLDE,GL_GENC7_CYCLE FROM tab_gl_genc7 WHERE GL_GENC7_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID='$mission_id'");
                              


                       


                                while($donnees=$reponse->fetch())
                                {

                                    $id= $donnees['id'];
                                    $gl= $donnees['grand_livre'];
                                    //$id_gl_gen=$donnees['GL_GEN_ID'];
                                    $Comp=$donnees['GL_GEN_COMPTES'];
                                    $date=$donnees['GL_GEN_DATE'];
                                    $jl=$donnees['GL_GEN_JL'];
                                    $ref=$donnees['GL_GEN_REF'];
                                    $libelle=$donnees['GL_GEN_LIBELLE'];
                                    $debit=$donnees['GL_GEN_DEBIT'];
                                    $crd=$donnees['GL_GEN_CREDIT'];
                                    $solde=$donnees['GL_GEN_SOLDE'];
                               
                                    ?>

                                   <tr>
                                    <td width="20px"><input type="checkbox" id="<?php echo $gl;?>" value="<?php echo $gl.'-'.$id;?>" multiple='multiple' name="listId[]"/></td>
                                    <td width="80px"><?php echo $Comp;?></td>
                                     <td width="80px"><?php echo $solde;?></td>
                                    <td width="60px"><?php echo $date;?></td>
                                    <td width="60px"><?php echo $jl;?></td>
                                    <td width="60px"><?php echo $ref;?></td>
                                    <td width="240px"><?php echo $libelle;?></td>
                                    <td width="110px" class="number"><?php echo number_format((double)$debit, 2, '.', ' ')?></td>
                                    <td width="110px" class="number"><?php echo number_format((double)$crd, 2, '.', ' ')?></td>
                                	
                                   </tr>
                     <?php } ?>
                    </table>
                </div>
            </div> 
          <p id="btn_tel">Enregister les éléments cochés</p>
        </center>

 <?php

}else
{
   ?>
      <script type="text/javascript">
        $(function(){
         $('#contenue_travail').load("RDC/immobilisationCorpIncorp/A_coherence/table_new_B3.php");
        });
      </script>
      <?php
}
 ?>



 <div id="progressbarRDC" style="width:300px;height:60px;position:absolute;top:250px;left:470px;display:none;background-color:white;box-shadow:0px 10px 10px;">
		<center><img src="../img/progressbar.gif" /><br />Veuillez patienter s'il vous plaît</center>
</div>