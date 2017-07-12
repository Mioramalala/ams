<?php 
	include 'connexion.php';
	  function sommmeMiniteentreDAte($date1_)
	  {
		  $dateMaintenant=date("Y-m-d H:i:s");
		  $date2_=$dateMaintenant;
	
		  //Affichera date1
		  list($anne1,$mois1,$jrs1,$heure1,$mn1,$seconde1) =split('[- :]', $date1_);
		  //Affichera date2
		  list($anne2,$mois2,$jrs2,$heure2,$mn2,$seconde2) = split('[- :]', $date2_);
		  
		  $sommedate1=mktime($heure1, $mn1, $seconde1, $mois1,$jrs1, $anne1); 
  		  $sommedate2=mktime($heure2, $mn2, $seconde2, $mois2,$jrs2, $anne2); 
			
			
		  $sommeminute=($sommedate2-$sommedate1)/60;
		  return $sommeminute;
			
	  }
	
	
	
	  $sql="select UTIL_ID,STATUT_CONNEXION,date_connect from tab_utilisateur";
	  $req = $bdd->query($sql);
	   
	  
	   
	   while($res_=$req->fetch())
	   {
		   $derniedatehconex=$res_['date_connect'];
		   $UTIL_ID=$res_['UTIL_ID'];
		   
		   $Minutetotal=(int)(sommmeMiniteentreDAte($derniedatehconex));
		   //print "<br>Minutetotal:".$Minutetotal."<br>";
		   if($Minutetotal>15 && $res_['STATUT_CONNEXION']==1)
			{  
				$admin=$bdd->query("UPDATE tab_utilisateur SET STATUT_CONNEXION='0'  WHERE UTIL_ID ='$UTIL_ID'");
				//deconection automatique
			} 
	
	   }

?>