<?php
/*
#Jimmy
La structure de la base de donnée sur les échantillons produit un effet de doublons si les données ne sont pas bien verifiés, cependant les modifications pourrons apporté d'autres bug dans d'autre partie si l'on mettais à jour la base de donnée.
*/


 @session_start();
 
		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../"; #using $project_path
	
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

 $mission_id=@$_SESSION['idMission'];
 $UTIL_ID=@$_SESSION['UTIL_ID'];
 
	include "$project_path/connexion.php";

if(isset($_POST["comptes"]) && isset($_POST["cycle"]) && isset($_POST["objectif"]))
 {
     $comptes = $_POST["comptes"];
     $cycle = $_POST["cycle"];
     $objectif = $_POST["objectif"];

     $comptes_a_enregistrer = explode('/', $comptes);
	 $defined_ids=array();
	 $defined_ids_ref=array();
	 /*
	 #Jimmy:deboggage
	 Reprise des données afin de ne pas supprimer les existants
	 */
	 
	 /*
	 Selection des ID deja existant
	 */
	 $id_existants=array();
	 foreach($comptes_a_enregistrer as $compte_a_enregistrer){
		$compte_a_enregistrer_details = explode('-', $compte_a_enregistrer);

		$table = $compte_a_enregistrer_details[0];
		$id    = $compte_a_enregistrer_details[1];
		
		$i = intval($table);

		if($i == 1) 
		{
			  $sql = "
		select
			GL_GEN_REF AS ref, 
			GL_GEN_COMPTES AS compte
        from
			tab_gl_gen
		where
			GL_GEN_CYCLE='".$cycle."' AND
			GL_GEN_ID = ".$id." AND
			MISSION_ID=".$mission_id;
		} else
		 {
			 $sql = "
		 select
			GL_GENC".$i."_REF AS ref,
			GL_GENC".$i."_COMPTES AS compte
		from
			tab_gl_genc".$i."
		where
			GL_GENC".$i."_CYCLE='".$cycle."' AND
			GL_GENC".$i."_ID = ".$id." AND
			MISSION_ID=".$mission_id;
		}
		$comptes=$bdd->query($sql);
		$def_comptes=array();
		$def_ref=array();
		while($c=$comptes->fetch()){
			$defined_ids[]=$c["compte"];
			$def_comptes[]=$c["compte"];
			$defined_ids_ref[]=$c["ref"];
			$def_ref[]=$c["ref"];
		}
		var_dump($def_comptes);
		if(count($def_comptes) && count($def_ref) ){
			 /*
			 Determination si l'echantillon existait déjà
			 */
			 $def_comptes=implode(",",$def_comptes);
			 $def_ref=implode(",",$def_ref);
			 $def_comptes="
				compt_ech_gl IN ($def_comptes)
				AND";
			 $def_ref="
				ref_ech_gl IN ($def_ref)
				AND";
			$already_in_sql="
				SELECT
					count(*) as already_in
				FROM
					tab_ehantillon_gl
				WHERE
					$def_comptes
					$def_ref
					GL_GEN_CYCLE='".$cycle."' AND
					objectif = '".$objectif."' AND
					id_mission=".$mission_id;
			$req=$bdd->query($already_in_sql);
			var_dump($already_in_sql);
			$already_in_result=$req->fetch();
			$already_in=$already_in_result["already_in"];
			if($already_in){
				/*
				Id déjà enregistré dans les échantillons
				*/
				$id_existants[$id]=true;
			}
		}
		
	 }
	 $idefined_id=implode(",",$defined_ids);
	 $idefined_id_ref=implode(",",$defined_ids_ref);

	 $ndefined_id=$idefined_id;
	 if($idefined_id && $idefined_id_ref){
		 $ndefined_id="
		(
		compt_ech_gl NOT IN ($idefined_id)
		OR
		ref_ech_gl NOT IN ($idefined_id_ref)
		)
		AND";
	 }
	 else{
		 $ndefined_id="";
	 }
	/*
	Suppréssion des echantillons reniées
	*/
	$sqlDelete= "
		delete from
			tab_ehantillon_gl
		where
			$ndefined_id
			GL_GEN_CYCLE='".$cycle."' AND
			objectif = '".$objectif."' AND
			id_mission=".$mission_id;
		
     $reponse=$bdd->query($sqlDelete) or die(mysql_error());
	 /*
	 Doing backup
	 */
	 $backup_sql.=$sqlDelete;
	 

 foreach ($comptes_a_enregistrer as $compte_a_enregistrer)
  {
    $compte_a_enregistrer_details = explode('-', $compte_a_enregistrer);

     //print "$compte_a_enregistrer******"; 
    $table = $compte_a_enregistrer_details[0];
    $id    = $compte_a_enregistrer_details[1];
	
	if(isset($id_existants[$id])){
		/*
		On ne réinsère pas si l'ID est déjà présent
		*/
		continue;
	}
		echo "inserting <br/>";

    $i = intval($table);

    if($i == 1) 
    {
          $sql = "
		select
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
			GL_GEN_ID = ".$id." AND
			MISSION_ID=".$mission_id;
    } else
     {
         $sql = "
		 select
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
			GL_GENC".$i."_ID = ".$id." AND
			MISSION_ID=".$mission_id;
    }

   $reponse=$bdd->query($sql) or die(mysql_error());

   if($donnees=$reponse->fetch())
    {
      $req1="INSERT INTO
		tab_ehantillon_gl (
			compt_ech_gl,
			date_ech_gl,
			journal_ech_gl,
			ref_ech_gl,
			libelle_ech_gl,
			debit_ech_gl,
			crd_ech_gl,
			sold_ech_gl,
			GL_GEN_CYCLE,
			objectif,
			id_mission,
			UTIL_ID
		) 
		VALUES(
			'".$donnees['compte']."',
			'".$donnees['date']."',
			'".$donnees['jl']."',
			'".$donnees['ref']."',
			'".$donnees['libelle']."',
			'".$donnees['debit']."',
			'".$donnees['credit']."',
			'".$donnees['solde']."',
			'$cycle',
			'$objectif',
			'".$mission_id."',
			'".$UTIL_ID."'
		)";
        
      $reqInsert=$bdd->query($req1);
      $file = '../fichier/save_mission/mission.sql';
	  
	  
      $backup_sql.=$req1;
	  if($using_backup){
		file_put_contents($file, $backup_sql.";", FILE_APPEND | LOCK_EX);
	  }

   }
 }

} else {
}

