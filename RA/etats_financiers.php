<?php 

session_start();

$_SESSION['objectif']='Etat financière';

include '../connexion.php';
	$mission_id=@$_GET['mission_id'];
	$reponse=$bdd->query('Select MISSION_ANNEE,MISSION_TYPE from  tab_mission where MISSION_ID ='.$_SESSION['idMission'] );
	$donnees=$reponse->fetch();
	$mission_annee=$donnees['MISSION_ANNEE'];
	$mission_type=$donnees['MISSION_TYPE'];
?>

<html>
	<head>
		<link rel = "stylesheet" href = "../RA/css_RA.css"/>
		<script type="text/javascript" src="RA/evenement.js"></script>
		<script type="text/javascript" src="RA/jquery.js"></script>
		<script type="text/javascript">
		$(function(){
				$('#dv_retour1').click(function(){
					parent.window.$('#contenue').load('RA/donnees_financiers.php');			
				});
			});
	
		</script>
	</head>
	
	<body>
		<input type = "button" class="bouton-blanc" id = "dv_retour1" value = "Retour" style = "float:right"/>	
		<div id="dv_fl01">
			<table width="1000" height="400">
			<tr>
				<td>
				&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<label id = "dv_labelako"><b>Documents de base de la mission d'audit :</b><?php echo ' '.$mission_type.' ';?> <?php echo ' '.$mission_annee;?> </label><br/><br/>
				&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><b>Format de fichier accept&eacute;: </b><label style="color:red"><b>.xls <b>Taille maximale: 184ko</b></label></b><br/><br/>
				<iframe src="RA/_fenetre_uploadifram.php?mission_id=<?php echo $mission_id; ?>" style="border:2px solid silver;"width="1000" height="380">	
				</td>
			</tr>
		</table>
		</div>
	</body>
</html>