<!-- // tinay: template valider separation de fonction -->

<?php
@session_start();
$mission_id=$_SESSION['idMission'];



?>
<html>
<head>
<title>AMS | Cycle achat</title>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="fond_Sous_Titre" class="menu_Titre"><label class="marge_Titre">Evaluation du contrôle des fournisseurs</label> 
<label class="margin_Code">Code : FC2 </label>
</div>
<!--***************************Initialisation de la variable mission_id************************-->
<?php 


include '../../../connexion.php';

$reponse=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);
$donnees=$reponse->fetch();
$entrepiseId=$donnees['ENTREPRISE_ID'];

?>
<!--*******************************************************************************************-->
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_aca" style="display:none;"/>
<div id="fond_Superviseur_Affiche">
<table width="100%">
	<tr>
		<td class="titre" id="acage_bleu" align="center"><label id="acage_Bleu_A"> A. S’assurer que les séparations de fonctions sont suffisantes.</label>
		
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<!--div id="interface_A_Sup"><?php //include 'cycleAchat/cycle_achat_interface/Interface_A_Superviseur_Affichage.php'; ?></div-->
<div id="interface_aca_Sup"><?php include 'Interface_aca_Superviseur_Affichage.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>