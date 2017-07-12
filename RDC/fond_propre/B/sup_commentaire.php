<?php
include '../../../connexion.php';
$idcomt=$_GET["idcomt"];
$sql = "delete from  tbl_rdc_fond_propre_commentaire where id='$idcomt'";
$bdd->query($sql);
print ("SUPOK");
?>