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
<script>
	$(function(){
		$(document).on("keypress","#valeur_assure",calcul_celule1);
		$(document).on("keyup","#valeur_assure",calcul_celule1);
		function calcul_celule1()
		{
			var solde=$('#solde_comptable').val();
			var valeur_assuree=$('#valeur_assure').val();
			var total_difference= eval(solde - valeur_assuree);
      $("#difference").val(total_difference);
			//document.getElementById('difference').value=total_difference;
		}
	});
</script>
<style>
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
<div align="center">
<label>RAPPROCHEMENT DES IMMOBILISATIONS AVEC LA VALEUR ASSUREE</label><br/><br/>

<form id="frmrdc_RAP">
<table id="tbl_ech" style="width:600px;" border="1">
    <tr id="tet">
	<td width="200px">Solde comptable des immobilisations</td>
	<td width="200px">Valeur assurée</td>
	<td width="200px">Différence</td>
  </tr>
  <?php 
  
  $reponse=$bdd->query(" SELECT SUM(IMPORT_SOLDE) as solde  FROM tab_importer 
  WHERE (IMPORT_COMPTES LIKE '%20' OR IMPORT_COMPTES LIKE '%21' OR IMPORT_COMPTES LIKE '%22' OR IMPORT_COMPTES LIKE '%23' OR IMPORT_COMPTES LIKE '%24') AND IMPORT_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID='$mission_id'");
    
	while($donnees=$reponse->fetch())
  {
                $solde=$donnees['solde'];

                $sql_="SELECT *   FROM tab_rdc_immorap_parti5  WHERE  MISSION_ID='$mission_id'";
                $rep_=$bdd->query($sql_);
                $don= $rep_->fetch()


                ?>
                 <tr>
                  <td width="50"><input  id="solde_comptable" value="<?php echo $solde;?>"/></td>
                    <td width="50"><input name="valeur_assure"  id="valeur_assure" value="<?php print($don['Valeur_assuree']);?>"/></td>
                  <td width="50"><input name="difference"  id="difference" value="<?php print($don['difference']);?>"/></td>
                 </tr>
               <?php
     }

   ?>
  </table>

  </form>
</div>