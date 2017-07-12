<?php
	/////////////////////////////////////////loader le document dans le repertoir adekoit/////////////////////////////////////////
	include '../connexion.php';
	$chemin="logo";
	
	if (is_uploaded_file($_FILES['logoname']['tmp_name']))
		{ 
			
			
			$nameDocument=$_FILES['logoname']['name'];
			$loader=$_SERVER['DOCUMENT_ROOT']."/".$chemin."/".$nameDocument;
			$sourceDoc="/".$chemin."/".$nameDocument;
			$result= move_uploaded_file($_FILES['logoname']['tmp_name'],$loader);

			if ($result != 1)
			{ 
					die("Error uploading file.  Please try again");
			}
		}
	
	if(@$_FILES['logoname']['name']!=''){
	$ch="logo/".$_FILES['logoname']['name'];



	// header("Location:../accueil.php");
	
	$sqlCompt="SELECT Max(ENTREPRISE_ID) AS cmp FROM tab_entreprise";
	$repC=$bdd->query($sqlCompt);
	$donneC=$repC->fetch();
	$cmp=$donneC['cmp'];
	$req= $bdd-> prepare('UPDATE tab_entreprise SET  LOGO=:log WHERE ENTREPRISE_ID='.$cmp);
	$req->execute(array(
	'log'=>$ch

	));
	}
	// print $ch."et".$cmp;
	 header('Location:../accueil.php'); 
?>