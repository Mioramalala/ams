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
?>
<style>
#RA{
border-collapse:collapse;
font-size:12px;
}
#RA td{
border:1px solid;
}
.ttr{
background-color:#6495ED;
color:#fff;
height:10px;
}
.cldiv{
width:400px;
height:150px;
border:1px solid #6495ED;
}
.cltxt{
width:350px;
height:90px;
}
#syntCon{
background-color:#6495ED;
}

.table_parcycle td {
    border: 1px solid #CCC;
    font-size: 10pt;
    text-align: center;
}
</style>
<link rel="stylesheet" href="../RDC/immobilisationCorpIncorp/css.css">
<div width="100%" height="50%">
  <label>REVUE ANALYTIQUE ET VERIFICATION DE LA VARIATION DES PRODUITS CLIENTS</label>
  <div style="max-width:970px; overflow-x:auto;overflow-y:auto;height:250px;">
  <div id="" style="width:1200px;" >
    <table class="table_parcycle" style="width:1200px;">
    <tr class="ttr">
					<td class="entete" style="width:50px">Comptes</td>
        <td class="entete" width="150px" >Libéllés</td>
        <td class="entete" width="150px">Débits</td>
        <td class="entete" width="150px">Crédits</td>
        <td class="entete" width="150px">Soldes N</td>
        <td class="entete" width="150px">Soldes N-1</td>
        <td class="entete" width="150px">Variation</td>
        <td class="entete" width="80px">Pourcentage</td>
        <td class="entete" width="200px">Commentaires</td>
				</tr>
  </table>

</div>
  <div id="" style="overflow-x:hidden;width:1200px;" >
    <table class="table_parcycle" width="width:1200px;">
   <?php
    
  // include $_SERVER["DOCUMENT_ROOT"].'/RA/fonctions_requetes.php';
   //function remplir_tab_par_cycle($nom_cycle, $mission_id){
   //   
    
    include $_SERVER["DOCUMENT_ROOT"].'/connexion.php';
    function conclusion_existante($nom_cycle, $mission_id)
    {
      global $bdd,$mission_id;
      //include '../../connexion.php';
      $conclusion = false;

      $sql='SELECT COUNT(CONCLUSION) AS COMPTE FROM  tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="'.$nom_cycle.'"';
      $reponse = $bdd->query($sql);
        
      $donnees=$reponse->fetch();

      if($donnees["COMPTE"]>0){$conclusion = true;}

      return $conclusion;
}

