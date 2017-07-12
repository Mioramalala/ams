<?php
 // Checking role superviseur, auditeur, admin in a task 
// by Sitraka
@session_start();
include 'connexion.php';
var_dump($_POST);
// $_POST["util_id"] = 20;
// $_POST["mission_id"] = 58;
// $_POST["tache_id"] = 2;
$statut = array("admin" => false, "superviseur" => false, "tache" => false);
// if admin or superadmin return admin 
// Role Admin à réétudier 

if(isset($_SESSION["nom"])){
	if($_SESSION["nom"] == "Administrateur" || $_SESSION["nom"] == "Super-Admin"){
		$statut["admin"] = true;
	}
}

//if superviseur return superviseur
if( isset($_POST["util_id"]) && isset($_POST["mission_id"]) ){
	$util_id = $_POST["util_id"];
	$mission_id = $_POST["mission_id"];

	$sth = $bdd->prepare("SELECT UTIL_ID from tab_superviseur WHERE MISSION_ID = :mission_id");
	$sth->execute([':mission_id' => $mission_id]);

	$u_id = $sth->fetchAll();

	if($u_id[0]["UTIL_ID"] ==$util_id ){
		$statut["superviseur"]= true;
	}
	else if(isset($_POST["tache_id"])){
		$tache_id = $_POST["tache_id"];
		$sth = $bdd->prepare("SELECT * from tab_distribution_tache WHERE MISSION_ID = :mission_id AND tache_id = :tache_id");
		$sth->execute([':mission_id' => $mission_id, ":tache_id" => $tache_id]);
		$res = $sth->fetchAll();
		if(count($res) > 0){
			$statut["tache"] =true;
		}
	}
} 

echo json_encode($statut);