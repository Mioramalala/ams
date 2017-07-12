<?php
    @session_start();
    include '../../../connexion.php';
	$UTIL_ID=$_SESSION['id'];
    
    $cptLbl=$_POST['cptLbl'];
    $lbl=$_POST['lbl'];
    $CPTN0=$_POST['CPTN0'];
    $CPTN1=$_POST['CPTN1'];
    $CPTN2=$_POST['CPTN2'];
    $CPTN3=$_POST['CPTN3'];
    $CPTN4=$_POST['CPTN4'];
    $mission_id=$_POST['mission_id'];
    $reference=$_POST['reference'];
    
    //echo $cptLbl.'/'.$lbl.'/'.$CPTN0.'/'.$CPTN1.'/'.$CPTN2.'/'.$CPTN3.'/'.$CPTN4.'/'.$mission_id.'/'.$reference;
    $queryId='select id from tab_rdc_cf_f4_2 where mission_id='.$mission_id.' and compte="'.$cptLbl.'" and reference="'.$reference.'"';
    echo $queryId;
    $reponseId=$bdd->query($queryId);
    $donneesId=$reponseId->fetch();
    if($donneesId['id']==0)
    {
        $queryInsert='insert into tab_rdc_cf_f4_2 (compte, libelle, N0, N1, N2, N3, N4, mission_id, reference,UTIL_ID) value ("'.$cptLbl.'","'.$lbl.'",'.$CPTN0.','.$CPTN1.','.$CPTN2.','.$CPTN3.','.$CPTN4.','.$mission_id.',"'.$reference.'","'.$UTIL_ID.'")';
        $reponseInsert=$bdd->exec($queryInsert);
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $queryInsert.";", FILE_APPEND | LOCK_EX);
		
        echo $queryInsert;
    }
    else
    {
        $queryUpdate='update tab_rdc_cf_f4_2 set UTIL_ID = '.$UTIL_ID.',N2='.$CPTN2.', N3='.$CPTN3.', N4='.$CPTN4.' where mission_id='.$mission_id.' and id='.$donneesId['id'];
        $reponseUpdate=$bdd->exec($queryUpdate);
		
		$file = '../../../fichier/save_mission/mission.sql';
		file_put_contents($file, $queryUpdate.";", FILE_APPEND | LOCK_EX);
        echo $queryUpdate;
    }

?>