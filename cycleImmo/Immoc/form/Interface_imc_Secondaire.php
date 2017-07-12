<html>
<head>
<title>AMS | Cycle achat</title>

<script type="text/javascript" src="../cycleAchat/plugins/jquery.js"></script>
<script type="text/javascript" src="../cycleAchat/plugins/jquery.easyui.min.js"></script>

<!--link href="../cycle_achat_css/class.css" rel="stylesheet" type="text/css" /-->
<!--link href="cycleAchat/cycle_achat_css/div_fermer_quest_objectif_B.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/class.css" rel="stylesheet" type="text/css" />
<link href="cycleAchat/cycle_achat_css/class_b/div.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="cycleAchat/cycle_achat_js/cycle_achat_plugins/jquery.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js.js"></script>
<script type="text/javascript" src="cycleAchat/cycle_achat_js/js_b.js"></script-->
<script>
$(document).ready(function() {
	// Formulaire draggable
	$('#Int_Synthese_imc').draggable();
	$('#Question_imc_93').draggable();
	$('#Question_imc_94').draggable();
	$('#Question_imc_95').draggable();
	$('#Question_imc_96').draggable();
	$('#Question_imc_97').draggable();
	$('#Question_imc_98').draggable();
	$('#Question_imb_99').draggable();
	$('#Question_imc_100').draggable();
	$('#Question_imc_101').draggable();
	$('#Question_imc_102').draggable();
	$('#Question_imc_103').draggable();
	$('#Question_imc_104').draggable();
	$('#Question_imc_105').draggable();
	// $('#int_conclusion_c_superviseur').draggable();
});
function openButtObjimb(){
	document.getElementById("int_imc_Retour").disabled=false;
	document.getElementById("Int_imc_Continuer").disabled=false;
	document.getElementById("Int_imc_Synthese").disabled=false;
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<div id="fond_Sous_Titre" class="menu_Titre"><label class="marge_Titre">Evaluation du contrôle des fournisseurs</label><label class="margin_Code">Code : FC1</label>
</div>
<div id="fond_Question">
<table width="100%">
	<tr>
		<td class="titre" id="image_bleu" align="center"><!--label id="image_Bleu_A"> A. S’assurer que les séparations de fonctions sont suffisantes.</label-->
<label id="image_Bleu_b">C.Correspondance</label>
		</td>
	</tr>
</table>
</div>
<!--**************************************Affichage de A.************************************************-->
<div id="interface_imc" align="center"><?php include 'Interface_imc.php'; ?></div>
<!--*****************************************************************************************************-->
</body>
</html>