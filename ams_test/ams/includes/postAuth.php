<?php
    @session_start ();
	 include 'connexion.php';
	 $user=$_POST['a'];
	 $mdp=$_POST['b'];
	 $v="";

	 $Serappeler2moi=@$_POST['Serappeler2moi'];

 
	 $reponse = $bdd->query('SELECT UTIL_LOGIN ,UTIL_NOM, UTIL_ID	,UTIL_MDP ,UTIL_ACTIF,statut_connexion,date_connect FROM  tab_utilisateur WHERE UTIL_LOGIN="'.$user.'" 
	  AND UTIL_MDP="'.$mdp.'"');

	 $date  = date("d-m-Y");
	 $heure = date("H:i");
	 $ip    = $_SERVER['REMOTE_ADDR'];
	 $donnees=$reponse->fetch();

	$datetime=date("Y-m-d H:i:s");

	$statutConnexion=$donnees["statut_connexion"];
	$date_dernierconnect=$donnees["date_connect"];
	$date_dernierconnect_plus15 = strtotime($date_dernierconnect.'16 minute');

	$date_dernierconnect_plus15= date('Y-m-d H:i:s', $date_dernierconnect_plus15);

	//print($date_dernierconnect_plus15."datetime".$datetime);
	if($statutConnexion=="1" && $datetime<$date_dernierconnect_plus15)
	{
		print("dejaconnecter");

		exit();
	}

	//exit();




 
 	if(isset($donnees['UTIL_LOGIN']) && isset($donnees['UTIL_MDP'])/* && $donnees['UTIL_ACTIF'] == "Actif" && $donnees['statut_connexion'] == "0"*/)
 	{


			$temps =60*15;
			//setcookie('tpscon_noactif', NULL, -1);
			setcookie ("tpscon_noactif", $temps, time() + $temps);

 			$_SESSION['id'] =$donnees['UTIL_ID'];
			$_SESSION['nom']=$donnees['UTIL_NOM'];
			$_SESSION["user"]=$donnees['UTIL_LOGIN'];
			$_SESSION["mdp"]=$donnees['UTIL_MDP'];
			$v=1;




		    $requete="update tab_utilisateur set date_connect='$datetime' , statut_connexion='1' where util_id='".$donnees['UTIL_ID']."'";
					$bdd->exec($requete);
					$requete='insert into tab_log values("","'.$_SESSION["user"].'","'.$ip.'","'.$date.'","'.$heure.'","authentification")';
					$bdd->exec($requete);

		    //Activation coockie si on click la case a cocher se rapeller de moi
		    if($Serappeler2moi=="OK")
			{

								if (@$_COOKIE['login']!="")
								{

									//TEST S'il existe des cette cookie en cours
									if(strpos($_COOKIE['login'],$user) === false)
									{
										//$_COOKIE['login'] = $_COOKIE['login']."," .$user;
										$_COOKIE['login'] = $_COOKIE['login'] . "," . $user;
										$_COOKIE['password'] = $_COOKIE['password'] . "," . $mdp;

										setcookie('login', $_COOKIE['login'], time() + 365 * 24 * 3600, null, null, false, true); // On écrit un cookie
										setcookie('password', $_COOKIE['password'], time() + 365 * 24 * 3600, null, null, false, true); // On
									}

								}else
								{

									setcookie('login',$user, time() + 365*24*3600, null, null, false, true); // On écrit un cookie
									setcookie('password',$mdp, time() + 365*24*3600, null, null, false, true); // On


								}
							}
							//FIN Activation coockie si on click la case a cocher se rapeller de moi

			}
			else if(isset($donnees['UTIL_LOGIN']) && isset($donnees['UTIL_MDP']) && $donnees['UTIL_ACTIF'] == "Actif" && $donnees['statut_connexion'] == "1")
			{
							$v=2;
			}else
			{
							$v=0;
			}
	
	echo $v;
		
	
		
		
?>

