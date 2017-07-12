
<html>
<head>
	<title></title>
<style type="text/css">
	table {
border: medium solid #6495ed;
border-collapse: collapse;
width: 50%;
}
th {
font-family: monospace;
border: thin solid #6495ed;
width: 50%;
padding: 5px;
background-color: #D0E3FA;
background-image: url(sky.jpg);
}
td {
font-family: sans-serif;
border: thin solid #6495ed;
width: 50%;
padding: 5px;
text-align: center;
background-color: #ffffff;
}
caption {
font-family: sans-serif;
}
strong{
	font-size: 11px;
}

		</style>
</head>
<body>
<div id="Rapport">


<?php
session_start();

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

 
if (isset($_GET['page'])) {


include"Dossier_Rapport/connex.php"; 

$deja_venu = $_GET['page'];

$ligne = array();

$ligne=explode(",", $deja_venu);

// 0 = annee / 1 =nom fichier / 2 = id mission / 3= id entreprise /4=nom tab


$ID_mission=$_SESSION['ID_mission_rapport'];
$annee =$ligne[0];
$Nom_fichier=trim($ligne[1]);
$Table =trim($ligne[2]);



if ($Table=="tab_importer") {

$req="DISTINCT(IMPORT_CHOIX_ANNEE),IMPORT_COMPTES,IMPORT_INTITULES,IMPORT_DEBIT,IMPORT_CREDIT,IMPORT_SOLDE,IMPORT_CYCLE,IMPORT_DOCUMENT";
	$title_tab ="<td>IMPORT_COMPTES</td><td>IMPORT_INTITULES</td><td>IMPORT_DEBIT</td><td>IMPORT_CREDIT</td><td>IMPORT_SOLDE</td><td>IMPORT_CYCLE</td>";
$req= db_connect ("SELECT * FROM $Table 
	WHERE MISSION_ID='$ID_mission' AND ENTREPRISE_ID=0 AND IMPORT_CHOIX_ANNEE='$annee' AND IMPORT_DOCUMENT ='$Nom_fichier'  ");
echo '<table><tr>'.$title_tab.'</tr>';

foreach ($req as $value) {
	$IMPORT_COMPTES =$value ['IMPORT_COMPTES'];
	$IMPORT_INTITULES =$value ['IMPORT_INTITULES']; 
	$IMPORT_DEBIT =$value ['IMPORT_DEBIT'];

	$IMPORT_CREDIT =$value ['IMPORT_CREDIT'];
	$IMPORT_SOLDE =$value ['IMPORT_SOLDE']; 
	$IMPORT_CYCLE =$value ['IMPORT_CYCLE'];

echo '<tr><td><strong>'.$IMPORT_COMPTES.'</strong></td><td><strong>'.$IMPORT_INTITULES.'</strong></td><td><strong>'.$IMPORT_DEBIT.'</strong></td>
	  <td><strong>'.$IMPORT_CREDIT.'</strong></td><td><strong>'.$IMPORT_SOLDE.'</strong></td>
	  <td><strong>'.$IMPORT_CYCLE.'</strong></td></tr>'; 
}
echo  "</table>";

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


}elseif ($Table=="tab_bal_aux") {
	//echo "tab_bal_aux";

$req="DISTINCT(BAL_AUX_CHOIX_ANNEE),BAL_AUX_COMPTE,BAL_AUX_CODE,BAL_AUX_LIBELLE,BAL_AUX_DEBIT,BAL_AUX_CREDIT,BAL_AUX_SOLDE,BAL_AUX_CYCLE";
	$title_tab ="<td>BAL_AUX_COMPTE</td><td>BAL_AUX_CODE</td><td>BAL_AUX_LIBELLE</td><td>BAL_AUX_DEBIT</td><td>BAL_AUX_CREDIT</td><td>BAL_AUX_SOLDE</td><td>BAL_AUX_CYCLE</td>";
$req= db_connect ("SELECT $req
	FROM $Table 
	WHERE MISSION_ID='$ID_mission' AND ENTREPRISE_ID=0 AND BAL_AUX_CHOIX_ANNEE='$annee' AND BAL_AUX_DOCUMENT ='$Nom_fichier'  ");
echo '<table><tr>'.$title_tab.'</tr>';

foreach ($req as $value) {
	$BAL_AUX_COMPTE =$value ['BAL_AUX_COMPTE'];
	$BAL_AUX_CODE =$value ['BAL_AUX_CODE']; 
	$BAL_AUX_LIBELLE =$value ['BAL_AUX_LIBELLE'];

	$BAL_AUX_DEBIT =$value ['BAL_AUX_DEBIT'];
	$BAL_AUX_CREDIT =$value ['BAL_AUX_CREDIT']; 
	$BAL_AUX_SOLDE =$value ['BAL_AUX_SOLDE'];
	$BAL_AUX_CYCLE =$value ['BAL_AUX_CYCLE'];

echo '<tr><td><strong>'.$BAL_AUX_COMPTE.'</strong></td><td><strong>'.$BAL_AUX_CODE.'</strong></td><td><strong>'.$BAL_AUX_LIBELLE.'</strong></td>
	  <td><strong>'.$BAL_AUX_DEBIT.'</strong></td><td><strong>'.$BAL_AUX_CREDIT.'</strong></td>
	  <td><strong>'.$BAL_AUX_SOLDE.'</strong></td><td><strong>'.$BAL_AUX_CYCLE.'</strong></td></tr>';  
}
echo  "</table>";



//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
}elseif ($Table=="tab_gl_gen") {
	//echo "tab_gl_gen";

$req="DISTINCT(GL_GEN_CHOIX_ANNEE),GL_GEN_COMPTES,GL_GEN_DATE,GL_GEN_JL,GL_GEN_REF,GL_GEN_LIBELLE,GL_GEN_LEFT,GL_GEN_DEBIT,GL_GEN_SOLDE,GL_GEN_CYCLE";
	$title_tab ="<td>GL_GEN_COMPTES</td><td>GL_GEN_DATE</td><td>GL_GEN_JL</td><td>GL_GEN_REF</td><td>GL_GEN_LIBELLE</td><td>GL_GEN_LEFT</td><td>GL_GEN_DEBIT</td><td>GL_GEN_SOLDE</td><td>GL_GEN_CYCLE</td>";
$req= db_connect ("SELECT $req
	FROM $Table 
	WHERE MISSION_ID='$ID_mission' AND ENTREPRISE_ID=0 AND GL_GEN_CHOIX_ANNEE='$annee' AND GL_GEN_DOCUMENT ='$Nom_fichier'  ");
echo '<table><tr>'.$title_tab.'</tr>';

foreach ($req as $value) {
	$GL_GEN_COMPTES =$value ['GL_GEN_COMPTES'];
	$GL_GEN_DATE =$value ['GL_GEN_DATE']; 
	$GL_GEN_JL =$value ['GL_GEN_JL'];

	$GL_GEN_REF =$value ['GL_GEN_REF'];
	$GL_GEN_LIBELLE =$value ['GL_GEN_LIBELLE']; 
	$GL_GEN_LEFT =$value ['GL_GEN_LEFT'];
	$GL_GEN_DEBIT =$value ['GL_GEN_DEBIT'];
	$GL_GEN_SOLDE =$value ['GL_GEN_SOLDE']; 
	$GL_GEN_CYCLE =$value ['GL_GEN_CYCLE'];
echo '<tr>
       <td><strong>'.$GL_GEN_COMPTES.'</strong></td><td><strong>'.$GL_GEN_DATE.'</strong></td><td><strong>'.$GL_GEN_JL.'</strong></td>
	  <td><strong>'.$GL_GEN_REF.'</strong></td><td><strong>'.$GL_GEN_LIBELLE.'</strong></td>
	  <td><strong>'.$GL_GEN_LEFT.'</strong></td><td><strong>'.$GL_GEN_DEBIT.'</strong></td>
	  <td><strong>'.$GL_GEN_SOLDE.'</strong></td><td><strong>'.$GL_GEN_CYCLE.'</strong></td>
	  </tr>';  
}
echo  "</table>";




//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	
}else{


$req="DISTINCT(GL_AUX_CHOIX_ANNEE),GL_AUX_COMPTE,GL_AUX_CODE,GL_AUX_DATE,GL_AUX_JL,GL_AUX_LIGNE,GL_AUX_REF,GL_AUX_LIBELLE,GL_AUX_ECHEANCE,GL_AUX_LETTRAGE,GL_AUX_DEBIT,GL_AUX_CREDIT,GL_AUX_SOLDE,GL_AUX_CYCLE";
	$title_tab ="<td>GL_AUX_COMPTE</td><td>GL_AUX_CODE</td><td>GL_AUX_DATE</td><td>GL_AUX_JL</td>
				<td>GL_AUX_LIGNE</td><td>GL_AUX_REF</td> <td>GL_AUX_LIBELLE</td><td>GL_AUX_ECHEANCE</td>
				<td>GL_AUX_LETTRAGE</td><td>GL_AUX_DEBIT</td> <td>GL_AUX_CREDIT</td><td>GL_AUX_SOLDE</td>
				<td>GL_AUX_CYCLE</td>
				";
$req= db_connect ("SELECT $req
	FROM $Table 
	WHERE MISSION_ID='$ID_mission' AND ENTREPRISE_ID=0 AND GL_AUX_CHOIX_ANNEE='$annee' AND GL_AUX_DOCUMENT ='$Nom_fichier'  ");
echo '<table><tr>'.$title_tab.'</tr>';

foreach ($req as $value) {
	$GL_AUX_COMPTE =$value ['GL_AUX_COMPTE'];
	$GL_AUX_CODE =$value ['GL_AUX_CODE']; 
	$GL_AUX_DATE =$value ['GL_AUX_DATE'];

	$GL_AUX_JL =$value ['GL_AUX_JL'];
	$GL_AUX_LIGNE =$value ['GL_AUX_LIGNE']; 
	$GL_AUX_REF =$value ['GL_AUX_REF'];

	$GL_AUX_LIBELLE =$value ['GL_AUX_LIBELLE'];
	$GL_AUX_ECHEANCE =$value ['GL_AUX_ECHEANCE']; 
	$GL_AUX_LETTRAGE =$value ['GL_AUX_LETTRAGE'];
   $GL_AUX_DEBIT =$value ['GL_AUX_DEBIT'];
	$GL_AUX_CREDIT =$value ['GL_AUX_CREDIT'];
	$GL_AUX_SOLDE =$value ['GL_AUX_SOLDE']; 
	$GL_AUX_CYCLE =$value ['GL_AUX_CYCLE'];

echo '<tr><td><strong>'.$GL_AUX_COMPTE.'</strong></td><td><strong>'.$GL_AUX_CODE.'</strong></td><td><strong>'.$GL_AUX_DATE.'</strong></td>
	  <td><strong>'.$GL_AUX_JL.'</strong></td><td><strong>'.$GL_AUX_LIGNE.'</strong></td>
	  <td><strong>'.$GL_AUX_REF.'</strong></td><td><strong>'.$GL_AUX_LIBELLE.'</strong></td><td><strong>'.$GL_AUX_ECHEANCE.'</strong></td>
	  <td><strong>'.$GL_AUX_LETTRAGE.'</strong></td><td><strong>'.$GL_AUX_DEBIT.'</strong></td>
	   <td><strong>'.$GL_AUX_CREDIT.'</strong></td><td><strong>'.$GL_AUX_SOLDE.'</strong></td>
	   <td><strong>'.$GL_AUX_CYCLE.'</strong></td>
	  </tr>'; 
}
echo  "</table>";


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

}



}else{
	echo "Cookies vide";
}

?>
</div>
</body>
</html>


