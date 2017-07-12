<?php 
	
	if(true) {
		include '../../connexion.php';
		
		$mission_id = 33;
		$util_id    = 17;
		
		$tables_non_inclues = array(/*
			'',
			'tab_mission',
			'tab_bal_aux',
			'tab_bal_auxn1',
			'tab_bal_gen_mission',
			'tab_gl_aux',
			'tab_gl_auxc2',
			'tab_gl_auxc3',
			'tab_gl_auxc4',
			'tab_gl_auxc5',
			'tab_gl_auxc6',
			'tab_gl_auxc7',
			'tab_gl_gen',
			'tab_gl_genc2',
			'tab_gl_genc3',
			'tab_gl_genc4',
			'tab_gl_genc5',
			'tab_gl_genc6',
			'tab_gl_genc7',
			'tab_importer',
			'tab_importern1'*/
		);
		
		// selection des tables gerant les missions

		$tables = $bdd->query("show tables");
		$array_table = array();
		
		while ($ligne_table = $tables->fetch(PDO::FETCH_NUM)) {
			$table = $ligne_table[0];
			$colonnes = $bdd->query("show columns from $table");
			$array_colonnes = array();
			$table_mission = '';
			$champ_util_id = false;
			
			$table_lower = strtolower($table);
			$id = "";
			
			if(!array_search($table_lower, $tables_non_inclues)) {
				$i = 0;
				while ($ligne_colonne = $colonnes->fetch(PDO::FETCH_NUM)) {
					$colonne = $ligne_colonne[0];
					$colonne_lower = strtolower($colonne);
					if($i == 0 && ($colonne_lower == "id" || preg_match("#_id$#", $colonne_lower)))
						$id = $colonne;
					else $array_colonnes[] = $colonne;
					if($colonne_lower == "mission_id" || $colonne_lower == "id_mission") $table_mission = $colonne_lower;
					elseif($colonne_lower == "util_id") $champ_util_id = true;
					$i++;
				}
				
				if($table_mission != '' && $champ_util_id) {
					$array_table[] = array(
						"id"       => $id,
						"mission"  => $table_mission,
						"util_id"  => $champ_util_id,
						"table"    => $table,
						"colonnes" => $array_colonnes
					);
				}
			}
		}

		//foreach($array_table as $t) echo $t["table"]."<br>";
		
		// génération des requetes
		
		$fichier_mission = fopen('migration_tache.sql','w');
		foreach($array_table as $t) {
			fwrite($fichier_mission, "UPDATE ".$t["table"]." SET UTIL_ID = $util_id WHERE ".$t["mission"]." = $mission_id AND UTIL_ID != 1;\n");
		}
		
		fclose($fichier_mission);
	}
	
	echo "Génération des requêtes términée!";
	
?>