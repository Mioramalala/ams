<?php

/*
#Jimmy
Il s'agit d'un fichier créer à la hate afin :
- Au moin alerter l'utilisateur qu'il a été automatiquement deconnécté de l'application vue la structure inconnue de l'application
- Grouper les requetes les plus fréquentes
*/

/*
SOME MINIMUM CONFIGURATION
*/

header('Content-Type: text/html; charset=utf-8');
$project_path=dirname(__FILE__);
$using_backup=false;
$message_de_deconnection='Please select a mission and/or reconnect!';
$backup_sql="";



/*
Traitement
*/
$message_de_deconnection=str_replace("'","\\'",$message_de_deconnection);


 if(!isset($_SESSION['idMission'])){
	/*echo "<script>alert('$message_de_deconnection');</script>";
	die();
	*/
 }
 
 /*
 Traitement si bien connecté
 */

$mission_id=@$_SESSION['idMission']; 
 
 
function _escape_db($v){
	return str_replace("'","\\'",$v);
}
/*
fonctionnalité supplémentaires
*/
function __writting_into($what,$where,$table){
	global $bdd;
	global $backup_sql;
	$where_s="";
	$set="";
	$fields="";
	$values="";
	$ivalues="";
	$sep="";
	foreach($where as $k=>$v){
		$v=str_replace("'","\\'",$v);
		$where_s.="$sep `$k`='$v'";
		$sep="\n AND";
	}
	$sep="";
	foreach($what as $k=>$v){
		$v=str_replace("'","\\'",$v);
		$set.="$sep `$k`='$v'";
		$v=str_replace("'","\\'",$v);
		$sep=" ,\n";
	}
	$sep="";
	foreach($what as $k=>$v){
		$fields.=" $sep `$k`";
		$sep=" ,\n";
	}
	$sep="";
	if($fields){
		$sep=" ,\n";
	}
	foreach($where as $k=>$v){
		$fields.=" $sep `$k`";
		$sep=" ,\n";
	}
	$sep="";
	foreach($what as $k=>$v){
		$v=str_replace("'","\\'",$v);
		$values.=" $sep '$v'";
		$ivalues.=" $sep '$v'";
		$sep=" ,\n";
	}
	$sep="";
	if($ivalues){
		$sep=" ,\n";
	}
	foreach($where as $k=>$v){
		$v=str_replace("'","\\'",$v);
		$ivalues.=" $sep '$v'";
		$sep=" ,\n";
	}
	$select="
	SELECT
		count(*) as c
	FROM
		$table
	WHERE
		$where_s
	";
	$res=$bdd->query($select);
	$count=0;
	while($r=$res->fetch()){
		$count=$r["c"];
	}
	$sql="";
	if($count){
		$sql="
	UPDATE 
		$table
	SET 
		$set
	WHERE
		$where_s
	";
	}
	else{
		$sql="
	INSERT INTO 
		$table(
			$fields
		)
		VALUES(
			$ivalues
		)
	";
	}
	$sql=mb_convert_encoding($sql,"utf-8");
	$s=$bdd->query($sql);
	$backup_sql.="$sql;";
}
function _writting_rep($what,$where){
	return __writting_into($what,$where,"tab_rdc");
}
function _write_rep($rep,$cmt,$UTIL_ID,$objectif,$cycle,$rang,$mission){
	return _writting_rep(
		array(
			'UTIL_ID' => $UTIL_ID,
			'RDC_COMMENTAIRE'=> $cmt,
			'RDC_REPONSE' => $rep
		),
		array(
			'RDC_OBJECTIF'=>$objectif,
			'RDC_CYCLE'=>$cycle,
			'RDC_RANG'=>$rang,
			'MISSION_ID'=>$mission,
		)
	);
}
function _add_backup($sql){
	global $backup_sql;
	$backup_sql.=";$sql;";
}
function _save_backup(){
	global $project_path;
	global $using_backup; 
	global $backup_sql;

	$file = "$project_path/fichier/save_mission/mission.sql";


	if($using_backup){
		file_put_contents($file, $backup_sql.";", FILE_APPEND | LOCK_EX);
	}
}
function _saving_pj($of){
	global $project_path,$mission_id;
	$save_dir="$project_path/pieces_justificatives/";
	$piec_j=$_FILES["piec_j"];
	$tmp_name=$piec_j["tmp_name"];
	$fname=$piec_j["name"];

	$infosfichier = pathinfo($fname);
	$extension="";
	if(isset( $infosfichier['extension'])){
		$extension = ".".$infosfichier['extension'];
	}
	$extension=utf8_decode($extension);
	$ext_reg=utf8_decode($save_dir."$of-mission-$mission_id-extension");
	$f=fopen($ext_reg,"w");
	fputs($f,$extension);
	fclose($f);
	
	$name="$of-mission-$mission_id$extension";
	$new_path=utf8_decode($save_dir.$name);
	if(is_file($new_path)){
		unlink($new_path);
	}

	move_uploaded_file($tmp_name, $new_path);
	chmod($new_path,0777);
}
/*
Save uploaded file
*/
function _save_uploaded_file($tmp_name,$new_path){
	if(is_file($new_path)){
		unlink($new_path);
	}

	move_uploaded_file($tmp_name, $new_path);
	chmod($new_path,0777);
}
 
/*
Incomming library for Attachment
*/
function _request_pj_valid(){
	if(isset($_FILES["piec_j"])){
		if($_FILES["piec_j"]["name"]){
			return true;
		}
	}
	return false;
}
function _get_pj($of){
	global $project_path,$mission_id;
	$save_dir="$project_path/pieces_justificatives/";
	$ext_reg=utf8_decode($save_dir."$of-mission-$mission_id-extension");
	if(is_file($ext_reg)){
		$extension=file_get_contents($ext_reg);
		$name="$of-mission-$mission_id$extension";
		$new_path=utf8_decode($save_dir.$name);
		if(is_file($new_path)){
			return "pieces_justificatives/$name";
		}
	}
	return "";
}
