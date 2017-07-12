<?php 
	
	if(isset($_GET['mission_id'])) {
		include '../../connexion.php';
		
		$mission_id = $_GET['mission_id'];
		$util_id    = $_SESSION['id'];
		
		$tables_non_inclues = array(/*
			'',
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
			'tab_importern1',*/
			'',
			'tab_mission'
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
					if($i == 0 && ($colonne_lower == "id" || preg_match("#_id$#", $colonne_lower) || preg_match("#^id_#", $colonne_lower)))
						$id = $colonne;
					else $array_colonnes[] = $colonne;
					if($colonne_lower == "mission_id" || $colonne_lower == "id_mission") $table_mission = $colonne;
					elseif($colonne_lower == "util_id") $champ_util_id = true;
					$i++;
				}
				
				if($table_mission != '') {
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
		
		$fichier_mission = fopen('mission.sql','w');
		foreach($array_table as $t) {
			$sql = "SELECT ";
			$i = 0;
			$count = count($t["colonnes"]);
			foreach($t["colonnes"] as $c) {
				$sql.= '`'.$c.'`';
				if($i < $count - 1)
					$sql.= ',';
				$i++;
			}
			$sql.= " FROM `".$t["table"]."` WHERE `".$t["mission"]."` = $mission_id".($t['util_id'] ? " AND `UTIL_ID` = $util_id" : "");
			
			$reponse_insert = $bdd->query($sql);
			$count_result = $reponse_insert->rowCount();
			if($count_result > 0 && $t['util_id']) {
				fwrite($fichier_mission, "DELETE FROM `".$t["table"]."` WHERE `".$t["mission"]."` = $mission_id".($t['util_id'] ? " AND `UTIL_ID` = $util_id" : "").";\n");
				
				$sql_insert = "INSERT INTO `".$t["table"]."`(";
				$i = 0;
				foreach($t["colonnes"] as $c) {
					$sql_insert.= '`'.$c.'`';
					if($i < $count - 1)
						$sql_insert.= ',';
					$i++;
				}
				$sql_insert .= ") VALUES";
				$j = 0;
				while($donnee_insert = $reponse_insert->fetch()) {
					$sql_insert .= "(";
					$i = 0;
					foreach($t["colonnes"] as $c) {
						$sql_insert.= '"'.addslashes($donnee_insert[$c]).'"';
						if($i < $count - 1)
							$sql_insert.= ',';
						$i++;
					}
					$sql_insert .= ")";
					if($j < $count_result - 1) $sql_insert .= ",";
					$j++;
				}
				$sql_insert .= ";\n";
				
				fwrite($fichier_mission, $sql_insert);
			}
		}
		
		fclose($fichier_mission);
	}

	$pathFichierMission = "mission.sql";

	ini_set('zlib.output_compression', 0);
	$date1 = gmdate(DATE_RFC1123);
	 
	header('Pragma: public');
	header('Cache-Control: must-revalidate, pre-check=0, post-check=0, max-age=0');
	 
	header('Content-Tranfer-Encoding: none');
	header('Content-Length: '.filesize($pathFichierMission));
	header('Content-MD5: '.base64_encode(md5_file($pathFichierMission)));
	header('Content-Type: application/octetstream; name="mission_'.$mission_id.'.sql"');
	header('Content-Disposition: attachment; filename="mission_'.$mission_id.'.sql"');
	 
	header('Date: '.$date1);
	header('Expires: '.gmdate(DATE_RFC1123, time()+1));
	header('Last-Modified: '.gmdate(DATE_RFC1123, filemtime($pathFichierMission)));
	 
	readfile($pathFichierMission);
	exit; // 
 
	echo "Génération des requêtes términée!";
	
?>