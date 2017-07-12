<?php

include_once "../../../connexion.php";

$idM=$_POST['idM'];

if(isset($_POST['suppr']))
{	
	$rubrique ='';
	$rubcycle ='';
	$type ='';
	$req = $bdd->prepare('UPDATE tab_ra SET rubrique_id = :idrub, Type = :typ, rubrique_cycle = :rub WHERE RA_ID=:id');
	   $val = $req->execute(array(
	    'idrub' => $rubrique,
	    'typ' => $type,
	    'rub' => $rubcycle,
	    'id' => $idM
	    ));
	    if($val)echo "ok";
	    else echo "error";
}else
{

	// $rubrique=$_POST['rubrique'];
	// $idcycle=$_POST['cycle'];
	// $type=$_POST['typeba'];
	$rubcycle=$_POST['rub'];
	$type='';
	$rubrique='';
	$req = $bdd->prepare('UPDATE tab_ra SET rubrique_id = :idrub, Type = :typ, rubrique_cycle = :rub WHERE RA_ID=:id');
	   $val = $req->execute(array(
	    'idrub' => $rubrique,
	    'typ' => $type,
	    'rub' => $rubcycle,
	    'id' => $idM
	    ));

	    if($val)echo "ok";
	    else echo "error";
	// $sql = "UPDATE tab_importer SET rubrique_id = $rubrique,Type = $type WHERE IMPORT_ID` =".$idM;


}

?>