function afficherCommentaire($num_compte, $nom_cycle, $mission_id){
  //include '../../connexion.php';    
  global $bdd,$mission_id;
  $rep = $bdd->query("SELECT DISTINCT RA_COMMENTAIRE from tab_ra 
    WHERE MISSION_ID=".$mission_id." 
    AND RA_COMPTE=".$num_compte."
    AND RA_CYCLE='".$nom_cycle."'");

  $donnees = $rep->fetch();

  $commentaire = $donnees['RA_COMMENTAIRE'];

  return $commentaire;
}


    $com1=0;
    $nom_cycle='G- Produits Clients';
    $reponse=$bdd->query("SELECT * FROM
      (SELECT (IMPORT_SOLDE-IMPORTN1_SOLDE) AS VARIATION, IMPORT_ID, IMPORTN1_COMPTES AS COMPTE, IMPORTN1_SOLDE, IMPORT_SOLDE, IMPORT_INTITULES AS INTITULE, IMPORT_DEBIT, IMPORT_CREDIT
      FROM tab_importern1
      INNER JOIN tab_importer ON tab_importern1.IMPORTN1_COMPTES = tab_importer.IMPORT_COMPTES
      AND tab_importern1.MISSION_ID = tab_importer.MISSION_ID
      WHERE IMPORT_CYCLE='".$nom_cycle."' 
      AND tab_importer.MISSION_ID=".$mission_id."

      UNION

      SELECT COALESCE(IMPORT_SOLDE,0) AS VARIATION, IMPORT_ID, IMPORT_COMPTES AS COMPTE, COALESCE(IMPORTN1_SOLDE,0), COALESCE(IMPORT_SOLDE,0), IMPORT_INTITULES AS INTITULE, COALESCE(IMPORT_DEBIT,0), COALESCE(IMPORT_CREDIT,0)
      FROM tab_importern1
      RIGHT JOIN tab_importer ON tab_importern1.IMPORTN1_COMPTES = tab_importer.IMPORT_COMPTES
      AND tab_importern1.MISSION_ID = tab_importer.MISSION_ID
      WHERE tab_importern1.IMPORTN1_COMPTES IS NULL AND IMPORT_CYCLE='".$nom_cycle."' 
      AND tab_importer.MISSION_ID=".$mission_id."

      UNION

      SELECT COALESCE(-IMPORTN1_SOLDE,0) AS VARIATION, IMPORTN1_ID AS IMPORT_ID, IMPORTN1_COMPTES AS COMPTE, COALESCE(IMPORTN1_SOLDE,0) , COALESCE(IMPORT_SOLDE,0) , IMPORTN1_INTITULES AS INTITULE, COALESCE(IMPORT_DEBIT,0), COALESCE(IMPORT_CREDIT,0)
      FROM tab_importern1
      LEFT JOIN tab_importer ON tab_importern1.IMPORTN1_COMPTES = tab_importer.IMPORT_COMPTES
      AND tab_importern1.MISSION_ID = tab_importer.MISSION_ID
      WHERE tab_importer.IMPORT_COMPTES IS NULL AND IMPORTN1_CYCLE='".$nom_cycle."' 
      AND tab_importern1.MISSION_ID=".$mission_id.") AS T1
      
      GROUP BY COMPTE
      ORDER BY COMPTE ASC
    ")or die(mysql_error());

   // return $reponse;
//}
  // $reponse=remplir_tab_par_cycle('G- Produits Clients',$mission_id);
        
        while($donnees=$reponse->fetch()){
            $import_compteN=$donnees['COMPTE'];
            $import_intituleN=utf8_decode($donnees['INTITULE']);
            $import_debitN=$donnees['IMPORT_DEBIT'];
            $import_creditN=$donnees['IMPORT_CREDIT'];
            $import_soldeN=$donnees['IMPORT_SOLDE'];
            $import_soldeN1=$donnees['IMPORTN1_SOLDE'];
            //$import_anneeN=$donnees['IMPORT_CHOIX_ANNEE'];
            $import_variation=round($donnees['VARIATION'],2);
            if($import_variation=="") $import_variation=0;
            $numerodecompte=$donnees['IMPORT_ID'];
            
            $comp=count($import_soldeN1);
              for($i=0; $i<$comp; $i++){
              
              if($import_soldeN1==0){
              $pourcentages =0;
              }
              else {
                $pourcentages =round(($import_variation/$import_soldeN1)*100,2);
              }
    
      ?> 
      <tr height="70" id="idBalGen<?php echo $com1;?>" value="<?php echo $donnees['IMPORT_ID'];?>">
        <input type ="hidden" value="<?php echo $donnees['IMPORT_ID']?>"  style="display:none"/>
        
        <td style="width:50px"><?php echo $import_compteN;?> </td>
        <input type="hidden" id="import_compteN<?php echo $com1;?>" value="<?php echo $import_compteN;?>"/>
        
        <td width="150px" style="max-width:200px;"><?php echo $import_intituleN;?> </td>
        <input type="hidden" id="import_intituleN<?php echo $com1;?>" value="<?php echo $import_intituleN;?>"/>
        
        <td width="150px"><?php if(empty($import_debitN)){}else{echo number_format($import_debitN, 2, '.', ' ');}?></td>
        <input type="hidden" id="import_debitN<?php echo $com1;?>" value="<?php echo $import_debitN;?>"/>
        
        <td width="150px"><?php if(empty($import_creditN)){}else{echo number_format($import_creditN, 2, '.', ' ');}?></td>
        <input type="hidden" id="import_creditN<?php echo $com1;?>" value="<?php echo $import_creditN;?>"/>
        
        <td width="150px"><?php if(empty($import_soldeN)){}else{echo number_format($import_soldeN, 2, '.', ' ');}?></td>
        <input type="hidden" id="import_soldeN<?php echo $com1;?>" value="<?php echo $import_soldeN;?>"/>
        
        <td width="150px"><?php if(empty($import_soldeN1)){}else{echo number_format($import_soldeN1, 2, '.', ' ');}?></td>
        <input type="hidden" id="import_soldeN1<?php echo $com1;?>" value="<?php echo $import_soldeN1;?>"/>
        
        <td width="150px"><?php if(empty($import_variation)){}else{echo number_format($import_variation, 2, '.', ' ');}?></td>
        <input type="hidden" id="import_variation<?php echo $com1;?>" value="<?php echo $import_variation;?>"/>
        
        <td width="80px"><?php echo $pourcentages;?>%</td>
        <input type="hidden" id="pourcentages<?php echo $com1;?>" value="<?php echo $pourcentages;?>"/>
        
        <td width="200px">
		<?php  if(false){ ?>
          <textarea <?php if(conclusion_existante("vente", $mission_id)==true) {echo "disabled class='disabled' ";}?> rows="4" id="commentvente<?php echo $com1?>"><?php echo afficherCommentaire($import_compteN, 'vente', $mission_id)?></textarea>
			  <?php } ?>
			  
          <textarea disabled="disabled" rows="4" id="commentvente<?php echo $com1?>"><?php echo afficherCommentaire($import_compteN, 'vente', $mission_id)?></textarea>
			  
			  
          <img src="../RA/image/add.jpg" style="cursor:pointer;" id="com1<?php echo $com1; ?>" onclick="addcommentvente(<?php echo $com1;?>)" width="20" height="20"/>
        </td>
       
      </tr>
      <?php
        }
          $com1++;
          }
      ?>
    </table>
 
					
  </div>
  </div>
   <?php
    $reponseS=$bdd->query("select SYNTHESE  from tab_synthese_ra where SYNTHESE_OBJECTIF='vente' AND MISSION_ID=".$mission_id);
  
    $Synt=$reponseS->fetch();
    
    $reponseC=$bdd->query("select CONCLUSION from tab_conclusion_ra  where CONCLUSION_OBJECTIF='vente' AND MISSION_ID=".$mission_id);
  
    $Conc=$reponseC->fetch();
   ?>
  
  <div id="syntCon">
  <center>
   <table >
    <tr>
     <td>
      <div  div="synth" class="cldiv">
       <table>
        <tr>
         <td height="15px"><center><label>Synthèse</label></center></td>
        </tr>
        <tr>
         <td><textarea id="txtsynth" class="cltxt" readonly><?php echo $Synt["SYNTHESE"] ?></textarea></td>
        </tr>
       </table>
      </div>
     </td>
     <td>
      <div id="con" class="cldiv">
       <table>
        <tr>
         <td height="15px"><center><label>Conclusion</label></center></td>
        </tr>
        <tr>
         <td><textarea id="txtcon" class="cltxt" readonly><?php echo $Conc["CONCLUSION"] ?></textarea></td>
        </tr>
       </table>
      </div>
     </td>
    </tr>
   </table>
  </center>
  </div>
  </div>