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
		
		$cpt7=$_POST['cpt7'];
		$tableCpt7=explode(",",$cpt7);
		
		$mission_id=$_POST['mission_id'];
		
		$entrepriseId=$_POST['entrepriseId'];
		
		echo $entrepriseId;
		
		$annee=$_POST['annee'];
		$tableCpt7=explode(",",$annee);
		
		$fileName=$_POST['fileName'];
		$tableCpt78=explode(",",$fileName);
		
		for($i=0; $i<count($tableCpt1);$i++){
		////////////////////////////////////////////////A/////////////////////////////////////////////////////////
		if(($tableCpt1[$i]>=1000000000 && $tableCpt1[$i]<=1599999999) || ($tableCpt1[$i]>=1700000000 && $tableCpt1[$i]<= 1999999999)){
		$sqlA = "INSERT INTO tab_bal_aux (BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE, BAL_AUX_CYCLE, MISSION_ID, ENTREPRISE_ID,BAL_AUX_CHOIX_ANNEE,BAL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','A- Fonds propres','$mission_id','$entrepriseId','$annee','$fileName')";
		 mysql_query($sqlA);
		
		}
		////////////////////////////////////////////////J/////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=1600000000 && $tableCpt1[$i]<=1699999999)||($tableCpt1[$i]>=6600000000 && $tableCpt1[$i]<=6619999999)){
		$sqlJ = "INSERT INTO tab_bal_aux (BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE, BAL_AUX_CYCLE, MISSION_ID, ENTREPRISE_ID,BAL_AUX_CHOIX_ANNEE,BAL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','J- Emprunts et dettes financi&egrave;res','$mission_id','$entrepriseId','$annee','$fileName')";
		 mysql_query($sqlJ);
		
		}
		/////////////////////////////////////////////////B////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=2000000000 && $tableCpt1[$i]<=2599999999)||($tableCpt1[$i]>=2810000000 && $tableCpt1[$i]<=2859999999)||($tableCpt1[$i]>=2900000000 && $tableCpt1[$i]<=2959999999)||($tableCpt1[$i]>=6800000000 && $tableCpt1[$i]<=6829999999)||($tableCpt1[$i]>=7200000000 && $tableCpt1[$i]<=7299999999)){
		$sqlB = "INSERT INTO tab_bal_aux (BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE, BAL_AUX_CYCLE, MISSION_ID, ENTREPRISE_ID,BAL_AUX_CHOIX_ANNEE,BAL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','B- Immobilisations incorporelles et corporelles','$mission_id','$entrepriseId','$annee','$fileName')";
		 mysql_query($sqlB);
		
		}
		/////////////////////////////////////////////////C////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=2600000000 && $tableCpt1[$i]<=2799999999)||($tableCpt1[$i]>=2960000000 && $tableCpt1[$i]<=2999999999)||($tableCpt1[$i]>=7800000000 && $tableCpt1[$i]<=7829999999) ||($tableCpt1[$i]>=7860000000 && $tableCpt1[$i]<=7869999999)){
		$sqlC = "INSERT INTO tab_bal_aux (BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE, BAL_AUX_CYCLE, MISSION_ID, ENTREPRISE_ID,BAL_AUX_CHOIX_ANNEE,BAL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','C- Immobilisations financi&egrave;res','$mission_id','$entrepriseId','$annee','$fileName')";
		 mysql_query($sqlC);
		
		}
		/////////////////////////////////////////////////D////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=3000000000 && $tableCpt1[$i]<=3999999999)||($tableCpt1[$i]>=6030000000 && $tableCpt1[$i]<=6039999999)||($tableCpt1[$i]>=6830000000 && $tableCpt1[$i]<=6839999999)||($tableCpt1[$i]>=7130000000 && $tableCpt1[$i]<=7149999999)||($tableCpt1[$i]>=7853000000 && $tableCpt1[$i]<=7853999999)){
		$sqlD = "INSERT INTO tab_bal_aux (BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE, BAL_AUX_CYCLE, MISSION_ID, ENTREPRISE_ID,BAL_AUX_CHOIX_ANNEE,BAL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','D- Stocks','$mission_id','$entrepriseId','$annee','$fileName')";
		 mysql_query($sqlD);
		
		}
		/////////////////////////////////////////////////E////////////////////////////////////////////////////////////
		elseif($tableCpt1[$i]>=5000000000 && $tableCpt1[$i]<=5999999999){
		$sqlE = "INSERT INTO tab_bal_aux (BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE, BAL_AUX_CYCLE, MISSION_ID, ENTREPRISE_ID,BAL_AUX_CHOIX_ANNEE,BAL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','E- Tr&eacute;soreries','$mission_id','$entrepriseId','$annee','$fileName')";
		 mysql_query($sqlE);
		
		}
		/////////////////////////////////////////////////F////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=4000000000 && $tableCpt1[$i]<=4099999999)||($tableCpt1[$i]>=4800000000 && $tableCpt1[$i]<=4869999999)||($tableCpt1[$i]>=600000000 && $tableCpt1[$i]<=6029999999)||($tableCpt1[$i]>=6040000000 && $tableCpt1[$i]<=6049999999)||($tableCpt1[$i]>=6100000000 && $tableCpt1[$i]<=6229999999)||($tableCpt1[$i]>=6500000000 && $tableCpt1[$i]<=6599999999)||($tableCpt1[$i]>=6620000000 && $tableCpt1[$i]<=6799999999)){
		$sqlF = "INSERT INTO tab_bal_aux (BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE, BAL_AUX_CYCLE, MISSION_ID, ENTREPRISE_ID,BAL_AUX_CHOIX_ANNEE,BAL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','F- Charges fournisseurs','$mission_id','$entrepriseId','$annee','$fileName')";
		 mysql_query($sqlF);
		
		}
		/////////////////////////////////////////////////G////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=4100000000 && $tableCpt1[$i]<=4199999999)||($tableCpt1[$i]>=4450000000 && $tableCpt1[$i]<=4459999999)||($tableCpt1[$i]>=487000000 && $tableCpt1[$i]<=4879999999)||($tableCpt1[$i]>=4900000000 && $tableCpt1[$i]<=4959999999)||($tableCpt1[$i]>=6840000000 && $tableCpt1[$i]<=6859999999)||($tableCpt1[$i]>=7300000000 && $tableCpt1[$i]<=7799999999)||($tableCpt1[$i]>=7854000000 && $tableCpt1[$i]<=7859999999)){
		$sqlG = "INSERT INTO tab_bal_aux (BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE, BAL_AUX_CYCLE, MISSION_ID, ENTREPRISE_ID,BAL_AUX_CHOIX_ANNEE,BAL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','G- Produits Clients','$mission_id','$entrepriseId','$annee','$fileName')";
		 mysql_query($sqlG);
		}
		/////////////////////////////////////////////////H////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=4200000000 && $tableCpt1[$i]<=4399999999)||($tableCpt1[$i]>=4420000000 && $tableCpt1[$i]<=4429999999)||($tableCpt1[$i]>=640000000 && $tableCpt1[$i]<=6499999999)){
		$sqlH = "INSERT INTO tab_bal_aux (BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE, BAL_AUX_CYCLE, MISSION_ID, ENTREPRISE_ID,BAL_AUX_CHOIX_ANNEE,BAL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','H- Paie et Personnel','$mission_id','$entrepriseId','$annee','$fileName')";
		 mysql_query($sqlH);
		}
		/////////////////////////////////////////////////I////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=4400000000 && $tableCpt1[$i]<=4409999999)||($tableCpt1[$i]>=4410000000 && $tableCpt1[$i]<=4419999999)||($tableCpt1[$i]>=443000000 && $tableCpt1[$i]<=4449999999)||($tableCpt1[$i]>=6300000000 && $tableCpt1[$i]<=6399999999)||($tableCpt1[$i]>=6900000000 && $tableCpt1[$i]<=6999999999)){
		$sqlI = "INSERT INTO tab_bal_aux (BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE, BAL_AUX_CYCLE, MISSION_ID, ENTREPRISE_ID,BAL_AUX_CHOIX_ANNEE,BAL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','I- Imp&ocirc;ts et taxes','$mission_id','$entrepriseId','$annee','$fileName')";
		 mysql_query($sqlI);
		}
		/////////////////////////////////////////////////K////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=4500000000 && $tableCpt1[$i]<=4799999999)||($tableCpt1[$i]>=4960000000 && $tableCpt1[$i]<=4999999999)||($tableCpt1[$i]>=486000000 && $tableCpt1[$i]<=4899999999)||($tableCpt1[$i]>=7830000000 && $tableCpt1[$i]<=7899999999)){
		$sqlK = "INSERT INTO tab_bal_aux (BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE, BAL_AUX_CYCLE, MISSION_ID, ENTREPRISE_ID,BAL_AUX_CHOIX_ANNEE,BAL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]','K- D&eacute;biteurs et cr&eacute;diteurs divers','$mission_id','$entrepriseId','$annee','$fileName')";
		 mysql_query($sqlK);
		}
		
		}
?>