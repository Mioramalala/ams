<?php 
session_start();
	include '../connexion.php';
	// @session_unset($session['dernie_denom']);
	// @unset($session['dernie_denom']);
	// session_destroy();
	if(@$_POST['a'] && @$_POST['u'] && @$_POST['o'] && @$_POST['p']) {
		
		$denom      = $_POST['a'];
		$adress     = $_POST['z'];
		$RaizSos    = $_POST['e'];
		$Contact    = $_POST['r'];
		$CapSos     = $_POST['t'];
		$RC         = $_POST['y'];
		$NumStat    = $_POST['u'];
		$Mail       = $_POST['i'];
		$NIF        = $_POST['o'];
		$Code       = $_POST['p'];
		$sectActiv  = $_POST['q'];
		$dateCrea   = $_POST['s'];
		$DurSociete = $_POST['d'];
		$Activite   = $_POST['f'];
		$NbrSal     = $_POST['g'];
		$ExoComp    = $_POST['h'];
		$ValStock   = $_POST['j'];
		$Site       = $_POST['k'];
		$NbrAction  = $_POST['l'];
		$ValNom     = $_POST['m'];
		//$NbrActNair = $_POST['w'];
			
		// echo $denom.$adress.$RaizSos.$NbrActNair.$ValStock.$DurSociete.$ValNom.$dateCrea.$sectActiv.$NumStat ;
		$reqInsertEntreorise = $bdd->prepare("
			INSERT INTO tab_entreprise (
				ENTREPRISE_DENOMINATION_SOCIAL,
				ENTREPRISE_CONTACT,
				ENTREPRISE_CAPITAL_SOCIAL,
				ENTREPRISE_NIF,
				ENTREPRISE_STAT,
				ENTREPRISE_REG_COM,
				ENTREPRISE_RAISON_SOCIAL,
				ENTREPRISE_ADRESSE,
				ENTREPRISE_MAIL,
				ENTREPRISE_CODE,
				ENTREPRISE_SECTEUR_ACTIVITE,
				ENTREPRISE_DATE_CREATION,
				ENTREPRISE_DURE_SOCIETE,
				ENTREPRISE_ACTIVITE,
				ENTREPRISE_NOMBRE_SALARIE,
				ENTREPRISE_EXO_COMPTABLE,
				ENTREPRISE_VALORISATION_STOCK,
				ENTREPRISE_SITE_INTERNET,
				ENTREPRISE_NOMBRE_ACTION,
				ENTREPRISE_VALEUR_NOMINAL
			) VALUE (:a,:z,:e,:r,:t,:y,:n,:u,:i,:p,:q,:s,:d,:f,:g,:h,:j,:k,:l,:m)"
		);

		$reqInsertEntreorise->execute(array(
			'a' => $denom,
			'z' => $Contact ,
			'e' => $CapSos ,
			'r' => $NIF,
			't' => $NumStat ,
			'y' => $RC,
			'n' => $RaizSos,
			'u' => $adress,
			'i' => $Mail,
			'p' => $Code,
			'q' => $sectActiv,
			's' => $dateCrea,
			'd' => $DurSociete,
			'f' => $Activite,
			'g' => $NbrSal,
			'h' => $ExoComp,
			'j' => $ValStock,
			'k' => $Site,
			'l' => $NbrAction,
			'm' => $ValNom
		));

		unset($_SESSION['entreprise']) ;
		$_SESSION["entreprise"] = $bdd->lastInsertId();
		
	}
?>

<?php
	$ch_docEntreprise = '../repertoire_document/doc_'.$denom;
	mkdir($ch_docEntreprise, 0777);
?>

