<?php
include '../../connexion.php';
	$enregistrer_tableau_import1=$_POST['a'];
	$enregistrer_tableau_import2=$_POST['b'];
	$enregistrer_tableau_import3=$_POST['c'];
	$enregistrer_tableau_import4=$_POST['d'];
	$enregistrer_tableau_import5=$_POST['e'];
	$enregistrer_tableau_import6=$_POST['f'];
	$enregistrer_tableau_resultat1=$_POST['g'];
	$enregistrer_tableau_resultat2=$_POST['h'];
	$enregistrer_tableau_fondpropre=$_POST['i'];
	$mission_id=$_POST['j'];
	// echo $enregistrer_tableau_import1;
	// echo $enregistrer_tableau_import2;
	// echo $enregistrer_tableau_import3;
	// echo $enregistrer_tableau_import4;
	// echo $enregistrer_tableau_import5;
	// echo $enregistrer_tableau_import6;
	// echo $enregistrer_tableau_resultat1;
	// echo $enregistrer_tableau_resultat2;
	// echo $enregistrer_tableau_fondpropre;
	// echo $mission_id;
	
	$reponse=$bdd->exec('INSERT INTO tab_fond_ra(FOND_COMPTE,FOND_LIBELLE,FOND_SD_N,FOND_SC_N,FOND_SD_N1,
	FOND_SC_N1,FOND_SD_VARIATION,FOND_SC_VARIATION,FOND_COMMENTAIRE,MISSION_ID) VALUES ("'.$enregistrer_tableau_import1.'","'.$enregistrer_tableau_import2.'","'.$enregistrer_tableau_import3.'", "'.$enregistrer_tableau_import4.'","'.$enregistrer_tableau_import5.'","'.$enregistrer_tableau_import6.'", "'.$enregistrer_tableau_resultat1.'","'.$enregistrer_tableau_resultat2.'","'.$enregistrer_tableau_fondpropre.'","'.$mission_id.'")');
	
	// $req->execute(array(
		// 'a' => $enregistrer_tableau_import1,
		// 'b' => $enregistrer_tableau_import2,
		// 'c' => $enregistrer_tableau_import3,
		// 'd' => $enregistrer_tableau_import4,
		// 'e' => $enregistrer_tableau_import5,
		// 'f' => $enregistrer_tableau_import6,
		// 'g' => $enregistrer_tableau_resultat1,
		// 'h' => $enregistrer_tableau_resultat2,
		// 'i' => $enregistrer_tableau_fondpropre,
		// 'j' => $mission_id
	// ));
?>