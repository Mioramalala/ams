<?php

include '../connexion.php';
	if(@$_POST['a']&& @$_POST['u'] && @$_POST['o'] && @$_POST['p'] )
{
	$idEntre=$_POST['id'];
	$denom=$_POST['a'];
	$adress=$_POST['z'];
	$RaizSos=$_POST['e'];
	$Contact=$_POST['r'];
	$CapSos=$_POST['t'];
	$RC=$_POST['y'];
	$NumStat=$_POST['u'];
	$Mail=$_POST['i'];
	$NIF=$_POST['o'];
	$Code=$_POST['p'];
	$sectActiv=$_POST['q'];
	$dateCrea=$_POST['s'];
	$DurSociete=$_POST['d'];
	$Activite=$_POST['f'];
	$NbrSal=$_POST['g'];
	$ExoComp=$_POST['h'];
	$ValStock=$_POST['j'];
	$Site=$_POST['k'];
	$NbrAction=$_POST['l'];
	$ValNom=$_POST['m'];
	// echo $Activite;
	//echo $denom.$adress.$RaizSos.$ValStock.$DurSociete.$ValNom.$dateCrea.$sectActiv.$NumStat ;
	
	
	
//////////////////////////////////////////////////////////////////////////////////////////////////
$req= $bdd-> prepare('UPDATE  tab_entreprise SET  ENTREPRISE_DENOMINATION_SOCIAL=:Denom,
ENTREPRISE_CONTACT=:contact,ENTREPRISE_CAPITAL_SOCIAL=:capi,
ENTREPRISE_NIF=:nif,ENTREPRISE_STAT=:stat,ENTREPRISE_REG_COM=:rc,ENTREPRISE_RAISON_SOCIAL=:raisonSos,
ENTREPRISE_ADRESSE=:adr,ENTREPRISE_MAIL=:mail,ENTREPRISE_CODE=:code,ENTREPRISE_SECTEUR_ACTIVITE=:sectAct,
ENTREPRISE_DATE_CREATION=:dateCre,ENTREPRISE_DURE_SOCIETE=:dure,ENTREPRISE_ACTIVITE=:activite,ENTREPRISE_NOMBRE_SALARIE=:nbrSal,
ENTREPRISE_EXO_COMPTABLE=:exoCom,ENTREPRISE_VALORISATION_STOCK=:valstok,ENTREPRISE_SITE_INTERNET=:web,
ENTREPRISE_NOMBRE_ACTION=:nbrAct,ENTREPRISE_VALEUR_NOMINAL=:valnom   WHERE ENTREPRISE_ID='.$idEntre);
$req->execute(array(
'Denom'=>$denom,
'contact'=>$Contact,
'capi'=>$CapSos,
'nif'=>$NIF,
'stat'=>$NumStat,
'rc'=>$RC,
'raisonSos'=>$RaizSos,
'adr'=>$adress,
'mail'=>$Mail,
'code'=>$Code,
'sectAct'=>$sectActiv,
'dateCre'=>$dateCrea,
'dure'=>$DurSociete,
'activite'=>$Activite,
'nbrSal'=>$NbrSal,
'exoCom'=>$ExoComp,
'valstok'=>$ValStock,
'web'=>$Site,
'nbrAct'=>$NbrAction,
'valnom'=>$ValNom

///////////////////////////////////////////////////////////////////////////////////////////

));


}
?>













