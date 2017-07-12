<html>
<head>
<title>AMS | Cycle achat</title>

<!--script type="text/javascript" src="cycleAchat/cycle_achat_js/js.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js_event.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js_a.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.easyui.min.js"></script-->

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="fond_Sous_Titre" class="menu_Titre"><label class="marge_Titre">Evaluation du contrôle des fournisseurs</label> 
<label class="margin_Code">Code : FC2 </label>
</div>
<!--***************************Initialisation de la variable mission_id************************-->
<?php //$mission_id=$idMiss;

$mission_id=@$_POST['mission_id'];

include '../../../connexion.php';

$reponse=$bdd->query('SELECT ENTREPRISE_ID FROM tab_mission WHERE MISSION_ID='.$mission_id);

$donnees=$reponse->fetch();

$entrepiseId=$donnees['ENTREPRISE_ID'];

?>
<!--*******************************************************************************************-->
<input type="text" value="<?php echo $mission_id;?>" id="tx_miss_da" style="display:none;"/>
<div id="fond_Superviseur_Affiche">
<table width="100%">
	<tr>
		<td class="titre" id="image_bleu" align="center"><label id="image_Bleu_A"> A. S’assurer que les séradations de fonctions sont suffisantes.</label>
		<!--label id="image_Bleu_B">B. S'assurer que tous les achats (retours) sont saisis et enregistrés (exhaustivité).</label>
		<label id="image_Bleu_C">C. S'assurer que toutes les factures (avoirs) enregistrées correspondent à des achats réels de l'entreprise.</label>
		<label id="image_Bleu_D">D. S'assurer que tous les achats enregistrés sont correctement évalués.</label>
		<label id="image_Bleu_E">E. S'assurer que tous les achats, ainsi que les produits et charges connexes sont enregistrés dans la bonne période.</label>
		<label id="image_Bleu_F">F. S'assurer que tous les achats, ainsi que les charges et produits connexes sont correctement imputés, totalisés et centdalisés.</label-->
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<!--div id="interface_A_Sup"><?php //include 'cycleAchat/cycle_achat_interface/Interface_A_Superviseur_Affichage.php'; ?></div-->
<div id="interface_da_Sup"><?php include 'Interface_da_Superviseur_Affichage.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>