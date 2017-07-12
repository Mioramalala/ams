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
 //$mission_id = 5;
 ?>

<script>
$(document).ready(function (e){

    //alert("ccc");
    //$(document).on("keyup",".budget_",_functionbudget);
    //$(document).on("keypress",".budget_",_functionbudget);
   $(".budget_").keyup(_functionbudget);
    $(".budget_").keypress(_functionbudget);

});

    function _functionbudget()
    {
        Credit=0;
        eltparent=$(".budget_").parent().parent();
        Debit=$(this).attr("debit_ech_gl");
        if($(this).attr("crd_ech_gl")!="")
        Credit=$(this).attr("crd_ech_gl");
        Budjet=$(this).val();
        id_ecart=$(this).attr("id");
        eltecartF_=eltparent.find("#ecartF_"+id_ecart);


       // ecartF_=
       // alert("Debit="+Debit+"Creditt"+Credit+"Budjet"+Budjet);

        ecart=eval(Debit)+eval(Credit)-eval(Budjet);
        //alert(eval(Debit)+eval(Credit)-eval(Budjet));
        eltecartF_.val(ecart);
      //alert("CC");
    }
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
 
 
 <form id="frmRDCcoherence">
           <table width="100%" height="50" style="text-align:left;">
            <tr>
             <td><center><label style="color:black;">RAPPROCHEMENT DES INVESTISSEMENTS REALISES AVEC LE BUDGET												
           </label></center></td>
            </tr>
           </table>
            <table width="900">
            <tr id="tettd">
             <td width="50">Compte</td>
             <td width="50">Date</td>
             <td width="50">Journal</td>
             <td width="50">Reference</td>
              <td width="50">Libellé</td>
             <td width="50">Débit</td>
             <td width="50">Crédit</td>
             
             <td width="50px">Budgétisé</td>
          	<td width="50px">Ecart</td>
          	<td width="50px">Commentaires</td>
            </tr>
           
             <?php 
              $reponse=$bdd->query("select id_echantillon_GL,compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,debit_ech_gl,crd_ech_gl 
          	                       from  tab_ehantillon_gl
          	                       where objectif='B3' AND GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles' AND id_mission='$mission_id'");
          	$compte=0;
            while($donnees=$reponse->fetch())
            {

                  $query="select id_echantillon_GL,budget, commentaires, ecart from tab_rdc_immo_partie3 where mission_id='$mission_id' and cycle='B- Immobilisations incorporelles et corporelles' and id_echantillon_GL='".$donnees['id_echantillon_GL']."'";
                  $reponseF3=$bdd->query($query);
                  $donneesF3=$reponseF3->fetch();

                  $id_echantillon_GL=$donneesF3['id_echantillon_GL'];
                  $budget=$donneesF3['budget'];
                  $commentaire=$donneesF3['commentaires'];
                  $comptes=$donnees['compt_ech_gl'];
                  $intitules=$donnees['libelle_ech_gl'];
                  $solde=$donnees['debit_ech_gl'];
                  $ecart=$solde-$budget;

                   ?>
                  <tr id="tbl_ech">
                      	   <td width="50"><?php echo $donnees['compt_ech_gl'];?></td>
                            <td width="50"><?php echo $donnees['date_ech_gl'];?></td>
                            <td width="50"><?php echo $donnees['journal_ech_gl'];?></td>
                            <td width="50"><?php echo $donnees['ref_ech_gl'];?></td>
                            <td width="50"><?php echo $donnees['libelle_ech_gl'];?></td>
                            <td width="50"><?php echo $donnees['debit_ech_gl'];?></td>
                            <td width="50"><?php echo $donnees['crd_ech_gl'];?></td>

                            <input type="hidden"  name="id_echantillon_GL[]"  value="<?php echo $donnees['id_echantillon_GL']; ?>" >
                            <input type="hidden"  name="compteF3[]"  value="<?php echo $comptes; ?>" >
                            <input type="hidden" name="labelleF3[]"  value="<?php echo $intitules; ?>"  />
                            <input type="hidden" name="montantF3[]"  value="<?php if(empty($solde)){}else{echo number_format($solde, 2, '.', ' ');}?>"  >
                           
                      	   <td width="50"><input id="<?php print ($id_echantillon_GL); ?>"  class="budget_" debit_ech_gl="<?php echo $donnees['debit_ech_gl'];?>" crd_ech_gl="<?php echo $donnees['crd_ech_gl'];?>" name="budgetF3[]"  value="<?php echo $budget?>" /></td>
                      	   <td width="50"><input id="ecartF_<?php print ($id_echantillon_GL); ?>" class="ecartF_"  name="ecartF3[]"  value="<?php echo $ecart?>"/></td>
                      	   <td width="50"><input   name="commentF3[]"  value="<?php echo $commentaire?>"/></td>
                	  </tr>
          	
          	
                    <?php
                    $compte++;
              }
             ?>
             <input type ="text" id="makacompte" value="<?php echo $compte ?>" style="display:none;"/>
             </table>


   </form>
  </div>
 