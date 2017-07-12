<?php 

	@session_start();
	$mission_id=@$_SESSION['idMission'];
	$UTIL_ID = $_SESSION['id'];

		/*
		Please don't move this file, it's using relative path #Jimmy
		
		Also, I decided to use __FILE__ to avoid problem with relative path if this file is included by some over file
		
		I'll define the project path if you want to move, the best solution is to direcly execute the request, not using two steps
		*/
	$project_path = dirname(__FILE__)."/../../../"; #using $project_path
	
	/*
	end #Jimmy
	*/
	include "$project_path/connexion.php";

	$id_=array();
	$libelle=array();
	$v_brute=array();
	$amortissement=array();
	$v_nette=array();

	$numero_compte=array();
	$import_debit=array();
	$import_credit=array();

	$v_brute2=array();
	$amortissement2=array();
	$dotation_exercice=array();
	$ecart_bg_amortissement=array();





	$id_=$_POST["id_"];
	$libelle=$_POST["libelle"];
	$v_brute=$_POST["v_brute"];
	$amortissement=$_POST["amortissement"];
	$v_nette=$_POST["v_nette"];

	$numero_compte=$_POST["numero_compte"];
	$import_debit=$_POST["import_debit"];
	$import_credit=$_POST["import_credit"];

	$v_brute2=$_POST["v_brute2"];
	$amortissement2=$_POST["amortissement2"];
	$dotation_exercice=$_POST["dotation_exercice"];
	$ecart_bg_amortissement=$_POST["ecart_bg_amortissement"];



	$sql="";
	$id=0;	
	//var_dump($id_);
	foreach ($id_ as  $Idrdcvalue) 
	{
		global $id,$libelle;

		if($Idrdcvalue=="")
		{
			//INSERTION

			$sql = "insert into tab_rdc_immo_partie2 (mission_id,numero_compte,libelle,v_brute,amortissement,v_nette,v_brute2,amortissement_cumule,dotation_exercice,ecart_bg_amortissement) 
			values ('$mission_id','".$numero_compte[$id]."','".$libelle[$id]."','".$v_brute[$id]."','".$amortissement[$id]."','".$v_nette[$id]."','".$v_brute2[$id]."','".$amortissement2[$id]."','".$dotation_exercice[$id]."','".$ecart_bg_amortissement[$id]."') ";

		}else
		{


			$sql="update  tab_rdc_immo_partie2 

				SET libelle='".$libelle[$id]."',
					v_brute='".$v_brute[$id]."',
					amortissement='".$amortissement[$id]."',
					v_nette='".$amortissement[$id]."',
					amortissement='".$amortissement[$id]."',
					v_nette='".$v_nette[$id]."',
					v_brute2='".$v_brute2[$id]."',
					amortissement_cumule='".$amortissement2[$id]."',
					dotation_exercice='".$dotation_exercice[$id]."',
					ecart_bg_amortissement='".$ecart_bg_amortissement[$id]."'

				where id_='$Idrdcvalue'";
			//UPDATE
			/*$sql = "insert into `tmsconsuams`.`tab_rdc_immo_partie2` (
				`mission_id`, `numero_compte`, `libelle`, `v_brute`, `amortissement`, `v_nette`, `v_brute2`, `amortissement_cumule`, `dotation_exercice`, `ecart_bg_amortissement`, `UTIL_ID`
				) values (
				".$missionId.", :numeroCompte, :libelle, :v_brute, :amortissement, :v_nette, v_brute2, :amortissement_cumule, :dotation_exercice, :ecart, :util_id
				) on duplicate key update
				libelle = :libelle,
				v_brute = :v_brute,
				amortissement = :amortissement,
				v_nette = :v_nette,
				v_brute2 = :v_brute2,
				amortissement_cumule = :amortissement_cumule,
				dotation_exercice = :dotation_exercice,
				ecart_bg_amortissement = :ecart,
				UTIL_ID = :util_id";*/

		}
			


		$req = $bdd->query($sql);
		$id++;

		$file = $_SERVER["DOCUMENT_ROOT"].'/fichier/save_mission/mission.sql';
/*See "Suvit global" for the reason of this remove*/
		// file_put_contents($file, $sql.";", FILE_APPEND | LOCK_EX);

		//# code...
	}

	
		
		

		

	/*	$table = $_POST["table"];
		
		//$toInsert = array();
		
		//echo $sql;

		$req = $bdd->prepare($sql);

		foreach ($table as $ligne) 
		{
			$req->execute(array(
				"numeroCompte" => $ligne[8],
				"libelle" => $ligne[0],
				"v_brute" => $ligne[1], 
				"amortissement" => $ligne[2],
				"v_nette"=> $ligne[3],
				"v_brute2"=> $ligne[4],
				"amortissement_cumule"=> $ligne[5],
				"dotation_exercice"=> $ligne[6],
				"ecart"=> $ligne[7],
				"util_id" => $UTIL_ID
			));

		}
		echo "ok";*/


?>