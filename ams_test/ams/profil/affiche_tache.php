<?php 

	include '../connexion.php';
	$user=$_POST['id_user'];
	$mission=$_POST['id_mission'];
	
	$sql1='select processus_tache,formulation_tache from tab_distribution_tache a,tab_tache b
			where mission_id="'.$mission.'"
			and util_id="'.$user.'" 
			and b.id_tache=a.tache_id';
	$repMiss=$bdd->query($sql1);
	$cycl="";		
					while($donneeMiss=$repMiss->fetch())
					{	
						if($cycl==$donneeMiss["processus_tache"]){
							echo ('<p><b> ==> </b>'.$donneeMiss["formulation_tache"].'</p>');
							$cycl=$donneeMiss["processus_tache"];
						}
						else {
								echo('<h1>'.$donneeMiss["processus_tache"].'</h1>');
								echo ('<p><b> ==> </b>'.$donneeMiss["formulation_tache"].'</p>');
								$cycl=$donneeMiss["processus_tache"];
						}
						
												
					}
			
?>