<?php 
 
	include'connexion.php';
		
		// $id=$_POST['a'];
		
		$sqlListEntreprise='SELECT ENTREPRISE_ID,ENTREPRISE_DENOMINATION_SOCIAL,
			ENTREPRISE_CONTACT,ENTREPRISE_CAPITAL_SOCIAL,ENTREPRISE_NIF,
			ENTREPRISE_STAT,ENTREPRISE_REG_COM, ENTREPRISE_RAISON_SOCIAL,ENTREPRISE_ADRESSE,ENTREPRISE_MAIL,
			ENTREPRISE_CODE,ENTREPRISE_SECTEUR_ACTIVITE,ENTREPRISE_DATE_CREATION,
			ENTREPRISE_DURE_SOCIETE,ENTREPRISE_ACTIVITE,ENTREPRISE_NOMBRE_SALARIE,ENTREPRISE_EXO_COMPTABLE,ENTREPRISE_VALORISATION_STOCK,
			ENTREPRISE_SITE_INTERNET,ENTREPRISE_NOMBRE_ACTION,ENTREPRISE_VALEUR_NOMINAL,ENTREPRISE_NBR_ACTIONNAIR
			FROM  tab_entreprise ';
			
		 $reponseList=$bdd->query($sqlListEntreprise);
		 while($donnee_list=$reponseList->fetch()){
		 
		 $Id=$donnee_list['ENTREPRISE_ID'];
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
	 
		 
		
	
	?>

<div id="statut-<?php echo $Id; ?>" class="un_statut_entreprise">
	<div class="data_statut_entreprise">
		<div class="entete_statut">
			<span class="titre_statut"><?php echo $denom ; ?></span>
			<span class="date_aujourduit"><?php echo $dateCreat;?></span><br/>
			<span class="type_entreprise"><?php echo $RaisonSos;?></span>
		</div>
		<div class="details_entreprise">
			<div class="date_cloture">
				Cloture d'E.C.<br/>
				<?php// echo $ExoComp; ?>
				
				<span class="jours_cloture"><?php echo substr($ExoComp,0,2);?></span><br/>
				<span class="mois_cloture">
					<?php 
						$mois=substr($ExoComp,2,10);
						if ($mois=="/12"){echo "Décembre";}
						elseif($mois=="/06"){echo "Juin";}
						else echo substr($ExoComp,3,10);
						
					?>
				</span>
			</div>
			SECTEUR<br/>
			<span class="secteur"><?php echo $SectActiv;?></span><br/><br/>
			SIEGE<br/>
			<span class="siege"><?php echo $Adress ;?></span><br/><br/>
			Situation mission<br/>
			<span class="situation">EN COURS</span>
		</div><!--fin details_entreprise-->
	</div><!--fin data_statut_entreprise-->
</div><!--fin un_statut entreprise-->
<?php
}
?>
