<?php  
    // $nom_serveur="localhost";
    // $nom_root="root";   
    // $num_mot_passe=""; 
    // $nom_base="tmsconsuams";
   $nom_serveur="localhost";
    $nom_root="root";
    $num_mot_passe="tahina123";
    $nom_base="tmsconsuams"; //nom base
	
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
	
	@session_start();
	if(@$_SESSION['id']!="")
	   {
		      	
			   $UTIL_ID=@$_SESSION['id'];
			   $admin=$conx->query("select STATUT_CONNEXION from tab_utilisateur where UTIL_ID='$UTIL_ID'");
			   $res_=$admin->fetch();
				$UTIL_ACTIF=$res_['STATUT_CONNEXION'];
			   if($UTIL_ACTIF==1)
			   {
				   $dateMaintenant=date("Y-m-d H:i:s");
				   $admin=$conx->query("UPDATE tab_utilisateur SET date_connect='$dateMaintenant'  WHERE UTIL_ID ='$UTIL_ID'");
			   }
	  } 
?>