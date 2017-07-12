 <?php
		
		include '../connexionexcel.php';
		
		$cpt1=$_POST['cpt1'];
		echo $cpt1;
		$tableCpt1=explode(",",$cpt1);
		echo count($tableCpt1);
		
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
		
		$cpt8=$_POST['cpt8'];
		$tableCpt8=explode(",",$cpt8);
		
		$cpt9=$_POST['cpt9'];
		$tableCpt9=explode(",",$cpt9);
		
		$cpt10=$_POST['cpt10'];
		$tableCpt10=explode(",",$cpt10);
		
		$cpt11=$_POST['cpt11'];
		$tableCpt11=explode(",",$cpt11);
		
		$cpt12=$_POST['cpt12'];
		$tableCpt12=explode(",",$cpt12);
		
		$cpt13=$_POST['cpt13'];
		$tableCpt13=explode(",",$cpt13);
		
		
		$mission_id=$_POST['mission_id'];
		
		$entrepriseId=$_POST['entrepriseId'];
		
		//echo $entrepriseId;
		
		$annee=$_POST['annee'];
		$tableCpt14=explode(",",$annee);
		//echo $tableCpt14;
		
		$fileName=$_POST['fileName'];
		$tableCpt15=explode(",",$fileName);
		
		for($i=0; $i<count($tableCpt1);$i++){
		////////////////////////////////////////////////A/////////////////////////////////////////////////////////////
		if(($tableCpt1[$i]>=1000000000 && $tableCpt1[$i]<=1599999999) || ($tableCpt1[$i]>=1700000000 && $tableCpt1[$i]<= 1999999999)){
		$sqlA = "INSERT INTO tab_gl_aux (GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF, 	 	 	GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUX_CHOIX_ANNEE,GL_AUX_DOCUMENT) 
						VALUES ('$tableCpt1[$i]',
						'$tableCpt2[$i]',
						'$tableCpt3[$i]',
						'$tableCpt4[$i]',
						'$tableCpt5[$i]',
						'$tableCpt6[$i]',
						'$tableCpt7[$i]',
						'$tableCpt8[$i]',
						'$tableCpt9[$i]',
						'$tableCpt10[$i]',
						'$tableCpt11[$i]',
						'$tableCpt12[$i]',
						'A- Fonds propres',
						'$mission_id',
						'$entrepriseId',
						'$annee',
						'$fileName')";
		$execution=mysql_query($sqlA);
		
		if(!$execution) echo $sqlA.''.$i;
		}
	
		////////////////////////////////////////////////J/////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=16000000 && $tableCpt1[$i]<=16999999)||($tableCpt1[$i]>=66000000 && $tableCpt1[$i]<=66199999)){
		$sqlJ = "INSERT INTO tab_gl_aux (GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF, 	 	 	GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUX_CHOIX_ANNEE,GL_AUX_DOCUMENT) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'J- Emprunts et dettes financi&egrave;res','$mission_id','$entrepriseId','$annee','$fileName')";
		$execution=mysql_query($sqlJ);
		
		if(!$execution) echo $sqlJ.''.$i;
		}
		/////////////////////////////////////////////////B////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=20000000 && $tableCpt1[$i]<=25999999)||($tableCpt1[$i]>=28100000 && $tableCpt1[$i]<=28599999)||($tableCpt1[$i]>=29000000 && $tableCpt1[$i]<=29599999)||($tableCpt1[$i]>=68000000 && $tableCpt1[$i]<=68299999)||($tableCpt1[$i]>=72000000 && $tableCpt1[$i]<=72999999)){
		$sqlB = "INSERT INTO tab_gl_aux (GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF, 	 	 	GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUX_CHOIX_ANNEE,GL_AUX_DOCUMENT) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'B- Immobilisations incorporelles et corporelles','$mission_id','$entrepriseId','$annee','$fileName')";
		$execution=mysql_query($sqlB);
		
		if(!$execution) echo $sqlB.''.$i;
		}
		/////////////////////////////////////////////////C////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=26000000 && $tableCpt1[$i]<=27999999)||($tableCpt1[$i]>=29600000 && $tableCpt1[$i]<=29999999)||($tableCpt1[$i]>=78000000 && $tableCpt1[$i]<=78299999) ||($tableCpt1[$i]>=78600000 && $tableCpt1[$i]<=78699999)){
		$sqlC = "INSERT INTO tab_gl_aux (GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF, 	 	 	GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUX_CHOIX_ANNEE,GL_AUX_DOCUMENT) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'C- Immobilisations financi&egrave;res','$mission_id','$entrepriseId','$annee','$fileName')";
		$execution=mysql_query($sqlC);
		
		if(!$execution) echo $sqlC.''.$i;
		}
		/////////////////////////////////////////////////D////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=30000000 && $tableCpt1[$i]<=39999999)||($tableCpt1[$i]>=60300000 && $tableCpt1[$i]<=60399999)||($tableCpt1[$i]>=68300000 && $tableCpt1[$i]<=68399999)||($tableCpt1[$i]>=71300000 && $tableCpt1[$i]<=71499999)||($tableCpt1[$i]>=78530000 && $tableCpt1[$i]<=78539999)){
		$sqlD = "INSERT INTO tab_gl_aux (GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF, 	 	 	GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUX_CHOIX_ANNEE,GL_AUX_DOCUMENT) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'D- Stocks','$mission_id','$entrepriseId','$annee','$fileName')";
		$execution=mysql_query($sqlD);
		
		if(!$execution) echo $sqlD.''.$i;
		}
		/////////////////////////////////////////////////E////////////////////////////////////////////////////////////
		elseif($tableCpt1[$i]>=50000000 && $tableCpt1[$i]<=59999999){
		$sqlE = "INSERT INTO tab_gl_aux (GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF, 	 	 	GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUX_CHOIX_ANNEE,GL_AUX_DOCUMENT) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'E- Tr&eacute;soreries','$mission_id','$entrepriseId','$annee','$fileName')";
		$execution=mysql_query($sqlE);
		
		if(!$execution) echo $sqlE.''.$i;
		}
		/////////////////////////////////////////////////F////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=40000000 && $tableCpt1[$i]<=40999999)||($tableCpt1[$i]>=48000000 && $tableCpt1[$i]<=48699999)||($tableCpt1[$i]>=6000000 && $tableCpt1[$i]<=60299999)||($tableCpt1[$i]>=60400000 && $tableCpt1[$i]<=60499999)||($tableCpt1[$i]>=61000000 && $tableCpt1[$i]<=62299999)||($tableCpt1[$i]>=65000000 && $tableCpt1[$i]<=65999999)||($tableCpt1[$i]>=66200000 && $tableCpt1[$i]<=67999999)){
		$sqlF = "INSERT INTO tab_gl_aux (GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF, 	 	 	GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUX_CHOIX_ANNEE,GL_AUX_DOCUMENT) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'F- Charges fournisseurs','$mission_id','$entrepriseId','$annee','$fileName')";
		$execution=mysql_query($sqlF);
		
		if(!$execution) echo $sqlF.''.$i;
		}
		/////////////////////////////////////////////////G////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=41000000 && $tableCpt1[$i]<=41999999)||($tableCpt1[$i]>=44500000 && $tableCpt1[$i]<=44599999)||($tableCpt1[$i]>=4870000 && $tableCpt1[$i]<=48799999)||($tableCpt1[$i]>=49000000 && $tableCpt1[$i]<=49599999)||($tableCpt1[$i]>=68400000 && $tableCpt1[$i]<=68599999)||($tableCpt1[$i]>=73000000 && $tableCpt1[$i]<=77999999)||($tableCpt1[$i]>=78540000 && $tableCpt1[$i]<=78599999)){
		$sqlG = "INSERT INTO tab_gl_aux (GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF, 	 	 	GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUX_CHOIX_ANNEE,GL_AUX_DOCUMENT) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'G- Produits Clients','$mission_id','$entrepriseId','$annee','$fileName')";
		$execution=mysql_query($sqlG);
		
		if(!$execution) echo $sqlG.''.$i;
		}
		/////////////////////////////////////////////////H////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=42000000 && $tableCpt1[$i]<=43999999)||($tableCpt1[$i]>=44200000 && $tableCpt1[$i]<=44299999)||($tableCpt1[$i]>=6400000 && $tableCpt1[$i]<=64999999)){
		$sqlH = "INSERT INTO tab_gl_aux (GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF, 	 	 	GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUX_CHOIX_ANNEE,GL_AUX_DOCUMENT) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'H- Paie et Personnel','$mission_id','$entrepriseId','$annee','$fileName')";
		$execution=mysql_query($sqlH);
		
		if(!$execution) echo $sqlH.''.$i;
		}
		/////////////////////////////////////////////////I////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=44000000 && $tableCpt1[$i]<=44099999)||($tableCpt1[$i]>=44100000 && $tableCpt1[$i]<=44199999)||($tableCpt1[$i]>=4430000 && $tableCpt1[$i]<=44499999)||($tableCpt1[$i]>=63000000 && $tableCpt1[$i]<=63999999)||($tableCpt1[$i]>=69000000 && $tableCpt1[$i]<=69999999)){
		$sqlI = "INSERT INTO tab_gl_aux (GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF, 	 	 	GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUX_CHOIX_ANNEE,GL_AUX_DOCUMENT) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'I- Imp&ocirc;ts et taxes','$mission_id','$entrepriseId','$annee','$fileName')";
		$execution=mysql_query($sqlI);
		
		if(!$execution) echo $sqlI.''.$i;
		}
		/////////////////////////////////////////////////K////////////////////////////////////////////////////////////
		elseif(($tableCpt1[$i]>=45000000 && $tableCpt1[$i]<=47999999)||($tableCpt1[$i]>=49600000 && $tableCpt1[$i]<=49999999)||($tableCpt1[$i]>=4860000 && $tableCpt1[$i]<=48999999)||($tableCpt1[$i]>=78300000 && $tableCpt1[$i]<=78999999)){
		$sqlK = "INSERT INTO tab_gl_aux (GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF, 	 	 	GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE,MISSION_ID,ENTREPRISE_ID,GL_AUX_CHOIX_ANNEE,GL_AUX_DOCUMENT) 
		VALUES ('$tableCpt1[$i]','$tableCpt2[$i]','$tableCpt3[$i]','$tableCpt4[$i]','$tableCpt5[$i]','$tableCpt6[$i]',
		'$tableCpt7[$i]','$tableCpt8[$i]','$tableCpt9[$i]','$tableCpt10[$i]','$tableCpt11[$i]','$tableCpt12[$i]',
		'K- D&eacute;biteurs et cr&eacute;diteurs divers','$mission_id','$entrepriseId','$annee','$fileName')";
		$execution=mysql_query($sqlK);
		
		if(!$execution) echo $sqlK.''.$i;
		
		}
		
		}
?>