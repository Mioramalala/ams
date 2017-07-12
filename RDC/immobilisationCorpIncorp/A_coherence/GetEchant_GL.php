<?php
@session_start();
$mission_id=@$_SESSION['idMission'];
$UTIL_ID=@$_SESSION['UTIL_ID'];
//$mission_id=5;

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
	include "$project_path/connexion.php";

$ListEchan_tab=Array();
$ListEchan_tab=$_POST['listId'];


	printf(var_dump($ListEchan_tab));
	$i=0;
	foreach ($ListEchan_tab as $GLGEN_ID)
	{

		//Verification si l'ID existe deja dans la tab_ehantillon_gl
		$sql= "
		SELECT GL_GEN_ID,GL_GEN_COMPTES ,GL_GEN_DATE ,GL_GEN_JL,GL_GEN_REF, GL_GEN_LIBELLE, GL_GEN_DEBIT,GL_GEN_CREDIT,GL_GEN_SOLDE,GL_GEN_CYCLE 

   			 	FROM tab_gl_gen

     			WHERE  GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']." UNION 

			     SELECT GL_GENC2_ID,GL_GENC2_COMPTES ,GL_GENC2_DATE ,GL_GENC2_JL,GL_GENC2_REF, GL_GENC2_LIBELLE,
			    GL_GENC2_DEBIT,GL_GENC2_CREDIT,GL_GENC2_SOLDE,GL_GENC2_CYCLE FROM tab_gl_genc2 WHERE GL_GENC2_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']."

			    UNION 
			    SELECT GL_GENC3_ID,GL_GENC3_COMPTES ,GL_GENC3_DATE ,GL_GENC3_JL,GL_GENC3_REF, GL_GENC3_LIBELLE,
			    GL_GENC3_DEBIT,GL_GENC3_CREDIT,GL_GENC3_SOLDE,GL_GENC3_CYCLE FROM tab_gl_genc3 WHERE GL_GENC3_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']."
			    UNION 
			    SELECT GL_GENC4_ID,GL_GENC4_COMPTES ,GL_GENC4_DATE ,GL_GENC4_JL,GL_GENC4_REF, GL_GENC4_LIBELLE,
			    GL_GENC4_DEBIT,GL_GENC4_CREDIT,GL_GENC4_SOLDE,GL_GENC4_CYCLE FROM tab_gl_genc4 WHERE GL_GENC4_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']."
			    UNION 
			    SELECT GL_GENC5_ID,GL_GENC5_COMPTES ,GL_GENC5_DATE ,GL_GENC5_JL,GL_GENC5_REF, GL_GENC5_LIBELLE,
			    GL_GENC5_DEBIT,GL_GENC5_CREDIT,GL_GENC5_SOLDE,GL_GENC5_CYCLE FROM tab_gl_genc5 WHERE GL_GENC5_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']."
			    UNION 
			    SELECT GL_GENC6_ID,GL_GENC6_COMPTES ,GL_GENC6_DATE ,GL_GENC6_JL,GL_GENC6_REF, GL_GENC6_LIBELLE,
			    GL_GENC6_DEBIT,GL_GENC6_CREDIT,GL_GENC6_SOLDE,GL_GENC6_CYCLE FROM tab_gl_genc6 WHERE GL_GENC6_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission']."
			UNION
			    SELECT GL_GENC7_ID,GL_GENC7_COMPTES ,GL_GENC7_DATE ,GL_GENC7_JL,GL_GENC7_REF, GL_GENC7_LIBELLE,
			    GL_GENC7_DEBIT,GL_GENC7_CREDIT,GL_GENC7_SOLDE,GL_GENC7_CYCLE FROM tab_gl_genc7 WHERE GL_GENC7_CYCLE='B- Immobilisations incorporelles et corporelles' AND MISSION_ID=".$_SESSION['idMission'];
			  
		$reponse = $bdd->query($sql) or die(mysql_error());
		while ($donnees = $reponse->fetch())
		{
				$id=$donnees['GL_GEN_ID'];
				$Comp=$donnees['GL_GEN_COMPTES'];
				$date=$donnees['GL_GEN_DATE'];
				$jl=$donnees['GL_GEN_JL'];
				$ref=$donnees['GL_GEN_REF'];
				$libelle=$donnees['GL_GEN_LIBELLE'];
				$debit=$donnees['GL_GEN_DEBIT'];
				$crd=$donnees['GL_GEN_CREDIT'];
				$sold=$donnees['GL_GEN_SOLDE'];
				if(array_search($id,$ListEchan_tab)===false){
					$sqlRemove="DELETE FROM tab_ehantillon_gl WHERE
								  compt_ech_gl='$Comp' AND  id_mission='$mission_id' AND objectif='A5' and GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles' and ref_ech_gl='$ref'
					";
					$reqRemove=$bdd->query($sqlRemove);
				}
				else if($GLGEN_ID==$id)
				{

				$sql_echantExist="select count(*) as 'nbr_resechant' 
								  from tab_ehantillon_gl 
								  where compt_ech_gl='$Comp' AND  id_mission='$mission_id' AND objectif='A5' and GL_GEN_CYCLE='B- Immobilisations incorporelles et corporelles' and ref_ech_gl='$ref'";
						
				$rpsEchant=$bdd->query($sql_echantExist);
				$donEchant=$rpsEchant->fetch();

		      				
				if($donEchant["nbr_resechant"]==0)
				{
					
								$sqlInser="INSERT INTO 	tab_ehantillon_gl (compt_ech_gl,date_ech_gl,journal_ech_gl,ref_ech_gl,libelle_ech_gl,debit_ech_gl,crd_ech_gl,sold_ech_gl, GL_GEN_CYCLE,objectif,id_mission,UTIL_ID,id_gl_associe) 
											VALUE ('".$donnees['GL_GEN_COMPTES']."','".$donnees['GL_GEN_DATE']."','".$donnees['GL_GEN_JL']."','".$donnees['GL_GEN_REF']."','".$donnees['GL_GEN_LIBELLE']."','".$donnees['GL_GEN_DEBIT']."','".$donnees['GL_GEN_CREDIT']."','".$donnees['GL_GEN_SOLDE']."','B- Immobilisations incorporelles et corporelles','A5','".$mission_id."','".$UTIL_ID."','".$ListEchan_tab[$i]."')";
						
								$reqInsert=$bdd->query($sqlInser);
								$file = $project_path.'/fichier/save_mission/mission.sql';
							/*See "Suvit global" for the reason of this remove*/
								// file_put_contents($file, $sqlInser.";", FILE_APPEND | LOCK_EX);
				}

				break;
			}

	   }
		$i++;

		
	}
?>