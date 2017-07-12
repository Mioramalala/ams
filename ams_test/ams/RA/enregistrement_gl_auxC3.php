 <?php
		session_start();
		include 'connexionexcel.php';
		include '../connexion.php';
		$UTIL_ID=$_SESSION['id'];
		
		$cpt1=addslashes($_POST['cpt1']);
		echo $cpt1;
		$tableCpt1=explode("#",$cpt1);
		echo count($tableCpt1);
		
		$cpt2=addslashes($_POST['cpt2']);
		$tableCpt2=explode("#",$cpt2);
		
		$cpt3=addslashes($_POST['cpt3']);
		$tableCpt3=explode("#",$cpt3);
		
		$cpt4=addslashes($_POST['cpt4']);
		$tableCpt4=explode("#",$cpt4);
		
		$cpt5=addslashes($_POST['cpt5']);
		$tableCpt5=explode("#",$cpt5);
		
		$cpt6=addslashes($_POST['cpt6']);
		$tableCpt6=explode("#",$cpt6);
		
		$cpt7=addslashes($_POST['cpt7']);
		$tableCpt7=explode("#",$cpt7);
		
		$cpt8=addslashes($_POST['cpt8']);
		$tableCpt8=explode("#",$cpt8);
		
		$cpt9=addslashes($_POST['cpt9']);
		$tableCpt9=explode("#",$cpt9);
		
		$cpt10=addslashes($_POST['cpt10']);
		$tableCpt10=explode("#",$cpt10);
		
		$cpt11=addslashes($_POST['cpt11']);
		$tableCpt11=explode("#",$cpt11);
		
		$cpt12=addslashes($_POST['cpt12']);
		$tableCpt12=explode("#",$cpt12);
		
		$cpt13=addslashes($_POST['cpt13']);
		$tableCpt13=explode("#",$cpt13);
		
		
		$mission_id=(int)$_POST['mission_id'];
		
		$entrepriseId=(int)$_POST['entrepriseId'];
		
		//echo $entrepriseId;
		
		$annee=$_POST['annee'];
		$tableCpt14=explode(",",$annee);
		//echo $tableCpt14;
		
		$fileName=$_POST['fileName'];
		$tableCpt15=explode(",",$fileName);
		
		for($i=0; $i<count($tableCpt1);$i++)
		{
			global $bdd;
		////////////////////////////////////////////////A/////////////////////////////////////////////////////////////
		$compt1[$i]=substr($tableCpt1[$i],0,3);
		
		if(($compt1[$i]>=100 && $compt1[$i]<=159)||($compt1[$i]>=170 && $compt1[$i]<= 179)||($compt1[$i]>=180 && $compt1[$i]<=199)){
		$sqlA = "INSERT INTO tab_gl_auxc3 (GL_AUXC3_COMPTE,GL_AUXC3_CODE,GL_AUXC3_DATE,GL_AUXC3_JL,GL_AUXC3_LIGNE,GL_AUXC3_REF, 	 	 	GL_AUXC3_LIBELLE,GL_AUXC3_ECHEANCE,GL_AUXC3_LETTRAGE,GL_AUXC3_DEBIT,GL_AUXC3_CREDIT,GL_AUXC3_SOLDE,GL_AUXC3_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUXC3_CHOIX_ANNEE,GL_AUXC3_DOCUMENT,UTIL_ID) VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]','A- Fonds propres','$mission_id','$entrepriseId','$annee','$fileName','$UTIL_ID')";
		$bdd->query($sqlA);
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $sqlA.";", FILE_APPEND | LOCK_EX);
		
		if(!$execution) echo $sqlA.''.$i;
		}
	
		////////////////////////////////////////////////J/////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=160 && $compt1[$i]<=169)||($compt1[$i]>=660 && $compt1[$i]<=661)){
		$sqlJ = "INSERT INTO tab_gl_auxc3 (GL_AUXC3_COMPTE,GL_AUXC3_CODE,GL_AUXC3_DATE,GL_AUXC3_JL,GL_AUXC3_LIGNE,GL_AUXC3_REF, 	 	 	GL_AUXC3_LIBELLE,GL_AUXC3_ECHEANCE,GL_AUXC3_LETTRAGE,GL_AUXC3_DEBIT,GL_AUXC3_CREDIT,GL_AUXC3_SOLDE,GL_AUXC3_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUXC3_CHOIX_ANNEE,GL_AUXC3_DOCUMENT,UTIL_ID) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'J- Emprunts et dettes financi&egrave;res','$mission_id','$entrepriseId','$annee','$fileName','$UTIL_ID')";
		$bdd->query($sqlJ);
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $sqlJ.";", FILE_APPEND | LOCK_EX);
		
		if(!$execution) echo $sqlJ.''.$i;
		}
		/////////////////////////////////////////////////B////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=200 && $compt1[$i]<=259)||($compt1[$i]>=280 && $compt1[$i]<=285)||($compt1[$i]>=290 && $compt1[$i]<=295)||($compt1[$i]>=680 && $compt1[$i]<=682)||($compt1[$i]>=720 && $compt1[$i]<=729)){
		$sqlB = "INSERT INTO tab_gl_auxc3 (GL_AUXC3_COMPTE,GL_AUXC3_CODE,GL_AUXC3_DATE,GL_AUXC3_JL,GL_AUXC3_LIGNE,GL_AUXC3_REF, 	 	 	GL_AUXC3_LIBELLE,GL_AUXC3_ECHEANCE,GL_AUXC3_LETTRAGE,GL_AUXC3_DEBIT,GL_AUXC3_CREDIT,GL_AUXC3_SOLDE,GL_AUXC3_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUXC3_CHOIX_ANNEE,GL_AUXC3_DOCUMENT,UTIL_ID) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'B- Immobilisations incorporelles et corporelles','$mission_id','$entrepriseId','$annee','$fileName','$UTIL_ID')";
		$bdd->query($sqlB);
		
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $sqlB.";", FILE_APPEND | LOCK_EX);
		
		if(!$execution) echo $sqlB.''.$i;
		}
		/////////////////////////////////////////////////C////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=260 && $compt1[$i]<=279)||($compt1[$i]>=296 && $compt1[$i]<=299)||($compt1[$i]>=780 && $compt1[$i]<=782) ||($compt1[$i]>=786 && $compt1[$i]<=786)){
		$sqlC = "INSERT INTO tab_gl_auxc3 (GL_AUXC3_COMPTE,GL_AUXC3_CODE,GL_AUXC3_DATE,GL_AUXC3_JL,GL_AUXC3_LIGNE,GL_AUXC3_REF, 	 	 	GL_AUXC3_LIBELLE,GL_AUXC3_ECHEANCE,GL_AUXC3_LETTRAGE,GL_AUXC3_DEBIT,GL_AUXC3_CREDIT,GL_AUXC3_SOLDE,GL_AUXC3_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUXC3_CHOIX_ANNEE,GL_AUXC3_DOCUMENT,UTIL_ID) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'C- Immobilisations financi&egrave;res','$mission_id','$entrepriseId','$annee','$fileName','$UTIL_ID')";
		$bdd->query($sqlC);
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $sqlC.";", FILE_APPEND | LOCK_EX);
		
		if(!$execution) echo $sqlC.''.$i;
		}
		/////////////////////////////////////////////////D////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=300 && $compt1[$i]<=399)||($compt1[$i]>=603 && $compt1[$i]<=603)||($compt1[$i]>=683 && $compt1[$i]<=683)||($compt1[$i]>=713 && $compt1[$i]<=719)||($compt1[$i]>=785 && $compt1[$i]<=785)){
		$sqlD = "INSERT INTO tab_gl_auxc3 (GL_AUXC3_COMPTE,GL_AUXC3_CODE,GL_AUXC3_DATE,GL_AUXC3_JL,GL_AUXC3_LIGNE,GL_AUXC3_REF, 	 	 	GL_AUXC3_LIBELLE,GL_AUXC3_ECHEANCE,GL_AUXC3_LETTRAGE,GL_AUXC3_DEBIT,GL_AUXC3_CREDIT,GL_AUXC3_SOLDE,GL_AUXC3_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUXC3_CHOIX_ANNEE,GL_AUXC3_DOCUMENT,UTIL_ID) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'D- Stocks','$mission_id','$entrepriseId','$annee','$fileName','$UTIL_ID')";
		$bdd->query($sqlD);
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $sqlD.";", FILE_APPEND | LOCK_EX);
		
		if(!$execution) echo $sqlD.''.$i;
		}
		/////////////////////////////////////////////////E////////////////////////////////////////////////////////////
		elseif($compt1[$i]>=500 && $compt1[$i]<=599){
		$sqlE = "INSERT INTO tab_gl_auxc3 (GL_AUXC3_COMPTE,GL_AUXC3_CODE,GL_AUXC3_DATE,GL_AUXC3_JL,GL_AUXC3_LIGNE,GL_AUXC3_REF, 	 	 	GL_AUXC3_LIBELLE,GL_AUXC3_ECHEANCE,GL_AUXC3_LETTRAGE,GL_AUXC3_DEBIT,GL_AUXC3_CREDIT,GL_AUXC3_SOLDE,GL_AUXC3_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUXC3_CHOIX_ANNEE,GL_AUXC3_DOCUMENT,UTIL_ID) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'E- Tr&eacute;soreries','$mission_id','$entrepriseId','$annee','$fileName','$UTIL_ID')";
		$bdd->query($sqlE);
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $sqlE.";", FILE_APPEND | LOCK_EX);
		
		if(!$execution) echo $sqlE.''.$i;
		}
		/////////////////////////////////////////////////F////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=400 && $compt1[$i]<=409)||($compt1[$i]>=480 && $compt1[$i]<=486)||($compt1[$i]>=600 && $compt1[$i]<=602)||($compt1[$i]>=604 && $compt1[$i]<=609)||($compt1[$i]>=610 && $compt1[$i]<=629)||($compt1[$i]>=650 && $compt1[$i]<=659)||($compt1[$i]>=662 && $compt1[$i]<=679)){
		$sqlF = "INSERT INTO tab_gl_auxc3 (GL_AUXC3_COMPTE,GL_AUXC3_CODE,GL_AUXC3_DATE,GL_AUXC3_JL,GL_AUXC3_LIGNE,GL_AUXC3_REF, 	 	 	GL_AUXC3_LIBELLE,GL_AUXC3_ECHEANCE,GL_AUXC3_LETTRAGE,GL_AUXC3_DEBIT,GL_AUXC3_CREDIT,GL_AUXC3_SOLDE,GL_AUXC3_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUXC3_CHOIX_ANNEE,GL_AUXC3_DOCUMENT,UTIL_ID) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'F- Charges fournisseurs','$mission_id','$entrepriseId','$annee','$fileName','$UTIL_ID')";
		$bdd->query($sqlF);
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $sqlF.";", FILE_APPEND | LOCK_EX);
		if(!$execution) echo $sqlF.''.$i;
		}
		/////////////////////////////////////////////////G////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=410 && $compt1[$i]<=419)||($compt1[$i]>=445 && $compt1[$i]<=445)||($compt1[$i]>=487 && $compt1[$i]<=489)||($compt1[$i]>=490 && $compt1[$i]<=495)||($compt1[$i]>=684 && $compt1[$i]<=685)||($compt1[$i]>=700 && $compt1[$i]<=712)||($compt1[$i]>=730 && $compt1[$i]<=739)||($compt1[$i]>=740 && $compt1[$i]<=749)||($compt1[$i]>=750 && $compt1[$i]<=759)||($compt1[$i]>=760 && $compt1[$i]<=769)||($compt1[$i]>=770 && $compt1[$i]<=779)||($compt1[$i]>=785 && $compt1[$i]<=785)){
		$sqlG = "INSERT INTO tab_gl_auxc3 (GL_AUXC3_COMPTE,GL_AUXC3_CODE,GL_AUXC3_DATE,GL_AUXC3_JL,GL_AUXC3_LIGNE,GL_AUXC3_REF, 	 	 	GL_AUXC3_LIBELLE,GL_AUXC3_ECHEANCE,GL_AUXC3_LETTRAGE,GL_AUXC3_DEBIT,GL_AUXC3_CREDIT,GL_AUXC3_SOLDE,GL_AUXC3_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUXC3_CHOIX_ANNEE,GL_AUXC3_DOCUMENT,UTIL_ID) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'G- Produits Clients','$mission_id','$entrepriseId','$annee','$fileName','$UTIL_ID')";
		$bdd->query($sqlG);
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $sqlG.";", FILE_APPEND | LOCK_EX);
		
		if(!$execution) echo $sqlG.''.$i;
		}
		/////////////////////////////////////////////////H////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=420 && $compt1[$i]<=439)||($compt1[$i]>=442 && $compt1[$i]<=442)||($compt1[$i]>=640 && $compt1[$i]<=649)){
		$sqlH = "INSERT INTO tab_gl_auxc3 (GL_AUXC3_COMPTE,GL_AUXC3_CODE,GL_AUXC3_DATE,GL_AUXC3_JL,GL_AUXC3_LIGNE,GL_AUXC3_REF, 	 	 	GL_AUXC3_LIBELLE,GL_AUXC3_ECHEANCE,GL_AUXC3_LETTRAGE,GL_AUXC3_DEBIT,GL_AUXC3_CREDIT,GL_AUXC3_SOLDE,GL_AUXC3_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUXC3_CHOIX_ANNEE,GL_AUXC3_DOCUMENT,UTIL_ID) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'H- Paie et Personnel','$mission_id','$entrepriseId','$annee','$fileName','$UTIL_ID')";
		$bdd->query($sqlH);
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $sqlH.";", FILE_APPEND | LOCK_EX);
		
		if(!$execution) echo $sqlH.''.$i;
		}
		/////////////////////////////////////////////////I////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=440 && $compt1[$i]<=440)||($compt1[$i]>=441 && $compt1[$i]<=441)||($compt1[$i]>=443 && $compt1[$i]<=444)||($compt1[$i]>=446 && $compt1[$i]<=449)||($compt1[$i]>=630 && $compt1[$i]<=639)||($compt1[$i]>=690 && $compt1[$i]<=699)){
		$sqlI = "INSERT INTO tab_gl_auxc3 (GL_AUXC3_COMPTE,GL_AUXC3_CODE,GL_AUXC3_DATE,GL_AUXC3_JL,GL_AUXC3_LIGNE,GL_AUXC3_REF, 	 	 	GL_AUXC3_LIBELLE,GL_AUXC3_ECHEANCE,GL_AUXC3_LETTRAGE,GL_AUXC3_DEBIT,GL_AUXC3_CREDIT,GL_AUXC3_SOLDE,GL_AUXC3_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUXC3_CHOIX_ANNEE,GL_AUXC3_DOCUMENT,UTIL_ID) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'I- Imp&ocirc;ts et taxes','$mission_id','$entrepriseId','$annee','$fileName','$UTIL_ID')";
		$bdd->query($sqlI);
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $sqlI.";", FILE_APPEND | LOCK_EX);
		
		if(!$execution) echo $sqlI.''.$i;
		}
		/////////////////////////////////////////////////K////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=450 && $compt1[$i]<=479)||($compt1[$i]>=496 && $compt1[$i]<=499)||($compt1[$i]>=686 && $compt1[$i]<=689)||($compt1[$i]>=785 && $compt1[$i]<=785)||($compt1[$i]>=783 && $compt1[$i]<=785)||($compt1[$i]>=787 && $compt1[$i]<=789)){
		$sqlK = "INSERT INTO tab_gl_auxc3 (GL_AUXC3_COMPTE,GL_AUXC3_CODE,GL_AUXC3_DATE,GL_AUXC3_JL,GL_AUXC3_LIGNE,GL_AUXC3_REF, 	 	 	GL_AUXC3_LIBELLE,GL_AUXC3_ECHEANCE,GL_AUXC3_LETTRAGE,GL_AUXC3_DEBIT,GL_AUXC3_CREDIT,GL_AUXC3_SOLDE,GL_AUXC3_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUXC3_CHOIX_ANNEE,GL_AUXC3_DOCUMENT,UTIL_ID) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'K- D&eacute;biteurs et cr&eacute;diteurs divers','$mission_id','$entrepriseId','$annee','$fileName','$UTIL_ID')";
		$bdd->query($sqlK);
		$file = '../fichier/save_mission/mission.sql';
		file_put_contents($file, $sqlI.";", FILE_APPEND | LOCK_EX);
		
		if(!$execution) echo $sqlK.''.$i;
		
		}
		
		}
?>