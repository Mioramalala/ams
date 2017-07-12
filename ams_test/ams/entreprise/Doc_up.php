<?php  
	include '../connexion.php';
	@session_start();
	$nbr=count($_SESSION['dernie_denom']);
	$Entr=$_SESSION["dernie_denom"][$nbr-1];
	$mission_id=$_SESSION['idMission'];
	$chemin='repertoire_document/doc_'.$Entr;
	if (is_uploaded_file($_FILES['nameDoc']['tmp_name']))
		{ 
			$nameDocument=$_FILES['nameDoc']['name'];
			$loader=$_SERVER['DOCUMENT_ROOT']."/".$chemin."/".$nameDocument;
			$sourceDoc="/repertoir/".$nameDocument;
			$result= move_uploaded_file($_FILES['nameDoc']['tmp_name'],$loader);
			if ($result != 1)
			{ 
					die("Error uploading file.  Please try again");
			}else
			{
				$reqInsert=$bdd->prepare("INSERT INTO  tab_doc_permanent (Name_doc, 
				Chemain_doc,Entre_Name) VALUE (:n,:z,:r)");
				$reqInsert->execute(array(
				'n'=>$nameDocument,
				'z'=>$chemin,
				'r'=>$Entr
				));
				
				?>
					<script language="javascript">
							window.location.href="formUpload.php";
					</script>
				<?php
				}
		}
?>
