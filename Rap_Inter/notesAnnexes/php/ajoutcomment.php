<?php 
	if (isset($_POST["rubrique"])) {
		$libelle = addslashes($_POST["libelle"]);
		$rubrique_id = $_POST["rubrique"];
		$affichage = $_POST['affichage'];
		// $cycle = $_POST["cycle"];
		// $entreprise = $_POST["entreprise"];

		//start connexion
		require_once("../../../connexion.php");
	$sql = "SELECT `rubrique_id`as N
			FROM `tab_rubrique_com`
			WHERE `rubrique_id` =".$rubrique_id ;
	$req = $bdd->query($sql) or die($sql);
	// $i=1;
	$res = $req->rowCount();

		    if($res>0){
				$req = $bdd->prepare("UPDATE tab_rubrique_com
				SET  `commentaire` =:texte, `afficher` =:affichage
				WHERE rubrique_id = :idrub");
				$val = $req->execute(array(
				'idrub' => $rubrique_id,
				'texte' => $libelle,
				'affichage' => $affichage
				));
		    }else
		    {
				$sql = "INSERT INTO `tmsconsuams`.`tab_rubrique_com` 
				(`id`, `commentaire`, `rubrique_id`, `afficher`) 
				VALUES (NULL, '".$libelle."', ".$rubrique_id.", '".$affichage."');";

				$val = $bdd->exec($sql) or die($sql);

		    }
	if($val)echo "Enregistrement réussi.";
	else echo "Echec de l'enregistrement.";
	// if($val)echo "<span class='label label-success'>Enregistrement réussi.</span>";
	// else echo "<span class='label label-error'>Echec de l'enregistrement.</span>";
// echo $res;



		// if($val){
		// 	$num = $bdd->lastInsertId();
		// 	echo "<tr><td>$num</td><td>".stripslashes($libelle)."</td><td>&nbsp;</td></tr>";
		// }else echo "<tr><td>&nbsp;</td><td>Il y a une erreur.</td><td>&nbsp;</td></tr>";

		// $bdd = null;

	}
 ?>