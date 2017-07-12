<?php
	@session_start();
    // $nom_serveur="localhost";
    // $nom_root="root";   
    // $num_mot_passe=""; 
    // $nom_base="tmsconsuams";
	$nom_serveur="localhost";
    $nom_root="root";
    $num_mot_passe="P2017amsOGpwd";
    $nom_base="tmsconsuams"; //nom base

	//CONNEXION BASE DE  DONNEE -REPORTING
	define('AMS_DB_LOCALHOST', $nom_serveur);
	define('AMS_DB_USER',  $nom_root);
	define('EXCHANGE_DB_PASSWORD', $num_mot_passe);
	define('AMS_DB_NAME', $nom_base );
	
	//Fonction Connexion base
	function db_connect($sql,$field_to_return=null){
        $link = mysqli_connect(AMS_DB_LOCALHOST, AMS_DB_USER, EXCHANGE_DB_PASSWORD) or die("Pas de connexion a la BD @base\n");
        mysqli_select_db($link, AMS_DB_NAME);// or die(mysql_error());
        //mysql_query('SET NAMES \'UTF8\'');
        $r = mysqli_query($link,$sql);// or die(mysql_error());
        
        
        if($field_to_return!=null){
            $db_resp = mysqli_fetch_array($r);
            return $db_resp[$field_to_return];
        }
        $x=0;
        //if($r==1) return;  // no select request
	    $row=array();      // to be safe with empty select results
        while ($res=mysqli_fetch_array($r)) {
            
            $row[$x]=$res;
            $x++;
        }
        return $row;
        mysqli_close($link);
    }
	$conx = new PDO('mysql:host='.$nom_serveur.';dbname='.$nom_base, $nom_root, $num_mot_passe);
	
	?>
