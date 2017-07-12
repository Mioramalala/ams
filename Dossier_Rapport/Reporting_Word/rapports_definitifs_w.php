<?php
session_start();
require_once 'class_word/PhpWord-new/Autoloader.php';

// Fonction pour éviter les erreurs
function decoder($texte){
	$texte = utf8_encode($texte);
	$texteFinal = html_entity_decode(iconv('UTF-8', 'ISO-8859-1',$texte));
	return htmlspecialchars(utf8_decode($texteFinal));
}

use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;
Autoloader::register();
Settings::loadConfig();

$document = new \PhpOffice\PhpWord\TemplateProcessor('Template_word/template_rapports_definitifs.docx');

require_once("../../connexion.php");

//INITIALISATION =================================
// $DATE_achat = date("d-m-Y");
//$heure_ajout = date("H:i");
$mission = $_SESSION['idMission'];

	$sql = "SELECT `ENTREPRISE_ID`,MISSION_DATE_DEBUT as N1,MISSION_DATE_CLOTURE as N,MISSION_ANNEE as A
			FROM `tab_mission`
			WHERE `MISSION_ID` =". $mission;
	$req = $bdd->query($sql) or die($sql);

	$data = $req->fetch();
	$entreprise_id = $data['ENTREPRISE_ID'];
	$daten = $data['N'];
	$daten1 = $data['N1'];
	$anneen = $data['A'];
	$anneen1 = $data['A']-1;

	//ENTREPRISE
	$req = $bdd->query("SELECT ENTREPRISE_DENOMINATION_SOCIAL,ENTREPRISE_CODE as code,ENTREPRISE_CAPITAL_SOCIAL as capital,ENTREPRISE_NOMBRE_ACTION as nbaction,ENTREPRISE_VALEUR_NOMINAL as valnominale,ENTREPRISE_VALORISATION_STOCK as valstock, ENTREPRISE_ACTIVITE as activite FROM `tab_entreprise` WHERE `ENTREPRISE_ID` =".$entreprise_id) or die($sql);

	$data = $req->fetch();
	$entreprise = $data['ENTREPRISE_DENOMINATION_SOCIAL'];
	$capital = $data['capital'];
	$nbaction = $data['nbaction'];
	$valnominale = $data['valnominale'];
	$activite = $data['activite'];
	$valstock = $data['valstock'];
	$code = $data['code'];
//INITIALISATION =================================
$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre"); 

//Date N-1
$date = explode("/", $daten1);
if(is_array($date))
{
	$m = (int)$date[1];
	$dateFr1 = $date[0]." ".$mois[$m]." ".$date[2];
}else $dateFr1 =  $daten1;

//Date N
$date = explode("/", $daten);
if(is_array($date))
{
	$m = (int)$date[1];
	$dateFr = $date[0]." ".$mois[$m]." ".$date[2];
}else $dateFr =  $daten;

$DATE_export = date("d-m-Y");

//Societe
$capital = number_format($capital, 2, ',', ' ');
$nbaction = number_format($nbaction, 2, ',', ' ');
$valnominale = number_format($valnominale, 2, ',', ' ');
$document->setValue('nomEntreprise', $entreprise); //NOM SOCIETE
$document->setValue('capital', $capital); //NOM SOCIETE
$document->setValue('nbaction', $nbaction); //NOM SOCIETE
$document->setValue('valnominale', $valnominale); //NOM SOCIETE
$document->setValue('activite', decoder($activite)); //activités
$document->setValue('valstock', $valstock); //valorisation stock
$document->setValue('datefrn', $dateFr); //date : 14 septembre 2014
$document->setValue('datefrn1', $dateFr1); //date : 14 septembre 2014
$document->setValue('daten', $dateFr); //date : 14 septembre 2014
$document->setValue('daten1', $dateFr1); //date : 14 septembre 2014
$document->setValue('anneen', $anneen);		 //année : 2013
$document->setValue('anneen1', $anneen1);		 //année : 2013

