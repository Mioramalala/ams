<?php session_start();
	include '../../../connexion.php';
	$mission_id=$_SESSION['idMission'];
	/*$sql = "SELECT IMPORT_COMPTES,IMPORT_INTITULES, SUM(IMPORT_SOLDE) AS SOLDE,tor.OBS_OBSERVATION obs,tor.OBS_COMPTE obs_compte 
	FROM tab_importer ti LEFT JOIN tab_observation_rdc tor ON tor.OBS_COMPTE = ti.IMPORT_COMPTES WHERE ti.MISSION_ID=".$mission_id." AND IMPORT_CHOIX_ANNEE='N' AND IMPORT_COMPTES REGEXP '(64|42|43|442IRSA)' GROUP BY IMPORT_COMPTES ORDER BY IMPORT_COMPTES ASC";*/
	$sql="SELECT IMPORT_COMPTES,IMPORT_INTITULES, SUM(IMPORT_SOLDE) AS SOLDE,tab_observation_rdc.OBS_OBSERVATION, tab_observation_rdc.OBS_COMPTE 
	FROM 
	tab_importer
	LEFT JOIN tab_observation_rdc 
	ON tab_observation_rdc.OBS_COMPTE = tab_importer.IMPORT_COMPTES 
	WHERE tab_importer.MISSION_ID=".$mission_id." 
	AND (IMPORT_COMPTES LIKE '64%' OR IMPORT_COMPTES LIKE '42%' OR IMPORT_COMPTES LIKE '43%' OR IMPORT_COMPTES ='442IRSA') 
	GROUP BY IMPORT_COMPTES 
	ORDER BY IMPORT_COMPTES ASC";
	$rep = $bdd->query($sql);


	//print ("REQUETTE AFFICHAGE".$sql);
	//$rowCount = (int) $rep->fetchColumn();
	$rowCount = (int) $rep->rowCount();

	if ($rowCount != 0)
	{
	
		$i = 0;
		$compte = "";
		$libelle = "";
		$soldeBL = 0;
		$ecart = 0;
		$observation = "";

		echo "<table class='h3'>";
		while( $don = $rep->fetch() )
		{
			//if($i == 0) {
				$compte      = $don['IMPORT_COMPTES'];
				$libelle     = $don['IMPORT_INTITULES'];
				$soldeBL     = number_format($don['SOLDE'],2,'.','');
				$observation =  $don['OBS_OBSERVATION'];
				$obs_compte = $don['OBS_COMPTE'];
/*
				$i++; // Pour compter le nombre d'affichage
			} else {*/
				$sql2 = "SELECT GL_GEN_COMPTES, SUM(GL_GEN_SOLDE) AS SOLDE_GN FROM tab_gl_gen WHERE GL_GEN_CHOIX_ANNEE='N' AND GL_GEN_COMPTES = '".$compte."' GROUP BY GL_GEN_COMPTES";
				$rep2 = $bdd->query($sql2);
				$rows = $rep2->rowCount();
				echo '
					<tr>
						<td width="200px" id="compte'.$i.'">'.$compte.'</td>
						<td width="200px">'.$libelle.'</td>
						<td width="200px" id="soldeBL'.$i.'" style="text-align:right;">'.number_format((double)$soldeBL, 2, '.', ' ').'</td>';

				$var = 0;
				if($tab = $rep2->fetch()){
					$var = $tab['SOLDE_GN'];
					$var_format = number_format($var,2,'.',' ');
					echo '<td width="200px" style="text-align:right;" id="soldeGL'.$i.'" >'.$var_format.'</td>';
				} else {
					echo '<td style="text-align:right;" width="200px">0.00</td>';
				}
				$ecart = number_format(intval($don['SOLDE']) - intval($var),2,'.',' ');

				echo '
						<td width="200px" style="text-align:right;" id="ecart'.$i.'">'.$ecart.'</td>
						<td width="200px"><textarea id="cmt'.$i.'">'.$observation.'</textarea></td>
					</tr>
					<input type="hidden" id="obs_compte'.$i.'" value="'.$obs_compte.'"/>';


					$i++; // Pour compter le nombre d'affichage
/*
					$compte  = $don['IMPORT_COMPTES'];
					$libelle = $don['IMPORT_INTITULES'];
					$soldeBL = number_format($don['SOLDE'],2,'.','');
					$observation =  $don['obs'];
			}*/
		}
		$sql2 = "SELECT GL_GEN_COMPTES, SUM(GL_GEN_SOLDE) AS SOLDE_GN FROM tab_gl_gen WHERE GL_GEN_CHOIX_ANNEE='N' AND GL_GEN_COMPTES = '".$compte."' GROUP BY GL_GEN_COMPTES";
		$rep2 = $bdd->query($sql2);
		$rows = $rep2->rowCount();
		echo '
			<tr>
				<td width="200px" id="compte'.$i.'">'.$compte.'</td>
				<td width="200px">'.$libelle.'</td>
				<td width="200px" id="soldeBL'.$i.'">'.number_format((double)$soldeBL, 2, '.', ' ').'</td>';

		if($rows != 0){
				$var = 0;
				$tab = $rep2->fetch();
				$var = number_format($tab['SOLDE_GN'],2,'.','');
				$ecart = number_format($soldeBL - $var,2,'.','');
				echo '<td width="200px" id="soldeGL'.$i.'" >'.$var.'</td>';
		}
		else echo '<td width="200px">0.00</td>';
		echo '
				<td width="200px" id="ecart'.$i.'">'.$ecart.'</td>
				<td width="200px"><textarea id="cmt'.$i.'">'.$observation.'</textarea></td>
			</tr>
		</table>
		<span id="compteur">'.$i.'</span>';
	}
?>

<script type="text/javascript">
	
	 var compteur=parseInt($('#compteur').html());
    function iterI(){
           for (var i = 0; i < compteur; i++) {
           	     calcul(i);
           }
    }

  function calcul(i){

    var observation=$('#cmt'+i).val(),
        ecart=parseFloat($('#ecart'+i).html()),
        import_compte=parseInt($('#compte'+i).html()),
        obs_compte=$('#obs_compte'+i).val(),
        alreadyOnDB = (obs_compte=="")?false:true;//si obs_compte est vide cela veut dire qu'il n'existe pas dans tab_observation_rdc

     console.log("obs : "+observation+" - "+ecart+" - "+obs_compte);

      $.ajax({
             type:"POST",
             url:"RDC/paie/paieB/saveB1.php",
             data:{
             	observation:observation,ecart:ecart,import_compte:import_compte,
             	existOnDB:alreadyOnDB
             },
             success:function(response){
                    
             }
 
      });



    
       
  }

</script>