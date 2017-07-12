 <?php
		
		include '../connexionexcel.php';
		include '../connexion.php';
		
		$cpt1=$_POST['cpt1'];
		$tableCpt1=explode(",",$cpt1);
		
		$cpt2=$_POST['cpt2'];
		$tableCpt2=explode(",",$cpt2);
		
		$cpt3=$_POST['cpt3'];
		$tableCpt3=explode(",",$cpt3);
		
		$cpt4=$_POST['cpt4'];
		$tableCpt4=explode(",",$cpt4);
		
		$cpt5=$_POST['cpt5'];
		$tableCpt5=explode(",",$cpt5);
		
		$cpt6=$_POST['cpt6'];
		$tableCpt6=explode(",",$cpt6);
		
		$mission_id=$_POST['mission_id'];
		
		$entrepriseId=$_POST['entrepriseId'];
		
		$annee=$_POST['annee'];
		$tableCpt7=explode(",",$annee);
		
		$fileName=$_POST['fileName'];
		$tableCpt78=explode(",",$fileName);
		
		for($i=0; $i<count($tableCpt1);$i++){
		
		////////////////////////////////////////////////A/////////////////////////////////////////////////////////////
		$compt1[$i]=substr($tableCpt1[$i],0,4);
		
		if(($compt1[$i]>=1000 && $compt1[$i]<=1599) || ($compt1[$i]>=1700 && $compt1[$i]<= 1999)){
			$sqlA = "INSERT INTO tab_importer (IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE, MISSION_ID, ENTREPRISE_ID,IMPORT_CHOIX_ANNEE,IMPORT_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','A- Fonds propres','$mission_id','$entrepriseId','$annee','$fileName')";
			mysql_query($sqlA);	
				
		}
		////////////////////////////////////////////////J/////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=1600 && $compt1[$i]<=1699)||($compt1[$i]>=6600 && $compt1[$i]<=6619)){
			$sqlJ = "INSERT INTO tab_importer (IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE, MISSION_ID, ENTREPRISE_ID,IMPORT_CHOIX_ANNEE,IMPORT_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','J- Emprunts et dettes financi&egrave;res','$mission_id','$entrepriseId','$annee','$fileName')";
			mysql_query($sqlJ);	
			
		}	
		/////////////////////////////////////////////////B////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=2000 && $compt1[$i]<=2599)||($compt1[$i]>=2800 && $compt1[$i]<=2859)||($compt1[$i]>=2900 && $compt1[$i]<=2959)||($compt1[$i]>=6800 && $compt1[$i]<=6829)||($compt1[$i]>=7200 && $compt1[$i]<=7299)){
			$sqlB = "INSERT INTO tab_importer (IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE, MISSION_ID, ENTREPRISE_ID,IMPORT_CHOIX_ANNEE,IMPORT_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','B- Immobilisations incorporelles et corporelles','$mission_id','$entrepriseId','$annee','$fileName')";
			mysql_query($sqlB);	
			
		}	
		/////////////////////////////////////////////////C////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=2600 && $compt1[$i]<=2799)||($compt1[$i]>=2960 && $compt1[$i]<=2999)||($compt1[$i]>=7800 && $compt1[$i]<=7829) ||($compt1[$i]>=7860 && $compt1[$i]<=7869)){
			$sqlC = "INSERT INTO tab_importer (IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE, MISSION_ID, ENTREPRISE_ID,IMPORT_CHOIX_ANNEE,IMPORT_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','C- Immobilisations financi&egrave;res','$mission_id','$entrepriseId','$annee','$fileName')";
			mysql_query($sqlC);	
			
		}	
		/////////////////////////////////////////////////D////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=3000 && $compt1[$i]<=3999)||($compt1[$i]>=6030 && $compt1[$i]<=6039)||($compt1[$i]>=6830 && $compt1[$i]<=6839)||($compt1[$i]>=7130 && $compt1[$i]<=7149)||($compt1[$i]>=7853 && $compt1[$i]<=7859)){
			$sqlD = "INSERT INTO tab_importer (IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE, MISSION_ID, ENTREPRISE_ID,IMPORT_CHOIX_ANNEE,IMPORT_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','D- Stocks','$mission_id','$entrepriseId','$annee','$fileName')";
			mysql_query($sqlD);	
			
		}	
		/////////////////////////////////////////////////E////////////////////////////////////////////////////////////
		elseif($compt1[$i]>=5000 && $compt1[$i]<=5999){
			$sqlE = "INSERT INTO tab_importer (IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE, MISSION_ID, ENTREPRISE_ID,IMPORT_CHOIX_ANNEE,IMPORT_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','E- Tr&eacute;soreries','$mission_id','$entrepriseId','$annee','$fileName')";
			mysql_query($sqlE);	
			
		}	
		/////////////////////////////////////////////////F////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=4000 && $compt1[$i]<=4099)||($compt1[$i]>=4800 && $compt1[$i]<=4869)||($compt1[$i]>=6000 && $compt1[$i]<=6029)||($compt1[$i]>=6040 && $compt1[$i]<=6049)||($compt1[$i]>=6100 && $compt1[$i]<=6229)||($compt1[$i]>=6500 && $compt1[$i]<=6599)||($compt1[$i]>=6620 && $compt1[$i]<=6799)){
			$sqlF = "INSERT INTO tab_importer (IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE, MISSION_ID, ENTREPRISE_ID,IMPORT_CHOIX_ANNEE,IMPORT_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','F- Charges fournisseurs','$mission_id','$entrepriseId','$annee','$fileName')";
			mysql_query($sqlF);	
			
		}	
		/////////////////////////////////////////////////G////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=4100 && $compt1[$i]<=4199)||($compt1[$i]>=4450 && $compt1[$i]<=4459)||($compt1[$i]>=4870 && $compt1[$i]<=4879)||($compt1[$i]>=4900 && $compt1[$i]<=4959)||($compt1[$i]>=6840 && $compt1[$i]<=6859)||($compt1[$i]>=7300 && $compt1[$i]<=7799)||($compt1[$i]>=7854 && $compt1[$i]<=7859)){
			$sqlG = "INSERT INTO tab_importer (IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE, MISSION_ID, ENTREPRISE_ID,IMPORT_CHOIX_ANNEE,IMPORT_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','G- Produits Clients','$mission_id','$entrepriseId','$annee','$fileName')";
			mysql_query($sqlG);	
			
		}	
		/////////////////////////////////////////////////H////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=4200 && $compt1[$i]<=4399)||($compt1[$i]>=4420 && $compt1[$i]<=4429)||($compt1[$i]>=6400 && $compt1[$i]<=6499)){
			$sqlH = "INSERT INTO tab_importer (IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE, MISSION_ID, ENTREPRISE_ID,IMPORT_CHOIX_ANNEE,IMPORT_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','H- Paie et Personnel','$mission_id','$entrepriseId','$annee','$fileName')";
			mysql_query($sqlH);	
			
		}	
		/////////////////////////////////////////////////I////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=4400 && $compt1[$i]<=4409)||($compt1[$i]>=4410 && $compt1[$i]<=4419)||($compt1[$i]>=4430 && $compt1[$i]<=4449)||($compt1[$i]>=6300 && $compt1[$i]<=6399)||($compt1[$i]>=6900 && $compt1[$i]<=6999)){
			$sqlI = "INSERT INTO tab_importer (IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE, MISSION_ID, ENTREPRISE_ID,IMPORT_CHOIX_ANNEE,IMPORT_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','I- Imp&ocirc;ts et taxes','$mission_id','$entrepriseId','$annee','$fileName')";
			mysql_query($sqlI);	
			
		}	
		/////////////////////////////////////////////////K////////////////////////////////////////////////////////////
		elseif(($compt1[$i]>=4500 && $compt1[$i]<=4799)||($compt1[$i]>=4960 && $compt1[$i]<=4999)||($compt1[$i]>=4860 && $compt1[$i]<=4899)||($compt1[$i]>=7830 && $compt1[$i]<=7899)){
			$sqlK = "INSERT INTO tab_importer (IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE, MISSION_ID, ENTREPRISE_ID,IMPORT_CHOIX_ANNEE,IMPORT_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','K- D&eacute;biteurs et cr&eacute;diteurs divers','$mission_id','$entrepriseId','$annee','$fileName')";
			mysql_query($sqlK);	
		}	
	}
	print 'tafiditra';
?>
