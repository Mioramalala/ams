<?php 
	
	include '../connexion.php';
	@session_start();
	$Entr=$_POST["txt1_identreprise"];
	
										if( isset($_POST['btnInsererDoc']) ) // si formulaire soumis
										{
											 
										 	$chemin='../repertoire_document/doc_'.$Entr;// dossier où sera déplacé le fichier
											$tmp_file = $_FILES['docNom']['tmp_name'];
										 
											if( !is_uploaded_file($tmp_file) )
											{
												echo("Le fichier est introuvable");
											}
										 
											// on copie le fichier dans le dossier de destination
											$name_file = $_FILES['docNom']['name'];
										 
											if( !move_uploaded_file($tmp_file, $chemin .'/'. $name_file) )
											{
												echo("Impossible de copier le fichier");
											}
											else{
												if(@$_FILES['docNom']['name']!=''){
																									
														// header("Location:../accueil.php");
														
														/*$sqlCompt="SELECT Max(ENTREPRISE_ID) AS cmp FROM tab_entreprise";
														$repC=$bdd->query($sqlCompt);
														$donneC=$repC->fetch();*/
														$nameDocument=$_FILES['docNom']['name'];
														$reqInsert=$bdd->prepare("INSERT INTO  tab_doc_permanent (Name_doc, 
														Chemain_doc,Entre_Name) VALUE (:n,:z,:r)");
														$reqInsert->execute(array(
														'n'=>$nameDocument,
														'z'=>$chemin,
														'r'=>$Entr
														));
													echo ("document bien enregistre");
?>
												<script language="javascript">
														alert("Le document a \351t\351 bien enregistr\351");
														window.location.href="iframe_doc.php?denomination=<?php echo $Entr; ?>";
												</script>
											<?php
												}							
												//echo($Entr);
											}
										}
		
	
	
?>
