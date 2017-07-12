<?php

//*******************************************************************************************************
//si le serveur est en ligne
/*$host = 'mysql51-60.pro';
$username = 'tmsconsuams';
$password = 'qm2cy8UnQtcm';
$db = 'tmsconsuams';*/

$host = 'mysql51-57.pro';
$username = 'tmsconsumuzik';
$password = 'YvCaBUYVU67V';
$db = 'tmsconsumuzik';

/*$host = 'localhost';
$username = 'root';
$password = '';
$db = 'data_ams';*/
//$table = 'table1 table2'; //Nom des tables à sauvegarder - Optionnel
$daty=date('d-m-y');
$rep = 'fichier/backup/'; //Répertoire où sauvegarder le dump de la base de données

//avadika fichier sql le base de données de sauvena ao am $chemin
$chemin=$rep.'sauvegarde'.$daty.'.sql';

//si le sereur est en ligne
system("mysqldump --host=".$host." --user=".$username." --password=".$password." ".$db."  > ".$rep."sauvegarde".$daty.".sql");

//sile serveur est dans le local
//system("C:\wamp\bin\mysql\mysql5.6.12\bin\mysqldump --host=".$host." --user=".$username." --password=".$password." ".$db."  > ".$rep."sauvegarde".$daty.".sql");


 //********************************************************************************************************
  //echo ('<a download="'.$rep.$db."-".date("d-m-Y-H\hi").".sql".'" href="#">telecharger</a>');
  
 //telechargena makao am local le fichier sql créé teo ambony
 	$full_path = $chemin; // chemin système (local) vers le fichier
	$file_name = basename($chemin);
	 
	ini_set('zlib.output_compression', 0);
	$date1 = gmdate(DATE_RFC1123);
	 
	header('Pragma: public');
	header('Cache-Control: must-revalidate, pre-check=0, post-check=0, max-age=0');
	 
	header('Content-Tranfer-Encoding: none');
	header('Content-Length: '.filesize($full_path));
	header('Content-MD5: '.base64_encode(md5_file($full_path)));
	header('Content-Type: application/octetstream; name="'.$file_name.'"');
	header('Content-Disposition: attachment; filename="'.$file_name.'"');
	 
	header('Date: '.$date1);
	header('Expires: '.gmdate(DATE_RFC1123, time()+1));
	header('Last-Modified: '.gmdate(DATE_RFC1123, filemtime($full_path)));
	 
	readfile($full_path);
	exit; // 
 
 
  echo "votre mission a ete bien importer sur votre machine";
  
 
 
?>