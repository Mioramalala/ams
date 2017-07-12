<?php
	include '../connexion.php';
@session_start();

 $compt1=$_POST["a"];
 $compt2=$_POST["b"];
 $group=$_POST["c"];
 $cycle=$_POST["d"];
 $id=$_POST["id"];
 $mission_Id=@$_SESSION['idMission'];
 $entreprise_id = $_SESSION['id_Entre'];

//selectionner tous les missions de l'entreprise
 $missions_q = $bdd->query('SELECT MISSION_ID FROM tab_mission WHERE ENTREPRISE_ID='.$entreprise_id);
 $missions = $missions_q->fetchAll();
 // var_dump($missions);


 $sql_update = 'UPDATE tab_bal_gen_mission SET compt1="'.$compt1.'", compt2="'.$compt2.'" WHERE (id_mission='.$mission_Id;
 foreach ($missions as $key => $value) {
 	if ($value["MISSION_ID"] != $mission_Id){
 		$sql_update.= " OR id_mission=".$value["MISSION_ID"];
 		
 	} 
 }

 $sql_update.=") AND id_bal_gen_miss=".$id;

 // echo $sql_update;
// var_dump($id);
//   die();
$reponse=$bdd->query('SELECT id_bal_gen_miss,compt1,compt2,groupBal,cycle FROM tab_bal_gen_mission WHERE id_mission='.$mission_Id);

$donnees=$reponse->fetch();

$bal_gen=$donnees['id_bal_gen_miss'];


if($donnees['id_bal_gen_miss'] > 0 && isset($id) ){
	// $req='UPDATE tab_bal_gen_mission SET compt1="'.$compt1.'", compt2="'.$compt2.'" WHERE id_mission='.$mission_Id.' AND id_bal_gen_miss='.$id;
	// echo $req;
	$reponse2 = $bdd->exec($sql_update);
	echo "update";
}
if(!isset($id)){
	$reqInsert=$bdd->prepare("INSERT INTO tab_bal_gen_mission(compt1, 
	compt2,groupBal,cycle,id_mission) VALUE (:a,:z,:e,:r,:t)");
	$reqInsert->execute(array(
	'a'=>$compt1,
	'z'=>$compt2 ,
	'e'=>$group ,
	'r'=>$cycle,
	't'=>$mission_Id
	));
	echo "insertion";
}
 echo "vita";
?>