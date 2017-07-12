<?php
	include '../connexion.php';
	$nomAct=array();
	$partAct=array();
	//$pourCAct=array();
	$idEntreprise=0;
	$nbrAct=0;
	$i=0;
	
	$nbrAct=$_POST['nbr'];
	$nomAct=$_POST['NomAct'];
	$partAct=$_POST['PartAct'];
	//$pourCAct=$_POST['txtpouC'];
	
	////////////////////get id //////////////////////
$sql="SELECT MAX(ENTREPRISE_ID) AS idMAX  FROM tab_entreprise";
		$rep=$bdd->query($sql);
		
		while($donnee=$rep->fetch())
		$idEntreprise=$donnee['idMAX'];
		
		//echo $idEntreprise;
	
	////////////////////////////////////////////////////

	
	for ($i=0;$i<$nbrAct;$i++){
	//echo $nomAct[$i].''.$partAct[$i].''.$pourCAct[$i];

		$reqInsert=$bdd->prepare("INSERT INTO  tab_actionnaire ( ACTIONNAIRE_NOM, 
		ACTIONNAIRE_PART , ENTREPRISE_ID) VALUE (:a,:z,:r)");
		$reqInsert->execute(array(
		'a'=>$nomAct[$i],
		'z'=>$partAct[$i] ,
		'r'=>$idEntreprise
		
		));
}
	
	
	
	
?>