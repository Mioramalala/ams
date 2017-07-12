<?php
include '../../connexion.php';
	$mission_id=$_POST['mission_id'];
	$conclusion_stock=$_POST['conclusion_stock'];
	
	$reponse0=$bdd->query('select CONCLUSION_RA_ID from   tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="stock"');
	
	$donnees0=$reponse0->fetch();
	
	if($donnees0['CONCLUSION_RA_ID']!=0){
		$reponse1=$bdd->exec('update  tab_conclusion_ra set CONCLUSION="'.$conclusion_stock.'" where CONCLUSION_RA_ID='.$donnees0['CONCLUSION_RA_ID']);
		if(!$reponse1) echo  'update  tab_conclusion_ra CONCLUSION="'.$conclusion_stock.'" where CONCLUSION_RA_ID='.$donnees0['CONCLUSION_RA_ID'];
	}
	else{
		$reponse=$bdd->exec('INSERT INTO  tab_conclusion_ra(CONCLUSION,CONCLUSION_OBJECTIF,MISSION_ID) VALUE 
	("'.$conclusion_stock.'","stock","'.$mission_id.'")');
	}
	
?>