// SITUATION FISCALE
$sql = "SELECT * FROM `tab_rubrique_fisc` WHERE `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
if($row>0)
{
	$data = $req->fetch();
	$texte = stripslashes($data['resultat']);
	$texte = decoder($texte);
	$document->setValue('resultat', $texte);
	$document->setValue('montant', $data['montant']);
	$document->setValue('impot', $data['impots']);

	if($data['res_impots']=='on') $minimum = " minimum d'impôt ";
	else $minimum = " impôt ";
	// $minimum = utf8_decode($minimum);
	$document->setValue('minimum', $minimum);
	$sql = "SELECT * FROM `tab_rubrique_devise` WHERE `id` =".$data['id'];
	$req = $bdd->query($sql);
	$row  = $req->rowCount();
	if($row>0)
	{
		$data = $req->fetch();
		$monnaie = $data['monnaie'];
		$monnaie = decoder($monnaie);
		$document->setValue('devise',$monnaie );
	}
}else
{

	$document->setValue('resultat', "");
	$document->setValue('montant', "");
	$document->setValue('impot', "");
	$document->setValue('minimum', "");
	$document->setValue('devise', "");
}
// CYCLE IMMOBILISATIONS INCORPORELLES
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'immoinco' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
$document->cloneRow('immoincolib',$row);
$i = 1;
while ($data = $req->fetch()) 
{
	$document->setValue('immoincolib#'.$i, decoder($data['libelle'])); //Rubrique
	$document->setValue('immoincov1#'.$i, number_format($data['vb'], 2, ',', ' ')); //valeur brute
	$document->setValue('immoincov2#'.$i, number_format($data['va'], 2, ',', ' ')); //amortissement
	$document->setValue('immoincov3#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
	$document->setValue('immoincov4#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
	$t1+=$data['vb'];
	$t2+=$data['va'];
	$t3+=$data['vn'];
	$t4+=$data['vn1'];
	$i++; 
}
$t1=number_format($t1, 2, ',', ' ');
$t2=number_format($t2, 2, ',', ' ');
$t3=number_format($t3, 2, ',', ' ');
$t4=number_format($t4, 2, ',', ' ');
	$document->setValue('immoincot1', $t1); //valeur brute
	$document->setValue('immoincot2', $t2); //amortissement
	$document->setValue('immoincot3', $t3); //valeur nette
	$document->setValue('immoincot4', $t4); //valeur nette n-1
}else
{
	$document->setValue('immoincolib', ""); //Rubrique
	$document->setValue('immoincov1',""); //valeur brute
	$document->setValue('immoincov2',""); //amortissement
	$document->setValue('immoincov3',""); //valeur nette
	$document->setValue('immoincov4',""); //valeur nette n-1
	$document->setValue('immoincot1', $t1); //valeur brute
	$document->setValue('immoincot2', $t2); //amortissement
	$document->setValue('immoincot3', $t3); //valeur nette
	$document->setValue('immoincot4', $t4); //valeur nette n-1
}

// CYCLE IMMOBILISATIONS CORPORELLES
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'immoco' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
	$document->cloneRow('immocolib',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('immocolib#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('immocov1#'.$i, number_format($data['vb'], 2, ',', ' ')); //valeur brute
		$document->setValue('immocov2#'.$i, number_format($data['va'], 2, ',', ' ')); //amortissement
		$document->setValue('immocov3#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('immocov4#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t1=number_format($t1, 2, ',', ' ');
	$t2=number_format($t2, 2, ',', ' ');
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('immocot1', $t1); //valeur brute
		$document->setValue('immocot2', $t2); //amortissement
		$document->setValue('immocot3', $t3); //valeur nette
		$document->setValue('immocot4', $t4); //valeur nette n-1
	}
	else{
		$document->setValue('immocolib',""); //Rubrique
		$document->setValue('immocov1',""); //valeur brute
		$document->setValue('immocov2',""); //amortissement
		$document->setValue('immocov3',""); //valeur nette
		$document->setValue('immocov4',""); //valeur nette n-1
//total
		$document->setValue('immocot1', $t1); //valeur brute
		$document->setValue('immocot2', $t2); //amortissement
		$document->setValue('immocot3', $t3); //valeur nette
		$document->setValue('immocot4', $t4); //valeur nette n-1
	}

// CYCLE VARIATION DES IMMOBILISATIONS CORPORELLES
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'variation' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{

	$document->cloneRow('variationco',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('variationco#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('variationv1#'.$i, number_format($data['vb'], 2, ',', ' ')); //valeur brute
		$document->setValue('variationv2#'.$i, number_format($data['va'], 2, ',', ' ')); //amortissement
		$document->setValue('variationv3#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('variationv4#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t1=number_format($t1, 2, ',', ' ');
	$t2=number_format($t2, 2, ',', ' ');
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('variationt1', $t1); //valeur brute
		$document->setValue('variationt2', $t2); //amortissement
		$document->setValue('variationt3', $t3); //valeur nette
		$document->setValue('variationt4', $t4); //valeur nette n-1
}else
{
		$document->setValue('variationco',""); //Rubrique
		$document->setValue('variationv1',""); //valeur brute
		$document->setValue('variationv2',""); //amortissement
		$document->setValue('variationv3',""); //valeur nette
		$document->setValue('variationv4',""); //valeur nette n-1
		//Total
		$document->setValue('variationt1', $t1); //valeur brute
		$document->setValue('variationt2', $t2); //amortissement
		$document->setValue('variationt3', $t3); //valeur nette
		$document->setValue('variationt4', $t4); //valeur nette n-1

}

// CYCLE DES IMMOBILISATIONS EN COURS
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'immocours' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
	// $document->cloneRow('variationco',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
		$t3=number_format($t3, 2, ',', ' ');
		$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('immoencot', $t3); //valeur nette
		$document->setValue('immoencot1', $t4); //valeur nette n-1


		$sql = "SELECT * FROM tab_rubrique_notes_annexes 
		where rubrique_cycle like 'immocours' AND ENTREPRISE_ID =".$entreprise_id;
			$res = $bdd->query($sql) or die("error:    ".$sql);
			$j = 0;
			$row = $res->rowCount();
			if($row>0){
				$rub = $res->fetch();
				$libelle = $rub['rubrique_libelle'];
				$id = $rub['rubrique_id'];
				//echo "<p>".$texte."</p>";
			// $j++;
			}else
			{
				$id = 0;
			}

	$sql = "SELECT `commentaire`as com
			FROM `tab_rubrique_com`
			WHERE `rubrique_id` =".$id ;
	$req = $bdd->query($sql) or die($sql);
	$row = $res->rowCount();
	if($row>0)
	{
		$res = $req->fetch();
		$immoencocom = stripslashes($res['com']);
	}else
		$immoencocom = "";

	$document->setValue('immoencocom', $immoencocom); //valeur nette

}else
{
	$document->setValue('immoencot', $t3); //valeur nette
	$document->setValue('immoencot1', $t4); //valeur nette n-1	
	$document->setValue('immoencocom', ""); //valeur nette
}

// CYCLE VARIATION DES IMMOBILISATIONS FINANCIERE
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'immofi' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
	$document->cloneRow('immofilib',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('immofilib#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('immofiv1#'.$i, number_format($data['vb'], 2, ',', ' ')); //valeur brute
		$document->setValue('immofiv2#'.$i, number_format($data['va'], 2, ',', ' ')); //amortissement
		$document->setValue('immofiv3#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('immofiv4#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t1=number_format($t1, 2, ',', ' ');
	$t2=number_format($t2, 2, ',', ' ');
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('immofit1', $t1); //valeur brute
		$document->setValue('immofit2', $t2); //amortissement
		$document->setValue('immofit3', $t3); //valeur nette
		$document->setValue('immofit4', $t4); //valeur nette n-1
}else
{

		$document->setValue('immofilib',""); //Rubrique
		$document->setValue('immofiv1',""); //valeur brute
		$document->setValue('immofiv2',""); //amortissement
		$document->setValue('immofiv3',""); //valeur nette
		$document->setValue('immofiv4',""); //valeur nette n-1
		//Total
		$document->setValue('immofit1', $t1); //valeur brute
		$document->setValue('immofit2', $t2); //amortissement
		$document->setValue('immofit3', $t3); //valeur nette
		$document->setValue('immofit4', $t4); //valeur nette n-1
}

// CYCLE PROVISION POUR CHARGE
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'provision' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
	$document->cloneRow('provision',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('provision#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('provisionv1#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('provisionv2#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('provisiont1', $t3); //valeur nette
		$document->setValue('provisiont2', $t4); //valeur nette n-1
}else
{
		$document->setValue('provision',""); //Rubrique
		$document->setValue('provisionv1',""); //valeur nette
		$document->setValue('provisionv2',""); //valeur nette n-1
		//Total
		$document->setValue('provisiont1', $t3); //valeur nette
		$document->setValue('provisiont2', $t4); //valeur nette n-1

}

// CYCLE CHIFFRES D'AFFAIRES
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'chiffreaf' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
	$document->cloneRow('chiffrev1',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('chiffrelib#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('chiffrev1#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('chiffrev2#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('chiffret1', $t3); //valeur nette
		$document->setValue('chiffret2', $t4); //valeur nette n-1
}else
{
		$document->setValue('chiffrelib',""); //Rubrique
		$document->setValue('chiffrev1',""); //valeur nette
		$document->setValue('chiffrev2',""); //valeur nette n-1
		//Total
		$document->setValue('chiffret1', $t3); //valeur nette
		$document->setValue('chiffret2', $t4); //valeur nette n-1
}

// CYCLE CHIFFRES D'AFFAIRES
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'achatsco' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
	$document->cloneRow('achatscolib',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('achatscolib#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('achatscov1#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('achatscov2#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('achatscot1', $t3); //valeur nette
		$document->setValue('achatscot2', $t4); //valeur nette n-1
}else
{
		$document->setValue('achatscolib',""); //Rubrique
		$document->setValue('achatscov1',""); //valeur nette
		$document->setValue('achatscov2',""); //valeur nette n-1
		//Total
		$document->setValue('achatscot1', $t3); //valeur nette
		$document->setValue('achatscot2', $t4); //valeur nette n-1
}
// CYCLE SERVICE EXTERIEUR
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'srvext' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
	$document->cloneRow('servicev1',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('servicelib#'.$i, decoder($data['libelle'])); //Rubrique
		// $document->setValue('immoincov1#'.$i, $data['vb']); //valeur brute
		// $document->setValue('immoincov2#'.$i, $data['va']); //amortissement
		$document->setValue('servicev1#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('servicev2#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		// $document->setValue('immoincot1', $t1); //valeur brute
		// $document->setValue('immoincot2', $t2); //amortissement
		$document->setValue('servicet1', $t3); //valeur nette
		$document->setValue('servicet2', $t4); //valeur nette n-1
}else
{
		$document->setValue('servicelib',""); //Rubrique
		$document->setValue('servicev1',""); //valeur nette
		$document->setValue('servicev2',""); //valeur nette n-1
//Total
		$document->setValue('servicet1', $t3); //valeur nette
		$document->setValue('servicet2', $t4); //valeur nette n-1
}
// CYCLE CHARGES DE PERSONNEL
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'chrgpers' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{

	$document->cloneRow('chargelib',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('chargelib#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('chargev1#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('chargev2#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('charget1', $t3); //valeur nette
		$document->setValue('charget2', $t4); //valeur nette n-1
}else
{
		$document->setValue('chargelib',""); //Rubrique
		$document->setValue('chargev1',""); //valeur nette
		$document->setValue('chargev2',""); //valeur nette n-1

		$document->setValue('charget1', $t3); //valeur nette
		$document->setValue('charget2', $t4); //valeur nette n-1
}
// CYCLE 18.	IMPOTS ET TAXES
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'impottax' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
	$document->cloneRow('impotlib',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('impotlib#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('impotv1#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('impotv2#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('impott1', $t3); //valeur nette
		$document->setValue('impott2', $t4); //valeur nette n-1
}else
{
		$document->setValue('impotlib',""); //Rubrique
		$document->setValue('impotv1',""); //valeur nette
		$document->setValue('impotv2',""); //valeur nette n-1
//Total
		$document->setValue('impott1', $t3); //valeur nette
		$document->setValue('impott2', $t4); //valeur nette n-1
}

// CYCLE 19.	AUTRES PRODUITS OPERATIONNELS
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'autrespdx' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
	$document->cloneRow('autrespdx',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('autrespdx#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('autrev1#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('autrev2#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('autret1', $t3); //valeur nette
		$document->setValue('autret2', $t4); //valeur nette n-1
}else
{
		$document->setValue('autrespdx',""); //Rubrique
		$document->setValue('autrev1',""); //valeur nette
		$document->setValue('autrev2',""); //valeur nette n-1
//Total
		$document->setValue('autret1', $t3); //valeur nette
		$document->setValue('autret2', $t4); //valeur nette n-1
}

// CYCLE 20.	AUTRES CHARGES OPERATIONNELLES
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'autreschrgope' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
	$document->cloneRow('autrechgv2',$row);
	$i = 1;while ($data = $req->fetch()) 
	{
		$document->setValue('autrechg#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('autrechgv1#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('autrechgv2#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('autrechgt1', $t3); //valeur nette
		$document->setValue('autrechgt2', $t4); //valeur nette n-1
}else
{
		$document->setValue('autrechg',""); //Rubrique
		$document->setValue('autrechgv1',""); //valeur nette
		$document->setValue('autrechgv2',""); //valeur nette n-1
//Total
		$document->setValue('autrechgt1', $t3); //valeur nette
		$document->setValue('autrechgt2', $t4); //valeur nette n-1
}

// CYCLE 21.	PRODUITS FINANCIERS
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'pdxfi' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{

	$document->cloneRow('produitfi',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('produitfi#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('produitfiv1#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('produitfiv2#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('produitfit1', $t3); //valeur nette
		$document->setValue('produitfit2', $t4); //valeur nette n-1
}else
{
		$document->setValue('produitfi',""); //Rubrique
		$document->setValue('produitfiv1',""); //valeur nette
		$document->setValue('produitfiv2',""); //valeur nette n-1
		//Total
		$document->setValue('produitfit1', $t3); //valeur nette
		$document->setValue('produitfit2', $t4); //valeur nette n-1
}

// CYCLE 22.	CHARGES FINANCIERES
$sql = "SELECT * FROM `tab_rubrique_t` WHERE `cycle` = 'chrgfi' AND `id_mission` =".$mission;
$req = $bdd->query($sql);
$row  = $req->rowCount();
$t1=$t2=$t3=$t4=0;
if($row>0)
{
	$document->cloneRow('chargefi',$row);
	$i = 1;
	while ($data = $req->fetch()) 
	{
		$document->setValue('chargefi#'.$i, decoder($data['libelle'])); //Rubrique
		$document->setValue('chargefiv1#'.$i, number_format($data['vn'], 2, ',', ' ')); //valeur nette
		$document->setValue('chargefiv2#'.$i, number_format($data['vn1'], 2, ',', ' ')); //valeur nette n-1
		$t1+=$data['vb'];
		$t2+=$data['va'];
		$t3+=$data['vn'];
		$t4+=$data['vn1'];
		$i++; 
	}
	$t3=number_format($t3, 2, ',', ' ');
	$t4=number_format($t4, 2, ',', ' ');
		$document->setValue('chargefit1', $t3); //valeur nette
		$document->setValue('chargefit2', $t4); //valeur nette n-1
}else
{
		$document->setValue('chargefi',""); //Rubrique
		$document->setValue('chargefiv1',""); //valeur nette
		$document->setValue('chargefiv2',""); //valeur nette n-1
//Total
		$document->setValue('chargefit1', $t3); //valeur nette
		$document->setValue('chargefit2', $t4); //valeur nette n-1
}


// Cycle 8. Stocks
$req_stock = $bdd->query("SELECT rubrique_id, sum(RA_SOLDE_N) as sommeN , sum(RA_SOLDE_N1) as sommeN1 
							FROM tab_ra 
							WHERE MISSION_ID=".$mission."
							AND rubrique_cycle='stock'
							AND type='S'
							GROUP BY rubrique_id");
$row_stock  = $req_stock->rowCount();
$document->cloneRow('lib_stock',$row_stock);
$req_provision = $bdd->query("SELECT rubrique_id, sum(RA_SOLDE_N) as sommeN , sum(RA_SOLDE_N1) as sommeN1 
								FROM tab_ra 
								WHERE MISSION_ID=".$mission."
								AND rubrique_cycle='stock'
								AND type='P'
								GROUP BY rubrique_id");
$row_provision  = $req_provision->rowCount();
$document->cloneRow('lib_provision',$row_provision);
$i = 1;
$total_stock_N = 0;
$total_stock_N1 = 0;
while($donnees = $req_stock->fetch()){
	$reponse = $bdd->query("SELECT `rubrique_libelle`
							FROM tab_rubrique_notes_annexes 
							where `rubrique_id` = ".$donnees['rubrique_id']."
							and ENTREPRISE_ID = ".$entreprise_id);
	$data = $reponse->fetch();
	$document->setValue("lib_stock#".$i, decoder($data['rubrique_libelle']));
	$document->setValue("stockN#".$i, number_format($donnees["sommeN"], 2, ',', ' '));
	$document->setValue("stockN1#".$i, number_format($donnees["sommeN1"], 2, ',', ' '));
	$total_stock_N += $donnees['sommeN'];
	$total_stock_N1 += $donnees['sommeN1'];
	$i++;
}
$i = 1;
$total_provision_N = 0;
$total_provision_N1 = 0;
while($donnees = $req_provision->fetch()){
	$reponse = $bdd->query("SELECT `rubrique_libelle`
							FROM tab_rubrique_notes_annexes 
							where `rubrique_id` = ".$donnees['rubrique_id']."
							and ENTREPRISE_ID = ".$entreprise_id);
	$data = $reponse->fetch();
	$document->setValue("lib_provision#".$i, decoder($data['rubrique_libelle']));
	$document->setValue("provisionN#".$i, number_format($donnees["sommeN"], 2, ',', ' '));
	$document->setValue("provisionN1#".$i, number_format($donnees["sommeN1"], 2, ',', ' '));
	$total_provision_N += $donnees['sommeN'];
	$total_provision_N1 += $donnees['sommeN1'];
	$i++;
}
$document->setValue("total_N", number_format($total_stock_N+$total_provision_N, 2, ',', ' '));
$document->setValue("total_N1", number_format($total_stock_N1+$total_provision_N1, 2, ',', ' '));

// Cycle 9. Creances et emplois et 10. Tresorerie et 13. Passifs courants
$cycles = array('charge', 'tresorerie', 'passifco');
foreach($cycles as $cycle){
	$req = $bdd->query("SELECT  `rubrique_id` , SUM( RA_SOLDE_N ) AS sommeN, SUM( RA_SOLDE_N1 ) AS sommeN1
						FROM tab_ra
						WHERE MISSION_ID = ".$mission."
						AND rubrique_cycle =  '".$cycle."'
						GROUP BY  `rubrique_id`");
	$row = $req->rowCount();
	$document->cloneRow($cycle, $row);
	$document->cloneRow($cycle."_rubrique", $row);
	$i = 1;
	$total_N = 0;
	$total_N1 = 0;
	while($donnees = $req->fetch()){
		// Pour remplir les donnees concernant les rubriques
		$id_rubrique = $donnees['rubrique_id'];
		$reponse = $bdd->query("SELECT `rubrique_libelle`
								FROM tab_rubrique_notes_annexes 
								where `rubrique_id` = ".$id_rubrique."
								and ENTREPRISE_ID = ".$entreprise_id);
		$data = $reponse->fetch();
		$document->setValue($cycle."_rubrique#".$i, decoder($data['rubrique_libelle']));
		$document->setValue($cycle."_rubrique_somme_N#".$i, number_format($donnees['sommeN'], 2, ',', ' '));
		$document->setValue($cycle."_rubrique_somme_N1#".$i, number_format($donnees['sommeN1'], 2, ',', ' '));
		$reponse = $bdd->query("SELECT `commentaire`
								FROM `tab_rubrique_com`
								WHERE `rubrique_id` = ".$id_rubrique."
								AND `afficher` = 'true'");
		$data = $reponse->fetch();
		if($data['commentaire'] != ""){
			$document->setValue($cycle."_commentaire#".$i, "Commentaire :");
			$document->setValue($cycle."_commentaire_texte#".$i, decoder($data['commentaire']));
		}
		else{
			$document->cloneRow($cycle."_commentaire#".$i, 0);
			$document->cloneRow($cycle."_commentaire_texte#".$i, 0);		
		}
		// Pour rempilr les donnees concernant les sous-rubriques
		$sous_reponse = $bdd->query("SELECT  `sous_rubrique` , SUM( RA_SOLDE_N ) AS sommeN, SUM( RA_SOLDE_N1 ) AS sommeN1
										FROM tab_ra
										WHERE MISSION_ID = ".$mission."
										AND rubrique_cycle =  '".$cycle."'
										AND `rubrique_id` = ".$id_rubrique."
										GROUP BY  `sous_rubrique`");
		$row = $sous_reponse->rowCount();
		$document->cloneRow($cycle."_sous_rubrique#".$i, $row);
		$j = 1;
		while($donnees_sous = $sous_reponse->fetch()){
			$id_sous_rubrique = $donnees_sous['sous_rubrique'];
			$reponse = $bdd->query("SELECT `rubrique_libelle` 
									FROM `tab_rubrique_sous` 
									WHERE `sous_id` = ".$id_sous_rubrique);
			$data = $reponse->fetch();
			$document->setValue($cycle."_sous_rubrique#".$i."#".$j, decoder($data['rubrique_libelle']));
			$document->setValue($cycle."_sous_somme_N#".$i."#".$j, number_format($donnees_sous['sommeN'], 2, ',', ' '));
			$document->setValue($cycle."_sous_somme_N1#".$i."#".$j, number_format($donnees_sous['sommeN1'], 2, ',', ' '));
			$j++;
		}
		$total_N += $donnees['sommeN'];
		$total_N1 += $donnees['sommeN1'];
		$document->setValue($cycle."#".$i, "");
		$i++;
	}
	$document->setValue($cycle."_somme_N", number_format($total_N, 2, ',', ' '));
	$document->setValue($cycle."_somme_N1", number_format($total_N1, 2, ',', ' '));
}

//Cycle 11. Capitaux propres
$req = $bdd->query("SELECT rubrique_id, sum(RA_SOLDE_N) as sommeN 
							FROM tab_ra 
							WHERE MISSION_ID=".$mission."
							AND rubrique_cycle='fond'
							GROUP BY rubrique_id");
$row  = $req->rowCount();
$document->cloneRow('fond', $row);
$i = 1;
while($donnees = $req->fetch()){
	$reponse = $bdd->query("SELECT `rubrique_libelle`
							FROM tab_rubrique_notes_annexes 
							where `rubrique_id` = ".$donnees['rubrique_id']."
							and ENTREPRISE_ID = ".$entreprise_id);
	$data = $reponse->fetch();
	$libelle = $data['rubrique_libelle'];
	$reponse = $bdd->query("SELECT `commentaire`
							FROM `tab_rubrique_com`
							WHERE `rubrique_id` = ".$donnees['rubrique_id']."
							AND `afficher` = 'true'");
	$data = $reponse->fetch();
	$commentaire = $data['commentaire'];
	$document->setValue("fond_rubrique#".$i, decoder($libelle));
	$document->setValue("fond_rubrique_commentaire#".$i, decoder($commentaire));
	$document->setValue("fond_somme_N#".$i, number_format(abs($donnees["sommeN"]), 2, ',', ' '));
	$document->setValue("fond#".$i, "");
	$i++;
}

// 7. Impots differés actifs
// Pour remplir le tableau
require_once("../Reporting_Excel/Classes/PHPExcel/IOFactory.php");
// Chargement du fichier Excel
$fichier = "../../RDC/fond_propre/C/fichier_upload/IDA_".$mission.".xlsx";
if(file_exists($fichier)){
		$objPHPExcel = PHPExcel_IOFactory::load($fichier);
	/*** récupération de la première feuille du fichier Excel * @var PHPExcel_Worksheet $sheet */
	$sheet = $objPHPExcel->getSheet(0);
	$index = "";
	// Pour prendre les valeurs des cellules simples
	// On boucle sur les lignes
	foreach($sheet->getRowIterator() as $row) { 
	   // On boucle sur les cellule de la ligne
	   foreach ($row->getCellIterator() as $cell) {
		  $value = $cell->getCalculatedValue();
		  //$value = $cell->getValue();
		  $index .= $cell->getColumn();
		  $index .= $cell->getRow();
		  $document->setValue("IDA_".$index, decoder($value));
		  $index = "";
	   }
	}
	// Pour prendre les valeurs des cellules à formules
	// On boucle sur les lignes
	foreach($sheet->getRowIterator() as $row) { 
	   // On boucle sur les cellule de la ligne
	   foreach ($row->getCellIterator() as $cell) {
		  $value = $cell->getCalculatedValue();
		  //$value = $cell->getValue();
		  $index .= $cell->getColumn();
		  $index .= $cell->getRow();
		  $document->setValue("IDA_".$index, decoder($value));
		  $index = "";
	   }
	}

}



//ENREGISTREMENT SUR MS WORD
$fichier ='Notes_annexes_'.$code.'_'.$mission.'.docx';
if( file_exists ($fichier)){
	unlink($fichier);
	$document->saveAs('../Sauvegarde_sortie/Word/Notes_annexes_'.$code.'_'.$mission.'.docx');
}else{
	$document->saveAs('../Sauvegarde_sortie/Word/Notes_annexes_'.$code.'_'.$mission.'.docx');
}



echo '<a href="Dossier_Rapport/Sauvegarde_sortie/Word/Notes_annexes_'.$code.'_'.$mission.'.docx" TARGET="_BLANK"><img src="Dossier_Rapport/img/telecharger.png" height="28px" width="28px"/></a>';




// function Ajout_base ($fichier,$session_utiliser,$ID_mission,$ID_Entreprise,$ID_Utilisateur) {
// include "../connexionPDO.php";
// 		//===================================================================================================
// 			// AJOUTER INFORMATIONS DANS LA BASE tab_suivi_export_fichier
// 			//===================================================================================================
// 			$Date_sortie=date("Y-m-d");
// 			try{
// 					$res=$conx->prepare('INSERT INTO tab_suivi_export_fichier(Date_sortie,nom_fichier,session_utiliser,MISSION_ID,ENTREPRISE_ID,UTIL_ID)
// 					VALUES (:Date_sortie,:nom_fichier,:session_utiliser,:MISSION_ID,:ENTREPRISE_ID,:UTIL_ID )');
// 					$res->execute(array('Date_sortie'=>$Date_sortie,'nom_fichier'=>$fichier,'session_utiliser'=>$session_utiliser,'MISSION_ID'=>$ID_mission,'ENTREPRISE_ID'=>$ID_Entreprise,'UTIL_ID'=>$ID_Utilisateur ));
// 		       }catch(exception $e){}          
// 				//=====================================================================================================
// }
// //PRENDRE ENTREPRISE
// function get_Entreprise ($ID_mission){
// //include "../connex.php";

// $sqlNbrPo=db_connect("SELECT ENTREPRISE_ID  FROM  tab_mission WHERE MISSION_ID='".$ID_mission."' " );
// 	foreach ($sqlNbrPo as $val){
// 	 $ID_entreprise = $val["ENTREPRISE_ID"];	
// 	}
// return $ID_entreprise;
// 	}
	
// 	//PRENDRE L'UTILISATEUR
// 	function get_ID_utilisateur($mail_utilisateur){
// $get_ID_util=db_connect("SELECT UTIL_ID  FROM tab_utilisateur WHERE UTIL_LOGIN ='".$mail_utilisateur ."' ");
// foreach ($get_ID_util as $val){
// $ID_utilisateur =$val['UTIL_ID'];
// }
// return $ID_utilisateur;
// }







// ?>