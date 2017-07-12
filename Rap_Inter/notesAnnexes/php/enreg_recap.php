<?php 

// header('Content-Type: text/html; charset=utf-8');

	if (isset($_POST["rubrique"])) {

		$libelle = addslashes($_POST["rubrique"]);
		$id_mission =  $_POST['idm'];
		$cycle =  $_POST['cycle'];
		$d = $_POST['d'];
		$c = $_POST['c'];
		$n = $_POST['n']; 
		$n1= $_POST['n1'];
		// $data = array();

		//start connexion
		require("../../../connexion.php");
		$sql = "SELECT `id`as m
				FROM `tab_rubrique_t`
				WHERE `cycle` ='".$cycle."' AND id_mission = ".$id_mission." AND libelle like '".$libelle."'";
		$req = $bdd->query($sql) or die($sql);
		// $i=1;
		$res = $req->rowCount();
		$rub = $req->fetch();
		$id = $rub['m'];
//UPDATE `tmsconsuams`.`tab_rubrique_t` SET `vb` = '1000',`va` = '1200',`vn` = '1300',`vn1` = '1400' WHERE `tab_rubrique_t`.`id` =1;
// INSERT INTO `tmsconsuams`.`tab_rubrique_t` (`id`, `libelle`, `vb`, `va`, `vn`, `vn1`, `cycle`, `id_mission`) VALUES (NULL, 'limosine', '10', '12', '13', '14', 'immoco', '2');
		if($res > 0)
		{
				$req = $bdd->prepare("UPDATE tab_rubrique_t SET vb=:vb,va=:va,vn=:vn,vn1=:vn1 WHERE id = :id");
				$val = $req->execute(array(
				'id' => $id,
				'vb' => $d,
				'va' => $c,
				'vn' => $n,
				'vn1' => $n1
				));
		}else
		{			
			$sql = "INSERT INTO tab_rubrique_t(`libelle`, `vb`, `va`, `vn`, `vn1`, `cycle`, `id_mission`) 
				VALUES (
					'".$libelle."',
					'".$d."',
					'".$c."',
					'".$n."',
					'".$n1."',
					'".$cycle."',
					'".$id_mission."')";

			$val = $bdd->exec($sql) or die($sql);
		}
		
		
// 		$val = $bdd->exec($sql);
// echo $val = "ok";
		if($val){
			// $num = $bdd->lastInsertId();
			echo "ok";
		}else
			echo "Oups..! Il y a une erreur lors de l'enregistrement.";

		// echo json_encode($data);
		// $bdd = null;

	}
 ?>