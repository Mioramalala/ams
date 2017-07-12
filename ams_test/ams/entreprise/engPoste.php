<?php
	include '../connexion.php';
	$nomPost=array();
	$Titulaire=array();
	
	$idEntreprise=0;
	$nbrAct=0;
	$i=0;
	
	$nbrPost=$_POST['nbr'];
	$nomPost=$_POST['NomPost'];
	$Titulaire=$_POST['Titulaire'];
	
	
	////////////////////get id //////////////////////
$sql="SELECT MAX(ENTREPRISE_ID) AS idMAX  FROM tab_entreprise";
		$rep=$bdd->query($sql);
		
		while($donnee=$rep->fetch())
		$idEntreprise=$donnee['idMAX'];
		
		//echo $idEntreprise;
	
	////////////////////////////////////////////////////
	//echo $Titulaire[$i].''.$nomPost[$i].''.$idEntreprise[$i];
	
	for ($i=0;$i<$nbrPost;$i++){
	
	//echo 'nnnnnnnn'.$Titulaire[$i].''.$nomPost[$i].''.$idEntreprise[$i];

		$reqInsert=$bdd->prepare("INSERT INTO  tab_poste_cle ( POSTE_CLE_NOM,POSTE_CLE_TITULAIRE, ENTREPRISE_ID) VALUE (:a,:b,:c)");
		$reqInsert->execute(array(
		'a'=>$nomPost[$i],
		'b'=>$Titulaire[$i],
		'c'=>$idEntreprise
		
		));
}
	
	
	
?>