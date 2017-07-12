<?php

session_start();
include_once '../connexion.php';

$nomOrigine = $_FILES['monfichier']['name'];
$elementsChemin = pathinfo($nomOrigine);
$extensionFichier = $elementsChemin['extension'];
$extensionsAutorisees = array("jpeg", "jpg", "gif","pdf");
if (!(in_array($extensionFichier, $extensionsAutorisees))) {
    echo "Le fichier n'a pas l'extension attendue";
} else {    
    // Copie dans le repertoire du script avec un nom
    // incluant l'heure a la seconde pres 
    $repertoireDestination = "../uploads/";
    $nomDestination = "Rapport_general.".$extensionFichier;

    $fichier1 = '../uploads/Rapport_general.pdf';
    $fichier2 = '../uploads/Rapport_general.jpg';
    $fichier3 = '../uploads/Rapport_general.jpeg';
    $fichier4 = '../uploads/Rapport_general.gif';

    if (file_exists($fichier1))       
        unlink($fichier1);  
    if (file_exists($fichier2))       
        unlink($fichier2); 
    if (file_exists($fichier3))       
        unlink($fichier3); 
    if (file_exists($fichier4))       
        unlink($fichier4); 

    //ENREGISTREMENT D'UN RAPPORT UPLOADE BY NIAINA
    $sql1 = $bdd->prepare('DELETE FROM tab_rapport WHERE ID_MISSION=:id AND TYPE_GENERATION LIKE :type');
    $sql1->execute(array(
        'id' => $_SESSION['idMission'],
        'type' => 'upload_rapport_general'
    ));
    $sql2 = $bdd->prepare('INSERT INTO tab_rapport(ID_MISSION, DATE_GENERATION, TYPE_GENERATION, NAME) VALUES(:id,DATE_FORMAT(now(), \'%d-%m-%Y\'),:type,:name)');
    $sql2->execute(array(
        'id' => $_SESSION['idMission'],
        'type' => 'upload_rapport_general',
        'name' => "Rapport_general.".$extensionFichier
    ));

    if (move_uploaded_file($_FILES["monfichier"]["tmp_name"], $repertoireDestination.$nomDestination)) {

?>

<script>
    alert("Le fichier a uploadé avec succès !");
    window.location.href="../accueil.php";
</script>

<?php

    } else {

?>

<script>
    alert("Le fichier n'a pas été uploadé (trop gros ?) ou le déplacement du fichier temporaire a échoué");
    window.location.href="../accueil.php";
</script>

<?php

    }
}

?>
