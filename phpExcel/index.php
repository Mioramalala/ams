<?php 

	$bdd = new PDO('mysql:host=localhost;dbname=tms_ams','root', '');
	
	$comptes = fopen("Compta.txt", "r");
	$requete = 'INSERT INTO compte(numero, libelle) VALUES(:numero, :libelle)';
	
	while ($compte = fscanf($comptes, "%s - %[^\n]s")) {

		list ($numero, $libelle) = $compte;
		
		$req = $bdd->prepare($requete);
		$req->execute(array(
			'numero' => ($numero.''),
			'libelle' => $libelle
		));
	}
			
	fclose($comptes);

echo 'ok!';

?>