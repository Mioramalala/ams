<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include '../../../connexion.php';

$reference=$_POST['reference'];
$compte=$_POST['compte'];
$mission_id=$_POST['mission_id'];

/*
 * To detect the id in the table tab_rdc_cf_f7
 * and delete the data with the id
 */

$queryId='select id from tab_rdc_cf_f7 where compte="'.$compte.'" and mission_id='.$mission_id.' and reference="'.$reference.'"';
$reponseId=$bdd->query($queryId);
$donneeId=$reponseId->fetch();

echo $queryId;

/*
 * Delete the data with the id
 */

$queryDel='delete from tab_rdc_cf_f7 where mission_id='.$mission_id.' and id='.$donneeId['id'];
$reponseDel=$bdd->exec($queryDel);

 $file = '../../../fichier/save_mission/mission.sql';
file_put_contents($file, $queryDel.";", FILE_APPEND | LOCK_EX);

echo $queryDel;
?>
