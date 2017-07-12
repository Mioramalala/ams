<?php
	
	//******************************************************************************************************
		$variable="K.O";
  		/*$count="UPDATE tab_utilisateur SET UTIL_MDP = 'mampi' WHERE UTIL_ID=26";
		$count1="UPDATE tab_utilisateur SET UTIL_MDP = '123' WHERE UTIL_ID =27";
	
			$fp= fopen('fichier/save_mission/mission.sql',"a+");
			fwrite($fp, $count.";");
			//fwrite($fp, $count1.";");
			fclose($fp);
		
  			$fp= fopen('fichier/save_mission/mission.sql',"a+");
			fwrite($fp, $count1.";");
			//fwrite($fp, $count1.";");
			fclose($fp);*/
  //******************************************************************************************************
  //**********  TELECHARGEMENT DE LA MISSION EFFECTUEE  ************************
  	try{
		//$date=date("d-m-Y");
		$rep = 'fichier/save_mission/mission.sql'; //Répertoire où sont sauvés les requetes de la mission
		$chemin=$rep;
		
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
		//**************************************************************************************************
	}catch(Exception $e){
		echo"misy diso";
	}
	
  		
	echo ('gfjxfd');
		
		
		
?>
