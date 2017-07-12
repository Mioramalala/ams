<?php
@session_start();
$id=@$_SESSION['id'];
include '../connexion.php';
echo $id;

if(isset($_POST['a']) && isset($_POST['b']) ){
$nom=$_POST['a'];
$log=$_POST['b'];
}


//modification 

$req= $bdd-> prepare('UPDATE  tab_utilisateur SET  UTIL_NOM=:nom  WHERE UTIL_ID='.$id);
$req->execute(array(
'nom'=>$nom

));
$_SESSION['nom']=$nom;
?>

