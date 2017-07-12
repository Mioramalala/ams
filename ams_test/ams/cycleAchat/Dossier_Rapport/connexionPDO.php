<?php  
    // $nom_serveur="";
    // $nom_root="root";   
    // $num_mot_passe=""; 
    // $nom_base="tmsconsuams";
    $nom_serveur='mysql51-60.pro';
    $nom_root='tmsconsuams';
    $num_mot_passe='8uMWr4Wh5Mh8';
    $nom_base='tmsconsuams'; //nom base
	
    try{
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
        $conx=new PDO('mysql:host='.$nom_serveur.';dbname='.$nom_base.'',$nom_root,$num_mot_passe,$pdo_options);
        
        // mysqli_connect($nom_serveur,$nom_root,$num_mot_passe) or
        // die("Could not connect: " . mysql_error());
        // mysqli_select_db($nom_base);
    }
    catch(Exception $e){
        die('Erreur'.$e->getMessage());
    }   
?>