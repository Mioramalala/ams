<?php

function remplir_tab_par_cycle($nom_cycle, $mission_id){
		include '../../connexion.php';	
		
		
		$reponse=$bdd->query("
			SELECT * FROM
			(SELECT (IMPORT_SOLDE-IMPORTN1_SOLDE) AS VARIATION, IMPORT_ID, IMPORTN1_COMPTES AS COMPTE, IMPORTN1_SOLDE, IMPORT_SOLDE, IMPORT_INTITULES AS INTITULE, IMPORT_DEBIT, IMPORT_CREDIT
			FROM tab_importern1
			INNER JOIN tab_importer ON tab_importern1.IMPORTN1_COMPTES = tab_importer.IMPORT_COMPTES
			AND tab_importern1.MISSION_ID = tab_importer.MISSION_ID
			WHERE IMPORT_CYCLE='".$nom_cycle."' 
			AND tab_importer.MISSION_ID=".$mission_id."

			UNION

			SELECT COALESCE(IMPORT_SOLDE,0) AS VARIATION, IMPORT_ID, IMPORT_COMPTES AS COMPTE, COALESCE(IMPORTN1_SOLDE,0), COALESCE(IMPORT_SOLDE,0), IMPORT_INTITULES AS INTITULE, COALESCE(IMPORT_DEBIT,0), COALESCE(IMPORT_CREDIT,0)
			FROM tab_importern1
			RIGHT JOIN tab_importer ON tab_importern1.IMPORTN1_COMPTES = tab_importer.IMPORT_COMPTES
			AND tab_importern1.MISSION_ID = tab_importer.MISSION_ID
			WHERE tab_importern1.IMPORTN1_COMPTES IS NULL AND IMPORT_CYCLE='".$nom_cycle."' 
			AND tab_importer.MISSION_ID=".$mission_id."

			UNION

			SELECT COALESCE(-IMPORTN1_SOLDE,0) AS VARIATION, IMPORTN1_ID AS IMPORT_ID, IMPORTN1_COMPTES AS COMPTE, COALESCE(IMPORTN1_SOLDE,0) , COALESCE(IMPORT_SOLDE,0) , IMPORTN1_INTITULES AS INTITULE, COALESCE(IMPORT_DEBIT,0), COALESCE(IMPORT_CREDIT,0)
			FROM tab_importern1
			LEFT JOIN tab_importer ON tab_importern1.IMPORTN1_COMPTES = tab_importer.IMPORT_COMPTES
			AND tab_importern1.MISSION_ID = tab_importer.MISSION_ID
			WHERE tab_importer.IMPORT_COMPTES IS NULL AND IMPORTN1_CYCLE='".$nom_cycle."' 
			AND tab_importern1.MISSION_ID=".$mission_id.") AS T1
			
			GROUP BY COMPTE
			ORDER BY COMPTE ASC
		");

		return $reponse;
}

function afficherCommentaire($num_compte, $nom_cycle, $mission_id){
	include '../../connexion.php';		
	
	$rep = $bdd->query(' SELECT DISTINCT RA_COMMENTAIRE from tab_ra WHERE MISSION_ID= "' .$mission_id .'" AND RA_COMPTE= "' .$num_compte .'" AND RA_CYCLE= "' .$nom_cycle  .'"' );

	$donnees= $rep->fetch();
	$commentaire= $donnees['RA_COMMENTAIRE'];

	return $commentaire;
}

function conclusion_existante($nom_cycle, $mission_id){
	include '../../connexion.php';
	$conclusion = false;

	$sql='SELECT COUNT(CONCLUSION) AS COMPTE FROM  tab_conclusion_ra where MISSION_ID='.$mission_id.' AND CONCLUSION_OBJECTIF="'.$nom_cycle.'"';
	$reponse = $bdd->query($sql);
	$donnees= $reponse->fetch();

	if($donnees["COMPTE"]>0){
		$conclusion = true;
	}

	return $conclusion;
}

function superviseur($nom_user){
	include '../../connexion.php';
	$estUnSuperviseur = false;

	$sql="SELECT UTIL_STATUT FROM tab_utilisateur WHERE UTIL_LOGIN='".$nom_user."'";
	$reponse = $bdd->query($sql);
		
	$donnees=$reponse->fetch();
	$statut = $donnees["UTIL_STATUT"];

	if($statut==2){$estUnSuperviseur = true;}

	return $estUnSuperviseur;
}

function totalisationRisque($tableau_risque, $nb){
	$longeur = count($tableau_risque);

	$risques = array(
	"Faible" => 0,
	"Moyen" => 0,
	"Elevé" => 0
	);

	for($i=0; $i<$longeur; $i++){
		if($tableau_risque[$i]=="faible"){$risques["Faible"]++;}
		else if($tableau_risque[$i]=="moyen"){$risques["Moyen"]++;}
		else if($tableau_risque[$i]=="eleve"){$risques["Elevé"]++;}
	}
	$max = array_keys($risques, max($risques));

	echo "<select id='calculRisque".$nb."'>";
	foreach ($max as $val) {
		echo "<option name=".$val." value=".$val.">".$val."</option>";
	}
	echo "</select>";
}
// ------------      totalisationRisque por incidance ------------ //


function totalisationRisque_Incid($tableau_risque, $nb){
	$longeur = count($tableau_risque);

	$risques = array(
	"faible" => 0,
	"moyen" => 0,
	"eleve" => 0
	);

	for($i=0; $i<$longeur; $i++){
		if($tableau_risque[$i]=="faible"){$risques["faible"]++;}
		else if($tableau_risque[$i]=="moyen"){$risques["moyen"]++;}
		else if($tableau_risque[$i]=="eleve"){$risques["eleve"]++;}
	}
	$max = array_keys($risques, max($risques));

	foreach ($max as $val) {
		echo $val;
	}
}
function totalisationRisqueTreso($risque_dep, $risque_rec, $nb){
	$longeur = count($risque_dep);

	$risques = array(
	"Faible" => 0,
	"Moyen" => 0,
	"Elevé" => 0
	);

	for($i=0; $i<$longeur; $i++){
		if($risque_dep[$i]=="faible"){$risques["Faible"]++;}
		if($risque_dep[$i]=="moyen"){$risques["Moyen"]++;}
		if($risque_dep[$i]=="eleve"){$risques["Elevé"]++;}
		if($risque_rec[$i]=="faible"){$risques["Faible"]++;}
		if($risque_rec[$i]=="moyen"){$risques["Moyen"]++;}
		if($risque_rec[$i]=="eleve"){$risques["Elevé"]++;}
	}

	$max = array_keys($risques, max($risques));

	echo "<select id='calculRisque".$nb."'>";
	foreach ($max as $val) {
		echo "<option name=".$val." value=".$val.">".$val."</option>";
	}
	echo "</select>";

}

function remplir_tab_risques($cycle, $mission_id){

	include '../connexion.php';		
	$risques = array();
	foreach ($cycle as $cycle_id) {

			$requete = $bdd->query('SELECT CONCLUSION_RISQUE FROM tab_conclusion WHERE MISSION_ID  = '.$mission_id.' AND CYCLE_ACHAT_ID= '.$cycle_id);
			$lignes = $requete->rowCount();

			if( $lignes != 0) {

				$donnee = $requete->fetch();
				array_push($risques, utf8_encode($donnee['CONCLUSION_RISQUE']));

			}else{

				$requete = $bdd->query('SELECT SYNTHESE_RISQUE FROM tab_synthese WHERE MISSION_ID  = '.$mission_id.' AND CYCLE_ACHAT_ID= '.$cycle_id);
				$donnee = $requete->fetch();
				array_push($risques, utf8_encode($donnee['SYNTHESE_RISQUE']));
			}
	}
	return $risques;
}

function selectTresorerie($risques_dep, $risques_rec, $indice, $num) {
	if(trim($risques_rec[$indice])!="" || trim($risques_dep[$indice])!=""){
	echo 
	"
	<select id='calculRisque".$num."'>
	";
		echo "<option disabled selected='selected'>Votre choix</option>";		
		if($risques_rec[$indice]!=""){
			echo "<option value=".$risques_rec[$indice]." name=".$risques_rec[$indice].">".$risques_rec[$indice]."</option>";
		}
		if($risques_dep[$indice]!=""){
			echo "<option value=".$risques_dep[$indice]." name=".$risques_dep[$indice].">".$risques_dep[$indice]."</option>";
		}
	
	echo "</select>";
	}
}

function recupRisque($mission_id,$domaine, $nom_objectif){
	include '../connexion.php';

		$risques="";
		$requete = $bdd->query('SELECT * FROM tab_synthese_rsci_ra WHERE MISSION_ID  = '.$mission_id.' AND DOMAINE="'.utf8_decode($domaine).'"');

		$donnee = $requete->fetch();

		// array_push($risques, $donnee["CARACTERE"]);
		// array_push($risques, $donnee["EXHAUSTIVITE"]);
		// array_push($risques, $donnee["REALITE"]);
		// array_push($risques, $donnee["PROPRIETE"]);
		// array_push($risques, $donnee["EVALUATION_CORRECTE"]);
		// array_push($risques, $donnee["ENREGISTREMENT_BP"]);
		// array_push($risques, $donnee["IMPUTATION_CORRECTE"]);
		// array_push($risques, $donnee["BONNE_INFORMATION"]);
		// array_push($risques, $donnee["RISQUE_GF"]);
		$risques = $donnee[$nom_objectif];
		return $risques;
}

function afficherOption($mission_id, $domaine, $nom_objectif, $numero){
	if(trim(recupRisque($mission_id, $domaine, $nom_objectif)!="")){
		echo "<p id='calculRisque".$numero."'>".recupRisque($mission_id, $domaine, $nom_objectif)."</p>";
	}
	else{
		echo "
			<select id='calculRisque".$numero."'>
				<option disabled selected=selected'value='Votre choix'>Votre choix</option>
				<option name='Faible' value='faible'>Faible</option>
				<option name='Moyen' value='moyen'>Moyen</option>
				<option name='Elevé' value='eleve'>Elevé</option>
			</select>
		";
	}
}

function afficherOptionTreso($mission_id, $domaine, $nom_objectif, $risques_dep, $risques_rec, $indice, $numero){
	if(trim(recupRisque($mission_id, $domaine, $nom_objectif)!="")){
		echo "<p id='calculRisque".$numero."'>".recupRisque($mission_id, $domaine, $nom_objectif)."</p>";
	}
	else{
		selectTresorerie($risques_dep, $risques_rec, $indice, $numero);
	}
}
?>