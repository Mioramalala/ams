<link rel="stylesheet" href="css/css.css"/>
<?php  
	include'../connexion.php';
		
		$id=$_POST['a'];
		
		$sqlListEntreprise='SELECT ENTREPRISE_DENOMINATION_SOCIAL,
			ENTREPRISE_CONTACT,ENTREPRISE_CAPITAL_SOCIAL,ENTREPRISE_NIF,
			ENTREPRISE_STAT,ENTREPRISE_REG_COM, ENTREPRISE_RAISON_SOCIAL,ENTREPRISE_ADRESSE,ENTREPRISE_MAIL,
			ENTREPRISE_CODE,ENTREPRISE_SECTEUR_ACTIVITE,ENTREPRISE_DATE_CREATION,
			ENTREPRISE_DURE_SOCIETE,ENTREPRISE_ACTIVITE,ENTREPRISE_NOMBRE_SALARIE,ENTREPRISE_EXO_COMPTABLE,ENTREPRISE_VALORISATION_STOCK,
			ENTREPRISE_SITE_INTERNET,ENTREPRISE_NOMBRE_ACTION,ENTREPRISE_VALEUR_NOMINAL,ENTREPRISE_NBR_ACTIONNAIR
			FROM  tab_entreprise WHERE ENTREPRISE_ID='.$id;
			
		 $reponseList=$bdd->query($sqlListEntreprise);
		 while($donnee_list=$reponseList->fetch()){
		 
		 $denom=$donnee_list['ENTREPRISE_DENOMINATION_SOCIAL'];
		 $Contact=$donnee_list['ENTREPRISE_CONTACT'];
		 $CapSos=$donnee_list['ENTREPRISE_CAPITAL_SOCIAL'];
		 $RC=$donnee_list['ENTREPRISE_REG_COM'];
		 $Nif=$donnee_list['ENTREPRISE_NIF'];
		 $Stat=$donnee_list['ENTREPRISE_STAT'];
		 $RaisonSos=$donnee_list['ENTREPRISE_RAISON_SOCIAL'];
		 $Adress=$donnee_list['ENTREPRISE_ADRESSE'];
		 $Mail=$donnee_list['ENTREPRISE_MAIL'];
		 $Code=$donnee_list['ENTREPRISE_CODE'];
		 $SectActiv=$donnee_list['ENTREPRISE_SECTEUR_ACTIVITE'];
		 $dateCreat=$donnee_list['ENTREPRISE_DATE_CREATION'];
		 $DureSoc=$donnee_list['ENTREPRISE_DURE_SOCIETE'];
		 $Activite=$donnee_list['ENTREPRISE_ACTIVITE'];
		 $ExoComp=$donnee_list['ENTREPRISE_EXO_COMPTABLE'];
		 $ValStock=$donnee_list['ENTREPRISE_VALORISATION_STOCK'];
		 $NbrAction=$donnee_list['ENTREPRISE_NOMBRE_ACTION'];
	 
		 }
		
	
	?>
		<div id="infoEntr" >
					<p id="info_ambony">
						<label id="denom"><?php echo $denom;?></label></br>
						<label id="DateCreat"><?php echo $dateCreat.' - ';?> Aujourd'hui</label></br>
						<label id="SARL"><?php echo $RaisonSos;?></label>
					</p>
			<table id="entr_info">
				
					
				
				<td>
					<p>SECTEUR</br><?php echo''.$SectActiv.'';?><br>SIEGE </br><?php echo ''.$Adress.' .';?> </br>SIUATION MISSION </br>EN COURS</p>
				
				</td>
				<td>
					<div id="dateExComp">
						<label>Exercice Comptable</label>
						<label id="Dat"> <?php echo''.$ExoComp.'';?> </label>
					</div>
				</td>
			</table>
			
		</div>
		
			
				
							





