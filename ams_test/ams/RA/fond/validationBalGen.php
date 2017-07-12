<?php
	include '../connexion.php';
@session_start();

$UTIL_ID=$_SESSION['id'];
 $compt1=$_POST["a"];
 $compt2=$_POST["b"];
 $group=$_POST["c"];
 $cycle=$_POST["d"];
 $mission_Id=@$_SESSION['idMission'];
 
$reponse=$bdd->query('SELECT id_bal_gen_miss,compt1,compt2,groupBal,cycle FROM tab_bal_gen_mission WHERE id_mission='.$mission_Id);

$donnees=$reponse->fetch();

$bal_gen=$donnees['id_bal_gen_miss'];


$reqInsert=$bdd->prepare("INSERT INTO  tab_bal_gen_mission(compt1, 
compt2,groupBal,cycle,id_mission) VALUE (:a,:z,:e,:r,:t,:y)");
$reqInsert->execute(array(
'a'=>$compt1,
'z'=>$compt2 ,
'e'=>$group ,
'r'=>$cycle,
't'=>$mission_Id,
'y'=>$UTIL_ID
));
 echo "vita";
?>