/*
 $ListEchan_tab=Array();
 $ListEchan_tab=$_POST['listId'];

 for($i=0;$i<count($ListEchan_tab);$i++){
 
 //*********************************select*************************************
 $sql="select GL_GEN_COMPTES,GL_GEN_DATE,GL_GEN_JL,GL_GEN_REF,GL_GEN_LIBELLE,
  GL_GEN_DEBIT,GL_GEN_CREDIT,GL_GEN_SOLDE
  from tab_gl_gen where GL_GEN_ID=".$ListEchan_tab[$i]." AND MISSION_ID=".$mission_id ;
  
  echo $sql;
  $reponse=$bdd->query($sql) or die(mysql_error());
  $donnees=$reponse->fetch();
  //echo 'ity'.$donnees['GL_GEN_COMPTES'].$donnees['GL_GEN_DATE'].$donnees['GL_GEN_LIBELLE'].$donnees['GL_GEN_CREDIT']; 
  
 // ********************************insertion************************************
 // echo $ListEchan_tab[$i];

  $req1="INSERT INTO  tab_ehantillon_gl ( compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,
  debit_ech_gl,crd_ech_gl,sold_ech_gl, GL_GEN_CYCLE,id_mission,UTIL_ID) VALUE ('".$donnees['GL_GEN_COMPTES']."','".$donnees['GL_GEN_DATE']."','".$donnees['GL_GEN_JL']."','".$donnees['GL_GEN_REF']."','".$donnees['GL_GEN_LIBELLE']."','".$donnees['GL_GEN_DEBIT']."','".$donnees['GL_GEN_CREDIT']."','".$donnees['GL_GEN_SOLDE']."','B- Immobilisations incorporelles et corporelles',".$mission_id.",".$UTIL_ID.")";
    
  $reqInsert=$bdd->exec($req1);
	
	$file = '../../../fichier/save_mission/mission.sql';
	file_put_contents($file, $req1.";", FILE_APPEND | LOCK_EX);
  
 }
 */
?>


