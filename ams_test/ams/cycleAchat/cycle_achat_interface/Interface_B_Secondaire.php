<?php

$mission_id=@$_POST['mission_id'];

?>

<html>
<head>
<title>AMS | Cycle achat</title>
<link href="cycleAchat/cycle_achat_css/div.css" rel="stylesheet" type="text/css" />
<!--link href="../cycle_achat_css/class.css" rel="stylesheet" type="text/css" /-->
<link href="cycleAchat/cycle_achat_css/div_fermer_quest_objectif_B.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/div.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js_b.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="fond_Sous_Titre" class="menu_Titre"><label class="marge_Titre">Evaluation du contrôle des fournisseurs</label><label class="margin_Code">Code : FC1</label>
</div>
<div id="fond_Question">
<table width="100%">
	<tr>
		<td class="titre" id="image_bleu" align="center"><!--label id="image_Bleu_A"> A. S’assurer que les séparations de fonctions sont suffisantes.</label-->
		<label id="image_bleu">B. S'assurer que tous les achats (retours) sont saisis et enregistrés (exhaustivité).</label>
		<!--label id="image_Bleu_C">C. S'assurer que toutes les factures (avoirs) enregistrées correspondent à des achats réels de l'entreprise.</label>
		<label id="image_Bleu_D">D. S'assurer que tous les achats enregistrés sont correctement évalués.</label>
		<label id="image_Bleu_E">E. S'assurer que tous les achats, ainsi que les produits et charges connexes sont enregistrés dans la bonne période.</label>
		<label id="image_Bleu_F">F. S'assurer que tous les achats, ainsi que les charges et produits connexes sont correctement imputés, totalisés et centralisés.</label-->
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_B" align="center"><?php include 'Interface_B.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>