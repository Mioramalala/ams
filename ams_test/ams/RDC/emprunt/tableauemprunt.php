<?php
include '../../connexion.php';
	$enregistrer_tableau_import1=$_POST['a'];
	$enregistrer_tableau_import2=$_POST['b'];
	$enregistrer_tableau_import3=$_POST['c'];
	$enregistrer_tableau_import4=$_POST['d'];
	$enregistrer_tableau_import5=$_POST['e'];
	$enregistrer_tableau_import6=$_POST['f'];
	$enregistrer_tableau_import7=$_POST['g'];
	$enregistrer_tableau_import8=$_POST['h'];
	$enregistrer_tableau_import9=$_POST['i'];
	$enregistrer_tableau_import10=$_POST['j'];
	$enregistrer_tableau_import11=$_POST['k'];
	$enregistrer_tableau_import12=$_POST['l'];
	$enregistrer_tableau_import13=$_POST['m'];
	$mission_id=$_POST['n'];
	
	$reponse=$bdd->exec('INSERT INTO tab_ra(RA_COMPTE,RA_LIBELLE,RA_D,RA_C,RA_SD_N,RA_SC_N,RA_SD_N1,
	RA_SC_N1,RA_SD_VARIATION,RA_SC_VARIATION,RA_POURCENTAGE_D,RA_POURCENTAGE_C,RA_COMMENTAIRE,MISSION_ID,RA_CYCLE) VALUES ("'.$enregistrer_tableau_import1.'","'.$enregistrer_tableau_import2.'","'.$enregistrer_tableau_import3.'", "'.$enregistrer_tableau_import4.'","'.$enregistrer_tableau_import5.'","'.$enregistrer_tableau_import6.'", "'.$enregistrer_tableau_import7.'","'.$enregistrer_tableau_import8.'","'.$enregistrer_tableau_import9.'","'.$enregistrer_tableau_import10.'","'.$enregistrer_tableau_import11.'","'.$enregistrer_tableau_import12.'","'.$enregistrer_tableau_import13.'","'.$mission_id.'","emprunt")');
	// $req = $bdd->prepare('INSERT INTO tab_ra(RA_COMPTE,RA_LIBELLE,RA_D,RA_C,RA_SD_N,RA_SC_N,RA_SD_N1,
	// RA_SC_N1,RA_SD_VARIATION,RA_SC_VARIATION,RA_POURCENTAGE_D,RA_POURCENTAGE_C,RA_COMMENTAIRE,MISSION_ID) VALUES (:a, :b, :c, :d, :e, :f, :g, :h, :i,:j, :k, :l, :m, :n)');
	
	// $req->execute(array(
		// 'a' => $enregistrer_tableau_import1,
		// 'b' => $enregistrer_tableau_import2,
		// 'c' => $enregistrer_tableau_import3,
		// 'd' => $enregistrer_tableau_import4,
		// 'e' => $enregistrer_tableau_import5,
		// 'f' => $enregistrer_tableau_import6,
		// 'g' => $enregistrer_tableau_import7,
		// 'h' => $enregistrer_tableau_import8,
		// 'i' => $enregistrer_tableau_import9,
		// 'j' => $enregistrer_tableau_import10,
		// 'k' => $enregistrer_tableau_import11,
		// 'l' => $enregistrer_tableau_import12,
		// 'm' => $enregistrer_tableau_import13,
		// 'n' => $mission_id
	// ));
?>