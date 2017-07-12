<?php 
	if(	isset($_POST['type-mission']) 
		&& isset($_POST['exercice-audite'])
		&& isset($_POST['dateDebut'])
		&& isset($_POST['dateFin'])
		&& isset($_POST['deadline'])
		&& isset($_POST['superviseur'])
		&& isset($_POST['intervenant'])
		&& isset($_POST['idEntreprise']))		
	{
		/*Les variables recuperés en POST*/
		$typeMission = $_POST['type-mission'];
		$exerciceAudite = $_POST['exercice-audite'];
		$dateDebut = $_POST['dateDebut'];
		$dateFin = $_POST['dateFin'];
		$deadline = $_POST['deadline'];
		$superviseur = $_POST['superviseur'];
		$intervenant = $_POST['intervenant'];
		$idEntreprise = $_POST['idEntreprise'];

		//nombre de superviseur et d'intervenant
		$nbrIntervenant = count($intervenant);

		//connexion à la base
		require '../connexion.php';

		/* Enregistrement de la mission
		 * paramètres:
		 *		dateDebut, dateFin, exerciceAudite, typeMission, idEntreprise, deadline
		 * table intervenant à la creation de la mission:
		 *		tab_mission
		 */
		
			$sql = "INSERT INTO  
					tab_mission ( 	MISSION_DATE_DEBUT, 
									MISSION_DATE_CLOTURE, 
									MISSION_ANNEE, 
									MISSION_TYPE,
									ENTREPRISE_ID,
									MISSION_DEADLINE,
									DATE_NOW) 
					VALUE (	'".$dateDebut."',
							'".$dateFin."',
							".$exerciceAudite.",
							'".$typeMission."',
							".$idEntreprise.",
							'".$deadline."',
							now()
							)";
			
			//echo $sql;
			if($bdd->exec($sql)) {
				$idMission = $bdd->lastInsertId(); //on recupère l'id de la mission créée
			} else {
				print_r($bdd->errorInfo());
			}
		
		/* Fin enregistrement de la mission*/

		/* Création du dossier de la mission
		 * paramètres:
		 * 		idEntreprise,idMission
		 * table intervenant à la création du dossier de la mission:
		 *		tab_entreprise
		 */

			//$idMission = $bdd->lastInsertId();

			$sql = "SELECT ENTREPRISE_DENOMINATION_SOCIAL FROM tab_entreprise WHERE ENTREPRISE_ID='".$idEntreprise."'";
			$req = $bdd->query($sql);
			$res = $req->fetch();

			$nomEntreprise = $res['ENTREPRISE_DENOMINATION_SOCIAL'];

			$cheminDossier='../repertoire_document/doc_'.$nomEntreprise.'/Mission_'.$idMission;
			//echo $cheminDossier;
			mkdir($cheminDossier,0777,true);

		/* Fin création du dossier de la mission*/

		/* Enregistrement des superviseur
		 * paramètre:
		 *		listeSuperviseur[](nom), superviseur(id), idMission, nbrSuperviseur
		 * table intervenant à l'enregistrement des superviseurs:
		 *		tab_superviseur
		 */

			//recupère le nom du superviseur
			$req = $bdd->query("SELECT UTIL_NOM from tab_utilisateur where UTIL_ID = ".$superviseur);
			$res = $req->fetch();
			$nomSuperviseur = $res["UTIL_NOM"];

			//insert dans la table superviseur
			$bdd->exec("INSERT INTO tab_superviseur (SUPERVISEUR_NOM,MISSION_ID,UTIL_ID) VALUE ('".$nomSuperviseur."',".$idMission.",".$superviseur.")");

			//ajout des taches du superviseur
			$idTachePlanification = array (4,9,10,18,23,29,39,48,51,54,58);
			$sql = "insert into tab_distribution_tache (tache_id, util_id, mission_id, tache_superviseur) values (:idTache, ".$superviseur.",".$idMission.", 'oui')";
			$req = $bdd->prepare($sql);
			foreach ($idTachePlanification as  $idTache) {
				$req->execute(array('idTache' => $idTache));
			}

			/* Enregistrement des superviseurs
		 		* paramètre:
		 		*		listeIntervenant[](nom), intervenant(id), idMission
		 		* table intervenant à l'enregistrement des superviseurs:
		 		*		tab_collaborateur
		 	*/
		 		
		 		//recuperer le nom des intervenants dans listeIntervenant
		 		$listeIntervenant = array();

		 		$reqIntervenant = $bdd->prepare("SELECT UTIL_NOM from tab_utilisateur where UTIL_ID = :id");
		 		foreach ($intervenant as $idIntervenant) {
		 			$reqIntervenant->execute(array('id' => $idIntervenant));
		 			$res = $reqIntervenant->fetch();
		 			$listeIntervenant[] = $res['UTIL_NOM'];
		 		}

		 		//insert dans la table tab_collaborateur
		 		$req = $bdd->prepare("INSERT INTO tab_collaborateur (collab_util_id, collab_util_nom, collab_mission_id) VALUE (:idUtilisateur, :nomIntervenant,:idMission)");
				foreach (array_combine($intervenant, $listeIntervenant) as $idUtilisateur => $nomIntervenant) {
					$req->execute(array(
						'idUtilisateur' => $idUtilisateur,
						'nomIntervenant' => $nomIntervenant,
						'idMission' => $idMission 
					));
				}

		echo $idMission;
	}
	else echo "Erreur de connexion"; 

?>