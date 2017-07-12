<?php 

 include '../connexion.php';

 $nom=$_POST["a"];
 $login=$_POST["b"];
 $mdp=$_POST["c"];
 $status=0;
 $actif=$_POST["e"];
 
 $reqInsert=$bdd->prepare("INSERT INTO  tab_utilisateur ( UTIL_NOM, 
UTIL_LOGIN, UTIL_MDP , UTIL_STATUT, UTIL_ACTIF ) VALUE (:a,:z,:e,:r,:t)");
$reqInsert->execute(array(
'a'=>$nom,
'z'=>$login ,
'e'=>$mdp ,
'r'=>$status,
't'=>$actif
));

 //send mail to news user//

//************************ DEBUT Envoye email de confirmation inscription artiste *****************************
$destinataire=$login;
$expediteur="ams.organisation@gmail.com";
$titreemail="Invitation sur AMS";

$reponse=$expediteur;
$codehtml=
"<html><body>
<br>Vous êtes maintenant inscrit sur la liste des utilisateurs de l'application AMS.<br>
<br> votre mot de passe est:<b>   ". $mdp ."   </b> mais vous pouvez le changer dans votre profil
<br>L'adresse de l'application est:  http://ams.tms-consulting.pro/  .
<br>
<br>
<br>

<br>La direction 
</body></html>";
@mail($destinataire,"Un email venant de $titreemail",$codehtml,
     "From: $expediteur\r\n".
        "Reply-To: $reponse\r\n".
        "Content-Type: text/html; charset=\"iso-8859-1\"\r\n");  
//************************ FIN Envoye email de confirmation inscription artiste *****************************
 ?>
 
 