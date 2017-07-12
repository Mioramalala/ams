<?php 
	// session_start();
		require_once("../../../connexion.php");
	//requiert
	$rubrique_id = @$_POST['rubrique'];

if($rubrique_id !="")
{
	$sql = "SELECT `sous_id`, `rubrique_libelle`, `rubrique_id` FROM `tab_rubrique_sous` WHERE `rubrique_id`=".$rubrique_id." ORDER BY `rubrique_libelle` ASC ";
	$req = $bdd->query($sql) or die($sql);
	$option ="";
	while($res = $req->fetch())
	{
		$option .= "<option value=".$res['sous_id'].">";
		$option .= stripslashes($res['rubrique_libelle']);
		$option .= "</option>";
	}
	if($req)
		echo $option; 
	else echo "error";
}
?>