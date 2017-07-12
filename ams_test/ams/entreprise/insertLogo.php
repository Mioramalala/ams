<?php
	/////////////////////////////////////////loader le document dans le repertoir adekoit/////////////////////////////////////////
	include '../connexion.php';
	
 	
										if( isset($_POST['btnRecDocName']) ) // si formulaire soumis
										{
											$content_dir = "./doc/"; // dossier où sera déplacé le fichier
										 	$chemin="../logo/";
											$tmp_file = $_FILES['logoNom']['tmp_name'];
										 
											if( !is_uploaded_file($tmp_file) )
											{
												echo("Le fichier est introuvable");
											}
										 
											// on copie le fichier dans le dossier de destination
											$name_file = $_FILES['logoNom']['name'];
										 
											if( !move_uploaded_file($tmp_file, $chemin . $name_file) )
											{
												echo("Impossible de copier le fichier");
											}
											else{
												if(@$_FILES['logoNom']['name']!=''){
														$ch="logo/".$_FILES['logoNom']['name'];
													
													
													
														// header("Location:../accueil.php");
														
														/*$sqlCompt="SELECT Max(ENTREPRISE_ID) AS cmp FROM tab_entreprise";
														$repC=$bdd->query($sqlCompt);
														$donneC=$repC->fetch();*/
														$cmp=$_POST['txt_identre'];
														$req= $bdd-> prepare('UPDATE tab_entreprise SET  LOGO=:log WHERE ENTREPRISE_ID='.$cmp);
														$req->execute(array(
														'log'=>$ch
													
														));
												}
												echo ("<script>alert('Le fichier est enregistre')</script>");
												?>

											<?php
											}
										}
		
									 
	if(isset($_SERVER["HTTP_REFERER"])){
	header("location:".$_SERVER["HTTP_REFERER"]."&saved=true");
	}								
?>

