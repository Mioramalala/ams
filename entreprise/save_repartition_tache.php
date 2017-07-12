<?php 
	if (isset($_POST['idMission'])) {
		require '../connexion.php';

		/* var recupérés en post
		 * 		from: repartition_tache.php
		 */
		$idMission = $_POST['idMission'];

		if (isset($_POST['repartitionTache'])) {

			/* Insertion de la repartition des taches dans la bdd
			 * parametres:
			 *		$repTache[], $idMission
			 *	table cible:
			 *		tab_distribution_tache
			 */

			$repTache = $_POST['repartitionTache'];

			//cas où la mission a déja une repartition de tache
			$sql = "update tab_distribution_tache set statut = 'inactif' where (mission_id =".$idMission." and tache_superviseur = 'non')";
			$bdd->exec($sql);
			
			//insertion de la nouvelle repartition des taches
			$sql = "insert into 
					tab_distribution_tache (tache_id, util_id, mission_id) 
					values (:idTache, :idAuditeur, ".$idMission.")
					on duplicate key 
					update statut = 'actif'";
			$req = $bdd->prepare($sql);

			foreach ($repTache as $tacheUnitaire) {
				$req->execute(array(
					'idTache' => $tacheUnitaire["tache"],
					'idAuditeur' => $tacheUnitaire["auditeur"],
					));
			}

			echo "Répartition des tâches enregistrée";
		}
		
		if (isset($_POST['idAuditeur']) && isset($_POST['action'])){
			
			/* Modification de la table des collaborateurs selon l'action
		 	 * paramètres:
		 	 *		$idAuditeur, $action
			 * table cible:
			 *		tab_collaborateur
			 */

			$idAuditeur = $_POST['idAuditeur'];
			$action = $_POST['action'];

			if ($action == "supprimer") {
				$sqlRemove = "update tab_collaborateur set collab_statut = 'inactif' where collab_util_id = ".$idAuditeur." and collab_mission_id =".$idMission;
				$bdd->exec($sqlRemove);

				//msg
				echo "L'auditeur a bien été retiré";
			}

			else if ($action == "ajouter") {
				//select du nom de l'auditeur à ajouter
				$sqlAdd = "select util_nom from tab_utilisateur where util_id=".$idAuditeur;
				$reqAdd = $bdd->query($sqlAdd);
				$repAdd = $reqAdd->fetch();
				$nom = $repAdd["util_nom"];

				//insert dans tab_collaborateur
				$sqlAdd = "	insert into tab_collaborateur (collab_util_id, collab_util_nom, collab_mission_id) 
							values (".$idAuditeur.",'".$nom."',".$idMission.")
							on duplicate key 
							update collab_statut = 'actif'";
				$bdd->exec($sqlAdd);

				//msg
				echo "L'auditeur a bien été ajouté";
			}
		}
	} else {
		echo "Erreur de connexion";
	}
?>